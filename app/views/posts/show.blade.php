@extends('layouts.master')
@section('content')
<h4>Showing {{ $post->name }}</h4>

	<div class="jumbotron text-center">
		<h2>{{ $post->name }}</h2>
		<p>
			<strong>Phone Number:</strong> {{ $post->phone }}<br/>
			<strong>City:</strong> {{ $post->city }}<br/>
			<strong>Branch:</strong>{{ $post->branch }}<br/>
			<strong>Groups Joined (ID):</strong>
			@foreach($groupposts as $key=>$value)
			{{ $value->groups_id }}{{ ','}}
			@endforeach
		</p>
	</div>
@stop