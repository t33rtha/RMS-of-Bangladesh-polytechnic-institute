function searchMark(){
	var roll={
		"technologyId":$('#technologyId').val(),
		"semesterId":$('#semesterId').val(),
		"startRoll":$('#startRoll').val(),
		"endRoll":$('#endRoll').val()		
 }
	// console.log(roll);

	//computer tech
	if(roll.technologyId=='666'){
			if(roll.semesterId=='1'){
				$.ajax({
					type:"POST",
					url:"1st/computerTech.php",
					data:roll,
					// async:true,			
					success :function(result){
						$('.marksheet').html(result);
					}
				});

			}
			if(roll.semesterId=='2'){
				$.ajax({
					type:"POST",
					url:"2nd/computerTech.php",
					data:roll,
					// async:true,			
					success :function(result){
						$('.marksheet').html(result);
					}
				});
			}
			if(roll.semesterId=='3'){
				$.ajax({
					type:"POST",
					url:"3rd/computerTech.php",
					data:roll,
					// async:true,			
					success :function(result){
						$('.marksheet').html(result);
					}
				});
			}
			
		
	}else if(roll.technologyId=='694'){  //telecommunication

		// tech


		if(roll.semesterId=='1'){
			$.ajax({
				type:"POST",
				url:"1st/telecom.php",
				data:roll,
				// async:true,			
				success :function(result){
					$('.marksheet').html(result);
				}
			});
		}

		if(roll.semesterId=='2'){
			$.ajax({
				type:"POST",
				url:"2nd/telecom.php",
				data:roll,
				// async:true,			
				success :function(result){
					$('.marksheet').html(result);
				}
			});
		}
		if(roll.semesterId=='3'){
			$.ajax({
				type:"POST",
				url:"3rd/telecom.php",
				data:roll,
				// async:true,			
				success :function(result){
					$('.marksheet').html(result);
				}
			});
		}

		
	}else if(roll.technologyId=='672'){  //rac tech
		if(roll.semesterId=='1'){
			$.ajax({
				type:"POST",
				url:"1st/racTech.php",
				data:roll,
				// async:true,			
				success :function(result){
					$('.marksheet').html(result);
				}
			});
		}

		if(roll.semesterId=='2'){
			$.ajax({
			type:"POST",
			url:"2nd/racTech.php",
			data:roll,
			// async:true,			
			success :function(result){
				$('.marksheet').html(result);
			}
		});
		}
		if(roll.semesterId=='3'){
			$.ajax({
			type:"POST",
			url:"3rd/racTech.php",
			data:roll,
			// async:true,			
			success :function(result){
				$('.marksheet').html(result);
			}
		});
		}
		
	}else if(roll.technologyId=='687'){ //aidt tech

		if(roll.semesterId=='1'){
				$.ajax({
					type:"POST",
					url:"1st/aidtTech.php",
					data:roll,
					// async:true,			
					success :function(result){
						$('.marksheet').html(result);
					}
				});

		}

		if(roll.semesterId=='2'){
			$.ajax({
					type:"POST",
					url:"2nd/aidtTech.php",
					data:roll,
					// async:true,			
					success :function(result){
						$('.marksheet').html(result);
					}
				});
		}
		if(roll.semesterId=='3'){
			$.ajax({
					type:"POST",
					url:"3rd/aidtTech.php",
					data:roll,
					// async:true,			
					success :function(result){
						$('.marksheet').html(result);
					}
				});
		}

	}else if(roll.technologyId=='692'){ //mechatronics tech

	 	if(roll.semesterId=='1'){
			$.ajax({
				type:"POST",
				url:"1st/mechatronicsTech.php",
				data:roll,
				// async:true,			
				success :function(result){
					$('.marksheet').html(result);
				}
			});
	 	}

	 	if(roll.semesterId=='2'){
			$.ajax({
				type:"POST",
				url:"2nd/mechatronicsTech.php",
				data:roll,
				// async:true,			
				success :function(result){
					$('.marksheet').html(result);
				}
			});
	 	}
	 		if(roll.semesterId=='3'){
			$.ajax({
				type:"POST",
				url:"3rd/mechatronicsTech.php",
				data:roll,
				// async:true,			
				success :function(result){
					$('.marksheet').html(result);
				}
			});
	 	}
	}else{
		//
	}

	

}

