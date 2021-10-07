<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('committeeweb.viewevent', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('committeeweb.addevent');
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
            'eventname' => 'required',
            'category' => 'required',
            'level' => 'required',
            'organizer'=>'required',
            'location'=>'required',
            'link' => 'required',
            'fundcash' => 'required',
            'fundtransport' => 'required',
            'description' => 'required',
            'note'=>'required',
            'poster' => 'required',
            'eventime' => 'required',
        ]);

        $event = new Event([
            'name'=> $request->get('name'),
            'date'=> $request->get('date'),
            'eventname'=> $request->get('eventname'),
            'category' => $request->get('category'),
            'level' => $request->get('level'),
            'organizer' => $request->get('organizer'),
            'location'=> $request->get('location'),
            'link'=> $request->get('link'),
            'fundcash'=> $request->get('fundcash'),
            'fundtransport' => $request->get('fundtransport'),
            'description' => $request->get('description'),
            'note' => $request->get('note'),
            'poster' => $request->get('poster'),
            'eventime' => $request->get('eventime'),
        ]);

        $event->save();
        return redirect('/committee/event')->with('success', 'Club registered');
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
        $event = Event::find($id);
        return view('committeeweb.editevent', compact('event'));
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
            'date'=>'required',
            'eventname' => 'required',
            'category' => 'required',
            'level' => 'required',
            'organizer'=>'required',
            'location'=>'required',
            'link' => 'required',
            'fundcash' => 'required',
            'fundtransport' => 'required',
            'description' => 'required',
            'note'=>'required',
            'poster' => 'required',
            'eventime' => 'required',
        ]);


        $event = Event::find($id);
        $event->name = $request->get('name');
        $event->date = $request->get('date');
        $event->eventname = $request->get('eventname');
        $event->category = $request->get('category');
        $event->level = $request->get('level');
        $event->organizer = $request->get('organizer');
        $event->location = $request->get('location');
        $event->link = $request->get('link');
        $event->fundcash = $request->get('fundcash');
        $event->fundtransport = $request->get('fundtransport');
        $event->description = $request->get('description');
        $event->note = $request->get('note');
        $event->poster = $request->get('poster');
        $event->eventime = $request->get('eventime');
        $event->save();

        return redirect('/committee/event')->with('success', 'Event Information Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect('/committee/event')->with('success', 'Event deleted');
    }
}
