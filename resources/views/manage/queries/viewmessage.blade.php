@extends('layouts.manage')

@section('content')
<div class="container">
	<h1>Message Content</h1>
	
	@if(count($queries) > 0)
		@foreach($queries as $query)
    
    <br>
    <br>
    <div class="card">
	    <div class="card-header">
		    <h3>{{$query->subject}}</h3>
		</div>
		<div class="card-body">  
		    <small>Written on {{$query->created_at}}</small><br>
		    <small>Written by {{$query->user->name}}</small>

		    <div class="container">
		          {!!$query->body!!}
		    </div>
		 </div>
    </div>
    <br>
        @endforeach
        <p>No messages found</p>
    @endif
</div>
@endsection