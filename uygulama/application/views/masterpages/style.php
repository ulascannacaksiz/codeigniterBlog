<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css")?>">
<link rel="stylesheet" href="<?php echo base_url("assets/assets/css/fontawesome.css")?>">
<link rel="stylesheet" href="<?php echo base_url("assets/assets/css/templatemo-stand-blog.css")?>">
<link rel="stylesheet" href="<?php echo base_url("assets/assets/css/owl.css")?>">
</head>
<body>
<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="<?php echo  base_url("home/index")?>"><h2><?php echo $ayarlar[0]->logo?><em>.</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                   <?php


                   foreach ($veriler as $v){?>

                    <li class="nav-item <?php echo ($this->uri->segment(2)==$v->menu_url)?   "active": ""  ?>">
                        <a class="nav-link" href="<?php echo base_url("home/".$v->menu_url) ?>"><?php echo $v->menu_aciklama; ?>

                        </a>
                    </li>
                    <?php }
                   if($this->session->login_durum!=1){
                       echo '  <li class="nav-item">
                        <a class="nav-link"  data-toggle="modal" data-target="#girisModal" href="">Üye ol/Giriş Yap</a>
                    </li>';
                   }else{
                       echo ' <li class="nav-item">
                        <a class="nav-link" href="">Hoş Geldin '.$this->session->ad.' </a>
                    </li>';
                   }

                   ?>



                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="modal fade" id="girisModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="" style="margin-left: 50px">
                <a href="<?php echo base_url("home/girisyap")?>"> <img src="<?php echo base_url("assets/img/login.png")?>" width="150px;" height="150px">
                    <div>Giriş Yap</div>
                </a>
                </div>

                <div class="" style="margin-left: 100px;">
                <a href="<?php echo base_url("home/uye_ol")?>"> <img src="<?php echo base_url("assets/img/register.png")?>" width="150px;" height="150px">
                    <div>Kayıt ol</div></a>
                </div>
            </div>
            </div>

        </div>
    </div>
</div>
