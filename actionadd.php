<?php
	$user_id = $_POST["user"];
	$prd_name = $_POST["name"];
	$description = $_POST["desc"];
	$price = $_POST["price"];
	$image = $_POST["image"];


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

	$query = "INSERT INTO product(user_id, product_name, description, added_date, price, image)
	VALUES(" .
	"\"" . $user_id . "\"" . ", " .
	"\"" . $prd_name . "\"" . ", " .
	"\"" . $description . "\"" . ", " .
	"\"" . date("Y-m-d H-i") . "\"" . ", " .
	"\"" . $price . "\"" . ", " .
	"\"" . $image . "\"" . ")";

	echo $query . "<br>\n"; 

	if ($conn->query($query) === TRUE) {
	    echo "Add product success<br>\n";
	    
	    header("Location: yourproducts.php?id_active=" . $user_id);
	} else {
	    die("Error : " . $conn->error);
	}

	$conn->close();

?>