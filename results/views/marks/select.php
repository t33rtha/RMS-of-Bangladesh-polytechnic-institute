<?php 
require_once('../../conn/conn.php');

	 
	$technology=$_POST['technology'];
	$semester=$_POST['semester'];
	$shift=$_POST['shift'];
	$subject=$_POST['subject'];
	$session=$_POST['session'];


	$subjectCodeSql=mysqli_query($conn,"select subjectCode from subject where subjectId='$subject'");
	$subjectCode=$subjectCodeSql->fetch_row();


	$count=mysqli_query($conn,"SELECT id FROM studentinformation SI INNER join subjectcontrol SC on SC.technologyId=SI.technologyId and SC.sessionId=SI.sessionId and SC.semesterId=SI.semesterId WHERE SI.technologyId=$technology and SI.semesterId=$semester and SI.sessionId=$session and SI.shift=$shift and SC.subjectId=$subject and SI.roll NOT IN(SELECT `$subjectCode[0]`.roll from `$subjectCode[0]`) group by SI.id")->num_rows;
	
	$first_stdSql="SELECT `$subjectCode[0]`.* 
FROM studentinformation SI INNER join 
subjectcontrol SC on SC.technologyId=SI
.technologyId and SC.sessionId=SI.sessionId and
 SC.semesterId=SI.semesterId inner join 
 `$subjectCode[0]` on SI
 .roll=`$subjectCode[0]`.`roll` where SI
 .technologyId=$technology and SI
 .semesterId=$semester and SI.sessionId=$session and SI.shift=$shift and SC.subjectId=$subject and SI.roll IN(SELECT `$subjectCode[0]`.roll from `$subjectCode[0]`) group by  `$subjectCode[0]`.roll";

	$first_stdResult=mysqli_query($conn,$first_stdSql);


	$first_stdNum=$first_stdResult->num_rows;

	$subjectSql="SELECT *from subject WHERE subjectId=$subject";
	$subjectResult=mysqli_query($conn,$subjectSql);
	
	// tc/tf/.. checkpost
	$rows=array();	 
	  while ($data=$subjectResult->fetch_assoc()) {
	      $rows[]=$data;
	  }


	 function countTotal($tcfull,$tffull,$pcfull,$pffull,$tc,$tf,$pc,$pf){		
		
		if($tcfull && $tffull>0 && $pcfull>0 && $pffull>0){
			$tcPercent=(100*$tc)/$tcfull;
			$tfPercent=(100*$tf)/$tffull;
			$pcPercent=(100*$pc)/$pcfull;
			$pfPercent=(100*$pf)/$pffull;

			if($tcPercent<40 || $tfPercent<40 || $pcPercent<40 || $pfPercent<40){

				$total='0.00';
			}else{
				$total=$tc+$tf+$pc+$pf;
			}
			
		}elseif($tcfull>0 && $tffull>0 && $pcfull>0){
			$tcPercent=(100*$tc)/$tcfull;
			$tfPercent=(100*$tf)/$tffull;
			$pcPercent=(100*$pc)/$pcfull;

			if($tcPercent<40 || $tfPercent<40 || $pcPercent<40 ){
				$total='0.00';
			}else{
				$total=$tc+$tf+$pc;
			}				
			
		}elseif($tcfull>0 && $tffull>0){
			$tcPercent=(100*$tc)/$tcfull;
			$tfPercent=(100*$tf)/$tffull;
			if($tcPercent<40 || $tfPercent<40){
				$total='0.00';
			}else{
				$total=$tc+$tf;
			}
			
		}elseif($pcfull>0 && $pffull>0){
			$pcPercent=(100*$pc)/$pcfull;
			$pfPercent=(100*$pf)/$pffull;
			if($pcPercent<40 || $pfPercent<40){
				$total='0.00';
			}else{
				$total=$pc+$pf;
			}
			
		}else{}

		return $total;
		


	};	 
	
	function countGp($subjectTotal,$grandTotal){
		$percentage=(100*$grandTotal)/$subjectTotal;
		if($percentage>=80 && $percentage<=100)  {
			$gp="4.00";
		}elseif($percentage>=75 && $percentage<80) {
			$gp="3.75";
		}elseif($percentage>=70 && $percentage<75) {
			$gp="3.50";
		}elseif($percentage>=65 && $percentage<70) {
			$gp="3.25";
		}elseif($percentage>=60 && $percentage<65) {
			$gp="3.00";
		}elseif($percentage>=55 && $percentage<60) {
			$gp="2.75";
		}elseif($percentage>=50 && $percentage<55) {
			$gp="2.50";
		}elseif($percentage>=45 && $percentage<50) {
			$gp="2.25";
		}elseif($percentage>=40 && $percentage<45) {
			$gp="2.00";
		}else{
			$gp="0.00";
		}

		echo $gp;
	}


 ?>
