<?php 
	
	require_once('../../conn/conn.php');
	$stdId=$_POST['stdId'];

	$rollNo=$_POST['rollNo'];
	$registrationNo=$_POST['registrationNo'];
	$technology=$_POST['technology'];
	$semester=$_POST['semester'];
	$shift=$_POST['shift'];
	$session=$_POST['session'];
	$status=$_POST['status'];
	$name=$_POST['name'];
	$motherName=$_POST['motherName'];
	$fatherName=$_POST['fatherName'];
	
	$sql="update studentinformation set roll=$rollNo,registrationNo=$registrationNo,sessionId=$session,technologyId=$technology,shift=$shift,semesterId=$semester,name='$name',fatherName='$fatherName',motherName='$motherName',irregular=$status where id=$stdId";
	
	$result=mysqli_query($conn,$sql);

 ?>