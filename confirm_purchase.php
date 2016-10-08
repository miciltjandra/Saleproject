<!DOCTYPE html>
<html>
	<head>
		<title> Confirm Purchase </title>
		<link rel="stylesheet" href="style.css">
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
		<form action="actionbuy.php" method="post" id="addform" enctype="multipart/form-data"  onsubmit="return window.confirm(' Confirmation \n Make sure your purchase is correct.')">
			Quantity:
			<input type="number" id="quantity" name="quantity" autocomplete="off" value="1" onInput="myFunction()" required/> PCS<br>
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
			<input type="text" name="consignee" required="required"/> 
			<br /><br />
			Full Address <br />
			<textarea rows="4" form="addform" name="deliv_address" required="required" ></textarea> 
			<br /><br />
			Postal Code <br />
			<input type="number" name="postal" required="required"/> 
			<br /><br />
			Phone Number <br />
			<input type="number" name="phone" required="required"/> 
			<br /><br />
			12 Digit Credit Card Number <br />
			<input type="number" name="credit" required="required"/> 
			<br /><br />
			3 Digit Card Verification Value <br />
			<input type="number" name="verification" required="required"/> 
			<br /><br />
			
			<br />
			<div style="float:right">
				<a href="catalog.php?id_active=<?php echo $_GET["id_active"] ?>" . $buyer_id"> <input type="button" class="submit" value="Cancel"> </a>
				<input type="submit" value="Confirm" name="confirm" class="submit">
			</div>
		</form>
		<br><br>
	</body>
	<script>
	function confirma() {
		var r = confirm(" Confirmation \n Make sure your purchase is correct.");
		if (r == true) {

		} else {
			
		}
	}
	</script>
</html>