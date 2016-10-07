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
		?>
		
		<h1> What are you going to buy today? </h1>
		<hr/>
		<form id="searchbox" action="catalog.php?id_active=<?php echo $_GET['id_active'];?>" method="post">
		<input type="text" name="search" id="search" placeholder="Search catalog ...">
		<input type="submit" id="submitsearch" name="submit_search" value="GO"> <br/>
		by
		<label class="searchradio"><input type="radio" name="searchcategory" value="product_name" checked="checked"> product </label><br/>
		<label class="searchradio"><input type="radio" name="searchcategory" value="username"> store </label>
		</form>
		<br/>
			<?php

				include 'actioncatalog.php';
				$result = retrieveproduct($type, $val);
				foreach ($result as $product) {
					echo '<div class="product">' . "\n";
					echo '<div class="catalogbold">' . $product["username"] . "</div>\n";
					echo "<div>added this on " . $product["added_date"] . "</div>\n";
					echo "<hr/>\n";
					echo '<div class="catalogleft">' . "\n";
					echo '<img class="icon" src="'. $product["image"] .'" alt="'. $product["product_name"] .'"/> <br/>' . "\n";
					echo "</div>\n";
					echo '<div class="catalogmid">' . "\n";
					echo '<div class="name">' . $product["product_name"] . "</div>\n";
					echo '<div class="price"> IDR ' . number_format($product["price"],0,",",".") . "</div>\n";
					echo '<div class="desc">' . $product["description"] . "</div>\n";
					echo "</div>\n";
					echo '<div class="catalogright">' . "\n";
					echo '<span id="'.$product["product_id"].'_like">' . $product["likes"] . "</span> likes <br/>\n";
					if ($product["purchases"] == NULL) {echo "0";} else {echo $product["purchases"];} echo " purchases<br/><br/>\n";
					$like = getLiked($_GET['id_active'], $product['product_id']);
					echo '<a class="likebut';
					if ($like == "LIKED") {echo " liked";}
					echo '" id="'.$product["product_id"].'_likebut" onclick="increaseLike(' . $product["product_id"] . ','. $_GET['id_active'] .')">'. $like .'</a>	';
					echo '<a class="buybut"href="confirm_purchase.php?id_active=' . $_GET['id_active'] .'&product='.$product["product_id"].'"> BUY </a>';
					echo "</div>\n";
					echo '<div class="cataloglow">' . "\n";
					echo "<hr/>\n<br/>\n";
					echo "</div>\n";
					echo "</div>\n";
				}
				//echo $result["description"];
				//echo $result;

			?>

		
	</body>
</html>