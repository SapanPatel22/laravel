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
		<div class="col-xs-12">
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
				{!! Form::open(['action' => 'UsersProfileController@validateEditRequest', 'files' => true, 'id' => 'myform' ,'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}

				<div class="form-group">
					{!! Html::decode(Form::label('fname','Full Name <span class="text-danger">*</span>', ['class' => 'control-label col-sm-3'])) !!}
					

					<div class="col-md-2 col-sm-9">
						{!! Form::select('prefix', ['Mr.' => 'Mr.', 'Mrs.' => 'Mrs.'], $getUserDetails->prefix, ['placeholder' => 'Prefix', 'class' => 'form-control']) !!}
						<span class="text-danger">{{ $errors->first('prefix') }}</span>
					</div>

					<div class="col-md-2 col-sm-9">
						{!! Form::text('fname', $getUserDetails->first_name, ['class'=>'form-control', 'placeholder'=>'First Name' ]) !!}
						<span class="text-danger">{{ $errors->first('fname') }}</span>
					</div>

					<div class="col-md-2 col-sm-9">
						{!! Form::text('mname', $getUserDetails->middle_name, ['class'=>'form-control', 'placeholder'=>'Middle Name']) !!}
						<span class="text-danger">{{ $errors->first('mname') }}</span>
					</div>

					<div class="col-md-2 col-sm-9">
						{!! Form::text('lname', $getUserDetails->last_name, ['class'=>'form-control', 'placeholder'=>'Last Name']) !!}
						<span class="text-danger">{{ $errors->first('lname') }}</span>
					</div>

				</div>

			<div class="form-group">
				{!!  Html::decode(Form::label('email', 'Email ID<span class="text-danger">*</span>', ['class' => 'control-label col-sm-3 '])) !!}
				<div class="col-md-8 col-sm-9">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						{!! Form::text('email',$getUserDetails->email, ['class'=>'form-control', 'placeholder'=>'Email', 'readonly']) !!}
					</div>
					<span class="text-danger">{{ $errors->first('email') }}</span>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3">Gender 
					<span class="text-danger">*</span>
				</label>
				<div class="col-md-2 col-sm-9">
					<label>
						<input name="gender" type="radio" value="Male" checked>Male 
					</label>
					<label>
						<input name="gender" type="radio" value="Female">Female
					</label>
				</div>
				{!! Html::decode(Form::label('marital-status','Marital Status <span class="text-danger">*</span>', ['class' => 'control-label col-sm-2'])) !!}
				<div class="col-md-2 col-sm-9">
					{!! Form::select('marital-status', ['Married' => 'Married', 'Unmarried' => 'Unmarried'], $getUserDetails->marital_status, ['placeholder' => 'Marital-Status', 'class' => 'form-control']) !!}
					<span class="text-danger">{{ $errors->first('marital-status') }}</span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">DOB
					<span class="text-danger">*</span>
				</label>
				<div class='col-sm-8'>
					<div class='input-group date'>
						{!! Form::date('dob',$getUserDetails->dob ,['class' => 'form-control']) !!}
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
					<span class="text-danger">{{ $errors->first('dob') }}</span>
				</div>
			</div>

			<div class="form-group">
					{!! Html::decode(Form::label('company_name','Company Name <span class="text-danger">*</span>', ['class' => 'control-label col-sm-3'])) !!}
					

					<div class="col-md-2 col-sm-9">
						{!! Form::select('company_name', [1 => 'Mindfire', 2 => 'Date the ramp'], $getUserDetails->fk_company_id, ['placeholder' => 'Company', 'class' => 'form-control']) !!}
						<span class="text-danger">{{ $errors->first('company_name') }}</span>
					</div>
		
					{!! Html::decode(Form::label('designation_name','Designation Name <span class="text-danger">*</span>', ['class' => 'control-label col-sm-3'])) !!}
					

					<div class="col-md-2 col-sm-9">
						{!! Form::select('designation_name', [1 => 'Software Devloper', 2 => 'Software Testing'], $getUserDetails->fk_role_id, ['placeholder' => 'Designation', 'class' => 'form-control']) !!}
						<span class="text-danger">{{ $errors->first('designation_name') }}</span>
					</div>
			</div>

			<div class="form-group">
					{!! Html::decode(Form::label('company_address','Company Address <span class="text-danger">*</span>', ['class' => 'control-label col-sm-3'])) !!}
					

				<div class="col-md-3 col-sm-9">
					{!! Form::select('company_country', ['1' => 'India'], 1, ['placeholder' => 'Country', 'class' => 'form-control' ]) !!}
					<span class="text-danger">{{ $errors->first('company_country') }}</span>
				</div>

				<div class="col-md-3 col-sm-9">
					{!! Form::select('company_state', ['1' => 'Odisha'], 1, ['placeholder' => 'State', 'class' => 'form-control']) !!}
					<span class="text-danger">{{ $errors->first('company_state') }}</span>
				</div>

				<div class="col-md-2 col-sm-9">
					{!! Form::select('company_city', ['1' => 'Bhubaneswar', '2' => 'Cuttack'],$getUserAddress[0]["fk_city_id"] ?? '', ['placeholder' => 'City', 'class' => 'form-control']) !!}
					<span class="text-danger">{{ $errors->first('company_city') }}</span>
				</div>
			</div>

			<div class="form-group">
				{!!  Html::decode(Form::label('company_street', 'Street<span class="text-danger">*</span>', ['class' => 'control-label col-sm-3 '])) !!}
				<div class="col-md-8 col-sm-9">
					<div class="input-group col-xs-12">
						{!! Form::text('company_street',$getUserAddress[0]["street"] ?? '', ['class'=>'form-control', 'placeholder'=>'Street']) !!}
					</div>
					<span class="text-danger">{{ $errors->first('company_street') }}</span>
				</div>
			</div>

			<div class="form-group">
				{!!  Html::decode(Form::label('company_zip', 'Zip<span class="text-danger">*</span>', ['class' => 'control-label col-sm-3 '])) !!}
				<div class="col-md-8 col-sm-9">
					<div class="input-group col-xs-12">
						{!! Form::text('company_zip',$getUserAddress[0]["zip"] ?? '', ['class'=>'form-control', 'placeholder'=>'Zip']) !!}
					</div>
					<span class="text-danger">{{ $errors->first('company_zip') }}</span>
				</div>
			</div>

			<div class="form-group">
				{!! Html::decode(Form::label('company_fax', 'Fax<span class="text-danger">*</span>', ['class' => 'control-label col-sm-3 '])) !!}
				<div class="col-md-8 col-sm-9">
					<div class="input-group col-xs-12">
						{!! Form::text('company_fax',$getUserAddress[0]["fax"] ?? '', ['class'=>'form-control', 'placeholder'=>'Fax']) !!}
					</div>
					<span class="text-danger">{{ $errors->first('company_fax') }}</span>
				</div>
			</div>

			<div class="form-group">
				{!!  Html::decode(Form::label('company_phone', 'Phone<span class="text-danger">*</span>', ['class' => 'control-label col-sm-3 '])) !!}
				<div class="col-md-8 col-sm-9">
					<div class="input-group col-xs-12">
					<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
						{!! Form::text('company_phone', $getUserAddress[0]["phone"] ?? '', ['class'=>'form-control', 'placeholder'=>'Phone']) !!}
					</div>
					<span class="text-danger">{{ $errors->first('company_phone') }}</span>
				</div>
			</div>
			
			<div class="form-group">
					{!! Html::decode(Form::label('company_address','Home Address <span class="text-danger">*</span>', ['class' => 'control-label col-sm-3'])) !!}
					

				<div class="col-md-3 col-sm-9">
					{!! Form::select('home_country', ['1' => 'India'], 1, ['placeholder' => 'Country', 'class' => 'form-control']) !!}
					<span class="text-danger">{{ $errors->first('home_country') }}</span>
				</div>

				<div class="col-md-3 col-sm-9">
					{!! Form::select('home_state', ['1' => 'Odisha'], 1, ['placeholder' => 'State', 'class' => 'form-control']) !!}
					<span class="text-danger">{{ $errors->first('home_state') }}</span>
				</div>

				<div class="col-md-2 col-sm-9">
					{!! Form::select('home_city', ['1' => 'Bhubaneswar', '2' => 'Cuttack'],$getUserAddress[1]["fk_city_id"] ?? '', ['placeholder' => 'City', 'class' => 'form-control']) !!}
					<span class="text-danger">{{ $errors->first('home_city') }}</span>
				</div>
			</div>

			<div class="form-group">
				{!!  Html::decode(Form::label('home_street', 'Street<span class="text-danger">*</span>', ['class' => 'control-label col-sm-3 '])) !!}
				<div class="col-md-8 col-sm-9">
					<div class="input-group col-xs-12">
						{!! Form::text('home_street', $getUserAddress[1]["street"] ?? '', ['class'=>'form-control', 'placeholder'=>'Street']) !!}
					</div>
					<span class="text-danger">{{ $errors->first('home_street') }}</span>
				</div>
			</div>

			<div class="form-group">
				{!!  Html::decode(Form::label('home_zip', 'Zip<span class="text-danger">*</span>', ['class' => 'control-label col-sm-3 '])) !!}
				<div class="col-md-8 col-sm-9">
					<div class="input-group col-xs-12">
						{!! Form::text('home_zip', $getUserAddress[1]["zip"] ?? '', ['class'=>'form-control', 'placeholder'=>'Zip']) !!}
					</div>
					<span class="text-danger">{{ $errors->first('home_zip') }}</span>
				</div>
			</div>

			<div class="form-group">
				{!!  Html::decode(Form::label('home_fax', 'Fax<span class="text-danger">*</span>', ['class' => 'control-label col-sm-3 '])) !!}
				<div class="col-md-8 col-sm-9">
					<div class="input-group col-xs-12">
						{!! Form::text('home_fax', $getUserAddress[1]["fax"] ?? '', ['class'=>'form-control', 'placeholder'=>'Fax']) !!}
					</div>
					<span class="text-danger">{{ $errors->first('home_fax') }}</span>
				</div>
			</div>

			<div class="form-group">
				{!!  Html::decode(Form::label('home_phone', 'Phone<span class="text-danger">*</span>', ['class' => 'control-label col-sm-3 '])) !!}
				<div class="col-md-8 col-sm-9">
					<div class="input-group col-xs-12">
					<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
						{!! Form::text('home_phone', $getUserAddress[1]["phone"] ?? '', ['class'=>'form-control', 'placeholder'=>'Phone']) !!}
					</div>
					<span class="text-danger">{{ $errors->first('home_phone') }}</span>
				</div>
			</div>

			<div class="form-group">
			  	<label class="control-label col-sm-3">Profile Photo
					<span class="text-danger">*</span>
				</label>
			 	<div class="col-md-8 col-sm-8">
					<div class="input-group"> <span class="input-group-addon" id="file_upload"><i class="glyphicon glyphicon-upload"></i></span>
						{!! Form::file('image', null ,['class' => 'form-control upload' ,'aria-describedby' => 'file_upload ' , 'aria-describedby' => 'file_upload']) !!}
					</div>
					<span class="text-danger">{{ $errors->first('image') }}</span>
				  </div>
			</div>

			<div class="form-group">
				<div class="col-xs-offset-3 col-xs-10 col-md-8">
				{!! Form::submit('Save Changes', ['class' => 'btn btn-lg btn-primary btn-block', 'name' => 'form_button_name']) !!}
				</div>
				<br>
			</div> 
			<div class="form-group">
				<div class="col-xs-offset-3 col-xs-10 col-md-8">
					 {!! Form::submit('Cancel', ['class'=> 'btn btn-lg btn-primary btn-block', 'name' => 'form_button_name']) !!}
				</div>
			</div>
		  {!! Form::close() !!}
		</div>
	</div>
</div>
@endsection