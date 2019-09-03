<?php 
  require_once('../../conn/conn.php');
  include('../../common/session.php');
  
  $sql="select *from `65711`";
  $result=mysqli_query($conn,$sql);

// if(isset($_POST['update'])){

//     $tc[]=$_POST['tc'];
//     $pc[]=$_POST['pc'];
//     $tf[]=$_POST['tf'];

//     $r=mysqli_query($conn,"select *from `65711`");
   
//     $rowCount=$r->num_rows;
    
//     for($i=0;$i<=$rowCount;$i++){

//       $u="update `65711` set tc='$tc[$i]',pc='$pc[$i],tf='$tf[$i]' where roll='$roll[$i]'";
//       $update=mysqli_query($conn,$u);
//     }


// }






 ?>


<!DOCTYPE html>
<html>
<head>

  <!-- header links -->
  <?php include('../../common/headerlinks.php'); ?>

</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <?php include('../../common/headerInner.php'); ?>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../uploads/img/profile.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
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
        Admin Panel
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Result</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- entry form  -->
       <div class="box box-info">
            <div class="box-header with-border">
                <!-- <form method="POST" class="form-horizontal"> -->
                <div class="form-horizontal">
                    <div class="form-group">
                      <label for="technology" class="col-sm-2 control-label">Technology</label>
                      <div  class="col-sm-3">
                        <select id="technology" class="form-control">
                            <option value="66">66 - Computer</option>                        
                            <option value="87">87 - Architecture & Interior Design</option>
                            <option value="72">72 - Refrigeration & Air-Conditioning</option>
                            <option value="food">Food Technology</option>                        
                            <option value="mechatronics">Mechatronics</option>                      
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="semester" class="col-sm-2 control-label">Semester</label>
                      <div  class="col-sm-3">
                           <select id="semester" class="form-control">
                            <option value="1">1st</option>                        
                            <option value="2">2nd</option>                        
                            <option value="3">3rd</option>                        
                          </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="shift" class="col-sm-2 control-label">Shift</label>
                      <div  class="col-sm-3">
                           <select id="shift" class="form-control">
                            <option value="1">1st Shift</option>                        
                            <option value="2">2nd Shift</option>                        
                          </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="subject" class="col-sm-2 control-label">subject</label>
                      <div  class="col-sm-3">
                           <select id="subject" class="form-control">
                                                   
                          </select>
                      </div>
                    </div>
                   

                    <div class="form-group">
                     <button id="searchStudents" onclick="searchStudents()" class="col-sm-2 col-sm-offset-2 btn btn-info">Submit</button>
                    </div>
                </div>
                <!-- </form> -->
            </div>

             <script type="text/javascript" src="searchStudent.js"></script>

            <!-- /.box-header -->
            <!-- form start -->
            <!-- <form class="form-horizontal"> -->
            <div class="form-horizontal">
              <div class="box-body">
               <form method="POST">
                 <table>
                 <?php 
                      $i=0;
                    if($result->num_rows > 0){

                      while ($row = $result->fetch_assoc()) {
                ?>

                <tr>
                  <td>
                    <input type="text" name="roll[<?php echo $i;?>]" value="<?php echo $row['roll']; ?>">
                  </td>
                  <td>
                    <input type="text" name="tc[<?php echo $i;?>]" value="<?php echo $row['tc']; ?>">
                  </td>
                  <td>
                    <input type="text" name="pc[<?php echo $i;?>]" value="<?php echo $row['pc']; ?>">
                  </td>
                  <td>
                    <input type="text" name="tf[<?php echo $i;?>]" value="<?php echo $row['tf']; ?>">
                  </td>
                </tr>




                <?php  
                $i++;
                        }
                      }
                   ?>


              <input type="submit" name="update" value="UPDATE"/>




              </form>




                       </table>



              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
              </div>
              <!-- /.box-footer -->
            <!-- </form> -->
            </div>
          </div>
      

    </section>
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

  <!-- functional js -->
  <script src="functions.js" type="text/javascript"></script>

</body>
</html>
