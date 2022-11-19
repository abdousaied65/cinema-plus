<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Gift;
use App\Models\ReserveGift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GiftController extends Controller
{

    public function index()
    {
        $gifts = Gift::all();
        return view('send_gift',compact('gifts'));
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $reserveGift = ReserveGift::create([
            'sender_id' => Auth::user()->id,
            'recipient_name' => $inputs['recipient_name'],
            'recipient_email' => $inputs['recipient_email'],
            'recipient_number' => $inputs['recipient_number'],
            'message' => $inputs['message'],
            'card_id' => $inputs['card_id']
        ]);
        return redirect()->route('checkout')->with('success',trans('msgs.Gift Added To The Cart Successfully'));
    }
}
