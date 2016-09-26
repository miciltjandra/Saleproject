function searchUsername(str) {
	if(str.length == 0) {
		document.getElementById("userexist").innerHTML = "";
	}
	else if (validate(str, "user")) {
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("userexist").innerHTML = this.responseText;
                //document.getElementById("registersubmit").disabled = true;

            }
        };
        xmlhttp.open("GET", "checkusername.php?q=" + str, true);
        xmlhttp.send();
		
	}
	else {
		document.getElementById("userexist").innerHTML = "";
	}
}

function confirmPassword() {
	var pass = document.getElementById("pass");
	var pass2 = document.getElementById("pass2");
	if(pass.value != pass2.value) {
		document.getElementById("diffpass").innerHTML = "Different password";
	}
	else {
		document.getElementById("diffpass").innerHTML = "Confirmed";
	}
}

function validate(str, type) 
{
	//document.getElementById("valid"+type).innerHTML = "valid"+type;
	var re;
	if (type == "email") {
		var re = /\S+@\S+\.\S+/;
	}
	else if(type == "name") {
		var re = /^[A-Za-z\s]+$/;	
	}
	else if (type == "user") {
		var re = /^[a-zA-Z0-9]+$/;
	}
    if(re.test(str)) {
    	document.getElementById("valid"+type).innerHTML = "Valid";
    	return true;
    }
    else {
    	document.getElementById("valid"+type).innerHTML = "Invalid";
    	return false;
    }
}
