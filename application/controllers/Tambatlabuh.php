<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';



class Tambatlabuh extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tambat_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function gtkurang()
    {
        $this->global['pageTitle'] = 'SITABUH : Sistem Informasi Tambat Labuh PPS Kendari';
        $data['record'] = $this->tambat_model->getTambatKurang();
        $data['kapal'] = $this->tambat_model->getKapal(); 
        $data['kode_tambat'] = $this->tambat_model->CreateCode();
        $this->loadViews("tambat/gtkurang", $this->global, $data , NULL);
    }

    function tambahgtkurang(){

            $data = array(
                            'id_kapal'=>$this->input->post('namakapal'),
                            'kd_tambat'=>$this->input->post('kd_tambat'),
                            'tanggal_kedatangan'=>$this->input->post('awal'),
                            'tanggal_keberangkatan'=>$this->input->post('akhir'),
                            'etmal'=>$this->input->post('etmal'),
                            'tagihan'=>$this->input->post('total'),
                            'user_input'=>$this->session->userdata('name'),
                            'total_tagihan'=>$this->input->post('tagihan'),
                            'tgl_input' => date('Y-m-d H:i:s')
            );
            $this->tambat_model->tambah_gtkurang($data);
            $this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
              Data Tambat Labuh Berhasil Ditambahkan.</div></div>');
            redirect('gtkurang');
    }

    function ubahgtkurang(){
      $id = $this->input->post('id');
      $data = array(
          'status'=>$this->input->post('status'),
          'total_tagihan'=> 0,
          'tgl_input' => date('Y-m-d H:i:s')
         );
         $this->tambat_model->ubah_gtkurang($data,$id);
         $this->session->set_flashdata('notif','<div class="alert alert-warning alert-dismissible show fade">
         <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
           Data Tambat Labuh Berhasil Di Void.</div></div>');
         redirect('gtkurang');
     }

    function hapus_gtkurang($id){
		$this->tambat_model->gtkurang_delete($id);
        $this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
              Data Tambat Labuh Berhasil Dihapus.</div></div>');
		redirect('gtkurang');
    }

    function cetak_gtkurang(){
        $id_tambat = $this->uri->segment(3);
        $data['rows'] = $this->tambat_model->pilih_gtkurang($id_tambat)->row_array();

        $mpdf = new \Mpdf\Mpdf(['utf-8', array(215,148)]);
        $html = $this->load->view('tambat/print_gtkurang',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }


    public function gtlebih()
    {
        $this->global['pageTitle'] = 'SITABUH : Sistem Informasi Tambat Labuh PPS Kendari';
        $data['record'] = $this->tambat_model->getTambatLebih();
        $data['kapal'] = $this->tambat_model->getKapalGT(); 
        $data['kode_tambat'] = $this->tambat_model->CodeGTLebih();
        $this->loadViews("tambat/gtlebih", $this->global, $data , NULL);
    }

    function tambahgtlebih(){
        $data = array(
                        'id_kapal'=>$this->input->post('namakapal'),
                        'kd_tambat'=>$this->input->post('kd_tambat'),
                        'tanggal_kedatangan'=>$this->input->post('awal'),
                        'tanggal_keberangkatan'=>$this->input->post('akhir'),
                        'jam_datang'=>$this->input->post('jam_awal'),
                        'jam_berangkat'=>$this->input->post('jam_akhir'),
                        'etmal'=>$this->input->post('etmal'),
                        'tagihan'=>$this->input->post('tarif'),
                        'user_input'=>$this->session->userdata('name'),
                        'total_kolam'=>$this->input->post('kolam'),
                        'total_tambat'=>$this->input->post('tagihan'),
                        'tgl_input' => date('Y-m-d H:i:s')
        );
        $this->tambat_model->tambah_gtlebih($data);
        $this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
          Data Tambat Labuh Berhasil Ditambahkan.</div></div>');
        redirect('gtlebih');
    }

    function voidgtlebih(){
      $id = $this->input->post('id');
          $data = array(
              'status'=> 'Void',
              'total_tambat'=> 0,
              'total_kolam'=> 0,
              'tgl_input' => date('Y-m-d H:i:s')
            );
         $this->tambat_model->ubah_gtlebih($data,$id);
         $this->session->set_flashdata('notif','<div class="alert alert-warning alert-dismissible show fade">
         <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
           Data Tambat Labuh Berhasil Di Void.</div></div>');
         redirect('gtlebih');
     }

    function hapus_gtlebih($id){
		$this->tambat_model->gtlebih_delete($id);
        $this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
              Data Tambat Labuh Berhasil Dihapus.</div></div>');
		redirect('gtlebih');
    }

    function cetak_gtlebih(){
        $id_tambat = $this->uri->segment(3);
        $data['rows'] = $this->tambat_model->pilih_gtlebih($id_tambat)->row_array();

        $mpdf = new \Mpdf\Mpdf(['utf-8', array(215,148)]);
        $html = $this->load->view('tambat/print_gtlebih',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }



    public function kapal_rusak()
    {
        $this->global['pageTitle'] = 'SITABUH : Sistem Informasi Tambat Labuh PPS Kendari';
        $data['record'] = $this->tambat_model->getKapalRusak();
        $data['kapal'] = $this->tambat_model->getKapalGT(); 
        $data['kode_tambat'] = $this->tambat_model->CodeKapalRusak();
        $this->loadViews("tambat/kapalrusak", $this->global, $data , NULL);
    }

    function tambahkapalrusak(){
        $data = array(
                        'id_kapal'=>$this->input->post('namakapal'),
                        'kd_tambat'=>$this->input->post('kd_tambat'),
                        'tanggal_kedatangan'=>$this->input->post('awal'),
                        'tanggal_keberangkatan'=>$this->input->post('akhir'),
                        'etmal'=>$this->input->post('etmal'),
                        'tagihan'=>$this->input->post('tarif'),
                        'total_tagihan'=>$this->input->post('tagihan')
        );
        $this->tambat_model->tambah_kapal_rusak($data);
        $this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
          Data Kapal Rusak (Floating Repair) Berhasil Ditambahkan.</div></div>');
        redirect('kapal_rusak');
    }

    function hapus_kr($id){
      $this->tambat_model->kr_delete($id);
          $this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissible show fade">
              <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
                Data Kapal Rusak (Floating Repair) Berhasil Dihapus.</div></div>');
      redirect('kapal_rusak');
      }
    
    function voidkapalrusak(){
        $id = $this->input->post('id');
            $data = array(
                'status'=> 'Void',
                'total_tagihan'=> 0,
                'tgl_input' => date('Y-m-d H:i:s')
              );
           $this->tambat_model->ubah_fr($data,$id);
           $this->session->set_flashdata('notif','<div class="alert alert-warning alert-dismissible show fade">
           <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
             Data Kapal Rusak Berhasil Di Void.</div></div>');
           redirect('kapal_rusak');
    }

    function cetak_fr(){
        $id_tambat = $this->uri->segment(3);
        $data['rows'] = $this->tambat_model->pilih_fr($id_tambat)->row_array();

        $mpdf = new \Mpdf\Mpdf(['utf-8', array(215,148)]);
        $html = $this->load->view('tambat/print_fr',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }


    public function etmal()
    {
          $this->global['pageTitle'] = 'SITABUH : Sistem Informasi Tambat Labuh PPS Kendari';
          $data['record'] = $this->tambat_model->getEtmal();
          $data['kapal'] = $this->tambat_model->getKapalGT(); 
          $data['kode_tambat'] = $this->tambat_model->CodeEtmal();
          $this->loadViews("tambat/etmal", $this->global, $data , NULL);
    }

    function tambahetmal(){
      $data = array(
                      'id_kapal'=>$this->input->post('namakapal'),
                      'kd_tambat'=>$this->input->post('kd_tambat'),
                      'tanggal_kedatangan'=>$this->input->post('awal'),
                      'tanggal_keberangkatan'=>$this->input->post('akhir'),
                      'etmal'=>$this->input->post('etmal'),
                      'tagihan'=>$this->input->post('tarif'),
                      'total_tagihan'=>$this->input->post('tagihan')
      );
      $this->tambat_model->tambah_etmal($data);
      $this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
        Data Kapal > 30 ETMAL Berhasil Ditambahkan.</div></div>');
      redirect('etmal');
  }

  function cetak_etmal(){
    $id_tambat = $this->uri->segment(3);
    $data['rows'] = $this->tambat_model->pilih_etmal($id_tambat)->row_array();

    $mpdf = new \Mpdf\Mpdf(['utf-8', array(215,148)]);
    $html = $this->load->view('tambat/print_etmal',$data,true);
    $mpdf->WriteHTML($html);
    $mpdf->Output();
}

function hapus_etmal($id){
  $this->tambat_model->etmal_delete($id);
      $this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissible show fade">
          <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
            Data Kapal Maksimal 30 Etmal Berhasil Dihapus.</div></div>');
  redirect('etmal');
  }

function voidetmal(){
  $id = $this->input->post('id');
      $data = array(
          'status'=> 'Void',
          'total_tagihan'=> 0,
          'tgl_input' => date('Y-m-d H:i:s')
        );
     $this->tambat_model->ubah_etmal($data,$id);
     $this->session->set_flashdata('notif','<div class="alert alert-warning alert-dismissible show fade">
     <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
       Data Kapal Maksimal 30 Etmal Berhasil Di Void.</div></div>');
     redirect('kapal_rusak');
}

    public function non_perikanan()
    {
          $this->global['pageTitle'] = 'SITABUH : Sistem Informasi Tambat Labuh PPS Kendari';
          $data['record'] = $this->tambat_model->getNon();
          $data['kapal'] = $this->tambat_model->getKapalNon(); 
          $data['kode_tambat'] = $this->tambat_model->CodeNon();
          $this->loadViews("tambat/nonperikanan", $this->global, $data , NULL);
    }

    function tambahnonperikanan(){
      $data = array(
                      'id_kapal'=>$this->input->post('namakapal'),
                      'kd_tambat'=>$this->input->post('kd_tambat'),
                      'tanggal_kedatangan'=>$this->input->post('awal'),
                      'tanggal_keberangkatan'=>$this->input->post('akhir'),
                      'etmal'=>$this->input->post('etmal'),
                      'user_input'=>$this->session->userdata('name'),
                      'tagihan'=>$this->input->post('tarif'),
                      'total_tagihan'=>$this->input->post('tagihan'),
                      'jasa_kebersihan'=>$this->input->post('jasa'),
                      'tgl_input' => date('Y-m-d H:i:s')
      );
      $this->tambat_model->tambah_non($data);
      $this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
        Data Kapal Non Perikanan Berhasil Ditambahkan.</div></div>');
      redirect('non_perikanan');
    }

    function voidnon(){
      $id = $this->input->post('id');
          $data = array(
              'status'=> 'Void',
              'total_tagihan'=> 0,
              'tgl_input' => date('Y-m-d H:i:s')
            );
         $this->tambat_model->ubah_non($data,$id);
         $this->session->set_flashdata('notif','<div class="alert alert-warning alert-dismissible show fade">
         <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
           Data Kapal Non Perikanan Berhasil Di Void.</div></div>');
         redirect('non_perikanan');
    }

    function cetak_non(){
      $id_tambat = $this->uri->segment(3);
      $data['rows'] = $this->tambat_model->pilih_non($id_tambat)->row_array();
  
      $mpdf = new \Mpdf\Mpdf(['utf-8', array(215,148)]);
      $html = $this->load->view('tambat/print_non',$data,true);
      $mpdf->WriteHTML($html);
      $mpdf->Output();
  }

  function hapus_non($id){
    $this->tambat_model->non_delete($id);
        $this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
              Data Kapal Non Perikanan Berhasil Dihapus.</div></div>');
    redirect('non_perikanan');
    }

    public function air()
    {
        $this->global['pageTitle'] = 'SITABUH : Sistem Informasi Tambat Labuh PPS Kendari';
        $data['record'] = $this->tambat_model->getAir();
        $data['kapal'] = $this->tambat_model->getKapalAll(); 
        $data['kode_air'] = $this->tambat_model->CodeAir();
        $this->loadViews("jasa/air", $this->global, $data , NULL);
    }

    function tambahair(){
        $data = array(
                        'id_kapal'=>$this->input->post('namakapal'),
                        'kode_air'=>$this->input->post('kode_air'),
                        'tgl_isi'=>$this->input->post('tgl_isi'),
                        'awal'=>$this->input->post('awal'),
                        'akhir'=>$this->input->post('akhir'),
                        'volume'=>$this->input->post('volume'),
                        'tarif'=>15500,
                        'total_tagihan'=>$this->input->post('tagihan'),
                        'user_input'=>$this->session->userdata('name'),
                        'tgl_input' => date('Y-m-d H:i:s')
        );
        $this->tambat_model->tambah_air($data);
        $this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
          Data Jasa Pelayanan Air Berhasil Ditambahkan.</div></div>');
        redirect('air');
    }

    function cetak_air(){
      $id_air = $this->uri->segment(3);
      $data['rows'] = $this->tambat_model->pilih_air($id_air)->row_array();
  
      $mpdf = new \Mpdf\Mpdf(['utf-8', array(215,148)]);
      $html = $this->load->view('jasa/print_air',$data,true);
      $mpdf->WriteHTML($html);
      $mpdf->Output();
  }

  function voidair(){
    $id = $this->input->post('id');
        $data = array(
            'status'=> 'Void',
            'total_tagihan'=> 0,
            'tgl_input' => date('Y-m-d H:i:s')
          );
       $this->tambat_model->ubah_air($data,$id);
       $this->session->set_flashdata('notif','<div class="alert alert-warning alert-dismissible show fade">
       <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
         Data Penjualan Air Berhasil Di Void.</div></div>');
       redirect('air');
  }

  function hapus_air($id){
    $this->tambat_model->air_delete($id);
        $this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
              Data Penjualan Air Berhasil Dihapus.</div></div>');
    redirect('air');
    }

    public function listrik()
    {
        $this->global['pageTitle'] = 'SITABUH : Sistem Informasi Tambat Labuh PPS Kendari';
        $data['record'] = $this->tambat_model->view_ordering('tbl_tambat','id_tambat','DESC');
        $this->loadViews("jasa/listrik", $this->global, $data , NULL);
    }



}

?>