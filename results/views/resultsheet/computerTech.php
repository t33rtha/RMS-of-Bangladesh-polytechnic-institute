<?php 
require_once('../../conn/conn.php');
require_once('../../controllers/class.marksheet.php');

	 
	$startRoll=$_POST['startRoll'];
	$endRoll=$_POST['endRoll'];
	
	$markSQL="SELECT si.id,si.roll,si.registrationNo,si.name,si.motherName,si.fatherName,t.technologyCode,t.technologyName,s.session,si.shift,sem.semester,ca.pc as ca_pc,ca.pf as ca_pf,it.pc as it_pc,it.pf as it_pf,ee.tc as ee_tc,ee.tf as ee_tf,ee.pc as ee_pc,ee.pf as ee_pf,ma.tc as ma_tc,ma.tf as ma_tf,ma.pc as ma_pc,phy.tc as phy_tc,phy.tf as phy_tf,phy.pc as phy_pc,phy.pf as phy_pf,en.tc as en_tc,en.tf as en_tf,ba.tc as ba_tc,ba.tf as ba_tf,ba.pc as ba_pc from studentinformation si LEFT JOIN technology t on t.technologyId=si.technologyId LEFT JOIN session s on s.sessionId=si.sessionId LEFT JOIN semester sem on sem.semesterId=si.semesterId LEFT JOIN `66611` ca on ca.roll=si.roll LEFT JOIN `66612` it on it.roll=si.roll LEFT JOIN `66712` ee on ee.roll=si.roll LEFT JOIN `65911` ma on ma.roll=si.roll LEFT JOIN `65912` phy on phy.roll=si.roll LEFT JOIN `65712` en on en.roll=si.roll LEFT JOIN `65711` ba on ba.roll=si.roll WHERE si.roll BETWEEN $startRoll and $endRoll";

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

		
<section class="invoice">
    	<div class="row text-center">
    		<h3 class="no-margin">Government of the people's Republic of  Bangladesh</h3>
    		<h3 class="no-margin">Tabulation Sheet for Diploma in Engineering</h3>
    	</div><br>
    	<div class="row">
    		<div class="col-sm-8">
    			<div class="form-group">
    				<span>Technology Code and Name :</span>
    				<label>66 Computer Technology</label>
    			</div>
    			<div class="form-group">
    				<span>Institute Code and Name :</span>
    				<label>12053 Thakurgaon Polytechnic Institute, Thakurgaon.</label>
    			</div>
    		</div>
    		<div class="col-sm-4 text-right">
    			<div class="form-group no-padding">
    				<span>Semester :</span>
    				<label>1<sup>st</sup></label>
    			</div>
    			<div class="form-group no-padding">
    				<span>Shift :</span>
    				<label>1<sup>st</sup></label>
    			</div>
    			<div class="form-group no-padding">
    				<span>Year of passing :</span>
    				<label>2017</label>
    			</div>
    		</div>
    	</div>

