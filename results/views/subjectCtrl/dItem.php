<?php 
	require_once('../../conn/conn.php');

		if(isset($_POST['id'])){
			$id=$_POST['id']; 

	        $sql="delete from subjectcontrol where subjectControlId=$id";
	        $delete=mysqli_query($conn,$sql);

		}    
		
 ?>