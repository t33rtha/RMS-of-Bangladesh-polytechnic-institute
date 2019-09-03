<?php 
	require_once('../../conn/conn.php');

		if(isset($_POST['id'])){
			$id=$_POST['id']; 

		   $sql2="select file from item where itemId='$id'";
	       $fname=mysqli_query($conn,$sql2);
	       $row=$fname->fetch_row();
	       

	       //sending to trash
	       copy("../../upload/".$row[0],"../../trash/".$row[0]);
		   unlink("../../upload/".$row[0]);


	        $sql="delete from item where itemId='$id'";
	        $delete=mysqli_query($conn,$sql);

		  



		}
		

       

      

 ?>