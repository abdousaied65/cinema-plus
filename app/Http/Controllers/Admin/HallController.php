<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use Illuminate\Http\Request;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $halls = Hall::all();
        return view('admin.halls.index',compact('halls'));
    }


    public function create()
    {
        return view('admin.halls.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'name_ar' => 'required',
            'ticket_price' => 'required'
        ]);
        $hall = Hall::create([
            'name' => $request->input('name'),
            'name_ar' => $request->input('name_ar'),
            'ticket_price' => $request->input('ticket_price')
        ]);
        return redirect()->route('admin.halls.index')
            ->with('success', trans('msgs.Hall Added Successfully'));
    }
    public function edit($id)
    {
        $hall = Hall::findOrFail($id);
        return view('admin.halls.edit', compact('hall'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'name_ar' => 'required',
            'ticket_price' => 'required'
        ]);
        $hall = Hall::findOrFail($id);
        $hall->name = $request->input('name');
        $hall->name_ar = $request->input('name_ar');
        $hall->ticket_price = $request->input('ticket_price');
        $hall->save();
        return redirect()->route('admin.halls.index')
            ->with('success', trans('msgs.Hall Updated Successfully'));
    }

    public function destroy(Request $request)
    {
        Hall::findOrFail($request->hall_id)->delete();
        return redirect()->route('admin.halls.index')
            ->with('success', trans('msgs.Hall Deleted Successfully'));
    }

    public function showTrashed()
    {
        $data = Hall::onlyTrashed()->get();
        return view('admin.halls.trashed', compact('data'));
    }

    public function restoreTrashed($id)
    {
        Hall::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.halls.index')
            ->with('success', trans('msgs.Hall restored Successfully'));
    }
}
