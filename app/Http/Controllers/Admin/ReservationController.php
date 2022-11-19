<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\ReserveFood;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function tickets(Request $request){
        $tickets = Reservation::orderBy('id', 'DESC')->get();
        return view('admin.reservations.tickets', compact('tickets'));
    }
    public function foods(Request $request){
        $foods = ReserveFood::orderBy('id', 'DESC')->get();
        return view('admin.reservations.foods', compact('foods'));
    }
}
