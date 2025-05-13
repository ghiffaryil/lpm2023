<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		is_login();

		// company_profile
    $this->data['company_data']    					  = $this->Company_model->company_profile();

    // template
    $this->data['logo_header_template'] 			= $this->Template_model->logo_header();
		$this->data['navbar_template'] 					  = $this->Template_model->navbar();
		$this->data['sidebar_template'] 					= $this->Template_model->sidebar();
		$this->data['background_template'] 			  = $this->Template_model->background();
    $this->data['sidebarstyle_template'] 		  = $this->Template_model->sidebarstyle();
	}

	public function index()
	{
		$this->data['page_title'] = 'Dashboard';

		$this->data['get_total_menu']     			= $this->Menu_model->total_rows();
		$this->data['get_total_submenu']     		= $this->Submenu_model->total_rows();
		$this->data['get_total_user']     			= $this->Auth_model->total_rows();
		$this->data['get_total_usertype']     	= $this->Usertype_model->total_rows();

		$this->load->view('back/master/master', $this->data);
	}
}
