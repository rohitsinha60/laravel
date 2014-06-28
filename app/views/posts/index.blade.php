@extends('layouts.master')
@section('content')
<h4>All Student Details</h4>
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Phone Number</td>
			<td>City</td>
			<td>Branch</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	@foreach($posts as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->name }}</td>
			<td>{{ $value->phone }}</td>
			<td>{{ $value->city }}</td>
			<td>{{ $value->branch }}</td>
			<td>
				{{ Form::open(array('url' => 'posts/' . $value->id, 'class' => 'form-inline')) }}
				<a class="btn btn-small btn-success" href="{{ URL::to('posts/' . $value->id) }}">Show</a>
				<a class="btn btn-small btn-info" href="{{ URL::to('posts/' . $value->id . '/edit') }}">Edit</a>
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete', array('class' => 'btn btn-small btn-warning')) }}
				{{ Form::close() }}
				

			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@stop
