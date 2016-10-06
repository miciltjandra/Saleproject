<?php
	$user_id = $_POST["user"];
	$prd_name = $_POST["name"];
	$description = $_POST["desc"];
	$price = $_POST["price"];
	
	$upload_image = $_FILES["imagefile"]["name"];

	$folder="images/";

	if ($_FILES["imagefile"]["size"] > 5000000) {

	    echo "Sorry, your file is too large. Maks file size 5 MB.";
	    
	}
	else {
		$imageFileType = pathinfo($_FILES["imagefile"]["name"],PATHINFO_EXTENSION);

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "bmp") {
		    echo "Sorry, only JPG, JPEG, PNG, GIF, BMP files are allowed.";
		    
		}
		else {
			$fullname = $folder . $_FILES["imagefile"]["name"];

			if (file_exists($fullname)) {
			    echo "Sorry, file name already exists. Please change the image file name.";
			}
			else {
				move_uploaded_file($_FILES["imagefile"]["tmp_name"], "$folder".$_FILES["imagefile"]["name"]);
			}
		}
	}

//	$insert_path="INSERT INTO image_table VALUES('$folder','$upload_image')";

	


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
	"\"" . $fullname . "\"" . ", " .
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