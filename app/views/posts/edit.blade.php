@extends('layouts.master')
@section('content')
<h4>Edit {{ $post->name }}</h4>

{{ HTML::ul($errors->all() )}}

{{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('phone', 'Phone Number') }}
		{{ Form::text('phone', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('city', 'City') }}
		{{ Form::text('city', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('branch', 'Branch') }}
		{{ Form::text('branch', null, array('class' => 'form-control')) }}
	</div>
	{{ Form::submit('Update Record!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop