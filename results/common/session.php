<?php 
session_start();

if(!isset($_SESSION['userEmail'])){
	echo "<script>window.location = '../../'</script>";
}


 ?>

