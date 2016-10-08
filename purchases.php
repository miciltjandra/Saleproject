<!DOCTYPE html>
<html>
	<head>
		<title> Purchases </title>
		<link rel="stylesheet" href="style.css">
	</head>
	<?php
	    require 'header.php';
	    require_once 'header.php';
		require 'menubar.php';
		require_once 'menubar.php';
    ?>
	<body class="middle">
		
		<div class="text large"> Here are your purchases </div>
		<br><hr>
		<br>
		<table name="productlist">
			<?php

				include 'actioncatalog.php';
				$result = getPurchases($_GET["id_active"]);
				while ($product = $result->fetch_assoc()) {
					
					echo '<div class="purchase">';
					$time = strtotime($product["purchase_date"]);
					$date = "<div class='bold'>".  date("l, d F Y ", $time) . " </div><br> at " . date("H.i", $time);
					echo $date . "<br/><hr>";
					echo '<div class="left">';
					echo '<img class="icon" src="'. $product["image"] .'"/> <br/>' . "\n";
					echo '</div><div class="mid"">';
					echo "<div class='name'>". $product["product_name"] . "</div>\n";
					echo "<div class='detail'>". "IDR ". $product["quantity"] * $product["price"] . "<br/>\n";
					echo $product["quantity"] . " pcs<br/>\n";
					echo "@IDR " . $product["price"] . "</div><br/>\n";
					echo 'bought from '."<span class='bold'>".$product["username"] . " </span> ". "<br/>\n";
					echo "</div><div class='right'>";
					echo 'Delivery to '.$product["consignee"] . "<br/>\n";
					echo $product["deliv_address"] . "<br/>\n";
					echo $product["postalcode"] . "<br/>\n";
					echo $product["phone"] . "<br/>\n";
					echo "</div>";
					echo "</div>";
					echo "<br/>\n";
					echo "<br/>\n";

				}
				//echo $result["description"];
				//echo $result;

			?>
		</table>	
	</body>
</html>