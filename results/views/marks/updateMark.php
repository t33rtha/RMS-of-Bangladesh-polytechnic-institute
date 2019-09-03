<?php 
require_once('../../conn/conn.php');

	 
	$roll=$_POST['id'];
	$subjectCode=$_POST['subjectCode'];	

	$subjectSql="SELECT *from subject WHERE subjectCode=$subjectCode";
	$subjectResult=mysqli_query($conn,$subjectSql);
	
	$markSql="select *from `$subjectCode` where roll=$roll";

	$markResult=mysqli_query($conn,$markSql);

	
 ?>


		
			<table class="table table-responsive table-striped">
				<?php 
					mysqli_data_seek($subjectResult,0);
					while ($subjectRow=$subjectResult->fetch_assoc()) {
				?>
				<tr>					
					<th style="width:130px">ROLL</th>
					<th>TC( <?php echo $tcfull=$subjectRow['tc'];?> )</th>
					<th>TF( <?php echo $tffull=$subjectRow['tf'];?> )</th>
					<th>PC( <?php echo $pcfull=$subjectRow['pc'];?> )</th>
					<th>PF( <?php echo $pffull=$subjectRow['pf'];?> )</th>
					<input type="hidden" name="subjectCode" id="subjectCode" value="<?php echo $subjectRow['subjectCode'];?>">
				</tr>

				<?php } ?>
				<?php while($markRow=$markResult->fetch_assoc()) { ?>
					<tr>
						 <td>
						 <input type="text" class="form-control disabled" readonly name="roll" value=" <?php echo $markRow['roll']; ?>"></td>
		                <td>
		                <input type="text" class="tc form-control" name="tc" <?php if(isset($markRow['tc'])) echo "value='".$markRow['tc']."'"; else echo "disabled"; ?> >
		                </td>
		                <td><input type="text" class="tf form-control" name="tf" <?php if(isset($markRow['tf'])) echo "value='".$markRow['tf']."'"; else echo "disabled"; ?> ></td>
		                <td><input type="text" class="pc form-control" name="pc" <?php if(isset($markRow['pc']) ) echo "value='".$markRow['pc']."'"; else echo "disabled"; ?> ></td>
		                <td><input type="text" class="pf form-control" name="pf" <?php if(isset($markRow['pf']) ) echo "value='".$markRow['pf']."'"; else echo "disabled"; ?> ></td>
					</tr>
					<?php } ?>					
			</table>
				
			
		

	

			
		
		
			
		
		

			
