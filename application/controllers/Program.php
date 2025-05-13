<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'Program';

    $this->load->model(array('Program_model'));

    // company_profile
    $this->data['company_data']    					  = $this->Company_model->company_profile();

    // template
    $this->data['logo_header_template'] 			= $this->Template_model->logo_header();
		$this->data['navbar_template'] 					  = $this->Template_model->navbar();
		$this->data['sidebar_template'] 					= $this->Template_model->sidebar();
		$this->data['background_template'] 			  = $this->Template_model->background();
    $this->data['sidebarstyle_template'] 		  = $this->Template_model->sidebarstyle();
    
    $this->data['btn_submit'] = 'Save';
    $this->data['btn_reset']  = 'Reset';
    $this->data['btn_add']    = 'Add New Data';
    $this->data['add_action'] = base_url('usertype/create');
  }

  function index()
  {
    is_login();
    is_read();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title'] = $this->data['module'].' List';

    $this->data['get_all'] = $this->Program_model->get_all();

    $this->load->view('back/program/program_list', $this->data);
  }

  function create()
  {
    is_login();
    is_create();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title'] = 'Create New '.$this->data['module'];
    $this->data['action']     = 'usertype/create_action';

    $this->data['usertype_name'] = [
      'name'          => 'usertype_name',
      'id'            => 'usertype_name',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('usertype_name'),
    ];

    $this->load->view('back/usertype/usertype_add', $this->data);

  }

  function create_action()
  {
    $this->form_validation->set_rules('usertype_name', 'Usertype Name', 'trim|required');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->create();
    }
    else
    {
      $data = array(
        'usertype_name'     => $this->input->post('usertype_name'),
      );

      $this->Usertype_model->insert($data);

			write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
      redirect('usertype');
    }
  }

  function update($id)
  {
    is_login();
    is_update();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['program']     = $this->Program_model->get_by_id($id);

    if($this->data['program'])
    {
      $this->data['page_title'] = 'Update Data '.$this->data['module'];
      $this->data['action']     = 'program/update_action';

      $this->data['id_program'] = [
        'name'          => 'id_program',
        'type'          => 'hidden',
      ];
			$this->data['nama_program'] = [
	      'name'          => 'nama_program',
	      'id'            => 'nama_program',
	      'class'         => 'form-control',
	      'autocomplete'  => 'off',
	      'required'      => '',
        'type'          => 'disabled',
	    ];
      $this->data['deskripsi'] = [
	      'name'          => 'deskripsi',
	      'id'            => 'deskripsi',
	      'class'         => 'form-control',
	      'autocomplete'  => 'off',
	      'required'      => '',
	    ];
      $this->data['direktorat'] = [
	      'name'          => 'direktorat',
	      'id'            => 'direktorat',
	      'class'         => 'form-control',
	      'autocomplete'  => 'off',
	      'required'      => '',
	    ];
      $this->data['divisi'] = [
	      'name'          => 'divisi',
	      'id'            => 'divisi',
	      'class'         => 'form-control',
	      'autocomplete'  => 'off',
	      'required'      => '',
	    ];
      $this->data['organ'] = [
	      'name'          => 'organ',
	      'id'            => 'organ',
	      'class'         => 'form-control',
	      'autocomplete'  => 'off',
	      'required'      => '',
	    ];

      $this->load->view('back/program/program_edit', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('program');
    }

  }

  function update_action()
  {
    $this->form_validation->set_rules('nama_program', 'Nama Program', 'trim|required');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('id_program'));
    }
    else
    {
			$data = array(
        'nama_program'  => $this->input->post('nama_program'),
        'deskripsi'     => $this->input->post('deskripsi'),
        'direktorat'    => $this->input->post('direktorat'),
        'divisi'        => $this->input->post('divisi'),
        'organ'         => $this->input->post('organ'),
      );

      $this->Program_model->update($this->input->post('id_program'),$data);

			write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
      redirect('program');
    }
  }

  function delete($id)
  {
    is_login();
    is_delete();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->Usertype_model->get_by_id($id);

    if($delete)
    {
      $this->Usertype_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('usertype');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('usertype');
    }
  }

}
