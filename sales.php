<!DOCTYPE html>
<html>
	<head>
		<title> Sales </title>
		<link rel="stylesheet" href="style.css">
	</head>
	<?php
	    require 'header.php';
	    require_once 'header.php';
		require 'menubar.php';
		require_once 'menubar.php';
    ?>
	<body class="middle">
		
		<div class="text large"> Here are your sales </div>
		<br><hr>
		<br>
		<table name="productlist">
			<?php

				include 'actioncatalog.php';
				$result = getSales($_GET["id_active"]);
				while ($product = $result->fetch_assoc()) {
/*					echo "<tr>\n";
					echo "<td>";
					echo $product["purchase_date"] . "<br/>\n";
					echo '<img class="product_icon" height="100" src="data:image/jpg;base64,'. base64_encode($product["image"]) .'"/> <br/>' . "\n";
					echo $product["product_name"] . "<br/>\n";
					echo $product["price"] . "<br/>\n";
					echo $product["quantity"] . "<br/>\n";
					echo 'Bought by '.$product["username"] . "<br/>\n";
					echo 'Delivery to '.$product["consignee"] . "<br/>\n";
					echo $product["address"] . "<br/>\n";
					echo $product["postalcode"] . "<br/>\n";
					echo $product["phone"] . "<br/>\n";
					echo "<br/>\n";
					echo "</td>\n";
					echo "</tr>";
					echo "<br/>\n";
*/

					echo "<div style='height:250px'>";
					echo $product["purchase_date"] . "<br/><hr>";
					echo "<div style='float:left'>";
					echo '<img class="product_icon" height="200px" src="'. $product["image"] .'"/> <br/>' . "\n";
					echo "</div><div style='float:left'>";
					echo "<p style='font-weight:bold'>". $product["product_name"] . "</p><br/>\n";
					echo $product["quantity"] . " pcs<br/>\n";
					echo "@IDR " . $product["price"] . "<br/><br>\n";
					echo 'Bought by '.$product["username"] . "<br/>\n";
					echo "</div><div style='margin-left:40%'>";
					echo 'Delivery to '.$product["consignee"] . "<br/>\n";
					echo $product["address"] . "<br/>\n";
					echo $product["postalcode"] . "<br/>\n";
					echo $product["phone"] . "<br/>\n";
					echo "</div>";
					echo "</div>";
					echo "<br/>\n";


				}
				//echo $result["description"];
				//echo $result;

			?>
		</table>
	</body>
</html>