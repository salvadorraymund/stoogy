<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Validator;
use App\User;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $profile = Profile::all();
        // return view('profiles.profiles')->with('profiles', $profile);
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('profiles.profiles')->with('profiles', $user->profiles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'nick_name' => 'required',
            'class_number' => 'required',
            'section' => 'required',
            'cover_image' => 'image|nullable|max:1999'

        ]);

        //Handle file upload
        if($request->hasFile('cover_image')){
            //get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else{
            $fileNameToStore = 'noimage.jpg';
        }

        $profiles = new Profile;
        $profiles->first_name = $request->get('first_name');
        $profiles->last_name = $request->get('last_name');
        $profiles->nick_name = $request->get('nick_name');
        $profiles->class_number = $request->get('class_number');
        $profiles->section = $request->get('section');
        $profiles->cover_image = $fileNameToStore;
        $profiles->user_id = auth()->user()->id;
        $profiles->save();

        return view('profiles.create')->with('success', 'Profile Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);
        return view ('profiles.edit')->with('profile', $profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'nick_name' => 'required',
            'class_number' => 'required',
            'section' => 'required',
            'cover_image' => 'image|nullable|max:1999'

        ]);

        //Handle file upload
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

        $profile = Profile::find($id);
        $profile ->first_name = $request->get('first_name');
        $profile->last_name = $request->get('last_name');
        $profile->nick_name = $request->get('nick_name');
        $profile->class_number = $request->get('class_number');
        $profile->section = $request->get('section');
        $profile->cover_image = $fileNameToStore;
        $profile->user_id = auth()->user()->id;
        $profile->save();

        return redirect('/profiles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
