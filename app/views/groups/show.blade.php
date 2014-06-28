@extends('layouts.master')
@section('content')
<h4>Showing {{ $group->groupname }}</h4>

	<div class="jumbotron text-center">
		<h2>{{ $group->groupname }}</h2><br/>
		<strong>Students Joined (ID):</strong>
			@foreach($groupposts as $key=>$value)
			{{ $value->posts_id }}{{ ','}}
			@endforeach
		<br/>	
		<strong>SubGroup:</strong>
			@foreach($subgroups as $key=>$values)
			{{ $values->subgroup_name }}{{ ','}}
			@endforeach	
	</div>
@stop