<?php 

$subjectResult=mysqli_query($conn,"select subjectId,subjectCode,subjectName from subject");
$technologyResult=mysqli_query($conn,"select technologyId,technologyName,technologyCode from technology");
$sessionResult=mysqli_query($conn,"select sessionId,session from session");
$semesterResult=mysqli_query($conn,"select semesterId,semester from semester");

$userResult=mysqli_query($conn,"select userId,userEmail from users where type!='admin'")








 ?>