<?php 

	/* Database connection start */
	require_once('../../conn/conn.php');

	
if(isset($_POST['category'])) {

	$dir_upload='../../upload/';
	$file=$_POST['file'];
	// $filetmp=$_POST['file'];

	$new_name=time().'-'.$file;

	$category=$_POST['category'];
	$itemValue=$_POST['itemValue'];
	$quantity=$_POST['quantity'];
	$location=$_POST['location'];
	$comment=$_POST['comment'];
	


 mysqli_query($conn,"insert into item(itemId,category,itemValue,quantity,location,comment,file) values('','$category','$itemValue','$quantity','$location','$comment','$new_name')");

move_uploaded_file($_FILES['fileName']['tmp_name'],$dir_upload.$new_name);


}


	

 ?>