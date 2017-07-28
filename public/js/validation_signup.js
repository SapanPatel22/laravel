//server side email validation
var emailExist = true;
$('#email').on('keyup', function() {
	var require = /^\w+([\.-]?\w+)*@\w+([\.-]?\w)*(\.\w{2,3})+$/.test(this.value);
	if(!require) {
		$('#invalidemail').html("Invalid email");
	} else {
		$('#invalidemail').html("");
		var email = document.getElementById("email").value;
		if(email) {
			$.ajax ({
				type: 'post',
				url: 'checkdata.php',
				data:{user_email:email,},
				success: function (response) {
					$('#invalidemail').html(response);
					if(response == "OK") {
						emailExist = false;
						} else {
						$('#invalidemail').html(response);
						emailExist = true;
					}
				}
			});
		} else {
			$('#invalidemail').html("");
			emailExist = true;
		}
	}
});
//validation of each field of signup form
jQuery(function () {
	jQuery("#submit, #update").click(function () {
		var check = 1;
		var prefix = jQuery("#prefix");
		var maritalStatus = jQuery("#marital-status");
		var company = jQuery("#company-name");
		var designation = jQuery("#designation-name");
		var officeCountry = jQuery("#office-country");
		var officeState = jQuery("#office-state");
		var officeCity = jQuery("#office-city");
		var officeStreet = jQuery("#office-street");
		var officeZip = jQuery("#office-zip");
		var officePhone = jQuery("#office-phone");
		var officeFax = jQuery("#office-fax");
		var homeCountry = jQuery("#home-country");
		var homeState = jQuery("#home-state");
		var homeCity = jQuery("#home-city");
		var homeStreet = jQuery("#home-street");
		var homeZip = jQuery("#home-zip");
		var homePhone = jQuery("#home-phone");
		var homeFax = jQuery("#home-fax");
		var photo = jQuery("#fileToUpload");
		if (prefix.val() == "") {
			jQuery('#invalidprefix').html("* This is required field");
			check = 0;
		}
		if (maritalStatus.val() == "") {
			jQuery('#invalid-marital').html("* This is required field");
			check = 0;
		}
		if (company.val() == "") {
			jQuery('#invalid-company-name').html("* This is required field");
			check = 0;
		}
		if (designation.val() == "") {
			jQuery('#invalid-designation-name').html("* This is required field");
			check = 0;
		}
		if (officeCountry.val() == "") {
			jQuery('#invalid-office-country').html("* This is required field");
			check = 0;
		}
		if (officeState.val() == "") {
			jQuery('#invalid-office-state').html("* This is required field");
			check = 0;
		}
		if (officeCity.val() == "") {
			jQuery('#invalid-office-city').html("* This is required field");
			check = 0;
		}
		if (officeStreet.val() == "") {
			jQuery('#invalid-office-street').html("* This is required field");
			check = 0;
		}
		if (officeZip.val() == "") {
			jQuery('#invalid-office-zip').html("* This is required field");
			check = 0;
		} else if (!/^\d{6}$/.test(officeZip.val())) {
			jQuery('#invalid-office-zip').html("* Field should contain 6 digits");
			check = 0;
		}
		if (officePhone.val() == "") {
			jQuery('#invalid-office-phone').html("* This is required field");
			check = 0;
		} else if (! /^\d{10}$/.test(officePhone.val())) {
			jQuery('#invalid-office-phone').html("* Enter 10 digit phone number");
			check = 0;
		}
		if (officeFax.val() != "" && !/^\d{10}$/.test(officeFax.val())) {
			jQuery('#invalid-office-fax').html("* Enter 10 digit fax number");
			check = 0;
		}
		if (homeCountry.val() == "") {
			jQuery('#invalid-home-country').html("* This is required field");
			check = 0;
		}
		if (homeState.val() == "") {
			jQuery('#invalid-home-state').html("* This is required field");
			check = 0;
		}
		if (homeCity.val() == "") {
			jQuery('#invalid-home-city').html("* This is required field");
			check = 0;
		}
		if (homeStreet.val() == "") {
			jQuery('#invalid-home-street').html("* This is required field");
			check = 0;
		}
		if (homeZip.val() == "") {
			jQuery('#invalid-home-zip').html("* This is required field");
			check = 0;
		} else if (!/^\d{6}$/.test(homeZip.val())) {
			jQuery('#invalid-home-zip').html("* Field should contain 6 digits");
			check = 0;
		}
		if (homePhone.val() == "") {
			jQuery('#invalid-home-phone').html("* This is required field");
			check = 0;
		} else if (! /^\d{10}$/.test(homePhone.val())) {
			jQuery('#invalid-home-phone').html("* Enter 10 digit phone number");
			check = 0;
		}
		if (homeFax.val() != "" && !/^\d{10}$/.test(homeFax.val())) {
			jQuery('#invalid-home-fax').html("* Enter 10 digit fax number ");
		  check = 0;
		}
		if (photo.val() == "") {
			jQuery('#fileErr').html("* This is required field");
		  check = 0;
		}
		// validateform(1);

		if(check == 0) {
			return false;
		} else {
			return true;
		}
	});
});
//checking prefix field empty or not
jQuery(function(){
	jQuery("#prefix").change(function(){
		var required = jQuery("#prefix");
		if (required.val() == "") {
			jQuery('#invalidprefix').html("* This is required field");
			return false;
		}
		jQuery('#invalidprefix').html("");
		return true;
	});
});

//checking name field
$('#fname').on('keyup', function() {
	var re = this.value;
	if(re == "") {
		$('#invalidfname').html("* Required field");
	} else {
		$('#invalidfname').html("");
	}
});

