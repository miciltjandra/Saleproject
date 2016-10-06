<?php
	$user_id = $_POST["user"];
	$prd_name = $_POST["name"];
	$description = $_POST["desc"];
	$price = $_POST["price"];
	$image = $_POST["image"];
/*
	echo 'woyy<br />';
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["imagefile"]["name"]);
	$uploadOK = 1;
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	echo $target_file . '<br />';
	echo $imageFileType . '<br />';
	
	if(isset($_POST["addbtn"])) {
	    $check = getimagesize($_FILES["imagefile"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["imagefile"]["size"] > 5000000) {
	    echo "Sorry, your file is too large. Max file size 5MB";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["imagefile"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
*/


	$servername = "localhost";
	$db_username = "wbd";
	$db_password = "twinbaldchicken";
	$db_database = "saleproject";

	echo $user_id;
	echo $prd_name;
	echo $description;
	echo date("Y-m-d");
	echo $price;



	// Create connection
	$conn = new mysqli($servername, $db_username, $db_password, $db_database);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} else {
		echo "Connected successfully <br>\n";
	}

	$query = "INSERT INTO product(product_name, description, added_date, price, image, seller_id)
	VALUES(" .
	"\"" . $prd_name . "\"" . ", " .
	"\"" . $description . "\"" . ", " .
	"\"" . date("Y-m-d H-i") . "\"" . ", " .
	"\"" . $price . "\"" . ", " .
	"\"" . $image . "\"" . ", " .
	"\"" . $user_id . "\"" . ")";

	echo $query . "<br>\n"; 

	if ($conn->query($query) === TRUE) {
	    echo "Add product success<br>\n";
	    
	    header("Location: yourproducts.php?id_active=" . $user_id);
	} else {
	    die("Error : " . $conn->error);
	}

	$conn->close();

?>