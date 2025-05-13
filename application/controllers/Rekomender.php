<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekomender extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'Rekomender';

    $this->load->model(array('Rekomender_model'));

    $this->load->helper(array('url','html'));
    $this->load->database();

    // company_profile
    $this->data['company_data']               = $this->Company_model->company_profile();

    // template
    $this->data['logo_header_template']       = $this->Template_model->logo_header();
    $this->data['navbar_template']            = $this->Template_model->navbar();
    $this->data['sidebar_template']           = $this->Template_model->sidebar();
    $this->data['background_template']        = $this->Template_model->background();
    $this->data['sidebarstyle_template']      = $this->Template_model->sidebarstyle();

    $this->data['btn_submit'] = '<button type="submit" name="button" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>';
    $this->data['btn_reset']  = 'Bersih';
    $this->data['btn_back']   = '<button type="button" onclick="history.back()" class="btn btn-success"> Kembali</button>';
    $this->data['btn_add']    = 'Add New Data';
    $this->data['add_action'] = base_url('rekomender/create');
  }

  function index()
  {
    is_login();
    is_read();

   // if(!is_superadmin())
   // {
    //  $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
    //  redirect('dashboard');
  //  }

    $this->data['page_title'] = $this->data['module'].' List';
    $this->data['header']     = $this->data['module'];
    $this->data['get_all']    = $this->Rekomender_model->get_all();
    
    $data['path'] = base_url('assets');

    $this->load->view('back/rekomender/rekomender_list', $this->data);
  }

  function create()
  {
    is_login();
    is_create();

  //  if(!is_superadmin())
  //  {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
  //  }

    $this->data['page_title'] = 'Create New '.$this->data['module'];
    $this->data['sub']        = "Tambah Rekomender";
    $this->data['header']     = $this->data['module'];
    $this->data['action']     = "rekomender/create_action";

    $this->data['nama_rekomender'] = [
      'name'          => 'nama_rekomender',
      'id'            => 'nama_rekomender',
      'class'         => 'form-control text-capitalize',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['alamat_rekomender'] = [
      'name'          => 'alamat_rekomender',
      'id'            => 'alamat_rekomender',
      'class'         => 'form-control text-capitalize',
      'autocomplete'  => 'off',
      'required'      => '',
      'rows'          => '3',
    ];
    $this->data['status_hubungan'] = [
      'name'          => 'status_hubungan',
      'id'            => 'status_hubungan',
      'class'         => 'form-control text-capitalize',
      'autocomplete'  => 'off',
      // 'required'      => '',
    ];
    $this->data['no_telpon'] = [
      'name'          => 'no_telpon',
      'id'            => 'no_telpon',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'onkeypress'    => 'return hanyaAngka(event)',
      'maxlength'     => '13',
    ];  
    $this->data['jenis_rekomender'] = [
      'name'          => 'jenis_rekomender',
      'id'            => 'jenis_rekomender',
      'class'         => 'form-control text-capitalize',
      'autocomplete'  => 'off',
      'required'      => '',
    ];

    $this->load->view('back/rekomender/rekomender_add', $this->data);

  }

  function create_action()
  { 
    $this->form_validation->set_rules('nama_rekomender', 'nama_rekomender', 'trim|required');
    $this->form_validation->set_rules('alamat_rekomender', 'alamat_rekomender', 'required');
    // $this->form_validation->set_rules('status_hubungan', 'status_hubungan', 'required');
    $this->form_validation->set_rules('no_telpon', 'no_telpon', 'required');      
    $this->form_validation->set_rules('jenis_rekomender', 'jenis_rekomender', 'required');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->create();
    }
    else
    {
      $data = array(
        'nama_rekomender'    => $this->input->post('nama_rekomender'),
        'alamat_rekomender'  => $this->input->post('alamat_rekomender'),
        'status_hubungan'    => $this->input->post('status_hubungan'),
        'no_telpon'          => $this->input->post('no_telpon'),
        'jenis_rekomender'   => $this->input->post('jenis_rekomender'),
        'deleted_at'         => '0000-00-00 00:00:00',
        'created_by'         => $this->session->username,
      );

      $this->Rekomender_model->insert($data);

      write_log();
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
      redirect('rekomender');

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

    $this->data['page_title']   = 'Update Data '.$this->data['module'];
    $this->data['action']       = 'rekomender/update_action';

    $this->data['rekomender']   = $this->Rekomender_model->get_by_id($id);

    if($this->data['rekomender'])
    {

      $this->data['id_rekomender'] = [
        'name'        => 'id_rekomender',
        'type'        => 'hidden',
      ];

      $this->data['nama_rekomender'] = [
        'name'          => 'nama_rekomender',
        'id'            => 'nama_rekomender',
        'class'         => 'form-control',
        'autocomplete'  => 'off',

      ];
      $this->data['alamat_rekomender'] = [
        'name'          => 'alamat_rekomender',
        'id'            => 'alamat_rekomender',
        'class'         => 'form-control text-capitalize',
        'autocomplete'  => 'off',
        'required'      => '',
        'rows'          => '3',
      ];
      $this->data['status_hubungan'] = [
        'name'          => 'status_hubungan',
        'id'            => 'status_hubungan',
        'class'         => 'form-control text-capitalize',
        'autocomplete'  => 'off',
      ];
      $this->data['no_telpon'] = [
        'name'          => 'no_telpon',
        'id'            => 'no_telpon',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'onkeypress'    => 'return hanyaAngka(event)',
      ];  
      $this->data['jenis_rekomender'] = [
        'name'          => 'jenis_rekomender',
        'id'            => 'jenis_rekomender',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
      ];

      $this->load->view('back/rekomender/rekomender_edit', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('rekomender');
    }
  }

  function update_action()
  {
    $this->form_validation->set_rules('nama_rekomender', 'nama_rekomender', 'trim|required');
    $this->form_validation->set_rules('alamat_rekomender', 'alamat_rekomender', 'required');
    $this->form_validation->set_rules('jenis_rekomender', 'jenis_rekomender', 'required');
    $this->form_validation->set_rules('no_telpon', 'no_telpon', 'required');


    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('id_rekomender'));
    }
    else
    { 
      $data = array(
        'nama_rekomender'    => $this->input->post('nama_rekomender'),
        'alamat_rekomender'  => $this->input->post('alamat_rekomender'),
        'status_hubungan'    => $this->input->post('status_hubungan'),
        'no_telpon'          => $this->input->post('no_telpon'),
        'jenis_rekomender'   => $this->input->post('jenis_rekomender'),
        'deleted_at'         => '0000-00-00 00:00:00',
        'created_by'         => $this->session->username,  
      );

      $this->Rekomender_model->update($this->input->post('id_rekomender'),$data);

      write_log();
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
      redirect('rekomender');
    }
  } 

  function detail($id)
  {
    is_login();
    is_read();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title'] = $this->data['module'].' Detail';
    $this->data['header']     = $this->data['module'];
    $this->data['rekomender']     = $this->Rekomender_model->get_by_id($id);
    
    $data['path'] = base_url('assets');
    $this->load->view('back/rekomender/rekomender_detail', $this->data);
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

    $delete = $this->Rekomender_model->get_by_id($id);

    if($delete)
    {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Rekomender_model->soft_delete($id, $data);

      // $this->write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('rekomender');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('rekomender');
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

    $delete = $this->Rekomender_model->get_by_id($id);

    if($delete)
    {
      $this->Rekomender_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('rekomender/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('rekomender/deleted_list');
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

    $this->data['get_all_deleted'] = $this->Rekomender_model->get_all_deleted();


    $this->load->view('back/rekomender/rekomender_deleted_list', $this->data);
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

    $row = $this->Rekomender_model->get_by_id($id);

    if($row)
    {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Rekomender_model->update($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('rekomender/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('rekomender/deleted_list');
    }
  }

}
