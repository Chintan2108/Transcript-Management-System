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


	require 'PHPMailerAutoload.php';
	$mail = new PHPMailer;
	$mail->isSMTP();                    // Set mailer to use SMTP
	$mail->Host = 'smtp.mail.yahoo.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'transcripts_info@yahoo.com';                 // SMTP username
	$mail->Password = 'transcripts12345';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to
	$mail->SMTPDebug = 2;
	$mail->setFrom('transcripts_info@yahoo.com', 'Team, TranscriptManagementSystem');
	$mail->addAddress('15ce048@charusat.edu.in');     // Add a recipient


	$mail->Subject = 'Password Recovery';
	$mail->Body    = "http://localhost//transcript//forgetPassword//change_forgotten_password.php?passkey=$email";
	
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
	 	echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		// PAGE WHICH WILL DISPLAY MESSAGE THAT MAIL HAS BEEN SENT.
	    header("Location: check_mail.html ");
	}
	else
	{
		echo "This Email Id is not Registered!";
		//ENTER THE PAGE FROM WHERE REGISTRATIO IS DONE.
	    echo "Click here to <a href = '..registration_form.php..'> Register.";
	}

	
	$query = "INSERT INTO temp_students ()";
?>