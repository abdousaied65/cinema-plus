<?php

namespace App\Http\Controllers\Admin;

use App\Models\Profile;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin-web');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $auth_id = Auth::user()->id;
        $user = Admin::findOrFail($auth_id);

        if(Profile::where('admin_id', '=', $auth_id)->count() > 0){
            //profile found
        }
        else{
            // profile not found
            $user->assignRole($user->role_name);
            $profile = Profile::create([
                'phone_code' => '',
                'phone_number' => '',
                'country_name' => '',
                'city_name' => '',
                'age' => '',
                'gender' => '',
                'timezone' => '',
                'profile_pic' => 'admin-assets/img/admin-avatar.png',
                'admin_id' => $auth_id
            ]);
        }
        return view('admin.home',compact('user'));
    }
}
