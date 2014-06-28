@extends('layouts.master')
@section('content')
<h4>Edit {{ $group->groupname }}</h4>

{{ HTML::ul($errors->all() )}}

{{ Form::model($group, array('route' => array('groups.update', $group->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('groupname', 'Name') }}
		{{ Form::text('groupname', null, array('class' => 'form-control')) }}
	</div>
	{{ Form::submit('Update Record!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop