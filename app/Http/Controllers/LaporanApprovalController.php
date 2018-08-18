<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;

class LaporanApprovalController extends Controller
{
    public function approve($reportId)
    {
    	$pengaduan = Report::findOrFail($reportId);

    	if ($pengaduan) {
    		$pengaduan->status = 2;
    		$pengaduan->save();

    		return redirect()->back()
                    ->with('message', 'Laporan Telah disetujui!')
                    ->with('status','disetujui')
                    ->with('type','success');
    	}
    }
    

    public function reject($reportId)
    {
    	$pengaduan = Report::findOrFail($reportId);

    	if ($pengaduan) {
    		$pengaduan->status = 3;
    		$pengaduan->save();

    		return redirect()->back()
                    ->with('message', 'PenLaporan ditolak!')
                    ->with('status','Ditolak')
                    ->with('type','error');
    	}
    }
}
