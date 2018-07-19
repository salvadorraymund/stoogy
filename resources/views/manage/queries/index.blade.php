@extends('layouts.manage')

@section('content')
<div class="container">
	@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
	<h1>Messages</h1>
			<a href="#" class="btn btn-primary">Create General Message</a>
			<a href="/manage/queries/create" class="btn btn-primary">Send PM</a>
			
		
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
							<a href="/manage/queries/{{$user->id}}" class="btn btn-success btn-sm">Show Messages</a>
							
						</td>
						</td>
					</tr>
						@endforeach
					@endif
				</tbody>
			</table>
</div>
@endsection