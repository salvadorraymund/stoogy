@extends('layouts.manage')

@section('content')
<div class="container">
	<h1>Manage Events - {{$user->name}}</h1>
			
		
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
							{!!Form::open(['action' => ['ManageEventsController@destroy', $event->id], 'method'=>'POST'])!!}
						       {{Form::hidden('_method','DELETE')}}
						       {{Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])}}
						    {!!Form::close()!!}
							
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