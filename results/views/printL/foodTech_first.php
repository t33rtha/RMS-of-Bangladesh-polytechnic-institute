<?php 
  require_once('../../conn/conn.php');
  include('../../common/session.php');
  require_once('../../controllers/class.marksheet.php');

  $getRoll=$_GET['roll'];

 ?>

<!DOCTYPE html>
<html>
<head>
  <!-- header links -->
  <?php include('../../common/headerlinks.php'); ?>
</head>
<body onload="window.print()" class="hold-transition fixed skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <?php //include('../../common/headerInner.php'); ?>  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">       

  <!-- Main content -->
  <section class="content">     
          <div class="row">
            <!-- <form method="POST"> -->
                <div id="marksheet" class="marksheet">


<?php

  $markSQL="SELECT si.id,si.roll,si.registrationNo,si.name,si.motherName,si.fatherName,t.technologyCode,t.technologyName,s.session,si.shift,sem.semester,fe.tc as fe_tc,fe.tf as fe_tf,fe.pc as fe_pc,fe.pf as fe_pf,ed.pc as ed_pc,ed.pf as ed_pf,ba.tc as ba_tc,ba.tf as ba_tf,ba.pc as ba_pc,en.tc as en_tc,en.tf as en_tf,bw.pc as bw_pc,bw.pf as bw_pf,ma.tc as ma_tc,ma.tf as ma_tf,ma.pc as ma_pc,chem.tc as chem_tc,chem.tf as chem_tf,chem.pc as chem_pc,chem.pf as chem_pf from studentinformation si LEFT JOIN technology t on t.technologyId=si.technologyId LEFT JOIN session s on s.sessionId=si.sessionId LEFT JOIN semester sem on sem.semesterId=si.semesterId LEFT JOIN `61011` ed on ed.roll=si.roll LEFT JOIN `67011` bw on bw.roll=si.roll LEFT JOIN `66911` fe on fe.roll=si.roll LEFT JOIN `65911` ma on ma.roll=si.roll LEFT JOIN `65913` chem on chem.roll=si.roll LEFT JOIN `65712` en on en.roll=si.roll LEFT JOIN `65711` ba on ba.roll=si.roll WHERE si.roll=$getRoll";

  $markResult=mysqli_query($conn,$markSQL);
  $count=$markResult->num_rows; 

  $ca_t=0;
  $it_t=0;
  $ee_t=0;
  $ma_t=0;
  $phy_t=0;
  $en_t=0;
  $ba_t=0;
  

  function countGP($sum,$subjectMark){

    $currentMarks=(100*$sum)/($subjectMark);
    
    if($currentMarks>=80 && $currentMarks<=100)  {
      $gp="4.00";
    }else if($currentMarks>=75 && $currentMarks<80) {
      $gp="3.75";
    }else if($currentMarks>=70 && $currentMarks<75) {
      $gp="3.50";
    }else if($currentMarks>=65 && $currentMarks<70) {
      $gp="3.25";
    }else if($currentMarks>=60 && $currentMarks<65) {
      $gp="3.00";
    }else if($currentMarks>=55 && $currentMarks<60) {
      $gp="2.75";
    }else if($currentMarks>=50 && $currentMarks<55) {
      $gp="2.50";
    }else if($currentMarks>=45 && $currentMarks<50) {
      $gp="2.25";
    }else if($currentMarks>=40 && $currentMarks<45) {
      $gp="2.00";
    }else{
      $gp="0.00";
    }

    return $gp;

  }

  function countGL($sum,$subjectMark){

    $currentMarks=(100*$sum)/($subjectMark);
    
    if($currentMarks>=80 && $currentMarks<=100)  {
      echo "A+";
    }else if($currentMarks>=75 && $currentMarks<80) {
      echo "A";
    }else if($currentMarks>=70 && $currentMarks<75) {
      echo "A-";
    }else if($currentMarks>=65 && $currentMarks<70) {
      echo "B+";
    }else if($currentMarks>=60 && $currentMarks<65) {
      echo "B";
    }else if($currentMarks>=55 && $currentMarks<60) {
      echo "B-";
    }else if($currentMarks>=50 && $currentMarks<55) {
      echo "C+";
    }else if($currentMarks>=45 && $currentMarks<50) {
      echo "C";
    }else if($currentMarks>=40 && $currentMarks<45) {
      echo "D";
    }else{
      echo "F";
    }

  }

 ?>
