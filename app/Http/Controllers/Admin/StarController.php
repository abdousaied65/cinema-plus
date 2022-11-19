<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Star;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $stars = Star::orderBy('id', 'ASC')->get();
        return view('admin.stars.index', compact('stars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.stars.create');
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
        $star = Star::create([
            'name' => $request->input('name'),
            'name_ar' => $request->input('name_ar'),
        ]);
//        return redirect()->route('admin.stars.create');
        return redirect()->route('admin.stars.index')
            ->with('success', trans('msgs.Star Added Successfully'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Star  $star
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $star = Star::findOrFail($id);
        return view('admin.stars.edit', compact('star'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Star  $star
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'name_ar' => 'required',
        ]);
        $star = Star::findOrFail($id);
        $star->name = $request->input('name');
        $star->name_ar = $request->input('name_ar');
        $star->save();
        return redirect()->route('admin.stars.index')
            ->with('success', trans('msgs.Star Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Star  $star
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy(Request $request)
    {
        Star::findOrFail($request->star_id)->delete();
        return redirect()->route('admin.stars.index')
            ->with('success', trans('msgs.Star Deleted Successfully'));
    }


    public function showTrashed()
    {
        $data = Star::onlyTrashed()->get();
        return view('admin.stars.trashed', compact('data'));
    }

    public function restoreTrashed($id)
    {
        Star::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.stars.index')->with('success', trans('msgs.Star restored Successfully'));
    }
}
