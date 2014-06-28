@extends('layouts.master')
@section('content')
<h4>Add Students to Groups</h4>
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="assign">
        <div>
        {{ Form::open(array('route' => 'groupposts.store')) }}
        	<table class="table table-striped table-bordered table-hover">
	        	<tr><td><h4>Groups Name</h4></td><td><h4>Students Name</h4>
	        	<tr><td>
	            {{ Form::select('groups_id', $groups, Input::old('groups_id'), array('class' => 'form-control')) }}</td>
	            <td>
	            {{ Form::select('posts_id', $posts, Input::old('posts_id'), array('class' => 'form-control')) }}</td>
	        	</tr>
        	</table>
        	{{ Form::submit('Assign Group!', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
        </div>
</div>
<br />
<h4>Group Assignment History</h4>
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<td>Student ID</td>
			<td>Group ID</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	@foreach($groupposts as $key => $value)
		<tr>
			<td>{{ $value->posts_id }}</td>
			<td>{{ $value->groups_id }}</td>
			<td>
				{{ Form::open(array('url' => 'groupposts/' . $value->id, 'class' => 'form-inline')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Unassign', array('class' => 'btn btn-small btn-warning')) }}
				{{ Form::close() }}
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@stop