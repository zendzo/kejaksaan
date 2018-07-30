<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;

class PengaduanApprovalController extends Controller
{
    public function approve($pengaduanId)
    {
    	$pengaduan = Pengaduan::findOrFail($pengaduanId);

    	if ($pengaduan) {
    		$pengaduan->status = 2;
    		$pengaduan->save();

    		return redirect()->back()
                    ->with('message', 'Pengaduan Telah disetujui!')
                    ->with('status','disetujui')
                    ->with('type','success');
    	}
    }
    

    public function reject($pengaduanId)
    {
    	$pengaduan = Pengaduan::findOrFail($pengaduanId);

    	if ($pengaduan) {
    		$pengaduan->status = 3;
    		$pengaduan->save();

    		return redirect()->back()
                    ->with('message', 'Pengaduan ditolak!')
                    ->with('status','Ditolak')
                    ->with('type','error');
    	}
    }
}
