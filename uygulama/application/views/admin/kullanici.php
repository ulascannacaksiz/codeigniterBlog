<?php
$this->load->view("admin/header");
echo $geri;
?>

<form action="<?php echo base_url("admin/kullanici")?>" method="post">
<div class="d-flex justify-content-center">
<div class="col-md-6">
    <div class="form-group">
        <label for="isim">İsim</label>
        <input type="text" name="isim" id="isim" class="form-control">
    </div>
    <div class="form-group">
        <label for="soyisim">Soyisim</label>
        <input type="text" name="soyisim" id="soyisim" class="form-control">
    </div>
    <div class="form-group">
        <label for="eposta">Eposta</label>
        <input type="text" name="eposta" id="eposta" class="form-control">
    </div>
    <div class="form-group">
        <label for="sifre">Şifre</label>
        <input type="text" name="sifre" id="sifre" class="form-control">
    </div>
    <div class="form-group">
        <label for="durum">Durum</label>
        <select name="durum" id="durum" class="form-control">
            <option>Seçin</option>
            <option value="1">Onaylı</option>
            <option value="0">Onay Bekliyor</option>
            <option value="3">Banlı</option>
        </select>
    </div>
    <div class="form-group">
        <label for="kullanıcı">Kullanıcı Grup</label>
        <select name="kullanıcı_grup" id="kullanıcı" class="form-control">
            <option>Seçin</option>
            <option value="admin">Admin</option>
            <option value="default">Üye</option>
        </select>
    </div>
    <input type="submit" name="gonder" class="btn btn-success" value="Kullanıcı Ekle">
</div>
</div>
</form>
<!--1=>onaylı
0=>onaysız
3=> banlı--->


