@extends('layouts.app2')

@section('content')
<div class="container">
	<h1>Edit Profile</h1>
 {!! Form::open(['action' => ['ProfilesController@update',$profile->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
							<div class="form-group">
	
                                <label for="name" class="col-md-4 control-label">First Name</label>
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{$profile->first_name}}">
                            </div>

                            <div class="form-group">
                                <label for="last_name" class="col-md-4 control-label">Last Name</label>
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{$profile->last_name}}">
                            </div>

                            <div class="form-group">
                                <label for="nick_name" class="col-md-4 control-label">Nickname</label>
                                <input id="nick_name" type="text" class="form-control" name="nick_name" value="{{$profile->nick_name}}">
                            </div>

                            <div class="form-group">
                                <label for="class_number" class="col-md-4 control-label">Class Number</label>
                                <input id="class_number" type="text" class="form-control" name="class_number" value="{{$profile->class_number}}">
                            </div>

                            <div class="form-group">
                                <label for="section" class="col-md-4 control-label">Section</label>
                                <input id="section" type="text" class="form-control" name="section" value="{{$profile->section}}">
                            </div>

                            <div class="form-group">
                                <p>Upload Profile Picture</p>
                                {{Form::file('cover_image')}}
                            </div>

                            <input type="hidden" name="_method" value="PUT">
				    		<input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Update Profile
                                    </button>
                            </div>                  
{!! Form::close() !!}
</div>

@endsection