<?php

	$conn = mysqli_connect("localhost", "root", "","tms");
	if($conn -> connect_error)
	{
		die("Connection failed: " . $conn -> connect_error);
	}
	
	$query_uni_id = "SELECT id FROM university WHERE email = 'charusat@gmail.com'";
	$result = $conn -> query($query_uni_id);
	$row = $result->fetch_assoc();
	$university_id = $row['id'];

	$query_transcripts = "SELECT students.first_name, students.last_name, transcript_request.flat_no, transcript_request.building_name, transcript_request.street_no, transcript_request.street_name, transcript_request.city, transcript_request.postal_code, transcript_request.state, date_of_request, transcript_request.university_id, university_approval_status, payment_status, marksheet, duplicate_marksheet, transcript, degree_certificate FROM transcript_request, students WHERE  transcript_request.university_id = '$university_id' AND transcript_request.student_id = students.id";

	$result = $conn->query($query_transcripts);

	

	$studentName = array();
	$deliveryAddress = array();
	$requestDate = array();
	$approvalFlag = array();
	$paymentFlag = array();
	$Transcripts = array();
	$Marksheets = array();
	$DuplicateMarksheets = array();
	$DegreeCertificates = array();
	$n = $result -> num_rows;

	for ($i=0; $i < $result->num_rows; $i++) { 
		# code...
		$row = $result->fetch_assoc();

		$studentName[$i] = $row['first_name'] . ' ' . $row['last_name'];
		$deliveryAddress[$i] = $row['flat_no'] . ', ' . $row['building_name'] . ', ' . $row['street_no'] . ', ' . $row['street_name'] . ', ' . $row['city'] . ', ' . $row['postal_code'] . ', ' . $row['state'] . '';
		$requestDate[$i] = $row['date_of_request'];
		$approvalFlag[$i] = $row['university_approval_status'];
		$paymentFlag[$i] = $row['payment_status'];
		$Transcripts[$i] = $row['transcript'];
		$Marksheets[$i] = $row['marksheet'];
		$DuplicateMarksheets[$i] = $row['duplicate_marksheet'];
		$DegreeCertificates[$i] = $row['degree_certificate'];
	}

	//echo $paymentFlag[0] . ' ' . $paymentFlag[1];
	//echo $DegreeCertificates[0];
	
?>



