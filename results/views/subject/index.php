<?php 
  require_once('../../conn/conn.php');
  include('../../common/session.php');

  $userId=$_SESSION['userId'];

if(isset($_POST['addItem'])){
    $subjectCode=$_POST['subjectCode'];
    $subjectName=$_POST['subjectName'];
    $tc=$_POST['tc'];
    $tf=$_POST['tf'];
    $pc=$_POST['pc'];
    $pf=$_POST['pf'];
    $sql="INSERT INTO subject(subjectCode,subjectName,tc,tf,pc,pf) values('$subjectCode','$subjectName','$tc','$tf','$pc','$pf')";
    mysqli_query($conn,$sql);

    header('Location:index.php');

 }

 



 ?>


<!DOCTYPE html>
<html>
<head>

   <!-- header links -->
   <?php include('../../common/headerlinks.php'); ?>
   <!-- inner page css -->
   <style type="text/css">
      .markSub{
          max-width:75px;
       }
   </style>
  
   <!-- inner page css -->
</head>
<body class="hold-transition fixed skin-yellow sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <?php include('../../common/headerInner.php'); ?>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <?php include('../../common/sidebarUserPanel.php'); ?>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
     <?php include('../../common/sidebarMenuLeft.php'); ?>

      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Student
        <small>description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content"> <!-- main section start -->
         <div class="box">
            <div class="box-header">
              <h3 class="box-title"><b>Subjects Table</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-responsive table-striped">
                <thead>
                  <tr>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>TC</th>
                    <th>TF</th>
                    <th>PC</th>
                    <th>PF</th>
                    <th>Actions</th>
                  </tr>
                </thead>               
               </table>
            </div>
            <!-- /.box-body -->
          </div>
          
        

    </section> <!-- main section end -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">   
    <strong>Copyright &copy; 2019 Website Desing and Development By <a href="#">Engineering Institute</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">      
    </div>
  </aside>
  <div class="control-sidebar-bg"></div>
</div>
  <!-- js links -->
  <?php include('../../common/footerLinks.php'); ?>

 <script type="text/javascript">
     $(document).ready(function(){  
        var viewSection= "<div class='viewSection'></div>";
        $(viewSection).insertBefore('#example');
        $(html).insertBefore('#example');
        $('.addItemTab').hide();
        $('#addRow').click(function(){$('.addItemTab').toggle();});
      }); 

    var table = $('#example').DataTable({
        "serverSide": true,
        "ajax":{
          url:"select.php",
          type:"post",
        },
        // "DT_RowId":'semesterId',
        "columnDefs": [ {          
          "targets": -1,
           // "data": data,
          "defaultContent": "<div class='btn-group'><button type='button'  class='editItem btn btn-primary'><span class='glyphicon glyphicon-pencil' aria-hidden='false'></span></button><button type='button' id='' class='btn btn-primary'><span class='glyphicon glyphicon-trash' aria-hidden='false'></span></button></div>"
        }]
    });
    // console.log(table);
    $('<button id="addRow" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span></button>').appendTo('div.dataTables_filter');

     var html="<div class='addItemTab col-md-offset-1'><form method='POST'>";
      html+="<div class='form-group'><div class='col-sm-2'><input type='text' required class='form-control' name='subjectCode' id='subjectCode' placeholder='Subject Code'></div></div>";  
      html+="<div class='form-group'><div class='col-sm-2'><input type='text' required class='form-control' name='subjectName' id='subjectName' placeholder='Subject Name'></div></div>";
      html+="<div class='form-group'><input type='text' class='form-control markSub' name='tc' id='tc' placeholder='tc'><input type='text' class='form-control markSub' name='tf' id='tf' placeholder='tf'><input type='text' class='form-control markSub' name='pc' id='pc' placeholder='pc'><input type='text' class='form-control markSub' name='pf' id='pf' placeholder='pf'></div>";

      html+="&nbsp;<input type='submit' name='addItem' class='btn-primary btn' value='Create'/></td>";
      html+="</form></div>";

  </script>

  <!-- functional js -->
  <!-- <script src="functions.js" type="text/javascript"></script> -->
</body>
</html>
