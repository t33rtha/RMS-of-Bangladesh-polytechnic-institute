<?php 
require_once('../../../conn/conn.php');
require_once('../../../controllers/class.marksheet.php');

	 
	$startRoll=$_POST['startRoll'];
	$endRoll=$_POST['endRoll'];
	
	$markSQL="SELECT si.id,si.roll,si.registrationNo,si.name,si.motherName,si.fatherName,t.technologyCode,t.technologyName,s.session,si.shift,sem.semester,ca.pc as ca_pc,ca.pf as ca_pf,phyedu.pc as phyedu_pc,phyedu.pf as phyedu_pf,ee.tc as ee_tc,ee.tf as ee_tf,ee.pc as ee_pc,ee.pf as ee_pf,ma.tc as ma_tc,ma.tf as ma_tf,ma.pc as ma_pc,phy.tc as phy_tc,phy.tf as phy_tf,phy.pc as phy_pc,phy.pf as phy_pf,en.tc as en_tc,en.tf as en_tf,ba.tc as ba_tc,ba.tf as ba_tf,ba.pc as ba_pc from studentinformation si LEFT JOIN technology t on t.technologyId=si.technologyId LEFT JOIN session s on s.sessionId=si.sessionId LEFT JOIN semester sem on sem.semesterId=si.semesterId LEFT JOIN `66611` ca on ca.roll=si.roll LEFT JOIN `65812` phyedu on phyedu.roll=si.roll LEFT JOIN `66712` ee on ee.roll=si.roll LEFT JOIN `65911` ma on ma.roll=si.roll LEFT JOIN `65912` phy on phy.roll=si.roll LEFT JOIN `65712` en on en.roll=si.roll LEFT JOIN `65711` ba on ba.roll=si.roll WHERE si.roll BETWEEN $startRoll and $endRoll";

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
    				<span>&nbsp;Institute Name :</span>
    				<label>Engineering Institute, Dhaka.</label>
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
	    <th colspan="3">Computer Application(66611)</th>
	    <th colspan="3">Physical Edu.&<br>Life Skills Dev.(65812)</th>
	    <th colspan="3">Electrical-Engineering<br>Fund(66712)</th>
	    <th colspan="3">Mathmatics-1(65911)</th>
	    <th colspan="3">Physics-1(65912)</th>
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
		<td>Session</td>		
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
		$m_o=0;
		$cgpa=array();
	?>	
    
      <tr>
		<td><?php echo $rowMark['roll']; ?></td>
		<td rowspan="4"><?php echo $rowMark['name']; ?></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td>
			<?php 
				if($rowMark['ca_pc']<20 || $rowMark['ca_pf']<20){
        				$ca_o=0;
        			}else{
        				$ca_o=(($rowMark['ca_pc'])+($rowMark['ca_pf']));
        			}	            			
        			echo $ca_o;
			 ?>
		</td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td>
		<?php 
			if($rowMark['phyedu_pc']<10 || $rowMark['phyedu_pf']<10){
	            				$phyedu_o=0;
	            			}else{
	            				$phyedu_o=(($rowMark['phyedu_pc'])+($rowMark['phyedu_pf']));
	            			}	            			
	            			echo $phyedu_o;
	            			
		 ?>
		</td>
		<td rowspan="2"><?php echo $rowMark['ee_tc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['ee_tf']; ?></td>
		<td>
		<?php 
			if($rowMark['ee_tc']<24 || $rowMark['ee_tf']<36 || $rowMark['ee_pc']<10 || $rowMark['ee_pf']<10){
    				$ee_o=0;
    			}else{
    				$ee_o=(($rowMark['ee_tc'])+($rowMark['ee_tf'])+($rowMark['ee_pc'])+($rowMark['ee_pf']));
    			}	            				
    			echo $ee_o;
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

		<td rowspan="2"><?php echo $rowMark['phy_tc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['phy_tf']; ?></td>
		<td>
			<?php 
			if($rowMark['phy_tc']<24 || $rowMark['phy_tf']<36 || $rowMark['phy_pc']<10 || $rowMark['phy_pf']<10){
    				$phy_o=0;
    			}else{
    				$phy_o=(($rowMark['phy_tc'])+($rowMark['phy_tf'])+($rowMark['phy_pc'])+($rowMark['phy_pf']));
    			}	            				
    			echo $phy_o;
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
			countGP($ca_o,$subjectMark=100); 
    		 array_push($cgpa,countGP($ca_o,$subjectMark=100));
    		 echo end($cgpa);
		 ?>
		</td>		
		<td rowspan="2">
		<?php 
			countGP($phyedu_o,$subjectMark=50);
    		 array_push($cgpa,countGP($phyedu_o,$subjectMark=50));
    		 echo end($cgpa);

		 ?>
		</td>		
		<td rowspan="2">
			<?php 
    			countGP($ee_o,$subjectMark=200);
    			array_push($cgpa,countGP($ee_o,$subjectMark=200));
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
			countGP($phy_o,$subjectMark=200); 
    		array_push($cgpa,countGP($phy_o,$subjectMark=200));
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
		<td rowspan="2"><?php echo $rowMark['ca_pc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['ca_pf']; ?></td>
		
		<td rowspan="2"><?php echo $rowMark['phyedu_pc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['phyedu_pf']; ?></td>

		<td rowspan="2"><?php echo $rowMark['ee_pc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['ee_pf']; ?></td>	
		
		<td rowspan="2"><?php echo $rowMark['ma_pc']; ?></td>
		<td rowspan="2"></td>
		
		<td rowspan="2"><?php echo $rowMark['phy_pc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['phy_pf']; ?></td>
		
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
					$credits=['2','1','4','4','4','2','4'];
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
		<td class="session-text"><?php echo $rowMark['session']; ?></td>		
		<td><?php countGL($ca_o,$subjectMark=100); ?></td>		
		<td><?php countGL($phyedu_o,$subjectMark=50); ?></td>		
		<td><?php countGL($ee_o,$subjectMark=200); ?></td>		
		<td><?php countGL($ma_o,$subjectMark=200); ?></td>		
		<td><?php countGL($phy_o,$subjectMark=200); ?></td>		
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



			
		
		
				

			
