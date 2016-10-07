<?php
	$user = $_POST["user"];
	$quantity = $_POST["quantity"];
	$consignee = $_POST["consignee"];
	$deliv_address = $_POST["deliv_address"];
	$postal = $_POST["postal"];
	$phone = $_POST["phone"];
	$credit = $_POST["credit"];
	$verification = $_POST["verification"];
	
	$servername = "localhost";
	$db_username = "wbd";
	$db_password = "twinbaldchicken";
	$db_database = "saleproject";

	echo $user_id;
	echo $prd_name;
	echo $description;
	echo date("Y-m-d");
	echo $price;



	// Create connection
	$conn = new mysqli($servername, $db_username, $db_password, $db_database);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} else {
		echo "Connected successfully <br>\n";
	}

	$query = "INSERT INTO product(product_name, description, added_date, price, image, seller_id)
	VALUES(" .
	"\"" . $prd_name . "\"" . ", " .
	"\"" . $description . "\"" . ", " .
	"\"" . date("Y-m-d H-i") . "\"" . ", " .
	"\"" . $price . "\"" . ", " .
	"\"" . $fullname . "\"" . ", " .
	"\"" . $user_id . "\"" . ")";

	echo $query . "<br>\n"; 

	if ($conn->query($query) === TRUE) {
	    echo "Add product success<br>\n";
	    
	    header("Location: yourproducts.php?id_active=" . $user_id);
	} else {
	    die("Error : " . $conn->error);
	}


	$conn->close();

?>