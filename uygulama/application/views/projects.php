<?php $this->load->view("masterpages/style");
$a = 0;
foreach($gelen as $g){
    $baslik = $g->proje_isim;
    $ozellikler = $g->ozellikler;
    $amaci = $g->amaci;
    $bug = $g->bug;
    $v = $g->versiyon;
    $surumnot = $g->surum_notlari;
    $link = $g->link;
    $resim[$a]=$g->url;
    $a++;
}

    ?>

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
<div class="owl-carousel owl-theme">
    <?php foreach ($resim as $rs){
        echo'<div class="item" style="width: 612px; height: 537px"><img src="'.base_url("uploads/$rs").'" width="612px" height="537px"></div>';
    }?>
</div>
<div class="container">

    <div class="centred-text">
        <h1 class="display-4 text-center"><?php echo $baslik  ?></h1>
    </div>
<div class="row">
<div class="col-md-6 mt-5">
    <h3>Özellikler</h3>
    <ul>
        <?php echo $ozellikler; ?>

    </ul>
</div>
    <div class="col-md-6 mt-5">
        <h3>Amacı:</h3>
        <p><?php echo $amaci ?></p>
    </div>
</div>
    <div class="col-md-12">
        <h4 display="4">Sürüm bilgileri:</h4><?php echo $v ?>
        <h4>Sürüm Notları:</h4>
        <?php echo $surumnot ?>
    <h4>İndirme Linki:</h4> <a href="<?php echo $link ?>" >İndir</a>
    </div>

</div>
</body>
</html>
<?php $this->load->view("masterpages/scripts"); ?>
<script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:3
            }
        }
    })
</script>
<script>
    const next = document.querySelector(".owl-next");
    const prev = document.querySelector(".owl-prev");
    next.style.fontSize="70px";
    next.style.textAlign="center";
    next.style.marginLeft="1%";
    prev.style.fontSize="70px";
    prev.style.textAlign="center";
    prev.style.marginLeft="50%";
</script>
