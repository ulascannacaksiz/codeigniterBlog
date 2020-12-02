<?php
$this->load->view("admin/header");

?>
<style>
    .page-item a{
        position: relative;
        padding: .5rem .75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #007bff;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }
    .page-item strong{
        position: relative;
        padding: .5rem .75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #007bff;
        background-color: #d2b10b;
        border: 1px solid #dee2e6;
    }
</style>
<div class="mt-2 ml-2">
    <div class="row ml-5">
        <?php foreach ($pro as $p){?>
            <div class="card col-md-5 ml-5">
                <img class="card-img-top" src="<?php echo base_url("uploads/$p->url")?>" width="500" height="350">
                <div class="card-body">
                    <div class="card-title"> <h4 display="4"><?php echo $p->proje_isim; ?></h4></div>
                    <p class="card-text"><?php $tanitim= $p->amaci;
                        $tanitim = substr($tanitim,0,300);
                        echo $tanitim."...";
                        ?></p>
                    <a href="<?php echo base_url("admin/projeDuzenleSayfa/$p->proje_id") ?>"  class="btn btn-primary">Düzenle</a>
                    <a href="<?php echo base_url("admin/projeSil/$p->proje_id") ?>"  class="btn btn-danger">Sil</a>
                </div>
            </div>
        <?php }?>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">

            <?php echo '<li class="page-item">'.$linkler.'</li>'; ?>

        </ul>
    </nav>