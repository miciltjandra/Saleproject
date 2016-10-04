<!DOCTYPE html>
<html>
	<head>
		<title> Add Your Product </title>
		<link rel="stylesheet" href="style.css">
	</head>
	<?php
	    require 'header.php';
	    require_once 'header.php';
		require 'menubar.php';
		require_once 'menubar.php';
    ?>
	<body class="middle">
		
		<div class="text large"> Please add your product here </div>
		<br /><hr />
		<form action="actionadd.php" method="post" id="addform">
			Name <br />
			<input type="text" name="name"> 
			<br />
			Description (max 200 chars) <br />
			<textarea rows="4" form="form_id"></textarea> 
			<br />
			Price (IDR) <br />
			<input type="number" name="price"> 
			<br />
			Photo <br />
			<input type="file" name="image"> <p id="">No file chosen</p> 
			<br />
			<input type="submit" value="Add">
			<input type="submit" value="Cancel">
		</form>
	</body>
</html>