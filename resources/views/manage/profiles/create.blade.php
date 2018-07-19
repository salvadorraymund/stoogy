@extends('layouts.manage')

@section('content')
<div class="container">
 {!! Form::open(['action' => 'ManageProfilesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            
                            <div class="form-group">
                                <label for="user_id" class="col-md-4 control-label">User ID</label>
                                <input id="user_id" type="text" class="form-control" name="user_id" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">First Name</label>
                                <input id="first_name" type="text" class="form-control" name="first_name" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="last_name" class="col-md-4 control-label">Last Name</label>
                                <input id="last_name" type="text" class="form-control" name="last_name" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="nick_name" class="col-md-4 control-label">Nickname</label>
                                <input id="nick_name" type="text" class="form-control" name="nick_name" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="class_number" class="col-md-4 control-label">Class Number</label>
                                <input id="class_number" type="text" class="form-control" name="class_number" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="section" class="col-md-4 control-label">Section</label>
                                <input id="section" type="text" class="form-control" name="section" required autofocus>
                            </div>

                            <div class="form-group">
                                <p>Upload Profile Picture</p>
                                {{Form::file('cover_image')}}
                            </div>

                            <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Create New Profile
                                    </button>
                            </div>
{!! Form::close() !!}
</div>

@endsection