<?php 
  require_once('../../conn/conn.php');
  include('../../common/session.php');

  $userId=$_SESSION['userId'];

 if(isset($_POST['addItem'])){
  $session=$_POST['session'];
  $sql="INSERT INTO session values('','$session')";
  mysqli_query($conn,$sql);
  header('Location:index.php');
 }



 ?>


<!DOCTYPE html>
<html>
<head>
   <!-- header links -->
   <?php include('../../common/headerlinks.php'); ?>

</head>
<body class="hold-transition skin-yellow sidebar-collapse sidebar-mini">
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
              <h3 class="box-title"><b>Session Table</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-responsive table-striped">
                <thead>
                  <tr>
                    <th>Session</th>
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
          "defaultContent": "<div class='btn-group'><button type='button' id='semesterId' class='viewItem btn btn-primary'><span class='glyphicon glyphicon-eye-open' aria-hidden='false'></span></button><button type='button'  class='editItem btn btn-primary'><span class='glyphicon glyphicon-pencil' aria-hidden='false'></span></button></div>"
        }]
    });
    
    // console.log(table);
     $('<button id="addRow" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span></button>').appendTo('div.dataTables_filter');

     var html="<div class='addItemTab col-md-offset-5'><form method='POST'>";
      html+="<select name='session' class='form-control' style='min-width:140px;'>";
          html+="<option class='btn btn-primary'>Select</option>";
          html+="<option value='2016-17'>2016-17</option>";
          html+="<option value='2018-19'>2018-19</option>";
          html+="<option value='2019-20'>2019-20</option>";
          html+="<option value='2020-21'>2020-21</option>";
          html+="<option value='2022-23'>2022-23</option>";
          html+="<option value='2024-25'>2024-25</option>";
          html+="<option value='2026-27'>2026-27</option>";
      html+="</select>";

      html+="<span>&nbsp;</span><input type='submit' name='addItem' class='btn-primary btn' value='Create'/>";     
      html+="</form></div>";



  </script>

  <!-- functional js -->
  <!-- <script src="functions.js" type="text/javascript"></script> -->
</body>
</html>
