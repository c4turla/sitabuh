<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Report extends BaseController
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
    public function kapal()
    {
        $this->global['pageTitle'] = 'E-Tambat Labuh : Sistem Informasi Tambat Labuh PPS Kendari';
        $data['record'] = $this->kapal_model->getAllKapal();
        $this->loadViews("laporan/reportkapal", $this->global, $data , NULL);
    }

    


}

?>