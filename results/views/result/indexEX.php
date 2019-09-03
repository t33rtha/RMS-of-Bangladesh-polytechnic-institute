<?php 
  require_once('../../conn/conn.php');
  include('../../common/session.php');

  $userId=$_SESSION['userId'];

  include('../../controllers/technology.php');
  include('../../controllers/session.php'); 
  include('../../controllers/semester.php');

  $tc_tf_pc_pf=[];
  $tc_tf_pc=[];
  $tc_tf=[];
  $pc_pf=[];

  $subjectSql="SELECT  *from subject S
                 INNER JOIN usersubject US
                    on S.subjectId=US.subjectId                 
                  where US.userId=$userId GROUP BY S.subjectId order by S.subjectName";
  $subjectResult=mysqli_query($conn,$subjectSql);

$tc2pf=mysqli_query($conn,"select *from subject where tc!=0  && tf!=0 && pc!=0 && pf!=0");
$tc2pc=mysqli_query($conn,"select *from subject where tc!=0  && tf!=0 && pc!=0 && pf=0");
$tc2tf=mysqli_query($conn,"select *from subject where tc!=0  && tf!=0 && pc=0 && pf=0");
$pc2pf=mysqli_query($conn,"select *from subject where tc=0  && tf=0 && pc!=0 && pf!=0");



//var_dump($tc2pf.$tc2pc.$tc2tf.$pc2pf);

foreach ($tc2pf as $tc2pf){ array_push($tc_tf_pc_pf,$tc2pf['subjectCode']);}

foreach ($tc2pc as $tc2pc){array_push($tc_tf_pc,$tc2pc['subjectCode']);}

foreach ($tc2tf as $tc2tf){array_push($tc_tf,$tc2tf['subjectCode']);}

foreach ($pc2pf as $pc2pf){array_push($pc_pf,$pc2pf['subjectCode']);}


echo "<pre>";
print_r($tc2pf);
echo "</pre>";


if(isset($_POST['entryMark'])){

      $range=$_POST['range'];
      $totalRecord=$_POST['totalRecord'];
      $tableCode=$_POST['subjectCode'];
      $roll=$_POST['roll'];
  
        if(isset($_POST['tc']) && $_POST['tc']!=null){
            $tc=$_POST['tc'];
        };
        if(isset($_POST['tf']) && $_POST['tf']!=null){
            $tf=$_POST['tf'];
        };
        if(isset($_POST['pc']) && $_POST['pc']!=null){
            $pc=$_POST['pc'];
        };
        if(isset($_POST['pf']) && $_POST['pf']!=null){
            $pf=$_POST['pf'];
        };


        if($totalRecord<=$range){
          $limit=$totalRecord;
        }else{
          $limit=$range;
        }


        //array
        $items=array();
        $values=array();

        print_r($pc2pf);

        // pc,pf
       if(in_array($tableCode,$pc2pf)){

          for ($i=0; $i<$limit ; $i++) {
              $items[$i]=array(
                'roll' => $roll[$i],
                'pc' => $pc[$i],
                'pf' => $pf[$i]
                );
            }

            foreach ($items as $key => $item) {
              $values[]="({$item['roll']},{$item['pc']},{$item['pf']})";

            };

           $values = implode(", ", $values);
         $sql = "INSERT INTO `$tableCode` (roll, pc, pf) VALUES {$values}";

       }
       if(in_array($tableCode,$tc_tf_pc_pf)){  //tc_tf_pc_pf
          for ($i=0; $i<$limit ; $i++) {
              $items[$i]=array(
                'roll' => $roll[$i],
                'tc' => $tc[$i],
                'tf' => $tf[$i],
                'pc' => $pc[$i],
                'pf' => $pf[$i]
                );
            }
            foreach ($items as $key => $item) {
              $values[]="({$item['roll']},{$item['tc']},{$item['tf']},{$item['pc']},{$item['pf']})";
            };
           $values = implode(", ", $values);
            $sql = "INSERT INTO `$tableCode` (roll, tc,tf, pc, pf) VALUES {$values}";

       }

       if(in_array($tableCode,$tc2pc)){// tc,tf,pc
          for ($i=0; $i <$limit ; $i++) {
              $items[$i]=array(
                'roll' => $roll[$i],
                'tc' => $tc[$i],
                'tf' => $tf[$i],
                'pc' => $pc[$i]
                );
            }

            foreach ($items as $key => $item) {
              $values[]="({$item['roll']},{$item['tc']},{$item['tf']},{$item['pc']})";
            };
           $values = implode(", ", $values);
         $sql = "INSERT INTO `$tableCode` (roll, tc,tf, pc) VALUES {$values}";

       }
       if(in_array($tableCode,$tc2tf)){ // tc,tf
          for ($i=0; $i <$limit ; $i++) {
              $items[$i]=array(
                'roll' => $roll[$i],
                'tc' => $tc[$i],
                'tf' => $tf[$i]
                );
            }
            foreach ($items as $key => $item) {
              $values[]="({$item['roll']},{$item['tc']},{$item['tf']})";
            };
           $values = implode(", ", $values);
        $sql = "INSERT INTO `$tableCode` (roll, tc,tf) VALUES {$values}";
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
       <div class="box box-info">
            <div class="box-header with-border">
                <div class="form-horizontal">

                    <?php  ?>
                    <div class="form-group">
                      <label for="technology" class="col-sm-2 control-label">Technology</label>
                      <div  class="col-sm-3">
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
                      <label for="semester" class="col-sm-1 control-label">Semester</label>
                      <div  class="col-sm-3">
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

                      <div class="col-sm-2 col-sm-offset-1">
                        <input type="checkbox" id="studentStatus" value="1">
                        <label for="studentStatus">Irregular Student</label>
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
                       <label for="subject" class="col-sm-1 control-label">subject</label>
                      <div  class="col-sm-3">
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

                    <div class="form-group">
                        <label for="session" class="col-sm-2 control-label sessionDiv">Session</label>
                        <div  class="col-sm-3">
                             <select id="session" class="form-control sessionDiv">
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

                        <label for="subject" class="col-sm-1 control-label"></label>
                        <div  class="col-sm-4">
                              <label>0</label>
                              <input id="studentsRange" data-slider-id='studentsRangeSlider' type="text" data-slider-min="0" data-slider-max="160" data-slider-step="2" data-slider-value="10"/>
                              <label>160</label>
                        </div>


                    </div>  



                    <div class="form-group">
                    <button id="searchStudents" onclick="searchStudents()" class="col-sm-2 col-sm-offset-3 btn btn-primary">Submit</button>
                    </div>
                </div>
                <!-- </form> -->
              </div>
            </div>
            <div class="row">
              <form method="POST">
                  <div class="entryPanel">
                    
                  </div>
              </form>
            </div>



          </section>
          </div> <!-- end -->
  
    <!-- /.content -->
  
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">   
    <strong>Copyright &copy; 2017 <a href="#">Thakurgoan Polytech Institute</a>.</strong> All rights reserved.
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
