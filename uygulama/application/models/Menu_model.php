<?php
class Menu_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public $tablename="menu";
    public function menuGetir(){
    return $this->db->get($this->tablename)->result();
    }
    public function menusil($id){
        return $this->db->where("menu_id",$id)->delete($this->tablename);
    }
    public function menuekle($data=array()){
        return $this->db->insert($this->tablename,$data);
    }
    public function recentpost(){
        $tablo="yazilar";
        return $this->db->order_by('yid', 'DESC')->get('yazilar',3)->result();
    }
    public function categories(){
        $tablo="kategori";
        return $this->db->get('kategori')->result();
    }
    /*public function categori_isim($id){
        return $this->db->where("kategori_id",$id)->get('kategori')->result();
    }*/
    public function kategori_sayfa($tag){
       return $this->db->where("tag",$tag)->get('kategori')->result();

    }
    public function menu_liste($id){
       return $this->db->where("menu_id",$id)->get($this->tablename)->result();

    }
    public function menuGuncel($id,$data=array()){
        return $this->db->where("menu_id",$id)->update($this->tablename,$data);
    }
    public function kategori_ekle($data=array()){
        return $this->db->insert('kategori',$data);
    }
    public function kategorisil($id){
        return $this->db->where("id",$id)->delete('kategori');
    }
    public function kategori_listele($id){
        return $this->db->where("id",$id)->get('kategori')->result();
    }
    public function kategori_guncelle($id,$data=array()){
        return $this->db->where("id",$id)->update('kategori',$data);
    }
}
