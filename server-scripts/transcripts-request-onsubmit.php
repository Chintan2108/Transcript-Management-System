<?php
	
	$student_id = $_GET['student_id'];
	session_start();
	$_SESSION['student_id'] = $student_id;
	
	echo $student_id;
?>