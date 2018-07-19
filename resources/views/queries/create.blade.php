@extends('layouts.app2')

@section('content')
<div class="container">
    <h1>Create Message</h1>
    {!! Form::open(['action' => 'QueriesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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