<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subscribe_email' => 'required'
        ]);
        $subscribe_email = $request->subscribe_email;
        $email_check = Subscribe::where('subscribe_email', '=', $subscribe_email)->first();
        if($email_check === null) {
            // user doesn't exist
            Subscribe::create($request->all());
            return redirect()->back()->with('success',trans('msgs.Email Subscribed Successfully'));
        }
        else{
            return redirect()->back()->with('error',trans('msgs.Email Already Existed'));
        }
    }
}
