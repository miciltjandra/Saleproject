<?php
	require_once 'database.php';
	$db = new Database();
	$user = $db->quote($_POST["user"]);
	$password = $_POST["pass"];


	if(strpos($user, '@') === false) { 	// If using username
		$query = "SELECT user_id, password
		FROM user
		WHERE username = " . $user;
	}
	else { 								// If using email
		$query = "SELECT user_id, password
		FROM user
		WHERE email = " . $user;
	}

	echo $query . "<br>\n"; 

	$result = $db->select($query);

	if (empty($result)) {
		echo "User not found </br>\n";
		header("Location: index.php?q=error");
	} else {
		echo $result[0]["password"] . "<br/>\n";
		if ($result[0]["password"] === $password) {
			echo "Login successful <br/>\n";
			header("Location: catalog.php?id_active=" . $result[0]["user_id"]);
		} else {
			echo "Login error <br/>\n";
			header("Location: index.php?q=error");
		}
	}

?>