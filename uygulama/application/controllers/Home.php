<?php
class home extends CI_Controller{
    public $data;
    public function __construct()
    {
        parent::__construct();

    }

    public function ayarlar(){
        $this->load->model("admin_model");
        $this->data['ayarlar']=$this->admin_model->ayarcek();
    }
    public function header(){
        $this->ayarlar();
    $this->load->model("menu_model");
    $menuler = $this->menu_model->menuGetir();
    //$test=array("veriler"=>$menuler);
    $this->data['veriler']=$menuler;
    //$this->load->view("masterpages/style",$test);
    }
    public function sidebar(){
        $this->load->model("menu_model");
        $veri  = $this->menu_model->recentpost();
        $Data=array("recentpost"=>$veri);

        $veri2 =$this->menu_model->categories();
        $Datakategori = array("categories"=>$veri2);
        // gelen arrayleri arraya attım tek veri gönderiliyor
        // not buna ulaşmak için ikitane foreach yapmak gerekiyor Unutma :D
        $this->data["son"]=$Data;
        $this->data["kategori"]=$Datakategori;
        //$this->load->view("masterpages/sidebar",$this->data);
        }

    public function index(){
        $this->header();
        $this->sidebar();
        $this->resimgetir();
        $this->yazargetir();



        $this->load->model("yazi_model");
        $this->data['gelendeger']=$this->yazi_model->yazisayisi();
        $this->load->library('pagination');
        $config['base_url']=base_url("home/index/");
        $config['total_rows'] =  $this->data['gelendeger'][0]->yazi;
        $config['uri_segment'] = 3;
        $config['per_page'] = 5;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3))?$this->uri->segment(3):0;



        $veri = $this->yazi_model->yaziduzenle_join($config['per_page'],$page);
        $this->data['linkler']=$this->pagination->create_links();
        $this->data['degerler']=$veri;
        $this->load->view("homepage",$this->data);

    }

    public function yazi($sef){
        $this->header();
        $this->sidebar();
        $this->yazargetir();
        $this->yorum_cevap();
        $this->load->model("yazi_model");
        $metin=$this->yazi_model->selectGelen($sef);
        if($metin=="Hata Sayfa bulunamadı"){
            //show_404();
            show_error("Hata Aradığınız Sayfa Bulunamadı",404,"Sayfa bulunamadı" );
        }

        $yorum=$this->yazi_model->yorum($metin[0]->yid);
        $this->data['sayac']=$this->yazi_model->yorum_sayac($metin[0]->yid);
        $geri='';
        foreach ($yorum as $y) {
            $geri .= '   <li class="col-md-12 ">
                          <div class="author-thumb">
                            <img src="../assets/assets/images/comment-author-01.jpg" alt="">
                          </div>
                          <div class="right-content">
                            <h4>' . $y->isim." ".$y->soyisim . '<span>' . $y->tarih . '</span></h4>
                            <p id="yorum">' . $y->yorum . '</p>
                          </div>
                          <div class="right-content">
                          <a rel="nofollow" class="comment"  id="cevapla" name="cevapla" value="'.$y->yorum_id.'">Cevap ver</a>
                          </div>
                        </li>';

            $geri.= $this->yorum_cevap($y->yorum_id);
        }
        //echo $geri;
       $this->data["cıktı"]=$geri;
        $this->data["icerik"]=$metin;
        //$this->data["yorumlar"]=$yorum;
        $this->load->view("yazi",$this->data);
    }

    public function yorum_cevap($ust_id=0){
        $this->load->model("yazi_model");
        $veri = $this->yazi_model->yorum_cevap($ust_id);
        $cıktı='';
        foreach ($veri as $yc){
            //$veri = $v;
            $cıktı.= '  <li class="replied">
                          <div class="author-thumb">
                            <img src="../assets/assets/images/comment-author-02.jpg" alt="">
                          </div>
                          <div class="right-content">
                            <h4>' . $yc->isim." ".$yc->soyisim . '<span>' . $yc->tarih . '</span></h4>
                            <p>'.$yc->yorum.'</p>
                          </div>
                        </li>';
            $this->yorum_cevap($yc->yorum_id);
        }
        return $cıktı;

    }



    public function kategori($tag){
        //echo $tag;
        $this->header();
        $this->sidebar();
        $this->yazargetir();
        $this->load->model("menu_model");
        $veri= $this->menu_model->kategori_sayfa($tag);
        if(empty($veri)){
            show_error("Aradığınız sayfa bulunamadı.",404,"Sayfa Bulunamadı");
        }
        $kategori_id = $veri[0]->id;

        $this->load->model("yazi_model");

        $this->data['gelendeger']=$this->yazi_model->yazisayisi();
        $this->load->library('pagination');
        $config['base_url']=base_url("home/kategori/$tag/");
        $config['total_rows'] =  $this->data['gelendeger'][0]->yazi;
        $config['uri_segment'] = 4;
        $config['per_page'] = 6;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4))?$this->uri->segment(4):0;

        $yazilar = $this->yazi_model->kategoriyegorelistele($kategori_id,$config['per_page'],$page );
        $this->data['link']=$this->pagination->create_links();

       $this->data['gonderilen']=$yazilar;
        //echo $array->id;
        $this->load->view("kategori",$this->data);
    }
    public function search(){
        $this->header();
        $this->sidebar();
        $this->yazargetir();
        $q= $this->input->get('q');
        $q=htmlspecialchars($q);
        $this->load->model("yazi_model");

        $this->data['gelendeger']=$this->yazi_model->yazisayisi();
        $this->load->library('pagination');
        $config['base_url']=base_url("home/search/$q");
        $config['total_rows'] =  $this->data['gelendeger'][0]->yazi;
        $config['uri_segment'] = 4;
        $config['per_page'] = 6;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4))?$this->uri->segment(4):0;

        $gelen = $this->yazi_model->arama($q,$config['per_page'],$page );
        $this->data['link']=$this->pagination->create_links();


        //$gelen=$this->yazi_model->arama($q);
        $this->data['gonderilen']=$gelen;
        $this->load->view("search",$this->data);

    }
    public function uye_ol(){
        $this->header();
        $this->sidebar();
        $isim= $this->input->post("isim");
        $soyisim= $this->input->post("soyisim");
        $eposta= $this->input->post("eposta");
        $sifre= $this->input->post("sifre");
        $tarih=date("d-m-Y");
        $ulas = hash("sha256",$sifre);
        if($isim!="" && $soyisim!="" && $eposta!="" && $sifre!=""){
           // echo '<div class="alert alert-secondary" role="alert">İSİM BOŞ OLAMAZ</div>';
            $dizi=array("isim"=>$isim,"soyisim"=>$soyisim,"eposta"=>$eposta,"sifre"=>$ulas,"uyelik_tarihi"=>$tarih);
            $this->load->model("admin_model");
            $geri=$this->admin_model->kayit($dizi);
              $this->data['geri']= '<div class="alert alert-info" role="alert">'.$geri.'</div>';

        }else{
            $this->data['geri']= '<div class="alert alert-danger" role="alert">Tüm Alanları Doldurunuz</div>';
        }


        $this->load->view("uye_ol",$this->data);
    }
    public function girisyap(){
        $this->header();
        $this->sidebar();
        $eposta= $this->input->post("eposta");
        $sifre= $this->input->post("sifre");
        $submit = $this->input->post('submit');
        $ulas=hash("sha256",$sifre);
        $this->data["hata"]="";
            if ($eposta != "" && $sifre != "") {
                $data = array("eposta" => $eposta, "sifre" => $ulas);
                $this->load->model("admin_model");
                $gelen = $this->admin_model->girisyap($data);

                if (is_array($gelen)) {
                    //Başarılı Giriş
                    $bilgi = array(
                        "kullanici_tur" => $gelen[0]->kullanici_tur,
                        "eposta" => $gelen[0]->eposta,
                        "id" => $gelen[0]->id,
                        "ad" => $gelen[0]->isim,
                        "soyad" => $gelen[0]->soyisim,
                        "login_durum" => 1);
                    $this->session->set_userdata($bilgi);
                    redirect("home");
                }else if ($gelen == "Hata eposta yada şifreler eşleşmiyor") {
                    $hata='<div class="alert alert-danger" role="alert">Hata eposta yada şifreler eşleşmiyor</div>';
                    $this->data["hata"]=$hata;
                }

            }


        $this->load->view("girisyap",$this->data);
    }
    /*
     *
     * select * from yazilar inner join resimler on
     *  yazilar.yid= resimler.yazi_id inner join uyeler on yazilar.yazar_id=uyeler.id inner join yorum on yazilar.yid=yorum.yazi_id
     * */
    public function yorumyap(){
        $yorum=$this->input->post("message");
        $yazi_id=$this->input->post("yazi_id");
        $tarih= date("d-m-Y");
        $onay=0;
        $ust_id=$this->input->post("ustyorum");
        $ip=$this->input->post("ip");
        $uye_id=$this->session->id;
        $yorumfilire = filter_var($yorum, FILTER_SANITIZE_STRING);
        $dizi=array("yazi_id"=>$yazi_id,
            "uye_id"=>$uye_id,
            "üst_id"=>$ust_id,
            "yorum"=>$yorumfilire,
            "ip"=>$ip,
            "onay"=>$onay,
            "tarih"=>$tarih);

        if($yorum!=""){
            $this->load->model("yazi_model");
            $this->data["mesaj"]=$this->yazi_model->yorum_yap($dizi);
            echo  $this->data["mesaj"];
        }else{
            $this->data["mesaj"]="Lütfen yorum alanını doldurunuz.";
            echo  $this->data["mesaj"];
        }

    }
    public function resimgetir(){
        $this->load->model("yazi_model");
        $veri = $this->yazi_model->resimToplu();
        $this->data['resimler']=$veri;
    }
    public function yazargetir(){
        $this->load->model("yazi_model");
        $data = $this->yazi_model->yazargetir();
        $this->data['yazar']=$data;
    }
    public function projeler(){
        $this->header();
        $this->load->model("yazi_model");
        $proje_Sayi=$this->yazi_model->proje_sayi();
        $this->load->library("pagination");
        $config['base_url']=base_url("home/projeler");//Yazılcak
        $config['total_rows']=$proje_Sayi[0]->proje_id;
        $config['per_page']=5;
        $config['uri_segment']=3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $this->data['proje']=$this->yazi_model->projesayfa($config['per_page'],$page);
        $this->data['linkler'] = $this->pagination->create_links();
        $this->load->view("projesayfa",$this->data);
    }
    public function proje($sef){
        $this->header();
        $this->load->model("yazi_model");
        $gelen=$this->yazi_model->proje($sef);
        $this->data['gelen']=$gelen;
        $this->load->view("projects",$this->data);
    }
}