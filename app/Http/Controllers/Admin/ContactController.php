<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\sendingEmail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index(Request $request)
    {
        return view('admin.contacts.index', [
            'data' => Contact::query()
                ->when($request->query('search'), function ($query) use ($request) {
                    $query->where('email', 'like', '%' . $request->query('search') . '%');
                })
                ->latest()
                ->paginate(10)
        ]);
    }

    public function show($id)
    {
        $message = Contact::findorfail($id);
        return view('admin.contacts.show', compact('message'));
    }

    public function makeAsRead(Request $request)
    {
        $messages = $request->messages;
        //dd($messages);
        foreach ($messages as $msg_id) {
            $message = Contact::findOrFail($msg_id);
            $message::where('status', '!=', '2')->where('id', '=', $msg_id)->update([
                'status' => '1'
            ]);
        }
        return redirect()->back();
    }

    public function makeAsImportant(Request $request)
    {
        $messages = $request->messages;
        foreach ($messages as $msg_id) {
            $message = Contact::findOrFail($msg_id);
            $message->update([
                'status' => '2'
            ]);
        }
        return redirect()->back();
    }

    public function makeAsDestroy(Request $request)
    {
        $messages = $request->messages;
        foreach ($messages as $msg_id) {
            $message = Contact::findOrFail($msg_id);
            $message->update([
                'status' => '1'
            ]);
            $message->delete();
        }
        return redirect()->route('admin.contacts.index');
    }

    public function makeSentAsDestroy(Request $request)
    {
        $messages = $request->messages;
        foreach ($messages as $msg_id) {
            $message = SendEmail::findOrFail($msg_id);
            $message->delete();
        }
        return redirect()->route('admin.contacts.sent');
    }
    function send(Request $request)
    {
        $this->validate($request, [
            'to'     =>  'required|email',
            'subject'  =>  'required',
            'message' =>  'required'
        ]);

        $data = array(
            'to_email'      =>  $request->to,
            'subject'      =>  $request->subject,
            'message'   =>   $request->message
        );
        $message = html_entity_decode($request->message);
        $message = strip_tags($message);
        SendEmail::create([
            'email' => $request->to,
            'subject' => $request->subject,
            'message' => $message,
            'created_at' => now()
        ]);

        Mail::to($data['to_email'])->send(new sendingEmail($data));
        return back()->with('success', trans('msgs.Your Message Sent Successfully'));

    }
    public function showSent(Request $request)
    {
        return view('admin.contacts.sent', [
            'data' => SendEmail::query()
                ->when($request->query('search'), function ($query) use ($request) {
                    $query->where('email', 'like', '%' . $request->query('search') . '%');
                })
                ->latest()
                ->paginate(10)
        ]);
    }

    public function compose()
    {
        return view('admin.contacts.compose');
    }

    public function print(Request $request)
    {
        $msg_id = $request->messages;
        $message = Contact::findOrFail($msg_id)->first();
        return view('admin.contacts.print', compact('message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Contact::findOrFail($request->contact_id)->delete();
        return redirect()->route('admin.contacts.index')->with('success', trans('msgs.Contact Deleted Successfully'));
    }

    public function showTrashed()
    {
        $data = Contact::onlyTrashed()
            ->latest()
            ->paginate(10);
        return view('admin.contacts.trashed', compact('data'));
    }

    public function showImportant()
    {
        $data = Contact::query()
            ->where('status', '=', '2')
            ->latest()
            ->paginate(10);
        return view('admin.contacts.important', compact('data'));
    }

    public function restoreTrashed(Request $request)
    {
        $messages = $request->messages;
        foreach ($messages as $msg_id) {
            $message = Contact::withTrashed()->findOrFail($msg_id);
            $message->restore();
        }
        return redirect()->back();
    }
}
