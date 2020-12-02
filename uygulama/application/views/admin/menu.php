<?php
$this->load->view("admin/header");
?>
<div class="row d-flex justify-content-center">
    <div class="col-md-6">
<form action="<?php echo base_url("admin/menuEkle")?>" method="post" >

<div class="form-group">
    <label for="menu_aciklama">Menu Açıklama</label>
    <input type="text" name="menu_aciklama" id="menu_aciklama" class="form-control">
</div>


<div class="form-group">
    <label for="menu_url">Menu Url</label>
    <input type="text" name="menu_url" id="menu_url" class="form-control">
</div>
<div class="form-group">
    <label for="menu_siralama">Menu Sıralama</label>
    <input type="number" name="menu_siralama" id="menu_siralama" class="form-control">
</div>
<div class="form-group">
  <input type="submit" name="gonder" value="Menü Ekle" class="btn btn-success col-md-4">
</div>

</form>
    </div>
</div>
<h3 display="4" style="text-align: center">Menü Düzenle/Sil</h3>
<table class="table table-striped">
    <thead>
    <th>Menu Açıklama</th>
    <th>Menu Url</th>
    <th>Menu Sıralama</th>
    <th style="width: 100px;">Düzenle</th>
    <th style="width: 100px;">Sil</th>
    </thead>
    <tbody>
    <?php foreach ($menu as $m){?>
    <tr>
        <td><?php echo $m->menu_aciklama?></td>
        <td><?php echo $m->menu_url?></td>
        <td><?php echo $m->siralama?></td>
        <td><a href="" id="<?php echo $m->menu_id?>"onclick="modalislem(this.id)" class="btn btn-primary" data-toggle="modal" data-target="#duzenleModal">Düzenle</a> </td>
        <td><a href="<?php echo  base_url("admin/menuSil/$m->menu_id")?>"  class="btn btn-warning">Sil</a></td>
    </tr>
    <?php }?>
    </tbody>
</table>

<div class="modal fade" id="duzenleModal" tabindex="-1" role="dialog" aria-labelledby="duzenleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo base_url("admin/menuGuncelle")?>" method="post" id="modalBody">

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
            xmlhttp.open("GET","menuListele/"+str,true);
            xmlhttp.send();
        }
    }
</script>