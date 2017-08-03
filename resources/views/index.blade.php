@extends ('layout')

	@section('title')
		<title>Login</title>
	@endsection
	@section('include_css_file')
		<link rel="stylesheet" href="css/style.css" type="text/css">
	@endsection

	@section('form')
		<div class="sign_in">
			<form id="myform" action="{{route('submit_login_form')}}" method="post" onsubmit="return validateForm(0)" autocomplete="off">
				{{ csrf_field() }}
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input class="mdl-textfield__input" type="text" id="email" name="email" value="<?php if(isset($email)) { echo $email; }?>">
					<span for="email" class="mdl-tooltip">Enter Email</span>
					<label class="mdl-textfield__label" for="sample3">Email</label>
				</div>

				<span id="invalidemail" class="error">{{ $errors->first('email') }}
				@if (isset($emailErr))
					{{ $emailErr }}
				@endif
				</span>

				<br>

				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input class="mdl-textfield__input" type="password" id="pass" name="pass" value="<?php if(isset($pass)) { echo $pass; }?>">
					<span for="pass" class="mdl-tooltip">Enter Password</span>
					<label class="mdl-textfield__label" for="sample3">Password</label>
				</div>

				<span id="invalidpass" class="error">{{ $errors->first('pass') }}<?php if(isset($passErr)) { echo $passErr; }?></span>
				<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="remember-me">
					<input type="checkbox" id="remember-me" class="mdl-checkbox__input" value="true" name="remember-me">
					<span class="mdl-checkbox__label">Remember Me</span>
				</label>
				 <p>
					 <a  href="forgot.php">Forgot Password</a>
				 </p>
				<span id="credentialcheck" class="error"><?php if(isset($err)) { echo $err; }?></span>
				<input type="submit" name="login" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" value="Login"></input>
				<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
					<a  href="{{route('signup_form')}}">SignUp</a>
				</button>
			</form>
		</div>
	@endsection

	@section('include_js_file')
		<!-- <script src="js/validation_index.js"></script>
		<script src="js/validation_common.js"></script>
		<script src="js/getmdl-select.js"></script> -->
	@endsection
