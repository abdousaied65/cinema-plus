<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $genres = Genre::orderBy('id', 'ASC')->get();
        return view('admin.genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.genres.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'name_ar' => 'required'
        ]);
        $genre = Genre::create([
            'name' => $request->input('name'),
            'name_ar' => $request->input('name_ar'),
        ]);

        return redirect()->route('admin.genres.index')
            ->with('success', trans('msgs.Genre Added Successfully'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $genre = Genre::findOrFail($id);
        return view('admin.genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'name_ar' => 'required',
        ]);
        $genre = Genre::findOrFail($id);
        $genre->name = $request->input('name');
        $genre->name_ar = $request->input('name_ar');
        $genre->save();
        return redirect()->route('admin.genres.index')
            ->with('success', trans('msgs.Genre Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Genre::findOrFail($request->genre_id)->delete();
        return redirect()->route('admin.genres.index')
            ->with('success', trans('msgs.Genre Deleted Successfully'));
    }


    public function showTrashed()
    {
        $data = Genre::onlyTrashed()->get();
        return view('admin.genres.trashed', compact('data'));
    }

    public function restoreTrashed($id)
    {
        Genre::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.genres.index')->with('success', trans('msgs.Genre restored Successfully'));
    }
}
