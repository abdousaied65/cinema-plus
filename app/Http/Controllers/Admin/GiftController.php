<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gift;
use App\Models\ReserveGift;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $gifts = Gift::all();
        return view('admin.gifts.index',compact('gifts'));
    }


    public function create()
    {
        return view('admin.gifts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'name_ar' => 'required',
            'description' => 'required',
            'description_ar' => 'required',
            'gift_price' => 'required',
            'expiration_date' => 'required'
        ]);
        $gift = Gift::create([
            'name' => $request->input('name'),
            'name_ar' => $request->input('name_ar'),
            'description' => $request->input('description'),
            'description_ar' => $request->input('description_ar'),
            'expiration_date' => $request->input('expiration_date'),
            'gift_price' => $request->input('gift_price')
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $uploadDir = 'uploads/gifts/' . $gift->id;
            $image->move($uploadDir, $fileName);
            $gift->image = $uploadDir . '/' . $fileName;
            $gift->save();
        }
        return redirect()->route('admin.gifts.index')
            ->with('success', trans('msgs.Gift Added Successfully'));
    }
    public function edit($id)
    {
        $gift = Gift::findOrFail($id);
        return view('admin.gifts.edit', compact('gift'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'name_ar' => 'required',
            'description' => 'required',
            'description_ar' => 'required',
            'gift_price' => 'required',
            'expiration_date' => 'required'
        ]);
        $gift = Gift::findOrFail($id);
        $gift->update($request->all());
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $uploadDir = 'uploads/gifts/' . $gift->id;
            $image->move($uploadDir, $fileName);
            $gift->image = $uploadDir . '/' . $fileName;
            $gift->save();
        }
        return redirect()->route('admin.gifts.index')
            ->with('success', trans('msgs.Gift Updated Successfully'));
    }

    public function destroy(Request $request)
    {
        Gift::findOrFail($request->gift_id)->delete();
        return redirect()->route('admin.gifts.index')
            ->with('success', trans('msgs.Gift Deleted Successfully'));
    }

    public function showSent()
    {
        $data = ReserveGift::all();
        return view('admin.gifts.sent', compact('data'));
    }
    public function showTrashed()
    {
        $data = Gift::onlyTrashed()->get();
        return view('admin.gifts.trashed', compact('data'));
    }

    public function restoreTrashed($id)
    {
        Gift::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.gifts.index')
            ->with('success', trans('msgs.Gift restored Successfully'));
    }
}
