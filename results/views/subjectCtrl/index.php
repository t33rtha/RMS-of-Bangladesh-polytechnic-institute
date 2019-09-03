<?php 
  require_once('../../conn/conn.php');
  include('../../common/session.php');
  include('../../controllers/queryHelper.php');

  $userId=$_SESSION['userId'];

if(isset($_POST['addItem'])){
    $subjectId=$_POST['subjectId'];
    $technologyId=$_POST['technologyId'];
    $sessionId=$_POST['sessionId'];
    $semesterId=$_POST['semesterId'];
    // $shiftId=$_POST['shiftId'];

    $sql="insert into subjectcontrol(subjectId,technologyId,sessionId,semesterId) values($subjectId,$technologyId,$sessionId,$semesterId)";
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
                    <th>Subject</th>
                    <th>Technology</th>
                    <th>Session</th>
                    <th>Semester</th>
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

        // $('.addItemTab').append($('#subjectDiv'));

        $('.addItemTab').insertBefore('#example');
        $('.addItemTab').hide();
        $('#addRow').click(function(){$('.addItemTab').toggle();});
      }); 

    var table = $('#example').DataTable({
        "serverSide": true,
        "ajax":{
          url:"select.php",
          type:"post",
        },
        "DT_RowId":'subjectControlId',
        "columnDefs": [{          
          "targets": -1,
           // "data": data,
          "defaultContent": "<div class='btn-group'><button type='button'  class='editItem btn btn-primary'><span class='glyphicon glyphicon-pencil' aria-hidden='false'></span></button><button type='button' id='' class='btn btn-primary deleteItem'><span class='glyphicon glyphicon-trash' aria-hidden='false'></span></button></div>"
        }]
    });
    $('<button id="addRow" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span></button>').appendTo('div.dataTables_filter');


  </script>
<div class="addItemTab">
    <form method="post">
    <table class="table">
      <tr>
        <td>
            <select name="subjectId" class='form-control'>
                <option>Select Subject</option>
                <?php 
                    while ($rowSubject=$subjectResult->fetch_assoc()) {
                    echo "<option class='' value='".$rowSubject['subjectId']."'>".$rowSubject['subjectName']." (".$rowSubject['subjectCode'].") "."</option>";
                    }
                 ?>
            </select>
        </td>
        <td>
            <select name="technologyId" class='form-control'>
                <option>Select Technology</option>
                <?php 
                    while ($rowTechnology=$technologyResult->fetch_assoc()) {
                    echo "<option class='' value='".$rowTechnology['technologyId']."'>".$rowTechnology['technologyName']."</option>";
                    }
                 ?>
            </select>
        </td>
        <td>
            <select name="sessionId" class='form-control'>
                <option>Select Session</option>
                <?php 
                    while ($rowSession=$sessionResult->fetch_assoc()) {
                    echo "<option class='' value='".$rowSession['sessionId']."'>".$rowSession['session']."</option>";
                    }
                 ?>
            </select>
        </td>
        <td>
            <select name="semesterId" class='form-control'>
                <option>Select Semester</option>
                <?php 
                    while ($rowSemester=$semesterResult->fetch_assoc()) {
                    echo "<option class='' value='".$rowSemester['semesterId']."'>".$rowSemester['semester']."</option>";
                    }
                 ?>
            </select>
        </td>       
        <td><input type="submit" class="btn btn-primary"  value="Create" name="addItem"></td>
        
      </tr>
    </table> 
    </form>   
  </select> 
</div>
  

  <!-- functional js -->
  <script src="functions.js" type="text/javascript"></script>
</body>
</html>
