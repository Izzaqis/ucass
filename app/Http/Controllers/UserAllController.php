<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
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

    public function show($id)
    {
        $events = Event::find($id);
        $users = User::all();
        return view('committeeweb.eventParticipant', compact(['events', 'users']));
        // return view('adminweb.eventParticipant', compact('event'));
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

    public function attach(Request $request, $id)
    {
        //$user = User::find($uid);
        $event = Event::find($id);

        $uid = $request->get('id');
        $user = User::find($uid);

        $event->users()->attach($user);

        return redirect()->back()->with('info','The participant added');
    }

    public function detach($eid, $uid)
    {
        $user = User::find($uid);
        $event = Event::find($eid);
        $event->users()->detach($user);

        return redirect()->back()->with('info','The participant removed');
    }
}
