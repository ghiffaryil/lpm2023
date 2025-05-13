<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'Petugas';

    $this->load->model(array('Petugas_model'));

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
    $this->data['add_action'] = base_url('petugas/create');
  }

  function index()
  {
    is_login();
    is_read();

  //  if(!is_superadmin())
  //  {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
 //     redirect('dashboard');
  //  }
        
    $this->data['page_title'] = $this->data['module'].' List';
    $this->data['header'] = $this->data['module'];

    $this->data['get_all'] = $this->Petugas_model->get_all();
    
    $data['path'] = base_url('assets');
    $this->load->view('back/petugas/petugas_list', $this->data);
  }

  public function get_data_petugas(){
    $nama_petugas  = $this->input->get('nama_petugas');
    $data          = $this->Petugas_model->get_all($nama_petugas);
    echo json_encode($data);
  }


  function create()
  {
    is_login();
    is_create();

 //   if(!is_superadmin())
 //   {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
 //   }

    $this->data['page_title'] = "Create New ".$this->data['module'];
    $this->data['sub']        = "Tambah petugas";
    $this->data['header']     = $this->data['module'];
    $this->data['action']     = "petugas/create_action";

    $this->data['nama_1'] = [
      'name'            => 'nama_1',
      'id'              => 'nama_1',
      'class'           => 'form-control text-capitalize',
      'autocomplete'    => 'off',
      'required'        => '',
    ];
    $this->data['nama_2'] = [
      'name'            => 'nama_2',
      'id'              => 'nama_2',
      'class'           => 'form-control text-capitalize',
      'autocomplete'    => 'off',
      'required'        => '',
    ];
    $this->data['no_telpon'] = [
      'name'          => 'no_telpon',
      'id'            => 'no_telpon',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'onkeypress'    => 'return hanyaAngka(event)',
      'required'      => '',
    ];

    $this->load->view('back/petugas/petugas_add', $this->data);
  }

  function create_action()
  { 
      $this->form_validation->set_rules('nama_1', 'nama_1', 'trim|required');
      $this->form_validation->set_rules('nama_2', 'nama_2', 'trim|required');
      $this->form_validation->set_rules('no_telpon', 'no_telpon', 'required');

      $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

      if($this->form_validation->run() === FALSE)
      {
        $this->create();
      }
      else
      {
        $data = array(
          'nama_1'     => $this->input->post('nama_1'),
          'nama_2'     => $this->input->post('nama_2'),
          'no_telpon'  => $this->input->post('no_telpon'),
          'deleted_at' => '0000-00-00 00:00:00',
          'created_by' => $this->session->username,
        );

        $this->Petugas_model->insert($data);

        write_log();
        $this->session->set_flashdata('message', '
        <div class="alert bg-success alert-dismissible mb-2" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button> Data saved succesfully.
        </div>');
        redirect('petugas');
      }
  }

  function update($id)
  {
    is_login();
    is_update();

 //   if(!is_superadmin())
//    {
 //     $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
 //   }

    $this->data['page_title'] = 'Update Data '.$this->data['module'];
    $this->data['action']     = 'petugas/update_action';

    $this->data['petugas']    = $this->Petugas_model->get_by_id($id);

    if($this->data['petugas'])
    {
      $this->data['id_petugas'] = [
        'name'          => 'id_petugas',
        'type'          => 'hidden',
      ];

      $this->data['nama_1'] = [
        'name'          => 'nama_1',
        'id'            => 'nama_1',
        'class'         => 'form-control text-capitalize',
        'autocomplete'  => 'off',
        'required'      => '',
      ];
      $this->data['nama_2'] = [
        'name'          => 'nama_2',
        'id'            => 'nama_2',
        'class'         => 'form-control text-capitalize',
        'autocomplete'  => 'off',
        'required'      => '',
      ];
      $this->data['no_telpon'] = [
        'name'          => 'no_telpon',
        'id'            => 'no_telpon',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'onkeypress'    => 'return hanyaAngka(event)',
        'required'      => '',
      ];

      $this->load->view('back/petugas/petugas_edit', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('petugas');
    }
  }

  function update_action()
  {
    $this->form_validation->set_rules('nama_1', 'nama_1', 'trim|required');
    $this->form_validation->set_rules('nama_2', 'nama_2', 'trim|required');
    $this->form_validation->set_rules('no_telpon', 'no_telpon', 'required');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('id_petugas'));
    }
    else
    {
      $data = array(
          'nama_1'     => $this->input->post('nama_1'),
          'nama_2'     => $this->input->post('nama_2'),
          'no_telpon'  => $this->input->post('no_telpon'),
          'deleted_at' => '0000-00-00 00:00:00',
          'created_by' => $this->session->username,  
      );
    
      $this->Petugas_model->update($this->input->post('id_petugas'),$data);

      write_log();
      $this->session->set_flashdata('message', '
        <div class="alert bg-success alert-dismissible mb-2" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button> Data saved succesfully.
        </div>');
      redirect('petugas');
    }
  } 

  function activate($id)
  {
    is_login();

 //   if(!is_superadmin())
 //   {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
  //  }

    $this->Petugas_model->update($this->uri->segment('3'), array('is_active'=>'1'));

    $this->session->set_flashdata('message', '<div class="alert alert-success">Data activate successfully</div>');
    redirect('petugas');
  }

  function deactivate($id)
  {
    is_login();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->Petugas_model->update($this->uri->segment('3'), array('is_active'=>'0'));

    $this->session->set_flashdata('message', '<div class="alert alert-success">Data deactivate successfully</div>');
    redirect('petugas');
  }

  function delete($id)
  {
    is_login();
    is_delete();

 //   if(!is_superadmin())
 //   {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
  //  }

    $delete = $this->Petugas_model->get_by_id($id);

    if($delete)
    {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Petugas_model->soft_delete($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('petugas');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('petugas');
    }
  }

  function delete_permanent($id)
  {
    is_login();
    is_delete();

//    if(!is_superadmin())
 //   {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
  //  }

    $delete = $this->Petugas_model->get_by_id($id);

    if($delete)
    {
      $this->Petugas_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('petugas/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('petugas/deleted_list');
    }
  }

  function deleted_list()
  {
    is_login();
    is_restore();

//    if(!is_superadmin())
 //   {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
  //  }

    $this->data['page_title'] = 'Deleted '.$this->data['module'].' List';
    
    $this->data['get_all_deleted'] = $this->Petugas_model->get_all_deleted();

    $this->load->view('back/petugas/petugas_deleted_list', $this->data);
  }

  function restore($id)
  {
    is_login();
    is_restore();

//    if(!is_superadmin())
 //   {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
  //  }

    $row = $this->Petugas_model->get_by_id($id);

    if($row)
    {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Petugas_model->update($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('petugas/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('petugas/deleted_list');
    }
  }

}