<!DOCTYPE html>
<html>
<head>
	<title>test</title>
		<link rel="stylesheet" href="../css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Poppins:400,500,600' rel='stylesheet' type='text/css'>
	<script type="text/javascript">
		function GenerateTable() {

			//var rows = 5;
			var rows = <?php echo json_encode($n); ?>;
			alert(rows);
			var goTable = document.getElementById('goTable');

			//fetching modal elements for each transcript details
			test = document.getElementById('test');
			
			if (rows != 0) {
				var h2 = document.createElement('h2');
				h2.setAttribute('align',"center");
				h2.setAttribute('style',"color:white;margin-bottom:3%");
				
				text = document.createTextNode('Pending Requests');
				h2.appendChild(text);
				goTable.appendChild(h2);

				var table = document.createElement('table');
				table.border = 2;
				table.align = "center";
				table.setAttribute('style', "border-color:#386772");
				table.setAttribute('style', "background-color: #e6efef");		
				//var studentName = "null"; //array here
				var studentName = JSON.parse('<?= json_encode($studentName) ?>')
				//var deliveryAddress = "null";  //array here
				var deliveryAddress = JSON.parse('<?= json_encode($deliveryAddress) ?>')
				var transcriptDetails = "null";  //array here (no of transcripts, degree certis, marksheets)
				//var requestDate ="null" //array of request dates of all requests by distinct students
				var requestDate = JSON.parse('<?= json_encode($requestDate); ?>')
				//var approvalFlag = [1,0,0,1,1];
				var approvalFlag = JSON.parse('<?= json_encode($approvalFlag);?>')
				//var paymentFlag = "null";
				var paymentFlag = JSON.parse('<?= json_encode($paymentFlag); ?>')

				var tr1 = document.createElement('tr');
				var th1 = document.createElement('th');
				var th2 = document.createElement('th');
				var th3 = document.createElement('th');
				var th4 = document.createElement('th');
				var th5 = document.createElement('th');

				th1.setAttribute('style',"width: 160px;height: 50px;margin-top:5px;margin-right:5px;padding-left:16px;margin-bottom:5px;color:white;background-color:#132f38");
				th2.setAttribute('style',"width: 160px;height: 50px;margin-top:5px;margin-right:5px;padding-left:16px;margin-bottom:5px;color:white;background-color:#132f38");
				th3.setAttribute('style',"width: 170px;height: 50px;margin-top:5px;margin-right:5px;padding-left:16px;margin-bottom:5px;color:white;background-color:#132f38");
				th4.setAttribute('style',"width: 160px;height: 50px;margin-top:5px;margin-right:5px;padding-left:10px;margin-bottom:5px;color:white;background-color:#132f38");
				th5.setAttribute('style',"width: 160px;height: 50px;margin-top:5px;margin-right:5px;padding-left:10px;margin-bottom:5px;color:white;background-color:#132f38");

				var h1name = document.createTextNode("Student Name");
				th1.appendChild(h1name);

				var h2name = document.createTextNode("Delivery Address");
				th2.appendChild(h2name);

				var h3name = document.createTextNode("Transcript Details");
				th3.appendChild(h3name);

				var h4name = document.createTextNode("Accept");
				th4.appendChild(h4name);

				var h5name = document.createTextNode("Reject");
				th5.appendChild(h5name);

				tr1.appendChild(th1);
		            tr1.appendChild(th2);
		            tr1.appendChild(th3);
		            tr1.appendChild(th4);
		            tr1.appendChild(th5);

		            table.appendChild(tr1);

				for (var i = 0; i < rows; i++) {
					var tr = document.createElement('tr');
					var td1 = document.createElement('td');
					var td2 = document.createElement('td');
					var td3 = document.createElement('td');
					var td4 = document.createElement('td');
					var td5 = document.createElement('td');

					var li = document.createElement('li');
					li.setAttribute('id',"myBtn " + i);
					li.setAttribute('style',"cursor: pointer");
					li.setAttribute('style',"list-style-type:none");
					li.setAttribute('onclick', "showModal(this.id, 'myModal1', 'c1')");

					/*<td><li id="myBtn" style="cursor: pointer;" onclick="showModal(this.id,'myModal1','c1')">CE Event 1 (CE001)</li></td>
		<p>Here</p>*/
					
					td1.setAttribute('style',"width: 160px;height: 50px;margin-top:5px;margin-right:5px;padding-left:16px;margin-bottom:5px;color:#193d2e");
					td2.setAttribute('style',"width: 160px;height: 50px;margin-top:5px;margin-right:5px;padding-left:16px;margin-bottom:5px;color:#193d2e");
					td3.setAttribute('style',"width: 170px;height: 50px;margin-top:5px;margin-right:5px;padding-left:16px;margin-bottom:5px;color:#193d2e");
					//td3.setAttribute();
					td4.setAttribute('style',"width: 160px;height: 50px;margin-top:5px;margin-right:5px;padding-left:10px;margin-bottom:5px;color:#193d2e");
					td5.setAttribute('style',"width: 160px;height: 50px;margin-top:5px;margin-right:5px;padding-left:10px;margin-bottom:5px;color:#193d2e");
					var studentNametxt = document.createTextNode("studentNametxt " + i);

					var studentNametxt = document.createTextNode(studentName[i]);
					//var deliveryAddresstxt = document.createTextNode("deliveryAddresstxt " + i);
					var deliveryAddresstxt = document.createTextNode(deliveryAddress[i]);
					var transcriptDetailstxt = document.createTextNode("transcriptDetailstxt " + i);
					//var transcriptDetails = document.createTextNode(transcriptDetails[i]);
					//text 1
		            var f = document.createElement("form");
		            f.setAttribute('method', "post");
		            f.setAttribute('action',"sss.php?id&status=1");
		            var confirm = document.createElement("input");
		            confirm.setAttribute('value',"APPROVE");
		            confirm.setAttribute('id',"book_id");
		            confirm.setAttribute('type',"submit");
		            confirm.setAttribute('class',"btn btn-primary");
		            confirm.setAttribute('style',"background-color: #1ea822;color: white;width: 100px;margin-top:5px;margin-right:5px;margin-left:16px;margin-bottom:16px;");
		            f.appendChild(confirm);


		            //text 2
		            var f0 = document.createElement("form");
		            f0.setAttribute('method', "post");
		            f0.setAttribute('action',"sss.php?id&status=0");
		            var deny = document.createElement("input");
		            deny.setAttribute('value',"DECLINE");
		            deny.setAttribute('id',"book_id");
		            deny.setAttribute('type',"submit");
		            deny.setAttribute('class',"btn btn-primary");
		            deny.setAttribute('style',"background-color: #386772;color: white;width: 100px;margin-top:5px;margin-right:5px;margin-left:16px;margin-bottom:16px;");
		            f0.appendChild(deny);

		            td1.appendChild(studentNametxt);
		            td2.appendChild(deliveryAddresstxt);
		            li.appendChild(transcriptDetailstxt);
		            td3.appendChild(li);

		            if(/*approvalFlag[i]==true*/ false){
		            	var paymentTxt = document.createTextNode('Payment Status : ');
		            	if(/*paymentFlag[i]==true*/ false){
		            		var statusTxt = document.createTextNode('Received');
		            	}
		            	else
		            	{
		            		var statusTxt = document.createTextNode('Pending');
		            	}
		            	td4.appendChild(paymentTxt);
		            	td5.appendChild(statusTxt);
		            }
		            else{
		            	td4.appendChild(f);
		            	td5.appendChild(f0);	
		            }
		            

		            tr.appendChild(td1);
		            tr.appendChild(td2);
		            tr.appendChild(td3);
		            tr.appendChild(td4);
		            tr.appendChild(td5);

		            table.appendChild(tr);

		            //test.innerHTML = studentName;
				}
				goTable.appendChild(table);				
			}
			else {
				var h2 = document.createElement('h2');
				h2.setAttribute('align',"center");
				text = document.createTextNode('No Pending Requests');
				h2.appendChild(text);
				goTable.appendChild(h2)
			}
		}

		function showModal(btnid,modalid,spanid) {
			// Get the modal
			var modal = document.getElementById(modalid);

			// Get the button that opens the modal
			var btn = document.getElementById(btnid);

			// Get the <span> element that closes the modal
			var span = document.getElementById(spanid);
			
			//parse arrays form php
			//var studentName = [1,2,3,4,5];
			var studentName = <?php echo json_encode($studentName); ?>;
			//var requestDate = [1,2,3,4,5];
			var requestDate = <?php echo json_encode($requestDate); ?>;
			//var Transcripts = [1,2,3,4,5];
			var Transcripts = <?php echo json_encode($Transcripts); ?>;
			//var Marksheets = [1,2,3,4,5];
			var Marksheets = <?php echo json_encode($Marksheets); ?>;
			//var DuplicateMarksheets = [1,2,3,4,5];
			var DuplicateMarksheets = <?php echo json_encode($DuplicateMarksheets); ?>;
			//var DegreeCertificates = [1,2,3,4,5];
			var DegreeCertificates = <?php echo json_encode($DegreeCertificates); ?>;

			//Update modal content everytime, using the name
			index = parseInt(btnid.substr(btnid.length-1));
			document.getElementById('studentName').innerHTML = String(studentName[index]);
			document.getElementById('requestDate').innerHTML = String(requestDate[index]);
			document.getElementById('Transcripts').innerHTML = String(Transcripts[index]);
			document.getElementById('Marksheets').innerHTML = String(Marksheets[index]);
			document.getElementById('DuplicateMarksheets').innerHTML = String(DuplicateMarksheets[index]);
			document.getElementById('DegreeCertificates').innerHTML = String(DegreeCertificates[index]);
			document.getElementById('total').innerHTML = String(parseInt(Transcripts[index])+parseInt(Marksheets[index])+parseInt(DegreeCertificates[index]));
			// When the user clicks on the button, open the modal
			{
			    modal.style.display = "block";
			}

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
			    modal.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			    if (event.target == modal) {
			        modal.style.display = "none";
			    }
		}
	}
	</script>
	<!--script src="js/modal.js"></script-->
		<style type="text/css">
			.modal {
		    display: none; /* Hidden by default */
		    position: fixed; /* Stay in place */
		    z-index: 1; /* Sit on top */
		    left: 0;
		    top: 0;
		    margin-top: 0;
		    width: 100%; /* Full width */
		    height: 100%; /* Full height */
		    overflow: auto; /* Enable scroll if needed */
		    /*background-color: rgb(0,0,0); /* Fallback color */
		    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		    text-align: left;
		}

		/* Modal Content/Box */
		.modal-content {
		    margin:12% auto; /* 15% from the top and centered */
		    width: 40%; /* Could be more or less, depending on screen size */
		    height: 50% auto;
		}
			.close {
			    color: #aaa;
			    float: right;
			    font-size: 28px;
			    font-weight: bold;
			}

			.close:hover,
			.close:focus {
			    color: black;
			    text-decoration: none;
			    cursor: pointer;
			}

		
			.top-right {
			  right: 5px;
			  position:absolute;
			  top:2px;
			}

			
		</style>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/owl.theme.css">
		<link rel="stylesheet" href="../css/owl.carousel.css">
