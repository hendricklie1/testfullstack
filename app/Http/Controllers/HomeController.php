<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('app');
        if (!Auth::check() && !Request::is('login')){
            return Redirect()->route('login')->with('error', 'You must be logged in to access this page!');
        }else{
            return view('home');
        }
    }
}
