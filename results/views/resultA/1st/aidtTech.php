<?php 
require_once('../../../conn/conn.php');
require_once('../../../controllers/class.marksheet.php');

	 
	$startRoll=$_POST['startRoll'];
	$endRoll=$_POST['endRoll'];
	
	$markSQL="SELECT si.id,si.roll,si.registrationNo,si.name,si.motherName,si.fatherName,t.technologyCode,t.technologyName,s.session,si.shift,sem.semester,ma.tc as ma_tc,ma.tf as ma_tf,ma.pc as ma_pc,chem.tc as chem_tc,chem.tf as chem_tf,chem.pc as chem_pc,chem.pf as chem_pf,ss.tc as ss_tc,ss.tf as ss_tf,pels.pc as pels_pc,pels.pf as pels_pf,amp.tc as amp_tc,amp.tf as amp_tf,amp.pc as amp_pc,amp.pf as amp_pf,ade.tc as ade_tc,ade.tf as ade_tf,ade.pc as ade_pc,ade.pf as ade_pf from studentinformation si LEFT JOIN technology t on t.technologyId=si.technologyId LEFT JOIN session s on s.sessionId=si.sessionId LEFT JOIN semester sem on sem.semesterId=si.semesterId LEFT JOIN `65911` ma on ma.roll=si.roll LEFT JOIN `65913` chem on chem.roll=si.roll LEFT JOIN `65811` ss on ss.roll=si.roll LEFT JOIN `65812` pels on pels.roll=si.roll LEFT JOIN `68711` amp on amp.roll=si.roll LEFT JOIN `68712` ade on ade.roll=si.roll WHERE si.roll BETWEEN $startRoll and $endRoll";

	$markResult=mysqli_query($conn,$markSQL);
	$count=$markResult->num_rows;	

	$ma_t=0;
	$chem_t=0;
	$ss_t=0;
	$pels_t=0;
	$amp_t=0;	
	$ade_t=0;
	


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
<script type="text/javascript">
</script>
<link rel="stylesheet" type="text/css" href="style.css">

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
	        <h3 class="printHeader">BANGLADESH TECHNICAL EDUCATION BOARD</h3>
	        <h3 class="printHeader">DIPLOMA IN ENGINEERING</h3> 
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
              <!-- <div class="form-group"> -->
                <label>Year of Examination : </label>
                <label>2019</label>
              <!-- </div> -->
              <br><span>(Held in December 2017-January 2018)</span>
             <h4 class="noPadding"><b>First Semester</b></h4>
            <h3 class="noPadding">Engineering Institute</h3>
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
          <table class="table text-center table-bordered table-striped">
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
	            	<td>65911</td>
	            	<td>Mathmatics-1</td>
	            	<td>200</td>
	            	<td>
	            		<?php 
	            			if($rowMark['ma_tc']<24 || $rowMark['ma_tf']<36 || $rowMark['ma_pc']<20){
	            				$m_o=0;
	            			}else{
	            			$m_o=(($rowMark['ma_tc'])+($rowMark['ma_tf'])+($rowMark['ma_pc']));
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
	            	<td>2</td>
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
	            	<td>3</td>
	            	<td>65811</td>
	            	<td>Social Science</td>
	            	<td>150</td>
	            	<td>
	            		<?php 

	            				if($rowMark['ss_tc']<24 || $rowMark['ss_tf']<36){
	            					$m_o=0;
	            				}else{
	            					$m_o=(($rowMark['ss_tc'])+($rowMark['ss_tf']));
	            				}
	            				
	            				echo $m_o;
	            			
	            		 ?>
	            	</td>
	            	<td>
	            		<?php 	            			
	            			countGL($m_o,$subjectMark=150);
	            		 ?>
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
	            	<td>4</td>
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
	            	<td>5</td>
	            	<td>68711</td>
	            	<td>Architectural Material&Product</td>
	            	<td>200</td>
	            	<td>
	            		<?php 
	            			if($rowMark['amp_tc']<24 || $rowMark['amp_tf']<36 || $rowMark['amp_pc']<10 || $rowMark['amp_pf']<10){
	            				$m_o=0;
	            			}else{
	            				$m_o=(($rowMark['amp_tc'])+($rowMark['amp_tf'])+($rowMark['amp_pc'])+($rowMark['amp_pf']));
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
	            	<td>68712</td>
	            	<td>Architecture Design&Drawing-1</td>
	            	<td>200</td>
	            	<td>
	            		<?php 
	            				if($rowMark['ade_tc']<8 || $rowMark['ade_tf']<12 || $rowMark['ade_pc']<30 || $rowMark['ade_pf']<30){
	            					$m_o=0;
	            				}else{
	            					$m_o=(($rowMark['ade_tc'])+($rowMark['ade_tf'])+($rowMark['ade_pc'])+($rowMark['ade_pf']));
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

	            	<td rowspan="7" class="bg-success" style="font-size: 16px;">
	            		<b>
	            			<?php 
	            				if(in_array('0.00',$cgpa)){
	            					echo "0.00";
	            				}else{
	            					$credits=['4','4','3','1','4','4'];
	            					$grandCgpa=[];
	            					foreach ($cgpa as $key => $value) {
	            						$grandCgpa[$key]=$value*$credits[$key];
	            					}
	            					$gpa=round((array_sum($grandCgpa)/20),2);
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
  			<hr class="signatureLine">
      		<label>Prepared by</label><br><br><br>    		
      	</div>
      	<div class="col-sm-4 pull-right text-center">
      		<hr class="signatureLine">
      		<label>Head of the Department</label><br><br><br>    		
      	</div>
      </div>      
      <div class="row">
      	<div class="col-sm-4 pull-left text-center">
      		<hr class="signatureLine">
      		<label>Vice Principal</label>      		
      	</div>
      	<div class="col-sm-4 pull-right text-center">      		
  			<hr class="signatureLine">
      		<label>Principal</label><br>
			<label>Engineering Institute</label><br>     		     		
  		</div>
      </div>


        <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-xs-12">
            <a href="../printL/aidtTech_first.php?roll=<?php echo $rowMark['roll'];?>" target="_blank" class="btn btn-success pull-right"><i class="fa fa-print"></i> P r i n t</a>          
          </div>
        </div>
  </section>



		<?php
			}
		}else{
		echo '<div class="col-md-5 col-md-offset-3">
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4 class="col-md-4"><i class="icon fa fa-ban"></i> Alert!</h4>
               NO RECORDS FOUND !
              </div>        
            </div>';
		}


	?>			
	
	

			
		
		
				

			
