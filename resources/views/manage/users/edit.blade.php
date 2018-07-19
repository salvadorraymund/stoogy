@extends('layouts.manage')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-9 col-md-9">
			<h1>Manage Users</h1>
				 {!! Form::open(['action' => ['UserController@update',$user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
				 
				                            <div class="form-group">
				                                <label for="name" class="col-md-4 control-label">Name</label>
				                                <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}">
				                            </div>

				                            <div class="form-group">
				                                <label for="email" class="col-md-4 control-label">Email</label>
				                                <input id="email" type="text" class="form-control" name="email" value="{{$user->email}}">
				                            </div>

				                            <div class="form-group">
				                                <label for="password" class="col-md-4 control-label">Password</label>
				                                <input id="password" type="password" class="form-control" name="password" value="{{$user->password}}">
				                            </div>

				                            <fieldset class="form-group">
				                              <legend>Select Role:</legend>
				                              @foreach ($roles as $role)
				                              <div class="form-check">
				                                <label class="form-check-label">
				                                  <input class="form-check-input" type="checkbox" value="{{$role->id}}">
				                                  <input type="hidden" class="form-control" name="roles" value="{{$role->id}}">
				                                  {{$role->display_name}}
				                                </label>
				                              </div>
				                              @endforeach
				                            </fieldset>

				                            <input type="hidden" name="_method" value="PUT">
				    						<input type="hidden" name="_token" value="{{ csrf_token() }}">

				                            <div class="form-group">
				                                    <button type="submit" class="btn btn-primary">
				                                        Update
				                                    </button>
				                            </div>
				{!! Form::close() !!}
		</div>
</div>

@endsection