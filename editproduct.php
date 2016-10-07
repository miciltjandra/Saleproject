<!DOCTYPE html>
<html>
	<head>
		<title> Edit Product </title>
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
			include 'actionedit.php';
			$product = getproductinfo($_GET["product"]);

		?>
		<div class="text large"> Please update your product here </div>
		<br /><hr />
		<form action="actionedit.php" method="post" id="addform" enctype="multipart/form-data">
			<input type = "hidden" name = "user" value = <?php echo $_GET["id_active"]?> />
			<input type = "hidden" name = "product" value = <?php echo $_GET["product"]?> />
			Name <br />
			<input type="text" name="name" value = <?php echo $product["product_name"] ?> /> 
			<br />
			Description (max 200 chars) <br />
			<textarea rows="4" form="addform" name="desc"><?php echo $product["description"] ?></textarea> 
			<br />
			Price (IDR) <br />
			<input type="number" name="price" value = <?php echo $product["price"] ?> /> 
			<br />
			Photo <br />
			<input type="file" name="imagefile" accept="image/*" value = <?php echo $product["image"] ?> /> 
			<p id="" ><?php echo $product["image"] ?></p> 
			<br />
			<input type="submit" value="Update" name="updatebtn" />
			<input type="submit" value="Cancel" name="cancelbtn"/>
		</form>

	</body>
</html>