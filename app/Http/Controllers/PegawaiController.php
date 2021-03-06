<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Daftar pegawai";

        $users = User::all();

        return view('pegawai.index',compact(['users','page_title']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Tambah pegawai";

        $roles = Role::where('id', '>', 1)->get();

        return view('pegawai.create',compact(['page_title','roles']));
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

        try {
            
            User::create($input);

            return redirect('/admin/pegawai')
                ->with('message', 'Data Telah Tersimpan!')
                ->with('status','success')
                ->with('type','success');

        } catch(\Exception $e)
        {
            return redirect()->back()->withInput()
            ->with('message', $e->getMessage())
            ->with('status','error')
            ->with('type','error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $page_title = "Edit User" .$user->fullName();

        if (empty($user)) {
            return redirect()->back()
                    ->with('message', 'Data Tidak Ditemukan!')
                    ->with('status','error')
                    ->with('type','error');
        }

        return view('pegawai.edit',compact(['page_title','user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $user = User::findOrFail($id);

        try {

            $user->update($input);

            return redirect()->route('admin.pegawai.index')
                            ->with('message', 'Data Telah Tersimpan!')
                            ->with('status','success')
                            ->with('type','success');
        } catch( \Exception $e)
        {
            return redirect()->back()->withInputs()
                            ->with('message', $e->getMessage())
                            ->with('status','error')
                            ->with('type','error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $delete = $user->delete();

        if ($delete) {
            return redirect()->back()
                        ->with('message',"Data $user->first_name Telah Dihapus!")
                        ->with('status','success')
                        ->with('type','success');
        }
    }
}
