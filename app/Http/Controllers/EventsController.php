<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\Events;
use Calendar;


class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $events = Events::get();
        $event_list = [];
        foreach ($events as $key => $event) {
            $event_list[] = Calendar::event(
                $event ->event_name,
                true,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date . '+1 day')
            );
        }
        $calendar_details = Calendar::addEvents($event_list);

    	return view('events.index', compact('calendar_details') );
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
        $event->eventable_type = User::class;
    	$event->save();

    	\Session::flash('success', 'Event added successfully.');
    	return Redirect::to('/events');
    }

    public function show()
    {
       $id =  auth()->user()->id;
       $events = Events::where('user_id', '=', $id)->get();
       return view('events.show')->with('events', $events);
        
    }

    // public function showEvent()
    // {
    //     $id =  auth()->user()->id;
    //    $events = Events::where('user_id', '=', $id)->get();
    //    return view('events.showEvent')->with('events', $events);
    // }

    public function genMeet()
    {
        $type =  Admin::class;
        $events = Events::where('eventable_type', '=', $type)->get();
        return view('events.genMeet')->with('events', $events);
        
}

    

}
