<?php 
require_once('../../../conn/conn.php');
require_once('../../../controllers/class.marksheet.php');

	 
	$startRoll=$_POST['startRoll'];
	$endRoll=$_POST['endRoll'];
	
	$markSQL="SELECT si.id,si.roll,si.registrationNo,si.name,si.motherName,si.fatherName,t.technologyCode,t.technologyName,s.session,si.shift,sem.semester,
				add2.tc as add2_tc,add2.tf as add2_tf,add2.pc as add2_pc,add2.pf as add2_pf,
				en.tc as en_tc,en.tf as en_tf,
				eef.tc as eef_tc,eef.tf as eef_tf,eef.pc as eef_pc,eef.pf as eef_pf,
				ma2.tc as ma2_tc,ma2.tf as ma2_tf,ma2.pc as ma2_pc,								
				phy.tc as phy_tc,phy.tf as phy_tf,phy.pc as phy_pc,phy.pf as phy_pf,				
				ba.tc as ba_tc,ba.tf as ba_tf,ba.pc as ba_pc
			from studentinformation si 
				LEFT JOIN technology t on t.technologyId=si.technologyId 
				LEFT JOIN session s on s.sessionId=si.sessionId 
				LEFT JOIN semester sem on sem.semesterId=si.semesterId 
				LEFT JOIN `68721` add2 on add2.roll=si.roll 
				LEFT JOIN `65712` en on en.roll=si.roll 
				LEFT JOIN `66712` eef on eef.roll=si.roll 
				LEFT JOIN `65921` ma2 on ma2.roll=si.roll 
				LEFT JOIN `65912` phy on phy.roll=si.roll 
				LEFT JOIN `65711` ba on ba.roll=si.roll
				WHERE si.roll BETWEEN $startRoll and $endRoll";

	$markResult=mysqli_query($conn,$markSQL);
	$count=$markResult->num_rows;	

	// $ca_t=0;
	// $bw_t=0;
	// $fe_t=0;
	// $ma_t=0;
	// $chem_t=0;
	// $en_t=0+;
	// $ba_t=0;


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
              <span>(Held in June-July, 2017)</span>
             <h2>Second Semester</h2>
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
	            	<td>68721</td>
	            	<td>Architechtural Design & Drawing-2</td>
	            	<td>200</td>
	            	<td>
	            		<?php 

	            				if($rowMark['add2_tc']<16 || $rowMark['add2_tf']<24 || $rowMark['add2_pc']<10 || $rowMark['add2_pf']<10){
	            					$m_o=0;
	            				}else{
	            					$m_o=(($rowMark['add2_tc']+$rowMark['add2_tf']+$rowMark['add2_pc']+$rowMark['add2_pf']));
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
	            	<td>65712</td>
	            	<td>English</td>
	            	<td>100</td>
	            	<td>
	            		<?php 
	            			if($rowMark['en_tc']<16 || $rowMark['en_tf']<24){
	            				$m_o=0;
	            			}else{
	            				$m_o=(($rowMark['en_tc'])+($rowMark['en_tf']));
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
	            </tr>
	            <tr>
	            	<td>3</td>
	            	<td>66712</td>
	            	<td>Electrical Engineering Fundamentals</td>
	            	<td>200</td>
	            	<td>
	            		<?php 
	            			if($rowMark['eef_tc']<24 || $rowMark['eef_tf']<36 || $rowMark['eef_pc']<10 || $rowMark['eef_pf']<10){
	            				$m_o=0;
	            			}else{
	            				$m_o=(($rowMark['eef_tc'])+($rowMark['eef_tf'])+($rowMark['eef_pc'])+($rowMark['eef_pf']));
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
	            	<td>4</td>
	            	<td>65921</td>
	            	<td>Mathmatics-2</td>
	            	<td>200</td>
	            	<td>
	            		<?php 
	            			if($rowMark['ma2_tc']<24 || $rowMark['ma2_tf']<36 || $rowMark['ma2_pc']<20){
	            				$m_o=0;
	            			}else{
	            			$m_o=(($rowMark['ma2_tc'])+($rowMark['ma2_tf'])+($rowMark['ma2_pc']));
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
	            	<td>5</td>
	            	<td>65912</td>
	            	<td>Physics-1</td>
	            	<td>200</td>
	            	<td>
	            		<?php 
	            			if($rowMark['phy_tc']<24 || $rowMark['phy_tf']<36 || $rowMark['phy_pc']<10 || $rowMark['phy_pf']<10){
	            				$m_o=0;
	            			}else{
	            				$m_o=(($rowMark['phy_tc'])+($rowMark['phy_tf'])+($rowMark['phy_pc'])+($rowMark['phy_pf']));
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
	            	<td>65711</td>
	            	<td>Bangla</td>
	            	<td>200</td>
	            	<td>
	            		<?php 
	            				if($rowMark['ba_tc']<24 || $rowMark['ba_tf']<36 || $rowMark['ba_pc']<10){
	            					$m_o=0;
	            				}else{
	            					$m_o=(($rowMark['ba_tc'])+($rowMark['ba_tf'])+($rowMark['ba_pc']));
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
	           
	            	
	            	<td rowspan="6" class="bg-success" style="font-size: 16px;">
	            		<b>
	            			<?php 
	            				if(in_array('0.00',$cgpa)){
	            					echo "0.00";
	            				}else{
	            					$credits=['4','2','4','4','4','4'];
	            					$grandCgpa=[];
	            					foreach ($cgpa as $key => $value) {
	            						$grandCgpa[$key]=$value*$credits[$key];
	            					}

	            					$gpa=round((array_sum($grandCgpa)/22),2);
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
            <a href="../print/aidtTech_second.php?roll=<?php echo $rowMark['roll'];?>" target="_blank" class="btn btn-success pull-right"><i class="fa fa-print"></i> P r i n t</a>          
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
	
	

			
		
		
				

			
