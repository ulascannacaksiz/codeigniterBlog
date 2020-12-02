<?php
$this->load->view("admin/header");
foreach ($veri as $v){
    $logo = $v->logo;
    $duyuru_durum = $v->duyuru_durum;
    $duyuru_tip = $v->duyuru_tip;
    $duyuru_text = $v->duyuru_text;
    $facebook = $v->facebook;
    $linkedin = $v->linkedin;
    $twitter = $v->twitter;
    $youtube = $v->youtube;
}
?>
<form action="<?php echo  base_url("admin/ayarguncelle")?>" method="post">
<div class="d-flex justify-content-center">
    <div class="col-md-6">
        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="text" name="logo" id="logo" class="form-control" value="<?php echo $logo ?>">
        </div>

        <div class="form-group">
            <label for="duyuru_durum">Duyuru Durum</label>

            <input type="radio" name="duyuru_durum" <?php if($duyuru_durum==1){echo 'checked';}?> value="1" >Açık ||
            <input type="radio" name="duyuru_durum" <?php if($duyuru_durum==0){echo 'checked';}?> value="" > Kapalı
        </div>
        <div class="form-group">
            <label for="duyuru-tip">Duyuru Tipi</label>
        <select id="duyuru-tip" class="form-control" name="duyuru_tip">
            <option value="<?php echo $duyuru_tip?>"><?php echo $duyuru_tip?></option>
            <option value="primary">primary</option>
            <option value="secondary">secondary</option>
            <option value="success">success</option>
            <option value="danger">danger</option>
            <option value="warning">warning</option>
            <option value="info">info</option>
            <option value="light">light</option>
            <option value="dark">dark</option>
        </select>
        </div>
        <div class="form-group">
            <label for="duyuru">Duyuru</label>
            <input type="text" name="duyuru" id="duyuru" class="form-control" value="<?php echo $duyuru_text ?>">
        </div>
        <div class="form-group">
            <label for="face">Facebook</label>
            <input type="text" name="face" id="face" class="form-control" value="<?php echo $facebook ?>">
        </div>
        <div class="form-group">
            <label for="twit">Twitter</label>
            <input type="text" name="twit" id="twit" class="form-control" value="<?php echo $twitter ?>">
        </div>
        <div class="form-group">
            <label for="link">Linkedin</label>
            <input type="text" name="link" id="link" class="form-control" value="<?php echo $linkedin ?>">
        </div>
        <div class="form-group">
            <label for="youtube">Youtube</label>
            <input type="text" name="youtube" id="youtube" class="form-control" value="<?php echo $youtube ?>">
        </div>
        <input type="submit" name="gonder" class="btn btn-success" value="Ayarları Kaydet">


    </div>
</div>
</form>