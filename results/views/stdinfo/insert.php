<?php 
	
	require_once('../../conn/conn.php');

	$rollNo=$_POST['rollNo'];
	$registrationNo=$_POST['registrationNo'];
	$technology=$_POST['technology'];
	$semester=$_POST['semester'];
	$shift=$_POST['shift'];
	$session=$_POST['session'];
	$name=$_POST['name'];
	$motherName=$_POST['motherName'];
	$fatherName=$_POST['fatherName'];
	$status=$_POST['status'];
	
	$sql="insert into studentinformation(roll,registrationNo,sessionId,technologyId,shift,semesterId,name,fatherName,motherName,irregular) values ($rollNo,$registrationNo,$session,$technology,$shift,$semester,'$name','$fatherName','$motherName',$status)";
	
	$result=mysqli_query($conn,$sql);

 ?>