@extends('layouts.manage')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-9 col-md-9">
			
			<h4>View User Details</h4>
		
		<hr>

			<table class="table">
				<thead>
					<tr>
						<th>User ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Date Created</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->created_at}}</td>
						<td><a href="{{route('users.edit', $user->id)}}" class="btn btn-success">Edit</a></td>
					</tr>
				</tbody>
			</table>

		</div>
	</div>
</div>
@endsection