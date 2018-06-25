<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pengaduan;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Data Pengaduan Masuk";

        $data = Pengaduan::all()->sortByDesc('id');

        return view('pengaduan.index',compact(['data','page_title']));
    }

    public function approved()
    {
        $page_title = "Data Pengaduan Disetujui";

        $data = Pengaduan::whereStatus(2)->get();

        return view('pengaduan.approved',compact(['data','page_title']));
    }

    public function rejected()
    {
        $page_title = "Data Pengaduan Ditolak";

        $data = Pengaduan::whereStatus(3)->get();

        return view('pengaduan.rejected',compact(['data','page_title']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Input Data Pengaduan";

        return view('pengaduan.create',compact(['page_title']));
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

        $pengaduan = new Pengaduan;

        $pengaduan->create($input);

        return redirect('/admin/pengaduan')
            ->with('message', 'Data Pengaduan Telah Tersimpan!')
            ->with('status','success')
            ->with('type','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        $page_title = $pengaduan->title_pengaduan;

        return view('pengaduan.show',compact(['pengaduan','page_title']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        $page_title = "Edit Pengaduan : " .$pengaduan->title_pengaduan;

        if (empty($pengaduan)) {
            return redirect()->back()
                    ->with('message', 'Data Tidak Ditemukan!')
                    ->with('status','error')
                    ->with('type','error');
        }

        return view('pengaduan.edit',compact(['page_title','pengaduan']));
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

        $pengaduan = Pengaduan::findOrFail($id);

        try {
            $pengaduan->update($input);
            return redirect()->back()
                            ->with('message','Data Berhasil Diupdate!')
                            ->with('status','success')
                            ->with('type','success');
        } catch (Exception $e) {
            return redirect()->back()
                            ->with('message',$e->getMessage())
                            ->with('status','Something Wrong!')
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
        //
    }
}
