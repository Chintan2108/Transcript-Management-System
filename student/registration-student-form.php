<?php

	//Establishing connectionn with Database.
	$conn = mysqli_connect("localhost", "root", "","tms");
	if($conn -> connect_error)
	{
		die("Connection failed: " . $conn -> connect_error);
	}

	// Retriving University Names from the university table.
	$query = "SELECT id, name from university";
	$result = $conn->query($query);

	$num_rows = $result->num_rows;

	$university_names = array();
	$university_id = array();

	for ($i=0; $i < $num_rows; $i++) 
	{ 
		$row = $result->fetch_assoc();
		$university_names[$i] = $row['name'];
		$university_id[$i] = $row['id'];
		//$message = $university_names[$i];
		//echo "<script> alert('$message') </script>";
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Student Registration From</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script src="../js/validations.js"></script>

	<link href='https://fonts.googleapis.com/css?family=Poppins:400,500,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../css/font-awesome.min.css">

	<!-- Main css -->
	<link rel="stylesheet" href="../css/style.css">

	<style>
		.form-control{
			background-color: #d7d8cb; 
		}
		#s{
			color: red;
		}
	</style>

	<script type="text/javascript">
	
		function dropdown_university()
		{

			var university_dropdown = document.getElementById("university");

			var num_rows = <?php echo $num_rows; ?>;			

			var university_names = JSON.parse('<?= json_encode($university_names) ?>');
			var university_id = JSON.parse('<?= json_encode($university_id) ?>');
			
			for(var i = 0; i < num_rows; i++)
			{
				var option = document.createElement("option");

				option.text = university_names[i];
				option.value = university_id[i];

				university_dropdown.appendChild(option);
			}
		}

	</script>

</head>
<body style="background: linear-gradient(#2e6060,#99bbcc,#2e6060);" onload="dropdown_university()">


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


<!-- =========================
     STUDENT REGISTRATION FORM     
============================== -->

