<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\Reservation;
use App\Models\ReserveFood;
use App\Models\Room;
use App\Models\Show;
use App\Models\ShowSeat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function index(Request $request, $id)
    {
        $show = Show::findOrFail($id);
        return view('show_details', compact('show'));
    }

    public function ticket_plan(Request $request, $id)
    {
        $show = Show::findOrFail($id);
        $rooms = $show->rooms;
        return view('show_ticket_plan', compact('show', 'rooms'));
    }

    public function chooseSeats(Request $request)
    {
        $inputs = $request->all();
        $show_id = $inputs['show_id'];
        $room_id = $inputs['room_id'];
        $hall_id = $inputs['hall_id'];
        $date = $inputs['date'];
        $day = date('l', strtotime($date));
        $show = Show::findOrFail($show_id);
        $room = Room::findOrFail($room_id);
        $hall = Hall::findOrFail($hall_id);
        $times = array();
        foreach ($show->times as $time) {
            if ($time->day == $day) {
                array_push($times, $time->time);
            }
        }
        return view('show_ticket_seat',compact('show','room','hall','show_id', 'room_id', 'hall_id','date', 'day', 'times'));
    }

    public function chooseSeatsS2(Request $request)
    {
        $inputs = $request->all();
        $show_id = $inputs['show_id'];
        $room_id = $inputs['room_id'];
        $hall_id = $inputs['hall_id'];
        $date = $inputs['date'];
        $day = $inputs['day'];
        $hall = Hall::findOrFail($hall_id);
        $ticket_price = $hall->ticket_price;
        $time = $inputs['time'];
        $old_seats = DB::table('show_seat')
            ->where('show_id','=',$show_id)
            ->where('room_id','=',$room_id)
            ->where('hall_id','=',$hall_id)
            ->where('day','=',$day)
            ->where('date','=',$date)
            ->where('time','=',$time)
            ->select('seat')
            ->get();
        $oldseats = array();
        foreach ($old_seats as $old_seat) {
            array_push($oldseats,$old_seat->seat);
        }
        return view('show_ticket_seat_s2',compact('oldseats','ticket_price','show_id', 'room_id', 'hall_id','date', 'day', 'time'));
    }

    public function chooseSeatsS3(Request $request)
    {
        $inputs = $request->all();
        $show_id = $inputs['show_id'];
        $room_id = $inputs['room_id'];
        $hall_id = $inputs['hall_id'];
        $date = $inputs['date'];
        $day = $inputs['day'];
        $time = $inputs['time'];
        $seats = $inputs['seats'];
        $ticket_price = $inputs['ticket_price'];
        $seats = array_unique($seats);
        foreach($seats as $seat){
            $ins = ShowSeat::create([
                'show_id' => $show_id,
                'room_id' => $room_id,
                'hall_id' => $hall_id,
                'day' => $day,
                'date' => $date,
                'time' => $time,
                'seat' => $seat,
                'ticket_price' => $ticket_price,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $seat_id = $ins->id;
            $user_id = Auth::user()->id;
            $res = Reservation::create([
                'user_id' => $user_id,
                'seat_id' => $seat_id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        return redirect()->route('foods');
    }

    public function reserveFoods(Request $request){
        $inputs = $request->all();
        $user_id = $inputs['user_id'];
        $food_id = $inputs['food_id'];
        $quantity = $inputs['quantity'];
        $unit_price = $inputs['unit_price'];
        $quantity_price = $unit_price * $quantity;
        $reserveFood = reserveFood::create([
            'user_id' => $user_id,
            'food_id' => $food_id,
            'quantity' => $quantity,
            'unit_price' => $unit_price,
            'quantity_price' => $quantity_price
        ]);
        return redirect()->route('foods')->with('success',trans('msgs.Food Added To The Cart Successfully'));
    }
}
