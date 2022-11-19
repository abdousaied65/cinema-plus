<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Room;
use App\Models\Show;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
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
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 0
        ]);
        return redirect()->back()->with('success', trans('msgs.Your Message Sent Successfully'));
    }
    public function loadDetails($city_id){
        $city_id = intval(trim($city_id));
        $row = Room::query()
            ->where('city_id',$city_id)
            ->get();
        echo "<option value=''>".trans('msgs.Choose Room')."</option>";
        foreach ($row as $room){
            if (App::getLocale()== "ar"){
                echo "<option value='".$room->id."'>".$room->name_ar."</option>";
            }
            else{
                echo "<option value='".$room->id."'>".$room->name."</option>";
            }
        }
    }
    public function nowShowing(Request $request)
    {
        return view('now_showing', [
            'now_showing_shows' => Show::query()
                ->where('status','like','On')
                ->latest()
                ->paginate(6)
        ]);
    }
    public function ShowingSoon(Request $request)
    {
        return view('showing_soon', [
            'showing_soon_shows' => Show::query()
                ->where('status','like','Soon')
                ->latest()
                ->paginate(6)
        ]);
    }
    public function filterbygenre(Request $request){
        $genres = $request->genre;
        $all_genres = array();
        foreach ($genres as $genre){
            array_push($all_genres,$genre);
        }
        $data = DB::table('movie_genre')->whereIn('genre_id',$all_genres)->select('movie_id')->get();
        $all_movies = array();
        foreach ($data as $movie) {
            array_push($all_movies,$movie->movie_id);
        }
        $movies = array_unique($all_movies);
        return view('now_showing', [
            'now_showing_shows' => Show::query()
                ->whereIn('movie_id',$movies)
                ->where('status','like','On')
                ->latest()
                ->paginate(6) ,
            'all_genres' =>$all_genres
        ]);
    }

    public function filtersoonbygenre(Request $request){
        $genres = $request->genre;
        $all_genres = array();
        foreach ($genres as $genre){
            array_push($all_genres,$genre);
        }
        $data = DB::table('movie_genre')->whereIn('genre_id',$all_genres)->select('movie_id')->get();
        $all_movies = array();
        foreach ($data as $movie) {
            array_push($all_movies,$movie->movie_id);
        }
        $movies = array_unique($all_movies);
        return view('showing_soon', [
            'showing_soon_shows' => Show::query()
                ->whereIn('movie_id',$movies)
                ->where('status','like','Soon')
                ->latest()
                ->paginate(6) ,
            'all_genres' =>$all_genres
        ]);
    }

    public function filterbystar(Request $request){
        $stars = $request->star;
        $all_stars = array();
        foreach ($stars as $star){
            array_push($all_stars,$star);
        }
        $data = DB::table('movie_star')->whereIn('star_id',$all_stars)->select('movie_id')->get();
        $all_movies = array();
        foreach ($data as $movie) {
            array_push($all_movies,$movie->movie_id);
        }
        $movies = array_unique($all_movies);
        return view('now_showing', [
            'now_showing_shows' => Show::query()
                ->whereIn('movie_id',$movies)
                ->where('status','like','On')
                ->latest()
                ->paginate(6) ,
            'all_stars' =>$all_stars
        ]);
    }
    public function filtersoonbystar(Request $request){
        $stars = $request->star;
        $all_stars = array();
        foreach ($stars as $star){
            array_push($all_stars,$star);
        }
        $data = DB::table('movie_star')->whereIn('star_id',$all_stars)->select('movie_id')->get();
        $all_movies = array();
        foreach ($data as $movie) {
            array_push($all_movies,$movie->movie_id);
        }
        $movies = array_unique($all_movies);
        return view('showing_soon', [
            'showing_soon_shows' => Show::query()
                ->whereIn('movie_id',$movies)
                ->where('status','like','Soon')
                ->latest()
                ->paginate(6) ,
            'all_stars' =>$all_stars
        ]);
    }

    public function filterbysearch(Request $request){
        $room_id = $request->room_id;
        $date = $request->date;
        $this->validate($request, [
            'room_id' => 'required',
            'date' => 'required'
        ]);
        $data = DB::table('show_room')
            ->where('room_id',$room_id)
            ->select('show_id')
            ->get();
        $all_shows = array();
        foreach ($data as $show) {
            array_push($all_shows,$show->show_id);
        }
        $shows = array_unique($all_shows);
        $data2 = DB::table('show_day')
            ->where('date',$date)
            ->whereIn('show_id',$shows)
            ->select('show_id')
            ->get();
        $all_shows = array();
        foreach ($data2 as $show) {
            array_push($all_shows,$show->show_id);
        }
        return view('now_showing', [
            'now_showing_shows' => Show::query()
                ->where('status','like','On')
                ->whereIn('id',$all_shows)
                ->latest()
                ->paginate(6)
        ]);
    }

    public function filtersoonbysearch(Request $request){
        $room_id = $request->room_id;
        $date = $request->date;
        $this->validate($request, [
            'room_id' => 'required',
            'date' => 'required'
        ]);
        $data = DB::table('show_room')
            ->where('room_id',$room_id)
            ->select('show_id')
            ->get();
        $all_shows = array();
        foreach ($data as $show) {
            array_push($all_shows,$show->show_id);
        }
        $shows = array_unique($all_shows);
        $data2 = DB::table('show_day')
            ->where('date',$date)
            ->whereIn('show_id',$shows)
            ->select('show_id')
            ->get();
        $all_shows = array();
        foreach ($data2 as $show) {
            array_push($all_shows,$show->show_id);
        }
        return view('showing_soon', [
            'showing_soon_shows' => Show::query()
                ->where('status','like','Soon')
                ->whereIn('id',$all_shows)
                ->latest()
                ->paginate(6)
        ]);
    }
}
