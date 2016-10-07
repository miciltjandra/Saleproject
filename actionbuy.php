<?php
	$buyer_id = $_POST["user"];
	$product_purchased = $_POST["item_id"];
	$quantity = $_POST["quantity"];
	$consignee = $_POST["consignee"];
	$deliv_address = $_POST["deliv_address"];
	$postal_code = $_POST["postal"];
	$phone = $_POST["phone"];
	$credit = $_POST["credit"];
	$verification = $_POST["verification"];
	$product_name = $_POST["product_name"];
	$price = $_POST["price"];
	$seller_id = $_POST["seller_id"];
	$image = $_POST["image"];
	
	$servername = "localhost";
	$db_username = "wbd";
	$db_password = "twinbaldchicken";
	$db_database = "saleproject";


	// Create connection
	$conn = new mysqli($servername, $db_username, $db_password, $db_database);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} else {
		echo "Connected successfully <br>\n";
	}

	$query = "INSERT INTO purchase(product_purchased, quantity, buyer_id, consignee, deliv_address, postalcode, phone, creditcard, verification, purchase_date, product_name, price, seller_id, image)
	VALUES(" .
	"\"" . $product_purchased . "\"" . ", " .
	"\"" . $quantity . "\"" . ", " .
	"\"" . $buyer_id . "\"" . ", " .
	"\"" . $consignee . "\"" . ", " .
	"\"" . $deliv_address . "\"" . ", " .
	"\"" . $postal_code . "\"" . ", " .
	"\"" . $phone . "\"" . ", " .
	"\"" . $credit . "\"" . ", ".
	"\"" . $verification . "\"" . ", ".
	"\"" . date("Y-m-d H-i") . "\"" . ", " .
	"\"" . $product_name . "\"" . ", ".
	"\"" . $price . "\"" . ", ".
	"\"" . $seller_id . "\"" . ", ".
	"\"" . $image . "\"" . ")";

	echo $query . "<br>\n"; 

	if ($conn->query($query) === TRUE) {
	    echo "Add product success<br>\n";
	    
	    header("Location: purchases.php?id_active=" . $buyer_id);
	} else {
	    die("Error : " . $conn->error);
	}


	$conn->close();

?>