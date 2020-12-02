<?php
$this->load->view("masterpages/style");
?>
<style>
    body{
        background: url("<?php echo base_url('assets/img/arkaplan.jpg')?>") no-repeat center center fixed ;

    }
    .vertical-center {
    margin-top: 15%;
        height: 285px;
    }
</style>
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

<div class="container">
<div class="vertical-center">
    <form method="post" action="<?php echo base_url('home/girisyap')?>">
<?php echo $hata;?>
        <div class="d-flex justify-content-center">
    <div class="col-md-6">
        <div class="form-group">
            <label for="eposta">Eposta</label>
            <input type="email" name="eposta" class="form-control" id="eposta" required>
        </div>
        <div class="form-group">
            <label for="sifre">Şifre</label>
            <input type="password" name="sifre" class="form-control" id="sifre" required>
        </div>
        <input type="submit" name="gonder" class="btn btn-success col-md-4" value="Giriş yap">
    </div>
</div>
</div>
</div>
</form>

<?php
$this->load->view("masterpages/scripts");
?>
