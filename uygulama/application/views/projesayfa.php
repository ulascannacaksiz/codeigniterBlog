<?php $this->load->view("masterpages/style") ?>
<div class="heading-page header-text">
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4></h4>
                        <h2></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<body>
<div class="container">
    <?php foreach ($proje as $pr){?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <img class="" src="<?php echo base_url().$pr->yol."/".$pr->url?>" width="500px;" height="250px;"
                         alt="Proje Resim">
                </div>
                <div class="col-md-6">
                    <h1 class="display=4"><?php echo $pr->proje_isim?></h1>
                    <p class="card-text"><?php  $metin=$pr->amaci; $tanitim=substr($metin,0,214); echo $tanitim;?></p>
                    <a href="<?php echo base_url("home/proje/").$pr->sef_link?>">Devamını Oku...</a>
                </div>
            </div>
        </div>
    </div>
<?php }?>




    <div class="col-lg-12">
        <ul class="page-numbers">

            <?php echo '<li class="sayfalama">'.$linkler.'</li>'; ?>

        </ul>
    </div>
</div>

<?php $this->load->view("masterpages/scripts") ?>
</body>

</html>