@extends('layouts.manage')

@section('content')
<div class="container">
	@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
	<h1>Manage Events</h1>
			<a href="{{route('events.schedule')}}" class="btn btn-primary">Schedule General Meeting</a>
			<a href="{{route('manage.events.schedule-show')}}" class="btn btn-primary">Show Schedule</a>
			<a href="{{route('events.create')}}" class="btn btn-primary">Set Appointment</a>
		
		<hr>


			<table class="table">
				<thead>
					<tr>
						<th>User Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($users) > 0)
						@foreach($users as $user)
					<tr>
						<td>{{$user->name}}</td>
						<td>
							<a href="/manage/events/{{$user->id}}" class="btn btn-success btn-sm">Show Event</a>
						</td>
						</td>
					</tr>
						@endforeach
					@endif
				</tbody>
			</table>
</div>
@endsection
