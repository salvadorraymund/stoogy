<!-- @extends('layouts.app2')

@section('content')
<div class="container">
	
    <a href="/events/show" class="btn btn-primary">Go Back</a>
    <br>
    <br>
    @if(count($events) > 0)
    	@foreach($events as $event)
	    <div class="card">
		    <div class="card-header">
			    <h3>{{$event->event_name}}</h3>
			</div>
			<div class="card-body">  
			    <small>Written on {{$event->created_at}}</small><br>
			    <small>Start Date: {{$event->start_date}}</small><br>
			    <small>End Date: {{$event->end_date}}</small><br>
			 </div>
	    </div>
	    @endforeach
	@endif
    <br>
    @if(!Auth::guest())
        @if(Auth::user()->id == $event->user_id)
        <a href="" class="btn btn-primary" type="submit">Edit</a>
        @endif
    @endif
</div>
@endsection -->