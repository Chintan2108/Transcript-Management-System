<?php

	$email = $_GET["email"];


	$conn = mysqli_connect("localhost", "root", "","tms");
	if($conn -> connect_error)
	{
		die("Connection failed: " . $conn -> connect_error);
	}
	
	$query = "SELECT * FROM temp_students WHERE email='$email'";


?>
