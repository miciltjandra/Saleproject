<?php
	require_once 'database.php';
	$db = new Database();
	$product = $db->quote($_REQUEST["product_id"]);
	$user =  $db->quote($_REQUEST["user_id"]);


	$checkliked = 'SELECT * FROM liked
	WHERE user_id = '. $user .' AND product_id = '. $product;

	$result = $db->select($checkliked);

	if (!empty($result)) {
		//echo "udah like hahaha";
		$op = '-';
		$query1 = 'DELETE FROM liked
		WHERE user_id = '. $user .' AND product_id = '. $product;
	} else {
		//echo "blom like hihihi";
		$op = '+';
		$query1 = 'INSERT INTO liked(user_id, product_id)
		VALUES('.$user.','.$product.')';
	}


	$query = 'UPDATE product
	SET likes = likes'. $op .'1
	WHERE product_id = ' .  $product;

	if($db->query($query1) === TRUE) {
		if($db->query($query) === TRUE) {
			$get = 'SELECT likes FROM product WHERE product_id = ' . $product;
			$result = $db->select($get);
			echo $result[0]["likes"];
		}
	}
?>