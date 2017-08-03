@extends('master')

@section('title')
	<title>Signup</title>
@endsection

@section('include_css_file')
		<link rel="stylesheet" href="css/signup.css" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection

@section('form')


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<section>      
				<h1 class="entry-title"><span>Sign Up</span> </h1>
				<hr>
				{!! Form::open(['action' => 'SignupController@validateRequest', 'files' => true, 'id' => 'myform' ,'class' => 'form-horizontal','onsubmit' => 'return validateForm(1)', 'autocomplete' => 'off']) !!}

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

			<!-- <div class="form-group">
			  <label class="control-label col-sm-3">Date of Birth <span class="text-danger">*</span></label>
			  <div class="col-xs-8">
				<div class="form-inline">
				  <div class="form-group">
					<select name="dd" class="form-control">
					  <option value="">Date</option>
					  <option value="1" >1 </option><option value="2" >2 </option><option value="3" >3 </option><option value="4" >4 </option><option value="5" >5 </option><option value="6" >6 </option><option value="7" >7 </option><option value="8" >8 </option><option value="9" >9 </option><option value="10" >10 </option><option value="11" >11 </option><option value="12" >12 </option><option value="13" >13 </option><option value="14" >14 </option><option value="15" >15 </option><option value="16" >16 </option><option value="17" >17 </option><option value="18" >18 </option><option value="19" >19 </option><option value="20" >20 </option><option value="21" >21 </option><option value="22" >22 </option><option value="23" >23 </option><option value="24" >24 </option><option value="25" >25 </option><option value="26" >26 </option><option value="27" >27 </option><option value="28" >28 </option><option value="29" >29 </option><option value="30" >30 </option><option value="31" >31 </option>                </select>
				  </div>
				  <div class="form-group">
					<select name="mm" class="form-control">
					  <option value="">Month</option>
					  <option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>                </select>
				  </div>
				  <div class="form-group" >
					<select name="yyyy" class="form-control">
					  <option value="0">Year</option>
					  <option value="1955" >1955 </option><option value="1956" >1956 </option><option value="1957" >1957 </option><option value="1958" >1958 </option><option value="1959" >1959 </option><option value="1960" >1960 </option><option value="1961" >1961 </option><option value="1962" >1962 </option><option value="1963" >1963 </option><option value="1964" >1964 </option><option value="1965" >1965 </option><option value="1966" >1966 </option><option value="1967" >1967 </option><option value="1968" >1968 </option><option value="1969" >1969 </option><option value="1970" >1970 </option><option value="1971" >1971 </option><option value="1972" >1972 </option><option value="1973" >1973 </option><option value="1974" >1974 </option><option value="1975" >1975 </option><option value="1976" >1976 </option><option value="1977" >1977 </option><option value="1978" >1978 </option><option value="1979" >1979 </option><option value="1980" >1980 </option><option value="1981" >1981 </option><option value="1982" >1982 </option><option value="1983" >1983 </option><option value="1984" >1984 </option><option value="1985" >1985 </option><option value="1986" >1986 </option><option value="1987" >1987 </option><option value="1988" >1988 </option><option value="1989" >1989 </option><option value="1990" >1990 </option><option value="1991" >1991 </option><option value="1992" >1992 </option><option value="1993" >1993 </option><option value="1994" >1994 </option><option value="1995" >1995 </option><option value="1996" >1996 </option><option value="1997" >1997 </option><option value="1998" >1998 </option><option value="1999" >1999 </option><option value="2000" >2000 </option><option value="2001" >2001 </option><option value="2002" >2002 </option><option value="2003" >2003 </option><option value="2004" >2004 </option><option value="2005" >2005 </option><option value="2006" >2006 </option>                </select>
				  </div>
				</div>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-3">Gender <span class="text-danger">*</span></label>
			  <div class="col-md-8 col-sm-9">
				<label>
				<input name="gender" type="radio" value="Male" checked>
				Male </label>
				   
				<label>
				<input name="gender" type="radio" value="Female" >
				Female </label>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-3">Contact No. <span class="text-danger">*</span></label>
			  <div class="col-md-5 col-sm-8">
				<div class="input-group">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
				<input type="text" class="form-control" name="contactnum" id="contactnum" placeholder="Enter your Primary contact no." value="">
				</div>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-3">Alternate No. <br>
			  <small>(if any)</small></label>
			  <div class="col-md-5 col-sm-8">
				<input type="text" class="form-control" name="contactnum2" id="contactnum2" placeholder="Any other or Landline no (if any)" value="">
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-3">Profile Photo <br>
			  <small>(optional)</small></label>
			  <div class="col-md-5 col-sm-8">
				<div class="input-group"> <span class="input-group-addon" id="file_upload"><i class="glyphicon glyphicon-upload"></i></span>
				  <input type="file" name="file_nm" id="file_nm" class="form-control upload" placeholder="" aria-describedby="file_upload">
				</div>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-3">Security Code </label>
			  <div class="col-md-5 col-sm-8">
				<div >
					
					<input type="text" name="captcha" id="captcha" class="form-control label-warning"  />                
				  </div>
			  </div>
			</div>
			<div class="form-group">
			  <div class="col-xs-offset-3 col-md-8 col-sm-9"><span class="text-muted"><span class="label label-danger">Note:-</span> By clicking Sign Up, you agree to our <a href="#">Terms</a> and that you have read our <a href="#">Policy</a>, including our <a href="#">Cookie Use</a>.</span> </div>
			</div> -->
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