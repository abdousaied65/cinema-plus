<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\City;
use App\Models\Contact;
use App\Models\Food;
use App\Models\Genre;
use App\Models\Hall;
use App\Models\Movie;
use App\Models\Reservation;
use App\Models\ReserveFood;
use App\Models\ReserveGift;
use App\Models\Room;
use App\Models\Show;
use App\Models\Star;
use App\Models\Subscribe;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user_id = Auth::user()->id;
                $resevations = Reservation::where('user_id', $user_id)
                    ->where('status',0)
                    ->get();
                View::share('reservations', $resevations);

                $reseve_foods = ReserveFood::where('user_id', $user_id)
                    ->where('status',0)
                    ->get();
                View::share('reseve_foods', $reseve_foods);

                $reseve_gifts = ReserveGift::where('sender_id', $user_id)
                    ->where('status',0)
                    ->get();
                View::share('reseve_gifts', $reseve_gifts);
            }
        });

        $data = Contact::where('status', '0')->get();
        View::share('unread_messages', $data);

        $contacts = Contact::all();
        View::share('contacts', $contacts);

        $admins = Admin::all();
        View::share('admins', $admins);

        $genres = Genre::all();
        View::share('genres', $genres);

        $stars = Star::all();
        View::share('stars', $stars);

        $movies = Movie::all();
        View::share('movies', $movies);

        $cities = City::all();
        View::share('cities', $cities);

        $rooms = Room::all();
        View::share('rooms', $rooms);

        $halls = Hall::all();
        View::share('halls', $halls);

        $users = User::all();
        View::share('users', $users);

        $subscribes = Subscribe::all();
        View::share('subscribes', $subscribes);

        $foods = Food::all();
        View::share('foods', $foods);

        $shows = Show::all();
        View::share('shows', $shows);


    }
}
