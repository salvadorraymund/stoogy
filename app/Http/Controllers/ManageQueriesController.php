<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Query;
use App\User;

class ManageQueriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = User::all();
        return view('manage.queries.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('manage.queries.create')->withUsers($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'body' => 'required',
            'recepient' => 'required'
        ]);

        $query = new Query;
        $query ->subject = $request->input('subject');
        $query->body = $request->input('body');
        $query->user_id = $request->input('recepient');
        $query->save();

        $users = User::all();
        return view('manage.queries.index')->with('success','Message Sent')->withUsers($users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $queries = Query::where('user_id', '=', $id)->get();
        return view("manage.queries.show")->with('queries', $queries)->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $query = Query::find($id);
        $query->delete();

        $users = User::all();

        return view("manage.queries.index")->with('success','Event Deleted')->withUsers($users);;
    }
}
