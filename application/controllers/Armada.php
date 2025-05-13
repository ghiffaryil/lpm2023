<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Armada extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    
    date_default_timezone_set('Asia/Jakarta');
    $this->data['module'] = 'Armada';

    $this->load->model(array('Armada_model'));

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
    $this->data['add_action'] = base_url('armada/create');
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
    $this->data['header']     = $this->data['module'];
    $this->data['get_all']    = $this->Armada_model->get_all();
    
    $data['path'] = base_url('assets');
        
    $this->load->view('back/armada/armada_list', $this->data);
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
    $this->data['sub']        = "Tambah armada";
    $this->data['header']     = $this->data['module'];
    $this->data['action']     = "armada/create_action";

    $this->data['get_petugas']= $this->Armada_model->get_all_petugas();      

    $this->data['id_petugas'] = [
      'name'          => 'id_petugas',
      'id'            => 'id_petugas',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['jenis_armada'] = [
      'name'          => 'jenis_armada',
      'id'            => 'jenis_armada',
      'class'         => 'form-control text-capitalize',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['merk_armada'] = [
      'name'          => 'merk_armada',
      'id'            => 'merk_armada',
      'class'         => 'form-control text-capitalize',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['no_polisi'] = [
      'name'          => 'no_polisi',
      'id'            => 'no_polisi',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];  
    $this->data['no_rangka'] = [
      'name'          => 'no_rangka',
      'id'            => 'no_rangka',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'onkeypress'    => 'return hanyaAngka(event)',
    ];
    $this->data['no_mesin'] = [
      'name'          => 'no_mesin',
      'id'            => 'no_mesin',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'onkeypress'    => 'return hanyaAngka(event)',
    ];
    $this->data['tahun'] = [
      'name'          => 'tahun',
      'id'            => 'tahun',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'onkeypress'    => 'return hanyaAngka(event)',
    ];
    $this->data['lokasi_armada'] = [
      'name'          => 'lokasi_armada',
      'id'            => 'lokasi_armada',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];

    $this->load->view('back/armada/armada_add', $this->data);

  }

  function create_action()
  { 
    $id  = $this->input->post('no_polisi');
    $row = $this->Armada_model->get_check($id);
    if ($row->no_polisi && $row->is_delete == 0) {
      write_log();
      $this->session->set_flashdata('message', '<div class="alert bg-danger alert-dismissible mb-2" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  Vehicle already exists.
                </div>');
      redirect('armada');
    }elseif ($row->no_polisi && $row->is_delete == 1) {
      write_log();
      $this->session->set_flashdata('message', '<div class="alert bg-danger alert-dismissible mb-2" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                   Vehicle already exists in Recycle Bin.
                </div>');
      redirect('armada');
    }else{
      $this->form_validation->set_rules('id_petugas', 'id_petugas', 'required');
      $this->form_validation->set_rules('jenis_armada', 'jenis_armada', 'trim|required');
      $this->form_validation->set_rules('merk_armada', 'merk_armada', 'required');
      $this->form_validation->set_rules('no_polisi', 'no_polisi', 'required');
      $this->form_validation->set_rules('no_rangka', 'no_rangka', 'required');
      $this->form_validation->set_rules('no_mesin', 'no_mesin', 'required');
      $this->form_validation->set_rules('tahun', 'tahun', 'required');
      $this->form_validation->set_rules('lokasi_armada', 'lokasi_armada', 'required');

      $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

      if($this->form_validation->run() === FALSE)
      {
        $this->create();
      }
      else
      {
        $data = array(
          'id_petugas'         => $this->input->post('id_petugas'),
          'jenis_armada'       => $this->input->post('jenis_armada'),
          'merk_armada'        => $this->input->post('merk_armada'),
          'no_polisi'          => $this->input->post('no_polisi'),
          'no_rangka'          => $this->input->post('no_rangka'),
          'no_mesin'           => $this->input->post('no_mesin'),
          'tahun'              => $this->input->post('tahun'),
          'lokasi_armada'      => $this->input->post('lokasi_armada'),    
          'foto'               => '',  
          'deleted_at'         => '0000-00-00 00:00:00',
          'created_at'         => date('Y-m-d H:i:s'),
          'created_by'         => $this->session->username,
        );

        $check_foto       = file_exists($_FILES['foto']['tmp_name']);
        if ($check_foto) {
            $data['foto'] = 'foto'.$this->input->post('id_armada'). '.' .pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
        }

        $this->Armada_model->insert($data);

        if ($check_foto) {
          $file = $_FILES['foto']['tmp_name'];
          move_uploaded_file($file, "assets/armada/" . $data['foto']);
        }

        write_log();
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('armada');

      }
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
    $this->data['action']       = 'armada/update_action';

    $this->data['get_petugas']  = $this->Armada_model->get_all_petugas();
    $this->data['armada']       = $this->Armada_model->get_by_id($id);

    if($this->data['armada'])
    {
      
      $this->data['id_armada'] = [
        'name'        => 'id_armada',
        'type'        => 'hidden',
      ];

      $this->data['id_petugas'] = [
      'name'          => 'id_petugas',
      'id'            => 'id_petugas',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['jenis_armada'] = [
      'name'          => 'jenis_armada',
      'id'            => 'jenis_armada',
      'class'         => 'form-control text-capitalize',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['merk_armada'] = [
      'name'          => 'merk_armada',
      'id'            => 'merk_armada',
      'class'         => 'form-control text-capitalize',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['no_polisi'] = [
      'name'          => 'no_polisi',
      'id'            => 'no_polisi',
      'class'         => 'form-control text-uppercase',
      'autocomplete'  => 'off',
    ];  
    $this->data['no_rangka'] = [
      'name'          => 'no_rangka',
      'id'            => 'no_rangka',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'onkeypress'    => 'return hanyaAngka(event)',
    ];
    $this->data['no_mesin'] = [
      'name'          => 'no_mesin',
      'id'            => 'no_mesin',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'onkeypress'    => 'return hanyaAngka(event)',
    ];
    $this->data['tahun'] = [
      'name'          => 'tahun',
      'id'            => 'tahun',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'onkeypress'    => 'return hanyaAngka(event)',
    ];
    $this->data['lokasi_armada'] = [
      'name'          => 'lokasi_armada',
      'id'            => 'lokasi_armada',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];

      $this->load->view('back/armada/armada_edit', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('armada');
    }
  }

  function update_action()
  {
    $this->form_validation->set_rules('id_petugas', 'id_petugas', 'required');
    $this->form_validation->set_rules('jenis_armada', 'jenis_armada', 'trim|required');
    $this->form_validation->set_rules('merk_armada', 'merk_armada', 'required');
    $this->form_validation->set_rules('no_polisi', 'no_polisi', 'required');
    $this->form_validation->set_rules('no_rangka', 'no_rangka', 'required');
    $this->form_validation->set_rules('no_mesin', 'no_mesin', 'required');
    $this->form_validation->set_rules('tahun', 'tahun', 'required');
    $this->form_validation->set_rules('lokasi_armada', 'lokasi_armada', 'required');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('id_armada'));
    }
    else
    { 
      if(!empty($_FILES['foto']['name']))
      {
        $nmfile = strtolower(url_title($this->input->post('photo_name'))).date('YmdHis');

        $config['upload_path']   = './assets/armada/';
        $config['allowed_types'] = 'png|jpg|gif|ico|jpeg';
        $config['file_name']     = $nmfile;

        $this->load->library('upload', $config);

        $delete = $this->Armada_model->get_by_id($this->input->post('id_armada'));

        $dir = "./assets/armada/".$delete->foto;

        if(is_file($dir))
        {
          unlink($dir);
        }

        if(!$this->upload->do_upload('foto'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

          $this->update($this->input->post('id_armada'));
        }
        else
        {
          $foto = $this->upload->data();

          $data = array(
            'foto' => $this->upload->data('file_name'),
          );

          $this->Armada_model->update($this->input->post('id_armada'),$data);

        }
      }

      $data = array(
          'id_petugas'         => $this->input->post('id_petugas'),
          'jenis_armada'       => $this->input->post('jenis_armada'),
          'merk_armada'        => $this->input->post('merk_armada'),
          'no_polisi'          => $this->input->post('no_polisi'),
          'no_rangka'          => $this->input->post('no_rangka'),
          'no_mesin'           => $this->input->post('no_mesin'),
          'tahun'              => $this->input->post('tahun'),
          'lokasi_armada'      => $this->input->post('lokasi_armada'),
          'deleted_at'         => '0000-00-00 00:00:00',
          'created_by'         => $this->session->username,  
      );
    
      $this->Armada_model->update($this->input->post('id_armada'),$data);

      write_log();
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
      redirect('armada');
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
    $this->data['armada']     = $this->Armada_model->get_by_id($id);
    
    $data['path'] = base_url('assets');
    $this->load->view('back/armada/armada_detail', $this->data);
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

    $delete = $this->Armada_model->get_by_id($id);

    if($delete)
    {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Armada_model->soft_delete($id, $data);

      // $this->write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('armada');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('armada');
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

    $delete = $this->Armada_model->get_by_id($id);

    if($delete)
    {
      $this->Armada_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('armada/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('armada/deleted_list');
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

    $this->data['get_all_deleted'] = $this->Armada_model->get_all_deleted();


    $this->load->view('back/armada/armada_deleted_list', $this->data);
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

    $row = $this->Armada_model->get_by_id($id);

    if($row)
    {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Armada_model->update($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('armada/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('armada/deleted_list');
    }
  }

}
