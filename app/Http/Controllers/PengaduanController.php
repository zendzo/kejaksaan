<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\File;
use Carbon\Carbon;

use App\Pengaduan;
use App\User;

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

        $data = Pengaduan::orderBy('id', 'DESC')->with('comments')->get();

        return view('pengaduan.index',compact(['data','page_title']));
    }

    public function approved()
    {
        $page_title = "Data Pengaduan Disetujui";

        $data = Pengaduan::whereStatus(2)->with('team')->get();

        $team = User::where('role_id',5)->get();

        return view('pengaduan.approved',compact(['data','team','page_title']));
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

        $validate = $request->validate([
            'no_ktp' => 'required',
            'name' => 'required',
            'gender_id' => 'required',
            'birth_date' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'title_pengaduan' => 'required',
            'content_pengaduan' => 'required',
            'status' => 'required',
            'attachment' => 'required|max:50000|mimes:doc,docx,pdf'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        // ->withErrors($validator)
                        // ->withInput()
                        ->with('message','Data Tidak Valid!')
                        ->with('status','Input Gagal')
                        ->with('type','error');
        }

        if (!$request->has('attachment')) {
            $pengaduan->create($request->except('attachment'));

            return redirect('admin/pengaduan')
                            ->with('message','Data Berhasil Diupdate!')
                            ->with('status','success')
                            ->with('type','success');
        }


        if($request->hasFile('attachment')){
            if ($request->file('attachment')->isValid()) {
				
                $folderUpload = config('settings.folder_upload_location').Carbon::now(new \DateTimeZone('Asia/Jakarta'))
                                ->toDateString()."-".$request['title_pengaduan']."/";

                $fileName = md5(rand(0,2000)).'.'.$request->attachment->getClientOriginalExtension();

                $request->attachment->move(public_path($folderUpload), $fileName);

                $pengaduan->no_ktp = $input['no_ktp'];
                $pengaduan->name   = $input['name'];
                $pengaduan->gender_id  = $input['gender_id'];
                $pengaduan->birth_date = $input['birth_date'];
                $pengaduan->phone  = $input['phone'];
                $pengaduan->email  = $input['email'];
                $pengaduan->address= $input['address'];
                $pengaduan->title_pengaduan= $input['title_pengaduan'];
                $pengaduan->content_pengaduan  = $input['content_pengaduan'];
                $pengaduan->attachment = $folderUpload.$fileName;
                
                $pengaduan->save();

                return redirect('/admin/pengaduan')
                    ->with('message', 'Data Pengaduan Telah Tersimpan!')
                    ->with('status','success')
                    ->with('type','success');
            }

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

        if (!$request->has('attachment')) {
            $pengaduan->update($request->except('attachment'));

            return redirect()->back()
                            ->with('message','Data Berhasil Diupdate!')
                            ->with('status','success')
                            ->with('type','success');
        }

        if($request->hasFile('attachment')){
            if ($request->file('attachment')->isValid()) {

                $folderUpload = config('settings.folder_upload_location').Carbon::now(new \DateTimeZone('Asia/Jakarta'))
                        ->toDateString()."-".$request['title_pengaduan']."/";

                $fileName = md5(rand(0,2000)).'.'.$request->attachment->getClientOriginalExtension();

                $request->attachment->move(public_path($folderUpload), $fileName);
                $pengaduan->no_ktp = $input['no_ktp'];
                $pengaduan->name   = $input['name'];
                $pengaduan->gender_id  = $input['gender_id'];
                $pengaduan->birth_date = $input['birth_date'];
                $pengaduan->phone  = $input['phone'];
                $pengaduan->email  = $input['email'];
                $pengaduan->address= $input['address'];
                $pengaduan->title_pengaduan= $input['title_pengaduan'];
                $pengaduan->content_pengaduan  = $input['content_pengaduan'];
                $pengaduan->attachment = $folderUpload.$fileName;
                $pengaduan->save();

                return redirect()->back()
                            ->with('message','Data Berhasil Diupdate!')
                            ->with('status','success')
                            ->with('type','success');
            }

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

    public function pengaduanWithTeam()
    {
        $data = Pengaduan::whereStatus(2)->has('team')->with(['report','invReport'])->get();

        $team = User::where('role_id',5)->get();

        $page_title = "Data Pengaduan Masuk Dan Telah Dibentuk Tim Penyidik";

        return view('pengaduan.index',compact(['data','team','page_title']));
    }
}
