<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Tambat_model extends CI_Model {

    public function view($table){
        return $this->db->get($table);
    }

    public function insert($table,$data){
        return $this->db->insert($table, $data);
    }

    public function insertBatch($table, $data)
    {
        return $this->db->insert_batch($table, $data); 
    }

    public function edit($table, $data){
        return $this->db->get_where($table, $data);
    }
 
    public function update($table, $data, $where){
        return $this->db->update($table, $data, $where); 
    }

    public function delete($table, $where){
        return $this->db->delete($table, $where);
    }

    public function view_where($table,$data){
        $this->db->where($data);
        return $this->db->get($table);
    }

    public function view_ordering_limit($table,$order,$ordering,$baris,$dari){
        $this->db->select('*');
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }
    
    public function view_ordering($table,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_where_ordering($table,$data,$order,$ordering){
        $this->db->where($data);
        $this->db->order_by($order,$ordering);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    function getTambatKurang()
    {
        $this->db->select('tbl_kapal.id, tbl_kapal.nama_kapal, tbl_kapal.gt, tbl_kapal.panjang, tbl_tambat.id_tambat, tbl_tambat.id_kapal, tbl_tambat.kd_tambat, tbl_tambat.tanggal_kedatangan, tbl_tambat.tanggal_keberangkatan, tbl_tambat.etmal, tbl_tambat.tagihan, tbl_tambat.total_tagihan , tbl_tambat.status');
        $this->db->from('tbl_tambat');
        $this->db->join('tbl_kapal','tbl_tambat.id_kapal = tbl_kapal.id');
        $this->db->where('tbl_kapal.gt <=', 30);
        $query = $this->db->get();

        return $query->result_array();
    }

    function tambah_gtkurang($data){
        $this->db->insert('tbl_tambat', $data);
        return TRUE;
    }

    function ubah_gtkurang($data, $id){
        $this->db->where('id_tambat',$id);
        $this->db->update('tbl_tambat', $data);
        return TRUE;
    }

    function pilih_gtkurang($id_tambat){
        return $this->db->query("SELECT tbl_kapal.id, tbl_kapal.nama_kapal, tbl_kapal.gt, tbl_kapal.panjang, tbl_tambat.id_tambat, tbl_tambat.id_kapal, tbl_tambat.kd_tambat, tbl_tambat.tanggal_kedatangan, tbl_tambat.tanggal_keberangkatan, tbl_tambat.etmal, tbl_tambat.tagihan, tbl_tambat.total_tagihan , tbl_tambat.status FROM tbl_tambat JOIN tbl_kapal ON tbl_tambat.id_kapal = tbl_kapal.id WHERE tbl_tambat.id_tambat='$id_tambat'");
    }

    function gtkurang_delete($id){
        return $this->db->query("DELETE FROM tbl_tambat where id_tambat='$id'");
    }

    function getTambatLebih()
    {
        $this->db->select('tbl_kapal.id, tbl_kapal.nama_kapal, tbl_kapal.gt, tbl_kapal.panjang, tbl_gtlebih.id_tambat, tbl_gtlebih.id_kapal, tbl_gtlebih.kd_tambat, tbl_gtlebih.tanggal_kedatangan, tbl_gtlebih.tanggal_keberangkatan, tbl_gtlebih.jam_datang, tbl_gtlebih.jam_berangkat, tbl_gtlebih.etmal, tbl_gtlebih.tagihan, tbl_gtlebih.total_tambat, tbl_gtlebih.total_kolam , tbl_gtlebih.status');
        $this->db->from('tbl_gtlebih');
        $this->db->join('tbl_kapal','tbl_gtlebih.id_kapal = tbl_kapal.id');
        $this->db->where('tbl_kapal.gt >', 30);
        $query = $this->db->get();

        return $query->result_array();
    }

    function pilih_gtlebih($id_tambat){
        return $this->db->query("SELECT tbl_kapal.id, tbl_kapal.nama_kapal, tbl_kapal.gt, tbl_kapal.panjang, l.id_tambat, l.id_kapal, l.kd_tambat, l.tanggal_kedatangan, l.tanggal_keberangkatan, l.jam_datang, l.jam_berangkat, l.etmal, l.tagihan, l.total_tambat, l.total_kolam FROM tbl_gtlebih l JOIN tbl_kapal ON l.id_kapal = tbl_kapal.id WHERE id_tambat='$id_tambat'");
    }

    function tambah_gtlebih($data){
        $this->db->insert('tbl_gtlebih', $data);
        return TRUE;
    }

    function ubah_gtlebih($data, $id){
        $this->db->where('id_tambat',$id);
        $this->db->update('tbl_gtlebih', $data);
        return TRUE;
    }

    public function CodeGTLebih(){
        $this->db->select('RIGHT(tbl_gtlebih.kd_tambat,2) as kode_tambat', FALSE);
        $this->db->order_by('kode_tambat','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tbl_gtlebih');
            if($query->num_rows() <> 0){      
                 $data = $query->row();
                 $kode = intval($data->kode_tambat) + 1; 
            }
            else{      
                 $kode = 1;  
            }
        $batas = str_pad($kode, 6, "0", STR_PAD_LEFT);    
        $kodetampil = "TP".$batas;
        return $kodetampil;  
    }

    function gtlebih_delete($id){
        return $this->db->query("DELETE FROM tbl_gtlebih where id_tambat='$id'");
    }


    public function CreateCode(){
        $this->db->select('RIGHT(tbl_tambat.kd_tambat,2) as kode_tambat', FALSE);
        $this->db->order_by('kode_tambat','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tbl_tambat');
            if($query->num_rows() <> 0){      
                 $data = $query->row();
                 $kode = intval($data->kode_tambat) + 1; 
            }
            else{      
                 $kode = 1;  
            }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodetampil = "TL".$batas;
        return $kodetampil;  
    }

    public function CodeKapalRusak(){
        $this->db->select('RIGHT(tbl_kapal_rusak.kd_tambat,2) as kode_tambat', FALSE);
        $this->db->order_by('kode_tambat','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tbl_kapal_rusak');
            if($query->num_rows() <> 0){      
                 $data = $query->row();
                 $kode = intval($data->kode_tambat) + 1; 
            }
            else{      
                 $kode = 1;  
            }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodetampil = "FR".$batas;
        return $kodetampil;  
    }

    public function CodeEtmal(){
        $this->db->select('RIGHT(tbl_maks_etmal.kd_tambat,2) as kode_tambat', FALSE);
        $this->db->order_by('kode_tambat','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tbl_maks_etmal');
            if($query->num_rows() <> 0){      
                 $data = $query->row();
                 $kode = intval($data->kode_tambat) + 1; 
            }
            else{      
                 $kode = 1;  
            }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodetampil = "ME".$batas;
        return $kodetampil;  
    }

    public function CodeNon(){
        $this->db->select('RIGHT(tbl_nonperikanan.kd_tambat,2) as kode_tambat', FALSE);
        $this->db->order_by('kode_tambat','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tbl_nonperikanan');
            if($query->num_rows() <> 0){      
                 $data = $query->row();
                 $kode = intval($data->kode_tambat) + 1; 
            }
            else{      
                 $kode = 1;  
            }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodetampil = "NP".$batas;
        return $kodetampil;  
    }

    public function CodeAir(){
        $this->db->select('RIGHT(tbl_air.kode_air,2) as kode_air', FALSE);
        $this->db->order_by('kode_air','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tbl_air');
            if($query->num_rows() <> 0){      
                 $data = $query->row();
                 $kode = intval($data->kode_air) + 1; 
            }
            else{      
                 $kode = 1;  
            }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodetampil = "A".$batas;
        return $kodetampil;  
    }

    function getKapal()
    {
        $this->db->select('id, nama_kapal, gt, panjang');
        $this->db->from('tbl_kapal');
        $this->db->where('gt <=', 30);
        $this->db->order_by('nama_kapal', 'ASC');
        $query = $this->db->get();
        
        return $query->result();
    }

    function getKapalGT()
    {
        $this->db->select('id, nama_kapal, gt, panjang');
        $this->db->from('tbl_kapal');
        $this->db->where('gt >', 30);
        $this->db->order_by('nama_kapal', 'ASC');
        $query = $this->db->get();
        
        return $query->result();
    }

    function getKapalAll()
    {
        $this->db->select('id, nama_kapal, gt, panjang');
        $this->db->from('tbl_kapal');
        $this->db->order_by('nama_kapal', 'ASC');
        $query = $this->db->get();        
        return $query->result();
    }

    function getKapalNon()
    {
        $this->db->select('id, nama_kapal, gt, panjang, tipe_kapal');
        $this->db->from('tbl_kapal');
        $this->db->where('tipe_kapal = "Non Perikanan"');
        $this->db->order_by('nama_kapal', 'ASC');
        $query = $this->db->get();        
        return $query->result();
    }

    function getKapalRusak()
    {
        $this->db->select('tbl_kapal.id, tbl_kapal.nama_kapal, tbl_kapal.gt, tbl_kapal.panjang, tbl_kapal_rusak.id_tambat, tbl_kapal_rusak.kd_tambat, tbl_kapal_rusak.tanggal_kedatangan, tbl_kapal_rusak.tanggal_keberangkatan, tbl_kapal_rusak.etmal, tbl_kapal_rusak.tagihan, tbl_kapal_rusak.total_tagihan');
        $this->db->from('tbl_kapal_rusak');
        $this->db->join('tbl_kapal','tbl_kapal_rusak.id_kapal = tbl_kapal.id');
        $query = $this->db->get();

        return $query->result_array();
    }

    function pilih_fr($id_tambat){
        return $this->db->query("SELECT tbl_kapal.id, tbl_kapal.nama_kapal, tbl_kapal.gt, tbl_kapal.panjang, l.id_tambat, l.id_kapal, l.kd_tambat, l.tanggal_kedatangan, l.tanggal_keberangkatan, l.etmal, l.tagihan, l.total_tagihan FROM tbl_kapal_rusak l JOIN tbl_kapal ON l.id_kapal = tbl_kapal.id WHERE id_tambat='$id_tambat'");
    }

    function ubah_fr($data, $id){
        $this->db->where('id_tambat',$id);
        $this->db->update('tbl_kapal_rusak', $data);
        return TRUE;
    }

    function getEtmal()
    {
        $this->db->select('tbl_kapal.id, tbl_kapal.nama_kapal, tbl_kapal.gt, tbl_kapal.panjang, tbl_maks_etmal.id_tambat, tbl_maks_etmal.kd_tambat, tbl_maks_etmal.tanggal_kedatangan, tbl_maks_etmal.tanggal_keberangkatan, tbl_maks_etmal.etmal, tbl_maks_etmal.tagihan, tbl_maks_etmal.total_tagihan');
        $this->db->from('tbl_maks_etmal');
        $this->db->join('tbl_kapal','tbl_maks_etmal.id_kapal = tbl_kapal.id');
        $query = $this->db->get();

        return $query->result_array();
    }

    function tambah_etmal($data){
        $this->db->insert('tbl_maks_etmal', $data);
        return TRUE;
    }

    function pilih_etmal($id_tambat){
        return $this->db->query("SELECT tbl_kapal.id, tbl_kapal.nama_kapal, tbl_kapal.gt, tbl_kapal.panjang, l.id_tambat, l.id_kapal, l.kd_tambat, l.tanggal_kedatangan, l.tanggal_keberangkatan, l.etmal, l.tagihan, l.total_tagihan FROM tbl_maks_etmal l JOIN tbl_kapal ON l.id_kapal = tbl_kapal.id WHERE id_tambat='$id_tambat'");
    }

    function ubah_etmal($data, $id){
        $this->db->where('id_tambat',$id);
        $this->db->update('tbl_maks_etmal', $data);
        return TRUE;
    }

    function getNon()
    {
        $this->db->select('tbl_kapal.id, tbl_kapal.nama_kapal, tbl_kapal.gt, tbl_kapal.panjang, tbl_nonperikanan.id_tambat, tbl_nonperikanan.kd_tambat, tbl_nonperikanan.tanggal_kedatangan, tbl_nonperikanan.tanggal_keberangkatan, tbl_nonperikanan.etmal, tbl_nonperikanan.tagihan, tbl_nonperikanan.total_tagihan, tbl_nonperikanan.jasa_kebersihan');
        $this->db->from('tbl_nonperikanan');
        $this->db->join('tbl_kapal','tbl_nonperikanan.id_kapal = tbl_kapal.id');
        $query = $this->db->get();

        return $query->result_array();
    }

    function tambah_non($data){
        $this->db->insert('tbl_nonperikanan', $data);
        return TRUE;
    }

    function ubah_non($data, $id){
        $this->db->where('id_tambat',$id);
        $this->db->update('tbl_nonperikanan', $data);
        return TRUE;
    }

    function pilih_non($id_tambat){
        return $this->db->query("SELECT tbl_kapal.id, tbl_kapal.nama_kapal, tbl_kapal.gt, tbl_kapal.panjang, l.id_tambat, l.id_kapal, l.kd_tambat, l.tanggal_kedatangan, l.tanggal_keberangkatan, l.etmal, l.tagihan, l.total_tagihan, l.jasa_kebersihan FROM tbl_nonperikanan l JOIN tbl_kapal ON l.id_kapal = tbl_kapal.id WHERE id_tambat='$id_tambat'");
    }

    function getAir()
    {
        $this->db->select('tbl_kapal.id, tbl_kapal.nama_kapal, tbl_kapal.gt, tbl_kapal.panjang, tbl_air.id_air, tbl_air.kode_air, tbl_air.awal, tbl_air.akhir,  tbl_air.tgl_isi, tbl_air.volume, tbl_air.tarif, tbl_air.total_tagihan');
        $this->db->from('tbl_air');
        $this->db->join('tbl_kapal','tbl_air.id_kapal = tbl_kapal.id');
        $this->db->order_by('id_air', 'desc');
        $query = $this->db->get();

        return $query->result_array();
    }

    function tambah_air($data){
        $this->db->insert('tbl_air', $data);
        return TRUE;
    }

    function pilih_air($id_air){
        return $this->db->query("SELECT tbl_kapal.id, tbl_kapal.nama_kapal, tbl_kapal.gt, tbl_kapal.panjang, l.id_air, l.kode_air, l.tgl_isi, l.awal, l.akhir, l.volume, l.tarif, l.total_tagihan, l.user_input, tbl_users.ttd FROM tbl_air l JOIN tbl_kapal ON l.id_kapal = tbl_kapal.id JOIN tbl_users ON l.user_input=tbl_users.name WHERE id_air='$id_air'");
    }

    function ubah_air($data, $id){
        $this->db->where('id_air',$id);
        $this->db->update('tbl_air', $data);
        return TRUE;
    }

    function air_delete($id){
        return $this->db->query("DELETE FROM tbl_air where id_air='$id'");
    }


    function tambah_kapal_rusak($data){
        $this->db->insert('tbl_kapal_rusak', $data);
        return TRUE;
    }

    function kr_delete($id){
        return $this->db->query("DELETE FROM tbl_kapal_rusak where id_tambat='$id'");
    }

    function non_delete($id){
        return $this->db->query("DELETE FROM tbl_nonperikanan where id_tambat='$id'");
    }

    function etmal_delete($id){
        return $this->db->query("DELETE FROM tbl_maks_etmal where id_tambat='$id'");
    }


}

  