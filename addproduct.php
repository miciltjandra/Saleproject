<!DOCTYPE html>
<html>
	<head>
		<title> Add Your Product </title>
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
		
		<div class="large text"> Please add your product here </div>
		<br /><hr />
		<form class="text" action="actionadd.php" method="post" id="addform" enctype="multipart/form-data">
			<input type = "hidden" name = "user" value = <?php echo $_GET["id_active"]?> />
			Name <br />
			<input id="add_name" class="reg_text" type="text" name="name" oninput="valNotEmpty(this.value, 'add_name')" required /> 
			<br />
			Description (max 200 chars) <br />
			<textarea id="add_desc" class="reg_text" rows="4" form="addform" name="desc" oninput="valNotEmpty(this.value, 'add_desc')" required></textarea> 
			<br />
			Price (IDR) <br />
			<input id="add_price" class="reg_text" type="number" name="price" oninput="valNumber(this.value, 'add_price')" required /> 
			<br />
			Photo <br />
			<input type="file" name="imagefile" accept="image/*" required /> 
			<br />
			<input class="submit" type="button" value="Cancel" />
			<input class="submit" type="submit" value="Add" name="addbtn" />
		</form>
		<br class="breaker"/>
	</body>
</html>