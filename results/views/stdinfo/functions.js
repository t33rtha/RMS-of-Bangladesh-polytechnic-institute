function addStudents(){
		// console.log("hey there!");
        if($('#studentStatus').is(':checked')){
            status=1;
        }else{
          status=0;
        }

		var st={
				rollNo : $('#rollNo').val(),
				registrationNo : $('#registrationNo').val(),
				name : $('#name').val(),
				technology : $('#technology').val(),
				semester : $('#semester').val(),
				shift : $('#shift').val(),
				session : $('#session').val(),
				motherName : $('#motherName').val(),
				fatherName : $('#fatherName').val(),
                status:status
		}
		// console.log(st);
		$.ajax({
			type:"POST",
			url:"insert.php",
			data:st,
			// async:true,			
			complete :function(data){
				// alert("Success !!!");
				location.reload();

			}
		});
		
}

function studentUpdate(data){
    if($('#studentStatus').is(':checked')){
        status=1;
        }else{
          status=0;
        }
    var st={stdId : $('#stdIdentity').val(),
        rollNo : $('#rollNo').val(),
        registrationNo : $('#registrationNo').val(),
        name : $('#name').val(),
        technology : $('#technology').val(),
        semester : $('#semester').val(),
        shift : $('#shift').val(),
        session : $('#session').val(),
        motherName : $('#motherName').val(),
        fatherName : $('#fatherName').val(),
        status:status
    }
    console.log(st);
    $.ajax({
            type:"POST",
            url:"update.php",
            data:st,
            async:true,          
            complete :function(data){
                // alert("Success !!!");
                location.reload();

            }
        });
}

function studentDelete(data){
    var st={stdId : $('#stdIdentity').val()}
    console.log(st);
    $.ajax({
            type:"POST",
            url:"delete.php",
            data:st,
            async:true,          
            complete :function(data){
                // alert("Success !!!");
                location.reload();

            }
        });
}



$('#example tbody').on( 'click', '.editItem', function () {
        var tr=$(this).closest('tr');
        var row=table.row(tr); 
        var data = table.row( $(this).parents('tr') ).data();  
        var stdId={'id':data.DT_RowId};
        console.log(stdId.id);

      $.ajax({
            type:"POST",
            url:"viewInStd.php",
            data:stdId,
            // async:true,          
            complete :function(result){
                if(row.child.isShown()){
                    row.child.hide();
                    tr.removeClass('shown');
                }else{
                    console.log(result);
                    row.child(result['responseText']).show();
                    tr.addClass('shown');
                }
            }
        });  





        // if(row.child.isShown()){
        //     row.child.hide();
        //     tr.removeClass('shown');
        // }else{

        //     row.child(id).show();
        //     tr.addClass('shown');
        // }
        

    });