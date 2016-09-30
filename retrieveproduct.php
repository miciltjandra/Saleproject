<?php
	function retrieveproduct($category, $value) {
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

		$query = 'SELECT product_name, description, likes, added_date, price, image, username, count(purchase_id) as purchases
		FROM product, user, purchase
		WHERE ' . $category . '="' . $value . '" AND seller_id = user_id AND product_purchased = product_id';

		$result = $conn->query($query);
		return $result;
	}






?>