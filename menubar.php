<?php $user = $_GET['id_active'];?>
<div class="middle fix">
	<div style="text-align: right">Hi <strong>
	<?php
		$userid = $_GET["id_active"];

		$servername = "localhost";
		$db_username = "wbd";
		$db_password = "twinbaldchicken";
		$db_database = "saleproject";

		// Create connection
		$conn = new mysqli($servername, $db_username, $db_password, $db_database);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		$query = "SELECT username
		FROM user
		WHERE user_id = '" . $userid . "'";

		$result = $conn->query($query);

		if ($result->num_rows == 0) {
			echo "User not found </br>\n";
			header("Location: index.php?q=error");
		}

		$row = $result->fetch_assoc();

		echo $row["username"];

		$conn->close();
	?>
	</strong></div><br>
	<div style="text-align: right"><a style="color: darkblue" href="index.php">logout</a></div><br>
</div>
<ul id="tab">
<li><a href="catalog.php?id_active=<?php echo $user;?>" 		<?php if (strpos($_SERVER['PHP_SELF'], 'catalog.php')) echo 'class="active"'; ?> 		>Catalog</a></li>
<li><a href="yourproducts.php?id_active=<?php echo $user;?>" 	<?php if (strpos($_SERVER['PHP_SELF'], 'yourproducts.php')) echo 'class="active"'; ?> 	>Your Products</a></li>
<li><a href="addproduct.php?id_active=<?php echo $user;?>" 	<?php if (strpos($_SERVER['PHP_SELF'], 'addproduct.php')) echo 'class="active"'; ?> 	>Add Product</a></li>
<li><a href="sales.php?id_active=<?php echo $user;?>" 		<?php if (strpos($_SERVER['PHP_SELF'], 'sales.php')) echo 'class="active"'; ?>			>Sales</a></li>
<li><a href="purchases.php?id_active=<?php echo $user;?>" 	<?php if (strpos($_SERVER['PHP_SELF'], 'purchases.php')) echo 'class="active"'; ?>		>Purchases</a></li>
</ul>
<br><br>
