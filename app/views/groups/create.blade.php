@extends('layouts.master')
@section('content')
<h4>Create Group</h4>

{{ HTML::ul($errors->all() )}}

{{ Form::open(array('route' => 'groups.store')) }}

	<div class="form-group">
		{{ Form::label('groupname', 'Name') }}
		{{ Form::text('groupname', Input::old('groupname'), array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Submit Record!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop