function increaseLike(product_id) {
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(product_id+"_like").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "increaselike.php?product_id=" + product_id, true);
    xmlhttp.send();
		
    //document.getElementById(product_id+"_like").innerHTML = "product id" + product_id;
}