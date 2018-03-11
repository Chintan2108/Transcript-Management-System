<?php

	session_start();
	$email =  $_SESSION['email'];

	$password = $_POST['password'];

	$conn = mysqli_connect("localhost", "root", "","tms");
	if($conn -> connect_error)
	{
		die("Connection failed: " . $conn -> connect_error);
	}

	//verify email valid or not.
	$query = "UPDATE students SET password='$password' WHERE email='$email'";
	$result = $conn -> query($query);

	header("Location: password-change-msg.html");
	
	header("Location: ../index.html");
	echo "<script>alert('password changed!!!');</script>";

?>