<?php 
	
	require_once('../../conn/conn.php');
	$stdId=$_POST['stdId'];

	
	$sql="delete from studentinformation where id=$stdId";
	
	$result=mysqli_query($conn,$sql);

 ?>


 