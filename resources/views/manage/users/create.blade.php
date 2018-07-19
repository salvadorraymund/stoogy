@extends('layouts.manage')

@section('content')
<div class="container">
 {!! Form::open(['action' => 'UserController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            
                   

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <input id="first_name" type="text" class="form-control" name="name" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Email</label>
                                <input id="email" type="text" class="form-control" name="email" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required autofocus>
                            </div>

                            <fieldset class="form-group">
                              <legend>Select Role:</legend>
                              @foreach ($roles as $role)
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="{{$role->id}}">
                                  {{$role->display_name}}
                                </label>
                              </div>
                              @endforeach
                            </fieldset>

                            <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                            </div>
{!! Form::close() !!}
</div>

@endsection