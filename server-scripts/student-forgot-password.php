<?php
$email = $_POST['email'];
$conn = mysqli_connect("localhost", "root", "","tms");
	if($conn -> connect_error)
	{
		die("Connection failed: " . $conn -> connect_error);
	}

	//verify email valid or not.
	$query = "SELECT email FROM students WHERE email='$email'";
	$result = $conn -> query($query);

	if($result->num_rows > 0)
	{
		require '../Mailer/PHPMailerAutoload.php';

		$mail = new PHPMailer(); // create a new object
		$mail->IsSMTP(); // enable SMTP
		//$mail->SMTPDebug = 4; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = "smtp.googlemail.com";
		$mail->Port = 465; // or 587
		$mail->IsHTML(true);
		$mail->Username = "transcriptsmanager@gmail.com";
		$mail->Password = "transcript1234";
		$mail->SetFrom("deveshhatkar@gmail.com");
		$mail->AddAddress($email);   // Add a recipient


		$mail->Subject = 'Password Recovery Link | Transcript';
		$mail->Body    = "http://localhost//git//Transcript-Management-System//new-password.php?email=$email";
		
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if($mail->send())
		{

	 		header("Location: ../forgotpassword-linksent.html");
		} 
		else
		{
			echo " Email Error!";
		}
	}
	else
	{
		echo "<script>alert('This EMAIL is not registered !!!');</script>";

	}



?>