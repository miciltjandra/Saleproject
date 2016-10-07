<?php
	require_once 'database.php';
	$db = new Database();
	$name = $db->quote($_POST["name"]);
	$username = $db->quote($_POST["user"]);
	$email = $db->quote($_POST["email"]);
	$password = $db->quote($_POST["pass"]);
	$confirmpass = $db->quote($_POST["confirmpass"]);
	$address = $db->quote($_POST["address"]);
	$postcode = $db->quote($_POST["postcode"]);
	$phone = $db->quote($_POST["phone"]);

	$checkquery = "SELECT user_id
	FROM user
	WHERE username = " . $username;

	$checkresult = $db->select($checkquery);

	if (!empty($checkresult)) {
		echo "Username already existed";
		header("Location: register.php?q=error");
		exit();
	} else {
		echo "Username OK";
	}

	if (strcmp($password, $confirmpass) !== 0) {
		echo "Password not confirmed <br>\n";
		header("Location: register.php?q=error");
		exit();
	} else {
		echo "Password confirmed <br>\n";
	}

	//if ($valid && $valid2) {
		$query = "INSERT INTO user(fullname, username, email, password, address, postalcode, phonenumber)
			VALUES(" .
			$name . ", " .
			$username . ", " .
			$email . ", " .
			$password . ", " .
			$address . ", " .
			$postcode . ", " .
			$phone . ")";

		echo $query . "<br/>\n";

		if ($db->query($query) === TRUE) {
		    echo "Registration Success <br>\n";
		    $idresult = $db->query($checkquery);
		    $user_id = $idresult->fetch_assoc()["user_id"];
		    echo "user_id : " . $user_id;
		    header("Location: catalog.php?id_active=" . $user_id);
		} else {
		    die("Error : " . $conn->error);
		}
	//}
	/*else {
		echo "not valid";
		//header("Location: register.php?q=error");
	}*/
?>