//checking last name field
$('#lname').on('keyup', function() {
	var re = this.value;
	if(re == "") {
		$('#invalidlname').html("* Required field");
	} else {
		$('#invalidlname').html("");
	}
});

//check password field
$('#pass').on('keyup', function() {
	var re = this.value;
	if(re == "") {
		$('#invalidpass').html("* Required field");
	} else {
		$('#invalidpass').html("");
	}
});

jQuery(function() {
	jQuery("#marital-status").change(function() {
		var required = jQuery("#marital-status");
		if (required.val() == "") {
			jQuery('#invalid-marital').html("* This is required field");
			return false;
		}
		jQuery('#invalid-marital').html("");
		return true;
	});
});

jQuery(function() {
	jQuery("#company-name").change(function() {
		var required = jQuery("#company-name");
		if (required.val() == "") {
			jQuery('#invalid-company-name').html("* This is required field");
			return false;
		}
		jQuery('#invalid-company-name').html("");
		return true;
	});
});

jQuery(function() {
	jQuery("#designation-name").change(function() {
		var required = jQuery("#designation-name");
		if (required.val() == "") {
			jQuery('#invalid-designation-name').html("* This is required field");
			return false;
		}
		jQuery('#invalid-designation-name').html("");
		return true;
	});
});

jQuery(function() {
	jQuery("#office-country").change(function() {
		var required = jQuery("#office-country");
		if (required.val() == "") {
			jQuery('#invalid-office-country').html("* This is required field");
			return false;
		}
		jQuery('#invalid-office-country').html("");
		return true;
	});
});

jQuery(function() {
	jQuery("#office-state").change(function() {
		var required = jQuery("#office-state");
		if (required.val() == "") {
			jQuery('#invalid-office-state').html("* This is required field");
			return false;
		}
		jQuery('#invalid-office-state').html("");
		return true;
	});
});

jQuery(function() {
	jQuery("#office-city").change(function() {
		var required = jQuery("#office-city");
		if (required.val() == "") {
			jQuery('#invalid-office-city').html("* This is required field");
			return false;
		}
		jQuery('#invalid-office-city').html("");
		return true;
	});
});

jQuery(function() {
	jQuery('#office-street').on('keyup', function() {
		var re = this.value;
		if(re == "") {
			jQuery('#invalid-office-street').html("* Required field");
		} else {
			jQuery('#invalid-office-street').html("");
		}
	});
});

jQuery(function() {
	jQuery('#office-zip').on('keyup', function() {
		var re = this.value;
		if(re == "") {
			jQuery('#invalid-office-zip').html("* Required field");
		} else {
			jQuery('#invalid-office-zip').html("");
		}
	});
});

jQuery(function() {
	jQuery('#office-phone').on('keyup', function() {
		var re = this.value;
		if(re == "") {
			jQuery('#invalid-office-phone').html("* Required field");
		} else {
			jQuery('#invalid-office-phone').html("");
		}
	});
});

jQuery(function() {
	jQuery('#office-fax').on('keyup', function() {
		var re = this.value;
		if(re == "") {
			jQuery('#invalid-office-fax').html("");
		} else {
			jQuery('#invalid-office-fax').html("");
		}
	});
});

jQuery(function() {
	jQuery("#home-country").change(function() {
		var required = jQuery("#home-country");
		if (required.val() == "") {
			jQuery('#invalid-home-country').html("* This is required field");
			return false;
		}
		jQuery('#invalid-home-country').html("");
		return true;
	});
});

jQuery(function() {
	jQuery("#home-state").change(function() {
		var required = jQuery("#home-state");
		if (required.val() == "") {
			jQuery('#invalid-home-state').html("* This is required field");
			return false;
		}
		jQuery('#invalid-home-state').html("");
		return true;
	});
});

jQuery(function() {
	jQuery("#home-city").change(function() {
		var required = jQuery("#home-city");
		if (required.val() == "") {
			jQuery('#invalid-home-city').html("* This is required field");
			return false;
		}
		jQuery('#invalid-home-city').html("");
		return true;
	});
});

jQuery(function() {
	jQuery('#home-street').on('keyup', function() {
		var re = this.value;
		if(re == "") {
			jQuery('#invalid-home-street').html("* Required field");
		} else {
		jQuery('#invalid-home-street').html("");
		}
	});
});

jQuery(function() {
	jQuery('#home-zip').on('keyup', function() {
		var re = this.value;
		if(re == "") {
			jQuery('#invalid-home-zip').html("* Required field");
		} else {
			jQuery('#invalid-home-zip').html("");
		}
	});
});

jQuery(function(){
	jQuery('#home-phone').on('keyup', function() {
		var re = this.value;
		if(re == "") {
			jQuery('#invalid-home-phone').html("* Required field");
		} else {
			jQuery('#invalid-home-phone').html("");
		}
	});
});

jQuery(function() {
	jQuery('#home-fax').on('keyup', function() {
		var re = this.value;
		if(re == "") {
			jQuery('#invalid-home-fax').html("");
		} else {
			jQuery('#invalid-home-fax').html("");
		}
	});
});
//checking image not be empty and show the thumbnail
function previewFile() {
	var preview = document.querySelector('img');
	var file = document.querySelector('input[type=file]').files[0];
	var reader = new FileReader();
	var fuData = document.getElementById('fileToUpload');
	var FileUploadPath = fuData.value;
	if (FileUploadPath == '') {
	document.getElementById("fileErr").innerHTML = "* please upload an image";
	} else {
		var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
		if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {
			reader.onloadend = function () {
				preview.src = reader.result;
			}
			if (file) {
				reader.readAsDataURL(file);
			} else {
				preview.src = "";
			}
		} else {
			document.getElementById("fileErr").innerHTML = "* Only GIF, PNG, JPG, JPEG and BMP file types please! ";
			return false;
		}
	}
}
