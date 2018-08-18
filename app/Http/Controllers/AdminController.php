<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pengaduan;
use App\Team;
use App\Report;

class AdminController extends Controller
{
    public function __construct()
    {
    	$this->middleware(['auth','admin']);
    }

    public function index()
    {
    	$page_title = "Halaman utama";

    	$pengaduan = Pengaduan::count();

    	$team = Pengaduan::has('team')->count();

    	$pengguna = User::count();

    	$report = Report::count();

    	return view('admin.home',compact(['page_title','pengaduan','team','pengguna','report']));
    }
}
