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
	
	$sql="insert into studentinfo values('','$rollNo','$registrationNo','$session','$technology','$shift','$semester','$name','$fatherName','$motherName')";
	
	$result=mysqli_query($conn,$sql);










 ?>