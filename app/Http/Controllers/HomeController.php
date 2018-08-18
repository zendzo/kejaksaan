<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // redirect to admin page is user is ad administrator
        if (Auth::user()->role_id === 1) {
            return redirect('/admin');
        }

        $page_title = "Welcome ".Auth::user()->fullName;
        return view('home',compact('page_title'));
    }
}
