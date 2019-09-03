<?php 
  require_once('../../conn/conn.php');
  include('../../common/session.php');

  include('../../controllers/queryHelper.php');

  $userId=$_SESSION['userId'];


 ?>

<!DOCTYPE html>
<html>
<head>
  <!-- header links -->
  <?php include('../../common/headerlinks.php'); ?>
</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
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
          <p><?php echo $_SESSION['userEmail']; ?></p>
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
    <?php 
      
     ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Result 
        <small>description</small>
        <?php //echo $subjNum; ?>
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
                <div class="form-horizontal">                  
                    <div class="form-group">
                        <div class="col-sm-3">
                           <select id="technologyId" name="technologyId" class='form-control'>
                              <option>Technology</option>
                            <?php 
                                while ($rowTechnology=$technologyResult->fetch_assoc()) {
                                echo "<option class='' value='".$rowTechnology['technologyCode']."'>".$rowTechnology['technologyName']." (".$rowTechnology['technologyCode'].")"."</option>";
                                }
                             ?>
                          </select> 
                        </div>   

                         <div class="col-sm-2">
                           <select id="semesterId" name="semesterId" class='form-control'>
                              <option>Semester</option>
                            <?php 
                                while ($rowSemester=$semesterResult->fetch_assoc()) {
                                echo "<option class='' value='".$rowSemester['semesterId']."'>".$rowSemester['semester']."</option>";
                                }
                             ?>
                          </select> 
                        </div> 

                        <label for="startRoll" class="col-sm-1 control-label">Roll</label>
                        <div  class="col-sm-2">
                            <input type="text" class="form-control" name="startRoll" id="startRoll">
                        </div>
                        <label for="endRoll" class="control-label pull-left">To</label>
                        <div  class="col-sm-2">
                             <input type="text" class="form-control" name="endRoll" id="endRoll"> 
                        </div>
                        <button id="searchMark" onclick="searchMark();" class="col-sm-1 btn btn-info">Search</button>
                    </div>                   
                   
                </div>
                <!-- </form> -->
              </div>
            </div>
            <div class="row">
              <!-- <form method="POST"> -->
                  <div class="marksheet">
                  	
                  </div>
              <!-- </form> -->
            </div>



          </section>
          </div> <!-- end -->
  
    <!-- /.content -->
  
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">   
    <strong>Copyright &copy; 2017 <a href="#">Engineering Institute</a>.</strong> All rights reserved.
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
