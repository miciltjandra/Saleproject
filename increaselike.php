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

	$product = $_REQUEST["product_id"];
	$user =  $_REQUEST["user_id"];


	$checkliked = 'SELECT * FROM liked
	WHERE user_id = "'. $user .'" AND product_id = "'. $product .'"';

	$result = $conn->query($checkliked);

	if ($result->num_rows > 0) {
		//echo "udah like hahaha";
		$op = '-';
		$query1 = 'DELETE FROM liked
		WHERE user_id = "'. $user .'" AND product_id = "'. $product .'"';
	} else {
		//echo "blom like hihihi";
		$op = '+';
		$query1 = 'INSERT INTO liked(user_id, product_id)
		VALUES("'.$user.'","'.$product.'")';
	}


	$query = 'UPDATE product
	SET likes = likes'. $op .'1
	WHERE product_id = "' .  $_REQUEST["product_id"] . '"';

	if($conn->query($query1) === TRUE) {
		if($conn->query($query) === TRUE) {
			$get = 'SELECT likes FROM product WHERE product_id = "' . $_REQUEST["product_id"] . '"';
			$result = $conn->query($get);
			$row = $result->fetch_assoc();
			echo $row["likes"];
		}
	}
?>