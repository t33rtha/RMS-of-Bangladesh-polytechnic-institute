<?php 
	
	require_once('../../conn/conn.php');

	$arrayId=$_POST['ids'];

	foreach ($arrayId as $id) {
		$result=mysqli_query($conn,"UPDATE studentinformation SET semesterId=semesterId-1 where id=$id");
	}

	
	

 ?>