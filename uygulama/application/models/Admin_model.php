<?php
class admin_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    public  function giris($kullanici = array()){
        //$this->db->where("eposta",$kullanici["email"] and "sifre",$kullanici["password"])->get('uyeler')->result();
        $eposta = $kullanici["email"];
        $sifre = $kullanici["password"];
        $query= "SELECT * FROM uyeler where eposta = '$eposta' and sifre='$sifre' and kullanici_tur='admin'";
        $result = $this->db->query($query);
        $num_rows = $result->num_rows(); //kaç satır dönüyor

        if ($num_rows > 0) {
           // echo $num_rows;
            $return_value = $result->result();
            return $return_value;
        }else{
            $return_value="Kullanıcı Bulunamadı";
            return $return_value;
        }


    }
    public function cookiekontorol($eposta){
        return $this->db->where('eposta',$eposta)->get('uyeler')->result();
    }

    public function girisyap($data=array()){
        $eposta=$data['eposta'];
        $sifre=$data['sifre'];
        $query="select * from uyeler where eposta='$eposta' and sifre='$sifre'";
        $result = $this->db->query($query);
        $sayi = $result->num_rows();
        echo $sayi;
        if($sayi==1){
            $geri_donen=$result->result();
            return $geri_donen;
        }else{
            $geri_donen="Hata eposta yada şifreler eşleşmiyor";
            return $geri_donen;
        }
    }
    public function kayit($veri=array()){
        $eposta = $veri["eposta"];
        $query= "select eposta from uyeler where eposta='$eposta'";
        $result=$this->db->query($query);
        $sayi = $result->num_rows();
        if($sayi==1){
            $geri_don="Aynı eposta ile zaten bir hesap bulunmakta";
            return $geri_don;
        }else {
            $insert= $this->db->insert('uyeler', $veri);
            if($insert){
                //return $insert;
                $geri_don= "Başarılı şekilde Kayıt olundu";
                return $geri_don;
            }else{
                $geri_don= "Kayıt olunurken hata";
                return $geri_don;
            }
        }
    }
    public function kullanicigetir(){
        return $this->db->get('uyeler')->result();
    }
    public function kullaniciGet($id){
        return $this->db->where("id",$id)->get('uyeler')->result();
    }
    public function guncelle($id,$dizi=array()){
        return $this->db->where("id",$id)->update('uyeler',$dizi);
    }
    public function kullanicidelete($id){
        return $this->db->where("id",$id)->delete('uyeler');
    }
    public function yorum_onayla($onay=array(),$id=array()){
        //return $this->db->where('yorum_id',$id)->update('yorum',$onay);
        $query="update yorum set onay=$onay where yorum_id=$id";
        $this->db->query($query);
      //  return $result->result();
    }
    public function yorum_sil(){
       return $this->db->where("onay",2)->delete('yorum');
    }
    public function ayarcek()
    {
        return $this->db->get('ayar')->result();
    }
    public function ayarguncelle($data=array()){
        return $this->db->where("ayar_id",1)->update('ayar',$data);
    }
}