@extends('layouts.master')
@section('content')
<h4>All Groups</h4>

@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	@foreach($groups as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->groupname }}</td>
			<td>
				{{ Form::open(array('url' => 'groups/' . $value->id, 'class' => 'form-inline')) }}
				<a class="btn btn-small btn-success" href="{{ URL::to('groups/' . $value->id) }}">Show</a>
				<a class="btn btn-small btn-info" href="{{ URL::to('groups/' . $value->id . '/edit') }}">Edit</a>
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete', array('class' => 'btn btn-small btn-warning')) }}
				{{ Form::close() }}
				

			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@stop
