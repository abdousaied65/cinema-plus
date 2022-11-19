<?php

use App\Models\City;
use App\Models\Food;
use App\Models\Show;
use App\Models\FoodType;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
    Route::get('/', function () {
        $some_shows = Show::query()->where('status','=','On')->limit(3)->orderBy('created_at','DESC')->get();
        $soon_shows = Show::query()->where('status','=','Soon')->limit(3)->orderBy('created_at','DESC')->get();
        return view('index',compact('some_shows','soon_shows'));
    })->name('index');
    Route::get('/about', function () {
        return view('about');
    })->name('about');
    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');
    Route::get('/conditions', function () {
        return view('conditions');
    })->name('conditions');
    Route::get('/policy', function () {
        return view('policy');
    })->name('policy');
    Route::get('/branches', function () {
        $cities = City::all();
        return view('branches',compact('cities'));
    })->name('branches');

    Route::get('/foods', function () {
        $foods = Food::all();
        $foods_types = FoodType::all();
        return view('foods',compact('foods','foods_types'));
    })->name('foods')->middleware('auth:web');
    Route::get('/now-showing','Site\ContactController@nowShowing')->name('now.showing');
    Route::get('/showing-soon','Site\ContactController@ShowingSoon')->name('showing.soon');
    Route::get('/city/loadDetails/{id}','Site\ContactController@loadDetails');

    Route::get('/now-showing-by-genders','Site\ContactController@filterbygenre')->name('filter.movies.by.genre');
    Route::get('/now-showing-by-stars','Site\ContactController@filterbystar')->name('filter.movies.by.star');
    Route::get('/now-showing-by-search','Site\ContactController@filterbysearch')->name('filter.movies.by.search');

    Route::get('/soon-showing-by-genders','Site\ContactController@filtersoonbygenre')->name('filter.soon.movies.by.genre');
    Route::get('/soon-showing-by-stars','Site\ContactController@filtersoonbystar')->name('filter.soon.movies.by.star');
    Route::get('/soon-showing-by-search','Site\ContactController@filtersoonbysearch')->name('filter.soon.movies.by.search');

    Route::get('/show-details/{id}','Site\ShowController@index')->name('show.details');
    Route::get('/show-ticket-plan/{id}','Site\ShowController@ticket_plan')->name('show.ticket.plan')->middleware('auth:web');

    Route::get('/choose-seats','Site\ShowController@chooseSeats')->name('choose.seats')->middleware('auth:web');
    Route::get('/choose-seats-s2','Site\ShowController@chooseSeatsS2')->name('choose.seats.s2')->middleware('auth:web');
    Route::get('/choose-seats-s3','Site\ShowController@chooseSeatsS3')->name('choose.seats.s3')->middleware('auth:web');

    Route::get('/reserve-foods','Site\ShowController@reserveFoods')->name('reserve.foods')->middleware('auth:web');

    Route::get('/checkout','Site\CheckoutController@checkout')->name('checkout')->middleware('auth:web');

    Route::post('checkout','Site\CheckoutController@afterpayment')->name('checkout.credit-card')->middleware('auth:web');

    Route::get('previous-checkouts','Site\CheckoutController@previousCheckouts')->name('previous-checkouts')->middleware('auth:web');
    Route::get('profile/{id}','Site\ProfileController@profile')->name('profile')->middleware('auth:web');
    Route::patch('profile-edit/{id}','Site\ProfileController@editProfile')->name('profile.edit')->middleware('auth:web');

    Route::get('gifts','Site\GiftController@index')->name('gifts')->middleware('auth:web');
    Route::post('gifts-store','Site\GiftController@store')->name('gifts.store')->middleware('auth:web');

    Route::post('subscription', 'Site\SubscribeController@store')->name('subscription');
    Route::post('form/contact', 'Site\ContactController@store')->name('form.contact');

});

