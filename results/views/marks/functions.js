$('#studentStatus').change(function(){
       $('.sessionDiv').toggle();
    });

function searchStudents(){
	var st={
		"technology":$('#technology').val(),
		"semester":$('#semester').val(),
		"shift":$('#shift').val(),
		"technology":$('#technology').val(),
		"subject":$( "#subject" ).val(),
		"session":$( "#session" ).val()
	}
	// console.log(st);

	if($("#studentStatus").is(":checked")){
		
		$.ajax({
				type:"POST",
				url:"selectIrregular.php",
				data:st,
				// async:true,			
				success :function(result){
					$('.entryPanel').html(result);
				}
			});
		}else{		
			$.ajax({
				type:"POST",
				url:"select.php",
				data:st,
				// async:true,			
				success :function(result){
					$('.entryPanel').html(result);
				}
			});
		}



}


