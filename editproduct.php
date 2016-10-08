<!DOCTYPE html>
<html>
	<head>
		<title> Edit Product </title>
		<link rel="stylesheet" href="style.css">
		<script type="text/javascript" src="addscript.js"></script>
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
		<form onsubmit="return validateEdit()" class="text" action="actionedit.php" method="post" id="addform" enctype="multipart/form-data">
			<input type = "hidden" name = "user" value = <?php echo $_GET["id_active"]?> />
			<input type = "hidden" name = "product" value = <?php echo $_GET["product"]?> />
			Name <br />
			<input id="edit_name" class="reg_text" type="text" name="name" value = <?php echo $product["product_name"] ?> oninput="valNotEmpty(this.value, 'edit_name')" required maxlength="100"/> 
			<br />
			Description (max 200 chars) <br />
			<textarea id="edit_desc" class="reg_text" rows="4" form="addform" name="desc" oninput="valNotEmpty(this.value, 'edit_desc')" required maxlength="200"><?php echo $product["description"] ?></textarea> 
			<br />
			Price (IDR) <br />
			<input id="edit_price" class="reg_text" type="number" name="price" value = <?php echo $product["price"] ?> oninput="valNumber(this.value, 'edit_price', 15)" required maxlength="15" min="0" max="999999999999999"/>
			<br />
			Photo <br />

			<input id="img" type="file" name="imagefile" accept="image/*" /> 
			<p id="" ><?php echo $product["image"] ?></p>
			<br />
			<input class="submit" type="submit" value="Cancel" name="cancelbtn"/>
			<input class="submit" type="submit" value="Update" name="updatebtn" />
		</form>
		<br class="breaker" />
	</body>
</html>