<?php



	$email = $_GET['email'];

	$conn = mysqli_connect("localhost", "root", "","tms");
	if($conn -> connect_error)
	{
		die("Connection failed: " . $conn -> connect_error);
	}
	
	$query = "SELECT * FROM temp_students WHERE email='$email'";

	$result = $conn->query($query);


		if ($result->num_rows > 0) 
		{ 
			$row = $result -> fetch_assoc();

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

			$query1 = "INSERT INTO students (id, first_name, last_name, email, university_id, institute, programme, flat_no, building_name, street_no, street_name, city, postal_code, state, password, joining_year, graduation_year, contact_no) VALUES('$student_id', '$fname', '$lname', '$email', '$university', '$institute', '$programme', '$flat_no', '$building_name', '$street_no', '$street_name', '$city', '$p_code', '$state', '$password', '$join_year', '$grad_year', '$contact_no')";
	 		$conn -> query($query1);
		}
	



	$sql = "DELETE FROM temp_students WHERE email='$email'";
	$conn -> query($sql);


	header("Location: ../../student/registration-student-confirmed.html");
?>