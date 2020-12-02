<?php $this->load->view("masterpages/style",$this->data)?>
<!-- Page Content -->
<!-- Banner Starts Here -->


<div class="main-banner header-text">

    <div class="container-fluid">
        <div class="owl-banner owl-carousel">
            <?php
            foreach ($son as $rp){
            foreach ($rp as $c){

    ?>
            <div class="item">
                <img src="<?php foreach ($resimler as $r){if($r->yazi_id==$c->yid){echo base_url("uploads/$r->url");} }?>    " id="slider-resim" alt="" width="621px" height="537px">
                <div class="item-content">
                    <div class="main-content">
                        <div class="meta-category">
                            <span><?php foreach ($kategori as $ct){foreach ($ct as $s){
                                    if($c->kategori_id==$s->id){echo $s->aciklama;}}} ?></span>
                        </div>
                        <a href="<?php echo base_url("home/yazi/"). $c->sef?>"><h4><?php echo $c->baslik?></h4></a>
                        <ul class="post-info">
                            <li><a href="#"><?php foreach ($yazar as $p){if($p->id==$c->yazar_id){ echo $p->isim." ".$p->soyisim; }}  ?></a></li>
                            <li><a href="#"> <?php echo $c->tarih ?>  </a></li>

                        </ul>
                    </div>
                </div>
            </div>
<?php }}?>






        </div>
    </div>
</div>
<!-- Banner Ends Here -->

<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">
                        <!---
                        BAŞLANGIÇ
                        -->
                        <?php foreach ($degerler as $gelen){ $yazi_id = $gelen->yid;?>

                        <div class="col-lg-12">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="<?php echo base_url("uploads/$gelen->url")?>" width="730" height="325" alt="">
                                </div>
                                <div class="down-content">
                                    <span><?php

                                        foreach ($kategori as $ct) {
                                            foreach ($ct as $s) {
                                                if ($s->id == $gelen->kategori_id) {
                                                    echo $s->aciklama;
                                                }
                                            }
                                        }

                                        ?></span>
                                    <a href="<?php echo base_url("home/yazi/"). $gelen->sef?>"><h4><?php echo $gelen->baslik;?></h4></a>
                                    <ul class="post-info">
                                        <li><a href="#"><?php foreach ($yazar as $p){if($p->id==$gelen->yazar_id){ echo $p->isim." ".$p->soyisim; }}  ?></a></li>
                                        <li><a href="#"><?php echo $gelen->tarih?></a></li>

                                    </ul>
                                    <p><?php $tanitim = $gelen->yazi;
                                        $tanitim = substr($tanitim,0,300);
                                        echo $tanitim."...";
                                        ?></p>
                                    <div class="post-options">
                                        <div class="row">
                                            <div class="col-6">
                                                <!--
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-tags"></i></li>
                                                    <li><a href="#">Beauty</a>,</li>
                                                    <li><a href="#">Nature</a></li>
                                                </ul>
                                                --->
                                            </div>
                                            <div class="col-6">
                                                <ul class="post-share">
                                                    <li><i class="fa fa-share-alt"></i></li>
                                                    <li><a href="#">Facebook</a>,</li>
                                                    <li><a href="#"> Twitter</a></li>
                                                </ul>
                                            </div>
                                        </div>
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
                </div>
            </div>
     <?php $this->load->view("masterpages/sidebar",$this->data); ?>
    </div>
    </div>
    </div>

</section>



<?php $this->load->view("masterpages/scripts");?>

