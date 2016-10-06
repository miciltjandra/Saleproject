<?php
	function retrieveproduct($str) {
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

		if(!empty($str)) {
			$str .= " AND ";
		}
		
		$query = 'SELECT product_id, product_name, description, likes, added_date, price, image, username, 
		(SELECT sum(quantity) as q
		 FROM purchase
		 WHERE product_id = product_purchased) as purchases
		FROM product, user
		WHERE '. $str .'seller_id = user_id
		ORDER BY added_date desc';

		//$query = 'SELECT * FROM product';

		$result = $conn->query($query);



		return $result;
	}
	
	function getSales($id){
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

		$query = 'select *
		from user join product join purchase where purchase.product_purchased = product.product_id and buyer_id = user_id
		and seller_id = '.$id.'
		ORDER BY added_date desc';
		
		$result = $conn->query($query);
		
		return $result;
	}
	
	function getPurchases($id){
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

		$query = 'select *
		from user join product join purchase where purchase.product_purchased = product.product_id and seller_id = user_id
		and buyer_id = '.$id.'
		ORDER BY added_date desc';
		
		$result = $conn->query($query);
		
		return $result;
	}

	function getLiked($user, $prod) {
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

		$query = 'SELECT *
		FROM liked
		WHERE user_id="'. $user .'" AND product_id="'. $prod . '"';
		
		$result = $conn->query($query);
		if ($result->num_rows !== 0) {
			$res = "Liked";
		} else {
			$res = "Like";
		}
		
		return $res;
	}
	
?>