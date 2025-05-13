<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class AjaxApi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penduduk_model', 'Penduduk_model');
    }

    public function getKabupaten()
    {
        $kabupaten = $this->Penduduk_model->get_kabupaten($this->input->get());
        echo json_encode($kabupaten);
    }
    public function getKecamatan()
    {
        $kecamatan = $this->Penduduk_model->get_kecamatan($this->input->get());
        echo json_encode($kecamatan);
    }
    public function getDesa_kelurahan()
    {
        $desa_kelurahan = $this->Penduduk_model->get_desa_kelurahan($this->input->get());
        echo json_encode($desa_kelurahan);
    }
    
}