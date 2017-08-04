@extends ('master')

@section('title')
	<title>Login</title>
@endsection

@section('include_css_file')
		<link rel="stylesheet" href="css/login.css" type="text/css">
@endsection

@section('signup')
	<li><a href="{{ route('signup_form') }}">SignUp</a></li>
@endsection

@section('form')
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<h1 class="text-center login-title">Sign in to continue to MyApp</h1>
				@foreach (['danger', 'warning', 'success', 'info'] as $msg)
					@if(Session::has('alert-' . $msg))
						<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="{{route('login_form')}}" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					@endif
				@endforeach
				<div class="account-wall">
				<div class="flash-message">
				</div>
					<img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
						alt="">
					{!! Form::open(['action' => 'LoginController@validateUserEmail', 'files' => true, 'id' => 'myform' ,'class' => 'form-signin', 'onsubmit' => 'return validateForm(0)']) !!}
						<p>
							{!! Form::text('email', '', ['class'=>'form-control', 'placeholder'=>'Email'], [ 'autofocus'=>'autofocus']) !!}
							<span class="text-danger">{{ $errors->first('email') }}</span>
						</p>
						<p>
							{!! Form::password('pass', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
							<span class="text-danger">{{ $errors->first('pass') }}</span>
						</p>
						<p>
							{!! Form::submit('Login', ['class' => 'btn btn-lg btn-primary btn-block']) !!}
							
						</p>
						<p>
							<strong>
								{!! Form::label('', '', ['class' => 'checkbox pull-left']) !!}
								{!! Form::checkbox('remember-me', 'remember-me') !!}
								Remember me
							</strong>
						</p>
						<a href="#" class="pull-right need-help">Forgot password?</a><span class="clearfix"></span>
					{!! Form::close() !!}
				</div>
				<a href="{{route('signup_form')}}" class="text-center new-account">Create an account </a>
			</div>
		</div>
	</div>
@endsection
