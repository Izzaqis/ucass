<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $clubname = Auth::user()->club;

        /** @var \Illuminate\Database\Eloquent\Collection $userProducts !!!*/
        $club = Club::where('name', $clubname)->first();
        return view('committeeweb.editclubprofile', compact('club'));
    }

    public function saveprofile(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'description' => 'required',
            'clubpic' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $club = Club::find($id);
        $club->name = $request->get('name');
        $club->date = $request->get('description');
        $fileName = "clubpic-" . time() . '.' . request()->clubpic->getClientOriginalExtension();


        $club->save();

        return redirect('/committee/profile')->with('success', 'Club Profile Updated!');
    }


    public function index()
    {
        $clubs = Club::all();
        return view('committeeweb.clubtable', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminweb.addclub');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'date'=>'required',
            'category' => 'required',
            'zone' => 'required',
            'advisor' => 'required',
        ]);

        $club = new Club([
            'name'=> $request->get('name'),
            'date'=> $request->get('date'),
            'category' => $request->get('category'),
            'zone' => $request->get('zone'),
            'advisor' => $request->get('advisor'),
        ]);

        $club->save();
        return redirect('/admin/clubs')->with('success', 'Club registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $club = Club::find($id);
        $name = $club->name;
        $users = User::where('club', $name)->orderBy('name', 'ASC')->get();

        return view('committeeweb.clubMemberstable', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $club = Club::find($id);
        return view('committeeweb.editclub', compact('club'));
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
            'date' => 'required',
            'category' => 'required',
            'zone' => 'required',
            'advisor' => 'required',
        ]);


        $club = Club::find($id);
        $club->name = $request->get('name');
        $club->date = $request->get('date');
        $club->category = $request->get('category');
        $club->zone = $request->get('zone');
        $club->advisor = $request->get('advisor');
        $club->save();

        return redirect('/admin/clubs')->with('success', 'Clubs Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $club = Club::find($id);
        $club->delete();

        return redirect('/admin/clubs')->with('success', 'Club deleted');
    }
}
