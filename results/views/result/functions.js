$('#studentStatus').change(function(){
       $('.sessionDiv').toggle();
    });


function addStudents(){
		// console.log("hey there!");
		var st={
				rollNo : $('#rollNo').val(),
				registrationNo : $('#registrationNo').val(),
				name : $('#name').val(),
				technology : $('#technology').val(),
				semester : $('#semester').val(),
				shift : $('#shift').val(),
				session : $('#session').val(),
				motherName : $('#motherName').val(),
				fatherName : $('#fatherName').val()
		}

		$.ajax({
			type:"POST",
			url:"insert.php",
			data:st,
			async:true,			
			complete :function(data){
				alert("Success !!!");
				location.reload();

			}
		});
		
}

function searchStudents(){	

	var st={
			"technology":$('#technology').val(),
			"semester":$('#semester').val(),
			"shift":$('#shift').val(),
			"technology":$('#technology').val(),
			"subject":$( "#subject" ).val(),
			"session":$( "#session" ).val(),
			"status":$("#studentStatus:checked").val(),
			"range" :$('#studentsRange').val()
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

