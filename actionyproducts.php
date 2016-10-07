<?php
	function getyproduct($user_id) {
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

		$query = 'SELECT product_id, product_name, description, likes, added_date, price, image, 
		(SELECT sum(quantity) as q
		 FROM purchase
		 WHERE product_id = product_purchased) as purchases
		FROM product
		WHERE seller_id = ' . $user_id . '
		ORDER BY added_date desc';

		//$query = 'SELECT * FROM product';

		$result = $conn->query($query);

		return $result;
	}

	if (isset($_GET["product"])) {

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

		// Get image name for deletion
		$query = 'SELECT image
		FROM product
		WHERE product_id = ' . $_GET["product"];

		$result = $conn->query($query);

		$row = $result->fetch_assoc();

		// Remove data from database
		$query = 'DELETE FROM product
		WHERE product_id = ' . $_GET["product"];

		if ($conn->query($query) === TRUE) {
		    echo "Delete product success<br>\n";
		    
		    // Delete uploaded image
		    unlink($row['image']);

		    header("Location: yourproducts.php?id_active=" . $_GET["id_active"]);
		} else {
		    die("Error : " . $conn->error);
		}

		$conn->close();

	}
?>