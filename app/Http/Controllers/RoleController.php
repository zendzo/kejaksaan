<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Users Role";

        $roles = Role::all();

        return view('role.index',compact(['page_title','roles']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Tambah Role Baru";

        return view('role.create',compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $role = new Role;

        $role->create($input);

        return redirect('/admin/role')
            ->with('message', 'Data Telah Tersimpan!')
            ->with('status','success')
            ->with('type','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $page_title = "Edit Role ".$role->name;

        return view('role.edit',compact('role','page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->update($request->all());

        return redirect()->route('admin.role.index')
                        ->with('message', 'Data Telah Tersimpan!')
                        ->with('status','success')
                        ->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $delete = $role->delete();

        if ($delete) {
            return redirect()->back()
            ->with('message', 'Data Telah Terhapus!')
            ->with('status','success')
            ->with('type','success');
        }
    }
}
