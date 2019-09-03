<?php 
  session_start();
  require_once('conn/conn.php');

  if(isset($_POST['signin'])){
      $email=$_POST['email'];
      $password=$_POST['password'];
      $sql="select * from users u
            left join usersubject us
            on u.userId=us.userId where userEmail='$email' and userPassword='$password'";
      $result=mysqli_query($conn,$sql);
      $row=$result->fetch_assoc();

      $_SESSION['userEmail']=$row['userEmail'];
      $_SESSION['userId']=$row['userId'];
      $_SESSION['type']=$row['type'];
      
      $rowNum=$result->num_rows;
      
      if(isset($rowNum) && $rowNum>0){
          if($row['type']=='admin'){
              header('Location:views/dashboardA/');
            }else{
              header('Location:views/dashboardT/');
            }
        }else{
          echo '<div class="col-md-4 col-md-offset-4">
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4 class="col-md-4"><i class="icon fa fa-ban"></i> Alert!</h4>
                Wrong Username or Password !
              </div>        
            </div>';
        }     

  }

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Result Management</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
 
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

</head>
<body class="hold-transition" style="background-color:#0FD7E4;">
<div class="login-box">
  <div class="login-logo">
    <img src="dist/img/login.png" height="100" width="100">
    <a href="#"><b>Result </b>Management System</a>
 </div>
  <!-- /.login-logo-->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in</p>
    <form action="" method="post" >
      <div class="form-group has-feedback">
        <input type="text" autocomplete="off" name="email" class="form-control" placeholder="Email">
        
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
      
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <!-- <input type="checkbox"> Remember Me -->
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="signin" class="btn btn-success btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="#">I forgot my password</a><br>    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>

</body>
</html>