<table class="table table-bordered text-center" style="font-size: 13px;">
	<tr class="">
		<th rowspan="2">SL</th>
		<th>Subject</th>
	    <th>66611</th>
	    <th>66612</th>
	    <th>66712</th>
	    <th>65911</th>
	    <th>65912</th>
	    <th>65712</th>
	    <th>65711</th>
		<th rowspan="2">GP</th>
		<th rowspan="2">GL</th>
	</tr>
	<tr>		
		<td>Board Roll</td>
		<td>Grade<br>Point</td>
		<td>Grade<br>Point</td>
		<td>Grade<br>Point</td>
		<td>Grade<br>Point</td>
		<td>Grade<br>Point</td>
		<td>Grade<br>Point</td>
		<td>Grade<br>Point</td>
	</tr>
	 <!-- LOOP start from here -->
    <?php 
		if(isset($count) && $count>0){
			$i=1;

		while ($rowMark=$markResult->fetch_assoc()) {			
		$cgpa=array();
	?>	

	<tr>
		<td>
			<?php echo $i; ?>
		</td>
		<td>
			<?php echo $rowMark['roll']; ?>
		</td>		
		<td>
			<?php 
				if($rowMark['ca_pc']<20 || $rowMark['ca_pf']<20){
        				$ca_o=0;
        			}else{
        				$ca_o=(($rowMark['ca_pc'])+($rowMark['ca_pf']));
        			}	

    			countGP($ca_o,$subjectMark=100); 
    		 array_push($cgpa,countGP($ca_o,$subjectMark=100));
    		 echo end($cgpa);  				
			 ?>
		</td>
		<td>
			<?php 
				if($rowMark['it_pc']<20 || $rowMark['it_pf']<20){
    				$it_o=0;
    			}else{
    				$it_o=(($rowMark['it_pc'])+($rowMark['it_pf']));
    			}
    			 countGP($it_o,$subjectMark=100);
    		 array_push($cgpa,countGP($it_o,$subjectMark=100));
    		 echo end($cgpa);            			

			 ?>
		</td>
		
		<td>
			<?php 
				if($rowMark['ee_tc']<24 || $rowMark['ee_tf']<36 || $rowMark['ee_pc']<10 || $rowMark['ee_pf']<10){
    				$ee_o=0;
    			}else{
    				$ee_o=(($rowMark['ee_tc'])+($rowMark['ee_tf'])+($rowMark['ee_pc'])+($rowMark['ee_pf']));
    			}	

    			countGP($ee_o,$subjectMark=200);
    			array_push($cgpa,countGP($ee_o,$subjectMark=200));
    			echo end($cgpa);  				            				


			 ?>
		</td>
		<td>
			<?php 
				if($rowMark['ma_tc']<24 || $rowMark['ma_tf']<36 || $rowMark['ma_pc']<20){
    				$ma_o=0;
    			}else{
    			$ma_o=(($rowMark['ma_tc'])+($rowMark['ma_tf'])+($rowMark['ma_pc']));
    			}	 

    			countGP($ma_o,$subjectMark=200); 
	    		 array_push($cgpa,countGP($ma_o,$subjectMark=200));
	    		 echo end($cgpa);


			 ?>
		</td>
		<td>
			<?php 
				if($rowMark['phy_tc']<24 || $rowMark['phy_tf']<36 || $rowMark['phy_pc']<10 || $rowMark['phy_pf']<10){
    				$phy_o=0;
    			}else{
    				$phy_o=(($rowMark['phy_tc'])+($rowMark['phy_tf'])+($rowMark['phy_pc'])+($rowMark['phy_pf']));
    			}	   

    			  countGP($phy_o,$subjectMark=200); 
    		array_push($cgpa,countGP($phy_o,$subjectMark=200));
    		echo end($cgpa);       				


			 ?>
		</td>
		<td>
			<?php 
				if($rowMark['en_tc']<16 || $rowMark['en_tf']<24){
    					$en_o=0;
    				}else{
    					$en_o=(($rowMark['en_tc'])+($rowMark['en_tf']));
    				}	            			

    				countGP($en_o,$subjectMark=100);
    		 array_push($cgpa,countGP($en_o,$subjectMark=100));
    		 echo end($cgpa);		


			 ?>
		</td>
		<td>
			<?php 

				if($rowMark['ba_tc']<24 || $rowMark['ba_tf']<36 || $rowMark['ba_pc']<20){
    					$ba_o=0;
    				}else{
    					$ba_o=(($rowMark['ba_tc'])+($rowMark['ba_tf'])+($rowMark['ba_pc']));
    				}	            			

    				countGP($ba_o,$subjectMark=200);
    		 array_push($cgpa,countGP($ba_o,$subjectMark=200));
    		 echo end($cgpa);	


			 ?>
		</td>
		<td>
			<b>
			<?php 
				if(in_array('0.00',$cgpa)){
					$c_gpa="0.00";
				}else{
					$credits=['2','2','4','4','4','2','4'];
					$grandCgpa=[];
					foreach ($cgpa as $key => $value) {
						$grandCgpa[$key]=$value*$credits[$key];
					}
					$c_gpa=round((array_sum($grandCgpa)/21),2);
				}
				echo $c_gpa;
			 ?>
		</td>
		<td>
			<?php echo $marksheets->cgpaToglGenerator($c_gpa); ?>
		</td>		
	</tr>
	<?php $i++;
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

