<?php	

	$university = $_POST["university"];
	$institute=$_POST["institute"];
	$programme=$_POST["programme"];
	$join_year=$_POST["join_year"];
	$grad_year=$_POST["grad_year"];
	$student_id=$_POST["student_id"];
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$contact_no=$_POST["contact_no"];
	$flat_no=$_POST["flat_no"];
	$building_name=$_POST["building_name"];
	$street_no=$_POST["street_no"];
	$street_name=$_POST["street_name"];
	$city=$_POST["city"];
	$p_code=$_POST["p_code"];
	$state=$_POST["state"];
	$email=$_POST["email"];
	$password = $_POST["password"];

	$conn = mysqli_connect("localhost", "root", "","tms");
	if($conn -> connect_error)
	{
		die("Connection failed: " . $conn -> connect_error);
	}
	//Retriving entries that match username and password.
	
	$query = "INSERT INTO temp_students ()";
?>