
<? php
require 'PHPMailerAutoload.php';

	$mail = new PHPMailer;
	$mail->isSMTP();                    // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'deveshhatkar@gmail.com';                 // SMTP username
	$mail->Password = 'researchist';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to
	//$mail->SMTPDebug = 2;
	$mail->setFrom('deveshhatkar@gmail.com', 'Team, TranscriptManagementSystem');
	$mail->addAddress('15ce040@charusat.edu.in');     // Add a recipient


	$mail->Subject = 'Password Recovery';
	$mail->Body    = "http://localhost//transcript//forgetPassword//change_forgotten_password.php?passkey=hello";
	
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
	 	echo 'Message could not be sent!';
	} else {
		// PAGE WHICH WILL DISPLAY MESSAGE THAT MAIL HAS BEEN SENT.
	    echo "mail has been sent!"
	}

?>