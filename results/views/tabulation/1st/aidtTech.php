<?php 
require_once('../../../conn/conn.php');
require_once('../../../controllers/class.marksheet.php');

	 
	$startRoll=$_POST['startRoll'];
	$endRoll=$_POST['endRoll'];
	
	$markSQL="SELECT si.id,si.roll,si.registrationNo,si.name,si.motherName,si.fatherName,t.technologyCode,t.technologyName,s.session,si.shift,sem.semester,ma.tc as ma_tc,ma.tf as ma_tf,ma.pc as ma_pc,chem.tc as chem_tc,chem.tf as chem_tf,chem.pc as chem_pc,chem.pf as chem_pf,ss.tc as ss_tc,ss.tf as ss_tf,pels.pc as pels_pc,pels.pf as pels_pf,amp.tc as amp_tc,amp.tf as amp_tf,amp.pc as amp_pc,amp.pf as amp_pf,ade.tc as ade_tc,ade.tf as ade_tf,ade.pc as ade_pc,ade.pf as ade_pf from studentinformation si LEFT JOIN technology t on t.technologyId=si.technologyId LEFT JOIN session s on s.sessionId=si.sessionId LEFT JOIN semester sem on sem.semesterId=si.semesterId LEFT JOIN `65911` ma on ma.roll=si.roll LEFT JOIN `65913` chem on chem.roll=si.roll LEFT JOIN `65811` ss on ss.roll=si.roll LEFT JOIN `65812` pels on pels.roll=si.roll LEFT JOIN `68711` amp on amp.roll=si.roll LEFT JOIN `68712` ade on ade.roll=si.roll WHERE si.roll BETWEEN $startRoll and $endRoll";

	$getHeadingSQL="select std.shift,semester.semester,tech.technologyName,tech.technologyCode,session.session from studentinformation std inner join semester on std.semesterId=semester.semesterId inner join technology tech on tech.technologyId=std.technologyId inner join session on std.sessionId=session.sessionId where roll=$startRoll limit 1";
	$getHeadingResult=mysqli_query($conn,$getHeadingSQL);

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
	    <th colspan="3">Mathmatics-1<br>(65911)</th>
	    <th colspan="3">Chemistry<br>(65913)</th>
	    <th colspan="3">Social Science<br>(65811)</th>
	    <th colspan="3">Physical Education&amp;<br>Life Skill dev.(65812)</th>
	    <th colspan="3">Architectural Material&amp;<br>Product(68711)</th>
	    <th colspan="3">Architecture <br>Design&amp;Drawing-1(68712)</th>
		<th>GPA</th>
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
		<!-- <td rowspan="2">GLA</td> -->
	</tr>
	<tr>
		<td rowspan="2">Regi</td>		
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
		
		<!-- <td rowspan="2">GPA</td> -->
	</tr>
	<tr>
		<td>Session</td>		
		<td>GL</td>		
		<td>GL</td>		
		<td>GL</td>		
		<td>GL</td>		
		<td>GL</td>		
		<td>GL</td>		
	</tr>



    
    				<!-- loop start from here -->
    <?php 
		if(isset($count) && $count>0){

		while ($rowMark=$markResult->fetch_assoc()) {			
		$m_o=0;
		$cgpa=array();
	?>	
    
      <tr>
		<td><?php echo $rowMark['roll']; ?></td>
		<td rowspan="4"><?php echo $rowMark['name']; ?></td>
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
		<td rowspan="2"><?php echo $rowMark['ss_tc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['ss_tf']; ?></td>
		<td>
		<?php 
			if($rowMark['ss_tc']<24 || $rowMark['ss_tf']<36){
					$ss_o=0;
				}else{
					$ss_o=(($rowMark['ss_tc'])+($rowMark['ss_tf']));
				}				
				echo $ss_o;
		 ?>
		</td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td>
			<?php 
				if($rowMark['pels_pc']<10 || $rowMark['pels_pf']<10){
        				$pels_o=0;
        			}else{
        				$pels_o=(($rowMark['pels_pc'])+($rowMark['pels_pf']));
        			}	            			
        			echo $pels_o;


			 ?>
		</td>

		<td rowspan="2"><?php echo $rowMark['amp_tc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['amp_tf']; ?></td>
		<td>
			<?php 
			if($rowMark['amp_tc']<24 || $rowMark['amp_tf']<36 || $rowMark['amp_pc']<10 || $rowMark['amp_pf']<10){
        				$amp_o=0;
        			}else{
        				$amp_o=(($rowMark['amp_tc'])+($rowMark['amp_tf'])+($rowMark['amp_pc'])+($rowMark['amp_pf']));
        			}
        				            				
        			echo $amp_o;
			 ?>
		</td>

		<td rowspan="2"><?php echo $rowMark['ade_tc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['ade_tf']; ?></td>		
		<td>
			<?php 
				if($rowMark['ade_tc']<8 || $rowMark['ade_tf']<12 || $rowMark['ade_pc']<30 || $rowMark['ade_pf']<30){
    					$ade_o=0;
    				}else{
    					$ade_o=(($rowMark['ade_tc'])+($rowMark['ade_tf'])+($rowMark['ade_pc'])+($rowMark['ade_pf']));
    				}	            				
    				echo $ade_o;
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
    			countGP($ss_o,$subjectMark=150);
    			array_push($cgpa,countGP($ss_o,$subjectMark=150));
    			echo end($cgpa);
    		 ?>
		</td>		
		<td rowspan="2">
			<?php 
    			countGP($pels_o,$subjectMark=50);
    			array_push($cgpa,countGP($pels_o,$subjectMark=50));
    			echo end($cgpa);
    		 ?>
		</td>		
		<td rowspan="2">
		<?php 
			countGP($amp_o,$subjectMark=200); 
    		array_push($cgpa,countGP($amp_o,$subjectMark=200));
    		echo end($cgpa);
		 ?>
		</td>		
		<td rowspan="2">
		<?php 
			countGP($ade_o,$subjectMark=200);
    		 array_push($cgpa,countGP($ade_o,$subjectMark=200));
    		 echo end($cgpa);
		 ?>
		</td>			
	</tr>
	<tr>
		<td rowspan="2"><?php echo $rowMark['ma_pc']; ?></td>
		<td rowspan="2"></td>
		
		<td rowspan="2"><?php echo $rowMark['chem_pc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['chem_pf']; ?></td>
		
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		
		<td rowspan="2"><?php echo $rowMark['pels_pc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['pels_pf']; ?></td>
		
		<td rowspan="2"><?php echo $rowMark['amp_pc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['amp_pf']; ?></td>
		
		<td rowspan="2"><?php echo $rowMark['ade_pc']; ?></td>
		<td rowspan="2"><?php echo $rowMark['ade_pf']; ?></td>		
		
		<td rowspan="2">
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
					$c_gpa=round((array_sum($grandCgpa)/20),2);
					echo $c_gpa;	            					
				}
			 ?>
			</b>
		</td>
	</tr>
	<tr>
		<td class="session-text"><?php echo $rowMark['session']; ?></td>		
		<td><?php countGL($ma_o,$subjectMark=200); ?></td>		
		<td><?php countGL($chem_o,$subjectMark=200); ?></td>		
		<td><?php countGL($ss_o,$subjectMark=150); ?></td>		
		<td><?php countGL($pels_o,$subjectMark=50); ?></td>		
		<td><?php countGL($amp_o,$subjectMark=200); ?></td>		
		<td><?php countGL($ade_o,$subjectMark=200); ?></td>		
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

     
        

        <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-xs-12">
          <!-- <a href="../print/aidtTech.php?roll=<?php //echo $rowMark['roll'];?>" target="_blank" class="btn btn-success pull-right"><i class="fa fa-print"></i> P r i n t</a>  -->
            <button class="btn btn-success pull-right" onclick="printTabulation();">P r i n t </button>         
          </div>
        </div>
  </section>

  <script type="text/javascript">
  	function printTabulation(){
  		window.print();
  	}
  </script>

		
	
	

			
		
		
				

			
