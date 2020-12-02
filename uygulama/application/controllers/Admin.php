<?php

class admin extends CI_Controller
{
    public $data;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->helper('cookie');
        //$this->anasayfaverileri();

        $cookie = get_cookie('kullanici');

        $sifrecookie = get_cookie('sifre');
        if (isset($cookie)) {
            // cookie varsa güvenlik kontorolü yaptırıyorum.
            $this->load->model("admin_model");
            $veri = $this->admin_model->cookiekontorol($cookie);
            $gercek_Sifre = $veri[0]->sifre;
            $secure_pass = "Sifre36" . $gercek_Sifre . "Sifre36";
            $secure_pass = hash("sha256", $secure_pass);
            if ($secure_pass == $sifrecookie) {
                $bilgi = array("kullanici_tur" => $veri[0]->kullanici_tur,
                    "eposta" => $veri[0]->eposta,
                    "id" => $veri[0]->id,
                    "ad" => $veri[0]->isim,
                    "soyad" => $veri[0]->soyisim,
                    "login_durum" => 1);
                $this->session->set_userdata($bilgi);
                echo "Hoş Geldiniz";
                $this->anasayfaverileri();
                $this->load->view("admin/index", $this->data);
                echo "Yönlenceke";
            }
        }
        $this->load->view("admin/login");
    }

    public function girisyap()
    {
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        $ulas = hash("sha256", $password);
        $remember = $this->input->post('remember');
        $dizi = array("email" => $email,
            "password" => $ulas);
        $this->load->model("admin_model");
        $data = $this->admin_model->giris($dizi);
        if ($data != "Kullanıcı Bulunamadı") {
            if ($remember == false) {
                $bilgi = array("kullanici_tur" => $data[0]->kullanici_tur,
                    "eposta" => $data[0]->eposta,
                    "id" => $data[0]->id,
                    "ad" => $data[0]->isim,
                    "soyad" => $data[0]->soyisim,
                    "login_durum" => 1);
                $this->session->set_userdata($bilgi);
                echo "Hoş Geldiniz";
                $this->anasayfaverileri();
                $this->load->view("admin/index", $this->data);
            } else {
                //$secure_mail = "Sifre36".$email."Sifre36";
                $secure_pass = "Sifre36" . $ulas . "Sifre36";
                $secure_pass = hash("sha256", $secure_pass);
                //$secure_mail = hash("sha256",$secure_mail);

                $bilgi = array("kullanici_tur" => $data[0]->kullanici_tur,
                    "eposta" => $data[0]->eposta,
                    "id" => $data[0]->id,
                    "ad" => $data[0]->isim,
                    "soyad" => $data[0]->soyisim,
                    "login_durum" => 1);
                $this->session->set_userdata($bilgi);

                $this->load->helper('cookie');
                $expire = time() + 60 * 60 * 24 * 30;
                $kullanici = array(
                    'name' => 'kullanici',
                    'value' => $email,
                    'expire' => $expire,
                    'secure' => TRUE
                );
                $sifre = array(
                    'name' => 'sifre',
                    'value' => $secure_pass,
                    'expire' => $expire,
                    'secure' => TRUE
                );


                $this->input->set_cookie($kullanici);
                $this->input->set_cookie($sifre);
                $this->anasayfaverileri();
                $this->load->view("admin/index", $this->data);
            }
        } else if ($data == "Kullanıcı Bulunamadı") {
            echo "Kullanıcı Bulunamadı";
            redirect("admin/index");

        }

    }

    public function yazi_ekle()
    {
        $this->load->model("menu_model");
        $this->load->model("yazi_model");
        $this->data["kategori"] = $this->menu_model->categories();
        $this->data["yazi"] = $this->yazi_model->getFetchall();
        $this->load->view("admin/yazi_ekle", $this->data);


    }

    function sef_link($string)
    {
        $turkce = array("ş", "Ş", "ı", "ü", "Ü", "ö", "Ö", "ç", "Ç", "ğ", "Ğ", "İ");
        $duzgun = array("s", "s", "i", "u", "u", "o", "o", "c", "c", "g", "g", "i");
        $string = str_replace($turkce, $duzgun, $string);
        $string = trim($string);
        $string = html_entity_decode($string);
        $string = strip_tags($string);
        $string = strtolower($string);
        $string = preg_replace('~[^ a-z0-9_.]~', ' ', $string);
        $string = preg_replace('~ ~', '-', $string);
        $string = preg_replace('~-+~', '-', $string);

        return $string;
    }

    public function yaziEkle()
    {
        $gelen = ['<div>', '</div>'];

        $upload = $config['upload_path'] = 'uploads';
        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        // $config['max_size'] = 100;
        //$config['max_width'] = 1024;
        //$config['max_height'] = 768;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);


        $baslik = $this->input->post("baslik");
        $kategori = $this->input->post("kategori_select");
        $metin = $this->input->post("metin");
        $yazar_ip = $this->input->post("yazar_ip");
        $yazar_id = $this->input->post("yazar_id");


        $metin = str_replace($gelen, "", $metin);
        $sef_link = $this->sef_link($baslik);

        $veriler = array(
            "yazar_id" => $yazar_id,
            "baslik" => $baslik,
            "yazi" => $metin,
            "yazar_ip" => $yazar_ip,
            "tarih" => date("d/m/Y"),
            "kategori_id" => $kategori,
            "sef" => $sef_link);
        $this->load->model("yazi_model");
        $data = $this->yazi_model->insert($veriler);

        $test = json_encode($data);

        if (!$this->upload->do_upload('kapak_resim')) {
            $error = array('error' => $this->upload->display_errors());
            //$this->load->view('upload_form', $error);

            print_r($error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data();
            $resim_adi = $upload_data['file_name'];
            $dizi = array("yazi_id" => $test,
                "yol" => $upload,
                "url" => $resim_adi,
                "kapak" => "1");
            $this->load->model("yazi_model");
            $this->yazi_model->resim_insert($dizi);
            //$this->load->view('upload_success', $data);
            redirect("admin/yazi_duzenle");
        }

    }

    public function yazi_duzenle()
    {
        $this->load->model("yazi_model");

        $this->data['gelendeger'] = $this->yazi_model->yazisayisi();
        $this->load->library('pagination');
        $config['base_url'] = base_url("admin/yazi_duzenle/");
        $config['total_rows'] = $this->data['gelendeger'][0]->yazi;
        $config['uri_segment'] = 3;
        $config['per_page'] = 6;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $this->data["yazi"] = $this->yazi_model->yaziduzenle_join($config['per_page'], $page);
        $this->data['linkler'] = $this->pagination->create_links();

        $this->load->view("admin/yazilar", $this->data);
    }

    public function guncelle($id)
    {
        $gelen = ['<div>', '</div>'];
        $upload = $config['upload_path'] = 'uploads';
        $config['upload_path'] = 'uploads';

        $config['allowed_types'] = 'gif|jpg|png';
        //$config['max_size'] = 100;
        //$config['max_width'] = 1024;
        //$config['max_height'] = 768;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $baslik = $this->input->post("baslik");
        $kategori = $this->input->post("kategori_select");
        $metin = $this->input->post("metin");
        $sef_link = $this->sef_link($baslik);
        $metin = str_replace($gelen, "", $metin);
        $veriler = array("baslik" => $baslik,
            "yazi" => $metin,
            "tarih" => date("d/m/Y"),
            "kategori_id" => $kategori,
            "sef" => $sef_link);
        $this->load->model("yazi_model");
        $this->yazi_model->update($id, $veriler);
        $test = $this->input->post('kapak_resim');
        if ($_FILES['kapak_resim']['size'] > 0) {

            if (!$this->upload->do_upload('kapak_resim')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                $data = array('upload_data' => $this->upload->data());
                $upload_data = $this->upload->data();
                $resim_adi = $upload_data['file_name'];
                $dizi = array("yazi_id" => $id,
                    "yol" => $upload,
                    "url" => $resim_adi,
                    "kapak" => "0");
                $this->load->model("yazi_model");
                $this->yazi_model->resim_update($id, $dizi);
            }
        }
        redirect("admin/yazi_duzenle");
    }

    public function duzenleSayfa($id)
    {
        //echo $id;
        echo $this->input->post("baslik");
        $this->load->model("yazi_model");
        $this->load->model("menu_model");

        $this->data["kategori"] = $this->menu_model->categories();
        $this->data["gelecek"] = $this->yazi_model->yaziduzenle_sayfa($id);
        $this->load->view("admin/yazi_guncelle", $this->data);
    }

    public function yaziSil($id)
    {
        $this->load->model("yazi_model");
        $this->yazi_model->delete($id);
        redirect("admin/yazi_duzenle");
    }

    public function dropzone($yazi_id)
    {

        //$id= $this->input->post("yazi_id");
        $this->load->model("yazi_model");
        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png';
        $upload = 'uploads';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);


        if ($this->upload->do_upload("file")) {
            $resim_adi = $this->upload->data("file_name");
            $dizi = array("yazi_id" => $yazi_id,
                "yol" => $upload,
                "url" => $resim_adi,
                "kapak" => 0);

            $this->yazi_model->resim_insert($dizi);
            echo $resim_adi;
        } else {
            echo "Başarısız";
        }
    }

    public function resim_getir($id)
    {
        $this->load->model("yazi_model");
        $this->data['veriler'] = $this->yazi_model->resim_Getir($id);
        foreach ($this->data['veriler'] as $v) {
            echo '
        <tr> <td><img src="' . base_url("uploads/" . $v->url) . '" width="100px"></td>
            <td>' . base_url("uploads/" . $v->url) . '</td></tr>';
        }
    }

    public function menuIslem()
    {
        $this->load->model("menu_model");
        $this->data['menu'] = $this->menu_model->menuGetir();
        $this->load->view("admin/menu", $this->data);
    }

    public function menuSil($id)
    {
        $this->load->model("menu_model");
        $this->menu_model->menusil($id);
    }

    public function menuEkle()
    {
        $aciklama = $this->input->post("menu_aciklama");
        $url = $this->input->post("menu_url");
        $siralama = $this->input->post("menu_siralama");
        $this->load->model("menu_model");
        $data = array(
            "menu_aciklama" => $aciklama,
            "menu_url" => $url,
            "siralama" => $siralama);
        $this->menu_model->menuEkle($data);
        redirect("admin/menuIslem");

    }

    public function menuListele($id)
    {
        $this->load->model("menu_model");
        $this->data['menu'] = $this->menu_model->menu_liste($id);
        echo '<div class="form-group">
    <label for="menu_aciklama">Menu Açıklama</label>
    <input type="text" name="menu_aciklama" id="menu_aciklama" value="' . $this->data['menu'][0]->menu_aciklama . '" class="form-control">
    </div>


    <div class="form-group">
    <label for="menu_url">Menu Url</label>
    <input type="text" name="menu_url" id="menu_url" value="' . $this->data['menu'][0]->menu_url . '" class="form-control">
    </div>
    <div class="form-group">
    <label for="menu_siralama">Menu Sıralama</label>
    <input type="number" name="menu_siralama" id="menu_siralama" value="' . $this->data['menu'][0]->siralama . '" class="form-control">
    <input type="hidden" name="menu_id" value="' . $this->data['menu'][0]->menu_id . '">
    </div>
    <div class="form-group">
    <input type="submit" name="gonder" value="Menü Güncelle" class="btn btn-success col-md-4">
    </div>';

    }

    public function menuGuncelle()
    {
        $aciklama = $this->input->post("menu_aciklama");
        $id = $this->input->post("menu_id");
        $url = $this->input->post("menu_url");
        $siralama = $this->input->post("menu_siralama");
        $this->load->model("menu_model");
        $data = array(
            "menu_aciklama" => $aciklama,
            "menu_url" => $url,
            "siralama" => $siralama);
        $this->menu_model->menuGuncel($id, $data);
        redirect("admin/menuIslem");
    }

    public function kategoriIslem()
    {
        $this->load->model("menu_model");
        $this->data['gelen'] = $this->menu_model->categories();
        $this->load->view("admin/kategori", $this->data);
    }

    public function kategoriEkle()
    {
        $kataegori_isim = $this->input->post("kategori");
        $tag = $this->sef_link($kataegori_isim);
        $this->data['dizi'] = array("aciklama" => $kataegori_isim,
            "tag" => $tag);
        $this->load->model("menu_model");
        $this->menu_model->kategori_ekle($this->data['dizi']);
        redirect("admin/kategoriIslem");
    }

    public function kategoriSil($id)
    {
        $this->load->model("menu_model");
        $this->menu_model->kategorisil($id);
        redirect("admin/kategoriIslem");
    }

    public function kategoriDuzenle($id)
    {
        $this->load->model("menu_model");
        $this->data['kat'] = $this->menu_model->kategori_listele($id);
        echo '
                        <label for="kategori">Kategori Açıklama</label>
                        <input type="text" class="form-control" name="kategori" value="' . $this->data['kat'][0]->aciklama . '" id="kategori">
                    </div>
                    <div class="form-group">
                        <label for="tag">Kategori tag</label>
                        <input type="text" class="form-control" name="tag" value="' . $this->data['kat'][0]->tag . '" id="tag">
                         <input type="hidden" name="id" value="' . $this->data['kat'][0]->id . '">
                    </div>
                    <input type="submit" name="gonder" class="btn btn-success" value="Güncelle">
        ';

    }

    public function kategoriGuncelle()
    {
        $id = $this->input->post("id");
        $kategori = $this->input->post("kategori");
        $tag = $this->input->post("tag");
        $this->load->model("menu_model");
        $gelen = array("aciklama" => $kategori,
            "tag" => $tag);
        $this->menu_model->kategori_guncelle($id, $gelen);
        redirect("admin/kategoriIslem");
    }

    public function anasayfaverileri()
    {
        $this->load->model("yazi_model");
        $veri = $this->yazi_model->onaybekleyenyorum();
        $this->data['onayyorum'] = $veri;
        $toplamyazi = $this->yazi_model->yazisayisi();
        $this->data['toplamyazi'] = $toplamyazi;
        $toplamuye = $this->yazi_model->uyesayi();
        $this->data['toplamuye'] = $toplamuye;
    }

    public function yorumonay()
    {
        $this->load->model("yazi_model");
        $veri = $this->yazi_model->AdminYorum();
        $this->data['onay'] = $veri;
        $this->load->view("admin/yorum", $this->data);
    }

    public function kullanici()
    {
        $isim = $this->input->post("isim");
        $soyisim = $this->input->post("soyisim");
        $sifre = $this->input->post("sifre");
        $eposta = $this->input->post("eposta");
        $durum = $this->input->post("durum");
        $grup = $this->input->post("kullanıcı_grup");
        $tarih = date("d-m-Y");
        $ulas = hash("sha256", $sifre);
        if ($isim != "" && $soyisim != "" && $eposta != "" && $sifre != "" && $durum != "" && $grup != "") {
            $dizi = array("kullanici_tur" => $grup, "isim" => $isim, "soyisim" => $soyisim, "eposta" => $eposta, "sifre" => $ulas, "uyelik_tarihi" => $tarih, "durum" => $durum);
            $this->load->model("admin_model");
            $geridon = $this->admin_model->kayit($dizi);
            $this->data['geri'] = '<div class="alert alert-info" role="alert">' . $geridon . '</div>';
        } else {
            $this->data['geri'] = '<div class="alert alert-danger" role="alert">Tüm Alanları Doldurunuz</div>';
        }

        $this->load->view("admin/kullanici", $this->data);
    }

    public function kullaniciDuzenle()
    {
        $this->load->model("admin_model");
        $veri = $this->admin_model->kullanicigetir();
        $this->data['veri'] = $veri;
        $this->load->view("admin/kullaniciduzenle", $this->data);

    }

    public function kullaniciguncelle()
    {
        $isim = $this->input->post("isim");
        $uye_id = $this->input->post("uye_id");
        $soyisim = $this->input->post("soyisim");
        $sifre = $this->input->post("sifre");
        $eposta = $this->input->post("eposta");
        $durum = $this->input->post("durum");
        $grup = $this->input->post("kullanıcı_grup");
        $ulas = hash("sha256", $sifre);
        if ($isim != "" || $soyisim != "" || $eposta != "" || $sifre != "" || $durum != "" || $grup != "") {
            $dizi = array("kullanici_tur" => $grup, "isim" => $isim, "soyisim" => $soyisim, "eposta" => $eposta, "sifre" => $ulas, "durum" => $durum);
            $this->load->model("admin_model");
            $geridon = $this->admin_model->guncelle($uye_id, $dizi);
            redirect("admin/kullaniciDuzenle");
        }
    }

    public function kullaniciSil($id)
    {
        $this->load->model("admin_model");
        $this->admin_model->kullanicidelete($id);
        redirect("admin/kullaniciDuzenle");
    }

    public function kullaniciListe($id)
    {
        $this->load->model("admin_model");
        $geridon = $this->admin_model->kullaniciGet($id);
        echo '
         <div class="form-group">
        <label for="isim">İsim</label>
        <input type="text" name="isim" id="isim" value="' . $geridon[0]->isim . '" class="form-control">
    </div>
    <div class="form-group">
        <label for="soyisim">Soyisim</label>
        <input type="text" name="soyisim" id="soyisim" value="' . $geridon[0]->soyisim . '" class="form-control">
        <input type="hidden" name="uye_id" value="' . $geridon[0]->id . '">
    </div>
    <div class="form-group">
        <label for="eposta">Eposta</label>
        <input type="text" name="eposta" id="eposta" value="' . $geridon[0]->eposta . '" class="form-control">
    </div>
    <div class="form-group">
        <label for="sifre">Şifre</label>
        <input type="text" name="sifre" id="sifre" class="form-control">
    </div>
    <div class="form-group">
        <label for="durum">Durum</label>
        <select name="durum" id="durum"  class="form-control">
            <option value="' . $geridon[0]->durum . '" selected >' . $geridon[0]->durum . '</option>
            <option value="1">Onaylı</option>
            <option value="0">Onay Bekliyor</option>
            <option value="3">Banlı</option>
        </select>
    </div>
    <div class="form-group">
        <label for="kullanıcı">Kullanıcı Grup</label>
        <select name="kullanıcı_grup" id="kullanıcı" class="form-control">
            <option  value="' . $geridon[0]->kullanici_tur . '" selected>' . $geridon[0]->kullanici_tur . '</option>
            <option value="admin">Admin</option>
            <option value="default">Üye</option>
        </select>
    </div>
    <input type="submit" name="gonder" class="btn btn-success" value="Kaydet">
    <a href="' . base_url("admin/kullaniciSil/") . $geridon[0]->id . '" class="btn btn-danger">Kullanıcı Sil</a>
        ';
    }


    public function onayla_sil()
    {
        $yorum_id = $this->input->post('yorum_id');
        $onay = $this->input->post('onay');
        // print_r($onay);
        $dizi = array();

        print_r($onay);
        $sayi = count($onay);
        $this->load->model("admin_model");

        for ($i = 0; $i < $sayi; $i++) {
            $this->admin_model->yorum_onayla($onay[$i], $yorum_id[$i]);
        }
        $this->admin_model->yorum_sil();
        redirect("admin/yorumonay");
    }

    public function ayarlar()
    {
        $this->load->model("admin_model");
        $this->data['veri'] = $this->admin_model->ayarcek();


        $this->load->view("admin/ayarlar", $this->data);
    }

    public function ayarguncelle()
    {
        $logo = $this->input->post('logo');
        $duyuru_durum = $this->input->post('duyuru_durum');
        $duyuru_tip = $this->input->post('duyuru_tip');
        $duyuru = $this->input->post('duyuru');
        $face = $this->input->post('face');
        $twit = $this->input->post('twit');
        $link = $this->input->post('link');
        $youtube = $this->input->post('youtube');
        echo $duyuru_durum;
        $dizi = array("logo" => $logo,
            "duyuru_durum" => $duyuru_durum,
            "duyuru_tip" => $duyuru_tip,
            "duyuru_text" => $duyuru,
            "facebook" => $face,
            "twitter" => $twit,
            "linkedin" => $link,
            "youtube" => $youtube
        );
        $this->load->model("admin_model");
        $this->admin_model->ayarguncelle($dizi);
    }

    public function cikisyap()
    {
        $this->load->helper('cookie');
        delete_cookie('kullanici');
        delete_cookie('sifre');
        session_destroy();
        redirect("admin/index");
    }

    public function proje_ekle()
    {
        $this->load->model("yazi_model");
        $veri = $this->yazi_model->projeidogrenme();//Son idyi almak için yaptık dropzoneda kullancam
        $this->data['proje'] = $veri;

        $this->load->view("admin/projeEkle", $this->data);
    }

    public function proje_ekle_islem()
    {
        $baslik = $this->input->post("baslik");
        $versiyon = $this->input->post("versiyon");
        $ozellikler = $this->input->post("ozellikler");
        $surum_not = $this->input->post("surum_not");
        $link = $this->input->post("link");
        $metin = $this->input->post("metin");
        $proje_id = $this->input->post("proje_id");

        $gelen = ['<div>', '</div>'];
        $metin = str_replace($gelen, "", $metin);
        $sef_link = $this->sef_link($baslik);
        $gonderilern = array("proje_isim" => $baslik,
            "amaci" => $metin,
            "versiyon" => $versiyon,
            "ozellikler" => $ozellikler,
            "surum_notlari" => $surum_not,
            "link" => $link,
            "sef_link" => $sef_link);
        $this->load->model("yazi_model");
        $this->yazi_model->projeSave($gonderilern);

        $upload = $config['upload_path'] = 'uploads';
        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('kapak_resim')) {
            $error = array('error' => $this->upload->display_errors());
            //$this->load->view('upload_form', $error);

            print_r($error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data();
            $resim_adi = $upload_data['file_name'];
            $dizi = array("yazi_id" => $proje_id,
                "yol" => $upload,
                "url" => $resim_adi,
                "kapak" => "1");
            $this->load->model("yazi_model");
            $this->yazi_model->resim_insert($dizi);

            //$this->load->view('upload_success', $data);
            redirect("admin/proje_duzenle");
        }


    }

    public function proje_duzenle()
    {
        $this->load->model("yazi_model");
        $proje_Sayi=$this->yazi_model->proje_sayi();

        $this->load->library('pagination');
        $config['base_url']=base_url("admin/proje_duzenle");
        $config['total_rows']=$proje_Sayi[0]->proje_id;;
        $config['per_page']=4;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;



        $this->data['pro'] = $this->yazi_model->projesayfa($config['per_page'],$page);
        $this->data['linkler'] = $this->pagination->create_links();
        $this->load->view("admin/projeduzenle", $this->data);
    }
    public function projeDuzenleSayfa($id){
        $this->load->model("yazi_model");
        $data = $this->yazi_model->projesec($id);
        $this->data['veri']=$data;
        $this->load->view("admin/projeDuzenleSayfa",$this->data);

    }
    public function proje_duzenle_islem(){
        $baslik = $this->input->post("baslik");
        $versiyon = $this->input->post("versiyon");
        $ozellikler = $this->input->post("ozellikler");
        $surum_not = $this->input->post("surum_not");
        $link = $this->input->post("link");
        $metin = $this->input->post("metin");
        $proje_id = $this->input->post("proje_id");
        $gelen = ['<div>', '</div>'];
        $metin = str_replace($gelen, "", $metin);
        $sef_link = $this->sef_link($baslik);
        $gonderilern = array("proje_isim" => $baslik,
            "amaci" => $metin,
            "versiyon" => $versiyon,
            "ozellikler" => $ozellikler,
            "surum_notlari" => $surum_not,
            "link" => $link,
            "sef_link" => $sef_link);
        $this->load->model("yazi_model");
        $this->yazi_model->projeupdate($proje_id,$gonderilern);

        $upload = $config['upload_path'] = 'uploads';
        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $test = $this->input->post('kapak_resim');
        if ($_FILES['kapak_resim']['size'] > 0) {

            if (!$this->upload->do_upload('kapak_resim')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                $data = array('upload_data' => $this->upload->data());
                $upload_data = $this->upload->data();
                $resim_adi = $upload_data['file_name'];
                $dizi = array("yazi_id" => $proje_id,
                    "yol" => $upload,
                    "url" => $resim_adi,
                    "kapak" => "1");
                $this->load->model("yazi_model");
                $this->yazi_model->resim_update($proje_id, $dizi);
            }
            redirect("admin/proje_duzenle");
        }

    }
    public function projeSil($id){
        $this->load->model("yazi_model");
        $this->yazi_model->proje_sil($id);
        redirect("admin/proje_duzenle");
    }
}