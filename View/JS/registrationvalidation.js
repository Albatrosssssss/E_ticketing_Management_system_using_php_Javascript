function validate(pForm) {
	let isValid = "";
	let errfirstname = document.getElementById("errorfirstname");
	let errlastname = document.getElementById("errorlastname");
	let errfather_name = document.getElementById("errorfather_name");
	let errmother_name =  document.getElementById("errormother_name");
	let errdob = document.getElementById("errordob");
	let errblood = document.getElementById("errorblood");
	let errnumber = document.getElementById("errornumber");
	let erremail = document.getElementById("erroremail");
	let errpassword = document.getElementById("errorpassword");
	let errusername = document.getElementById("errorusername");

	if (pForm.fname.value === "") {
		errfirstname.innerHTML = "Please fill up the Firstname.";
		isValid = "Not Valid";
	}
	if (pForm.lname.value === "") {
		errlastname.innerHTML = "Please fill up the Lastname";
		isValid = "Not Valid";
	}
	if (pForm.father_name.value === "") {
		errfather_name.innerHTML = "Please fill up Your fathers' Name";
		isValid = "Not Valid";
	}
	if (pForm.mother_name.value === "") {
		errmother_name.innerHTML = "Please fill up your Mothers' name";
		isValid = "Not Valid";
	}
	if (pForm.dob.value === "") {
		errdob.innerHTML = "Please fill up date of birth";
		isValid = "Not Valid";
	}
	if (pForm.blood.value === "") {
		errblood.innerHTML = "Please fill up blood Group";
		isValid = "Not Valid";
	}
    if (pForm.number.value === "") {
		errnumber.innerHTML = "Please fill up the Phone No";
		isValid = "Not Valid";
	}
	if (pForm.email.value === "") {
		erremail.innerHTML = "Please fill up the Email";
		isValid = "Not Valid";
	}
	if (pForm.password.value === "") {
		errpassword.innerHTML = "Please fill up the Password";
		isValid = "Not Valid";
	}

	if (pForm.username.value === "") {
		errusername.innerHTML = "Please fill up the username";
		isValid = "Not Valid";
	}

	if (isValid === "") {
		return true;
	}
	else {
		return false;
	}
}