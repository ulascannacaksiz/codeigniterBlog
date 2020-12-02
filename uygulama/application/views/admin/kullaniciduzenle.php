<?php
$this->load->view("admin/header");
?>
<input class="form-control" id="myInput" type="text" placeholder="Uyelerde Ara..">
<br>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>İsim</th>
        <th>Soyisim</th>
        <th>Email</th>
        <th>Durum</th>
        <th>Kullanıcı Tür</th>
        <th>Düzenle</th>
    </tr>
    </thead>
    <tbody id="myTable">
    <?php foreach ($veri as $v) {
        echo ' <tr>
        <td>'.$v->isim.'</td>
        <td>'.$v->soyisim.'</td>
        <td>'.$v->eposta.'</td>
        <td>'.$v->durum.'</td>
        <td>'.$v->kullanici_tur.'</td>
         <td><a href="" id='.$v->id.'" onclick="modalislem(this.id)" class="btn btn-primary" data-toggle="modal" data-target="#duzenleModal">Düzenle</a> </td>


    </tr>';
    } ?>
    </tbody>
</table>
</div>

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
                <form action="<?php echo base_url("admin/kullaniciguncelle")?>" method="post" id="modalBody">

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
            xmlhttp.open("GET","kullaniciListe/"+str,true);
            xmlhttp.send();
        }
    }
</script>

<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
