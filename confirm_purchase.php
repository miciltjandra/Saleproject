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
	<body class="middle">
		
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
			}
		?>
		<form action="actionadd.php" method="post" id="addform" enctype="multipart/form-data">
			Quantity:
			<input type="number" id="quantity" autocomplete="off" onInput="myFunction()"/> <br>
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
		
			<input type = "hidden" name = "user" value = <?php echo $_GET["id_active"]?> />
			Consignee <br />
			<input type="text" name="consignee" /> 
			<br /><br />
			Full Address <br />
			<textarea rows="4" form="addform" name="deliv_address"></textarea> 
			<br /><br />
			Postal Code <br />
			<input type="number" name="postal" /> 
			<br /><br />
			Phone Number <br />
			<input type="number" name="phone" /> 
			<br /><br />
			12 Digit Credit Card Number <br />
			<input type="number" name="credit" /> 
			<br /><br />
			3 Digit Card Verification Value <br />
			<input type="number" name="verification" /> 
			<br /><br />
			
			<br />
			<input type="submit" value="Confirm" name="confirm" />
			<input type="button" value="Cancel" />
		</form>
	</body>
</html>