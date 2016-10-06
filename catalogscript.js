function switchLike(product_id) {
    if (document.getElementById(product_id+"_likebut").innerHTML === "Like") {
        document.getElementById(product_id+"_likebut").innerHTML = "Liked";
    } else {
        document.getElementById(product_id+"_likebut").innerHTML = "Like";
    }
}

function increaseLike(product_id, user_id) {
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(product_id+"_like").innerHTML = this.responseText;
            switchLike(product_id);
        }
    };
    var act;
    xmlhttp.open("GET", "increaselike.php?product_id=" + product_id + '&user_id=' + user_id, true);
    xmlhttp.send();
		
    //document.getElementById(product_id+"_like").innerHTML = "product id" + product_id + "user_id" + user_id;
}