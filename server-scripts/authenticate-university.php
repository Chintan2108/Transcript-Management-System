<?php
	
	$user_name = $_POST['u_id'];
	$password = $_POST['pass'];

	//Establishing connectionn with Database.
	$conn = mysqli_connect("localhost", "root", "","tms");
	if($conn -> connect_error)
	{
		die("Connection failed: " . $conn -> connect_error);
	}

	//Retriving entries that match username and password.
	$query = "SELECT email, password FROM university WHERE email='$user_name' AND password='$password'";
	$result = $conn -> query($query);
	
	//Authenticating the user.
	if($result -> num_rows > 0)
	{
		//User Verified!
		//page need to be added
		//header("Location: ../student/student-transcript-form.html");
		echo $user_name;
	}
	else
	{
		//Invalid Username or Password!

		/* Redirect to invalid-username-password page */
		header("Location: ../invalid-username-password.html");
	}

?>