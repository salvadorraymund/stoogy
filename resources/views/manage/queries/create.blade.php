@extends('layouts.manage')

@section('content')
<div class="container">
    <h1>Create Message</h1>
    {!! Form::open(['action' => 'ManageQueriesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<br>
    	@if(count($users) > 0)
				<div class="form-group">
					<label>Select Recepient:</label>
						<select name="recepient" class="custom-select">
							<option selected="">Options</option>
							@foreach ($users as $user)
							<option value="{{$user->id}}">{{$user->name}}</option>
							@endforeach
						</select>
				</div>
						
		@endif

        <div class="form-group">
         {{Form::label('subject', 'Subject')}}
          {{Form::text('subject', '', ['class' => 'form-control', 'placeholder' => 'Subject'] )}}
        </div>

        <div class="form-group">
           {{Form::label('body', 'Body')}}
           {{Form::textarea('body', '', ['id' => 'article-ckeditor'],['class' => 'form-control', 'placeholder' => 'Body'] )}}
        </div>

        {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
    	{!! Form::close() !!}
</div>
@endsection