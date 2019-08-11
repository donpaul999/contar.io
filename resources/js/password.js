function check(input) {
  var password = document.getElementById('password').value;
  if (input.value !=  password ) {
    input.setCustomValidity('Password Must be Matching!');
  }
  else
   {
  input.setCustomValidity('');
  }
  }


  function showpass() {
    var password = document.getElementById("password");
    if (password.type === "password") {
      password.type = "text";
    } else {
      password.type = "password";
    }
  }
