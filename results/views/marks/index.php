<?php 
  require_once('../../conn/conn.php');
  include('../../common/session.php');

  $userId=$_SESSION['userId'];

  include('../../controllers/technology.php');
  include('../../controllers/session.php'); 
  include('../../controllers/semester.php'); 

  $subjectSql="SELECT  *from subject S
                 INNER JOIN usersubject US
                    on S.subjectId=US.subjectId                 
                  where US.userId=$userId group by S.subjectId";
  $subjectResult=mysqli_query($conn,$subjectSql);

//   if(isset($_POST['updateMark'])){
//
//      $tableCode=$_POST['subjectCode'];
//      $roll=$_POST['roll'];
//
//      if(isset($_POST['tc']) && $_POST['tc']!=null){$tc=$_POST['tc'];};
//      if(isset($_POST['tf']) && $_POST['tf']!=null){$tf=$_POST['tf'];};
//      if(isset($_POST['pc']) && $_POST['pc']!=null){$pc=$_POST['pc'];};
//      if(isset($_POST['pf']) && $_POST['pf']!=null){$pf=$_POST['pf'];};
//
//
//
//      //   // pc,pf
//       if($tableCode=='66611' || $tableCode=='66621' ||$tableCode=='66623'||$tableCode=='66633'|| $tableCode=='66612' || $tableCode=='61011'|| $tableCode=='66632' || $tableCode=='66634' || $tableCode=='66633' || $tableCode=='67011' || $tableCode=='65812' || $tableCode=='67221'|| $tableCode=='67023'|| $tableCode=='67021'){
//        $sql = "UPDATE `$tableCode` SET pc=$pc,pf=$pf where roll=$roll";
//       }
//
//      //   // tc,tf,pc,pf
//       if($tableCode=='66712'||$tableCode=='66631'|| $tableCode=='66831'|| $tableCode=='69231'|| $tableCode=='67031'|| $tableCode=='65912' || $tableCode=='66822' || $tableCode=='66911' || $tableCode=='65913' || $tableCode=='67211' ||$tableCode=='67231'|| $tableCode=='68711'|| $tableCode=='66435' || $tableCode=='68721' || $tableCode=='68731' || $tableCode=='68732' || $tableCode=='68712' || $tableCode=='65922'|| $tableCode=='67022'){
//        $sql = "UPDATE `$tableCode` SET tc=$tc,tf=$tf,pc=$pc,pf=$pf where roll=$roll";
//       }
//
//      //    // tc,tf,pc
//       if($tableCode=='65911' || $tableCode=='65711'|| $tableCode=='65921' || $tableCode=='65722'|| $tableCode=='65931'){
//        $sql = "UPDATE `$tableCode` SET tc=$tc,tf=$tf,pc=$pc where roll=$roll";
//       }
//
//      //    // tc,tf
//       if($tableCode=='65712' || $tableCode=='65811'){
//         $sql = "UPDATE `$tableCode` SET tc=$tc,tf=$tf where roll=$roll";
//       }
//
//       mysqli_query($conn,$sql);
//       header('Location:index.php');
//  }



   if(isset($_POST['updateMark'])){

      $tableCode=$_POST['subjectCode'];
      $roll=$_POST['roll'];

      if(isset($_POST['tc']) && $_POST['tc']!=null){$tc=$_POST['tc'];};
      if(isset($_POST['tf']) && $_POST['tf']!=null){$tf=$_POST['tf'];};
      if(isset($_POST['pc']) && $_POST['pc']!=null){$pc=$_POST['pc'];};
      if(isset($_POST['pf']) && $_POST['pf']!=null){$pf=$_POST['pf'];};


      //to get subject code
       $tc_tf_pc_pf=[];
       $tc_tf_pc=[];
       $tc_tf=[];
       $pc_pf=[];


       $tc2pf=mysqli_query($conn,"select *from subject where tc!=0  && tf!=0 && pc!=0 && pf!=0");
       $tc2pc=mysqli_query($conn,"select *from subject where tc!=0  && tf!=0 && pc!=0 && pf=0");
       $tc2tf=mysqli_query($conn,"select *from subject where tc!=0  && tf!=0 && pc=0 && pf=0");
       $pc2pf=mysqli_query($conn,"select *from subject where tc=0  && tf=0 && pc!=0 && pf!=0");


       foreach ($tc2pf as $tc2pf){
           array_push($tc_tf_pc_pf,$tc2pf['subjectCode']);
       }

       foreach ($tc2pc as $tc2pc){
           array_push($tc_tf_pc,$tc2pc['subjectCode']);
       }

       foreach ($tc2tf as $tc2tf){
           array_push($tc_tf,$tc2tf['subjectCode']);
       }

       foreach ($pc2pf as $pc2pf){
           array_push($pc_pf,$pc2pf['subjectCode']);
       }
      //to get subject code



       // pc,pf
       if(in_array($tableCode,$pc_pf)){
        $sql = "UPDATE `$tableCode` SET pc=$pc,pf=$pf where roll=$roll";
       }

       // tc,tf,pc,pf
       if(in_array($tableCode,$tc_tf_pc_pf)){
        $sql = "UPDATE `$tableCode` SET tc=$tc,tf=$tf,pc=$pc,pf=$pf where roll=$roll";
       }

       // tc,tf,pc
       if(in_array($tableCode,$tc_tf_pc)){
        $sql = "UPDATE `$tableCode` SET tc=$tc,tf=$tf,pc=$pc where roll=$roll";
       }

       // tc,tf
       if(in_array($tableCode,$tc_tf)){
         $sql = "UPDATE `$tableCode` SET tc=$tc,tf=$tf where roll=$roll";
       }

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
        Result Entry
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

      <div class="row">
        <div class="col-md-4">
           <div class="box box-info">
            <div class="box-header with-border">
                <div class="form-horizontal">
                    <div class="form-group">
                      <label for="technology" class="col-sm-3 control-label">Technology</label>
                      <div  class="col-sm-9">
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
                    <div class="form-group">
                      <label for="semester" class="col-sm-3 control-label">Semester</label>
                      <div  class="col-sm-9">
                           <select id="semester" class="form-control">
                              <?php 
                                  if($semesterResult->num_rows > 0){
                                    while ($semesterRow=$semesterResult->fetch_assoc()) {
                                 ?>
                                 <option value="<?php echo $semesterRow['semesterId']; ?>"><?php echo $semesterRow['semester']; ?></option>

                                 <?php
                                    }
                                  }
                                ?>                          
                          </select>
                      </div>
                    </div>                
                    <div class="form-group">
                      <label for="shift" class="col-sm-3 control-label">Shift</label>
                      <div  class="col-sm-9">
                           <select id="shift" class="form-control">
                            <option value="1">1st Shift</option>                        
                            <option value="2">2nd Shift</option>                        
                          </select>
                      </div>
                      
                    </div>
                    <div class="form-group">
                       <label for="subject" class="col-sm-3 control-label">subject</label>
                      <div  class="col-sm-9">
                           <select id="subject" class="form-control">
                               <?php 
                                if($subjectResult->num_rows > 0){
                                  while ($subjectRow=$subjectResult->fetch_assoc()) {
                               ?>
                                      <option
                                              value="<?php echo $subjectRow['subjectId']; ?>"><?php echo $subjectRow['subjectName']."( ".$subjectRow['subjectCode']." )"; ?></option>

                                      <?php
                                  }
                                }
                                ?>                    
                          </select>
                      </div>
                    </div>

                    <div class="sessionDiv" class="form-group">
                        <label for="session" class="col-sm-3 control-label">Session</label>
                      <div  class="col-sm-9">
                           <select id="session" class="form-control">
                               <?php 
                                if($sessionResult->num_rows > 0){
                                  while ($sessionRow=$sessionResult->fetch_assoc()) {
                               ?>
                               <option value="<?php echo $sessionRow['sessionId']; ?>"><?php echo $sessionRow['session']; ?></option>

                               <?php
                                  }
                                }
                                ?>                    
                          </select>
                      </div>
                    </div>  

                    <!-- irregular student -->
                     <div class="form-group">
                        <label for="session" class="col-sm-3 control-label"></label>
                      <div  class="col-sm-9 col-sm-offset-3">
                           <input type="checkbox" id="studentStatus" value="1">
                        <label for="studentStatus">Irregular ( If )</label>
                      </div>
                    </div> 



                    <div class="form-group">
                    <button id="searchStudents" onclick="searchStudents()" class="col-sm-3 col-sm-offset-4 btn btn-info">Submit</button>
                    </div>
                </div>                
                <!-- </form> -->
              </div>
            </div>
        </div>

        <div class="col-md-8">
          <form method="POST">
                  <div class="entryPanel">
                    
                  </div>
              </form>
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


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Marks Update</h4>
        </div>
        <form method="POST">
          <div class="modal-body"> 
          
          </div>
            <div class="modal-footer">
              <div class="btn-group">
                <button type="submit" name="updateMark" class="btn btn-primary">&nbsp;&nbsp;Update&nbsp;&nbsp;</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>          
            </div>
        </form>
      </div>
      
    </div>
  </div>
  



  <!-- functional js -->
  <script src="functions.js" type="text/javascript"></script>
 
  
 
</body>
</html>
