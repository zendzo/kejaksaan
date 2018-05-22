<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
// use App\Pembelian;
// use App\Penjualan;
// use App\Supplier;

class AdminController extends Controller
{
    public function __construct()
    {
    	$this->middleware(['auth','admin']);
    }

    public function index()
    {
    	$page_title = "Halaman utama";

    	// $pembelian = Pembelian::count();

    	// $penjualan = Penjualan::count();

    	// $pengguna = User::count();

    	// $supplier = Supplier::count();

    	return view('admin.home',compact(['page_title','pembelian','penjualan','pengguna','supplier']));
    }
}
