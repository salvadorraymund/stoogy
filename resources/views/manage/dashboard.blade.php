@extends('layouts.manage')

@section('content')
<div class="container">
	@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
	<div class="jumbotron">
                <div class="title m-b-md">
                    <h1 align="center">Hello, Admin!</h1>
                </div>
    </div>
</div>
@endsection