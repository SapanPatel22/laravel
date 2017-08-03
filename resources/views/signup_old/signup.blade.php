
@extends ('layout')

	@section('include_css_file')
		<link rel="stylesheet" href="css/style_signup.css" type="text/css">
	@endsection

	@section('form')
		<div class="sign_in">
			<form id="myform" name="registration" action="{{route('register_form')}}" method="post" enctype ="multipart/form-data" onsubmit="return validateForm(1)" autocomplete="off">
			<div class="mdl-grid">
			{{ csrf_field() }}
				<div id="prefix-dropdown" class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label mdl-cell mdl-cell--10-col">
					<span class="error_symbol">*</span>
					<span>Prefix:</span>
					<select class="mdl-selectfield__select" id="prefix" name="prefix" value="<?php ?>">
						<option value="">Please select options</option>
						<option value="Mr.">Mr.</option>
						<option value="Mrs.">Mrs.</option>
					</select>
					<label class="mdl-selectfield__label" for="prefix"></label>
					<span id="invalidprefix" class="error">{{ $errors->first('prefix') }}</span>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--10-col">
					<input class="mdl-textfield__input" type="text" id="fname" name="fname" value="<?php if(isset($fname)) echo $fname;?>">
					<span for="fname" class="mdl-tooltip">First Name</span>
					<label class="mdl-textfield__label" for="fname">
						<span class="error_symbol">*</span>First Name
					</label>
				</div>
					<span id="invalidfname" class="error">{{ $errors->first('fname') }}</span>
				
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--10-col">
					<input class="mdl-textfield__input" type="text" id="mname" name="mname" value="<?php if(isset($mname)) echo $mname;?>">
						<span for="mname" class="mdl-tooltip">Middle Name</span>
						<label class="mdl-textfield__label" for="mname">Middle Name</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--10-col">
					<input class="mdl-textfield__input" type="text" id="lname" name="lname" value="<?php if(isset($lname)) echo $lname;?>">
						<span for="lname" class="mdl-tooltip">Last Name</span>
						<label class="mdl-textfield__label" for="lname">
							<span class="error_symbol">*</span>Last Name
						</label>
				</div>
				<span id="invalidlname" class="error">{{ $errors->first('lname') }}</span>
			</div>
			<div class="mdl-grid">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--10-col">
					<input class="mdl-textfield__input" type="text" id="email" name="email"  value="<?php if(isset($email)) echo $email;?>">
					<span for="email" class="mdl-tooltip">Enter Email</span>
					<label class="mdl-textfield__label" for="email">
						<span class="error_symbol">*</span>Email/UserName
					</label>
				</div>
				<span id="invalidemail" class="error">{{ $errors->first('email') }}</span>
			</div>
			<div class="mdl-grid">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--10-col">
					<input class="mdl-textfield__input" type="password" id="pass" name="pass" value="<?php if(isset($pass)) echo $pass;?>">
					<span for="pass" class="mdl-tooltip">Enter Password</span>
					<label class="mdl-textfield__label" for="pass">
						<span class="error_symbol">*</span>Password
					</label>
				</div>
				<span id="invalidpass" class="error">{{ $errors->first('pass') }}</span>
			</div>
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--10-col">
					<span class="error_symbol">*</span>
					<span>Gender:</span>
					<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="male">
					<input type="radio" id="male" class="mdl-radio__button" name="gender" value="M" checked>
						<span class="mdl-radio__label">Male</span>
					</label>
					<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="female">
						<input type="radio" id="female" class="mdl-radio__button" name="gender" value="F">
						<span class="mdl-radio__label">Female</span>
					</label>
					<span id="invalid-gender" class="error">{{ $errors->first('gender') }}</span>
				</div>
				<div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label mdl-cell mdl-cell--10-col">
					<span class="error_symbol">*</span>
					<span>Marital Status:</span>
					<select class="mdl-selectfield__select" id="marital-status" name="marital-status" value="<?php if(isset($maritalStatus)) echo $maritalStatus;?>">
						<option selected value="">Please select options</option>
						<option value="Married">Married</option>
						<option value="UnMarried">UnMarried</option>
						<label class="mdl-selectfield__label" for="marital-status">Marital Status</label>
					</select>
				</div>
				 <span id="invalid-marital" class="error">{{ $errors->first('marital-status') }}</span>
			</div>
			<div class="mdl-grid">
				<div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label mdl-cell mdl-cell--10-col">
					<span class="error_symbol">*</span>
					<span>Company Name:</span>
					<select class="mdl-selectfield__select" id="company-name" name="company-name" value="<?php if(isset($company)) echo $company;?>">
						<option value="">Please select options</option>
						<option value="1">Mindfire</option>
						<option value="2">Date the ramp</option>
					</select>
					<label class="mdl-selectfield__label" for="company-name"></label>
				</div>
				<span id="invalid-company-name" class="error">{{ $errors->first('company-name') }}</span>
				<div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label mdl-cell mdl-cell--10-col">
					<span class="error_symbol">*</span>
					<span>Designation:</span>
					<select class="mdl-selectfield__select" id="designation-name" name="designation-name">
						<option value="">Please select options</option>
						<option value="1">Software Devloper</option>
						<option value="2">Software Testing</option>
					</select>
					<label class="mdl-selectfield__label" for="designation-name"></label>
				</div>
				<span id="invalid-designation-name" class="error">{{ $errors->first('designation-name') }}</span>
			</div>
			<div class="mdl-grid">
				<p>Official Address:</p>
				<div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label mdl-cell mdl-cell--12-col">
					<span class="error_symbol">*</span>
					<span>Country:</span>
					<select class="mdl-selectfield__select" id="office-country" name="office-country">
						<option value="">Please select options</option>
						<option value="1">India</option>
					</select>
					<label class="mdl-selectfield__label" for="office-country"></label>
				</div>
				 <span id="invalid-office-country" class="error">{{ $errors->first('office-country') }}</span>
			</div>
			<div class="mdl-grid">
				<div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label mdl-cell mdl-cell--12-col">
					<span class="error_symbol">*</span>
					<span>State:</span>
					<select class="mdl-selectfield__select" id="office-state" name="office-state">
						<option value="">Please select options</option>
						<option value="1">Odisha</option>
					</select>
					<label class="mdl-selectfield__label" for="office-state"></label>
				</div>
				<span id="invalid-office-state" class="error">{{ $errors->first('office-state') }}</span>
				</div>
				<div class="mdl-grid">
					<div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label mdl-cell mdl-cell--12-col">
					 <span class="error_symbol">*</span>
					 <span>City:</span>
						<select class="mdl-selectfield__select" id="office-city" name="office-city">
							<option value="">Please select options</option>
							<option value="1">Rourkela</option>
							<option value="2">Bhubaneswar</option>
						</select>
						<label class="mdl-selectfield__label" for="office-city"></label>
					</div>
					 <span id="invalid-office-city" class="error">{{ $errors->first('office-city') }}</span>
				</div>
				<div class="mdl-grid">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--10-col">
						<input class="mdl-textfield__input" type="text" id="office-street" name="office-street">
						<span for="street" class="mdl-tooltip">Enter Street</span>
						<label class="mdl-textfield__label" for="office-street">
							<span class="error_symbol">*</span>Street
						</label>
					</div>
					<span id="invalid-office-street" class="error">{{ $errors->first('office-street') }}</span>
				</div>
				<div class="mdl-grid">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--10-col">
						<input class="mdl-textfield__input" type="text" id="office-zip" name="office-zip">
						<span for="office-zip" class="mdl-tooltip">Enter zip</span>
						<label class="mdl-textfield__label" for="office-zip">
							<span class="error_symbol">*</span>Zip
						</label>
					</div>
					<span id="invalid-office-zip" class="error">{{ $errors->first('office-zip') }}</span>
				</div>
				<div class="mdl-grid">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--10-col">
						<input class="mdl-textfield__input" type="text" id="office-phone" name="office-phone" placeholder="eg: 1223456789">
						<span for="street" class="mdl-tooltip">Enter Phone Number</span>
						<label class="mdl-textfield__label" for="office-phone">
							<span class="error_symbol">*</span>Official Phone Number
						</label>
					</div>
					<span id="invalid-office-phone" class="error">{{ $errors->first('office-phone') }}</span>
				</div>
				<div class="mdl-grid">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--10-col">
						<input class="mdl-textfield__input" type="text" id="office-fax" name="office-fax" value="">
						<span for="official-fax" class="mdl-tooltip">Enter Fax Number</span>
						<label class="mdl-textfield__label" for="office-fax">
							Official Fax Number
						</label>
					</div>
					<span id="invalid-office-fax" class="error">{{ $errors->first('office-fax') }}</span>
				</div>
				<div class="mdl-grid">
					<p>Home Address:</p>
					<div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label mdl-cell mdl-cell--12-col">
						<span class="error_symbol">*</span>
						<span>Country:</span>
						<select class="mdl-selectfield__select" id="home-country" name="home-country">
							<option value="">Please select options</option>
							<option value="1">India</option>
						</select>
						<label class="mdl-selectfield__label" for="home-country"></label>
					</div>
					 <span id="invalid-home-country" class="error">{{ $errors->first('home-country') }}</span>
				</div>
				<div class="mdl-grid">
					<div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label mdl-cell mdl-cell--12-col">
						<span class="error_symbol">*</span>
						<span>State:</span>
						<select class="mdl-selectfield__select" id="home-state" name="home-state">
							<option value="">Please select options</option>
							<option value="1">Odisha</option>
						</select>
						<label class="mdl-selectfield__label" for="home-state"></label>
					</div>
					<span id="invalid-home-state" class="error">{{ $errors->first('home-state') }}</span>
				</div>
				<div class="mdl-grid">
					<div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label mdl-cell mdl-cell--12-col">
					 <span class="error_symbol">*</span>
					 <span>City:</span>
							<select class="mdl-selectfield__select" id="home-city" name="home-city">
								<option value="">Please select options</option>
								<option value="1">Rourkela</option>
								<option value="2">Bhubaneswar</option>
							</select>
							<label class="mdl-selectfield__label" for="home-city"></label>
					</div>
					<span id="invalid-home-city" class="error">{{ $errors->first('home-city') }}</span>
				</div>
				<div class="mdl-grid">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--10-col">
						<input class="mdl-textfield__input" type="text" id="home-street" name="home-street" value="">
						<span for="me-hostreet" class="mdl-tooltip">Enter Street</span>
						<label class="mdl-textfield__label" for="home-street">
							<span class="error_symbol">*</span>Street
					</label>
				</div>
				<span id="invalid-home-street" class="error">{{ $errors->first('home-street') }}</span>
				</div>
				<div class="mdl-grid">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--10-col">
						<input class="mdl-textfield__input" type="text" id="home-zip" name="home-zip">
						<span for="home-zip" class="mdl-tooltip">Enter zip</span>
						<label class="mdl-textfield__label" for="home-zip">
							<span class="error_symbol">*</span>Zip
						</label>
					</div>
					<span id="invalid-home-zip" class="error">{{ $errors->first('home-zip') }}</span>
				</div>
				<div class="mdl-grid">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--10-col">
						<input class="mdl-textfield__input" type="text" id="home-phone" name="home-phone"placeholder="eg: 1223456789" value="">
						<span for="home-phone" class="mdl-tooltip">Enter Phone Number</span>
						<label class="mdl-textfield__label" for="home-phone">
							<span class="error_symbol">*</span>Home Phone Number
						</label>
					</div>
					<span id="invalid-home-phone" class="error">{{ $errors->first('home-phone') }}</span>
				</div>
				<div class="mdl-grid">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--10-col">
						<input class="mdl-textfield__input" type="text" id="home-fax" name="home-fax" value="">
						<span for="home-fax" class="mdl-tooltip">Enter Fax Number</span>
						<label class="mdl-textfield__label" for="home-fax">
						Home Fax Number
					</label>
				</div>
					<span id="invalid-home-fax" class="error"></span>
				</div>
				<div class="mdl-grid">
					<div class="mdl-textfield mdl-js-textfield mdl-cell--10-col">
						<textarea class="mdl-textfield__input" type="text" rows="1" maxrows="6" id="extra-note" name="extra-note"></textarea>
						<label class="mdl-textfield__label" for="extra-note">Extra-Note</label>
					</div>
				</div>
				<div class="mdl-grid">
					<span>Preferred Communication:</span>
					<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="call">
						<input type="checkbox" id="call" class="mdl-checkbox__input" checked>
						<span class="mdl-checkbox__label">Call</span>
					</label>
					<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"  for="sms">
						<input type="checkbox" id="sms" class="mdl-checkbox__input">
						<span class="mdl-checkbox__label">SMS</span>
					</label>
				</div>
				<span class="error_symbol">*</span>Select image to upload:
				<input id="fileToUpload" type="file" name="fileToUpload" value="<?php if(isset($pass)) echo $pass;?>" onchange="previewFile()">
				<img src="" height="100" id="blah">
				<div>
					<p id="fileErr" class="error ">{{ $errors->first('fileToUpload') }}<?php if(isset($success)) echo $success;?><?php if (isset($validate['validate'])) { echo $validate['validate'];} ?></p>
				</div>
				<p>
					<input id="submit" type="submit" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"></input>
					<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
						<a  href="index.php">Login</a>
					</button>
				</p>
			</form>
		</div>
		@endsection
@section('include_js_file')
<!-- <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/validation_signup.js"></script>
<script src="js/validation_common.js"></script> -->
@endsection