<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'Penduduk';

    $this->load->model(array('Penduduk_model'));

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

    $this->data['btn_submit'] = 'Simpan';
    $this->data['btn_reset']  = 'Reset';
    $this->data['btn_back']   = '<button type="button" class="btn btn-primary" onclick="history.back()">Kembali</button>';
    $this->data['btn_add']    = 'Add New Data';
    $this->data['add_action'] = base_url('Penduduk/create');
  }

  function index()
  {
    is_login();
    is_read();

  //  if(!is_superadmin())
  //  {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
  //  }

    $this->data['page_title'] = $this->data['module'].' List';
    $this->data['get_all'] = $this->Penduduk_model->get_all();
    $this->data['get_all_provinsi'] = $this->Penduduk_model->get_all_provinsi();
    $data['path'] = base_url('assets');    
    $this->load->view('back/penduduk/penduduk_list', $this->data);
  }


  function create()
  {
    is_login();
    is_create();

 //   if(!is_superadmin())
//      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
 //   }

    $this->data['page_title']       = 'Create New '.$this->data['module'];
    $this->data['action']           = 'penduduk/create_action';
    $this->data['get_all_provinsi'] = $this->Penduduk_model->get_all_provinsi();
    $this->data['get_all_kabupaten']= $this->Penduduk_model->get_all_kabupaten();
    $this->data['get_negara']       = $this->Penduduk_model->get_negara();
    $this->data['get_agama']        = $this->Penduduk_model->get_agama();  

    $this->data['nik'] = [
      'name'          => 'nik',
      'id'            => 'nik',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'maxlength'     => '16',
      'required'      => '',
      'onkeypress'    => 'return hanyaAngka(event)',
      'value'         => $this->form_validation->set_value('nik'),
    ];
    $this->data['nama'] = [
      'name'          => 'nama',
      'id'            => 'nama',
      'class'         => 'form-control text-capitalize',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('nama'),
    ];
    $this->data['no_kk'] = [
      'name'          => 'no_kk',
      'id'            => 'no_kk',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'maxlength'     => '16',
      'onkeypress'    => 'return hanyaAngka(event)',
      'value'         => $this->form_validation->set_value('no_kk'),
    ];
    $this->data['nama_kk'] = [
      'name'          => 'nama_kk',
      'id'            => 'nama_kk',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('nama_kk'),
    ];
    $this->data['jum_individu'] = [
      'name'          => 'jum_individu',
      'id'            => 'jum_individu',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'onkeypress'    => 'return hanyaAngka(event)',
      'value'         => $this->form_validation->set_value('jum_individu'),
    ];
    $this->data['jk'] = [
      'name'          => 'jk',
      'id'            => 'jk',
      'class'         => 'form-control selectpicker',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('jk'),
    ];
    $this->data['jk_value'] = [
      ''              => 'Tidak ada keterangan',
      'L'             => 'Laki-laki',
      'P'             => 'Perempuan',
    ];
    $this->data['kewaranegaraan'] = [
      'name'          => 'kewaranegaraan',
      'id'            => 'kewaranegaraan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('kewaranegaraan'),
    ];
    $this->data['tgl_lahir'] = [
      'name'          => 'tgl_lahir',
      'id'            => 'tgl_lahir',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('tgl_lahir'),
    ];
    $this->data['no_hp'] = [
      'name'          => 'no_hp',
      'id'            => 'no_hp',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'onkeypress'    => 'return hanyaAngka(event)',
      'value'         => $this->form_validation->set_value('no_hp'),
    ];
    $this->data['email'] = [
      'name'          => 'email',
      'id'            => 'email',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('email'),
    ];
    $this->data['status_perkawinan'] = [
      'name'          => 'status_perkawinan',
      'id'            => 'status_perkawinan',
      'class'         => 'form-control selectpicker',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('status_perkawinan'),
    ];
    $this->data['status_perkawinan_value'] = [
      ''              => 'Tidak ada keterangan',
      'Belum Menikah' => 'Belum Menikah',
      'Menikah'       => 'Menikah',
      'Pernah Menikah/Cerai' => 'Pernah Menikah/Cerai',
    ];
    $this->data['agama'] = [
      'name'          => 'agama',
      'id'            => 'agama',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('agama'),
    ];
    $this->data['pendidikan'] = [
      'name'          => 'pendidikan',
      'id'            => 'pendidikan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('pendidikan'),
    ];
    $this->data['pekerjaan'] = [
      'name'          => 'pekerjaan',
      'id'            => 'pekerjaan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('pekerjaan'),
    ];
    $this->data['provinsi'] = [
      'name'          => 'provinsi',
      'id'            => 'id_provinsi',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('provinsi'),
    ];
    $this->data['kota_kab'] = [
      'name'          => 'kota_kab',
      'id'            => 'id_kota_kab',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('kota_kab'),
    ];
    $this->data['kecamatan'] = [
      'name'          => 'kecamatan',
      'id'            => 'id_kecamatan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('kecamatan'),
    ];
    $this->data['desa_kelurahan'] = [
      'name'          => 'desa_kelurahan',
      'id'            => 'id_desa_kelurahan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('desa_kelurahan'),
    ];
    $this->data['kodepos'] = [
      'name'          => 'kodepos',
      'id'            => 'kodepos',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'onkeypress'    => 'return hanyaAngka(event)',
      'value'         => $this->form_validation->set_value('kodepos'),
    ];
    $this->data['alamat'] = [
      'name'          => 'alamat',
      'id'            => 'id_alamat',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('alamat'),
    ];
    $this->data['alamat_domisili'] = [
      'name'          => 'alamat_domisili',
      'id'            => 'alamat_domisili',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('alamat_domisili'),
    ];
    
    $this->load->view('back/penduduk/penduduk_add', $this->data);

  }

  function cek_nik($nik)
  { 
    $data = $this->Penduduk_model->cek_nik($nik);
    echo json_encode($data);
  }

  function create_action()
  {       
        $config['upload_path'] = './assets/photo/';
        $config['overwrite'] = TRUE;       
        $config['allowed_types'] = 'png|jpg|gif|ico|jpeg';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('photo')) {
            $photo = $this->upload->data("file_name");
        } else {
            $photo = '';
        }
        if ($this->upload->do_upload('photo_kk')) {
            $photo_kk = $this->upload->data("file_name");
        } else {
            $photo_kk = '';
        }
        if ($this->upload->do_upload('photo_ktp')) {
            $photo_ktp = $this->upload->data("file_name");
        } else {
            $photo_ktp = '';
        }


          $data = array(
            'nik'                 => $this->input->post('nik'),
            'nama'                => $this->input->post('nama'),
            'no_kk'               => $this->input->post('no_kk'),
            'nama_kk'             => $this->input->post('nama_kk'),
            'jum_individu'        => $this->input->post('jum_individu'),
            'jk'                  => $this->input->post('jk'),
            'tmpt_lahir'          => $this->input->post('tmpt_lahir'),
            'tgl_lahir'           => $this->input->post('tgl_lahir'),
            'no_hp'               => $this->input->post('no_hp'),
            'id_provinsi'         => $this->input->post('id_provinsi'),
            'id_kecamatan'        => $this->input->post('id_kecamatan'),
            'id_kota_kab'         => $this->input->post('id_kota_kab'),
            'id_desa_kelurahan'   => $this->input->post('id_desa_kelurahan'),
            'alamat'              => $this->input->post('alamat'),
            'agama'               => $this->input->post('agama'),
            'pendidikan'          => $this->input->post('pendidikan'),
            'pekerjaan'           => $this->input->post('pekerjaan'),
            'status_perkawinan'   => $this->input->post('status_perkawinan'),
            'email'               => $this->input->post('email'),
            'kewaranegaraan'      => $this->input->post('kewaranegaraan'),
            'negara'              => $this->input->post('negara'),
            'kodepos'             => $this->input->post('kodepos'),
            'alamat_domisili'     => $this->input->post('alamat_domisili'),
            'photo'               => $photo,
            'photo_kk'            => $photo_kk,
            'photo_ktp'           => $photo_ktp,
          );
    
          $this->Penduduk_model->insert($data); 
          write_log();
  }

  function update($id)
  {
    is_login();
    is_update();

  //  if(!is_superadmin())
 //   {
 //     $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
 //     redirect('dashboard');
//    }

    $this->data['get_all_provinsi'] = $this->Penduduk_model->get_all_provinsi();
    $this->data['get_all_kabupaten']= $this->Penduduk_model->get_all_kabupaten();
    $this->data['get_negara']       = $this->Penduduk_model->get_negara();    
    $this->data['get_agama']        = $this->Penduduk_model->get_agama();    
    $this->data['penduduk']         = $this->Penduduk_model->get_by_id($id);

    if($this->data['penduduk'])
    {
      
      $this->data['page_title'] = 'Update Data '.$this->data['module'];
      $this->data['action']     = 'penduduk/update_action';

      $this->data['id_penduduk'] = [
        'name'          => 'id_penduduk',
        'type'          => 'hidden',
      ];

    $this->data['nik'] = [
      'name'          => 'nik',
      'id'            => 'nik',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
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
    $this->data['no_kk'] = [
      'name'          => 'no_kk',
      'id'            => 'no_kk',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('no_kk'),
    ];
    $this->data['nama_kk'] = [
      'name'          => 'nama_kk',
      'id'            => 'nama_kk',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('nama_kk'),
    ];
    $this->data['Jum_individu'] = [
      'name'          => 'Jum_individu',
      'id'            => 'Jum_individu',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('Jum_individu'),
    ];
    $this->data['jk'] = [
      'name'          => 'jk',
      'id'            => 'jk',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['kewaranegaraan'] = [
      'name'          => 'kewaranegaraan',
      'id'            => 'kewaranegaraan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('kewaranegaraan'),
    ];
    $this->data['jk_value'] = [
      '1'             => 'Laki-laki',
      '2'             => 'Perempuan',
    ];
    $this->data['tgl_lahir'] = [
      'name'          => 'tgl_lahir',
      'id'            => 'tgl_lahir',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('tgl_lahir'),
    ];
    $this->data['no_hp'] = [
      'name'          => 'no_hp',
      'id'            => 'no_hp',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('no_hp'),
    ];
    $this->data['email'] = [
      'name'          => 'email',
      'id'            => 'email',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('email'),
    ];
    $this->data['status_perkawinan'] = [
      'name'          => 'status_perkawinan',
      'id'            => 'status_perkawinan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('status_perkawinan'),
    ];
    $this->data['agama'] = [
      'name'          => 'agama',
      'id'            => 'agama',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('agama'),
    ];
    $this->data['pendidikan'] = [
      'name'          => 'pendidikan',
      'id'            => 'pendidikan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('pendidikan'),
    ];
    $this->data['pekerjaan'] = [
      'name'          => 'pekerjaan',
      'id'            => 'pekerjaan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('pekerjaan'),
    ];
    $this->data['provinsi'] = [
      'name'          => 'provinsi',
      'id'            => 'id_provinsi',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('provinsi'),
    ];
    $this->data['kota_kab'] = [
      'name'          => 'kota_kab',
      'id'            => 'id_kota_kab',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('kota_kab'),
    ];
    $this->data['kecamatan'] = [
      'name'          => 'kecamatan',
      'id'            => 'id_kecamatan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('kecamatan'),
    ];
    $this->data['desa_kelurahan'] = [
      'name'          => 'desa_kelurahan',
      'id'            => 'id_desa_kelurahan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('desa_kelurahan'),
    ];
    $this->data['kodepos'] = [
      'name'          => 'kodepos',
      'id'            => 'kodepos',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('kodepos'),
    ];
    $this->data['alamat'] = [
      'name'          => 'alamat',
      'id'            => 'id_alamat',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('alamat'),
    ];
    $this->data['alamat_domisili'] = [
      'name'          => 'alamat_domisili',
      'id'            => 'alamat_domisili',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('alamat_domisili'),
    ];
      

      $this->load->view('back/penduduk/penduduk_edit', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('penduduk');
    }

  }

  function update_action()
  {

    $this->form_validation->set_rules('nik', 'nik', 'trim|required');
    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('nama_kk', 'nama_kk', 'trim|required');
    $this->form_validation->set_rules('jum_individu', 'jum_individu');
    $this->form_validation->set_rules('jk', 'jk', 'required');
    $this->form_validation->set_rules('tmpt_lahir', 'tmpt_lahir', 'required');
    $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required');
    $this->form_validation->set_rules('id_provinsi', 'id_provinsi', 'required');
    $this->form_validation->set_rules('id_kota_kab', 'id_kota_kab', 'required');
    $this->form_validation->set_rules('id_kecamatan', 'id_kecamatan', 'required');
    $this->form_validation->set_rules('id_desa_kelurahan', 'id_desa_kelurahan', 'required');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('id_penduduk'));
    }
    else
    {
      
      if(!empty($_FILES['photo']['name']))
      { 
        $files = strtolower(url_title($this->input->post('photo_name'))).date('YmdHis');

        $config['upload_path']   = './assets/photo/';
        $config['allowed_types'] = 'png|jpg|gif|ico|jpeg';
        $config['file_name']     = $files;

        $this->load->library('upload', $config);

        $delete = $this->Penduduk_model->get_by_id($this->input->post('id_penduduk'));

        if(is_file($dir))
        {
          unlink($dir);
        }

        if(!$this->upload->do_upload('photo'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

          $this->update($this->input->post('id_penduduk'));
        }
        else
        {
          $photo = $this->upload->data();

          $data = array(
            'photo' => $this->upload->data('file_name'),
            
          );

          $this->Penduduk_model->update($this->input->post('id_penduduk'),$data);
        }
      }

      if(!empty($_FILES['photo_ktp']['name']))
      { 
        $files = strtolower(url_title($this->input->post('photo_name'))).date('YmdHis');

        $config['upload_path']   = './assets/photo/';
        $config['allowed_types'] = 'png|jpg|gif|ico|jpeg';
        $config['file_name']     = $files;

        $this->load->library('upload', $config);

        $delete = $this->Penduduk_model->get_by_id($this->input->post('id_penduduk'));

        if(is_file($dir))
        {
          unlink($dir);
        }

        if(!$this->upload->do_upload('photo_ktp'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

          $this->update($this->input->post('id_penduduk'));
        }
        else
        {
          $photo_ktp = $this->upload->data();

          $data = array(
            'photo_ktp' => $this->upload->data('file_name'),
            
          );

          $this->Penduduk_model->update($this->input->post('id_penduduk'),$data);
        }
      }

      if(!empty($_FILES['photo_kk']['name']))
      { 
        $files = strtolower(url_title($this->input->post('photo_name'))).date('YmdHis');

        $config['upload_path']   = './assets/photo/';
        $config['allowed_types'] = 'png|jpg|gif|ico|jpeg';
        $config['file_name']     = $files;

        $this->load->library('upload', $config);

        $delete = $this->Penduduk_model->get_by_id($this->input->post('id_penduduk'));

        if(is_file($dir))
        {
          unlink($dir);
        }

        if(!$this->upload->do_upload('photo_kk'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

          $this->update($this->input->post('id_penduduk'));
        }
        else
        {
          $photo_kk = $this->upload->data();

          $data = array(
            'photo_kk' => $this->upload->data('file_name'),
            
          );

          $this->Penduduk_model->update($this->input->post('id_penduduk'),$data);
        }
      }

      $data = array(
            'nik'                 => $this->input->post('nik'),
            'nama'                => $this->input->post('nama'),
            'no_kk'               => $this->input->post('no_kk'),
            'nama_kk'             => $this->input->post('nama_kk'),
            'jum_individu'        => $this->input->post('jum_individu'),
            'jk'                  => $this->input->post('jk'),
            'tmpt_lahir'          => $this->input->post('tmpt_lahir'),
            'tgl_lahir'           => $this->input->post('tgl_lahir'),
            'no_hp'               => $this->input->post('no_hp'),
            'id_provinsi'         => $this->input->post('id_provinsi'),
            'id_kecamatan'        => $this->input->post('id_kecamatan'),
            'id_kota_kab'         => $this->input->post('id_kota_kab'),
            'id_desa_kelurahan'   => $this->input->post('id_desa_kelurahan'),
            'alamat'              => $this->input->post('alamat'),
            'agama'               => $this->input->post('agama'),
            'pendidikan'          => $this->input->post('pendidikan'),
            'pekerjaan'           => $this->input->post('pekerjaan'),
            'status_perkawinan'   => $this->input->post('status_perkawinan'),
            'email'               => $this->input->post('email'),
            'kewaranegaraan'      => $this->input->post('kewaranegaraan'),
            'negara'              => $this->input->post('negara'),
            'kodepos'             => $this->input->post('kodepos'),
            'alamat_domisili'     => $this->input->post('alamat_domisili'),      
        );
    
        $this->Penduduk_model->update($this->input->post('id_penduduk'),$data);

        write_log();
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
        redirect('penduduk');
    }
  } 



  function view($nik)
  {
    is_login();
    is_update();

 //   if(!is_superadmin())
 //   {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
 //   }

    $this->data['get_all_provinsi']  = $this->Penduduk_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Penduduk_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Penduduk_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Penduduk_model->get_all_kelurahan();
    $this->data['penduduk']          = $this->Penduduk_model->get_by_nik($nik);
    if($this->data['penduduk'])
    {
      $this->data['page_title'] = 'Detail Data '.$this->data['module'];
      $this->data['action']     = 'penduduk/update_action';
      $this->load->view('back/penduduk/penduduk_view', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('penduduk');
    }

  }

  function delete($id)
  {
    is_login();
    is_delete();

 //   if(!is_superadmin())
 //   {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
  //  }

    $delete = $this->Penduduk_model->get_by_id($id);

    if($delete)
    {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Penduduk_model->soft_delete($id, $data);

      // $this->write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('Penduduk');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('Penduduk');
    }
  }


  function delete_permanent($id)
  {
    is_login();
    is_delete();

 //   if(!is_superadmin())
 //   {
 //     $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
 //     redirect('dashboard');
 //   }

    $delete = $this->Penduduk_model->get_by_id($id);

    if($delete)
    {
      $dir        = "./assets/images/user/".$delete->photo;
      $dir_thumb  = "./assets/images/user/".$delete->photo_thumb;

      if(is_file($dir))
      {
        unlink($dir);
        unlink($dir_thumb);
      }

      $this->Penduduk_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('Penduduk/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('Penduduk');
    }
  }

  function deleted_list()
  {
    is_login();
    is_restore();

 //   if(!is_superadmin())
 //   {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
 //   }

    $this->data['page_title'] = 'Deleted '.$this->data['module'].' List';

    $this->data['get_all_deleted'] = $this->Penduduk_model->get_all_deleted();
    $this->data['get_all'] = $this->Penduduk_model->get_all();


    $this->load->view('back/penduduk/penduduk_deleted_list', $this->data);
  }

  function restore($id)
  {
    is_login();
    is_restore();

 //   if(!is_superadmin())
//    {
//      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
//      redirect('dashboard');
//    }

    $row = $this->Penduduk_model->get_by_id($id);

    if($row)
    {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Penduduk_model->update($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('Penduduk/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('Penduduk/deleted_list');
    }
  }

}
