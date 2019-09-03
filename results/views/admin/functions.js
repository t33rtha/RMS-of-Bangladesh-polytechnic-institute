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

