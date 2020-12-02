<?php
$this->load->view("admin/header");
$url= base_url("assets");
?>
<form action="<?php echo base_url("admin/yaziEkle")?>" method="post" enctype="multipart/form-data">
<div class="mt-2 ml-2">
<div class="form-group col-md-5">
    <label for="baslik">Başlık</label>
    <input type="text" id="baslik" class="form-control" name="baslik">
</div>
<div class="form-group col-md-5">
    <label for="kapak_resim">Kapak Resim</label>

    <input type="file" name="kapak_resim" class="form-control" id="kapak_resim">
</div>
<div class="form-group col-md-5">
    <label for="kategori">Kategori</label>
    <select class="form-control" name="kategori_select">
        <option>Seçiniz</option>
        <?php foreach ($kategori as $ct){
            echo "<option value='$ct->id'> $ct->aciklama</option>";
        }
            ?>


    </select>
</div>
<div class="form-group col-10">
<textarea name="metin" id="editor" class="ckeditor"></textarea>
</div>
<div class="form-group ml-2 ">
    <input type="submit" name="gonder" class="btn btn-success col-md-5" value="Yazıyı Gönder">
</div>
</div>
</form>
<?php

foreach ($yazi as $y){
    $yazi_id=$y->yid;
}
 $yazi_id++;//Bir sonraki yazı id yi yani gönderildiğinde oluşcak yazı id için yaptık

?>
<div class="col-md-10">
    <h5 display="5">Yazıda kullanmak istediğiniz göreselleri seçin yada sürükleyin.</h5>
<form action="<?php echo base_url("admin/dropzone/$yazi_id")?>" value="<?php echo $yazi_id?>" onchange="showUser(this.value)" onclick="showUser(this.value)" class="dropzone"  id="dropForm">
    <input type="hidden" name="yazi_id" value="<?php echo $yazi_id?>">
    <input type="hidden" name="yazar_id" value="<?php echo $this->session->id?>">
    <input type="hidden" name="yazar_ip" value="<?php echo  $this->input->ip_address();?>">
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
ClassicEditor
.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
    window.editor = editor;
} )
		.catch( err => {
    console.error( err.stack );
} );

</script>

<script>


            function showUser(str) {//Str This.Value olacak
                str=<?php echo $yazi_id;?>;
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
                    xmlhttp.open("GET","resim_getir/"+str,true);
                    xmlhttp.send();
                }
            }


            //Bitiş




</script>