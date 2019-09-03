<?php 
require_once('../../../conn/conn.php');
require_once('../../../controllers/class.marksheet.php');

	 
	$startRoll=$_POST['startRoll'];
	$endRoll=$_POST['endRoll'];

	$markSQL="SELECT si.id,si.roll,si.registrationNo,si.name,si.motherName,si.fatherName,t.technologyCode,t.technologyName,s.session,si.shift,sem.semester,


				itts.tc as itts_tc,itts.tf as itts_tf,
				ed.pc as ed_pc,ed.pf as ed_pf,
				be.tc as be_tc,be.tf as be_tf,be.pc as be_pc,be.pf as be_pf,
				ma1.tc as ma1_tc,ma1.tf as ma1_tf,ma1.pc as ma1_pc,
				ch.tc as ch_tc,ch.tf as ch_tf,ch.pc as ch_pc,ch.pf as ch_pf,	
				ban.tc as ban_tc,ban.tf as ban_tf,ban.pc as ban_pc,ban.pf as ban_pf,
				en1.tc as en1_tc,en1.tf as en1_tf
				
			from studentinformation si 
				LEFT JOIN technology t on t.technologyId=si.technologyId 
				LEFT JOIN session s on s.sessionId=si.sessionId 
				LEFT JOIN semester sem on sem.semesterId=si.semesterId 
				
				LEFT JOIN `4911` itts on itts.roll=si.roll 
				LEFT JOIN `1011` ed on ed.roll=si.roll 
				LEFT JOIN `6711` be on be.roll=si.roll 
				LEFT JOIN `5911` ma1 on ma1.roll=si.roll
				LEFT JOIN `1913` ch on ch.roll=si.roll 
				LEFT JOIN `5711` ban on ban.roll=si.roll
				LEFT JOIN `5712` en1 on en1.roll=si.roll 
				
				WHERE si.semesterId=1 && si.technologyId=10 && si.roll BETWEEN $startRoll and $endRoll";

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

<style type="text/css">
	 .vertical-line{
      width: 1px; /* Line width */
      sc1ckground-color: black; /* Line color */
      height: 100%; /* Override in-line if you want specific height. */
     
    }
</style>
<link rel="stylesheet" type="text/css" href="style.css">

		
<section class="box no-border" style="font-size:12px">
    	<div class="row text-center">
    		<h2 class="no-padding no-margin">Government of the People's Republic of Bangladesh</h2>
    		<h2 class="no-padding no-margin">Tabulation Sheet of Diploma-in-engineering</h2>
    	</div>
    	<div class="row">
    		<?php 
    			while($row=$getHeadingResult->fetch_array(MYSQLI_ASSOC)){    				
    		?>
			<div class="col-sm-8">
    			<div class="form-group no-padding">
    				<span>&nbsp;Technology Code and Name :</span>
    				<label><?=$row['technologyCode']." ".$row['technologyName'];?></label>
    			</div>
    			<div class="form-group no-padding">
    				<span>&nbsp;Institute Code and Name :</span>
    				<label>50328, Daffodil Polytechnic Institute.</label>
    			</div>
    		</div>
    		<div class="col-sm-2 col-sm-offset-2">
    				<span>Semester :</span>
    				<label>
    				<?=$row['semester']; ?>
    				</label><br>
<!--    				<span>Shift :</span>-->
<!--    				<label>-->
    					<?php //echo $marksheets->shiftTotext($sessionValue=$row['shift']); ?>
<!--    				</label><br>-->
    				<span>Examination Year:</span>
    				<label>2018</label>
    		</div>
    		<?php } ?>
    	</div>
      
