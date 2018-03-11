<?php	
	
	
	require '../Mailer/PHPMailerAutoload.php';

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
	$q = "SELECT email FROM gtu WHERE student_id='$student_id'";
	$r = $conn -> query($q);

	$email_add = "helloo";

	if($r -> num_rows > 0)
	{
		$row = $r -> fetch_assoc();
		$email_add = $row['email'];

		$mail = new PHPMailer(); // create a new object
		$mail->IsSMTP(); // enable SMTP
		//$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = "smtp.googlemail.com";
		$mail->Port = 587; // or 587
		$mail->IsHTML(true);
		$mail->Username = "transcriptsmanager@gmail.com";
		$mail->Password = "transcript1234";
		$mail->SetFrom("deveshhatkar@gmail.com");
		$mail->AddAddress($email_add);   // Add a recipient


		$mail->Subject = 'Confirmation Link | Transcript';
		$mail->Body    = "http://localhost//git//Transcript-Management-System//server-scripts//student-registration-onconfirm.php?email=$email";
		
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if($mail->send()) {
		 	$query = "INSERT INTO temp_students (id, first_name, last_name, email, university_id, institute, programme, flat_no, building_name, street_no, street_name, city, postal_code, state, password, joining_year, graduation_year, contact_no) VALUES('$student_id', '$fname', '$lname', '$email', '$university', '$institute', '$programme', '$flat_no', '$building_name', '$street_no', '$street_name', '$city', '$p_code', '$state', '$password', '$join_year', '$grad_year', '$contact_no')";
		 	$conn -> query($query);
		 	header("Location: ../student/registration-student-ack.html");
		} 
		else
		{
			echo "Error!";
		}
		
	}
	else{
		echo "Invalid enrollment no. You must be a student of the university!";
	}
	echo $email_add;
	
	
	

	
	
?>