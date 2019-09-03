<?php 
require_once('../../conn/conn.php');

	 
	$technology=$_POST['technology'];
	$semester=$_POST['semester'];
	$shift=$_POST['shift'];
	$subject=$_POST['subject'];
	$session=$_POST['session'];

	$count=mysqli_query($conn,"SELECT id FROM studentinformation SI INNER join subjectcontrol SC on SC.technologyId=SI.technologyId and SC.sessionId=SI.sessionId and SC.semesterId=SI.semesterId AND SC.shift=SI.shift where SI.technologyId=$technology and SI.semesterId=$semester and SI.sessionId=$session and SI.shift=$shift and SC.subjectId=$subject group by SI.id")->num_rows;
	
	$first_stdSql="SELECT roll FROM studentinformation SI INNER join subjectcontrol SC on SC.technologyId=SI.technologyId and SC.sessionId=SI.sessionId and SC.semesterId=SI.semesterId AND SC.shift=SI.shift where SI.technologyId=$technology and SI.semesterId=$semester and SI.sessionId=$session and SI.shift=$shift and SC.subjectId=$subject group by SI.roll limit 25";

	$second_stdSql="SELECT roll FROM studentinformation SI INNER join subjectcontrol SC on SC.technologyId=SI.technologyId and SC.sessionId=SI.sessionId and SC.semesterId=SI.semesterId AND SC.shift=SI.shift where SI.technologyId=$technology and SI.semesterId=$semester and SI.sessionId=$session and SI.shift=$shift and SC.subjectId=$subject group by SI.roll limit 25,$count";

	$first_stdResult=mysqli_query($conn,$first_stdSql);
	$second_stdResult=mysqli_query($conn,$second_stdSql);


	$first_stdNum=$first_stdResult->num_rows;

	$subjectSql="SELECT *from subject WHERE subjectId=$subject";
	$subjectResult=mysqli_query($conn,$subjectSql);
	
	// tc/tf/.. checkpost
	$rows=array();	 
	  while ($data=$subjectResult->fetch_assoc()) {
	      $rows[]=$data;
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




  console.log(tc+' '+tf+' '+pc+' '+pf);


</script>

		<div class="col-md-6">
			<div class="box no-padding">
			  
				<div class="box-header">
					<?php 
						mysqli_data_seek($subjectResult,0);
						while ($subjectRow=$subjectResult->fetch_assoc()) {
					?>
					<h2 class="box-title pull-left">Roll (0-25)</h2>
					<h2 class="box-title pull-right">Subject (<b><?php echo $subjectRow['subjectCode'];?></b>)
					<input type="text" name="subjectCode" id="subjectCode" value="<?php echo $subjectRow['subjectCode'];?>">
					<input type="text" name="count" value="<?php echo $count; ?>">

					</h2>
					
				</div>
				<div class="box-body">
					<table class="table table-responsive table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th style="width:180px">ROLL</th>
								<th>TC( <?php echo $subjectRow['tc'];?> )</th>
								<th>TF( <?php echo $subjectRow['tf'];?> )</th>
								<th>PC( <?php echo $subjectRow['pc'];?> )</th>
								<th>PF( <?php echo $subjectRow['pf'];?> )</th>
							</tr>					
						</thead>
					<?php } ?>


						<tbody>
							<?php 
								if($first_stdNum>0){
									$i=1;
									while($stdRowL=$first_stdResult->fetch_assoc()){
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><input type="text" class="form-control disabled" readonly name="roll[]" value="<?php echo $stdRowL['roll'];?>"></td>
								<td><input type="text" class="tc form-control" name="tc[]"></td>
								<td><input type="text" class="tf form-control" name="tf[]"></td>
								<td><input type="text" class="pc form-control" name="pc[]"></td>
								<td><input type="text" class="pf form-control" name="pf[]"></td>
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



		<div class="col-md-6">
			<div class="box no-padding">
				<div class="box-header">
						<?php 
							mysqli_data_seek($subjectResult,0);
							while ($subjectRow=$subjectResult->fetch_assoc()) {
						?>
						<h2 class="box-title pull-left">Roll (25-50)</h2>
						<h2 class="box-title pull-right">Subject (<b><?php echo $subjectRow['subjectCode'];?></b>)</h2>
						<?php } ?>
					</div>
					
				<div class="box-body">
					<table class="table table-responsive table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th style="width:200px">ROLL</th>
								<th>TC()</th>
								<th>TF()</th>
								<th>PC()</th>
								<th>PF()</th>
							</tr>					
						</thead>
						<tbody>
							<?php 
									while($stdRowR=$second_stdResult->fetch_assoc()){
							?>
							<tr>
								<td>1</td>
								<td><input type="text" class="form-control" name="roll" value="<?php echo $stdRowR['roll'] ?>"></td>
								<td><input type="text" class="form-control" name="roll"></td>
								<td><input type="text" class="form-control" name="roll"></td>
								<td><input type="text" class="form-control" name="roll"></td>
								<td><input type="text" class="form-control" name="roll"></td>
							</tr>
							<?php
									}
							 ?>						
						</tbody>
					</table>
				</div>	
			</div>
		</div>
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2 col-md-offset-5">
					<input type="submit" class="form-control btn btn-info" name="entryMark">
				</div>
			</div>
		</div>
	

			
		
		
			
		
		

			
