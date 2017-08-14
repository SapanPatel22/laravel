@extends('master')

@section('title')
	<title>CreateUser</title>
@endsection

@section('include_css_file')
		<link rel="stylesheet" href="css/signup.css" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection


@section('usersProfile')
<a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
<a class="navbar-brand" href="{{ route('users_profile') }}">Users</a>
<a class="navbar-brand" href="{{ route('view_user_role') }}">Role</a>
<a class="navbar-brand" href="{{ route('create_user') }}">Create</a>
<a class="navbar-brand" href="{{ route('cms_page') }}">Create pages</a>
<a class="navbar-brand" href="{{ route('view_page_list') }}">View Pages</a>
@endsection

@section('form')
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-12">    
				<h1 class="entry-title"><span>Create User</span> </h1>
				<hr>

				<div class="flash-message">
				@foreach (['danger', 'warning', 'success', 'info'] as $msg)
					@if(Session::has('alert-' . $msg))
						<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					@endif
				@endforeach
				</div>

				{!! Form::open(['action' => 'CreateUserController@create', 'id' => 'myform' ,'class' => 'form-horizontal','autocomplete' => 'on']) !!}

				<div class="form-group">
					{!! Html::decode(Form::label('fname', 'Full Name <span class="text-danger">*</span>', ['class' => 'control-label col-sm-3'])) !!}
					

					<div class="col-md-2 col-sm-9">
						{!! Form::select('prefix', ['Mr.' => 'Mr.', 'Mrs.' => 'Mrs.'], null, ['placeholder' => 'Prefix', 'class' => 'form-control']) !!}
						<span class="text-danger">{{ $errors->first('prefix') }}</span>
					</div>

					<div class="col-md-2 col-sm-9">
						{!! Form::text('fname', '', ['class'=>'form-control', 'placeholder'=>'First Name']) !!}
						<span class="text-danger">{{ $errors->first('fname') }}</span>
					</div>

					<div class="col-md-2 col-sm-9">
						{!! Form::text('mname', '', ['class'=>'form-control', 'placeholder'=>'Middle Name' ]) !!}
						<span class="text-danger">{{ $errors->first('mname') }}</span>
					</div>

					<div class="col-md-2 col-sm-9">
						{!! Form::text('lname', '', ['class'=>'form-control', 'placeholder'=>'Last Name']) !!}
						<span class="text-danger">{{ $errors->first('lname') }}</span>
					</div>

				</div>

			<div class="form-group">
				{!!  Html::decode(Form::label('email', 'Email ID<span class="text-danger">*</span>', ['class' => 'control-label col-sm-3 '])) !!}
				<div class="col-md-8 col-sm-9">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						{!! Form::text('email', '', ['class'=>'form-control', 'placeholder'=>'Email']) !!}
					</div>
					<span class="text-danger">{{ $errors->first('email') }}</span>
				</div>
			</div>
			
			<div class="form-group">
			{!!  Html::decode(Form::label('pass', 'Set Password<span class="text-danger">*</span>', ['class' => 'control-label col-sm-3 '])) !!}
				<div class="col-md-8 col-sm-8">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						{!! Form::password('pass', ['class' => 'form-control', 'placeholder' => 'Password must be between 8-12 characters']) !!}
					</div>
					<span class="text-danger">{{ $errors->first('pass') }}</span>
				</div>
			</div>

			<div class="form-group">
			{!!  Html::decode(Form::label('roles', 'Set Role<span class="text-danger">*</span>', ['class' => 'control-label col-sm-3 '])) !!}
				<div class="col-md-8 col-sm-8">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						{!! Form::select('roles', ['1' => 'Accountant', '2' => 'Trainner', '3' => 'ITAdmin', '4' => 'SuperAdmin'], null, ['placeholder' => 'Select', 'class' => 'form-control']) !!}
					</div>
					<span class="text-danger">{{ $errors->first('roles') }}</span>
				</div>
			</div>

			<div class="form-group">
					<div class="col-xs-offset-3 col-xs-10 col-md-8">
					{!! Form::submit('Create', ['class' => 'btn btn-lg btn-primary btn-block']) !!}
					</div>
			</div> 
				{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection