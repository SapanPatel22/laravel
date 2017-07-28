$(document).ready(function(){
	var check = "";
	//password validation of reset password field
	$('#new-pass').on('keyup', function() {
		var require = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/.test(this.value);
		if(!require) {
			$('#error').html("Invalid pass required 1 lower 1 upper 1 digit and min. length is 6");
			check = 0;
			return false;
		} else {
			$('#error').html("");
			check = 1;
			return true;
		}
	});
	// password validation of retype password field
	$('#retype-pass').on('keyup', function() {
		var require_pass = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/.test(this.value);
		if(!require_pass) {
			$('#error-retype').html("Invalid pass required 1 lower 1 upper 1 digit and min. length is 6");
			check = 0;
			return false;
		} else {
			$('#error-retype').html("");
			check = 1;
			return true;
		}
	});
	// validation of password fields after submit
	$('#retype-form').submit(function(){
		if($('#new-pass').val() == "") {
			$('#error').html("* This is required field");
			check = 0;
		}
		if($('#retype-pass').val() == "") {
			$('#error-retype').html("* This is required field");
			check = 0;
		}
		if(check == 0) {
			return false;
		} else {
			if($('#new-pass').val() == $('#retype-pass').val()) {
				return true;
			}
			else {
				 $('#error-retype').html("* PASSWORD NOT MATCH PLEASE RETYPE PASSWORD");
				return false;
			}
		}
	});
});
