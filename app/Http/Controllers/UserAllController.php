<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAllController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('adminweb.usertable', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('adminweb.edituser', compact('user'));
    }

}
