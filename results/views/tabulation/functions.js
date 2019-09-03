function searchMark(){
	var roll={
		"technologyId":$('#technologyId').val(),
		"semesterId":$('#semesterId').val(),
		"semesterId":$('#semesterId').val(),
		"startRoll":$('#startRoll').val(),
		"endRoll":$('#endRoll').val()		
	}
	// console.log(roll);

	//textile
    if(roll.technologyId=='19'){
        if(roll.semesterId=='1'){
            $.ajax({
                type:"POST",
                url:"1st/textile.php",
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
                url:"2nd/textile.php",
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
                url:"3rd/textile.php",
                data:roll,
                // async:true,
                success :function(result){
                    $('.marksheet').html(result);
                }
            });
        }
    }


//
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



	//gdpm
    if(roll.technologyId=='49'){
        if(roll.semesterId=='1'){
            $.ajax({
                type:"POST",
                url:"1st/gdpm.php",
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
                url:"2nd/gdpm.php",
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
                url:"3rd/gdpm.php",
                data:roll,
                // async:true,
                success :function(result){
                    $('.marksheet').html(result);
                }
            });
        }
    }



	//electrical
    if(roll.technologyId=='667'){
        if(roll.semesterId=='1'){
            $.ajax({
                type:"POST",
                url:"1st/electrical.php",
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
                url:"2nd/electrical.php",
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
                url:"3rd/electrical.php",
                data:roll,
                // async:true,
                success :function(result){
                    $('.marksheet').html(result);
                }
            });
        }
    }

    //civil technology
	if(roll.technologyId=='664'){
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
                url:"3rd/civil.php",
                data:roll,
                // async:true,
                success :function(result){
                    $('.marksheet').html(result);
                }
            });
        }

    }



	if(roll.technologyId=='687'){
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



	if(roll.technologyId=='694') {   //telecommunication

        if (roll.semesterId == '1') {
            $.ajax({
                type: "POST",
                url: "1st/telecom.php",
                data: roll,
                // async:true,
                success: function (result) {
                    $('.marksheet').html(result);
                }
            });
        }


        if (roll.semesterId == '2') {
            $.ajax({
                type: "POST",
                url: "2nd/telecom.php",
                data: roll,
                // async:true,
                success: function (result) {
                    $('.marksheet').html(result);
                }
            });
        }
        if (roll.semesterId == '3') {
            $.ajax({
                type: "POST",
                url: "3rd/telecom.php",
                data: roll,
                // async:true,
                success: function (result) {
                    $('.marksheet').html(result);
                }
            });
        }
    }
	

}

