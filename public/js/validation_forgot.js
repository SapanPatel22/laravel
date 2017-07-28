// validation of email in forgot password page
$(document).ready(function() {
	var check = "";
	$('#usr').on('keyup', function() {
		var require = /^\w+([\.-]?\w+)*@\w+([\.-]?\w)*(\.\w{2,3})+$/.test(this.value);
		if(!require) {
			$('#error').html("Invalid email");
			check = 0;
			return false;
		} else {
			$('#error').html("ok");
			check = 1;
			return true;
		}
	});
	$('#forgot-form').submit(function() {
		if($('#usr').val() == "") {
			$('#error').html("* This is required field");
			check = 0;
		}
		if(check == 0) {
			return false;
		} else {
			return true;
		}
	});
});
