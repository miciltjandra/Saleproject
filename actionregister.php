<?php
	$name = $_POST["name"];
	$username = $_POST["user"];
	$email = $_POST["email"];
	$password = $_POST["pass"];
	$address = $_POST["address"];
	$postcode = $_POST["postcode"];
	$phone = $_POST["phone"];

	echo $name . "<br/>\n";
	echo $username . "<br/>\n";
	echo $email . "<br/>\n";
	echo $password . "<br/>\n";
	echo $address . "<br/>\n";
	echo $postcode . "<br/>\n";
	echo $phone . "<br/>\n";

	$servername = "localhost";
	$db_username = "wbd";
	$db_password = "twinbaldchicken";
	$db_database = "saleproject";

	// Create connection
	$conn = new mysqli($servername, $db_username, $db_password, $db_database);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} else {
		echo "Connected successfully <br>\n";
	}
?>