@extends('layouts.app2')

@section('content')
<div class="container">
	<h3>My Events</h3>
	@if(count($events) > 0)
	<table class="table">
		<thead class="thead-dark">
			<th scope="col">Event Name</th>
			<th scope="col">Start Date</th>
			<th scope="col">End Date</th>
			<th scope="col">Action</th>
		</thead>
		
			@foreach($events as $event)
				<tbody>
					<tr>
						<td>{{$event->event_name}}</td>
						<td>{{$event->start_date}}</td>
						<td>{{$event->end_date}}</td>
						<td><a href="{{route('adjust.edit', $event->id)}}" class="btn btn-primary">Edit</a>
							{!!Form::open(['action' => ['AdjustController@destroy', $event->id], 'method'=>'POST', 'class'=>'float-right'])!!}
						       {{Form::hidden('_method','DELETE')}}
						       {{Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])}}
						    {!!Form::close()!!}
						</td>
					</tr>
				</tbody>
		
			@endforeach
		@else
			<p>No events</p>
		@endif
	</table>

</div>

@endsection