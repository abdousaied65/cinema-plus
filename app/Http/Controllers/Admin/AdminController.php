<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:show admin', ['only' => ['index', 'show']]);
        $this->middleware('permission:add admin', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit admin', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete admin', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */

    public function index(Request $request)
    {
        $data = Admin::all();
        return view('admin.admins.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();

        return view('admin.admins.create', compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|same:confirm-password',
            'role_name' => 'required',
            'type' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $admin = Admin::create($input);
        $admin->assignRole($request->input('role_name'));
        $profile = Profile::create([
            'phone_number' => '',
            'city_name' => '',
            'age' => '',
            'gender' => '',
            'profile_pic' => 'admin-assets/img/admin-avatar.png',
            'admin_id' => $admin->id
        ]);
        return redirect()->route('admin.admins.index')
            ->with('success', trans('msgs.Admin Added Successfully'));
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $admin = Admin::findorfail($id);
        return view('admin.admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        $roles = Role::pluck('name', 'name')->all();
        $adminRole = $admin->roles->pluck('name', 'name')->all();
        return view('admin.admins.edit', compact('admin', 'roles', 'adminRole'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'same:confirm-password',
            'role_name' => 'required',
            'type' => 'required'
        ]);
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }
        $admin = Admin::findOrFail($id);
        $admin->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $admin->assignRole($request->input('role_name'));
        return redirect()->route('admin.admins.index')
            ->with('success', trans('msgs.Admin Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Admin::findOrFail($request->admin_id)->delete();
        return redirect()->route('admin.admins.index')->with('success', trans('msgs.Admin Deleted Successfully'));
    }

    public function showTrashed()
    {
        $data = Admin::onlyTrashed()->get();
        return view('admin.admins.trashed', compact('data'));
    }

    public function restoreTrashed($id)
    {
        Admin::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.admins.index')->with('success', trans('msgs.Admin restored Successfully'));
    }
}
