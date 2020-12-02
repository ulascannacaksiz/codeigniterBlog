<!DOCTYPE html>
<html>
<head>
    <?php $url= base_url("assets/admintema"); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo $url."/plugins/fontawesome-free/css/all.min.css"?>">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo $url."/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"?>">

    <link rel="stylesheet" href="<?php echo $url."/plugins/icheck-bootstrap/icheck-bootstrap.min.css"?>">

    <link rel="stylesheet" href="<?php echo $url."/plugins/jqvmap/jqvmap.min.css"?>">

    <link rel="stylesheet" href="<?php echo $url."/dist/css/adminlte.min.css"?>">

    <link rel="stylesheet" href="<?php echo $url."/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"?>">

    <link rel="stylesheet" href="<?php echo $url."/plugins/daterangepicker/daterangepicker.css"?>">
    <link rel="stylesheet" href="<?php echo $url."/plugins/summernote/summernote-bs4.css"?>">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Admin</b>Panel</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?php echo  base_url("admin/girisyap")?>" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">
                Beni Hatırla
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <!-- /.social-auth-links -->


    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

</body>
</html>
