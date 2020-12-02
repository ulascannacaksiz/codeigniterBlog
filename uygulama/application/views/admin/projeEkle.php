<?php
$this->load->view("admin/header");
$url= base_url("assets");
?>
<?php

foreach ($proje as $y){
    $proje_id=$y->proje_id;
}
$proje_id++;//Bir sonraki yazı id yi yani gönderildiğinde oluşcak yazı id için yaptık

?>
<form action="<?php echo base_url("admin/proje_ekle_islem")?>" method="post" enctype="multipart/form-data">
    <div class="row mt-2 ml-2">
        <div class="form-group col-md-5">
            <label for="baslik">Başlık</label>
            <input type="text" id="baslik" class="form-control" name="baslik">
        </div>

            <div class="form-group col-md-5">
                <label for="versiyon">Versiyon</label>
                <input type="text" id="versiyon" class="form-control" name="versiyon">
            </div>
        <div class="form-group col-md-5">
                <label for="ozellikler">Özellikler</label>
                <textarea name="ozellikler" class="form-control" id="ozellikler"></textarea>
            </div>
        <div class="form-group col-md-5">
                <label for="surum_not">Sürüm Notları</label>
                <textarea name="surum_not" class="form-control" id="surum_not"></textarea>
            </div>


        <div class="form-group col-md-5">
            <label for="kapak_resim">Kapak Resim</label>
            <input type="hidden" name="proje_id" value="<?php echo $proje_id?>">
            <input type="file" name="kapak_resim" class="form-control" id="kapak_resim">
        </div>
        <div class="form-group col-md-5">
            <label for="link">İndirme Linki</label>
            <input type="text" id="link" class="form-control" name="link">
        </div>
    </div>
        <div class="form-group col-10">
            <label for="editor">Amacı</label>
            <textarea name="metin" id="editor" class="ckeditor"></textarea>
        </div>
        <div class="form-group ml-2 ">
            <input type="submit" name="gonder" class="btn btn-success col-md-5" value="Yazıyı Gönder">
        </div>

</form>

<div class="col-md-10">
    <h5 display="5">Proje Sliderinda kullanmak istediğiniz göreselleri seçin yada sürükleyin.</h5>
    <form action="<?php echo base_url("admin/dropzone/$proje_id")?>" value="<?php echo $proje_id?>" onchange="showUser(this.value)" onclick="showUser(this.value)" class="dropzone"  id="dropForm">
        <input type="hidden" name="proje_id" value="<?php echo $proje_id?>">

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
        str=<?php echo $proje_id;?>;
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
