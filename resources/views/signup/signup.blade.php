@extends('master')

@section('title')
	<title>Signup</title>
@endsection

@section('include_css_file')
		<link rel="stylesheet" href="css/signup.css" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection

@section('signup')
	<li><a href="{{ route('signup_form') }}">SignUp</a></li>
@endsection

@section('form')
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-12">    
				<h1 class="entry-title"><span>Sign Up</span> </h1>
				<hr>
				{!! Form::open(['action' => 'SignupController@validateRequest', 'files' => true, 'id' => 'myform' ,'class' => 'form-horizontal','onsubmit' => 'return validateForm(1)', 'autocomplete' => 'on']) !!}

				<div class="form-group">
					{!! Html::decode(Form::label('fname', 'Full Name <span class="text-danger">*</span>', ['class' => 'control-label col-sm-3'])) !!}
					

					<div class="col-md-2 col-sm-9">
						{!! Form::select('prefix', ['Mr.' => 'Mr.', 'Mrs.' => 'Mrs.'], null, ['placeholder' => 'Prefix', 'class' => 'form-control']) !!}
						<span class="text-danger">{{ $errors->first('prefix') }}</span>
					</div>

					<div class="col-md-2 col-sm-9">
						{!! Form::text('fname', '', ['class'=>'form-control', 'placeholder'=>'First Name' , 'autofocus'=>'autofocus']) !!}
						<span class="text-danger">{{ $errors->first('fname') }}</span>
					</div>

					<div class="col-md-2 col-sm-9">
						{!! Form::text('mname', '', ['class'=>'form-control', 'placeholder'=>'Middle Name' , 'autofocus'=>'autofocus']) !!}
					</div>

					<div class="col-md-2 col-sm-9">
						{!! Form::text('lname', '', ['class'=>'form-control', 'placeholder'=>'Last Name' , 'autofocus'=>'autofocus']) !!}
						<span class="text-danger">{{ $errors->first('lname') }}</span>
					</div>

				</div>

			<div class="form-group">
				{!!  Html::decode(Form::label('email', 'Email ID<span class="text-danger">*</span>', ['class' => 'control-label col-sm-3 '])) !!}
				<div class="col-md-8 col-sm-9">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						{!! Form::text('email', '', ['class'=>'form-control', 'placeholder'=>'Email'], [ 'autofocus'=>'autofocus']) !!}
					</div>
					<span class="text-danger">{{ $errors->first('email') }}</span>
				</div>
			</div>
			
			<div class="form-group">
			{!!  Html::decode(Form::label('pass', 'Set Password<span class="text-danger">*</span>', ['class' => 'control-label col-sm-3 '])) !!}
				<div class="col-md-5 col-sm-8">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						{!! Form::password('pass', ['class' => 'form-control', 'placeholder' => 'Password must be between 5-15 characters']) !!}
				    </div>
				    <span class="text-danger">{{ $errors->first('pass') }}</span>
				</div>
			</div>

			<div class="form-group">
			  <div class="col-xs-offset-3 col-xs-10 col-md-8">
			  {!! Form::submit('Signup', ['class' => 'btn btn-lg btn-primary btn-block']) !!}
				
			  </div>
			</div> 
		  {!! Form::close() !!}
		</div>
	</div>
</div>
@endsection

@section('modal')
 <div class="sidebar-collapse" style="" id="sidebar-collapse">
     <a href="#" id="show" class="sidebar-collapse-icon with-animation" style="visibility: hidden">
         Click               
         <i class="entypo-menu"></i>
     </a>
 </div>

 <div id="success-login" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>You have successfully created an account</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default">
        <a href="{{ route('login_form') }}">Login</a></button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
$( document ).ready(function() {
	@if(isset($employeeInsertStatus) &&  true == $employeeInsertStatus )
		$("#success-login").modal();
	@endif
});
</script>
@endsection