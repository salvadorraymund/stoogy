<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\Events;
use Calendar;
use App\User;

class ScheduleController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function schedule()
    {
        return view('manage.events.schedule');
    }

    public function addEvent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        if ($validator->fails()) {
            \Session::flash('Warning', 'Please enter valid details');
            return Redirect::to('/events')->withInput()->withErrors($validator);
        }

        $event = new Events;
        $event->event_name = $request['event_name'];
        $event->start_date = $request['start_date'];
        $event->end_date = $request['end_date'];
        $event->user_id = auth()->user()->id;
        $event->eventable_id = auth()->user()->id;
        $event->eventable_type = Admin::class;
        $event->save();

        \Session::flash('success', 'Event added successfully.');
        return view('manage.events.schedule');
    }

    public function show()
    {
        $id =  auth()->user()->id;
        $events = Events::where('user_id', '=', $id)->get();
        return view('manage.events.show-schedule')->with('events', $events);
        
}
}
