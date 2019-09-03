<?php 
require_once('../../conn/conn.php');
require_once('../../controllers/class.marksheet.php');

	 
	$getRoll=$_GET['roll'];
	
	$markSQL="SELECT si.id,si.roll,si.registrationNo,si.name,si.motherName,si.fatherName,t.technologyCode,t.technologyName,s.session,si.shift,sem.semester,

				aedc.tc as aedc_tc,aedc.tf as aedc_tf,aedc.pc as aedc_pc,aedc.pf as aedc_pf, 
				math3.tc as math3_tc,math3.tf as math3_tf,math3.pc as math3_pc,				
				pels.pc as pels_pc,pels.pf as pels_pf,
				mwshp.tc as mwshp_tc,mwshp.tf as mwshp_tf,mwshp.pc as mwshp_pc,mwshp.pf as mwshp_pf,	
				chem.tc as chem_tc,chem.tf as chem_tf,chem.pc as chem_pc,chem.pf as chem_pf,
				msprac2.tc as msprac2_tc,msprac2.tf as msprac2_tf,msprac2.pc as msprac2_pc,msprac2.pf as msprac2_pf,
				ca.pc as ca_pc,ca.pf as ca_pf

			from studentinformation si 
				LEFT JOIN technology t on t.technologyId=si.technologyId 
				LEFT JOIN session s on s.sessionId=si.sessionId 
				LEFT JOIN semester sem on sem.semesterId=si.semesterId 				
				LEFT JOIN `66831` aedc on aedc.roll=si.roll
				LEFT JOIN `65931` math3 on math3.roll=si.roll 				
				LEFT JOIN `65812` pels on pels.roll=si.roll
				LEFT JOIN `69231` mwshp on mwshp.roll=si.roll 
				LEFT JOIN `65913` chem on chem.roll=si.roll
				LEFT JOIN `67031` msprac2 on msprac2.roll=si.roll
				LEFT JOIN `66611` ca on ca.roll=si.roll 

				WHERE si.roll=$getRoll";

	$markResult=mysqli_query($conn,$markSQL);
	$count=$markResult->num_rows;	

	


	function countGP($sum,$subjectMark){

		$currentMarks=(100*$sum)/($subjectMark);
		
		if($currentMarks>=80 && $currentMarks<=100)  {
			$gp="4.00";
		}else if($currentMarks>=75 && $currentMarks<80) {
			$gp="3.75";
		}else if($currentMarks>=70 && $currentMarks<75) {
			$gp="3.50";
		}else if($currentMarks>=65 && $currentMarks<70) {
			$gp="3.25";
		}else if($currentMarks>=60 && $currentMarks<65) {
			$gp="3.00";
		}else if($currentMarks>=55 && $currentMarks<60) {
			$gp="2.75";
		}else if($currentMarks>=50 && $currentMarks<55) {
			$gp="2.50";
		}else if($currentMarks>=45 && $currentMarks<50) {
			$gp="2.25";
		}else if($currentMarks>=40 && $currentMarks<45) {
			$gp="2.00";
		}else{
			$gp="0.00";
		}

		return $gp;

	}

	function countGL($sum,$subjectMark){

		$currentMarks=(100*$sum)/($subjectMark);
		
		if($currentMarks>=80 && $currentMarks<=100)  {
			echo "A+";
		}else if($currentMarks>=75 && $currentMarks<80) {
			echo "A";
		}else if($currentMarks>=70 && $currentMarks<75) {
			echo "A-";
		}else if($currentMarks>=65 && $currentMarks<70) {
			echo "B+";
		}else if($currentMarks>=60 && $currentMarks<65) {
			echo "B";
		}else if($currentMarks>=55 && $currentMarks<60) {
			echo "B-";
		}else if($currentMarks>=50 && $currentMarks<55) {
			echo "C+";
		}else if($currentMarks>=45 && $currentMarks<50) {
			echo "C";
		}else if($currentMarks>=40 && $currentMarks<45) {
			echo "D";
		}else{
			echo "F";
		}

	}

 ?>

<!DOCTYPE html>
<head>
  <!-- header links -->
  <?php include('../../common/headerlinks.php'); ?>
