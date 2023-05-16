function validate(pForm) {
	let isValid = "";
	let errusername = document.getElementById("errorusername");
	let errpassword = document.getElementById("errorpassword");


	if (pForm.username.value === "") {
		errusername.innerHTML = "Please fill up the username";
		isValid = "Not Valid";
	}
    if (pForm.password.value === "") {
		errpassword.innerHTML = "Please fill up the password";
		isValid = "Not Valid";
	}
	if (isValid === "") {
		return true;
	}
	else {
		return false;
	}
}