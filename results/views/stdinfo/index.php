<?php 
  require_once('../../conn/conn.php');
  include('../../common/session.php');

  $userId=$_SESSION['userId'];

  $sessionResult=mysqli_query($conn,"select *from session");
 $technologyResult=mysqli_query($conn,"select *from technology");

  $semesterSql="select *from semester";
  $semesterResult=mysqli_query($conn,$semesterSql);


  if(isset($_POST['addItem'])){
    $semester=$_POST['semester'];
    $sql="INSERT INTO semester values('','$semester')";
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
<body class="hold-transition skin-blue-light sidebar-collapse sidebar-mini">
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
        <div class="row">
          <div class="col-sm-12">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title"><b>Students</b> Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" style="width:100%" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Mother Name</th>
                    <th>Roll</th>
                    <th>Regi.</th>
                    <th>Session</th>
                    <th>Technology</th>
                    <th>Semester</th>                   
                    <th>Actions</th>
                  </tr>
                </thead> 
                <tbody>
                
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          </div>

        </div>


         <!-- entry information form  -->
       <div class="box box-info StdInfoDiv"> <!-- StdInfoDiv -->
            <div class="box-header with-border">
              <h3 class="box-title">Information Form</h3>
            </div>            
            <div class="form-horizontal">
            <div class="row">
              <div class="box-body"> <!-- box-body start -->
              <div class="col-md-12">
                 <div class="form-group">
                    <label for="name" class="col-sm-4 control-label">Name</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="motherName" class="col-sm-4 control-label">Mother's Name</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="motherName" id="motherName" placeholder="Mother's Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="fatherName" class="col-sm-4 control-label">Father's Name</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="fatherName" id="fatherName" placeholder="Father's Name">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="rollNo" class="col-sm-4 control-label">Roll No</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="rollNo" id="rollNo" placeholder="Roll No">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="registrationNo" class="col-sm-4 control-label">Registration No</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="registrationNo" id="registrationNo" placeholder="registrationNo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="technology" class="col-sm-4 control-label">Technology</label>
                    <div  class="col-sm-6">
                      <select id="technology" class="form-control">
                      <?php 
                        if($technologyResult->num_rows > 0){
                          while ( $technologyRow=$technologyResult->fetch_assoc()) {
                      ?>
                       <option value="<?php echo $technologyRow['technologyId'] ?>">
                       <?php echo $technologyRow['technologyCode']." - ".$technologyRow['technologyName'];  ?>
                       </option>       
                      <?php  
                        }
                         }
                       ?>                      
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="semester" class="col-sm-4 control-label">Semester</label>
                    <div  class="col-sm-6">
                         <select id="semester" class="form-control">
                          <?php 
                            if($semesterResult->num_rows > 0){
                              while ( $semesterRow=$semesterResult->fetch_assoc()) {
                              ?>
                              <option value="<?php echo $semesterRow['semesterId'] ?>"><?php echo $semesterRow['semester'];?></option>       
                              <?php  
                                }
                                 }
                           ?>                          
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="shift" class="col-sm-4 control-label">Shift</label>
                    <div  class="col-sm-6">
                         <select id="shift" class="form-control">
                          <option value="1">1st Shift</option>                        
                          <option value="2">2nd Shift</option>                        
                        </select>
                    </div>
                  </div>
            </div>

            <div class="col-md-6">
                  <div class="form-group">
                    <label for="session" class="col-sm-4 control-label">Session</label>
                    <div  class="col-sm-6">
                         <select id="session" class="form-control">
                          <?php 
                            if($sessionResult->num_rows > 0){
                              while ( $sessionRow=$sessionResult->fetch_assoc()) {
                            ?>
                             <option value="<?php echo $sessionRow['sessionId'] ?>"><?php echo $sessionRow['session'];?></option>
                            <?php  
                              }
                               }
                             ?>
                        </select>
                    </div>
                  </div>
                 </div>
                  <div class="form-group">
                    <label for="fatherName" class="col-sm-4 control-label">Not Regular</label>
                    <div class="col-sm-6">
                      <input type="checkbox" id="studentStatus" value="1" class="flat-blue">
                    </div>
                  </div>
                </div>
              </div> <!-- box-body end -->
            </div>

              <div class="box-footer">
                <button id="addStudentBtn" onclick="addStudents()" class="col-sm-4 col-sm-offset-4 btn btn-primary">Submit</button>
                <span> &nbsp; </span>
                <button  class="btn btn-primary">Reset</button>
              </div>
            </div>
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
        // $(html).insertBefore('#example');
        $('.StdInfoDiv').hide();

        $('#addRow').click(function(){
          $('.StdInfoDiv').toggle();
          $('#example').toggle();
          $('#example_info').toggle();
          $('#example_paginate').toggle();
        });

    }); 

    var table = $('#example').DataTable({
        "serverSide": true,
        "ajax":{
          url:"select.php",
          type:"post",
        },
        "columnDefs": [ {          
          "targets": -1,
           // "data": data,
          "defaultContent": "<div class='btn-group'><button type='button' id='studentId' class='viewItem btn btn btn-success'><span class='glyphicon glyphicon-eye-open' aria-hidden='false'></span></button><button type='button'  class='editItem btn btn btn-success'><span class='glyphicon glyphicon-pencil' aria-hidden='false'></span></button></div>"
        }]
    });
    
     $('<button id="addRow" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-plus"></span></button>').appendTo('div.dataTables_filter');
  </script>

  <!-- functional js -->
  <script src="functions.js" type="text/javascript"></script>
</body>
</html>
