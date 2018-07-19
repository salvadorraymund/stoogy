@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                           <div class="list-group">
                              <a href="profiles/create" class="list-group-item list-group-item-action">
                                Create New Profile
                              </a>
                              <a href="/events/show" class="list-group-item list-group-item-action">Appointments
                              </a>
                            </div>
                        </div>



                         <div class="col-sm-9 col-md-9">
                                <h3>My Stoogy</h3>

                                 @if(count($profiles) > 0)
                                     @foreach($profiles as $profile)
                                <div class="row">
                                        <div class="col-sm-3 col-md-3">
                                            <div class="card border-primary">
                                                    <div class="card-header">
                                                    <img class="card-img-top" src="/storage/cover_images/{{$profile->cover_image}}" />
                                                    </div>
                                                    <!-- badge -->
                                                    <div class="card-body">
                                                        <span class="card-text">{{$profile->first_name}}</span>
                                                    </div>
                                            </div>
                                            <br>
                                            <button type="button" class="btn btn-outline-primary"><a href="/profiles/{{$profile->id}}/edit">Edit Profile</a></button>
                                        </div>

                                        <div class="col-sm-9 col-md-9">
                                            <div class="form-group">
                                              First Name:<input type="text" class="form-control" value="{{$profile->first_name}}">
                                            </div>
                                            <div class="form-group">
                                              Last Name:<input type="text" class="form-control" value="{{$profile->last_name}}">
                                            </div>
                                            <div class="form-group">
                                              Nickname:<input type="text" class="form-control" value="{{$profile->nick_name}}">
                                            </div>
                                            <div class="form-group">
                                              Class Number:<input type="text" class="form-control" value="{{$profile->class_number}}">
                                            </div>
                                            <div class="form-group">
                                              Section:<input type="text" class="form-control" value="{{$profile->section}}">
                                            </div>
                                        </div>
                                    </div>
                                  @endforeach
                                @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