<!-- <div class="row"> -->
<table class="table table-bordered text-center">
	<tr class="">
        <th colspan="2">Student's Identity</th>
        <th colspan="3">Introduction to Textile Science<br>(4911)</th>
        <th colspan="3">Engineering Drawing<br>(1011)</th>
        <th colspan="3">Basic Electricity<br>(6711)</th>
        <th colspan="3">Mathematics-1<br>(5911)</th>
        <th colspan="3">Chemistry<br>(1913)</th>
        <th colspan="3">Bangla<br>(5711)</th>
        <th colspan="3">English-1<br>(5712)</th>
		
		<th>Grade Point<br>Avg.</th>
		<th>Grade Letter<br>Avg.</th>
		<th>Remark</th>
		<style type="text/css">
			table.table-bordered{
			    border:2px solid #ddd;			    
			  }
			table.table-bordered > thead > tr > th{
			    border:2px solid #ddd;
			}
			table.table-bordered > tbody > tr > th{
			    border:2px solid #ddd;
			}
			table.table-bordered > tbody > tr > td{
			    border:2px solid #ddd;
			}
		</style>

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
        
		<td rowspan="4">GPA</td>
		<td rowspan="4">GLA</td>
		<td rowspan="4">pass<br>/fail</td>
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
		<td><?=$rowMark['roll']; ?></td>
		<td rowspan="4"><?=$rowMark['name']; ?></td>
		<td rowspan="2"><?=$rowMark['itts_tc']; ?></td>
		<td rowspan="2"><?=$rowMark['itts_tc']; ?></td>
		<td>
			<?php 
				if($rowMark['itts_tc']<12 || $rowMark['itts_tf']<48){
					$itts_o=0;
				}else{
					$itts_o=(($rowMark['itts_tc'])+($rowMark['itts_tf']));
				}	            				
				echo $itts_o;
			 ?>
		</td>
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
		<td rowspan="2"><?=$rowMark['be_tc']; ?></td>
		<td rowspan="2"><?=$rowMark['be_tf']; ?></td>
		<td>
		<?php 
			if($rowMark['be_tc']<12 || $rowMark['be_tf']<48 || $rowMark['be_pc']<10 || $rowMark['be_pf']<10){
    				$be_o=0;
    			}else{
    				$be_o=($rowMark['be_tc']+$rowMark['be_tf']+$rowMark['be_pc']+$rowMark['be_pf']);
    			}	            			
    			echo $be_o;
		 ?>
		</td>


		<td rowspan="2"><?=$rowMark['ma1_tc']; ?></td>
		<td rowspan="2"><?=$rowMark['ma1_tf']; ?></td>
		<td>
			<?php 
				if($rowMark['ma1_tc']<12 || $rowMark['ma1_tf']<48 || $rowMark['ma1_pc']<20 ){
    				$ma1_o=0;
    			}else{
    				$ma1_o=($rowMark['ma1_tc']+$rowMark['ma1_tf']+$rowMark['ma1_pc']);
    			}
    				            				
    			echo $ma1_o;
			 ?>
		</td>

		<td rowspan="2"><?=$rowMark['ch_tc']; ?></td>
		<td rowspan="2"><?=$rowMark['ch_tf']; ?></td>
		<td>
			<?php 
				if($rowMark['ch_tc']<12 || $rowMark['ch_tf']<48 || $rowMark['ch_pc']<10 ||
                    $rowMark['ch_pf']<10){
    				$ch_o=0;
    			}else{
    				$ch_o=(($rowMark['ch_tc'])+($rowMark['ch_tf'])+($rowMark['ch_pc'])+($rowMark['ch_pf']));
    			}	            				
    			echo $ch_o;


			 ?>
		</td>

		

        <td rowspan="2"><?=$rowMark['ban_tc']; ?></td>
        <td rowspan="2"><?=$rowMark['ban_tf']; ?></td>
		<td>
			<?php 
				if($rowMark['ban_tc']<8 || $rowMark['ban_tf']<32 || $rowMark['ban_pc']<10 || $rowMark['ban_pf']<10 ){
    				$ban_o=0;
    			}else{
    				$ban_o=($rowMark['ban_pc']+$rowMark['ban_pf']+$rowMark['ban_tc']+$rowMark['ban_tf']);
    			}
    				            				
    			echo $ban_o;
			 ?>
		</td>

          <td rowspan="2"><?=$rowMark['en1_tf']; ?></td>
          <td rowspan="2"><?=$rowMark['en1_tf']; ?></td>
          <td>
              <?php
              if( $rowMark['en1_tc']<8 || $rowMark['en1_tf']<32){
                  $en1_o=0;
              }else{
                  $en1_o=($rowMark['en1_tc']+$rowMark['en1_tf']);
              }

              echo $en1_o;
              ?>
          </td>


		<td rowspan="2">
			<?php 
				// $marksheets->toGradeLeter($gpa=$c_gpa);


			 ?>
			
		</td>
	</tr>
	<tr>
		<td rowspan="2"><?=$rowMark['registrationNo']; ?></td>		
		<td rowspan="2">
		<?php 
			countGP($itts_o,$subjectMark=150);
			array_push($cgpa,countGP($itts_o,$subjectMark=150));
			echo end($cgpa);
		 ?>
		</td>		
		<td rowspan="2">
		<?php 
			countGP($ed_o,$subjectMark=100);
	        array_push($cgpa,countGP($ed_o,$subjectMark=100));
	        echo end($cgpa);

		 ?>
		</td>		
		<td rowspan="2">
			<?php 
    			countGP($be_o,$subjectMark=200); 
	            array_push($cgpa,countGP($be_o,$subjectMark=200));
	            echo end($cgpa);
    		 ?>
		</td>		
		<td rowspan="2">
			<?php 
    			countGP($ma1_o,$subjectMark=200);
    		 	array_push($cgpa,countGP($ma1_o,$subjectMark=200));
    		 	echo end($cgpa);
    		 ?>
		</td>		
		<td rowspan="2">
		<?php 
			countGP($ch_o,$subjectMark=200);
    		array_push($cgpa,countGP($ch_o,$subjectMark=200));
    		echo end($cgpa);
		 ?>
		</td>		
		<td rowspan="2">
		<?php 
			countGP($ban_o,$subjectMark=150);
            array_push($cgpa,countGP($ban_o,$subjectMark=150));
            echo end($cgpa);
		 ?>
		</td>
        <td rowspan="2">
            <?php
            countGP($en1_o,$subjectMark=100);
            array_push($cgpa,countGP($en1_o,$subjectMark=100));
            echo end($cgpa);
            ?>
        </td>
    </tr>
	<tr>
		<td rowspan="2"></td>
		<td rowspan="2"></td>

        <td rowspan="2"><?=$rowMark['ed_pc']; ?></td>
        <td rowspan="2"><?=$rowMark['ed_pf']; ?></td>
		
		<td rowspan="2"><?=$rowMark['be_pc'] ?></td>
		<td rowspan="2"><?=$rowMark['be_pf'] ?></td>
		
		<td rowspan="2"><?=$rowMark['ma1_pc']; ?></td>
		<td rowspan="2"></td>

        <td rowspan="2"><?=$rowMark['ch_pc']; ?></td>
        <td rowspan="2"><?=$rowMark['ch_pf']; ?></td>

        <td rowspan="2"><?=$rowMark['ban_pc']; ?></td>
        <td rowspan="2"><?=$rowMark['ban_pf']; ?></td>

        <td rowspan="2"></td>
        <td rowspan="2"></td>
		
		<td rowspan="2">
			<b>
			<?php 
				$c_gpa=0.00;
				if(in_array('0.00',$cgpa)){
					echo "0.00";
				}else{
					$credits=['3','2','4','4','4','3','2'];
					$grandCgpa=[];
					foreach ($cgpa as $key => $value) {
						$grandCgpa[$key]=$value*$credits[$key];
					}
					$c_gpa=round((array_sum($grandCgpa)/22),2);
					echo $c_gpa;	            					
				}
			 ?>
			</b>
		</td>

		<td rowspan="2">
            <?=$marksheets->cgpaToglGenerator($gpa=$c_gpa); ?>
        </td>
		<td rowspan="2">
            <?php
            $counts = array_count_values($cgpa);
            $counts=$counts['0.00'];

            if($counts>2){
                echo "Fail";
            }elseif($counts>=1 && $counts<=2){
                echo "Referred";
            }else{
                echo "Pass";
            }

            ?>
        </td>

	</tr>
	<tr>
		<td class="session-text"><?=$rowMark['session']; ?></td>
		<td><?php countGL($itts_o,$subjectMark=150); ?></td>		
		<td><?php countGL($ed_o,$subjectMark=100); ?></td>		
		<td><?php countGL($be_o,$subjectMark=200); ?></td>		
		<td><?php countGL($ma1_o,$subjectMark=200); ?></td>		
		<td><?php countGL($ch_o,$subjectMark=200); ?></td>
		<td><?php countGL($ban_o,$subjectMark=150); ?></td>
		<td><?php countGL($en1_o,$subjectMark=100); ?></td>
	</tr>

		<?php
					}
				}else{
				echo '<div class="col-md-5 col-md-offset-3">
		              <div class="alert alert-danger alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4 class="col-md-4"><i class="icon fa fa-sc1n"></i> Alert!</h4>
		               NO RECORDS FOUND !
		              </div>        
		            </div>';
				}
		?>



  </table>




