<?php
class Yazi_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    public $tableName="yazilar";
    public function getFetchall(){
       return $this->db->get($this->tableName)->result();
    }
    public function selectGelen($sef){
        //return $this->db->where("sef",$sef)->get($this->tableName)->result();
        $query="select * from yazilar inner join resimler  on yazilar.yid=resimler.yazi_id where sef='$sef' ";
        $result=$this->db->query($query);
        $sayi =$result->num_rows();
        if($sayi>0) {
            return $result->result();
        }else{
            $geridon="Hata Sayfa bulunamadı";
            return $geridon;
        }

    }
    public function kategoriyegorelistele($kategori_id,$limit,$baslangic){
        //return $this->db->where("kategori_id",$kategori_id)->get($this->tableName)->result();
        $query="select * from yazilar inner join resimler  on yazilar.yid=resimler.yazi_id where kategori_id='$kategori_id'and kapak=1  ORDER BY yid DESC LIMIT $baslangic,$limit ";
        $result=$this->db->query($query);
        return $result->result();

    }

    public function delete($id){
        return $this->db->where("yid",$id)->delete($this->tableName);
    }
    public function update($id,$data=array()){
        return $this->db->where("yid",$id)->update($this->tableName,$data);
    }
    public function resim_update($id,$data=array()){
        print_r($data);
       // return $this->db->where("yazi_id",$id)->update('resimler',$data);
            $url = $data['url'];

        $query="update resimler set url='$url' where yazi_id=$id and kapak=1";
        $this->db->query($query);

    }
    public function yaziduzenle_join($limit,$baslangic){
        $query="select * from yazilar inner join resimler  on yazilar.yid=resimler.yazi_id where kapak=1 ORDER BY yid DESC LIMIT $baslangic,$limit";
        $result=$this->db->query($query);
        return $result->result();
    }


    public function yaziduzenle_sayfa($id){
        $query="select * from yazilar inner join resimler  on yazilar.yid=resimler.yazi_id where yid=$id ";
        $result=$this->db->query($query);
        return $result->result();
    }

    public function insert($data=array()){
        $this->db->insert($this->tableName,$data);
         return $this->db->insert_id();

    }
    public function resim_insert($veri=array()){
        return $this->db->insert('resimler',$veri);
    }
    public function resimToplu(){
        return $this->db->get('resimler')->result();
    }
    public function resim_Getir($id){
        return $this->db->where("yazi_id",$id)->get('resimler')->result();


    }
    public function yorum($yazi_id){
        //return $this->db->where("yazi_id",$yazi_id)->get('yorum')->result();
        $query="select * from yorum inner join uyeler on yorum.uye_id=uyeler.id where yazi_id=$yazi_id and üst_id=0 and onay=1 ";
        $result=$this->db->query($query);
        return $result->result();
    }
    public function yorum_cevap($ust_id){
        $query="select * from yorum inner join uyeler on yorum.uye_id=uyeler.id  where üst_id=$ust_id and onay=1 and üst_id!=0 ";
        $result=$this->db->query($query);
        return $result->result();
    }
    public function arama($veri,$limit,$baslangic){
        //$query="select * from yazilar where baslik like '%$veri%' or yazi like '%$veri%' ";
        $query="select * from yazilar inner join resimler  on yazilar.yid=resimler.yazi_id where baslik like '%$veri%' or yazi like '%$veri%' and kapak=1 ORDER BY yid DESC LIMIT $baslangic,$limit ";

        $result=$this->db->query($query);
        return $result->result();
    }
    public function yorum_yap($veri=array()){
        $insert= $this->db->insert('yorum',$veri);
        if($insert){
            $geridon="Yorumunuz başarıyla gönderildi. Editör Onayından sonra yayınlanacak";
            return $geridon;
        }else{
            $geridon="Bir hata oluştu daha sonra tekrar deneyin";
            return $geridon;
        }
    }
    public function yazargetir(){
        $query="select id,isim,soyisim from uyeler";
        $result=$this->db->query($query);
        return $result->result();
    }

    public function yorum_sayac($yazi_id){
        $query="select * from  yorum where onay=1 and yazi_id='$yazi_id'";
        $value = $this->db->query($query);
        $num_rows = $value->num_rows();

        return $num_rows;
    }
    // Admin anasayfa için//
    public function onaybekleyenyorum(){
        $q="select count(*) as'bekleyen' from yorum where onay = 0";
        $r=$this->db->query($q);
        return $r->result();
    }
    public function yazisayisi(){
        $q="select count(*) as'yazi' from yazilar";
        $r=$this->db->query($q);
        return $r->result();
    }
    public function uyesayi(){
        $q="select count(*) as'uye' from uyeler";
        $r=$this->db->query($q);
        return $r->result();
    }
    public function AdminYorum(){
        $query="select * from yorum inner join uyeler on yorum.uye_id=uyeler.id inner join yazilar on yorum.yazi_id=yazilar.yid where onay=0 ";
        $result=$this->db->query($query);
        return $result->result();
    }
    //proje sayfası için
    public function projesayfa($limit,$baslangic){
        $query="Select * from projeler inner join resimler on projeler.proje_id =resimler.yazi_id where kapak=1 ORDER BY proje_id DESC LIMIT $baslangic, $limit";
        $result = $this->db->query($query);
        return $result->result();
    }
    public function projeidogrenme(){
        //Son idyi almak için yaptık dropzoneda kullancam
        $query="Select * from projeler inner join resimler on projeler.proje_id =resimler.yazi_id where kapak=1";
        $result = $this->db->query($query);
        return $result->result();
        //Son idyi almak için yaptık dropzoneda kullancam
    }
    public function proje($sef){
        $query="Select * from projeler inner join resimler on projeler.proje_id =resimler.yazi_id where sef_link='$sef'";
        $result = $this->db->query($query);
        return $result->result();
    }
    public function projeSave($dizi=array()){
        return $this->db->insert('projeler',$dizi);
    }
    public function projesec($id){
        return $this->db->where("proje_id",$id)->get('projeler')->result();
    }
    public function projeupdate($id,$data=array()){
        return $this->db->where("proje_id",$id)->update('projeler',$data);
    }
    public function proje_sil($id){
        return $this->db->where("proje_id",$id)->delete('projeler');
    }
    public function proje_sayi(){
        $q="select count(*) as'proje_id' from projeler";
        $r=$this->db->query($q);
        return $r->result();
    }
}