<?php

	$email = $_GET['email'];

	session_start();
	$_SESSION['email'] = $email;


?>
<!DOCTYPE html>
<html>
<head>
	<title>New Password</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/validations.js"></script>

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/owl.carousel.css">

	<!-- Main css -->
	<link rel="stylesheet" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Poppins:400,500,600' rel='stylesheet' type='text/css'>
</head>
<body style="background: linear-gradient(#2e6060,#99bbcc,#2e6060);">


<!-- =========================
     NAVIGATION LINKS     
============================== -->
<nav class="navbar navbar-inverse" style="background-color: #132f38; height: 80px;padding-top:1%;border-bottom:1px solid white;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> 
          </button>
          <a class="navbar-brand" href="#" style="font-size: 210%; font-style: bold; padding-right:50px;">Transcript</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li><a href="#">Our Team</a></li>
            <li><a href="#">Contact</a></li> 
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </div>
    </nav>

<section id="form" style="margin-top: 7%;">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<center><h3>New Password</h3></center>
				<form action="server-scripts/student-password-change.php" method="POST" onsubmit="return password(this)" style="margin-top: 5%;">
					<fieldset>
						<legend>Password Details</legend>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="enrollment">New Password:</label>
					    			<div class="input-group">
					    				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					    				<input type="password" name="password" class="form-control" id="password" placeholder="Enter new password" required>
					      			</div>
							</div>
							<div class="form-group">
								<label for="enrollment">Confirm Password:</label>
					    			<div class="input-group">
					    				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					    				<input type="password" class="form-control" id="cpassword" placeholder="Enter new password" required onkeyup="checkPass()">
					      			</div>
							</div>
								
							<div class="col-sm-8 col-sm-offset-2">
						<div class="form group">
                        	<input type="submit" class="btn btn-submit" value="Submit" id="submit" style="width: 90%; background-color: #386772; color: white;">
                    	</div>
                    	</div>
						</div>
					</fieldset>
				</form>	
			</div>
		</div>
	</div>
</section>

<!-- =========================
    FOOTER SECTION   
============================== -->

<footer style="background-color: #132f38; height: 100%; margin-top: 5%; border-top:1px solid white;">
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12">
				<p class="wow fadeInUp" data-wow-delay="0.6s" style="color: #bfbfbf;">Copyright &copy; 2017 Coders</p>
				<ul class="social-icon">
					<li><a href="https://www.facebook.com" class="fa fa-facebook-official wow fadeInUp" data-wow-delay="1s" style="color: #bfbfbf;"></a></li>
					<li><a href="https://twitter.com" class="fa fa-twitter wow fadeInUp" data-wow-delay="1.3s" style="color: #bfbfbf;"></a></li>
					<li><a href="https://dribbble.com/" class="fa fa-dribbble wow fadeInUp" data-wow-delay="1.6s" style="color: #bfbfbf;"></a></li>
					<li><a href="https://www.behance.net/" class="fa fa-behance wow fadeInUp" data-wow-delay="1.9s" style="color: #bfbfbf;"></a></li>
					<li><a href="https://in.linkedin.com" class="fa fa-linkedin wow fadeInUp" data-wow-delay="1.9s" style="color: #bfbfbf;"></a></li>
					<li><a href="https://github.com" class="fa fa-github wow fadeInUp" data-wow-delay="2s" style="color: #bfbfbf;"></a></li>
					<li><a href="https://in.pinterest.com" class="fa fa-pinterest wow fadeInUp" data-wow-delay="2s" style="color: #bfbfbf;"></a></li>
					<li><a href="https://plus.google.com/discove" class="fa fa-google-plus wow fadeInUp" data-wow-delay="2s" style="color: #bfbfbf;"></a></li>
				</ul>

			</div>
			
		</div>
	</div>
</footer>
</body>
</html>