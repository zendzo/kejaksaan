<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;

class StringMatchingController extends Controller
{
    public function index()
    {
        $page_title = "Cari Data Pengaduan";

        return view('search.index', compact(['page_title']));
    }

    public function search(Request $request)
    {
        $page_title = "Hasil Pencarian Meggunakan  Metode String Matching";

        $dataPengaduan = Pengaduan::all();

        $strings = [];

        $pattern = $request->get('string');

        foreach ($dataPengaduan as $pengaduan) {
            array_push($strings, $this->stringPoistion($pengaduan->title_pengaduan, $request->get('string'), $pengaduan->id));
        }

        return view('search.result', compact(['strings','page_title','pattern']));
    }

    public function moveToLeft($pat, $txt)
    {
        $M = strlen($pat); 
        $N = strlen($txt); 
    
        // A loop to slide pat[]  
        // one by one  
        for ($i = 0; $i <= $N - $M; $i++) 
        { 
    
            // For current index i,  
            // check for pattern match  
            for ($j = 0; $j < $M; $j++) 
                if ($txt[$i + $j] != $pat[$j]) 
                    break; 
    
            // if pat[0...M-1] =  
            // txt[i, i+1, ...i+M-1] 
            if ($j == $M)  
                return "Pola Ditemukan Pada Index Ke: ".$i."\n"; 
        } 
    }

    function stringPoistion($pat, $txt, $id) 
    { 
        $pos = strpos($pat, $txt);

        $found = false;
        if ($pos !== false) {
            return [
                "result" => "Kata '$txt' ditemukan dalam judul pengaduan  '$pat'"." dan awal kalimat '$txt' berada di posisi $pos",
                "found" => true,
                "id" => $id
            ];
        }else{
            return [
                "result" => "Kata '$txt' tidak ditemukan dalam judul pengaduan '$pat'",
                "found" => false,
                "id" => $id
            ];
       }
    }
}
