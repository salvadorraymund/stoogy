@extends('layouts.manage')

@section('content')
<div class="container">
					@if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
			<h1>Manage Users</h1>
			<a href="{{route('users.create')}}" class="btn btn-primary">Create New User</a>
		
		<hr>

			<table class="table">
				<thead>
					<tr>
						<th>User ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>
							<a href="{{route('users.edit', $user->id)}}" class="btn btn-success btn-sm">Edit</a>
							{!!Form::open(['action' => ['UserController@destroy', $user->id], 'method'=>'POST', 'class'=>'float-right'])!!}
					        	{{Form::hidden('_method','DELETE')}}
					        	{{Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])}}
					        {!!Form::close()!!}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
</div>
@endsection