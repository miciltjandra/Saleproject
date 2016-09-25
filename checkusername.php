<?php
	//echo $_REQUEST["q"];
	//echo "something";

	$servername = "localhost";
	$db_username = "wbd";
	$db_password = "twinbaldchicken";
	$db_database = "saleproject";

	// Create connection
	$conn = new mysqli($servername, $db_username, $db_password, $db_database);

	// Check connection
	/*if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} else {
		echo "Connected successfully <br>\n";
	}*/

	$query = "SELECT *
	FROM user
	WHERE username = \"" . $_REQUEST["q"] . "\"";

	$result = $conn->query($query);

	if ($result->num_rows !== 0) {
		echo "Username already existed";
	} else {
		echo "Username OK";
	}
?>