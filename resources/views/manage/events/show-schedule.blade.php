@extends('layouts.manage')

@section('content')
<div class="container">
	<h1>Dates to Remember:</h1>
			
		
		<hr>


			<table class="table">
				<thead>
					<tr>
						<th>Event Name</th>
						<th>Created Date</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($events) > 0)
						@foreach($events as $event)
					<tr>
						<td>{{$event->event_name}}</td>
						<td>{{$event->created_at}}</td>
						<td>{{$event->start_date}}</td>
						<td>{{$event->end_date}}</td>
						<td>
							{!!Form::open(['action' => ['ManageEventsController@destroy', $event->id], 'method'=>'POST', 'class'=>'float-right'])!!}
						       {{Form::hidden('_method','DELETE')}}
						       {{Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])}}
						    {!!Form::close()!!}
							<a href="{{route('events.edit', $event->id)}}" class="btn btn-success btn-sm">Edit</a>
						</td>
						</td>
					</tr>
						@endforeach
					@else
					<p>No Events found</p>
					@endif
				</tbody>
			</table>
</div>
@endsection