@extends('master')

@section('title')
	<title>Signup</title>
@endsection

@section('include_css_file')
		<link rel="stylesheet" href="css/signup.css" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection

@section('usersProfile')
 <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
 <a class="navbar-brand" href="{{ route('users_profile') }}">Users profile</a>
@endsection

@section('form')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<section>      
				<h1 class="entry-title"><span>Edit</span> </h1>
				<hr>
				<div class="flash-message">
				@foreach (['danger', 'warning', 'success', 'info'] as $msg)
					@if(Session::has('alert-' . $msg))
						<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					@endif
				@endforeach
				</div>
				{!! Form::open(['action' => 'UsersProfileController@validateEditRequest', 'files' => true, 'id' => 'myform' ,'class' => 'form-horizontal','onsubmit' => 'return validateForm(1)', 'autocomplete' => 'off']) !!}

				<div class="form-group">
					{!! Html::decode(Form::label('fname','Full Name <span class="text-danger">*</span>', ['class' => 'control-label col-sm-3'])) !!}
					

					<div class="col-md-2 col-sm-9">
						{!! Form::select('prefix', ['Mr.' => 'Mr.', 'Mrs.' => 'Mrs.'], $getUserDetails->prefix, ['placeholder' => 'Prefix', 'class' => 'form-control']) !!}
						<span class="text-danger">{{ $errors->first('prefix') }}</span>
					</div>

					<div class="col-md-2 col-sm-9">
						{!! Form::text('fname', $getUserDetails->first_name, ['class'=>'form-control', 'placeholder'=>'First Name' , 'autofocus'=>'autofocus']) !!}
						<span class="text-danger">{{ $errors->first('fname') }}</span>
					</div>

					<div class="col-md-2 col-sm-9">
						{!! Form::text('mname', $getUserDetails->middle_name, ['class'=>'form-control', 'placeholder'=>'Middle Name' , 'autofocus'=>'autofocus']) !!}
						<span class="text-danger">{{ $errors->first('mname') }}</span>
					</div>

					<div class="col-md-2 col-sm-9">
						{!! Form::text('lname', $getUserDetails->last_name, ['class'=>'form-control', 'placeholder'=>'Last Name' , 'autofocus'=>'autofocus' ]) !!}
						<span class="text-danger">{{ $errors->first('lname') }}</span>
					</div>

				</div>

			<div class="form-group">
				{!!  Html::decode(Form::label('email', 'Email ID<span class="text-danger">*</span>', ['class' => 'control-label col-sm-3 '])) !!}
				<div class="col-md-8 col-sm-9">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						{!! Form::text('email',$getUserDetails->email, ['class'=>'form-control', 'placeholder'=>'Email',  'autofocus'=>'autofocus', 'readonly']) !!}
					</div>
					<span class="text-danger">{{ $errors->first('email') }}</span>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-xs-offset-3 col-xs-10 col-md-8">
				{!! Form::submit('Save Changes', ['class' => 'btn btn-lg btn-primary btn-block']) !!}
				</div>
			</div> 
		  {!! Form::close() !!}
		</div>
	</div>
</div>
@endsection