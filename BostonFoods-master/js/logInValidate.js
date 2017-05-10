function validateLogIn(){



	var email = document.getElementById("email").value;
	var emailFormat = /^\w+@\w+\.\w+/;
	if (email.length < 1 || !emailFormat.test(email)) {
		var errorrpt = document.getElementById("emailerr");
		errorrpt.innerHTML = "Please enter a valid email";
		return false;
	}


	var password1 = document.getElementById("password1").value;
	if (password1.length < 6) {
		var errorrpt = document.getElementById("p1err");
		errorrpt.innerHTML = "Your password is too short, must be at least 6 characters long";
		return false;
	}


}