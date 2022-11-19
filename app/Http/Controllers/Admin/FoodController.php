<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\FoodType;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $data = Food::all();
        return view('admin.foods.index',compact('data'));
    }

    public function create()
    {
        $types = FoodType::all();
        return view('admin.foods.create',compact('types'));
    }

    public function store(Request $request)
    {

        $food = Food::create($request->all());
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $uploadDir = 'uploads/foods/' . $food->id;
            $image->move($uploadDir, $fileName);
            $food->image = $uploadDir . '/' . $fileName;
            $food->save();
        }
        return redirect()->route('admin.foods.index')
            ->with('success', trans('msgs.food Added Successfully'));
    }

    public function edit($id)
    {
        $types = FoodType::all();
        $food = Food::findOrFail($id);
        return view('admin.foods.edit',compact('food','types'));
    }

    public function update(Request $request, $id)
    {
        $food = Food::findOrFail($id);
        $food->update($request->all());
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $uploadDir = 'uploads/foods/' . $food->id;
            $image->move($uploadDir, $fileName);
            $food->image = $uploadDir . '/' . $fileName;
            $food->save();
        }
        return redirect()->route('admin.foods.index')
            ->with('success', trans('msgs.food Updated Successfully'));
    }
    public function destroy(Request $request)
    {
        Food::findOrFail($request->food_id)->delete();
        return redirect()->route('admin.foods.index')->with('success', trans('msgs.food Deleted Successfully'));
    }

    public function showTrashed()
    {
        $data = Food::onlyTrashed()->get();
        return view('admin.foods.trashed', compact('data'));
    }

    public function restoreTrashed($id)
    {
        Food::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.foods.index')->with('success', trans('msgs.food restored Successfully'));
    }
}
