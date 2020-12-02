<!DOCTYPE html>
<html>
<head>
    <?php $url= base_url("assets/admintema");
    if($this->session->login_durum!=1){
     redirect("/admin/");
    }

    ?>
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
  <link rel="stylesheet" href="<?php echo  base_url("assets/dropzone/dropzone.css")?>">
  <link rel="stylesheet" href="<?php echo  base_url("assets/dropzone/custom.css")?>">

    <link rel="stylesheet" href="<?php echo $url."/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"?>">

  <link rel="stylesheet" href="<?php echo $url."/plugins/daterangepicker/daterangepicker.css"?>">
   <link rel="stylesheet" href="<?php echo $url."/plugins/summernote/summernote-bs4.css"?>">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link">
      <img src="" alt="" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">YÖNETİM PANELİ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo ""?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->ad." ".$this->session->soyad;?></a>
		  <a href="<?php echo base_url("admin/cikisyap")?>" class="d-block">Çıkış Yap</a>
        </div>

      </div>
        

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Site
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../index.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin Anasayfa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url("home")?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Siteye Geri Dön</p>
                </a>
              </li>
            </ul>
          </li>
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Yazı İşlemleri
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url("admin/yazi_ekle")?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yazi Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url("admin/yazi_duzenle")?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yazi Düzenle</p>
                </a>
              </li>

              
            </ul>
          </li>

            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Proje İşlemleri
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url("admin/proje_ekle")?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proje Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url("admin/proje_duzenle")?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proje Düzenle</p>
                </a>
              </li>


            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Kullanıcı İşlemleri
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="<?php echo base_url("admin/kullanici")?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kullanıcı Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="<?php echo base_url("admin/kullaniciduzenle")?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kullanıcı Düzenle</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="<?php echo base_url("admin/yorumonay")?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yorumları Onayla</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Site Yapılandırması
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url("admin/menuIslem")?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menü Ekle/Düzenle</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="<?php echo base_url("admin/kategoriIslem")?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Ekle/Düzenle</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="<?php echo base_url("admin/ayarlar")?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ayarlar</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

      <!-- ./wrapper -->

      <!-- jQuery -->
      <script src="<?php echo $url."/plugins/jquery/jquery.min.js"?>"></script>
      <script src="<?php echo base_url("assets/admintema/plugins/jquery/jquery-3.5.1.min.js")?>"></script>

      <script src="<?php echo base_url("assets/dropzone/dropzone.js")?>"></script>
      <script src="<?php echo base_url("assets/dropzone/custom.js")?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo $url."/plugins/jquery-ui/jquery-ui.min.js"?>"></script>

      <script>
          $.widget.bridge('uibutton', $.ui.button)
      </script>

      <script src="<?php echo $url."/plugins/bootstrap/js/bootstrap.bundle.min.js";?>"></script>

<script src="<?php echo $url."/plugins/chart.js/Chart.min.js"?>"></script>

      <script src="<?php echo $url."/plugins/sparklines/sparkline.js"?>"></script>

<script src="<?php echo $url."/plugins/jqvmap/jquery.vmap.min.js"?>"></script>
      <script src="<?php echo $url."/plugins/jqvmap/maps/jquery.vmap.usa.js"?>"></script>

<script src="<?php echo $url."/plugins/jquery-knob/jquery.knob.min.js"?>"></script>

      <script src="<?php echo $url."/plugins/moment/moment.min.js"?>"></script>
<script src="<?php echo $url."/plugins/daterangepicker/daterangepicker.js"?>"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="<?php echo $url."/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"?>"></script>
<!-- Summernote -->
<script src="<?php echo $url."/plugins/summernote/summernote-bs4.min.js"?>"></script>
      <!-- overlayScrollbars -->
      <script src="<?php echo $url."/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo $url."/dist/js/adminlte.js"?>"></script>
  
      <script src="<?php echo $url."/dist/js/pages/dashboard.js"?>"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="<?php echo $url."/dist/js/demo.js"?>"></script>
</body>
</html>

