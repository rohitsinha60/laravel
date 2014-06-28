@extends('layouts.master')
@section('content')
<h4>Create Student Record</h4>

{{ HTML::ul($errors->all() )}}

{{ Form::open(array('route' => 'posts.store')) }}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('phone', 'Phone Number') }}
		{{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('city', 'City') }}
		{{ Form::text('city', Input::old('city'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('branch', 'Branch') }}
		{{ Form::text('branch', Input::old('branch'), array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Submit Record!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop