<?php

	$servername = "localhost";
	$db_username = "wbd";
	$db_password = "twinbaldchicken";
	$db_database = "saleproject";

	// Create connection
	$conn = new mysqli($servername, $db_username, $db_password, $db_database);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$query = 'UPDATE product
	SET likes = likes+1
	WHERE product_id = "' .  $_REQUEST["product_id"] . '"';

	if($conn->query($query) === TRUE) {
		$get = 'SELECT likes FROM product WHERE product_id = "' . $_REQUEST["product_id"] . '"';
		$result = $conn->query($get);
		$row = $result->fetch_assoc();
		echo $row["likes"];
	}
?>