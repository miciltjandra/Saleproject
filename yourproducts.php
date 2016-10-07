<!DOCTYPE html>
<html>
	<head>
		<title> Your Products </title>
		<link rel="stylesheet" href="style.css">
		<script>
			function deleteP(namaP, u_id, p_id) {
			    if (confirm("Delete product \"" + namaP + "\" from SaleProject?") == true) {
			        window.location = "actionyproducts.php?id_active=" + u_id + "&product=" + p_id;
			    }
			}
		</script>
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
					
						echo "<br />\n";
						echo $product["added_date"] . "<br />\n";
						echo '<div class="product_div" style="">' . "\n";
							echo "<hr />\n";
							echo '<div style="float:left; width:180px">';
							echo '<img src="' . $product["image"] . '"height=150 style="max-width:180px"/><br />' . "\n";
							echo '</div><div style="float:left; margin: 10px 10px 10px 10px">';
							echo "<strong>\n";
							echo $product["product_name"]  . "<br />\n";
							echo "</strong>\n";
							echo $product["price"]  . "<br />\n";
							echo $product["description"]  . "<br />\n";
							echo '</div><div style="float:right">';
							echo $product["likes"] . " likes"  . "<br />\n";
							echo $product["purchases"] . " purchases"  . "<br /><br />\n";
							echo "<strong>\n";
							echo '<a href="editproduct.php?id_active=' . $_GET["id_active"] . '&product=' . $product["product_id"] . '" style="color:orange">EDIT</a>'  . "\n";
							echo '<a onclick="deleteP(\'' . $product["product_name"] . '\', ' . $_GET["id_active"] . ', ' . $product["product_id"] . ')" style="color:red">DELETE</a>'  . "<br />\n";
							echo "</strong>\n";
							echo "</div>";
						echo "</div>\n";
						echo '<hr style="clear:both"/>';
					
				}
			?>
		</table>
	</body>
</html>