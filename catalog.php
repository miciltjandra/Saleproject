<!DOCTYPE html>
<html>
	<head>
		<title> Catalog </title>
		<link rel="stylesheet" href="style.css">
		<script src="catalogscript.js"></script>
	</head>
	<?php
	    require 'header.php';
	    require_once 'header.php';
		require 'menubar.php';
		require_once 'menubar.php';
    ?>
	<body class="middle">
		<?php
			//check submit
			if (isset($_POST['submit_search'])) {
				$type = $_POST['searchcategory'];
				$val = $_POST['search'];
			}
			else {
				$type = '';
				$val = '';
			}
			echo $type . 'and' . $val;
		?>
		
		<h1> What are you going to buy today? </h1>
		<hr/>
		<form action="catalog.php?id_active=<?php echo $_GET['id_active'];?>" method="post">
		<input type="text" name="search" id="search" placeholder="search">
		<input type="radio" name="searchcategory" value="product_name" checked="checked"> product
		<input type="radio" name="searchcategory" value="username"> store
		<input type="submit" name="submit_search" value="go">
		</form>
		<br/>
		<table name="productlist">
			<?php

				include 'actioncatalog.php';
				$result = retrieveproduct($type, $val);
				foreach ($result as $product) {
					echo "<tr>";
					echo "<td>";
					echo $product["username"] . "<br/>\n";
					echo "added this on " . $product["added_date"] . "<br/>\n";
					echo '<img class="product_icon" height="100" src="'. $product["image"] .'"/> <br/>' . "\n";
					echo $product["product_name"] . "<br/>\n";
					echo $product["price"] . "<br/>\n";
					echo $product["description"] . "<br/>\n";
					echo '<span id="'.$product["product_id"].'_like">' . $product["likes"] . "</span> likes <br/>\n";
					if ($product["purchases"] == NULL) {echo "0";} else {echo $product["purchases"];} echo " purchases<br/>\n";
					echo '<a id="'.$product["product_id"].'_likebut" onclick="increaseLike(' . $product["product_id"] . ','. $_GET['id_active'] .')">'. getLiked($_GET['id_active'], $product['product_id']) .'</a><br/>';
					echo '<a href="confirm_purchase.php?id_active=' . $_GET['id_active'] .'&product='.$product["product_id"].'"> Buy </a> <br/><br/><hr/>';
					echo "</td>";
					echo "</tr>";
					echo "<br/>\n";
				}
				//echo $result["description"];
				//echo $result;

			?>
		</table>
		
	</body>
</html>