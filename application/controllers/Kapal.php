<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Kapal extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kapal_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'E-Tambat Labuh : Sistem Informasi Tambat Labuh PPS Kendari';
        $data['record'] = $this->kapal_model->getAllKapal();
        $this->loadViews("kapal", $this->global, $data , NULL);
    }

    function tambah(){
        $data = array(
               'nama_kapal'  => $this->input->post('nama_kapal'),
               'pemilik' => $this->input->post('pemilik'),
               'no_izin' => $this->input->post('no_izin'),
               'gt' => $this->input->post('gt'),
               'alat_tangkap' => $this->input->post('alat_tangkap'),
               'tanda_selar' => $this->input->post('tanda_selar'),
               'tipe_kapal' => $this->input->post('tipe_kapal'),
               'panjang' => $this->input->post('panjang'),
               'no_siup' => $this->input->post('no_siup')
        );
        $this->kapal_model->tambah($data);
        $this->session->set_flashdata('notif','<div class="alert alert-primary alert-dismissible show fade">
        <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
          Data Kapal Berhasil Ditambahkan.</div></div>');
        redirect('kapal');
    }

    public function hapus($id)
    {
        $this->kapal_model->hapus($id);
        $this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
          Data Kapal Berhasil Dihapus.</div></div>');
        redirect('kapal');
    }

    function ubah(){
        $id = $this->input->post('id');
           $data = array(
               'nama_kapal'  => $this->input->post('nama_kapal'),
               'pemilik' => $this->input->post('pemilik'),
               'no_izin' => $this->input->post('no_izin'),
               'gt' => $this->input->post('gt'),
               'alat_tangkap' => $this->input->post('alat_tangkap'),
               'tanda_selar' => $this->input->post('tanda_selar'),
               'tipe_kapal' => $this->input->post('tipe_kapal'),
               'panjang' => $this->input->post('panjang'),
               'no_siup' => $this->input->post('no_siup')
           );
           $this->kapal_model->ubah($data,$id);
           $this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissible show fade">
           <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
             Data Kapal Berhasil Diubah.</div></div>');
           redirect('kapal');
       }

public function get_kapal(){
        $this->load->library('datatables');
        $this->datatables->select('*');
        $this->datatables->from('tbl_kapal');
        return print_r($this->datatables->generate());
   }
}

?>