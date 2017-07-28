//check password field is empty
$('#pass').on('keyup', function() {
  var re = this.value;
  if(re == "") {
    $('#invalidpass').html("* Required field");
  } else {
      $('#invalidpass').html("");
    }
});

//check email field is empty
$('#email').on('keyup', function() {
  var re = this.value;
  if(re == "") {
    $('#invalidemail').html("* Required field");
  } else {
      $('#invalidemail').html("");
    }
});

