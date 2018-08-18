<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Pengaduan;
use App\User;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $pengaduan = Pengaduan::findOrFail($input['pengaduan_id']);

        if($request->hasFile('attachment')){
            $folderUpload = config('settings.folder_upload_location').Carbon::now(new \DateTimeZone('Asia/Jakarta'))
                        ->toDateString()."-".$pengaduan->title_pengaduan."/";

            $fileName = md5(rand(0,2000)).'.'.$request->attachment->getClientOriginalExtension();
            if ($request->file('attachment')->isValid()) {
                $request->attachment->move(public_path($folderUpload), $fileName);

                $pengaduan->report()->create([
                    'body' => $input['body'],
                    'user_id' => Auth::user()->id,
                    'pengaduan_id' => $input['pengaduan_id'],
                    'attachment' => $folderUpload.$fileName
                ]);

            }

        }

        $pengaduan->report()->create([
            'body' => $input['body'],
            'user_id' => Auth::user()->id,
            'pengaduan_id' => $input['pengaduan_id']
        ]);

        return redirect()->back()
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
        //
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
        //
    }

    public function pengaduanWithReport()
    {
        $data = Pengaduan::whereStatus(2)->has('report')->get();

        $team = User::where('role_id',5)->get();

        $page_title = "Data Laporan Penyidikan Masuk";

        return view('pengaduan.index',compact(['data','team','page_title']));
    }

    public function pengaduanWithReportApproved()
    {
        $data = Pengaduan::whereStatus(2)->whereHas('report', function ($query) {
            $query->where('status', '=', 2);
        })->get();

        $team = User::where('role_id',5)->get();

        $page_title = "Data Laporan Penyidikan Masuk";

        return view('pengaduan.index',compact(['data','team','page_title']));
    }

    public function pengaduanWithReportRejected()
    {
        $data = Pengaduan::whereStatus(2)->whereHas('report', function ($query) {
            $query->where('status', '=', 3);
        })->get();

        $team = User::where('role_id',5)->get();

        $page_title = "Data Laporan Penyidikan Masuk";

        return view('pengaduan.index',compact(['data','team','page_title']));
    }
}
