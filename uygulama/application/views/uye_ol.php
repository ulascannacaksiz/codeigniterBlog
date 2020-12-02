<?php
$this->load->view("masterpages/style");
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
<div class="container">
<?php echo $geri?>
    <form method="post" action="<?php echo base_url('home/uye_ol')?>">
<div class="form-group">
    <label for="isim">İsim</label>
    <input type="text" name="isim" class="form-control" id="isim" required>
</div>
    <div class="form-group">
    <label for="soyisim">Soyisim</label>
    <input type="text" name="soyisim" class="form-control" id="soyisim" required>
</div>
    <div class="form-group">
        <label for="eposta">Eposta</label>
        <input type="email" name="eposta" class="form-control" id="eposta" required>
    </div>
        <div class="form-group">
        <label for="sifre">Şifre</label>
        <input type="password" name="sifre" class="form-control" id="sifre" required>
    </div>
<input type="submit" name="gonder" class="btn btn-success col-md-4" value="Üye ol">

</div>

</form>
<?php
$this->load->view("masterpages/scripts");
?>
