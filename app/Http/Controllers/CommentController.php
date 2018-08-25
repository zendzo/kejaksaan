<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pengaduan;

class CommentController extends Controller
{
    public function postPengaduanComment(Request $request)
    {
        $pengaduan = Pengaduan::findOrFail($request->get('pengaduan_id'));

        $pengaduan->comments()->create([
            'body' => $request->get('body'),
            'user_id' => Auth::id(),
        ]);

        if ($pengaduan) {
            return redirect()->back()
                            ->with('message','Data Berhasil Diupdate!')
                            ->with('status','success')
                            ->with('type','success');
        }
    }
}
