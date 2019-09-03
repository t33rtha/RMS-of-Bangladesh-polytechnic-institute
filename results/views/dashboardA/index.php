<?php 
  require_once('../../conn/conn.php');
  include('../../common/session.php');

  $userId=$_SESSION['userId'];



$totalStu=mysqli_query($conn,"select * from studentinformation")->num_rows;
  $totalSubjects=mysqli_query($conn,"select * from Subject")->num_rows;
  $totaltechnologies=mysqli_query($conn,"select * from technology")->num_rows;
  $totalTeachers=mysqli_query($conn,"select * from users")->num_rows;

 

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
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/login.png" class="img-circle" alt="User Image">
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
      <h1 align="center">
       Student Result Management System
       
      </h1>
     
    </section>



    <!-- Main content -->
      <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3><?php print_r($totalStu); ?></h3>

                  <p>Students</p>
                </div>
               
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php print_r($totalTeachers); ?></h3>
                  <p>Teachers</p>
                </div>
                
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>            
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php print_r($totaltechnologies); ?></h3>

                  <p>Technologies</p>
                </div>
               
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php print_r($totalSubjects); ?></h3>

                  <p>Subjects</p>
                </div>
               
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>


            </div>
          </div>

      </section>
     
    </div> <!-- end -->  
    <!-- /.content -->













  
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

 
<!-- FLOT CHARTS -->
<script src="../../plugins/flot/jquery.flot.min.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="../../plugins/flot/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="../../plugins/flot/jquery.flot.pie.min.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="../../plugins/flot/jquery.flot.categories.min.js"></script>
<!-- Page script -->
<script>
  $(function () {
   
    var donutData = [
      {label: "computer", data: 30, color: "#3c8dbc"},
      {label: "AIDT", data: 20, color: "#0073b7"},     
      {label: "Food", data: 50, color: "#d2d6de"},
      {label: "RAC", data: 50, color: "#00c0ef"},       
       {label: "Mechatronics", data: 50, color: "#00a65a"}

    ];
    $.plot("#donut-chart", donutData, {
      series: {
        pie: {
          show: true,
          radius: 1,
          innerRadius: 0.5,
          label: {
            show: true,
            radius: 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }
        }
      },
      legend: {
        show: false
      }
    });
    
  });



  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
        + label
        + "<br>"
        + Math.round(series.percent) + "%</div>";
  }
</script>


</body>
</html>
