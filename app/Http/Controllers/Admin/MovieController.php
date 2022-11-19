<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use App\Models\Genre;
use App\Models\Star;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MovieController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */

    public function index(Request $request)
    {
        $data = Movie::all();
        return view('admin.movies.index', compact('data'));
    }
    public function ShowNowShowing(){
        return view('admin.movies.nowShowing');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $genres = Genre::all();
        $stars = Star::all();
        return view('admin.movies.create', compact('genres', 'stars'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)
    {
        $movie = Movie::create($request->all());
        $movie->genres()->syncWithoutDetaching($request->genre_id);
        $movie->stars()->syncWithoutDetaching($request->star_id);
        if ($request->hasFile('movie_pic')) {
            $image = $request->file('movie_pic');
            $fileName = $image->getClientOriginalName();
            $uploadDir = 'uploads/movies/' . $movie->id;
            $image->move($uploadDir, $fileName);
            $movie->movie_pic = $uploadDir . '/' . $fileName;
            $movie->save();
        }
        //return redirect()->route('admin.movies.create');
        return redirect()->route('admin.movies.index')
            ->with('success', trans('msgs.Movie Added Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $movie = Movie::findorfail($id);
        return view('admin.movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $all_genres = Genre::all();
        $all_stars = Star::all();
        $genres = array();
        $stars = array();
        foreach ($movie->genres as $genre) {
            array_push($genres,$genre->id);
        }
        foreach ($movie->stars as $star) {
            array_push($stars,$star->id);
        }
        return view('admin.movies.edit', compact('movie', 'all_genres','all_stars','genres', 'stars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());
        $movie->genres()->sync($request->genre_id);
        $movie->stars()->sync($request->star_id);
        if ($request->hasFile('movie_pic')) {
            $image = $request->file('movie_pic');
            $fileName = $image->getClientOriginalName();
            $uploadDir = 'uploads/movies/' . $movie->id;
            $image->move($uploadDir, $fileName);
            $movie->movie_pic = $uploadDir . '/' . $fileName;
            $movie->save();
        }
        return redirect()->route('admin.movies.index')
            ->with('success', trans('msgs.Movie Updated Successfully'));
    }
    public function destroy(Request $request)
    {
        Movie::findOrFail($request->movie_id)->delete();
        return redirect()->route('admin.movies.index')->with('success', trans('msgs.Movie Deleted Successfully'));
    }

    public function showTrashed()
    {
        $data = Movie::onlyTrashed()->get();
        return view('admin.movies.trashed', compact('data'));
    }

    public function restoreTrashed($id)
    {
        Movie::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.movies.index')->with('success', trans('msgs.Movie restored Successfully'));
    }
}
