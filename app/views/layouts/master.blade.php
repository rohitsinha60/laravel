<!DOCTYPE html>
<html>
<head>
	<title>Student Record</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('posts') }}">All Student Records</a></li>
		<li><a href="{{ URL::to('groups') }}">All Groups</a></li>
		<li><a href="{{ URL::to('posts/create') }}">Create Student Record</a></li>
		<li><a href="{{ URL::to('groups/create') }}">Create a Group</a></li>
		<li><a href="{{ URL::to('groupposts') }}">Add/Remove Student from Group</a></li>
		<li><a href="{{ URL::to('subgroups') }}">Create SubGroup</a></li>
	</ul>
</nav>
	@yield('content')
</div>
</body>
</html>