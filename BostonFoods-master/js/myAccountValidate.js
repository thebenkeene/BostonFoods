function validate(){

	var firstname = document.getElementById("firstname").value;
	if (firstname.length < 1) {
		var errorrpt = document.getElementById("firstnameerr");
		errorrpt.innerHTML = "<div style=\"color:red\">Please enter your first name</div>";
		return false;
	}

	var lastname = document.getElementById("lastname").value;
	if (lastname.length < 1) {
		var errorrpt = document.getElementById("lastnameerr");
		errorrpt.innerHTML = "<div style=\"color:red\">Please enter your last name</div>";
		return false;
	}

	var email = document.getElementById("email").value;
	var emailFormat = /^\w+@\w+\.\w+/;
	if (email.length < 1 || !emailFormat.test(email)) {
		var errorrpt = document.getElementById("emailerr");
		errorrpt.innerHTML = "<div style=\"color:red\">Please enter a valid email</div>";
		return false;
	}

	var phone = document.getElementById("phone").value;
	var phoneFormat = /^(\d{3})\d{3}\d{4}/;
	if (phone.length < 1 || !phoneFormat.test(phone)) {
		var errorrpt = document.getElementById("phoneerr");
		errorrpt.innerHTML = "<div style=\"color:red\">Please enter a valid phone number</div>";
		return false;
	}


	var password1 = document.getElementById("password1").value;
	if (password1.length < 6) {
		var errorrpt = document.getElementById("p1err");
		errorrpt.innerHTML = "<div style=\"color:red\">Your password is too short, must be at least 6 characters long</div>";
		return false;
	}

	var password2 = document.getElementById("password2").value;
	if (password2 != password1) {
		var errorrpt = document.getElementById("p2err");
		errorrpt.innerHTML = "<div style=\"color:red\">Your passwords don't match!</div>";
		return false;
	}

}