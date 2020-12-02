<?php
$this->load->view("admin/header");
?>

<form action="<?php echo base_url("admin/kategoriEkle")?>" method="post">
<div class="d-flex justify-content-center">
<div class="col-md-6">
<div class="form-group">
    <label for="kategori">Kategori İsim:</label>
    <input type="text" id="kategori" name="kategori" class="form-control">
</div>
    <div class="form-group">
    <input type="submit" name="gonder" class="btn btn-success" value="Kategori Ekle">
</div>

</div>
</div>
</form>
<div class="d-flex justify-content-center">
    <div class="col-md-6">
<table class="table table-bordered">
    <thead>
    <th>Kategori isim</th>
    <th>Tag</th>
    <th>Düzenle</th>
    <th>Sil</th>
    </thead>
    <tbody>
    <?php foreach ($gelen as $r){?>
        <tr>
    <td><?php echo $r->aciklama?></td>
    <td><?php echo $r->tag?></td>
     <td><a href="" id="<?php echo $r->id?>"onclick="modalislem(this.id)" class="btn btn-primary" data-toggle="modal" data-target="#duzenleModal">Düzenle</a> </td>
    <td><a href="<?php echo  base_url("admin/kategoriSil/$r->id")?>" class="btn btn-danger">Sil</a></td>
        </tr>
    <?php }?>
    </tbody>

</table>
    </div>
    </div>
<div class="modal fade" id="duzenleModal" tabindex="-1" role="dialog" aria-labelledby="duzenleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Kategori Düzenle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url("admin/kategoriGuncelle")?>" method="post" id="modalBody">
                    <div class="form-group">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    function modalislem(str) {
        if (str == "") {
            document.getElementById("modalBody").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("modalBody").innerHTML = this.responseText;
                    //alert(str);
                }
            };
            xmlhttp.open("GET","kategoriDuzenle/"+str,true);
            xmlhttp.send();
        }
    }
</script>