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
					echo "<tr>\n";
					echo "<td>";
					echo $product["username"] . "<br/>\n";
					echo "added this on " . $product["added_date"] . "<br/>\n";
					echo '<img class="product_icon" height="100" src="data:image/jpg;base64,'. base64_encode($product["image"]) .'"/> <br/>' . "\n";
					echo $product["product_name"] . "<br/>\n";
					echo $product["price"] . "<br/>\n";
					echo $product["description"] . "<br/>\n";
					echo '<span id="'.$product["product_id"].'_like">' . $product["likes"] . "</span> likes <br/>\n";
					echo '<a href="confirm_purchase.php?id_active=' . $_GET['id_active'] .'&product='.$product["product_id"].'"> Buy </a> <br/><br/><hr/>';
					echo "</td>\n";
					echo "</tr>";
					echo "<br/>\n";
				}
				//echo $result["description"];
				//echo $result;

			?>
		</table>
	</body>
</html>