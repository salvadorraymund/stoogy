@extends('layouts.manage')

@section('content')
<div class="container">
	<h1>Messages - {{$user->name}}</h1>
			
		
		<hr>


			<table class="table">
				<thead>
					<tr>
						<th>Subject</th>
						<th>Message</th>
						<th>Created Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($queries) > 0)
						@foreach($queries as $query)
					<tr>
						<td>{{$query->subject}}</td>
						<td>{!!$query->body!!}</td>
						<td>{{$query->created_at}}</td>
						<td>
							{!!Form::open(['action' => ['ManageQueriesController@destroy', $query->id], 'method'=>'POST', 'class'=>'float-right'])!!}
						       {{Form::hidden('_method','DELETE')}}
						       {{Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])}}
						    {!!Form::close()!!}
							<a href="/manage/queries/{{$query->id}}" class="btn btn-success btn-sm">View</a>
						</td>
						</td>
					</tr>
						@endforeach
					@else
					<p>No Messages found</p>
					@endif
				</tbody>
			</table>
</div>
@endsection