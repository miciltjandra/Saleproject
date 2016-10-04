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