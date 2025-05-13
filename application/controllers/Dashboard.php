<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->data['module'] = 'Dashboard';

		$this->load->model(array('Dashboard_model', 'Individu_model'));

		$this->load->helper(array('url', 'html'));
		$this->load->database();

		// company_profile
		$this->data['company_data']               = $this->Company_model->company_profile();

		// template
		$this->data['logo_header_template']       = $this->Template_model->logo_header();
		$this->data['navbar_template']            = $this->Template_model->navbar();
		$this->data['sidebar_template']           = $this->Template_model->sidebar();
		$this->data['background_template']        = $this->Template_model->background();
		$this->data['sidebarstyle_template']      = $this->Template_model->sidebarstyle();
	}

	public function index()
	{
		// var_dump('masuk');
		// die;
		// is_login();
		// is_read();

		// if (!is_superadmin()) {
		// 	$this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
		// 	redirect('dashboard');
		// }

		$this->data['page_title'] = 'Dashboard';

		$this->data['get_all_provinsi']   = $this->Dashboard_model->get_all_provinsi();
		$this->data['get_all_kabupaten']  = $this->Dashboard_model->get_all_kabupaten();
		$this->data['get_all_kecamatan']  = $this->Dashboard_model->get_all_kecamatan();
		$this->data['get_all_kelurahan']  = $this->Dashboard_model->get_all_kelurahan();
		$this->data['penduduk']      	  = $this->Dashboard_model->get_penduduk();

		$nik 							  = $this->input->get('nik');
		$this->data['individu']       	  = $this->Dashboard_model->get_pencarian_individu($nik);
		$this->data['komunitas']      	  = $this->Dashboard_model->get_pencarian_komunitas($nik);
		$this->data['user']      	  	  = $this->Dashboard_model->get_search_penduduk($nik);
		$this->data['total_individu'] 	  = $this->Dashboard_model->get_nik_transaksi_individu($nik);
		$this->data['total_komunitas']	  = $this->Dashboard_model->get_nik_transaksi_komunitas($nik);


		$this->data['pencarian'] = $nik;
		$this->load->view('back/dashboard/index', $this->data);
	}

	public function get_data_penduduk()
	{
		$nik  = $this->input->get('nik');
		$data = $this->Dashboard_model->get_nik_penduduk($nik);
		echo json_encode($data);
	}

	public function get_data_individu()
	{
		$nik  = $this->input->get('nik');
		$data = $this->Dashboard_model->get_nik_transaksi_individu($nik);
		echo json_encode($data);
	}

	public function get_data_komunitas()
	{
		$nik  = $this->input->get('nik');
		$data = $this->Dashboard_model->get_nik_transaksi_komunitas($nik);
		echo json_encode($data);
	}

	public function get_all_data()
	{
		$nik  = $this->input->get('nik');
		$data = $this->Dashboard_model->get_all_data($nik);
		echo json_encode($data);
	}
}
