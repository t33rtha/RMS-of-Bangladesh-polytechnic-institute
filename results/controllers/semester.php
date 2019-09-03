<?php 
	$semesterSql="select SEM.* from usersubject US inner join subjectcontrol SC on US.subjectId=SC.subjectId and US.technologyId=SC.technologyId and US.sessionId=SC.sessionId and US.semesterId=SC.semesterId inner join semester SEM on SEM.semesterId=US.semesterId WHERE US.userId=$userId GROUP BY SEM.semesterId";

	$semesterResult=mysqli_query($conn,$semesterSql);
	


 ?>
