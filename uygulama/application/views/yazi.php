<?php $this->load->view("masterpages/style",$this->data); ?>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
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


    <!-- Banner Ends Here -->


<?php foreach ($icerik as $gelen){

    $yazi= $gelen->yazi;
    $baslik = $gelen->baslik;
    $yazar_id = $gelen->yazar_id;
    $tarih = $gelen->tarih;
    $kate=$gelen->kategori_id;
    $resim = $gelen->url;
    $yazi_id=$gelen->yid;

}?>

    <section class="blog-posts grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                        <img src="<?php echo base_url("uploads/$resim")?>" width="730" height="325" alt="">
                    </div>

                    <div class="down-content">
                      <span> <?php
                          foreach ($kategori as $ct){
                          foreach ($ct as $s){
                              if($s->id==$kate){
                                  echo $s->aciklama;
                              }
                          }}
                          ?></span>
                      <a href="yazi.php"><h4> <?php echo $baslik; ?></h4></a>
                      <ul class="post-info">
                          <li><a href="#"><?php foreach ($yazar as $p){if($p->id==$yazar_id){ echo $p->isim." ".$p->soyisim; }}  ?></a></li>
                        <li><a href="#"> <?php echo $tarih; ?></a></li>
                        <li><a href="#"><?php echo $sayac ." Yorum " ?></a></li>
                      </ul>
                        <?php echo $yazi; ?>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
       
                          </div>
                          <div class="col-6">
                            <ul class="post-share">
                              <li><i class="fa fa-share-alt"></i></li>
                              <li><a href="#">Facebook</a>,</li>
                              <li><a href="#"> Twitter</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item comments">
                    <div class="sidebar-heading">
                      <h2><?php echo $sayac ." Yorum " ?></h2>
                    </div>
                    <div class="content">
                      <ul>
                          <?php
                          print_r($cıktı);
                             ?>

                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item submit-comment">
                    <div class="sidebar-heading">
                      <h2>Yorum Yap</h2>
                    </div>
                    <div class="content">
                      <form id="comment" action="" method="post">
                        <div class="row">

<?php
if($this->session->login_durum!=1) {
    echo '                      <div class="col-md-6 col-sm-12 col-lg-12">
                            <fieldset>
                              Yorum Yapabilmek için Üye olunuz yada Giriş Yapınız.
                            </fieldset>
                          </div>';
                            }else{

     echo ' <div class="col-lg-12">
                            <fieldset>
                         <div class="alert alert-primary" role="alert" id="bilgi"></div>
                              <textarea name="message" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                            <input type="hidden" name="yazi_id" value="'.$yazi_id.'">
                            <input type="hidden" name="ip" value="'.$this->input->ip_address().'">
                            <input type="hidden" name="ustyorum" id="ustyorum">
                              <button type="submit" id="form-submit" class="main-button">Submit</button>
                            </fieldset>
                          </div>';}
     ?>


                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
            <?php $this->load->view("masterpages/sidebar",$this->data); ?>
          </div>
          </div>
          </div>

    </section>




    


    <!-- Bootstrap core JavaScript -->
    <?php $this->load->view("masterpages/scripts");?>


  </body>

</html>
<script>
    $("#bilgi").hide();
  /*  $( "#ust_id1" ).click(function() {
        //$( this ).slideUp();
        var value = $( this ).val();
        $( "p" ).text( value );

        $( "input[name='cevap_id']" ).val("dasdad");
    });*/
  $(document).on('click', '#cevapla', function(){
      var comment_id = $(this).attr("value");
      $("#bilgi").show();
    $("#bilgi").text("Yorumuna Yanıt Veriliyor.")
      $('#ustyorum').val(comment_id);
      $('#message').focus();
  });
</script>
<script>
    $("#form-submit").click(function(event){
        event.preventDefault();
    $.ajax({
        type:'POST',
        url:'<?php echo base_url("home/yorumyap")?>',
        data:$("#comment").serialize(),
        success: function (response) {
            $("#bilgi").show();
            $("#bilgi").text(response);
            $("#message").val("");
        }


    });
    });

</script>