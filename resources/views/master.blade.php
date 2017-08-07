<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	@yield('title')

	@yield('include_css_file')
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
<div class="navbar navbar-info navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-material-light-blue-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="javascript:void(0)">Welcome</a>
			@yield('usersProfile')
		</div>
		<div class="navbar-collapse collapse navbar-material-light-blue-collapse">
			<ul class="nav navbar-nav navbar-right">
				@yield('signup')
				 <li><a href="{{ $route }}">{{$route_name}}</a></li>
				</li>
			</ul>
		</div>
	</div>
</div>
	@yield('form')

	@yield('modal')

</body>
</html>