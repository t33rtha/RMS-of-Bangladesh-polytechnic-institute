<?php 
require_once('../../../conn/conn.php');
require_once('../../../controllers/class.marksheet.php');

	 
	$startRoll=$_POST['startRoll'];
	$endRoll=$_POST['endRoll'];
	
	$markSQL="SELECT si.id,si.roll,si.registrationNo,si.name,si.motherName,si.fatherName,t.technologyCode,t.technologyName,s.session,si.shift,sem.semester,fe.tc as fe_tc,fe.tf as fe_tf,fe.pc as fe_pc,fe.pf as fe_pf,ed.pc as ed_pc,ed.pf as ed_pf,ba.tc as ba_tc,ba.tf as ba_tf,ba.pc as ba_pc,en.tc as en_tc,en.tf as en_tf,bw.pc as bw_pc,bw.pf as bw_pf,ma.tc as ma_tc,ma.tf as ma_tf,ma.pc as ma_pc,chem.tc as chem_tc,chem.tf as chem_tf,chem.pc as chem_pc,chem.pf as chem_pf from studentinformation si LEFT JOIN technology t on t.technologyId=si.technologyId LEFT JOIN session s on s.sessionId=si.sessionId LEFT JOIN semester sem on sem.semesterId=si.semesterId LEFT JOIN `61011` ed on ed.roll=si.roll LEFT JOIN `67011` bw on bw.roll=si.roll LEFT JOIN `66911` fe on fe.roll=si.roll LEFT JOIN `65911` ma on ma.roll=si.roll LEFT JOIN `65913` chem on chem.roll=si.roll LEFT JOIN `65712` en on en.roll=si.roll LEFT JOIN `65711` ba on ba.roll=si.roll WHERE si.roll BETWEEN $startRoll and $endRoll";

	$getHeadingSQL="select std.shift,semester.semester,tech.technologyName,tech.technologyCode,session.session from studentinformation std inner join semester on std.semesterId=semester.semesterId inner join technology tech on tech.technologyId=std.technologyId inner join session on std.sessionId=session.sessionId where roll=$startRoll limit 1";
	$getHeadingResult=mysqli_query($conn,$getHeadingSQL);

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
<script type="text/javascript">
</script>
<style type="text/css">
	 .vertical-line{
      width: 1px; /* Line width */
      background-color: black; /* Line color */
      height: 100%; /* Override in-line if you want specific height. */
     
    }
</style>
<link rel="stylesheet" type="text/css" href="style.css">

		
<section class="box no-border" style="font-size:12px">
    	<div class="row text-center">
    		<h2 class="no-padding no-margin">Government of the People's Republic of Bangladesh</h2>
    		<h2 class="no-padding no-margin">Tabulation Sheet of Diploma-in-Engineering</h2>
    	</div>
    	<div class="row">
    		<?php 
    			while($row=$getHeadingResult->fetch_array(MYSQLI_ASSOC)){    				
    		?>
			<div class="col-sm-8">
    			<div class="form-group no-padding">
    				<span>&nbsp;Technology Code and Name :</span>
    				<label><?php echo $row['technologyCode']." ".$row['technologyName'];?></label>
    			</div>
    			<div class="form-group no-padding">
    				<span>&nbsp;Institute Code and Name :</span>
    				<label>12053 Thakurgaon Polytechnic Institute, Thakurgaon.</label>
    			</div>
    		</div>
    		<div class="col-sm-2 col-sm-offset-2">
    				<span>Semester :</span>
    				<label>
    				<?php echo $row['semester']; ?>
    				</label><br>
    				<span>Shift :</span>
    				<label>
    					<?php echo $marksheets->shiftTotext($sessionValue=$row['shift']); ?>
    				</label><br>
    				<span>Examination Year:</span>
    				<label>2017</label>
    		</div>
    		<?php } ?>
    	</div>
      
