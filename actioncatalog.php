<?php
	require_once 'database.php';
	function retrieveproduct($type, $val) {
		$db = new Database();

		if (!empty($type) && !empty($val)) {
			$value = "%" . $val . "%";
			$value = $db->quote($value);
			$str = $type . " like " . $value;
			$str .= ' AND ';
		} else {
			$str = '';
		}
		
		$query = 'SELECT product_id, product_name, description, likes, added_date, price, image, username, 
		(SELECT sum(quantity) as q
		 FROM purchase
		 WHERE product_id = product_purchased) as purchases
		FROM product, user
		WHERE '. $str .'seller_id = user_id
		ORDER BY added_date desc';

		//$query = 'SELECT * FROM product';

		$result = $db->select($query);



		return $result;
	}
	// user join product join     purchase.product_purchased = product.product_id and buyer_id = user_id and
	function getSales($id){
		$db = new Database();

		$query = 'SELECT *, (SELECT username FROM user WHERE user_id = buyer_id) as username
		FROM purchase
		WHERE seller_id = '.$id.'
		ORDER BY purchase_date desc';
		
		$result = $db->query($query);
		
		return $result;
	}
	//user join product join  purchase.product_purchased = product.product_id and seller_id = user_id
	function getPurchases($id){
		$db = new Database();

		$query = 'SELECT *, (SELECT username FROM user WHERE user_id = seller_id) as username
		FROM purchase
		WHERE buyer_id = '.$id.'
		ORDER BY purchase_date desc';
		
		$result = $db->query($query);
		
		return $result;
	}
	
	function getItem($id){
		$db = new Database();

		$query = 'select *
		from product where product_id = '.$id.'
		LIMIT 1';
		
		$result = $db->query($query);
		
		return $result;
	}

	function getLiked($user, $prod) {
		$db = new Database();

		$query = 'SELECT *
		FROM liked
		WHERE user_id="'. $user .'" AND product_id="'. $prod . '"';
		
		$result = $db->select($query);
		if (!empty($result)) {
			$res = "LIKED";
		} else {
			$res = "LIKE";
		}
		
		return $res;
	}
	
?>