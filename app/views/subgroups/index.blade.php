@extends('layouts.master')
@section('content')
<h4>Create Subgroup</h4><br />
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
{{ HTML::ul($errors->all() )}}

<div class="assign">
        <div>
        {{ Form::open(array('route' => 'subgroups.store')) }}
        	<table class="table table-striped table-bordered table-hover">
	        	<tr><td><h4>Groups Name</h4></td><td><h4>Sub Group Name</h4>
	        	<tr><td>
	            {{ Form::select('groups_id', $groups, Input::old('groups_id'), array('class' => 'form-control')) }}</td>
	            <td>
	            {{ Form::text('subgroup_name', Input::old('subgroup_name'), array('class' => 'form-control')) }}</td>
	        	</tr>
        	</table>
        	{{ Form::submit('Submit Record!', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
        </div>
</div>
<br />
<h4>Sub Group Details</h4>
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<td>ID</td>
			<td>Associated Group</td>
			<td>Subgroup Name</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
	@foreach($subgroups as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->groups_id }}</td>
			<td>{{ $value->subgroup_name }}</td>
			<td>
				{{ Form::open(array('url' => 'subgroups/' . $value->id, 'class' => 'form-inline')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete', array('class' => 'btn btn-small btn-warning')) }}
				{{ Form::close() }}
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@stop