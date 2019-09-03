function searchMark(){
	var roll={
		"technologyId":$('#technologyId').val(),
		"startRoll":$('#startRoll').val(),
		"endRoll":$('#endRoll').val()		
	}

	if(roll.technologyId=='666'){
		$.ajax({
			type:"POST",
			url:"computerTech.php",
			data:roll,
			// async:true,			
			success :function(result){
				$('.marksheet').html(result);
			}
		});
	}else if(roll.technologyId=='669'){
		$.ajax({
			type:"POST",
			url:"foodTech.php",
			data:roll,
			// async:true,			
			success :function(result){
				$('.marksheet').html(result);
			}
		});
	}else if(roll.technologyId=='672'){
		$.ajax({
			type:"POST",
			url:"racTech.php",
			data:roll,
			// async:true,			
			success :function(result){
				$('.marksheet').html(result);
			}
		});
	}else if(roll.technologyId=='687'){
		$.ajax({
			type:"POST",
			url:"aidtTech.php",
			data:roll,
			// async:true,			
			success :function(result){
				$('.marksheet').html(result);
			}
		});
	}else if(roll.technologyId=='692'){
		$.ajax({
			type:"POST",
			url:"mechatronicsTech.php",
			data:roll,
			// async:true,			
			success :function(result){
				$('.marksheet').html(result);
			}
		});
	}else{

	}
	

}

