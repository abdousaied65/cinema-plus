<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = Admin::findOrFail($id);
        $profile = Profile::where('admin_id', $id)->first();
        return view('admin.profiles.edit', compact('user', 'profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'phone_number' => 'required',
            'city_name' => 'required',
            'age' => 'required',
            'gender' => 'required'
        ]);
        $input = $request->all();
        $user = Admin::findOrFail($id);
        $profile = Profile::where('admin_id', $id)->first();
        if (Profile::where('admin_id', '=', $id)->count() > 0) {
            if ($request->hasFile('profile_pic')) {
                $profile_pic = $request->file('profile_pic');
                $fileName = $profile_pic->getClientOriginalName();
                $profile->update($input);
                $uploadDir = 'uploads/profiles/' . $id;
                $profile_pic->move($uploadDir, $fileName);
                $profile->profile_pic = $uploadDir . '/' . $fileName;
                $profile->save();
                return redirect()->back()->with('success', trans('msgs.Personal Data Updated Successfully'));
            }
            else{
                $profile->update($input);
                return redirect()->back()->with('success',trans('msgs.Personal Data Updated Successfully'));
            }
        } else {
            if ($request->hasFile('profile_pic')) {
                $profile_pic = $request->file('profile_pic');
                $fileName = $profile_pic->getClientOriginalName();
                $user->profile()->create($input);
                $uploadDir = 'uploads/profiles/' . $id;
                $profile_pic->move($uploadDir, $fileName);
                $profile->profile_pic = $uploadDir . '/' . $fileName;
                $profile->save();
                return redirect()->back()->with('success',trans('msgs.Personal Data Updated Successfully'));
            }
            else{
                $user->profile()->create($input);
                return redirect()->back()->with('success',trans('msgs.Personal Data Updated Successfully'));
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Profile $profile
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'same:confirm-password'
        ]);
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }
        $user = Admin::findOrFail($id);
        $user->update($input);
        $user->assignRole($request->input('role_name'));
        return redirect()->back()->with('success',trans('msgs.Basic Data Updated Successfully'));
    }
}
