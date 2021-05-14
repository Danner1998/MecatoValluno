<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./admin/personas/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./admin/personas/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./admin/personas/dist/css/adminlte.min.css">

  

</head>
<body class="hold-transition login-page">
  
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Mecato Valluno</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
    <a for="show"  href="index.php" class="close-btn fas fa-times" title="close"></a>
      <p class="login-box-msg">Iniciar sesión </p>

      <form action="./php/check.php" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- /.col -->
         
          <div   class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Iniciar </button>
          </div>
          <!-- /.col -->
          <?php
          if(isset($_GET['error'])){
            echo ' <br> <br><br><div  style="text-align:center;"  class="col-12 alert alert-danger" >'.$_GET['error'].'</div>';
          }
          ?>
        </div>
      </form>


      <!-- /.social-auth-links -->

 
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="./admin/personas/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./admin/personas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./admin/personas/dist/js/adminlte.min.js"></script>
</body>
</html>
