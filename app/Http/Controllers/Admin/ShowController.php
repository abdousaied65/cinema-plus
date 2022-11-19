<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\Movie;
use App\Models\Room;
use App\Models\Show;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $shows = Show::all();
        return view('admin.shows.index',compact('shows'));
    }
    public function create()
    {
        $movies = Movie::all();
        $rooms = Room::all();
        return view('admin.shows.create', compact('movies', 'rooms'));
    }

    public function store(Request $request)
    {
        $show = Show::create($request->all());
        $show->rooms()->syncWithoutDetaching($request->room_id);
        return redirect()->route('admin.shows.create.s2', $show->id);
    }

    public function showCreateS2($id)
    {
        $show_id = Show::findOrFail($id);
        $halls = Hall::all();
        return view('admin.shows.create_s2', compact('show_id', 'halls'));
    }

    public function store_S2(Request $request)
    {
        $show = Show::findOrFail($request->show_id);
        $show_id = $show->id;
        foreach ($request->hall_id as $request){
            foreach ($request as $key => $item) {
                $hall = DB::table('show_hall')->insert([
                    'show_id' => $show_id,
                    'room_id' => $key,
                    'hall_id' => $item
                ]);
            }
        }
        return redirect()->route('admin.shows.create.s3', $show_id);
    }

    public function showCreateS3($id)
    {
        $show_id = Show::findOrFail($id);
        $times = Time::all();
        return view('admin.shows.create_s3', compact('show_id','times'));
    }

    public function store_S3(Request $request)
    {
        $show = Show::findOrFail($request->show_id);
        $show_id = $show->id;
        $days = $show->days;
        $startDate = $show->start_date;
        $endDate = $show->end_date;
        $endDate = strtotime($endDate);
        foreach($days as $day){
            for ($i = strtotime($day, strtotime($startDate)); $i <= $endDate; $i = strtotime('+1 week', $i))
            {
                $date = date('Y-m-d', $i);
                DB::table('show_day')->insert([
                    'show_id' => $show_id,
                    'day' => $day,
                    'date' => $date
                ]);
            }
        }
        $show = Show::findOrFail($request->show_id);
        $show_id = $show->id;
        foreach ($request->time as $request){
            foreach ($request as $key => $item) {
                $hall = DB::table('show_time')->insert([
                    'show_id' => $show_id,
                    'day' => $key,
                    'time' => $item
                ]);
            }
        }
        return redirect()->route('admin.shows.index')->with('success',trans('msgs.Show Added Successfully'));
    }

    public function changeStatus($id)
    {
        $show = Show::findOrFail($id);
        $status = $show->status;
        if ($status == "On"){
            $new_status = "Soon";
            $show->status = $new_status;
            $show->save();
        }
        else{
            $new_status = "On";
            $show->status = $new_status;
            $show->save();
        }
        return redirect()->route('admin.shows.index');
    }

    public function destroy(Request $request)
    {
        Show::findOrFail($request->show_id)->delete();
        return redirect()->route('admin.shows.index')->with('success', trans('msgs.Show Deleted Successfully'));
    }

    public function showTrashed()
    {
        $data = Show::onlyTrashed()->get();
        return view('admin.shows.trashed', compact('data'));
    }

    public function restoreTrashed($id)
    {
        Show::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.shows.index')->with('success', trans('msgs.Show restored Successfully'));
    }
}
