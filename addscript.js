function valNumber(val, id, len) {
    if (document.getElementById(id).value.length > len) {
        document.getElementById(id).value = document.getElementById(id).value.slice(0,len); 
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
    // /^(?!\s*$).+/
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
function validateAdd() {
    var valName = document.getElementById("add_name").value;
    var valDesc = document.getElementById("add_desc").value;
    var valPrice = document.getElementById("add_price").value;
    
    return valNotEmpty(valName, "add_name") && valNotEmpty(valDesc, "add_desc") && valNumber(valPrice, "add_price", 15);
}
function validateEdit() {
    var valName = document.getElementById("edit_name").value;
    var valDesc = document.getElementById("edit_desc").value;
    var valPrice = document.getElementById("edit_price").value;
    
    return valNotEmpty(valName, "edit_name") && valNotEmpty(valDesc, "edit_desc") && valNumber(valPrice, "edit_price", 15);
}