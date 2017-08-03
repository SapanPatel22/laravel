<!DOCTYPE html>
<html>
<head>
	@yield('title')
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">

	@yield('include_css_file')
	
	<link rel="stylesheet" href="css/getmdl-select.scss" type="text/css">

	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

</head>
<body>
<div class="mdl-layout mdl-layout--fixed-header">
	<header class="mdl-layout__header">
		<div class="mdl-layout__header-row">
			<span class="mdl-layout-title">Welcome</span>
			<div class="mdl-layout-spacer"></div>
			<nav class="mdl-navigation mdl-layout--large-screen-only">
				<a class="mdl-navigation__link" href="signup.php">SignUp</a>
				<a class="mdl-navigation__link" href="index.php">Login</a>
			</nav>
		</div>
	</header>
	<div class="mdl-layout__drawer ">
		<span class="mdl-layout-title">Title</span>
		<nav class="mdl-navigation">
			<a class="mdl-navigation__link" href="#">SignUp</a>
			<a class="mdl-navigation__link" href="#">LOgin</a>
		</nav>
	</div>
</div>
	<div class="container">
		@yield('form')
	</div>

@yield('include_js_file')
</body>
</html>