<!-- <div class="row"> -->
<table class="table table-bordered text-center">
	<tr class="">
		<th colspan="2">Student's Identity</th>
	    <th colspan="3">Engineering Drawing(61011)</th>
	    <th colspan="3">Basic Workshop Practice(67011)</th>
	    <th colspan="3">Food Engineering Fundamentals(66911)</th>
	    <th colspan="3">Mathmatics-1<br>(65911)</th>
	    <th colspan="3">Chemistry<br>(65913)</th>
	    <th colspan="3">English<br>(65712)</th>
	    <th colspan="3">Bangla<br>(65711)</th>
		<th>Total &<br>GL,GP</th>
	</tr>
	<tr>
		<td>Roll</td>
		<td class="std-name" rowspan="4">Student's Name</td>
		<td rowspan="2">TC</td>
		<td rowspan="2">TF</td>
		<td>Total</td>
		<td rowspan="2">TC</td>
		<td rowspan="2">TF</td>
		<td>Total</td>
		<td rowspan="2">TC</td>
		<td rowspan="2">TF</td>
		<td>Total</td>
		<td rowspan="2">TC</td>
		<td rowspan="2">TF</td>
		<td>Total</td>
		<td rowspan="2">TC</td>
		<td rowspan="2">TF</td>
		<td>Total</td>
		<td rowspan="2">TC</td>
		<td rowspan="2">TF</td>		
		<td>Total</td>
		<td rowspan="2">TC</td>
		<td rowspan="2">TF</td>		
		<td>Total</td>
		<td rowspan="2">GLA</td>
	</tr>
	<tr>
		<td rowspan="2">Regi</td>		
		<td rowspan="2">GP</td>		
		<td rowspan="2">GP</td>		
		<td rowspan="2">GP</td>		
		<td rowspan="2">GP</td>		
		<td rowspan="2">GP</td>		
		<td rowspan="2">GP</td>			
		<td rowspan="2">GP</td>			
	</tr>
	<tr>
		<td rowspan="2">PC</td>
		<td rowspan="2">PF</td>
		
		<td rowspan="2">PC</td>
		<td rowspan="2">PF</td>
		
		<td rowspan="2">PC</td>
		<td rowspan="2">PF</td>
		
		<td rowspan="2">PC</td>
		<td rowspan="2">PF</td>
		
		<td rowspan="2">PC</td>
		<td rowspan="2">PF</td>
		
		<td rowspan="2">PC</td>
		<td rowspan="2">PF</td>	

		<td rowspan="2">PC</td>
		<td rowspan="2">PF</td>		
		
		<td rowspan="2">GPA</td>
	</tr>
	<tr>
		<td class="session-text">Session</td>		
		<td>GL</td>		
		<td>GL</td>		
		<td>GL</td>		
		<td>GL</td>		
		<td>GL</td>		
		<td>GL</td>		
		<td>GL</td>		
	</tr>
    
   <!-- LOOP start from here -->
    <?php 
		if(isset($count) && $count>0){

		while ($rowMark=$markResult->fetch_assoc()) {			
		// $m_o=0;
		$cgpa=array();
	?>	
    
      <tr>
		<td><?php echo $rowMark['roll']; ?></td>
		<td rowspan="4"><?php echo $rowMark['name']; ?></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td>
			<?php 
				if($rowMark['ed_pc']<20 || $rowMark['ed_pf']<20){
    					$ed_o=0;
    				}else{
    					$ed_o=(($rowMark['ed_pc'])+($rowMark['ed_pf']));
    				}    				
    			echo $ed_o;
			 ?>
		</td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td>
		<?php 
			if($rowMark['bw_pc']<20 || $rowMark['bw_pf']<20){
    				$bw_o=0;
    			}else{
    				$bw_o=(($rowMark['bw_pc'])+($rowMark['bw_pf']));
    			}	            			
    			echo $bw_o;
		 ?>
		</td>
		<td rowspan="2"><?php echo $rowMark['fe_tc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['fe_tf']; ?></td>
		<td>
		<?php 
			if($rowMark['fe_tc']<16 || $rowMark['fe_tf']<24 || $rowMark['fe_pc']<10 || $rowMark['fe_pf']<10){
	            				$fe_o=0;
	            			}else{
	            				$fe_o=(($rowMark['fe_tc'])+($rowMark['fe_tf'])+($rowMark['fe_pc'])+($rowMark['fe_pf']));
	            			}
	            				            				
	            			echo $fe_o;
		 ?>
		</td>
		<td rowspan="2"><?php echo $rowMark['ma_tc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['ma_tf']; ?></td>
		<td>
		<?php 
			if($rowMark['ma_tc']<24 || $rowMark['ma_tf']<36 || $rowMark['ma_pc']<20){
    				$ma_o=0;
    			}else{
    			$ma_o=(($rowMark['ma_tc'])+($rowMark['ma_tf'])+($rowMark['ma_pc']));
    			}	            			
    			echo $ma_o;

		 ?>
		</td>

		<td rowspan="2"><?php echo $rowMark['chem_tc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['chem_tf']; ?></td>
		<td>
			<?php 
			if($rowMark['chem_tc']<24 || $rowMark['chem_tf']<36 || $rowMark['chem_pc']<10 || $rowMark['chem_pf']<10){
    				$chem_o=0;
    			}else{
    				$chem_o=(($rowMark['chem_tc'])+($rowMark['chem_tf'])+($rowMark['chem_pc'])+($rowMark['chem_pf']));
    			}	            				
    			echo $chem_o;
			 ?>
		</td>

		<td rowspan="2"><?php echo $rowMark['en_tc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['en_tf']; ?></td>		
		<td>
			<?php 
				if($rowMark['en_tc']<16 || $rowMark['en_tf']<24){
    					$en_o=0;
    				}else{
    					$en_o=(($rowMark['en_tc'])+($rowMark['en_tf']));
    				}	            				
    				echo $en_o;
			 ?>
		</td>
		<td rowspan="2"><?php echo $rowMark['ba_tc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['ba_tf']; ?></td>		
		<td>
			<?php 
				if($rowMark['ba_tc']<24 || $rowMark['ba_tf']<36 || $rowMark['ba_pc']<20){
    					$ba_o=0;
    				}else{
    					$ba_o=(($rowMark['ba_tc'])+($rowMark['ba_tf'])+($rowMark['ba_pc']));
    				}	            				
    				echo $ba_o;
			 ?>
		</td>
		<td rowspan="2">
			<?php 
				// $marksheets->toGradeLeter($gpa=$c_gpa);
			 ?>
			
		</td>
	</tr>
	<tr>
		<td rowspan="2"><?php echo $rowMark['registrationNo']; ?></td>		
		<td rowspan="2">
		<?php 
			countGP($ed_o,$subjectMark=100); 
    		 array_push($cgpa,countGP($ed_o,$subjectMark=100));
    		 echo end($cgpa);
		 ?>
		</td>		
		<td rowspan="2">
		<?php 
			countGP($bw_o,$subjectMark=100);
    		 array_push($cgpa,countGP($bw_o,$subjectMark=100));
    		 echo end($cgpa);

		 ?>
		</td>		
		<td rowspan="2">
			<?php 
    			countGP($fe_o,$subjectMark=150);
    			array_push($cgpa,countGP($fe_o,$subjectMark=150));
    			echo end($cgpa);
    		 ?>
		</td>		
		<td rowspan="2">
			<?php 
    			countGP($ma_o,$subjectMark=200); 
	    		 array_push($cgpa,countGP($ma_o,$subjectMark=200));
	    		 echo end($cgpa);
    		 ?>
		</td>		
		<td rowspan="2">
		<?php 
			countGP($chem_o,$subjectMark=200); 
    		array_push($cgpa,countGP($chem_o,$subjectMark=200));
    		echo end($cgpa);
		 ?>
		</td>		
		<td rowspan="2">
		<?php 
			countGP($en_o,$subjectMark=100);
    		 array_push($cgpa,countGP($en_o,$subjectMark=100));
    		 echo end($cgpa);
		 ?>
		</td>	
		<td rowspan="2">
		<?php 
			countGP($ba_o,$subjectMark=200);
    		 array_push($cgpa,countGP($ba_o,$subjectMark=200));
    		 echo end($cgpa);
		 ?>
		</td>		
	</tr>
	<tr>                              <!-- PC,pF area -->
		<td rowspan="2"><?php echo $rowMark['ed_pc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['ed_pf']; ?></td>
		
		<td rowspan="2"><?php echo $rowMark['bw_pc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['bw_pf']; ?></td>

		<td rowspan="2"><?php echo $rowMark['fe_pc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['fe_pf']; ?></td>	
		
		<td rowspan="2"><?php echo $rowMark['ma_pc']; ?></td>
		<td rowspan="2"></td>
		
		<td rowspan="2"><?php echo $rowMark['chem_pc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['chem_pf']; ?></td>
		
		<td rowspan="2"></td>
		<td rowspan="2"></td>

		<td rowspan="2"><?php echo $rowMark['ba_pc']; ?></td>
		<td rowspan="2"></td>		
		
		<td rowspan="2">
			<b>
			<?php 
				if(in_array('0.00',$cgpa)){
					echo "0.00";
				}else{
					$credits=['2','2','3','4','4','2','4'];
					$grandCgpa=[];
					foreach ($cgpa as $key => $value) {
						$grandCgpa[$key]=$value*$credits[$key];
					}
					$c_gpa=round((array_sum($grandCgpa)/21),2);
					echo $c_gpa;	            					
				}
			 ?>
			</b>
		</td>
	</tr>
	<tr>
		<td><?php echo $rowMark['session']; ?></td>		
		<td><?php countGL($ed_o,$subjectMark=100); ?></td>		
		<td><?php countGL($bw_o,$subjectMark=100); ?></td>		
		<td><?php countGL($fe_o,$subjectMark=150); ?></td>		
		<td><?php countGL($ma_o,$subjectMark=200); ?></td>		
		<td><?php countGL($chem_o,$subjectMark=200); ?></td>		
		<td><?php countGL($en_o,$subjectMark=100); ?></td>		
		<td><?php countGL($ba_o,$subjectMark=200); ?></td>		
	</tr>

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



  </table>

  <table style="width:100%;margin-top: 70px;">
	<tr>
		<td>
			<span class="overlineTxt">Tabulator</span>
		</td>
		<td>
			<span class="overlineTxt">Comparer</span>
		</td>
		<td>
			<span class="overlineTxt"> Head of the Department</span>
		</td>
		<td>
			<span class="overlineTxt">Vice-Principal</span>
		</td>
		<td>
			<span class="overlineTxt">Principal</span>
		</td>
	</tr>
</table>
  <!-- </div> end of row -->
     
        

        <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-xs-12">
          
            <button class="btn btn-success pull-right" onclick="printTabulation();">P r i n t </button>         
          </div>
        </div>
  </section>

  <script type="text/javascript">
  	function printTabulation(){
  		window.print();
  	}
  </script>


	

			
		
		
				

			
