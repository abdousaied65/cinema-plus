<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        return view('profile', compact('user'));
    }

    public function editProfile(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'same:confirm-password',
            'phone' => 'required'
        ]);
        $input = $request->all();
        $user = User::findOrFail($id);
        $input['password'] = Hash::make($input['password']);
        $user->update($input);
        if ($request->hasFile('avatar')) {
            $user_pic = $request->file('avatar');
            $fileName = $user_pic->getClientOriginalName();
            $user->update($input);
            $uploadDir = 'uploads/users/profiles/' . $id;
            $user_pic->move($uploadDir, $fileName);
            $user->avatar = $uploadDir . '/' . $fileName;
            $user->save();
        }
        return redirect()->back()->with('success', trans('msgs.Basic Data Updated Successfully'));
    }
}
