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
			
		
	}


	if(roll.technologyId=='694'){  //telecommunication

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

		
	}

	if(roll.technologyId=='664'){  //CIVIL tech
		if(roll.semesterId=='1'){
			$.ajax({
				type:"POST",
				url:"1st/civil.php",
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
			url:"2nd/civil.php",
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
		
	}


	if(roll.technologyId=='687'){ //aidt tech

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

	}

	if(roll.technologyId=='667'){ //Electrical tech

	 	if(roll.semesterId=='1'){
			$.ajax({
				type:"POST",
				url:"1st/electricalTech.php",
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
				url:"2nd/electricalTech.php",
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
	}


	if(roll.technologyId=='19'){ //Textile tech

	 	if(roll.semesterId=='1'){
			$.ajax({
				type:"POST",
				url:"1st/textileTech.php",
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
				url:"2nd/textileTech.php",
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
	}


	if(roll.technologyId=='49'){ //Garments design and pattern making tech

	 	if(roll.semesterId=='1'){
			$.ajax({
				type:"POST",
				url:"1st/gdpmTech.php",
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
				url:"2nd/gdpmTech.php",
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
	}


	

}