// *********  Admin Routes ******** //

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
    Auth::routes(
        [
            'verify' => false,
            'register' => false,
        ]
    );
    Route::GET('admin/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::POST('admin/login', 'Auth\LoginController@login');
    Route::POST('admin/logout', 'Auth\LoginController@logout')->name('admin.logout');
    Route::GET('admin/password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('admin.password.confirm');
    Route::POST('admin/password/confirm', 'Auth\ConfirmPasswordController@confirm');
    Route::POST('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::GET('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::POST('admin/password/reset', 'Auth\ResetPasswordController@reset')->name('admin.password.update');
    Route::GET('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
});
Route::group(
    ['middleware' => ['auth:admin-web', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
        'prefix' => LaravelLocalization::setLocale() . '/admin',
        'namespace' => 'Admin'
    ], function () {
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::get('/home', 'HomeController@index')->name('admin.home');
    // Admins Routes
    Route::resource('admins', 'AdminController')->names([
        'index' => 'admin.admins.index',
        'create' => 'admin.admins.create',
        'update' => 'admin.admins.update',
        'destroy' => 'admin.admins.destroy',
        'edit' => 'admin.admins.edit',
        'store' => 'admin.admins.store',
        'show' => 'admin.admins.show',
    ]);
    Route::get('admins-trashed', 'AdminController@showTrashed')->name('admin.admins.trashed');
    Route::post('restore-trashed/{id}', 'AdminController@restoreTrashed')->name('admin.restore.trashed');

    // Roles Routes
    Route::resource('roles', 'RoleController')->names([
        'index' => 'admin.roles.index',
        'create' => 'admin.roles.create',
        'update' => 'admin.roles.update',
        'destroy' => 'admin.roles.destroy',
        'edit' => 'admin.roles.edit',
        'store' => 'admin.roles.store',
        'show' => 'admin.roles.show',
    ]);
    // Profile Routes
    Route::get('profile/edit/{id}', 'ProfileController@edit')->name('admin.profile.edit');
    Route::patch('profile/edit/{id}', 'ProfileController@update')->name('admin.profile.update');
    Route::patch('profile/store/{id}', 'ProfileController@store')->name('admin.profile.store');
    // Genres Routes
    Route::resource('genres', 'GenreController')->names([
        'index' => 'admin.genres.index',
        'create' => 'admin.genres.create',
        'update' => 'admin.genres.update',
        'destroy' => 'admin.genres.destroy',
        'edit' => 'admin.genres.edit',
        'store' => 'admin.genres.store',
    ]);

    Route::get('genres-trashed', 'GenreController@showTrashed')->name('admin.genres.trashed');
    Route::post('restore-genres-trashed/{id}', 'GenreController@restoreTrashed')->name('admin.genres.restore.trashed');


    // Stars Routes
    Route::resource('stars', 'StarController')->names([
        'index' => 'admin.stars.index',
        'create' => 'admin.stars.create',
        'update' => 'admin.stars.update',
        'destroy' => 'admin.stars.destroy',
        'edit' => 'admin.stars.edit',
        'store' => 'admin.stars.store',
    ]);

    Route::get('stars-trashed', 'StarController@showTrashed')->name('admin.stars.trashed');
    Route::post('restore-stars-trashed/{id}', 'StarController@restoreTrashed')->name('admin.stars.restore.trashed');

    // Movies Routes
    Route::resource('movies', 'MovieController')->names([
        'index' => 'admin.movies.index',
        'create' => 'admin.movies.create',
        'update' => 'admin.movies.update',
        'destroy' => 'admin.movies.destroy',
        'edit' => 'admin.movies.edit',
        'store' => 'admin.movies.store',
        'show' => 'admin.movies.show',
    ]);
    Route::get('movies-trashed', 'MovieController@showTrashed')->name('admin.movies.trashed');
    Route::post('restore-movies-trashed/{id}', 'MovieController@restoreTrashed')->name('admin.movies.restore.trashed');

    Route::get('movies-now-showing', 'MovieController@ShowNowShowing')->name('admin.movies.now.showing');

    // Cities Routes
    Route::resource('cities', 'CityController')->names([
        'index' => 'admin.cities.index',
        'create' => 'admin.cities.create',
        'update' => 'admin.cities.update',
        'destroy' => 'admin.cities.destroy',
        'edit' => 'admin.cities.edit',
        'store' => 'admin.cities.store',
    ]);

    Route::get('cities-trashed', 'CityController@showTrashed')->name('admin.cities.trashed');
    Route::post('restore-cities-trashed/{id}', 'CityController@restoreTrashed')->name('admin.cities.restore.trashed');

    // Rooms Routes
    Route::resource('rooms', 'RoomController')->names([
        'index' => 'admin.rooms.index',
        'create' => 'admin.rooms.create',
        'update' => 'admin.rooms.update',
        'destroy' => 'admin.rooms.destroy',
        'edit' => 'admin.rooms.edit',
        'store' => 'admin.rooms.store',
    ]);

    Route::get('rooms-trashed', 'RoomController@showTrashed')->name('admin.rooms.trashed');
    Route::post('restore-rooms-trashed/{id}', 'RoomController@restoreTrashed')->name('admin.rooms.restore.trashed');

    // Members Routes
    Route::resource('members', 'MemberController')->names([
        'index' => 'admin.members.index',
        'create' => 'admin.members.create',
        'update' => 'admin.members.update',
        'destroy' => 'admin.members.destroy',
        'edit' => 'admin.members.edit',
        'store' => 'admin.members.store'
    ]);

    Route::get('members-trashed', 'MemberController@showTrashed')->name('admin.members.trashed');
    Route::post('restore-members-trashed/{id}', 'MemberController@restoreTrashed')->name('admin.members.restore.trashed');
    Route::get('changeStatus-member/{id}', 'MemberController@changeStatus')->name('admin.members.changeStatus');

    // Contacts Routes
    Route::resource('contacts', 'ContactController')->names([
        'index' => 'admin.contacts.index',
        'show' => 'admin.contacts.show',
        'destroy' => 'admin.contacts.destroy'
    ]);
    Route::patch('contacts-make-as-read', 'ContactController@makeAsRead')->name('admin.contacts.make.as.read');
    Route::patch('contacts-make-as-important', 'ContactController@makeAsImportant')->name('admin.contacts.make.as.important');
    Route::patch('contacts-make-as-destroy', 'ContactController@makeAsDestroy')->name('admin.contacts.make.as.destroy');
    Route::patch('contacts-make-sent-as-destroy', 'ContactController@makeSentAsDestroy')->name('admin.contacts.make.sent.as.destroy');
    Route::patch('contacts-print', 'ContactController@print')->name('admin.contacts.print');
    Route::get('contacts-compose', 'ContactController@compose')->name('admin.contacts.compose');
    Route::post('contacts-send', 'ContactController@send')->name('admin.contacts.send');
    Route::get('contacts-sent', 'ContactController@showSent')->name('admin.contacts.sent');
    Route::get('contacts-trashed', 'ContactController@showTrashed')->name('admin.contacts.trashed');
    Route::post('restore-contacts-trashed', 'ContactController@restoreTrashed')->name('admin.contacts.restore.trashed');
    Route::get('contacts-important', 'ContactController@showImportant')->name('admin.contacts.important');


    // Subscribes Routes
    Route::resource('subscribes', 'SubscribeController')->names([
        'index' => 'admin.subscribes.index'
    ]);
    Route::patch('subscribes-make-as-destroy', 'SubscribeController@makeAsDestroy')->name('admin.subscribes.make.as.destroy');
    Route::get('subscribes-compose', 'SubscribeController@compose')->name('admin.subscribes.compose');
    Route::post('subscribes-send', 'SubscribeController@send')->name('admin.subscribes.send');

    // Foods Routes
    Route::resource('foods', 'FoodController')->names([
        'index' => 'admin.foods.index',
        'create' => 'admin.foods.create',
        'update' => 'admin.foods.update',
        'destroy' => 'admin.foods.destroy',
        'edit' => 'admin.foods.edit',
        'store' => 'admin.foods.store',
    ]);

    Route::get('foods-trashed', 'FoodController@showTrashed')->name('admin.foods.trashed');
    Route::post('restore-foods-trashed/{id}', 'FoodController@restoreTrashed')->name('admin.foods.restore.trashed');

    // Halls Routes
    Route::resource('halls', 'HallController')->names([
        'index' => 'admin.halls.index',
        'create' => 'admin.halls.create',
        'update' => 'admin.halls.update',
        'destroy' => 'admin.halls.destroy',
        'edit' => 'admin.halls.edit',
        'store' => 'admin.halls.store',
    ]);

    Route::get('halls-trashed', 'HallController@showTrashed')->name('admin.halls.trashed');
    Route::post('restore-halls-trashed/{id}', 'HallController@restoreTrashed')->name('admin.halls.restore.trashed');

    // Shows Routes
    Route::resource('shows', 'ShowController')->names([
        'index' => 'admin.shows.index',
        'create' => 'admin.shows.create',
        'update' => 'admin.shows.update',
        'destroy' => 'admin.shows.destroy',
        'edit' => 'admin.shows.edit',
        'store' => 'admin.shows.store',
    ]);
    Route::get('shows-create-s2/{id}', 'ShowController@showCreateS2')->name('admin.shows.create.s2');
    Route::post('shows-store_S2','ShowController@store_S2')->name('admin.shows.store_S2');

    Route::get('shows-create-s3/{id}', 'ShowController@showCreateS3')->name('admin.shows.create.s3');
    Route::post('shows-store_S3','ShowController@store_S3')->name('admin.shows.store_S3');

    Route::get('shows-trashed', 'ShowController@showTrashed')->name('admin.shows.trashed');
    Route::post('restore-shows-trashed/{id}', 'ShowController@restoreTrashed')->name('admin.shows.restore.trashed');

    Route::get('changeStatus-show/{id}', 'ShowController@changeStatus')->name('admin.shows.changeStatus');

    Route::get('tickets-reservations','ReservationController@tickets')->name('admin.reservations.tickets');
    Route::get('foods-reservations','ReservationController@foods')->name('admin.reservations.foods');
    Route::get('payments','PaymentController@index')->name('admin.payments.index');

    // Gifts Routes
    Route::resource('gifts', 'GiftController')->names([
        'index' => 'admin.gifts.index',
        'create' => 'admin.gifts.create',
        'update' => 'admin.gifts.update',
        'destroy' => 'admin.gifts.destroy',
        'edit' => 'admin.gifts.edit',
        'store' => 'admin.gifts.store',
    ]);

    Route::get('sent-gifts', 'GiftController@showSent')->name('admin.gifts.sent');

    Route::get('gifts-trashed', 'GiftController@showTrashed')->name('admin.gifts.trashed');
    Route::post('restore-gifts-trashed/{id}', 'GiftController@restoreTrashed')->name('admin.gifts.restore.trashed');


});


// *********  User Routes ******** //

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'namespace' => 'Site',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
    Auth::routes(
        [
            'verify' => true,
        ]
    );
    Route::get('login/google', 'Auth\LoginController@redirectToGoogle')->name('login.google');
    Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

    Route::get('login/facebook', 'Auth\LoginController@redirectToFacebook')->name('login.facebook');
    Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

    Route::get('login/github', 'Auth\LoginController@redirectToGithub')->name('login.github');
    Route::get('login/github/callback', 'Auth\LoginController@handleGithubCallback');

    Route::POST('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
    Route::GET('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::GET('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::POST('login', 'Auth\LoginController@login');
    Route::POST('logout', 'Auth\LoginController@logout')->name('logout');
    Route::GET('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
    Route::POST('password/confirm', 'Auth\ConfirmPasswordController@confirm');
    Route::POST('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::GET('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::POST('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    Route::GET('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'namespace' => 'Site',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function () {
    Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
});


Route::group(
    [
        'namespace' => 'Site'
    ], function () {
    Route::GET('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
});


?>
