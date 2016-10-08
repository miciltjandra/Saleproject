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
		<br />
		<hr />
		

		<table>
			<?php 
				include 'actionyproducts.php';
				$result = getyproduct($_GET["id_active"]);
				while ($product = $result->fetch_assoc()) {
					echo '<div class="product">' . "\n";
						echo "<br />\n";
						$time = strtotime($product["added_date"]);
						$date = "<div class='bold'>".  date("l, d F Y ", $time) . " </div> at " . date("H.i", $time);
						echo "<br />\n" . $date . "<br />\n";
						echo "<hr />\n";
						echo '<div class="catalogleft">';
						echo '<img src="' . $product["image"] . '" class="icon" alt="'. $product["product_name"] .'"/><br />' . "\n";
						echo '</div>';
						echo '<div class="catalogmid">' . "\n";
						echo '<div class="name">' . $product["product_name"] . "</div>\n";
						echo '<div class="price"> IDR ' . number_format($product["price"],0,",",".") . "</div>\n";
						echo '<div class="desc">' . $product["description"] . "</div>\n";
						echo "</div>\n";
						echo '<div class="catalogright">' . "\n";
						echo $product["likes"] . " likes"  . "<br />\n";
						if ($product["purchases"] == NULL) {echo "0";} else {echo $product["purchases"];} echo " purchases<br/><br/>\n";
						echo "<span><strong>\n";
						echo '<a class="editbut" href="editproduct.php?id_active=' . $_GET["id_active"] . '&product=' . $product["product_id"] . '">EDIT</a>'  . "\n";
						echo '<a class="delbut" onclick="deleteP(\'' . $product["product_name"] . '\', ' . $_GET["id_active"] . ', ' . $product["product_id"] . ')">DELETE</a>'  . "<br />\n";
						echo "</strong></span>\n";
						echo "</div>";
						echo "<hr />\n";
					echo "</div>\n";
					
				}
			?>
		</table>
	</body>
</html>