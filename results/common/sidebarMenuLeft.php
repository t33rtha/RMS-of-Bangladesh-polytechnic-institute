 <ul class="sidebar-menu">
        <li class="header">Main Menu Link</li>
        <?php 
              if($_SESSION['type']=='admin'){
            ?>
        <li class="active" ><a href="../../views/dashboardA/"><i class="fa  fa-dashboard"></i> <span>Dashboard</span>
        </a></li>
        <?php }else{ ?>
         <li class="active"><a href="../../views/dashboardT/"><i class="fa  fa-dashboard"></i> <span>Dashboard</span>
        </a></li>
        <?php } ?>       

        <li><a href="../../views/stdinfo/"><i class="fa  fa-users"></i> <span>Student</span></a></li>
        

        <li class="active treeview">
          <a href="#"><i class="fa fa-graduation-cap"></i> <span>Marks</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="../../views/result/"><i class="fa fa-pencil"></i> <span>Marks Entry </span></a>
              </li>
              <li><a href="../../views/marks"><i class="fa fa-bullseye"></i>Marks Show</a></li>
          </ul>
        </li>



      <?php if($_SESSION['type']=='admin'){ ?>
        <li class="treeview">
            <a href="#"><i class="fa fa-link"></i> <span>Primary Data</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>

            <ul class="treeview-menu">                        
              <li><a href="../../views/semester"><i class="fa fa-dot-circle-o"></i> <span>Semester</span></a></li>
               <li><a href="../../views/session"><i class="fa fa-dot-circle-o"></i> <span>Session</span></a></li>
               <li><a href="../../views/technology"><i class="fa fa-desktop"></i> <span>Technology</span></a></li>
               <li><a href="../../views/subject"><i class="fa fa-book"></i> <span>Subject</span></a></li>
               <li><a href="../../views/teacher"><i class="fa fa-male"></i> <span>Teacher</span></a></li>
             </ul>  
          </li>               
       </li>
       <li class="treeview">
          <a href="#"><i class="fa fa-gg"></i> <span>Control Unit 1</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../../views/studentCtrl"><i class="fa fa-child"></i>Student Control</a></li>
            <li><a href="../../views/teacherCtrl"><i class="fa fa-user-plus"></i>Teacher Control</a></li>
            <li><a href="../../views/subjectCtrl"><i class="fa fa-dot-circle-o"></i>Subject Control</a></li>
            
          </ul>
        </li>

        
       <?php
          }
         ?> 
         
          <li class="treeview">
          <a href="#"><i class="fa fa-gg"></i> <span>Control Unit 2</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../../views/studentCtrl"><i class="fa fa-child"></i>Student Control</a></li>
            <li><a href="../../views/subjectCtrl"><i class="fa fa-dot-circle-o"></i>Subject Control</a></li>
            
          </ul>
        </li>
        

         <li class="active treeview">
          <a href="#"><i class="fa fa-line-chart"></i> <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">              
             <li><a href="../../views/resultA/"><i class="fa fa-graduation-cap"></i> <span>Marks Sheet</span></a></li> 
            <li><a href="../../views/tabulation/"><i class="fa fa-server"></i> Tabulation Sheet</a></li>
            <!--<li><a href="../../views/resultsheet/"><i class="fa fa-pie-chart"></i> Result Sheet</a></li>-->
          </ul>
        </li>
      </ul>