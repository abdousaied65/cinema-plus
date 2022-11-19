<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\ReserveFood;
use App\Models\ReserveGift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }
    public function previousCheckouts()
    {
        $user_id = Auth::user()->id;
        $tickets = Reservation::where('user_id',$user_id)->get();
        $foods = ReserveFood::where('user_id',$user_id)->get();

        return view('previous_checkouts',compact('tickets','foods'));
    }

    public function afterPayment(Request $request)
    {
        $inputs = $request->all();
        $payment = Payment::create([
            'user_id' => Auth::user()->id,
            'payment_option' => $inputs['payment_option'],
            'card_number' => $inputs['card_number'],
            'name_on_card' => $inputs['name_on_card'],
            'expiration' => $inputs['expiration'],
            'cvv' => $inputs['cvv'],
            'amount' => $inputs['amount'],
            'created_at' => now()
        ]);
        $reservation = Reservation::where('user_id',Auth::user()->id);
        $reservation->update([
            'status' => 1,
            'updated_at' => now()
        ]);
        $reserveFood = ReserveFood::where('user_id',Auth::user()->id);
        $reserveFood->update([
            'status' => 1,
            'updated_at' => now()
        ]);
        $reserveGift = ReserveGift::where('sender_id',Auth::user()->id);
        $reserveGift->update([
            'status' => 1,
            'updated_at' => now()
        ]);
        return redirect()->route('checkout')->with('success', trans('msgs.Payment Has been Received'));
    }
}
