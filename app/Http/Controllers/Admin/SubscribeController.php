<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\sendingEmail;
use App\Models\SendEmail;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index(Request $request)
    {
        return view('admin.subscribes.index', [
            'data' => Subscribe::query()
                ->when($request->query('search'), function ($query) use ($request) {
                    $query->where('subscribe_email', 'like', '%' . $request->query('search') . '%');
                })
                ->latest()
                ->paginate(10)
        ]);
    }

    public function makeAsDestroy(Request $request)
    {
        $emails = $request->emails;
        foreach ($emails as $email_id) {
            $email = Subscribe::findOrFail($email_id);
            $email->delete();
        }
        return redirect()->route('admin.subscribes.index');
    }

    public function compose()
    {
        $emails = Subscribe::all();
        return view('admin.subscribes.compose',compact('emails'));
    }

    function send(Request $request)
    {
        $this->validate($request, [
            'to'     =>  'required',
            'subject'  =>  'required',
            'message' =>  'required'
        ]);
        $data = array(
            'to_email'      =>  $request->to,
            'subject'      =>  $request->subject,
            'message'   =>   strip_tags(html_entity_decode($request->message))
        );
        Mail::to($data['to_email'])
            ->send(new sendingEmail($data));
        SendEmail::create([
            'email' => 'Subscribes List',
            'subject' => $request->subject,
            'message' => strip_tags(html_entity_decode($request->message)),
            'created_at' => now()
        ]);
        return back()->with('success', trans('msgs.Your Message Sent Successfully'));
    }
}