<div class="tabulation-buttom">
    <div class="col-xs-12  col-md-12">
        <p>ABBERVIATION: TC - THEORY CONTINUOUS, TF - THEORY FINAL, PC - PRACTICAL CONTINUOUS,PF -  PRACTICAL FINAL, LG - LETTER GRANDE, GP - GRADE</p><br><br>
        
    </div>
    

    <div class="col-xs-5 col-md-5">
        <div class="row">
            <div class="col-xs-6 col-md-5">
                <p>SIGNATURE & DATE OF TABULATOR</p>
            </div>
            <div class="col-xs-6 col-md-7">
                <p>01.........................................................</p>
                <p>02.........................................................</p>
                
            </div>
        </div>
    </div>
    <div class="col-xs-5 col-md-5">
        <div class="row">
            <div class="col-xs-6 col-md-7">
                <P>SIGNATURE & DATE OF COUNCILEOR OF EXAMINAION</P>
            </div>
            <div class="col-xs-6 col-md-5">
                <p>01.........................................................</p>
                <p>02.........................................................</p>
            </div>
        </div>
        
    </div>
    <div class="col-xs-2 col-md-2">
        <div class="row">
            <p></p>
            <p>.........................................................<br>
                PRINCIPAL
            </p>
        </div>
    </div>
</div>
        

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

		
	
	

			
		
		
				

			
