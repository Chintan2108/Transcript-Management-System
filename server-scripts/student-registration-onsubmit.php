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


	
	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = "smtp.googlemail.com";
	$mail->Port = 465; // or 587
	$mail->IsHTML(true);
	$mail->Username = "deveshhatkar@gmail.com";
	$mail->Password = "researchist";
	$mail->SetFrom("deveshhatkar@gmail.com");
	$mail->AddAddress($email);   // Add a recipient


	$mail->Subject = 'Confirmation Link | Transcript';
	$mail->Body    = "http://localhost//git//Transcript-Management-System//server-scripts//student-registration-onconfirm.php?email=$email";
	
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if($mail->send()) {
	 	$query = "INSERT INTO temp_students (id, first_name, last_name, email, university_id, institute, programme, flat_no, building_name, street_no, street_name, city, postal_code, state, password, joining_year, graduation_year, contact_no) VALUES('$student_id', '$fname', '$lname', '$email', '$university', '$institute', '$programme', '$flat_no', '$building_name', '$street_no', '$street_name', '$city', '$p_code', '$state', '$password', '$join_year', '$grad_year', '$contact_no')";
	 	header("Location: ../student/registration-student-ack.html");
	} 
	else
	{
		echo "Error!";
	}

	
	
?>