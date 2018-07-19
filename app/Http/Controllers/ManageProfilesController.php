<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Validator;

class ManageProfilesController extends Controller
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
        $profiles = Profile::all();
        return view('manage.profiles.index')->with('profiles',$profiles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'nick_name' => 'required',
            'class_number' => 'required',
            'section' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

         if($request->hasFile('cover_image')){
            //get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('cover_image')->storeAs('public/storage/cover_images', $fileNameToStore);
        } else{
            $fileNameToStore = 'noimage.jpg';
        }

        $profile = new Profile();
        $profile->user_id = $request->get('user_id');
        $profile->first_name = $request->get('first_name');
        $profile->last_name = $request->get('last_name');
        $profile->nick_name = $request->get('nick_name');
        $profile->class_number = $request->get('class_number');
        $profile->section = $request->get('section');
        $profile->cover_image = $fileNameToStore;

        $profile->save();
        return view('manage.profiles.create')->with('success', 'Profile Created');
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
        $profile = Profile::find($id);
        return view("manage.profiles.edit")->withProfile($profile);
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
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'nick_name' => 'required',
            'class_number' => 'required',
            'section' => 'required',
        ]);

        $profile = Profile::find($id);
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->nick_name = $request->nick_name;
        $profile->class_number = $request->class_number;
        $profile->section = $request->section;

        $profile->save();
        return view("manage.profiles.edit")->withProfile($profile)->with('success','Profile Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profiles = Profile::find($id);
        $profiles->delete();

        return view("manage.dashboard")->with('success','Profile Deleted');;
    }
}
