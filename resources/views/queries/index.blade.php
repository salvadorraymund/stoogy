@extends('layouts.app2')

@section('content')
<div class="container">
	<h1>Messages</h1>
		@if(count($queries) > 0)
			@foreach($queries as $query)
				<div class="card">
								<a class="card-body" href="/queries/{{$query->id}}"><h4>{{$query->subject}}</h4></a>
				</div>
		@endforeach
			@endif
</div>





@endsection