<script type="text/javascript">
</script>

  <?php 
    if(isset($count) && $count>0){

    while ($rowMark=$markResult->fetch_assoc()) {
    $m_o=0;
    $cgpa=array();

  ?>  


<section class="invoice">
    
      <div class="row">
          <center> <img class="" style="height:100px;" src="img/bteb.png"> </center>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <center>
            <h2>BANGLADESH TECHNICAL EDUCATION BOARD</h2>
            <h2>DIPLOMA IN ENGINEERING</h2> 
            </center>
            
          </div>
        </div>
        <div class="row">
           <div class="col-sm-3 col-xs-3">
            <div class="form-group">
              <span>Serial No : </span>
              <label>
                <?php 
                  echo $marksheets->generateKey($rowMark['technologyCode'],$rowMark['id']);
                 ?>
              </label>
            </div>
            <div class="form-group">
              <span>Technology : </span>
              <label><?php echo $rowMark['technologyName'];?></label>
            </div>
          </div>

          <div class="col-sm-5 col-xs-5">
            <center>
              <div class="form-group">
                <span>Year of Examination : </span>
                <label>2016</label>
              </div>
              <br><span>(Held in January, 2017)</span>
             <h4 class="noPadding"><b>First Semester</b></h4>
            <h3 style="font-size: 20px;" class="noPadding">Enginering Institute</h3>
            </center>
            <center>
             <h4 style="font-family:Old English Text MT;" class="noPadding">ACADEMIC TRANSCRIPT</h4> 
            </center>            
          </div>

          <div class="col-sm-4 col-xs-4">
            <table border="1" class="text-center pull-right" style="font-size:12px;">
            <tr> 
              <td>Equivalent Marks</td>
              <td>Letter<br>Grade</td>
              <td>Grade<br>point</td>
            </tr>
            <tr> 
              <td>(80 - 100)%</td>
              <td>A+</td>
              <td>4.00</td>
            </tr>
            <tr> 
              <td>(75 -79)%</td>
              <td>A</td>
              <td>3.75</td>
            </tr>
            <tr> 
              <td>(70 - 74)%</td>
              <td>A-</td>
              <td>3.50</td>
            </tr>
            <tr> 
              <td>(65 - 69)% </td>
              <td>B+</td>
              <td>3.25</td>
            </tr>
            <tr> 
              <td>(60 - 64)%</td>
              <td>B</td>
              <td>3.00</td>
            </tr>
            <tr> 
              <td>(55 - 59)%  </td>
              <td>B-</td>
              <td>2.75</td>
            </tr>
            <tr> 
              <td>(50 - 54)%  </td>
              <td>C+</td>
              <td>2.50</td>
            </tr>
            <tr> 
              <td>(45 - 49)%</td>
              <td>C</td>
              <td>2.25</td>
            </tr>
            <tr> 
              <td>(40 - 44)%</td>
              <td>D</td>
              <td>2.00</td>
            </tr>
            <tr> 
              <td>(00 - 39)% </td>
              <td>F</td>
              <td>0.0</td>
            </tr>
          </table>
          </div>
        </div>

         <div class="row">
          <div class="col-md-12"> 
            <div class="gpa_bottom_area"> 
              <div class="discipt"> 
                <p><span class="col-sm-2">Student's Name : </span><b><?php echo $rowMark['name'];?></b></p>
                <p><span class="col-sm-2">Fathers's Name : </span><b><?php echo $rowMark['fatherName'];?></b></p>
                <p><span class="col-sm-2">Mother's Name : </span><b><?php echo $rowMark['motherName'];?></b>
              </div>
            </div>
          </div>
        </div>
       

        <div class="row"> <!-- above main table -->
              <div class="col-sm-3 col-xs-3 col-md-3">
                <span>Board Roll :</span>
                <span><?php echo $rowMark['roll']; ?></span>
              </div>  
              <div class="col-sm-3 col-xs-3 col-md-3">
                <span>Registration No :</span>
                <span><?php echo $rowMark['registrationNo']; ?></span>
            </div>
              <div class="col-sm-3 col-xs-3 col-md-3">
                <span>Session :</span>
                <span> <?php echo $rowMark['session']; ?></span>
              </div> 
              <div class="col-sm-3 col-xs-3 col-md-3">
                <span>Shift :</span>
                <span> 
                <?php echo $marksheets->shiftTotext($sessionValue=$rowMark['shift']);?>
                  
                </span>
              </div>
        </div>


        <!-- main content -->
         <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
         <table style="font-size: 13px;" class="table text-center table-bordered table-striped">
            <thead>
            <tr>
              <th>S/N</th>
              <th>Subject Code</th>
              <th>Name of<br>the Subject</th>
              <th>Full Marks</th>
              <th>Marks Obtained</th>
              <th class="text-center">Grade<br>Letter(GL)</th>
              <th class="text-center">Grade<br>Point(GP)</th>
              <th class="text-center">Grade-Point<br>Avg(GPA)</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>61011</td>
                <td>Engineering Drawing</td>
                <td>100</td>
                <td>
                  <?php 

                      if($rowMark['ed_pc']<20 || $rowMark['ed_pf']<20){
                        $m_o=0;
                      }else{
                        $m_o=(($rowMark['ed_pc'])+($rowMark['ed_pf']));
                      }

                      
                      echo $m_o;
                    
                   ?>
                </td>
                <td>
                  <?php                     
                    countGL($m_o,$subjectMark=100);
                   ?>
                </td>
                <td>
                  <?php 
                    countGP($m_o,$subjectMark=100);
                    array_push($cgpa,countGP($m_o,$subjectMark=100));
                    echo end($cgpa);
                   ?>
                </td> 
                <td rowspan="6"></td>             
              </tr>
              <tr>
                <td>2</td>
                <td>67011</td>
                <td>Basic Workshop Practice</td>
                <td>100</td>
                <td>
                  <?php 
                    if($rowMark['bw_pc']<20 || $rowMark['bw_pf']<20){
                      $m_o=0;
                    }else{
                      $m_o=(($rowMark['bw_pc'])+($rowMark['bw_pf']));
                    }                   
                    echo $m_o;
                    
                   ?>
                </td>
                <td>
                  <?php 
                    countGL($m_o,$subjectMark=100);
                   ?>
                </td>
                <td>
                  <?php 
                    countGP($m_o,$subjectMark=100);
                    array_push($cgpa,countGP($m_o,$subjectMark=100));
                    echo end($cgpa);
                   ?>
                </td>               
              </tr>
              <tr>
                <td>3</td>
                <td>66911</td>
                <td>Food Engineering Fundamentals</td>
                <td>150</td>
                <td>
                  <?php 
                    if($rowMark['fe_tc']<16 || $rowMark['fe_tf']<24 || $rowMark['fe_pc']<10 || $rowMark['fe_pf']<10){
                      $m_o=0;
                    }else{
                      $m_o=(($rowMark['fe_tc'])+($rowMark['fe_tf'])+($rowMark['fe_pc'])+($rowMark['fe_pf']));
                    }
                                          
                    echo $m_o;
                   ?>
                </td>
                <td>
                  <?php countGL($m_o,$subjectMark=150); ?>
                </td>
                <td>
                  <?php 
                  countGP($m_o,$subjectMark=150); 
                  array_push($cgpa,countGP($m_o,$subjectMark=150));
                  echo end($cgpa);
                  ?>
                </td>               
              </tr>
              <tr>
                <td>4</td>
                <td>65911</td>
                <td>Mathmatics-1</td>
                <td>200</td>
                <td>
                  <?php 
                    if($rowMark['ma_tc']<24 || $rowMark['ma_tf']<36 || $rowMark['ma_pc']<20){
                      $m_o=0;
                    }else{
                    $m_o=(($rowMark['ma_tc'])+($rowMark['ma_tf'])+($rowMark['ma_pc']));
                    }                   
                    echo $m_o;
                      
                   ?>
                </td>
                <td>
                  <?php countGL($m_o,$subjectMark=200); ?>
                </td>
                <td>
                  <?php
                   countGP($m_o,$subjectMark=200); 
                   array_push($cgpa,countGP($m_o,$subjectMark=200));
                   echo end($cgpa);

                   ?>
                </td>               
              </tr>
              <tr>
                <td>5</td>
                <td>65913</td>
                <td>Chemistry</td>
                <td>200</td>
                <td>
                  <?php 
                    if($rowMark['chem_tc']<24 || $rowMark['chem_tf']<36 || $rowMark['chem_pc']<10 || $rowMark['chem_pf']<10){
                      $m_o=0;
                    }else{
                      $m_o=(($rowMark['chem_tc'])+($rowMark['chem_tf'])+($rowMark['chem_pc'])+($rowMark['chem_pf']));
                    }                     
                    echo $m_o;
                      
                   ?>
                </td>
                <td>
                  <?php countGL($m_o,$subjectMark=200); ?>
                </td>
                <td>
                  <?php
                   countGP($m_o,$subjectMark=200);
                   array_push($cgpa,countGP($m_o,$subjectMark=200));
                   echo end($cgpa);

                    ?>
                </td>               
              </tr>
              <tr>
                <td>6</td>
                <td>65712</td>
                <td>English</td>
                <td>100</td>
                <td>
                  <?php 
                      if($rowMark['en_tc']<16 || $rowMark['en_tf']<24){
                        $m_o=0;
                      }else{
                        $m_o=(($rowMark['en_tc'])+($rowMark['en_tf']));
                      }                     
                      echo $m_o;
                   ?>
                </td>
                <td>
                  <?php countGL($m_o,$subjectMark=100); ?>
                </td>
                <td>
                  <?php 
                  countGP($m_o,$subjectMark=100);
                   array_push($cgpa,countGP($m_o,$subjectMark=100));
                   echo end($cgpa);
                   ?>
                </td>               
              </tr>
              <tr>
                <td>7</td>
                <td>65711</td>
                <td>Bangla</td>
                <td>200</td>
                <td>
                  <?php 
                      if($rowMark['ba_tc']<24 || $rowMark['ba_tf']<36 || $rowMark['ba_pc']<20){
                        $m_o=0;
                      }else{
                        $m_o=(($rowMark['ba_tc'])+($rowMark['ba_tf'])+($rowMark['ba_pc']));
                      }                     
                      echo $m_o;
                    
                   ?> 
                </td>
                <td>
                  <?php countGL($m_o,$subjectMark=200); ?>
                </td>
                <td>
                  <?php 
                  countGP($m_o,$subjectMark=200); 
                   array_push($cgpa,countGP($m_o,$subjectMark=200));
                   echo end($cgpa);
                  ?>
                </td>
                <td style="font-size: 16px;">
                  <b>
                    <?php 
                      if(in_array('0.00',$cgpa)){
                        echo "0.00";
                      }else{
                        $credits=['2','2','3','4','4','2','4'];
                        $grandCgpa=[];
                        foreach ($cgpa as $key => $value) {
                          $grandCgpa[$key]=$value*$credits[$key];
                        }

                        $gpa=round((array_sum($grandCgpa)/22),2);
                        echo $gpa;

                        
                      }

                     ?>
                  </b>
                </td>
              </tr>
            
            
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

     <div class="row">
        <div class="col-sm-4 pull-left text-center">
        <br><br> <hr class="signatureLine">
          <label>Prepared by</label><br>       
        </div>
        <div class="col-sm-4 pull-right text-center">
          <br><br><hr class="signatureLine">
          <label>Head of the Department</label><br>      
        </div>
      </div>      
      <div class="row">
        <div class="col-sm-4 pull-left text-center">
          <br><hr class="signatureLine">
          <label>Vice Principal</label>         
        </div>
        <div class="col-sm-4 pull-right text-center">         
        <br><hr class="signatureLine">
          <label>Principal</label><br>
      <label>Enginering Institute,</label><br>
      <label>Dhaka</label>                   
      </div>
      </div>       
     

        <!-- main content -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-xs-12">
            <a href="../print/foodTech.php?roll=<?php echo $rowMark['roll'];?>" target="_blank" class="btn btn-success pull-right"><i class="fa fa-print"></i> P r i n t</a>          
          </div>
        </div>
  </section>

  



    <?php
      }
    }
  ?>      
  
  

      
                     
                  </div>
              <!-- </form> -->
            </div>



          </section>
          </div> 
 
</div>

</body>
</html>
