<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pengaduan;

class PengaduanTeamController extends Controller
{
    public function attachTeamToModal(Request $request)
    {
        $input = $request->all();

        $pengaduan = Pengaduan::findOrFail($input['pengaduan_id']);

        try{
            foreach ($request->get('team') as $teamId) {
                $pengaduan->team()->attach($teamId, [
                    'supervisior_id' => Auth::id(),
                    'supervisior_name' => Auth::user()->fullName,
                    'supervisior_email' => Auth::user()->email,
                    'supervisior_occupation' => Auth::user()->role->name
                    ]);
            }
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
