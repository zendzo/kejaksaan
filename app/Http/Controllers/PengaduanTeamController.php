<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;

class PengaduanTeamController extends Controller
{
    public function attachTeamToModal(Request $request)
    {
        $input = $request->all();

        $pengaduan = Pengaduan::findOrFail($input['pengaduan_id']);

        try{
            $pengaduan->team()->attach($request->get('team'));
            return redirect()->back()
                ->with('message', 'Data Team Penyidik Telah Tersimpan!')
                ->with('status','success')
                ->with('type','success');
        }catch(\Exception $e){
            return redirect()->back()
                ->with('message', $e->getMessage())
                ->with('status','error')
                ->with('type','error');
        }
    }
}