<section id="form">
	<div class="container">
		<div class="row">
			<center><div id="h">Student Registration Form</div></center>
			<div class="col-sm-8 col-sm-offset-2" style="background-color: #e6efef; padding-top: 2%;">
				
				<form action="../server-scripts/student-registration-onsubmit.php" method="POST" onsubmit="return stufinal()">
					<div class="form-group" style="padding-top:1%;">
						<fieldset>
							<legend ">University Details</legend>
							<div class="col-sm-12">
					    		<div class="form-group">
					    			<label for="university">University<p id="s" style="display:inline">*</p></label>
					      			<select name="university" class="form-control" id="university">

					      				<option>--Select--</option>
					      			</select>
					      		</div>
				      		</div>
				      			<div class="col-sm-12">
						      		<div class="form-group">
						    			<label for="Institute">Institute<p id="s" style="display:inline">*</p></label>
						      			<div class="input-group">
								    		<span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
								      		<input type="text" name="institute" class="form-control" required>
								      	</div>
						      		</div>
					      		</div>
					      	
						      	<div class="col-sm-12">
						      		<div class="form-group">
						    			<label form="Programme">Programme<p id="s" style="display:inline">*</p></label>
						      			<div class="input-group">
								    		<span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
								      		<input type="text" name="programme" class="form-control" required>
								      	</div>
						      		</div>
						      	</div>
		
			      		</fieldset>
		      		</div>

		      		<div class="form-group">
			      		<fieldset>
							<legend>Joining and Graduation Year<p id="s" style="display:inline">*</p></legend>
							<div class="col-sm-12">	
								<div class="row">
						      		<div class="form-inline">
										<div class="col-sm-5">			      		
								      		<div class="form-group">
								    			<label for="join">Joining Year<p id="s" style="display:inline">*</p></label>
								    			<div class="input-group">
								    				<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								      				<input type="month" class="form-control" name="join_year" id="join" required>
								      			</div>
								      		</div>
							      		</div>
							      		
							      		<div class="col-sm-5">
								      		<div class="form-group">
								    			<label for="graduation">Graduation Year<p id="s" style="display:inline">*</p></label>
								    			<div class="input-group">
								    				<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								      				<input type="month" class="form-control" id="graduation" name="grad_year" required>
								      			</div>
								      		</div>
							      		</div>
							      	</div>
							    </div>
			      			</div>
		      			</fieldset>
		      		</div>

		      		<div class="form-group">
			      		<fieldset>
			      			<legend>Student's Details:</legend>
			      			<div class="col-sm-12">
					      		<div class="form-group">
					    			<label for="enrollment">Student's Enrollment ID<p id="s" style="display:inline">*</p></label>
					    			<div class="input-group">
					    				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
					    				<input type="text" name="student_id" class="form-control" id="enrollment" placeholder="Enter student's enrollment id" required>
					      			</div>
					      		</div>

					      		<div class="row">
					      			<div class="col-sm-6">
							      		<div class="form-group">
							    			<label for="fname">Student's Firstname<p id="s" style="display:inline">*</p></label>
							    			<div class="input-group">
							    				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							      				<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter student's firstname" required>
							      			</div>
							      		</div>
							      	</div>

							      	<div class="col-sm-6">
							      		<div class="form-group">
							    			<label for="lname">Student's Lastname<p id="s" style="display:inline">*</p></label>
							    			<div class="input-group">
							    				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							    				<input type="text" class="form-control" id="lname" name="lname" placeholder="Enter student's lastname" required>
							      			</div>
							      		</div>
							      	</div>
							    </div>

							    <div class="form-group">
					    			<label for="enrollment">Student's Contact No<p id="s" style="display:inline">*</p></label>
					    			<div class="input-group">
					    				<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
					    				<input type="text" class="form-control" name="contact_no" id="Contact_no" placeholder="Enter student's contact no" onchange="phonenumber()" required>
					      			</div>
					      		</div>

				      			<div class="form-group">
				    				<label for="address">Address<p id="s" style="display:inline">*</p></label>
				    			

				    			<div class="row">
					    			<div class="col-xs-3">
					    				<input type="text" class="form-control" name="flat_no" id="b_no" placeholder="Flat No.">
					    			</div>
					    			<div class="col-xs-9">		
					    					<input type="text" class="form-control" name="building_name" id="b_name" placeholder="Building Name">
					    			</div>

					    			<div class="col-xs-3" style="padding-top: 2%;">
					    				<input type="text" class="form-control" name="street_no" id="s_no" placeholder="Street No.">
					    			</div>

					    			<div class="col-xs-9" style="padding-top: 2%;">
					    				<input type="text" class="form-control" id="s_name" name="street_name" placeholder="Street Name">
					    			</div>
					    
					    			<div class="col-xs-3" style="padding-top: 2%;">
					    				<input type="text" class="form-control" name="city" id="city" placeholder="City">
					    			</div>

					    			<div class="col-xs-4" style="padding-top: 2%;">
					    				<input type="text" class="form-control" name="p_code" id="p_code" placeholder="Pincode" onchange="pincode()" required>
					    			</div>

					    			<div class="col-xs-5" style="padding-top: 2%;">
					    				<input type="text" class="form-control" name="state" id="state" placeholder="State">
					    			</div>
				      			</div>
					      	</div>
			      		</fieldset>
			      	</div>

			      	<div class="form-group">
			      		<fieldset>
			      			<legend>Choose Username and Password</legend>
			      			<div class="col-sm-12">
					      		<div class="form-group">
					    			<label for="email">Username<p id="s" style="display:inline">*</p></label>
					    			<div class="input-group">
					    				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
					      				<input type="text" name="email" class="form-control" id="email" placeholder="Choose Username" required>
					      			</div>
					      		</div>

						      	<div class="row">
					      			<div class="col-sm-6">
							      		<div class="form-group">
							    			<label for="password">Password<p id="s" style="display:inline">*</p></label>
							    			<div class="input-group">
					    						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					      						<input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
					      					</div>
							      			
							      		</div>
							      	</div>

							      	<div class="col-sm-6">
										<div class="form-group">
							    			<label for="cpassword">Confirm Password<p id="s" style="display:inline">*</p></label>
							      			<div class="input-group">
					    						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					      						<input type="password" class="form-control" id="cpassword" placeholder="Confirm your password" onkeyup="checkPass()" required>
					      					</div>

							      		</div>
							      	</div>
						      	</div>
						    </div>
			      		</fieldset> 
			      		<fieldset>
			      		<legend></legend>
			      		<div class="col-xs-offset-2 col-xs-4">
							<div class="form group">
								<input type="reset" class="btn btn-reset" value="Reset" id="reset" style="width: 90%; background-color: #8bb6ba; color: black;">  
		                    </div>
		                </div>
		                <div class="col-xs-4">
							<div class="form group">
		                        <input type="submit" class="btn btn-submit" value="Submit" id="submit" style="width: 90%; background-color: #386772; color: white;">
		                    </div>
		                </div>
		                </fieldset>
		                <hr>
			      	</div>
		      	</form>
			</div>
			</fieldset>
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