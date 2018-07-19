@extends('layouts.manage')

@section('content')
<div class="container">
	<div class="card card-primary">
		<div class="card-header">Create New Events</div>
			<div class="card-body">
				{!! Form::open(array('route' => 'events.store', 'method' => 'POST', 'files' => 'true')) !!}
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						@if (Session::has('success'))
							<div class="alert alert-success">{{ Session::get('success') }}</div>
						@elseif (Session::has('warning'))
							<div class="alert alert-danger">{{ Session::get('warning') }}</div>
						@endif
					</div>
					
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="form-group">
							{!! Form::label('event_name', 'Event Name:') !!}
							<div class="">
							{!! Form::text('event_name', null, ['class' => 'form-control']) !!}
							{!! $errors->first('event_name', '<p clas="alert alert-danger">:message</p>') !!}
							</div>
						</div>
					</div>

					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
							{!! Form::label('start_date', 'Start Date:') !!}
							<div class="">
							{!! Form::date('start_date', null, ['class' => 'form-control']) !!}
							{!! $errors->first('start_date', '<p clas="alert alert-danger">:message</p>') !!}
							</div>
						</div>
					</div>

					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
							{!! Form::label('end_date', 'End Date:') !!}
							<div class="">
							{!! Form::date('end_date', null, ['class' => 'form-control']) !!}
							{!! $errors->first('end_date', '<p clas="alert alert-danger">:message</p>') !!}
							</div>
						</div>
					</div>

					@if(count($users) > 0)
						
							<div class="col-xs-2 col-sm-2 col-md-2">
								<div class="form-group">
									<label>Select Recepient:</label>
									<select name="recepient" class="custom-select">
								      <option selected="">Options</option>
								      @foreach ($users as $user)
								      <option value="{{$user->id}}">{{$user->name}}</option>
								      @endforeach
								    </select>
									</div>
								</div>
							</div>
						
					@endif

					<div class="col-xs-1 col-sm-1 col-md-1 text-center"> &nbsp;</br>
							{!! Form::submit('Add Event', ['class'=>'btn btn-primary']) !!}
					</div> <br>
				
				</div> <!-- end row -->
			</div> <!-- end card -->
				{!! Form::close() !!}
</div>

@endsection