<?php

	$email = $_GET["email"];
	$conn = mysqli_connect("localhost", "root", "","tms");
	if($conn -> connect_error)
	{
		die("Connection failed: " . $conn -> connect_error);
	}
	
	$query = "SELECT * FROM temp_students WHERE email=''";

	$result = $conn->query($query);

	if ($result-> > 0) 
	{

   	while($row = mysql_fetch_assoc($result)){
          }

	$university = $row['university_id'];
	$institute=$row['institute'];
	$programme=$row['programme'];
	$join_year=$row['joining_year'];
	$grad_year=$row['graduation_year'];
	$student_id=$row['id'];
	$fname=$row['first_name'];
	$lname=$row['last_name'];
	$contact_no=$row['contact_no'];
	$flat_no=$row['flat_no'];
	$building_name=$row['building_name'];
	$street_no=$row['street_no'];
	$street_name=$row['street_name'];
	$city=$row['city'];
	$p_code=$row['postal_code'];
	$state=$row['state'];
	$email=$row['email'];
	$password = $row['password'];
	}
	echo $institute;
?>

