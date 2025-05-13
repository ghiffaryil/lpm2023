<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subprogram extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'Subprogram';

    $this->load->model(array('Subprogram_model'));

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
    $this->data['add_action'] = base_url('subprogram/create');
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

    $this->data['get_all'] = $this->Subprogram_model->get_all();

    $this->load->view('back/subprogram/subprogram_list', $this->data);
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
    $this->data['action']     = 'subprogram/create_action';

    //$this->data['get_all_combobox_program']      = $this->Program_model->get_all_combobox();
    $this->data['get_all_program'] = $this->Subprogram_model->get_all_program();

    $this->data['id_program'] = [
      'name'          => 'id_program',
      'id'            => 'id_program',
      'class'         => 'form-control',
      'required'      => '',
    ];

    $this->data['nama_subprogram'] = [
      'name'          => 'nama_subprogram',
      'id'            => 'nama_subprogram',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('nama_subprogram'),
    ];

    $this->load->view('back/subprogram/subprogram_add', $this->data);

  }

  function create_action()
  {
    $this->form_validation->set_rules('id_program', 'Nama Program', 'trim|required');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->create();
    }
    else
    {
      $data = array(
        'id_program'     => $this->input->post('id_program'),
        'nama_subprogram'  => $this->input->post('nama_subprogram'),
      );

      $this->Subprogram_model->insert($data);

			write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
      redirect('subprogram');
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

    $this->data['subprogram']     = $this->Subprogram_model->get_by_id($id);

    if($this->data['subprogram'])
    {
      $this->data['page_title'] = 'Update Data '.$this->data['module'];
      $this->data['action']     = 'subprogram/update_action';

      $this->data['id_subprogram'] = [
        'name'          => 'id_subprogram',
        'type'          => 'hidden',
      ];
      $this->data['id_program'] = [
	      'name'          => 'id_program',
	      'id'            => 'id_program',
	      'class'         => 'form-control',
	      'autocomplete'  => 'off',
	      'required'      => '',
	    ];
			$this->data['nama_subprogram'] = [
	      'name'          => 'nama_subprogram',
	      'id'            => 'nama_subprogram',
	      'class'         => 'form-control',
	      'autocomplete'  => 'off',
	      'required'      => '',
	    ];

      $this->load->view('back/subprogram/subprogram_edit', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('subprogram');
    }

  }

    function update_action()
  {
    $this->form_validation->set_rules('id_program', 'Nama Pprogram', 'trim|required');
    $this->form_validation->set_rules('nama_subprogram', 'Nama Subprogram', 'trim|required');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('id_subprogram'));
    }
    else
    {
			$data = array(
        'id_program'     => $this->input->post('id_program'),
        'nama_subprogram'  => $this->input->post('nama_subprogram'),
      );

      $this->Subprogram_model->update($this->input->post('id_subprogram'),$data);

			write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
      redirect('subprogram');
    }
  }

  function deleted_list()
  {
    is_login();
    is_restore();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title'] = 'Deleted '.$this->data['module'].' List';

    $this->data['get_all_deleted'] = $this->Subprogram_model->get_all_deleted();


    $this->load->view('back/subprogram/deleted_list', $this->data);
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

    $delete = $this->Subprogram_model->get_by_id($id);

    if($delete)
    {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Subprogram_model->soft_delete($id, $data);

      // $this->write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('Subprogram');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('Subprogram');
    }
  }

   function delete_permanent($id)
  {
    is_login();
    is_delete();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->Subprogram_model->get_by_id($id);

    if($delete)
    {

      $this->Subprogram_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('Subprogram/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('Subprogram');
    }
  }


  function restore($id)
  {
    is_login();
    is_restore();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $row = $this->Subprogram_model->get_by_id($id);

    if($row)
    {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Subprogram_model->update($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('Subprogram/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('Subprogram/deleted_list');
    }
  }

}
