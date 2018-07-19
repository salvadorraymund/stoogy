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
		</thead>
		
			@foreach($events as $event)
				<tbody>
					<tr>
						<td>{{$event->event_name}}</td>
						<td>{{$event->start_date}}</td>
						<td>{{$event->end_date}}</td>
					</tr>
				</tbody>
		
			@endforeach
		@else
			<p>No events</p>
		@endif
	</table>

</div>

@endsection