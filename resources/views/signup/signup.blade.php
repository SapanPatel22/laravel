
@extends ('layout')
aaaaaaaaaaa
<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
	<link rel="stylesheet" href="css/style_signup.css" type="text/css">

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
	<div class="mdl-layout__drawer">
		<span class="mdl-layout-title">Title</span>
		<nav class="mdl-navigation">
			<a class="mdl-navigation__link" href="#">SignUp</a>
			<a class="mdl-navigation__link" href="#">LOgin</a>
		</nav>
	</div>
</div>
<div class="container">
	<div class="sign_in">
		<form id="myform" name="registration" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype ="multipart/form-data" onsubmit="return validateForm(1)" autocomplete="off">
		<div class="mdl-grid">
			<div id="prefix-dropdown" class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label mdl-cell mdl-cell--10-col">
				<span class="error_symbol">*</span>
				<span>Prefix:</span>
				<select class="mdl-selectfield__select" id="prefix" name="prefix" value="<?php ?>">
					<option value="">Please select options</option>
					<option value="Mr.">Mr.</option>
					<option value="Mrs.">Mrs.</option>
				</select>
				<label class="mdl-selectfield__label" for="prefix"></label>
				<span id="invalidprefix" class="error"><?php if (isset($prefixErr)) { echo $prefixErr;}?></span>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--10-col">
				<input class="mdl-textfield__input" type="text" id="fname" name="fname" value="<?php echo $fname;?>">
				<span for="fname" class="mdl-tooltip">First Name</span>
				<label class="mdl-textfield__label" for="fname">
					<span class="error_symbol">*</span>First Name
				</label>
			</div>
				<span id="invalidfname" class="error"><?php if (isset($fnameErr)) { echo $fnameErr;}?></span>
			
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--10-col">
				<input class="mdl-textfield__input" type="text" id="mname" name="mname" value="<?php echo $mname;?>">
					<span for="mname" class="mdl-tooltip">Middle Name</span>
					<label class="mdl-textfield__label" for="mname">Middle Name</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--10-col">
				<input class="mdl-textfield__input" type="text" id="lname" name="lname" value="<?php echo $lname;?>">
					<span for="lname" class="mdl-tooltip">Last Name</span>
					<label class="mdl-textfield__label" for="lname">
						<span class="error_symbol">*</span>Last Name
					</label>
			</div>
			<span id="invalidlname" class="error"><?php if(isset($lnameErr)) { echo $lnameErr; }?></span>
		</div>
		<div class="mdl-grid">
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--10-col">
				<input class="mdl-textfield__input" type="text" id="email" name="email"  value="<?php echo $email;?>">
				<span for="email" class="mdl-tooltip">Enter Email</span>
				<label class="mdl-textfield__label" for="email">
					<span class="error_symbol">*</span>Email/UserName
				</label>
			</div>
			<span id="invalidemail" class="error"><?php if (isset($emailErr)) { echo $emailErr;}?></span>
		</div>
		<div class="mdl-grid">
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--10-col">
				<input class="mdl-textfield__input" type="password" id="pass" name="pass" value="<?php echo $pass;?>">
				<span for="pass" class="mdl-tooltip">Enter Password</span>
				<label class="mdl-textfield__label" for="pass">
					<span class="error_symbol">*</span>Password
				</label>
			</div>
			<span id="invalidpass" class="error"><?php if (isset($passErr)) { echo $passErr;}?></span>
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
				<span id="invalid-gender" class="error"><?php if (isset($genderErr)) { echo $genderErr;}?></span>
			</div>
			<div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label mdl-cell mdl-cell--10-col">
				<span class="error_symbol">*</span>
				<span>Marital Status:</span>
				<select class="mdl-selectfield__select" id="marital-status" name="marital-status" value="<?php echo $maritalStatus;?>">
					<option selected value="">Please select options</option>
					<option value="Married">Married</option>
					<option value="UnMarried">UnMarried</option>
					<label class="mdl-selectfield__label" for="marital-status">Marital Status</label>
				</select>
			</div>
			 <span id="invalid-marital" class="error"><?php if (isset($maritalStatusErr)) { echo $maritalStatusErr;}?></span>
		</div>
		<div class="mdl-grid">
			<div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label mdl-cell mdl-cell--10-col">
				<span class="error_symbol">*</span>
				<span>Company Name:</span>
				<select class="mdl-selectfield__select" id="company-name" name="company-name" value="<?php echo $company;?>">
					<option value="">Please select options</option>
					<option value="1">Mindfire</option>
					<option value="2">Date the ramp</option>
				</select>
				<label class="mdl-selectfield__label" for="company-name"></label>
			</div>
			<span id="invalid-company-name" class="error"><?php if (isset($companyNameErr)) { echo $companyNameErr;}?></span>
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
			<span id="invalid-designation-name" class="error"><?php if (isset($designationNameErr)) { echo $designationNameErr;}?></span>
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
			 <span id="invalid-office-country" class="error"><?php if (isset($officeCountryErr)) { echo $officeCountryErr;}?></span>
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
			<span id="invalid-office-state" class="error"><?php if (isset($officeStateErr)) { echo $officeStateErr;}?></span>
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
				 <span id="invalid-office-city" class="error"><?php if (isset($officeCityErr)) { echo $officeCityErr;}?></span>
			</div>
			<div class="mdl-grid">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--10-col">
					<input class="mdl-textfield__input" type="text" id="office-street" name="office-street">
					<span for="street" class="mdl-tooltip">Enter Street</span>
					<label class="mdl-textfield__label" for="office-street">
						<span class="error_symbol">*</span>Street
					</label>
				</div>
				<span id="invalid-office-street" class="error"><?php if (isset($officeStreetErr)) { echo $officeStreetErr;}?></span>
			</div>
			<div class="mdl-grid">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--10-col">
					<input class="mdl-textfield__input" type="text" id="office-zip" name="office-zip">
					<span for="office-zip" class="mdl-tooltip">Enter zip</span>
					<label class="mdl-textfield__label" for="office-zip">
						<span class="error_symbol">*</span>Zip
					</label>
				</div>
				<span id="invalid-office-zip" class="error"><?php if (isset($officeZipErr)) { echo $officeZipErr;}?></span>
			</div>
			<div class="mdl-grid">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--10-col">
					<input class="mdl-textfield__input" type="text" id="office-phone" name="office-phone" placeholder="eg: 1223456789">
					<span for="street" class="mdl-tooltip">Enter Phone Number</span>
					<label class="mdl-textfield__label" for="office-phone">
						<span class="error_symbol">*</span>Official Phone Number
					</label>
				</div>
				<span id="invalid-office-phone" class="error"><?php if (isset($officePhoneErr)) { echo $officePhoneErr;}?></span>
			</div>
			<div class="mdl-grid">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--10-col">
					<input class="mdl-textfield__input" type="text" id="office-fax" name="office-fax" value="">
					<span for="official-fax" class="mdl-tooltip">Enter Fax Number</span>
					<label class="mdl-textfield__label" for="office-fax">
						Official Fax Number
					</label>
				</div>
				<span id="invalid-office-fax" class="error"><?php if (isset($officeFaxErr)) { echo $officeFaxErr;}?></span>
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
				 <span id="invalid-home-country" class="error"><?php if (isset($homeCountryErr)) { echo $homeCountryErr;}?></span>
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
				<span id="invalid-home-state" class="error"><?php if (isset($homeStateErr)) { echo $homeStateErr;}?></span>
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
				<span id="invalid-home-city" class="error"><?php if (isset($homeCityErr)) { echo $homeCityErr;}?></span>
			</div>
			<div class="mdl-grid">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--10-col">
					<input class="mdl-textfield__input" type="text" id="home-street" name="home-street" value="">
					<span for="me-hostreet" class="mdl-tooltip">Enter Street</span>
					<label class="mdl-textfield__label" for="home-street">
						<span class="error_symbol">*</span>Street
				</label>
			</div>
			<span id="invalid-home-street" class="error"><?php if (isset($homeStreetErr)) { echo $homeStreetErr;}?></span>
			</div>
			<div class="mdl-grid">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--10-col">
					<input class="mdl-textfield__input" type="text" id="home-zip" name="home-zip">
					<span for="home-zip" class="mdl-tooltip">Enter zip</span>
					<label class="mdl-textfield__label" for="home-zip">
						<span class="error_symbol">*</span>Zip
					</label>
				</div>
				<span id="invalid-home-zip" class="error"><?php if (isset($homeZipErr)) { echo $homeZipErr;}?></span>
			</div>
			<div class="mdl-grid">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--10-col">
					<input class="mdl-textfield__input" type="text" id="home-phone" name="home-phone"placeholder="eg: 1223456789" value="">
					<span for="home-phone" class="mdl-tooltip">Enter Phone Number</span>
					<label class="mdl-textfield__label" for="home-phone">
						<span class="error_symbol">*</span>Home Phone Number
					</label>
				</div>
				<span id="invalid-home-phone" class="error"><?php if (isset($homePhoneErr)) { echo $homePhoneErr;}?></span>
			</div>
			<div class="mdl-grid">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--10-col">
					<input class="mdl-textfield__input" type="text" id="home-fax" name="home-fax" value="">
					<span for="home-fax" class="mdl-tooltip">Enter Fax Number</span>
					<label class="mdl-textfield__label" for="home-fax">
					Home Fax Number
				</label>
			</div>
				<span id="invalid-home-fax" class="error"><?php if(isset($homeFaxErr)) { echo $homeFaxErr;}?></span>
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
			<input id="fileToUpload" type="file" name="fileToUpload" value="<?php echo $pass;?>" onchange="previewFile()">
			<img src="" height="100" id="blah">
			<div>
				<p id="fileErr" class="error "><?php echo $success;?><?php if (isset($validate['validate'])) { echo $validate['validate'];} ?></p>
			</div>
			<p>
				<input id="submit" type="submit" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"></input>
				<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
					<a  href="index.php">Login</a>
				</button>
			</p>
		</form>
	</div>
</div>
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/validation_signup.js"></script>
<script src="js/validation_common.js"></script>
</body>
</html>
