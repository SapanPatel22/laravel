//validate the login and signup form 
function validateForm(val) {
	var email = document.getElementById("email").value;
	var pass = document.getElementById("pass").value;
	var emailhtml = document.getElementById("invalidemail").innerHTML;

	if(val == 0) {
		document.getElementById("credentialcheck").innerHTML = "";
	}
	var validate = 1;

	if(val == 1 || val == 2) {
		var fname = document.getElementById("fname").value;
		if(fname == "") {
			document.getElementById("invalidfname").innerHTML = "* This is a required field";
			validate = 0;
		} else {
			document.getElementById("invalidfname").innerHTML = "";
		}
		var lname = document.getElementById("lname").value;
		if(lname == "") {
			document.getElementById("invalidlname").innerHTML = "* This is a required field";
			validate = 0;
		} else {
			document.getElementById("invalidlname").innerHTML = "";
		}
		if(val == 1 || val == 2) {
			if(document.getElementById("fileToUpload").files.length == 0 ) {
				document.getElementById("fileErr").innerHTML = "* This is a required field";
				validate = 0;
			} else {
				document.getElementById("fileErr").innerHTML = "";
			}
			var fuData = document.getElementById('fileToUpload');
			var FileUploadPath = fuData.value;
		}
	}
	if(email == "") {
		document.getElementById("invalidemail").innerHTML = "* This is a required field";
		validate = 0;
	} else {
		if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w)*(\.\w{2,3})+$/.test(email)) {
			document.getElementById("invalidemail").innerHTML = "Incorrect e-mail";
			validate = 0;
		}
	}
	if(pass == "") {
		document.getElementById("invalidpass").innerHTML = "* This is a required field";
		validate = 0;
	} else {
		if(val == 1) {
			if(!/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/.test(pass)) {
				document.getElementById("invalidpass").innerHTML = "At least 1 small, 1 large, 1 numeric and min. 6 character";
				validate = 0;
			} else {
				document.getElementById("invalidpass").innerHTML = "";
			}
		}
	}
	if(val == 1) {
		if(emailExist){
			return false;
		}
	}
	if(validate == 0) {
		return false;
	 } //else {
	// 	return true;
	// }
}
//Delete user details
function DeleteUser(id) {
	var conf = confirm("Are you sure, do you really want to delete User?");
	if (conf == true) {
		$.post("deleteUser.php", {
			id: id
		},
		function (data, status) {
			location.reload();
		});
	}
}
//Showing user details redirectin to edit page
function GetUserDetails(id) {
	window.location.href = "edit.php?id="+id;
}
//Using name and Profile Picture of stackoverflow api
function GetProfilePic(id) {
	$.getJSON('https://api.stackexchange.com/2.2/users/'+id+'?site=stackoverflow', function(data) {
		Photo = data.items[0].profile_image;
		Name = data.items[0].display_name;
		$("#stackName").html(Name);
		$("#AddImg").attr("src",Photo);
		$("#stack-modal").modal();
	});
}
//Using map of geocode api
var map, infoWindow, lati, lagi;
function GetMap(address) {
	$.getJSON('https://maps.googleapis.com/maps/api/geocode/json?address='+address+',odisha&key=AIzaSyBbulkitZFQiHIchqF4H8Di2tWtQoYa5Ic', function(data) {
	}).then(function(result){
		lati = result.results[0].geometry.bounds.northeast.lat;
		lagi = result.results[0].geometry.bounds.northeast.lng;
		$.getScript( "https://maps.googleapis.com/maps/api/js?key=AIzaSyBbulkitZFQiHIchqF4H8Di2tWtQoYa5Ic&callback=initMap");
	});
}

function initMap() {
	map = new google.maps.Map(
		document.getElementById('map'),
		{
			center: {lat: lati, lng: lagi},
			zoom: 6
		});
	var marker = new google.maps.Marker({
		position: {lat: lati, lng: lagi},
		map: map
	});
	$("#profileModal").modal();
}
