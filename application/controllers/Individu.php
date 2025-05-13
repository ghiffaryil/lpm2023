<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Individu extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->data['module'] = 'Individu';
    $this->load->model(array('Individu_model'));
    $this->load->helper(array('url','html'));
    $this->load->database();

    $this->data['company_data']               = $this->Company_model->company_profile();
    $this->data['logo_header_template']       = $this->Template_model->logo_header();
    $this->data['navbar_template']            = $this->Template_model->navbar();
    $this->data['sidebar_template']           = $this->Template_model->sidebar();
    $this->data['background_template']        = $this->Template_model->background();
    $this->data['sidebarstyle_template']      = $this->Template_model->sidebarstyle();

    $this->data['btn_submit'] = 'Save';
    $this->data['btn_reset']  = 'Reset';
    $this->data['btn_add']    = 'Add New Data';
    $this->data['add_action'] = base_url('Individu/create');
  }

  function index()
  {
    is_login();
    is_read();

  //  if(!is_superadmin())
  //  {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
  //  }
        
    $this->data['page_title'] = $this->data['module'].' List';
    $this->data['get_all'] = $this->Individu_model->get_all_header();
    $data['path'] = base_url('assets');   
    $this->load->view('back/individu/individu_list', $this->data);
  }

  public function get_data_penduduk(){
      $nik  = $this->input->get('nik');
      $data = $this->Individu_model->get_nik_penduduk($nik);
      echo json_encode($data);
  }


  function create()
  {
    is_login();
    is_create();

  //  if(!is_superadmin())
  //  {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //   redirect('dashboard');
  //  }

    $this->data['page_title']   = 'Create New '.$this->data['module'];
    $this->data['sub']          = "Tambah Ajuan";
    $this->data['header']       = $this->data['module'];
    $this->data['action']       = "individu/create_action";
    $this->data['get_penduduk'] = $this->Individu_model->get_penduduk();

    $this->data['nik'] = [
      'name'          => 'nik',
      'id'            => 'nik',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('nik'),
    ];
    $this->data['nama'] = [
      'name'          => 'nama',
      'id'            => 'nama',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('nama'),
    ];
    $this->data['jumlah_penghasilan'] = [
      'name'          => 'jumlah_penghasilan',
      'id'            => 'jumlah_penghasilan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('jumlah_penghasilan'),
    ];
    $this->data['profil_individu'] = [
      'name'          => 'profil_individu',
      'id'            => 'profil_individu',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => $this->form_validation->set_value('profil_individu'),
    ];    

    $this->load->view('back/individu/individu_add', $this->data);

  }

  function create_action()
  { 
    $id  = $this->input->post('nik');
    $row = $this->Individu_model->get_check($id);
    if ($row) 
    {
      echo 'exist';
    }
    else
    { 

        $config['upload_path'] = './assets/lampiran/';
        $config['overwrite'] = TRUE;       
        $config['allowed_types'] = 'png|jpg|gif|ico|jpeg|pdf';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('lamp_1')) {
            $lamp_1 = $this->upload->data("file_name");
        } else {
            $lamp_1 = '';
        }
        if ($this->upload->do_upload('lamp_2')) {
            $lamp_2 = $this->upload->data("file_name");
        } else {
            $lamp_2 = '';
        }
        if ($this->upload->do_upload('lamp_3')) {
            $lamp_3 = $this->upload->data("file_name");
        } else {
            $lamp_3 = '';
        }

        $data = array(
          'nik'                 => $this->input->post('nik'),
          'nama'                => $this->input->post('nama'),
          'jumlah_penghasilan'  => $this->input->post('jumlah_penghasilan'),
          'profil_individu'     => $this->input->post('profil_individu'),
          'lamp_1'              => $lamp_1,
          'lamp_2'              => $lamp_2,
          'lamp_3'              => $lamp_3,
          'deleted_at'          => '0000-00-00 00:00:00',
          'created_at'          => date('Y-m-d H:i:s'),
          'created_by'          => $this->session->username,
          'usertype '           => $this->session->usertype ,
        );

        $this->Individu_model->insert($data);
        write_log();
    }
  }

  function update($id)
  {
    is_login();
    is_update();

  //  if(!is_superadmin())
  //  {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
  //  }

    $id_individu = $this->input->post('id_individu');

    $this->data['get_all_provinsi'] = $this->Individu_model->get_all_provinsi();
    $this->data['individu'] = $this->Individu_model->get_by_id($id);
    if($this->data['individu'])
    {
      
      $this->data['page_title'] = 'Update Data '.$this->data['module'];
      $this->data['action']     = 'individu/update_action';

      $this->data['id_individu'] = [
        'name'          => 'id_individu',
        'type'          => 'hidden',
      ];

      $this->data['nik'] = [
        'name'          => 'nik',
        'id'            => 'nik',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'required'      => '',
      ];
      $this->data['nama'] = [
        'name'          => 'nama',
        'id'            => 'nama',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'required'      => '',
      ];
      $this->data['jumlah_penghasilan'] = [
        'name'          => 'jumlah_penghasilan',
        'id'            => 'jumlah_penghasilan',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'required'      => '',
      ];
      $this->data['profil_individu'] = [
        'name'          => 'profil_individu',
        'id'            => 'profil_individu',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'required'      => '',
      ];
      

      $this->load->view('back/individu/individu_edit', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('individu');
    }

  }

  function update_action()
  {
    
    $this->form_validation->set_rules('nik', 'nik', 'required');
    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('jumlah_penghasilan', 'jumlah_penghasilan', 'required');
    $this->form_validation->set_rules('profil_individu', 'profil_individu', 'required');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('id_individu'));
    }
    else
    {
      
      if(!empty($_FILES['lamp_1']['name']))
      {
        $nmfile = strtolower(url_title($this->input->post('photo_name'))).date('YmdHis');

        $config['upload_path']   = './assets/lampiran/';
        $config['allowed_types'] = 'png|jpg|gif|ico|jpeg|pdf';
        $config['file_name']     = $nmfile;

        $this->load->library('upload', $config);

        $delete = $this->Individu_model->get_by_id($this->input->post('id_individu'));

        $dir        = "./assets/lampiran/".$delete->lamp_1;

        if(is_file($dir))
        {
          unlink($dir);
        }

        if(!$this->upload->do_upload('lamp_1'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

          $this->update($this->input->post('id_individu'));
        }
        else
        {
          $lamp_1 = $this->upload->data();

          $data = array(
              'lamp_1' => $this->upload->data('file_name'),
          );

          $this->Individu_model->update($this->input->post('id_individu'),$data);

        }
      }

      if(!empty($_FILES['lamp_2']['name']))
      {
        $nmfile = strtolower(url_title($this->input->post('photo_name'))).date('YmdHis');

        $config['upload_path']   = './assets/lampiran/';
        $config['allowed_types'] = 'png|jpg|gif|ico|jpeg|pdf';
        $config['file_name']     = $nmfile;

        $this->load->library('upload', $config);

        $delete = $this->Individu_model->get_by_id($this->input->post('id_individu'));

        $dir        = "./assets/lampiran/".$delete->lamp_2;

        if(is_file($dir))
        {
          unlink($dir);
        }

        if(!$this->upload->do_upload('lamp_2'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

          $this->update($this->input->post('id_individu'));
        }
        else
        {
          $lamp_2 = $this->upload->data();

          $data = array(
              'lamp_2' => $this->upload->data('file_name'),
          );

          $this->Individu_model->update($this->input->post('id_individu'),$data);

        }
      }

      if(!empty($_FILES['lamp_3']['name']))
      {
        $nmfile = strtolower(url_title($this->input->post('photo_name'))).date('YmdHis');

        $config['upload_path']   = './assets/lampiran/';
        $config['allowed_types'] = 'png|jpg|gif|ico|jpeg|pdf';
        $config['file_name']     = $nmfile;

        $this->load->library('upload', $config);

        $delete = $this->Individu_model->get_by_id($this->input->post('id_individu'));

        $dir    = "./assets/lampiran/".$delete->lamp_3;

        if(is_file($dir))
        {
          unlink($dir);
        }

        if(!$this->upload->do_upload('lamp_3'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

          $this->update($this->input->post('id_individu'));
        }
        else
        {
          $lamp_3 = $this->upload->data();

          $data = array(
              'lamp_3' => $this->upload->data('file_name'),
          );

          $this->Individu_model->update($this->input->post('id_individu'),$data);

        }
      }

      $data = array(
        'nik'                 => $this->input->post('nik'),
        'nama'                => $this->input->post('nama'),
        'jumlah_penghasilan'  => $this->input->post('jumlah_penghasilan'),
        'profil_individu'     => $this->input->post('profil_individu'),        
      );
    
      $this->Individu_model->update($this->input->post('id_individu'),$data);

      write_log();
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
      redirect('individu');
    }
  } 



  function view ($id)
  {
    is_login();
    is_update();

  //  if(!is_superadmin())
  //  {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
  //  }

    $this->data['get_all_provinsi']  = $this->Individu_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Individu_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Individu_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Individu_model->get_all_kelurahan();
    $this->data['individu']          = $this->Individu_model->get_by_nik($id);

    if($this->data['individu'])
    {
      $this->data['page_title'] = 'Detail Data';

      $this->load->view('back/individu/individu_view', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('individu');
    }

  }

  function detail ($id)
  {
    is_login();
    is_update();

  // if(!is_superadmin())
  //  {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
  //  }

    $this->data['get_all_kelurahan'] = $this->Individu_model->get_all_kelurahan();
    $this->data['get_all']           = $this->Individu_model->get_detail_by_id($id);

    if($this->data['get_all'])
    {
      $this->data['page_title'] = 'Detail Data '.$this->data['module'];
      $this->data['action']     = 'individu/update_action';

      $this->load->view('back/individu/individu_list_detail', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('individu');
    }

  }

  function delete($id)
  {
    is_login();
    is_delete();

  //  if(!is_superadmin())
  //  {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
  //  }

    $id_individu = $this->input->post('id_individu');

    $delete = $this->Individu_model->get_by_id($id);

    if($delete)
    {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Individu_model->soft_delete($id, $data);

      // $this->write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('Individu');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('Individu');
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

    $delete = $this->Individu_model->get_by_id($id);

    if($delete)
    {
      $dir        = "./assets/images/user/".$delete->photo;
      $dir_thumb  = "./assets/images/user/".$delete->photo_thumb;

      if(is_file($dir))
      {
        unlink($dir);
        unlink($dir_thumb);
      }

      $this->Individu_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('individu/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('individu/deleted_list');
    }
  }

  function deleted_list()
  {
    is_login();
    is_restore();

  //  if(!is_superadmin())
  //  {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
  //  }

    $this->data['page_title'] = 'Deleted '.$this->data['module'].' List';

    $this->data['get_all_deleted'] = $this->Individu_model->get_all_deleted();


    $this->load->view('back/individu/individu_deleted_list', $this->data);
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

    $row = $this->Individu_model->get_by_id($id);

    if($row)
    {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Individu_model->update($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('individu/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('individu/deleted_list');
    }
  }

}
