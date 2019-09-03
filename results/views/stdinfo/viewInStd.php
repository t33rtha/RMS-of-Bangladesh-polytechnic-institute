<?php 
	
	require_once('../../conn/conn.php');
	include('../../controllers/queryHelper.php');

	$id=$_POST['id'];
	
	
	$sql="SELECT studentinformation.*,session.session,technology.technologyName,semester.semester from studentinformation INNER JOIN session on session.sessionId=studentinformation.sessionId INNER JOIN technology on technology.technologyId=studentinformation.technologyId INNER JOIN semester on semester.semesterId=studentinformation.semesterId WHERE studentinformation.id=$id";
	
	$result=mysqli_query($conn,$sql);

 	?>
 		<style type="text/css">
 			.bigCombo{
 				min-width: 260px; 
 				margin: 0 0 10px 0px;				
 			}	
 			.control-label{
 				min-width: 140px;

 			}
 		</style>

            <div class="row"> 
            	<div class="form-horizontal">             
              	<?php 
              		while ($row=$result->fetch_assoc()) {
              	 ?>
                	
			<div class="col-md-6">
                  <div class="form-group">
                  	<input type="hidden"  id="stdIdentity" class="form-control" value="<?php echo $row['id'];?>">

                      <label for="rollNo" class="col-sm-4 control-label">Roll No</label>
                      <div class="col-sm-6">
                        <input type="text" class="bigCombo form-control" name="rollNo" id="rollNo" value="<?php echo $row['roll'];?>">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="registrationNo" class="col-sm-4 control-label">Registration No</label>
                      <div class="col-sm-6">
                        <input type="text" class="bigCombo form-control" name="registrationNo" id="registrationNo" value="<?php echo $row['registrationNo'];?>">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="technology" class="col-sm-4 control-label">Technology</label>
                      <div  class="col-sm-6">
                        <select id="technology" class="bigCombo form-control">
                          <?php 
                            if($technologyResult->num_rows > 0){
                              while ( $technologyRow=$technologyResult->fetch_assoc()) {
                          ?>
                           <option <?php if($row['technologyName']==$technologyRow['technologyName']) echo "selected"; ?> value="<?php  echo $technologyRow['technologyId'] ?>">
                           <?php echo $technologyRow['technologyCode']." - ".$technologyRow['technologyName'];  ?>
                           </option>       
                          <?php  
                            }
                             }
                           ?>                      
                        </select>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="semester" class="col-sm-4 control-label">Semester</label>
                    <div  class="col-sm-6">
                         <select id="semester" class="bigCombo form-control">
                          <?php 
                            if($semesterResult->num_rows > 0){
                              while ( $semesterRow=$semesterResult->fetch_assoc()) {
                              ?>
                              <option <?php if($row['semesterId']==$semesterRow['semesterId']) echo "selected"; ?> value="<?php echo $semesterRow['semesterId'] ?>"><?php echo $semesterRow['semester'];?></option>       
                              <?php  
                                }
                                 }
                           ?>                          
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="shift" class="col-sm-4 control-label">Shift</label>
                    <div  class="col-sm-6">
                         <select id="shift" class="bigCombo form-control">
                            <option <?php if($row['shift']=='1') echo "selected"; ?>  value="1">1st Shift</option>                        
                            <option <?php if($row['shift']=='2') echo "selected"; ?> value="2">2nd Shift</option>                        
                        </select>
                    </div>
                  </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                    <label for="session" class="col-sm-4 control-label">Session</label>
                    <div  class="col-sm-6">
                         <select id="session" class="bigCombo form-control">
                          <?php 
                            if($sessionResult->num_rows > 0){
                              while ( $sessionRow=$sessionResult->fetch_assoc()) {
                            ?>  

                             <option <?php if($row['sessionId']==$sessionRow['sessionId']) echo "selected"; ?> value="<?php echo $sessionRow['sessionId'] ?>"><?php echo $sessionRow['session'];?></option>
                            <?php  
                              }
                               }
                             ?>
                        </select>
                    </div>
                </div>
              <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Name</label>
                <div class="col-sm-6">
                  <input type="text" class="bigCombo form-control" value="<?php echo $row['name'];?>" name="name" id="name" >
                </div>
              </div>
              <div class="form-group">
                <label for="motherName" class="col-sm-4 control-label">Mother's Name</label>
                <div class="col-sm-6">
                  <input type="text" class="bigCombo form-control" value="<?php echo $row['motherName'];?>" name="motherName" id="motherName">
                </div>
              </div>
              <div class="form-group">
                <label for="fatherName" class="col-sm-4 control-label">Father's Name</label>
                <div class="col-sm-6">
                  <input type="text" class="bigCombo form-control" value="<?php echo $row['fatherName'];?>" name="fatherName" id="fatherName">
                </div>
              </div>

                <div class="form-group">
                    <label for="studentStatus" class="col-sm-4 control-label">Not-Regular</label>
                    <!-- <div class="col-sm-4"> -->
                      <input type="checkbox" <?php if($row['irregular']==1) echo "checked"; ?> id="studentStatus" class="checkbox" value="1">
                    <!-- </div> -->
                </div>

            </div>

                
				<div class="btn-group col-sm-5 col-sm-offset-5">
		            <button class="col-sm-4  btn btn-primary" onclick="studentUpdate();">update</button>
		            <!-- <button type="button" onclick="studentDelete();" class="deleteItem btn btn-danger">
		            	<span class="glyphicon glyphicon-trash" aria-hidden="false"></span>
		            </button> -->
	            </div>

            <?php } ?>            
            </div>

            </div>