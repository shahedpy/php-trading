<?php
session_start();
if(isset($_SESSION['username'])){
    header("location: ../dashboard/");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="dashboard/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dashboard/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    
    <div class="card card-outline card-primary">
      <!-- login logo -->
      <div class="card-header text-center">
        <!-- <a href="../" class="h1">
          <img src="../img/logo.png" alt="Logo" width="100px">
        </a> -->
      </div>
      <!-- /.login-logo -->
      
      <div class="card-body">
        <form action="api/login.php" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Phone" name="phone" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-user"></i>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8"></div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <a href="login/registration.php">Create Account</a>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
  


  <!--==================== Error Message ====================-->
  <?php
  if(isset($_SESSION['error_message'])){
    echo $_SESSION['error_message'];
    session_destroy();
  }
  ?>
  
  <!-- jQuery -->
  <script src="dashboard/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dashboard/dist/js/adminlte.min.js"></script>
  
</body>
</html>