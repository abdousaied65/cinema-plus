<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
   use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string'
        ]);
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->route('login')->with('error',"Wrong Email Or Password");
    }
    public function showLoginForm() {
        return view('site.auth.login');
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginUser($user);
        return redirect()->route('home');

    }
    public function handleGithubCallback()
    {
        $user = Socialite::driver('github')->user();
        $this->_registerOrLoginUser($user);
        return redirect()->route('home');
    }
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $this->_registerOrLoginUser($user);
        return redirect()->route('home');
    }
    public function _registerOrLoginUser($data){
        $user = User::where('email','=',$data->email)->first();
        if(!$user){
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->email_verified_at = now();
            $user->status = 'active';
            $user->save();
        }
        Auth::login($user);
    }
}
