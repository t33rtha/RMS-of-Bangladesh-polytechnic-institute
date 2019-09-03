// function formatEdit(data){
//     var link="";
//     if(data.file!=null){
//         var link=(data.file).slice(11);
//     }
//     return '<table cellspacing="0" class="col-sm-11">'+
//         '<tr>'+
//         '<td><input id="iCategory" class="form-control input-sm" value="'+data[0]+'"/></td>'+
//         '<td><input id="iItemValue" class="form-control input-sm" value="'+data[1]+'"/></td>'+
//         '<td><input id="iQuantity"  class="form-control input-sm numberValidate" value="'+data[2]+'"/></td>'+
//         '<td><input id="iLocation" class="form-control input-sm" value="'+data[3]+'"/></td>'+
//         '<td><input id="iComment" class="form-control input-sm" value="'+data[4]+'"/></td>'+
//         '<td><div class="btn-group"><button class="btnIndividual btn  btn-success" id="'+data.itemId+'">update</button><button type="button" class="deleteItem btn btn-danger" id="'+data.itemId+'"><span class="glyphicon glyphicon-trash" aria-hidden="false"></span></button></div></td>'+            
//         '</tr>'+
//         '<tr>'+
//             '<td colspan="3"><label><i>Link : </i><a target="_BLANK" href="../../upload/'+data.file+'"> '+link+'</a></td>'+
//         '</tr>'+
//     '</table>';

// }

// function formatShow(data){
//     var link="";
//     if(data.file!=null){
//         var link=(data.file).slice(11);
//     }
//     return '<table cellpadding="5"  class="col-sm-10">'+
//         '<tr>'+
//         '<td><label>Category :</label> '+data[0]+'</td>'+
//         '<td><label>Value :</label> '+data[1]+'</td>'+
//         '<td><label>Quantity :</label> '+data[2]+'</td>'+
//         '<td><label> Location :</label> '+data[3]+'</td>'+
//         '<td><label>Comment :</label> '+data[4]+'</td>'+
//         '<td></td>'+
            
//         '</tr>'+
//         '<tr >'+
//             '<td colspan="3"><label><i>Link : </i><a target="_BLANK" href="../../upload/'+data.file+'"> '+link+'</a></td>'+
//         '</tr>'+
//     '</table>';

// }

  // $('#example tbody').on( 'click', '.editItem', function () {
  //       var tr=$(this).closest('tr');
  //       var row=table.row(tr);        
  //       if(row.child.isShown()){
  //           row.child.hide();
  //           tr.removeClass('shown');
  //       }else{

  //           row.child(formatEdit(row.data())).show();
  //           tr.addClass('shown');
  //       }
        

  //   });

 // $('#example tbody').on( 'click', '.viewItem', function () {
 //        var tr=$(this).closest('tr');
 //        var row=table.row(tr);
 //        console.log(tr);

 //        if(row.child.isShown()){
 //            row.child.hide();
 //            tr.removeClass('shown');
 //        }else{

 //            row.child(formatShow(row.data())).show();
 //            tr.addClass('shown');
 //        }
       
 //    });




$('#example tbody').on( 'click', '.deleteItem', function () {

      
    if(confirm("are you sure want to delete?")==true){
        
          var dData={"id":$(this).closest('tr').attr('id')}
        
        console.log(dData);
        $.ajax({
            url:"dItem.php",
            type:"POST",
            data:dData,
            async:true,
            success:function(){
                location.reload();
            }
        });
    }

});





  
  // $(document).on('click','.btnIndividual',function(){
  //       var iData={
  //           "id":$(this).attr('id'),
  //           "iCategory":$('#iCategory').val(),
  //           "iItemValue":$('#iItemValue').val(),
  //           "iQuantity":$('#iQuantity').val(),
  //           "iLocation":$('#iLocation').val(),
  //           "iComment":$('#iComment').val()
  //           }
  //       console.log(iData);
       
  //       $.ajax({
  //           url:"uItem.php",
  //           type:"POST",
  //           data:iData,
  //           async:true,
  //           success:function(result){
  //               location.reload();
  //           }
  //       });
  // });

