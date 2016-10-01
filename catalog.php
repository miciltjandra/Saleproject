<!DOCTYPE html>
<html>
	<head>
		<title> Catalog </title>
		<link rel="stylesheet" href="style.css">
	</head>
	<?php
	    require 'header.php';
	    require_once 'header.php';
		require 'menubar.php';
		require_once 'menubar.php';
    ?>
	<body class="middle">
		<?php
			session_start();
			$user = $_SESSION["login"];
			if ($user == "") {
				echo "Unlogged";
				header("Location: index.php");
			}
			else {
				echo "user : " . $user;
			}
		?>
		<h1> What are you going to buy today? </h1>
		<hr/>
		<input type="text" name="search" id="search" value="search">
		<input type="radio" name="searchcategory" value="product"> product
		<input type="radio" name="searchcategory" value="store"> store
		<input type="submit" value="go">
		<br/>
		<table name="productlist">
					<?php

						include 'retrieveproduct.php';
						$result = retrieveproduct('');
						while ($product = $result->fetch_assoc()) {
							echo "<tr>";
							echo "<td>";
							echo $product["username"] . "<br/>\n";
							echo "added this on " . $product["added_date"] . "<br/>\n";
							echo '<img class="product_icon" height="100" src="data:image/jpg;base64,'. base64_encode($product["image"]) .'"/> <br/>' . "\n";
							echo $product["product_name"] . "<br/>\n";
							echo $product["price"] . "<br/>\n";
							echo $product["description"] . "<br/>\n";
							echo $product["likes"] . " likes<br/>\n";
							echo $product["purchases"] . " purchases<br/>\n";
							echo "</td>";
							echo "</tr>";
						}
						//echo $result["description"];
						//echo $result;

					?>
		</table>
		
	</body>
</html>