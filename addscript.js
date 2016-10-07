function valNumber(val, id) {
    if (document.getElementById(id).value.length > 15) {
        document.getElementById(id).value = document.getElementById(id).value.slice(0,15); 
    }

	var regex = /^[0-9]+$/;

	if(regex.test(val)) {
    	if (document.getElementById(id).classList.contains("invalid")) {
    		document.getElementById(id).classList.remove("invalid");
    	}
    	return true;
    }
    else {
    	if (!document.getElementById(id).classList.contains("invalid")) {
    		document.getElementById(id).classList.add("invalid");
    	}
    	return false;
    }
}
function valNotEmpty(val, id) {
    var regex = /^(?!\s*$).+/;

    if(regex.test(val)) {
        if (document.getElementById(id).classList.contains("invalid")) {
            document.getElementById(id).classList.remove("invalid");
        }
        return true;
    }
    else {
        if (!document.getElementById(id).classList.contains("invalid")) {
            document.getElementById(id).classList.add("invalid");
        }
        return false;
    }
}
