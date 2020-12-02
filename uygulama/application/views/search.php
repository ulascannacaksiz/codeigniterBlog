<?php $this->load->view("masterpages/style",$this->data)?>
<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Banner Ends Here -->

<body>


<section class="blog-posts grid-system">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">
                        <?php foreach($gonderilen as $gd){

                            ?>
                            <div class="col-lg-6">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="<?php echo base_url("uploads/$gd->url")?>" width="350" height="321" alt="">
                                    </div>
                                    <div class="down-content">
                                           <span> <?php
                                               foreach ($kategori as $ct){
                                                   foreach ($ct as $s){
                                                       if($s->id==$gd->kategori_id){
                                                           echo $s->aciklama;
                                                       }
                                                   }}
                                               ?></span>
                                        <a href="<?php echo base_url("home/yazi/").$gd->sef;?>"><h4><?php echo $gd->baslik;?></h4></a>
                                        <ul class="post-info">
                                            <li><a href="#"><?php foreach ($yazar as $p){if($p->id==$gd->yazar_id){ echo $p->isim." ".$p->soyisim; }}  ?></a></li>
                                            <li><a href="#"><?php echo $gd->tarih;?></a></li>
                                        </ul>
                                        <p><?php $tanitim = $gd->yazi;
                                            $tanitim = substr($tanitim,0,300);
                                            echo $tanitim."...";
                                            ?></p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php }?>


                        <div class="col-lg-12">
                            <ul class="page-numbers">
                                <?php echo '<li class="sayfalama">'.$link.'</li>'; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view("masterpages/sidebar",$this->data)?>






            <!-- Bootstrap core JavaScript -->
            <?php $this->load->view("masterpages/scripts",$this->data)?>

</body>
</html>