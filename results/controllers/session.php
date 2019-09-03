<?php 
 $sessionResult=mysqli_query($conn,"select SES.* from usersubject US inner join subjectcontrol SC on US.subjectId=SC.subjectId and US.technologyId=SC.technologyId and US.sessionId=SC.sessionId and US.semesterId=SC.semesterId inner join session SES on SES.sessionId=US.sessionId WHERE US.userId=$userId GROUP BY SES.sessionId");

 ?>