@extends('layouts.manage')

@section('content')
<div class="container">
			<h1>Manage Profiles</h1>
			<a href="{{route('profiles.create')}}" class="btn btn-primary">Create New Profile</a>
		
		<hr>

			<table class="table">
				<thead>
					<tr>
						<th>User ID</th>
						<th>Profile First Name</th>
						<th>Class Number</th>
						<th>Section</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($profiles as $profile)
					<tr>
						<td>{{$profile->user_id}}</td>
						<td>{{$profile->first_name}}</td>
						<td>{{$profile->class_number}}</td>
						<td>{{$profile->section}}</td>
						<td>
							
							<a href="{{route('profiles.edit', $profile->id)}}" class="btn btn-success btn-sm">Edit</a>
							{!!Form::open(['action' => ['ManageProfilesController@destroy', $profile->id], 'method'=>'POST', 'class'=>'float-right'])!!}
						       {{Form::hidden('_method','DELETE')}}
						       {{Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])}}
						    {!!Form::close()!!}
						
						</td>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
</div>
@endsection