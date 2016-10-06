<!DOCTYPE html>
<html>
	<head>
		<title> Your Products </title>
		<link rel="stylesheet" href="style.css">
	</head>
	<?php
	    require 'header.php';
	    require_once 'header.php';
		require 'menubar.php';
		require_once 'menubar.php';
    ?>
	<body class="middle">
				
		<div class="text large"> What are you going to sell today? </div>
		<hr />
		<br />

		<table>
			<?php 
				include 'actionyproducts.php';
				$result = getyproduct($_GET["id_active"]);
				while ($product = $result->fetch_assoc()) {
					echo "<tr>\n";
					echo "<td>\n";
						echo "<br />\n";
						echo $product["added_date"] . "<br />\n";
						echo '<div class="product_div">' . "\n";
							echo "<hr />\n";
							echo $product["image"]  . "<br />\n";
							echo $product["product_name"]  . "<br />\n";
							echo $product["price"]  . "<br />\n";
							echo $product["description"]  . "<br />\n";
							echo $product["likes"] . " likes"  . "<br />\n";
							echo $product["purchases"] . " purchases"  . "<br />\n";
							echo "<span>\n";
							echo '<a href="editproduct.php?id_active=' . $_GET["id_active"] . '&product=' . $product["product_id"] . '">EDIT</a>'  . "<br />\n";
							echo '<a>DELETE</a>'  . "<br />\n";
							echo "</span>\n";
							echo "<hr />\n";
						echo "</div>\n";
					echo "</td>\n";
					echo "</tr>\n";
				}
			?>
		</table>
	</body>
</html>