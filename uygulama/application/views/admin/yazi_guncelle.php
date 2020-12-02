<?php
$this->load->view("admin/header");
$url= base_url("assets");
foreach ($gelecek as  $g){
    $baslik=$g->baslik;
    $yazi=$g->yazi;
    $resim = $g->url;
    $kid=$g->kategori_id;
    $yid=$g->yid;
}
?>
<form action="<?php echo base_url("admin/guncelle/$yid")?>" method="post" enctype="multipart/form-data">
<div class="mt-2 ml-2">
<div class="form-group col-md-5">
    <label for="baslik">Başlık</label>
    <input type="text" id="baslik" class="form-control" name="baslik" value="<?php echo $baslik?>">
</div>
<div class="form-group col-md-5">
    <label for="kapak_resim">Kapak Resim</label>

    <input type="file" name="kapak_resim" class="form-control" id="kapak_resim">

</div>
<div class="form-group col-md-5">
    <label for="kategori">Kategori</label>
    <select class="form-control" name="kategori_select">

        <?php foreach ($kategori as $ct){
            if($kid==$ct->id){
                echo "<option value='$ct->id'selected>$ct->aciklama</option>";
            }
            echo "<option value='$ct->id'> $ct->aciklama</option>";
        }
            ?>


    </select>
</div>
<div class="form-group col-10">
<textarea name="metin" id="editor" class="ckeditor" ><?php echo $yazi?></textarea>
</div>
<div class="form-group ml-2 ">
    <input type="submit" name="gonder" class="btn btn-success col-md-5" value="Yazıyı Güncelle">
</div>
</div>
</form>
<div class="col-md-10">
    <h5 display="5">Yazıda kullanmak istediğiniz göreselleri seçin yada sürükleyin.</h5>
    <form action="<?php echo base_url("admin/dropzone/$yid")?>" value="<?php echo $yid?>" onchange="showUser(this.value)" onclick="showUser(this.value)" class="dropzone"  id="dropForm">
    </form>
    <table class="table" style="border-style: solid">
        <thead>
        <th>Resim</th>
        <th>Resim Url</th>
        <th><a onclick="showUser(this.value)">Yenilemek İçin Tıkalayın</a> </th>
        </thead>
        <tbody id="yuklenenler">

        </tbody>
    </table>
</div>
<script src="<?php echo $url."/editor/ckeditor.js"?>"></script>

<script>

    function showUser(str) {//Str This.Value olacak
        str=<?php echo $yid;?>;

        if (str == "") {
            document.getElementById("yuklenenler").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("yuklenenler").innerHTML = this.responseText;
                    //alert(str);
                }
            };
            //xmlhttp.open("GET","http://localhost/uygulama/admin/resim_getir/"+str,true);
            xmlhttp.open("GET","<?php echo base_url("admin/resim_getir/")?>"+str,true);
            xmlhttp.send();
        }
    }
</script>
<script>
    CKEDITOR.replace( 'editor', {
        disallowedContent : 'img{width,height}'
    } );
</script>