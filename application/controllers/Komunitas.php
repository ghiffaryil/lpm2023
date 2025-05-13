<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komunitas extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    date_default_timezone_set('Asia/Jakarta');
    $this->data['module'] = 'Komunitas';

    $this->load->model(array('Komunitas_model'));

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

    $this->data['btn_submit'] = 'Simpan';
    $this->data['btn_reset']  = 'Bersih';
    $this->data['btn_back']   = 'Kembali';
    $this->data['btn_add']    = 'Add New Data';
    $this->data['add_action'] = base_url('komunitas/create');
  }

  function index()
  {
    is_login();
    is_read();

    //if (!is_superadmin()) {
    //  $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
    //  redirect('dashboard');
   // }

    $this->data['page_title'] = $this->data['module'] . ' List';

    $this->data['get_all'] = $this->Komunitas_model->get_all_komunitas();


    $data['path'] = base_url('assets');

    $this->load->view('back/komunitas/komunitas_list', $this->data);
  }

  public function get_data_penduduk($id)
  {
    $data = $this->Komunitas_model->get_nik_penduduk($id);
    echo json_encode($data);
  }

  public function get_data_komunitas()
  {
    $nama_komunitas  = $this->input->get('nama_komunitas');
    $data = $this->Komunitas_model->get_data_komunitas($nama_komunitas);
    echo json_encode($data);
  }


  function create()
  {
    is_login();
    is_create();

  //  if (!is_superadmin()) {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
   // }

    $this->data['page_title'] = 'Create New ' . $this->data['module'];
    $this->data['sub']    = "Tambah Komunitas";
    $this->data['header'] = $this->data['module'];
    $this->data['action'] = "komunitas/create_action";

    $this->data['get_penduduk']     = $this->Komunitas_model->get_penduduk();
    $this->data['get_all_provinsi'] = $this->Komunitas_model->get_all_provinsi();
    $this->data['get_negara']       = $this->Komunitas_model->get_negara();
    $this->data['get_kategori_komunitas']       = $this->Komunitas_model->get_kategori_komunitas();

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
      'class'         => 'form-control text-capitalize',
      'autocomplete'  => 'off',
      'required'      => '',
      'readonly'      => 'readonly',
    ];
    $this->data['nama_komunitas'] = [
      'name'          => 'nama_komunitas',
      'id'            => 'nama_komunitas',
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
    ];
    $this->data['profil_komunitas'] = [
      'name'          => 'profil_komunitas',
      'id'            => 'profil_komunitas',
      'rows'          => '3',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
    $this->data['negara'] = [
      'name'          => 'negara',
      'id'            => 'negara',
      'class'         => 'form-control selectpicker',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['provinsi'] = [
      'name'          => 'provinsi',
      'id'            => 'id_provinsi',
      'class'         => 'form-control selectpicker',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['kota_kab'] = [
      'name'          => 'kota_kab',
      'id'            => 'id_kota_kab',
      'class'         => 'form-control selectpicker',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['kecamatan'] = [
      'name'          => 'kecamatan',
      'id'            => 'id_kecamatan',
      'class'         => 'form-control selectpicker',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['desa_kelurahan'] = [
      'name'          => 'desa_kelurahan',
      'id'            => 'id_desa_kelurahan',
      'class'         => 'form-control selectpicker',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['alamat'] = [
      'name'          => 'alamat',
      'id'            => 'alamat',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'rows'          => '3',
    ];
    $this->data['kodepos'] = [
      'name'          => 'kodepos',
      'id'            => 'kodepos',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'onkeypress'    => 'return hanyaAngka(event)',
      'value'         => '',
    ];

    $this->load->view('back/komunitas/komunitas_add', $this->data);
  }

  function create_action()
  {
    $id  = $this->input->post('nama_komunitas');
    $row = $this->Komunitas_model->get_check($id);
    if (!empty($row->nama_komunitas) && $row->is_delete == 0) {
      echo 'exist';
    } elseif (!empty($row->nama_komunitas) && $row->is_delete == 1) {
      echo 'trash';
    } else {

        $config['upload_path'] = './assets/lampiran/';
        $config['overwrite'] = TRUE;       
        $config['allowed_types'] = 'png|jpg|gif|ico|jpeg|pdf';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('legalitas_1')) {
            $legalitas_1 = $this->upload->data("file_name");
        } else {
            $legalitas_1 = '';
        }
        if ($this->upload->do_upload('legalitas_2')) {
            $legalitas_2 = $this->upload->data("file_name");
        } else {
            $legalitas_2 = '';
        }
        if ($this->upload->do_upload('legalitas_3')) {
            $legalitas_3 = $this->upload->data("file_name");
        } else {
            $legalitas_3 = '';
        }

      $kategori_komunitas = $this->input->post('kategori_komunitas');
      if ($kategori_komunitas == 3) {
        $data = array(
          'nik'                 => 0,
          'nama'                => "",
          'nama_komunitas'      => $this->input->post('nama_komunitas'),
          'kategori_komunitas'  => $this->input->post('kategori_komunitas'),
          'profil_komunitas'    => $this->input->post('profil_komunitas'),
          'no_telpon'           => $this->input->post('no_telpon'),
          'id_provinsi'         => $this->input->post('id_provinsi'),
          'id_kecamatan'        => $this->input->post('id_kecamatan'),
          'id_kota_kab'         => $this->input->post('id_kota_kab'),
          'id_desa_kelurahan'   => $this->input->post('id_desa_kelurahan'),
          'alamat'              => $this->input->post('alamat'),
          'negara'              => $this->input->post('negara'),
          'kodepos'             => $this->input->post('kodepos'),
          'legalitas_1'         => $legalitas_1,
          'legalitas_2'         => $legalitas_2,
          'legalitas_3'         => $legalitas_3,
          'periode_bantuan'       => date('Y-m-d'),
          'total_periode'         => 1,
          'deleted_at'          => '0000-00-00 00:00:00',
          'created_at'          => date('Y-m-d H:i:s'),
          'created_by'          => $this->session->username,
          'usertype '           => $this->session->usertype,
        );
      } else {
        $data = array(
          'nik'                 => $this->input->post('nik'),
          'nama'                => $this->input->post('nama'),
          'nama_komunitas'      => $this->input->post('nama_komunitas'),
          'kategori_komunitas'  => $this->input->post('kategori_komunitas'),
          'profil_komunitas'    => $this->input->post('profil_komunitas'),
          'no_telpon'           => $this->input->post('no_telpon'),
          'id_provinsi'         => $this->input->post('id_provinsi'),
          'id_kecamatan'        => $this->input->post('id_kecamatan'),
          'id_kota_kab'         => $this->input->post('id_kota_kab'),
          'id_desa_kelurahan'   => $this->input->post('id_desa_kelurahan'),
          'alamat'              => $this->input->post('alamat'),
          'negara'              => $this->input->post('negara'),
          'kodepos'             => $this->input->post('kodepos'),
          'legalitas_1'         => $legalitas_1,
          'legalitas_2'         => $legalitas_2,
          'legalitas_3'         => $legalitas_3,
          'periode_bantuan'       => date('Y-m-d'),
          'total_periode'         => 1,
          'deleted_at'          => '0000-00-00 00:00:00',
          'created_at'          => date('Y-m-d H:i:s'),
          'created_by'          => $this->session->username,
          'usertype '           => $this->session->usertype,
        );
      }

      $this->Komunitas_model->insert($data);
      write_log();
    }
  }

  function update($id)
  {
    is_login();
    is_update();

  //  if (!is_superadmin()) {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
  //  }

    $nama_komunitas = $this->input->post('nama_komunitas');

    $this->data['page_title'] = 'Update Data ' . $this->data['module'];
    $this->data['action']     = 'komunitas/update_action';

    $this->data['get_penduduk']     = $this->Komunitas_model->get_penduduk();
    $this->data['get_kategori_komunitas']     = $this->Komunitas_model->get_kategori_komunitas();
    $this->data['get_all_provinsi']  = $this->Komunitas_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Komunitas_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Komunitas_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Komunitas_model->get_all_kelurahan();
    $this->data['get_negara']        = $this->Komunitas_model->get_negara();
    $this->data['komunitas']         = $this->Komunitas_model->get_by_id($id);

    if ($this->data['komunitas']) {
      $this->load->view('back/komunitas/komunitas_edit', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('komunitas');
    }
  }

  function update_action()
  {

    $this->form_validation->set_rules('nik', 'nik', 'required');
    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('nama_komunitas', 'nama_komunitas', 'required');
    $this->form_validation->set_rules('kategori_komunitas', 'kategori_komunitas', 'required');
    $this->form_validation->set_rules('no_telpon', 'no_telpon', 'required');
    $this->form_validation->set_rules('id_provinsi', 'id_provinsi', 'required');
    $this->form_validation->set_rules('id_kota_kab', 'id_kota_kab', 'required');
    $this->form_validation->set_rules('id_kecamatan', 'id_kecamatan', 'required');
    $this->form_validation->set_rules('id_desa_kelurahan', 'id_desa_kelurahan', 'required');
    $this->form_validation->set_rules('negara', 'negara', 'required');
    $this->form_validation->set_rules('kodepos', 'kodepos', 'required');

    $nama_komunitas = $this->input->post('nama_komunitas');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if ($this->form_validation->run() === FALSE) {
      $this->update($this->input->post('id_komunitas'));
    } else {

      if (!empty($_FILES['legalitas_1']['name'])) {
        $nmfile = strtolower(url_title($this->input->post('photo_name'))) . date('YmdHis');

        $config['upload_path']   = './assets/lampiran/';
        $config['allowed_types'] = 'png|jpg|gif|ico|jpeg|pdf';
        $config['file_name']     = $nmfile;

        $this->load->library('upload', $config);

        $delete = $this->Komunitas_model->get_by_id($this->input->post('id_komunitas'));

        $dir        = "./assets/lampiran/" . $delete->legalitas_1;

        if (is_file($dir)) {
          unlink($dir);
        }

        if (!$this->upload->do_upload('legalitas_1')) {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $error['error'] . '</div>');

          $this->update($this->input->post('id_komunitas'));
        } else {
          $legalitas_1 = $this->upload->data();

          $data = array(
            'legalitas_1' => $this->upload->data('file_name'),
          );

          $this->Komunitas_model->update($this->input->post('id_komunitas'), $data);
        }
      }

      if (!empty($_FILES['legalitas_2']['name'])) {
        $nmfile = strtolower(url_title($this->input->post('photo_name'))) . date('YmdHis');

        $config['upload_path']   = './assets/lampiran/';
        $config['allowed_types'] = 'png|jpg|gif|ico|jpeg|pdf';
        $config['file_name']     = $nmfile;

        $this->load->library('upload', $config);

        $delete = $this->Komunitas_model->get_by_id($this->input->post('id_komunitas'));

        $dir        = "./assets/lampiran/" . $delete->legalitas_2;

        if (is_file($dir)) {
          unlink($dir);
        }

        if (!$this->upload->do_upload('legalitas_2')) {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $error['error'] . '</div>');

          $this->update($this->input->post('id_komunitas'));
        } else {
          $legalitas_2 = $this->upload->data();

          $data = array(
            'legalitas_2' => $this->upload->data('file_name'),
          );

          $this->Komunitas_model->update($this->input->post('id_komunitas'), $data);
        }
      }

      if (!empty($_FILES['legalitas_3']['name'])) {
        $nmfile = strtolower(url_title($this->input->post('photo_name'))) . date('YmdHis');

        $config['upload_path']   = './assets/lampiran/';
        $config['allowed_types'] = 'png|jpg|gif|ico|jpeg|pdf';
        $config['file_name']     = $nmfile;

        $this->load->library('upload', $config);

        $delete = $this->Komunitas_model->get_by_id($this->input->post('id_komunitas'));

        $dir    = "./assets/lampiran/" . $delete->legalitas_3;

        if (is_file($dir)) {
          unlink($dir);
        }

        if (!$this->upload->do_upload('legalitas_3')) {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $error['error'] . '</div>');

          $this->update($this->input->post('id_komunitas'));
        } else {
          $legalitas_3 = $this->upload->data();

          $data = array(
            'legalitas_3' => $this->upload->data('file_name'),
          );

          $this->Komunitas_model->update($this->input->post('id_komunitas'), $data);
        }
      }

      $data = array(
        'nik'                 => $this->input->post('nik'),
        'nama'                => $this->input->post('nama'),
        'nama_komunitas'      => $this->input->post('nama_komunitas'),
        'kategori_komunitas'  => $this->input->post('kategori_komunitas'),
        'profil_komunitas'    => $this->input->post('profil_komunitas'),
        'no_telpon'           => $this->input->post('no_telpon'),
        'id_provinsi'         => $this->input->post('id_provinsi'),
        'id_kecamatan'        => $this->input->post('id_kecamatan'),
        'id_kota_kab'         => $this->input->post('id_kota_kab'),
        'id_desa_kelurahan'   => $this->input->post('id_desa_kelurahan'),
        'alamat'              => $this->input->post('alamat'),
        'negara'              => $this->input->post('negara'),
        'kodepos'             => $this->input->post('kodepos'),
        'deleted_at'          => '0000-00-00 00:00:00',
        'created_by'          => $this->session->username,
      );

      $this->Komunitas_model->update($this->input->post('id_komunitas'), $data);

      write_log();
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
      redirect('komunitas');
    }
  }

  function view($id)
  {
    is_login();
    is_update();

  //  if (!is_superadmin()) {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
  //  }

    $this->data['get_all_provinsi']  = $this->Komunitas_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Komunitas_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Komunitas_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Komunitas_model->get_all_kelurahan();
    $this->data['komunitas']         = $this->Komunitas_model->get_nik_penduduk($id);

    if ($this->data['komunitas']) {
      $this->data['page_title'] = 'Detail Data';

      $this->load->view('back/komunitas/komunitas_view', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('komunitas/detail');
    }
  }

  function detail($id)
  {
    is_login();
    is_update();

  //  if (!is_superadmin()) {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
  //  }

    $this->data['get_all_kelurahan'] = $this->Komunitas_model->get_all_kelurahan();
    $this->data['get_all']           = $this->Komunitas_model->get_detail_by_id($id);

    if ($this->data['get_all']) {
      $this->data['page_title'] = 'Detail Data ' . $this->data['module'];
      $this->data['action']     = 'Komunitas/update_action';

      $this->load->view('back/komunitas/komunitas_list_detail', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('komunitas');
    }
  }

  function delete($id)
  {
    is_login();
    is_delete();

 //   if (!is_superadmin()) {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
  //  }

    $nik = $this->input->post('nik');

    $delete = $this->Komunitas_model->get_by_id($id);

    if ($delete) {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Komunitas_model->soft_delete($id, $data);

      // $this->write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('Komunitas');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('Komunitas');
    }
  }


  function delete_permanent($id)
  {
    is_login();
    is_delete();

  //  if (!is_superadmin()) {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
  //  }

    $delete = $this->Komunitas_model->get_by_id($id);

    if ($delete) {
      $dir        = "./assets/images/user/" . $delete->photo;
      $dir_thumb  = "./assets/images/user/" . $delete->photo_thumb;

      if (is_file($dir)) {
        unlink($dir);
        unlink($dir_thumb);
      }

      $this->Komunitas_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('komunitas/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('komunitas/deleted_list');
    }
  }

  function deleted_list()
  {
    is_login();
    is_restore();

 //   if (!is_superadmin()) {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
 //   }

    $this->data['page_title'] = 'Deleted ' . $this->data['module'] . ' List';

    $this->data['get_all_deleted'] = $this->Komunitas_model->get_all_deleted();


    $this->load->view('back/komunitas/komunitas_deleted_list', $this->data);
  }

  function restore($id)
  {
    is_login();
    is_restore();

 //   if (!is_superadmin()) {
 //     $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
 //     redirect('dashboard');
 //   }

    $row = $this->Komunitas_model->get_by_id($id);

    if ($row) {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Komunitas_model->update($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('komunitas/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('komunitas/deleted_list');
    }
  }
}
