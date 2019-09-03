<?php 
	$technologySql="select t.* from usersubject US inner join subjectcontrol SC on US.subjectId=SC.subjectId and US.technologyId=SC.technologyId and US.sessionId=SC.sessionId and US.semesterId=SC.semesterId inner join technology t on t.technologyId=US.technologyId WHERE US.userId=$userId GROUP BY t.technologyId";
	$technologyResult=mysqli_query($conn,$technologySql);
	



 ?>