</head>
<body onload="window.print()" class="hold-transition fixed skin-blue sidebar-mini">
<div class="wrapper">
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">       

  <!-- Main content -->
  <section class="content">     
          <div class="row">
            <!-- <form method="POST"> -->
                <div id="marksheet" class="marksheet">

	<?php 
		if(isset($count) && $count>0){

		while ($rowMark=$markResult->fetch_assoc()) {			
		$m_o=0;
		$cgpa=array();
	?>		
	<section class="invoice">
    
      <div class="row">        
        	<center><img src="img/bteb.png"></center>                   
      </div>
        
        <div class="row">
          <div class="col-sm-12">
            <center>
            <h2>BANGLADESH TECHNICAL EDUCATION BOARD</h2>
            <h2>DIPLOMA IN ENGINEERING</h2> 
            </center>            
          </div>
        </div>
        
        <div class="row">
          <div class="col-sm-3 col-xs-3">
            <div class="form-group">
              <span>Serial No : </span>
              <label>
              	<?php 
              		echo $marksheets->generateKey($rowMark['technologyCode'],$rowMark['id']);
              	 ?>
              </label>
            </div>
            <div class="form-group">
              <span>Technology : </span>
              <label><?php echo $rowMark['technologyName'];?></label>
            </div>
          </div>

          <div class="col-sm-5 col-xs-5">
            <center>
              <div class="form-group">
                <label>Year of Examination : </label>
                <label>2017</label>
              </div>
              <span>(Held December 2017-January 2018)</span>
             <h2>Third Semester</h2>
            <h4>Thakurgaon Polytechnic Institute</h4>
            </center>
            <center>
             <h3 style="font-family:Old English Text MT;" class="noPadding">ACADEMIC TRANSCRIPT</h3> 
            </center>
            
          </div>
          <div class="col-sm-4 col-xs-4">
               <table border="1" class="text-center pull-right" style="font-size:12px;">
            <tr> 
              <td>Equivalent Marks</td>
              <td>Letter<br>Grade</td>
              <td>Grade<br>point</td>
            </tr>
            <tr> 
              <td>(80 - 100)%</td>
              <td>A+</td>
              <td>4.00</td>
            </tr>
            <tr> 
              <td>(75 -79)%</td>
              <td>A</td>
              <td>3.75</td>
            </tr>
            <tr> 
              <td>(70 - 74)%</td>
              <td>A-</td>
              <td>3.50</td>
            </tr>
            <tr> 
              <td>(65 - 69)% </td>
              <td>B+</td>
              <td>3.25</td>
            </tr>
            <tr> 
              <td>(60 - 64)%</td>
              <td>B</td>
              <td>3.00</td>
            </tr>
            <tr> 
              <td>(55 - 59)%  </td>
              <td>B-</td>
              <td>2.75</td>
            </tr>
            <tr> 
              <td>(50 - 54)%  </td>
              <td>C+</td>
              <td>2.50</td>
            </tr>
            <tr> 
              <td>(45 - 49)%</td>
              <td>C</td>
              <td>2.25</td>
            </tr>
            <tr> 
              <td>(40 - 44)%</td>
              <td>D</td>
              <td>2.00</td>
            </tr>
            <tr> 
              <td>(00 - 39)% </td>
              <td>F</td>
              <td>0.0</td>
            </tr>
          </table>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-12"> 
            <div class="gpa_bottom_area"> 
              <div class="discipt"> 
                <p><span class="col-sm-2">Student's Name : </span><b><?php echo $rowMark['name'];?></b></p>
                <p><span class="col-sm-2">Fathers's Name : </span><b><?php echo $rowMark['fatherName'];?></b></p>
                <p><span class="col-sm-2">Mother's Name : </span><b><?php echo $rowMark['motherName'];?></b>
              </div>
            </div>
          </div>
        </div>

        <div class="row"> <!-- above main table -->
              <div class="col-sm-3 col-xs-3 col-md-3">
                <span>Board Roll :</span>
                <span><?php echo $rowMark['roll']; ?></span>
              </div>  
              <div class="col-sm-3 col-xs-3 col-md-3">
                <span>Registration No :</span>
                <span><?php echo $rowMark['registrationNo']; ?></span>
            </div>
              <div class="col-sm-3 col-xs-3 col-md-3">
                <span>Session :</span>
                <span> <?php echo $rowMark['session']; ?></span>
              </div> 
              <div class="col-sm-3 col-xs-3 col-md-3">
                <span>Shift :</span>
                <span> 
                	<?php echo $marksheets->shiftTotext($sessionValue=$rowMark['shift']);?>
                </span>
              </div>
        </div>


      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table text-center table-bordered table-striped" style="font-size: 12px">
            <thead>
            <tr>
              <th>S/N</th>
              <th>Subject Code</th>
              <th>Name of Subject</th>
              <th>Full Marks</th>
              <th>Marks Obtained</th>
              <th class="text-center">Grader Letter<br>(GL)</th>
              <th class="text-center">Grade Point<br>(GP)</th>
              <th class="text-center">Grade Point Average<br>(GPA)</th>
            </tr>
            </thead>
            <tbody>
            	 <tr>
	            	<td>1</td>
	            	<td>66831</td>
	            	<td>Advanced Electronic Devices&Circuits</td>
	            	<td>200</td>
	            	<td>
	            		<?php 
	            			if($rowMark['aedc_tc']<24 || $rowMark['aedc_tf']<36 || $rowMark['aedc_pc']<10 || $rowMark['aedc_pf']<10){
	            				$m_o=0;
	            			}else{
	            				$m_o=(($rowMark['aedc_tc'])+($rowMark['aedc_tf'])+($rowMark['aedc_pc'])+($rowMark['aedc_pf']));
	            			}	            				
	            			echo $m_o;
	            				
	            		 ?>
	            	</td>
	            	<td>
	            		<?php 
	            			countGL($m_o,$subjectMark=200);
	            		 ?>
	            	</td>
	            	<td>
	            		<?php 
	            			countGP($m_o,$subjectMark=200);
	            			array_push($cgpa,countGP($m_o,$subjectMark=200));
	            			echo end($cgpa);
	            		 ?>
	            	</td>	            	
	            </tr>
	            <tr>
	            	<td>2</td>
	            	<td>65931</td>
	            	<td>Mathmetics-3</td>
	            	<td>200</td>
	            	<td>
	            		<?php 

	            				if($rowMark['math3_tc']<24 || $rowMark['math3_tf']<36 || $rowMark['math3_pc']<20){
	            					$m_o=0;
	            				}else{
	            					$m_o=($rowMark['math3_tc']+$rowMark['math3_tf']+$rowMark['math3_pc']);
	            				}
	            				
	            				echo $m_o;
	            			
	            		 ?>
	            	</td>
	            	<td>
	            		<?php 	            			
	            			countGL($m_o,$subjectMark=200);
	            		 ?>
	            	</td>
	            	<td>
	            		<?php 
	            			countGP($m_o,$subjectMark=200);
	            			array_push($cgpa,countGP($m_o,$subjectMark=200));
	            			echo end($cgpa);
	            		 ?>
	            	</td>	            	
	            </tr>
	           
	            <tr>
	            	<td>3</td>
	            	<td>65812</td>
	            	<td>Physical Education&Life Skill dev.</td>
	            	<td>50</td>
	            	<td>
	            		<?php 
	            			if($rowMark['pels_pc']<10 || $rowMark['pels_pf']<10){
	            				$m_o=0;
	            			}else{
	            				$m_o=(($rowMark['pels_pc'])+($rowMark['pels_pf']));
	            			}	            			
	            			echo $m_o;
	            			
	            		 ?>
	            	</td>
	            	<td>
	            		<?php 
	            			countGL($m_o,$subjectMark=50);
	            		 ?>
	            	</td>
	            	<td>
	            		<?php 
	            			countGP($m_o,$subjectMark=50);
	            			array_push($cgpa,countGP($m_o,$subjectMark=50));
	            			echo end($cgpa);
	            		 ?>
	            	</td>	             	
	            </tr>
	            <tr>
	            	<td>4</td>
	            	<td>69231</td>
	            	<td>Mechatronics Workshop</td>
	            	<td>150</td>
	            	<td>
	            		<?php 
	            			if($rowMark['mwshp_tc']<8 || $rowMark['mwshp_tf']<12 || $rowMark['mwshp_pc']<20 || $rowMark['mwshp_pf']<20){
	            				$m_o=0;
	            			}else{
	            			$m_o=(($rowMark['mwshp_tc'])+($rowMark['mwshp_tf'])+($rowMark['mwshp_pc'])+($rowMark['mwshp_pf']));
	            			}	            			
	            			echo $m_o;
	            				
	            		 ?>
	            	</td>
	            	<td>
	            		<?php countGL($m_o,$subjectMark=150); ?>
	            	</td>
	            	<td>
	            		<?php
	            		 countGP($m_o,$subjectMark=150); 
	            		 array_push($cgpa,countGP($m_o,$subjectMark=150));
	            		 echo end($cgpa);

	            		 ?>
	            	</td>	            	
	            </tr>
	             <tr>
	            	<td>5</td>
	            	<td>65913</td>
	            	<td>Chemistry</td>
	            	<td>200</td>
	            	<td>
	            		<?php 
	            			if($rowMark['chem_tc']<24 || $rowMark['chem_tf']<36 || $rowMark['chem_pc']<10 || $rowMark['chem_pf']<10){
	            				$m_o=0;
	            			}else{
	            				$m_o=(($rowMark['chem_tc'])+($rowMark['chem_tf'])+($rowMark['chem_pc'])+($rowMark['chem_pf']));
	            			}	            				
	            			echo $m_o;
	            				
	            		 ?>
	            	</td>
	            	<td>
	            		<?php countGL($m_o,$subjectMark=200); ?>
	            	</td>
	            	<td>
	            		<?php
	            		 countGP($m_o,$subjectMark=200);
	            		 array_push($cgpa,countGP($m_o,$subjectMark=200));
	            		 echo end($cgpa);

	            		  ?>
	            	</td>	            	
	           </tr>
	            <tr>
	            	<td>6</td>
	            	<td>67031</td>
	            	<td>Machine Shop Practice-2</td>
	            	<td>150</td>
	            	<td>
	            		<?php 
	            			if($rowMark['msprac2_tc']<8 || $rowMark['msprac2_tf']<12 || $rowMark['msprac2_pc']<20 || $rowMark['msprac2_pf']<20){
	            				$m_o=0;
	            			}else{
	            				$m_o=(($rowMark['msprac2_tc'])+($rowMark['msprac2_tf'])+($rowMark['msprac2_pc'])+($rowMark['msprac2_pf']));
	            			}	            				
	            			echo $m_o;
	            				
	            		 ?>
	            	</td>
	            	<td>
	            		<?php countGL($m_o,$subjectMark=150); ?>
	            	</td>
	            	<td>
	            		<?php
	            		 countGP($m_o,$subjectMark=150);
	            		 array_push($cgpa,countGP($m_o,$subjectMark=150));
	            		 echo end($cgpa);

	            		  ?>
	            	</td>	            	
	            </tr>
	           <tr>
	            	<td>7</td>
	            	<td>66611</td>
	            	<td>Computer Application</td>
	            	<td>100</td>
	            	<td>
	            		<?php 
	            			if($rowMark['ca_pc']<20 || $rowMark['ca_pf']<20){
	            				$m_o=0;
	            			}else{
	            				$m_o=(($rowMark['ca_pc'])+($rowMark['ca_pf']));
	            			}	            			
	            			echo $m_o;
	            			
	            		 ?>
	            	</td>
	            	<td>
	            		<?php 
	            			countGL($m_o,$subjectMark=100);
	            		 ?>
	            	</td>
	            	<td>
	            		<?php 
	            			countGP($m_o,$subjectMark=100);
	            			array_push($cgpa,countGP($m_o,$subjectMark=100));
	            			echo end($cgpa);
	            		 ?>
	            	</td>	         	
	           	            	
	            	<td rowspan="6" class="bg-success" style="font-size: 16px;">
	            		<b>
	            			<?php 
	            				if(in_array('0.00',$cgpa)){
	            					echo "0.00";
	            				}else{
	            					$credits=['4','4','1','3','4','3','2'];
	            					$grandCgpa=[];
	            					foreach ($cgpa as $key => $value) {
	            						$grandCgpa[$key]=$value*$credits[$key];
	            					}

	            					$gpa=round((array_sum($grandCgpa)/21),2);
	            					echo $gpa;

	            					
	            				}

	            			 ?>
	            		</b>
	            	</td>
	            </tr>
            
            
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-sm-4 pull-left text-center">
        <br> <hr class="signatureLine">
          <label>Prepared by</label><br> 
        </div>
        <div class="col-sm-4 pull-right text-center">
          <br><hr class="signatureLine">
          <label>Head of the Department</label><br>
        </div>
      </div>      
      <div class="row">
        <div class="col-sm-4 pull-left text-center">
          <br><hr class="signatureLine">
          <label>Vice Principal</label>         
        </div>
        <div class="col-sm-4 pull-right text-center">         
        <br><hr class="signatureLine">
          <label>Principal</label><br>
      <label>Thakurgaon Polytechnic Institute,</label><br>
      <label>Thakurgaon</label>                   
      </div>
      </div>


        <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-xs-12">
            <a href="../print/aidtTech_third.php?roll=<?php echo $rowMark['roll'];?>" target="_blank" class="btn btn-success pull-right"><i class="fa fa-print"></i> P r i n t</a>          
          </div>
        </div>
  </section>


		<?php
			}
		}
	?>			
		 </div>
              <!-- </form> -->
  </div>



	  </section>
	  </div> <!-- end -->
  
 
</div> 

</body>
</html>
	

			
		
		
				

			