<script type="text/javascript">
  var obj=<?php echo json_encode($rows);  ?>;
  var tc=obj[0].tc;
  var tf=obj[0].tf;
  var pc=obj[0].pc;
  var pf=obj[0].pf;

if(tc==null || tc==0){
	$('.tc').attr('disabled',true);
};
if(tf==null || tf==0){
	$('.tf').attr('disabled',true);
};
if(pc==null || pc==0){
	$('.pc').attr('disabled',true);
};
if(pf==null || pf==0){
	$('.pf').attr('disabled',true);
};

$('.editItem').click(function(){
	    var subjectMarks={
    	"subjectCode":$('#subjectCode').val(),
    	"id":$(this).attr('id')
    	}

    	$.ajax({
    		url:'updateMark.php',
    		type:"POST",
    		data:subjectMarks,
    		success:function(result){
    			$('.modal-body').html(result);
    			 $("#myModal").modal();
    		}
    	});


   	
    console.log(subjectMarks);



});
	




</script>


		<div class="col-md-12">
			<div class="box no-padding">
			  
				<div class="box-header">
					<?php 
						mysqli_data_seek($subjectResult,0);
						while ($subjectRow=$subjectResult->fetch_assoc()) {
					?>
					<h2 class="box-title pull-left">Roll</h2>
					<h2 class="box-title pull-right">Subject (<b><?php echo $subjectRow['subjectCode'];?></b>)
					<input type="hidden" name="subjectCode" id="subjectCode" value="<?php echo $subjectRow['subjectCode'];?>">
					<input type="hidden" name="count" value="<?php echo $count; ?>">

					</h2>
					
				</div>
				<div class="box-body">
					<table class="table table-responsive table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th style="width:90px">ROLL</th>
								<th>TC( <?php echo $tcfull=$subjectRow['tc'];?> )</th>
								<th>TF( <?php echo $tffull=$subjectRow['tf'];?> )</th>
								<th>PC( <?php echo $pcfull=$subjectRow['pc'];?> )</th>
								<th>PF( <?php echo $pffull=$subjectRow['pf'];?> )</th>
								<th>TOTAL(<?php echo $subjectRow['tc']+$subjectRow['tf']+$subjectRow['pc']+ $subjectRow['pf'];?>)</th>
								<th>GP</th>
								<th>ACTION</th>
							</tr>					
						</thead>
					<?php } ?>


					<tbody>
						<?php 

						// echo $tcfull."+".$tffull."+".$pcfull."+".$pffull;
						$subjectTotal=$tcfull+$tffull+$pcfull+$pffull;

							if($first_stdNum>0){
								$i=1;
								while($stdRowL=$first_stdResult->fetch_array()){									

						?>
								
					<tr>
						<td><?php echo $i; ?></td>
						<td><input type="text" class="form-control disabled" readonly name="roll[]" value="<?php echo $stdRowL['roll'];?>">
						</td>						
						<td>
						<label class="tc form-control">
							<?php if(isset($stdRowL['tc']))echo $tc=$stdRowL['tc']; else $tc=0;?>
						</label>
						</td>
						<td>
						<label class="tf form-control">
							<?php if(isset($stdRowL['tf']))echo $tf=$stdRowL['tf']; else $tf=0;?>
						</label>
						<td>
						<label class="pc form-control">
							<?php if(isset($stdRowL['pc']))echo $pc=$stdRowL['pc']; else $pc=0;?>
						</label>
						<td>
						<label class="pf form-control">
							<?php if(isset($stdRowL['pf']))echo $pf=$stdRowL['pf']; else $pf=0;?>
						</label>

						<td>
						<?php 
							$grandTotal=countTotal($tcfull,$tffull,$pcfull,$pffull,$tc,$tf,$pc,$pf);
						 ?>
						<label class="form-control <?php if($grandTotal!='0.00') echo 'label-success'; else{echo 'label-danger';}?>">
						<?php echo $grandTotal; ?>
						</label>
						</td>
						<td>
						<label class="form-control <?php if($grandTotal!='0.00') echo 'label-success'; else{echo 'label-danger';}?>">
							<?php countGp($subjectTotal,$grandTotal); ?>
						</label>							
						</td>
						<td>
							<button type="button" id="<?php echo $stdRowL['roll'];?>" class="editItem btn btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="false"></span></button>
						</td>
					</tr>
							<?php
								$i++;
									}
								}
							 ?>						
						</tbody>
					</table>
				</div>	
			</div>
		</div>
		

	

			
		
		
			
		
		

			
