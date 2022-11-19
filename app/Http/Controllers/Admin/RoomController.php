<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms.index',compact('rooms'));
    }


    public function create()
    {
        $cities = City::all();
        return view('admin.rooms.create',compact('cities'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'name_ar' => 'required',
            'address' => 'required',
            'address_ar' => 'required',
            'city_id' => 'required'
        ]);
        $room = Room::create([
            'name' => $request->input('name'),
            'name_ar' => $request->input('name_ar'),
            'address' => $request->input('address'),
            'address_ar' => $request->input('address_ar'),
            'city_id' => $request->input('city_id')
        ]);
        return redirect()->route('admin.rooms.index')
            ->with('success', trans('msgs.Room Added Successfully'));
    }
    public function edit($id)
    {
        $cities = City::all();
        $room = Room::findOrFail($id);
        return view('admin.rooms.edit', compact('room','cities'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'name_ar' => 'required',
            'address' => 'required',
            'address_ar' => 'required',
            'city_id' => 'required'
        ]);
        $room = Room::findOrFail($id);
        $room->name = $request->input('name');
        $room->name_ar = $request->input('name_ar');
        $room->address = $request->input('address');
        $room->address_ar = $request->input('address_ar');
        $room->city_id = $request->input('city_id');
        $room->save();
        return redirect()->route('admin.rooms.index')
            ->with('success', trans('msgs.Room Updated Successfully'));
    }

    public function destroy(Request $request)
    {
        Room::findOrFail($request->room_id)->delete();
        return redirect()->route('admin.rooms.index')
            ->with('success', trans('msgs.Room Deleted Successfully'));
    }

    public function showTrashed()
    {
        $data = Room::onlyTrashed()->get();
        return view('admin.rooms.trashed', compact('data'));
    }

    public function restoreTrashed($id)
    {
        Room::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.rooms.index')
            ->with('success', trans('msgs.Room restored Successfully'));
    }
}
