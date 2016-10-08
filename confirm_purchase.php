<!DOCTYPE html>
<html>
	<head>
		<title> Confirm Purchase </title>
		<link rel="stylesheet" href="style.css">
		<script type="text/javascript" src="addscript.js"></script>
	</head>
	<?php
	    require 'header.php';
	    require_once 'header.php';
		require 'menubar.php';
		require_once 'menubar.php';
    ?>
	<body class="middle" onload="myFunction()">
		
		<div class="text large"> Please confirm your purchases </div>
		<br><hr>
		<br>
		<?php
			include 'actioncatalog.php';
			$result = getItem($_GET["product"]);
			while ($product = $result->fetch_assoc()) {
				echo "Product :". $product['product_name']."<br>";
				echo "Price   : IDR ". $product['price']."<br>";
				$var = $product['price'];
				$product_name = $product['product_name'];
				$seller_id = $product['seller_id'];
				$image = $product['image'];
			}
		?>
		<form onsubmit="return validatePurch()" action="actionbuy.php" method="post" id="addform" enctype="multipart/form-data">
			Quantity:
			<input type="number" id="quantity" name="quantity" autocomplete="off" value="1" onInput="myFunction()" required min="1" maxlength="10" /> PCS<br>
			<p id="demo">Total Price: IDR</p>
		
			<script>
			function myFunction() {
				var x = document.getElementById("quantity").value;
				document.getElementById("demo").innerHTML = "Total Price: IDR " + x * <?php echo $var; ?>;
			}
			</script>
			Delivery to :
			<br>
			<br>
		
			<input type = "hidden" name = "user" value = "<?php echo $_GET["id_active"]?>" />
			<input type = "hidden" name = "item_id" value = "<?php echo $_GET["product"]?>" />
			<input type = "hidden" name = "product_name" value = "<?php echo $product_name ?>" />
			<input type = "hidden" name = "price" value = "<?php echo $var ?>" />
			<input type = "hidden" name = "seller_id" value = "<?php echo $seller_id ?>" />
			<input type = "hidden" name = "image" value = "<?php echo $image ?>" />

			Consignee <br />
			<input class="reg_text" type="text" name="consignee" required="required"/> 
			<br /><br />
			Full Address <br />
			<textarea class="reg_text" rows="4" form="addform" name="deliv_address" required="required" ></textarea> 
			<br /><br />
			Postal Code <br />
			<input id="postal" class="reg_text" type="number" name="postal" required="required"  maxlength="5" min="0" oninput="valNumber(this.value, 'postal', 5, 3)"/> 
			<br /><br />
			Phone Number <br />
			<input id="phone" class="reg_text" type="number" name="phone" required="required" maxlength="12" min="0" oninput="valNumber(this.value, 'phone', 12, 8)"/>
			<br /><br />
			12 Digit Credit Card Number <br />
			<input id="credit" class="reg_text" type="number" name="credit" required="required" maxlength="12" min="0" max="999999999999" oninput="valNumber(this.value, 'credit', 12, 12)"/>
			<br /><br />
			3 Digit Card Verification Value <br />
			<input id="verify" class="reg_text" type="number" name="verification" required="required" maxlength="3" min="0" max="999" oninput="valNumber(this.value, 'verify', 3, 3)"/> 
			<br /><br />
			
			<br />
			<div style="float:right">
				<a href="catalog.php?id_active=<?php echo $_GET["id_active"] ?>" . $buyer_id"> <input type="button" class="submit" value="Cancel"> </a>
				<input class="submit" type="submit" value="Confirm" name="confirm" class="submit">
			</div>
		</form>
		<br><br>
	</body>
</html>