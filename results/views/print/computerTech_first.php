<?php 
require_once('../../conn/conn.php');
require_once('../../controllers/class.marksheet.php');

	 
 $getRoll=$_GET['roll'];

	
	$markSQL="SELECT si.id,si.roll,si.registrationNo,si.name,si.motherName,si.fatherName,t.technologyCode,t.technologyName,s.session,si.shift,sem.semester,
				dba.pc as dba_pc,dba.pf as dba_pf,
				ane.tc as ane_tc,ane.tf as ane_tf,ane.pc as ane_pc,ane.pf as ane_pf,
				gd.pc as gd_pc,gd.pf as gd_pf,				
				ce.tc as ce_tc,ce.tf as ce_tf,ce.pc as ce_pc,
				ma2.tc as ma2_tc,ma2.tf as ma2_tf,ma2.pc as ma2_pc,
				phy2.tc as phy2_tc,phy2.tf as phy2_tf,phy2.pc as phy2_pc,phy2.pf as phy2_pf, 
				its1.pc as its1_pc,its1.pf as its1_pf 
			from studentinformation si 
				LEFT JOIN technology t on t.technologyId=si.technologyId 
				LEFT JOIN session s on s.sessionId=si.sessionId 
				LEFT JOIN semester sem on sem.semesterId=si.semesterId				
				LEFT JOIN `66621` dba on dba.roll=si.roll 
				LEFT JOIN `66823` ane on ane.roll=si.roll 
				LEFT JOIN `65921` ma2 on ma2.roll=si.roll 
				LEFT JOIN `65922` phy2 on phy2.roll=si.roll 
				LEFT JOIN `66622` its1 on its1.roll=si.roll
				LEFT JOIN `66623` gd on gd.roll=si.roll
				LEFT JOIN `65722` ce on ce.roll=si.roll 
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
<html>
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
              <span>Technology : </span>
              <label><?php echo $rowMark['technologyName'];?></label>
            </div>
          </div>

          <div class="col-sm-5 col-xs-5">
           <center>
              <div class="form-group">
                <label>Year of Examination : </label>
                <label>2018</label>
              </div>
              <span>(Held in June-July, 2018)</span>
             <h2>Second Semester</h2>
            <h4>Daffodil Polytechnic Institute</h4>
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
              	<div class="container">
	                <span>Board Roll :</span>
	                <span><?php echo $rowMark['roll']; ?></span>
	            </div>
            </div>  

            <div class="col-sm-3 col-xs-3 col-md-3">
                <span>Registration No :</span>
                <span><?php echo $rowMark['registrationNo']; ?></span>
            </div>

            <div class="col-sm-3 col-xs-3 col-md-3">
                <span>Session :</span>
                <span> <?php echo $rowMark['session']; ?></span>
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
	            	<td>66621</td>
	            	<td>Database Application</td>
	            	<td>100</td>
	            	<td>
	            		<?php 

	            				if($rowMark['dba_pc']<20 || $rowMark['dba_pf']<20){
	            					$m_o=0;
	            				}else{
	            					$m_o=(($rowMark['dba_pc']+$rowMark['dba_pf']));
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
	            	<td>2</td>
	            	<td>66823</td>
	            	<td>Analog Electronics</td>
	            	<td>200</td>
	            	<td>
	            		<?php 
	            			if($rowMark['ane_tc']<24 || $rowMark['ane_tf']<36 || $rowMark['ane_pc']<10 || $rowMark['ane_pf']<10){
	            				$m_o=0;
	            			}else{
	            				$m_o=(($rowMark['ane_tc'])+($rowMark['ane_tf'])+($rowMark['ane_pc'])+($rowMark['ane_pf']));
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
	            	<td>4</td>
	            	<td>65922</td>
	            	<td>Physics-2</td>
	            	<td>200</td>
	            	<td>
	            		<?php 
	            			if($rowMark['phy2_tc']<24 || $rowMark['phy2_tf']<36 || $rowMark['phy2_pc']<10 || $rowMark['phy2_pf']<10){
	            				$m_o=0;
	            			}else{
	            				$m_o=(($rowMark['phy2_tc'])+($rowMark['phy2_tf'])+($rowMark['phy2_pc'])+($rowMark['phy2_pf']));
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
	            	<td>66623</td>
	            	<td>Graphics Design-1</td>
	            	<td>100</td>
	            	<td>
	            		<?php 
	            				if($rowMark['gd_pc']<20 || $rowMark['gd_pf']<20){
	            					$m_o=0;
	            				}else{
	            					$m_o=(($rowMark['gd_pc'])+($rowMark['gd_pf']));
	            				}	            				
	            				echo $m_o;
	            		 ?>
	            	</td>
	            	<td>
	            		<?php countGL($m_o,$subjectMark=100); ?>
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
	            	<td>6</td>
	            	<td>65722</td>
	            	<td>Communicative English</td>
	            	<td>100</td>
	            	<td>
	            		<?php 
	            				if($rowMark['ce_tc']<8 || $rowMark['ce_tf']<12 || $rowMark['ce_pc']<20){
	            					$m_o=0;
	            				}else{
	            					$m_o=(($rowMark['ce_tc'])+($rowMark['ce_tf'])+($rowMark['ce_pc']));
	            				}	            				
	            				echo $m_o;
	            			
	            		 ?>	
	            	</td>
	            	<td>
	            		<?php countGL($m_o,$subjectMark=100); ?>
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
	            	<td>7</td>
		            	<td>66622</td>
		            	<td>IT Support System-1</td>
		            	<td>100</td>
		            	<td>
		            		<?php 
		            				if( $rowMark['its1_pc']<20 || $rowMark['its1_pf']<20){
		            					$m_o=0;
		            				}else{
		            					$m_o=(($rowMark['its1_pc']+$rowMark['its1_pf']));
		            				}	            				
		            				echo $m_o;
		            			
		            		 ?>	
		            	</td>
		            	<td>
		            		<?php countGL($m_o,$subjectMark=100); ?>
		            	</td>
		            	<td>
		            		<?php 
		            		countGP($m_o,$subjectMark=100);
		            		 array_push($cgpa,countGP($m_o,$subjectMark=100));
		            		 echo end($cgpa);
		            		?>
		            	</td>

	            	<td rowspan="7" class="bg-success" style="font-size: 16px;">
	            		<b>
	            			<?php 
	            				if(in_array('0.00',$cgpa)){
	            					echo "0.00";
	            				}else{
	            					$credits=['2','4','4','4','2','2','2'];
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
          	<br><hr class="signatureLine">
          	<label>Register</label><br>  
          	<label>Daffodil Polytechnic Institute</label>       
        </div>

        <div class="col-sm-4 pull-right text-center">         
        	<br><hr class="signatureLine">
          	<label>Principal</label><br>
	      	<label>Daffodil Polytechnic Institute,</label><br>
	      	<label>Daffodil</label>                   
	    </div>
    </div>


    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
         	<a href="../print/computerTech_second.php?roll=<?php echo $rowMark['roll'];?>" target="_blank" class="btn btn-success pull-right"><i class="fa fa-print"></i> P r i n t</a>          
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
  
    <!-- /.content -->
  
  <!-- /.content-wrapper -->
 
</div>
  

</body>
</html>	

			
		
		
				

			

	

			
		
		
				

			
