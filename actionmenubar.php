<?php
	require_once 'database.php';
	$db = new Database();
	$userid = $db->quote($_GET["id_active"]);

	$query = "SELECT username
	FROM user
	WHERE user_id = " . $userid . "";

	$result = $db->query($query);

	if ($result->num_rows == 0) {
		echo "User not found </br>\n";
		header("Location: index.php?q=error");
	}

	$row = $result->fetch_assoc();



	echo $row["username"];
?>