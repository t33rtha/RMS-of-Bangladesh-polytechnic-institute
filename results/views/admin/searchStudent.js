function searchStudents(){
	var st={
		"technology":$('#technology').val(),
		"semester":$('#semester').val(),
		"shift":$('#shift').val(),
		"technology":$('#technology').val(),
		"markType":$( "input:radio[name=markType]:checked" ).val()
	}

// console.log(data);
	$.ajax({
			type:"POST",
			url:"select.php",
			data:st,
			async:true,			
			complete :function(data){
				

			}
		});








}