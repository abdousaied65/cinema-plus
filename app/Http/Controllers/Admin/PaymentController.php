<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function index(Request $request){
        $payments = Payment::query()->orderBy('created_at','DESC')->get();
        return view('admin.payments.index',compact('payments'));
    }
}
