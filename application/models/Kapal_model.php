<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Kapal_model extends CI_Model {

    private $_table = "tbl_kapal";

    public function getAllKapal()
    {
        return $this->db->get($this->_table)->result_array();
    }

    function tambah($data){
        $this->db->insert($this->_table, $data);
        return TRUE;
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->_table);
    }

    function ubah($data, $id){
        $this->db->where('id',$id);
        $this->db->update($this->_table, $data);
        return TRUE;
    }

   

}

  