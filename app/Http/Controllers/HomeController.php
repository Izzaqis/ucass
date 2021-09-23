<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function adminHome()
    {
        return view('adminweb.adminHome');
    }

    public function committeeHome()
    {
        return view('committeeweb.committeeHome');
    }

    public function studentHome()
    {
        return view('studentweb.studentHome');
    }
}
