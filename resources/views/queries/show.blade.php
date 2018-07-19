@extends('layouts.app2')

@section('content')
<div class="container">
	
    <a href="/queries" class="btn btn-primary">Go Back</a>
    <br>
    <br>
    <div class="card">
	    <div class="card-header">
		    <h3>{{$queries->subject}}</h3>
		</div>
		<div class="card-body">  
		    <small>Written on {{$queries->created_at}}</small><br>
		    <small>Written by {{$queries->user->name}}</small>

		    <div class="container">
		          {!!$queries->body!!}
		    </div>
		 </div>
    </div>
    <br>
    @if(!Auth::guest())
        @if(Auth::user()->id == $queries->user_id)
        <a href="" class="btn btn-primary" type="submit">Reply</a>

        
        @endif
    @endif
</div>
@endsection