<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $cities = City::orderBy('id', 'ASC')->get();
        return view('admin.cities.index', compact('cities'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.cities.create');
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
        $city = City::create([
            'name' => $request->input('name'),
            'name_ar' => $request->input('name_ar'),
        ]);
        //return view('admin.cities.create');
        return redirect()->route('admin.cities.index')
            ->with('success', trans('msgs.City Added Successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('admin.cities.edit', compact('city'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'name_ar' => 'required',
        ]);
        $city = City::findOrFail($id);
        $city->name = $request->input('name');
        $city->name_ar = $request->input('name_ar');
        $city->save();
        return redirect()->route('admin.cities.index')
            ->with('success', trans('msgs.City Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy(Request $request)
    {
        City::findOrFail($request->city_id)->delete();
        return redirect()->route('admin.cities.index')
            ->with('success', trans('msgs.City Deleted Successfully'));
    }

    public function showTrashed()
    {
        $data = City::onlyTrashed()->get();
        return view('admin.cities.trashed', compact('data'));
    }

    public function restoreTrashed($id)
    {
        City::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.cities.index')->with('success', trans('msgs.City restored Successfully'));
    }
}