</head>
<body onload="GenerateTable()" style="background: linear-gradient(#2e6060,#99bbcc,#2e6060);">

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

	<div id="goTable" style="padding-top: 50% auto;margin-top: 8%;margin-bottom: 8%;height: 100%;">
	</div>

	<div id="modals">
		<div id="myModal1" class="modal" style="overflow: scroll;">
		  <!-- Modal content -->
		  <div class="modal-content">
		    <article class="comic" style="width: 100%">
		    <div class="panel panel-modal" style="margin-top:3%;overflow: hidden;">
		        <p class="text top-right"><span class="close" class="text top-left" id="c1">&times;</span></p>
		        <div class="container">
			          <p>Student Name&nbsp;:&nbsp;</p>
			          <p id="studentName">Sample Name</p>
			          <hr>
			          
			          <p>Request Date&nbsp;:&nbsp;</p>
			          <p id="requestDate">Sample Date</p>
			          <hr>
			          
			          <p>No of Transcripts&nbsp;:&nbsp;</p>
			          <p id="Transcripts">#</p>
			          <hr>
			          
			          <p>No of Marksheets&nbsp;:&nbsp;</p>
			          <p id="Marksheets">#</p>
			          <hr>

			          <p>No of Duplicate Marksheets&nbsp;:&nbsp;</p>
			          <p id="DuplicateMarksheets">#</p>
			          <hr>
			          
			          <p>No of Degree Certificates&nbsp;:&nbsp;</p>
			          <p id="DegreeCertificates">#</p>
			          <hr>
			          
			          <p>No of Total&nbsp;:&nbsp;</p>
			          <p id="total">#</p>
			          <hr>
			          <br>
			          <p>Sample TextSample TextSample  Text</p>
			          <p>Sample Text</p><p>Sample Text</p><p>Sample Text</p><p>Sample Text</p><p>Sample Text</p><p>Sample Text</p><p>Sample Text</p>
			    </div>

		  	</div>
		  	</article>
		  </div>
		</div>
	</div>


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
</body>
</html>