<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'Errors';

    $this->load->helper(array('url','html'));
  }

  function index()
  { 
    $data['path'] = base_url('assets');
    $this->load->view('errors/html/error_404', $this->data);
  }

}
