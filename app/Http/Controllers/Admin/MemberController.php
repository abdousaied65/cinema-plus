<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = User::all();
        return view('admin.members.index',compact('data'));
    }
    public function changeStatus($id)
    {
        $member = User::findOrFail($id);
        $status = $member->status;
        if ($status == "active"){
            $new_status = "blocked";
            $member->status = $new_status;
            $member->save();
        }
        else{
            $new_status = "active";
            $member->status = $new_status;
            $member->save();
        }
        return redirect()->route('admin.members.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|same:confirm-password',
            'status' => 'required',
            'phone' => 'required',
            'avatar' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $member = User::create($input);
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $fileName = $image->getClientOriginalName();
            $uploadDir = 'uploads/members/' . $member->id;
            $image->move($uploadDir, $fileName);
            $member->avatar = $uploadDir . '/' . $fileName;
            $member->save();
        }
        return redirect()->route('admin.members.index')
            ->with('success', trans('msgs.Member Added Successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $member = User::findOrFail($id);
        return view('admin.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|same:confirm-password',
            'status' => 'required',
            'phone' => 'required',
            'avatar' => 'required'
        ]);
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }
        $member = User::findOrFail($id);
        $member->update($input);
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $fileName = $image->getClientOriginalName();
            $uploadDir = 'uploads/members/' . $member->id;
            $image->move($uploadDir, $fileName);
            $member->avatar = $uploadDir . '/' . $fileName;
            $member->save();
        }
        return redirect()->route('admin.members.index')
            ->with('success', trans('msgs.Member Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        User::findOrFail($request->member_id)->delete();
        return redirect()->route('admin.members.index')->with('success', trans('msgs.Member Deleted Successfully'));
    }

    public function showTrashed()
    {
        $data = User::onlyTrashed()->get();
        return view('admin.members.trashed', compact('data'));
    }

    public function restoreTrashed($id)
    {
        User::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.members.index')->with('success', trans('msgs.Member restored Successfully'));
    }
}
