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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('adminweb.edituser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'mobile' => 'required',
            'address' => 'required',
            'city' => 'required',
            'poscode' => 'required',
            'email' => 'required|unique:users',
            'role' => 'required',
            'club' => 'required',
        ]);


        $user = User::find($id);
        $user->name = $request->get('name');
        $user->mobile = $request->get('mobile');
        $user->address = $request->get('address');
        $user->city = $request->get('city');
        $user->poscode = $request->get('poscode');
        $user->email = $request->get('email');
        $user->role = $request->get('role');
        $user->club = $request->get('club');
        $user->save();

        return redirect('/admin/users')->with('success', 'User Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/admin/users')->with('success', 'User deleted');
    }

    public function approved($id)
    {
        $user = User::find($id);
        $user->is_commitee = 1;
        $user->save();

        return redirect()->back();
    }
}
