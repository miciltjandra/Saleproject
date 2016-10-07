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
                if (this.responseText == "Username OK") {
                	return true;
                }
                else {
                	return false;
                }

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
		if (!document.getElementById("pass2").classList.contains("invalid")) {
    		document.getElementById("pass2").classList.add("invalid");
    	}
		return false;
	}
	else {
		if (document.getElementById("pass2").classList.contains("invalid")) {
    		document.getElementById("pass2").classList.remove("invalid");
    	}
		return true;
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
	else if(type == "user") {
		var re = /^[a-zA-Z0-9]+$/;
	}
	else if((type == "phone") || (type = "postcode")) {
		var re = /^[0-9]+$/;
	}

    if(re.test(str)) {
    	if (document.getElementById(type).classList.contains("invalid")) {
    		document.getElementById(type).classList.remove("invalid");
    	}

    	return true;
    }
    else {
    	if (!document.getElementById(type).classList.contains("invalid")) {
    		document.getElementById(type).classList.add("invalid");
    	}
    	return false;
    }
}

function validateform() {
	var items = ["name", "user", "phone", "postcode"];
	var valid = true;
	for (var item in items) {
		var value = document.getElementById(items[item]).value;
		var fieldvalid = validate(value,items[item]);
		if (!fieldvalid) {
			valid = false;
			//alert(items[item]);
		}
		/*if (items[item] == "user") {
			valid = valid && searchUsername(value);
			alert(searchUsername(value));
		}*/
	}
	if ((!valid) || (!confirmPassword())) {
		alert("Please make sure every field is valid");
		return false;
	}
}
