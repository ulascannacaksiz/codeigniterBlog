<?php
$this->load->view("admin/header");

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<form action="<?php echo base_url("admin/onayla_sil")?>" method="post">
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
    <th>Yazı</th>
    <th>Yorum</th>
    <th>Yorum Yapan</th>
    <th><input type="checkbox" id="selectAll" name="selectAll">Tümünü Seç</th>
    <th><input type="checkbox" name="deleteAll" id="unselect" >Sil</th>
    </thead>
    <tbody>
    <?php foreach ($onay as $o){
        echo '<tr>
        <td>'.$o->baslik.'</td>
        <td>'.$o->yorum.'</td>
        <td>'.$o->isim." ".$o->soyisim.'</td>
        <input type="hidden" name="yorum_id[]" value="'.$o->yorum_id.'">
        <td><input type="checkbox" name="onay[]"  id="onayla" value="1"></td>
        <td><input type="checkbox" name="onay[]"  id="sil" value="2"></td>
    </tr> ';
    }?>
    </tbody>
</table>
<button type="submit" name="gonder" class="btn btn-success">Gönder</button>
</form>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );

</script>
<script>
    /*$(document).ready(function () {
        $("#onayla").each(function(){
        $('#onayla').attr("checked", true);
        });
        //$(":checkbox").attr("checked", true);
    });*/
    $(function(){
        $('#selectAll').click(function(event) {  //on click
            if(this.checked) {
                $("[id='onayla']").attr("checked", true);
            }else {
                $("[id='onayla']").attr("checked", false);
            }
        });

    });

    $(function(){
        $('#unselect').click(function(event) {  //on click
            if(this.checked) {
                $("[id='sil']").attr("checked", true);
            }else {
                $("[id='sil']").attr("checked", false);
            }
        });

    });
</script>

