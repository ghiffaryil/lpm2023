<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barzah extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    date_default_timezone_set('Asia/Jakarta');
    $this->data['module'] = 'Barzah';

    $this->load->model(array('Barzah_model'));

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

    $this->data['btn_submit'] = '<button type="submit" name="button" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>';
    $this->data['btn_reset']  = 'Bersih';
    $this->data['btn_back']   = '<button type="button" onclick="history.back()" class="btn btn-success"> Kembali</button>';
    $this->data['btn_add']    = 'Add New Data';
    $this->data['add_action'] = base_url('barzah/create');
  }

  function index()
  {
    is_login();
    is_read();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title'] = $this->data['module'] . ' List';
    $this->data['header'] = $this->data['module'];

    $this->data['konselor']  = $this->Barzah_model->get_all_individu();
    $this->data['individu']  = $this->Barzah_model->get_all_admin_individu();
    $this->data['komunitas'] = $this->Barzah_model->get_laporan_komunitas();

    $data['path'] = base_url('assets');

    $this->load->view('back/barzah/konselor/konselor_list', $this->data);
  }

  public function get_data_penduduk()
  {
    $nik  = $this->input->get('nik');
    $data = $this->Barzah_model->get_nik_penduduk($nik);
    echo json_encode($data);
  }

  public function get_data_barzah()
  {
    $nama_barzah  = $this->input->get('nama_barzah');
    $data = $this->Barzah_model->get_data_barzah($nama_barzah);
    echo json_encode($data);
  }


  function create($id)
  {
    is_login();
    is_create();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title'] = 'Create New ' . $this->data['module'];
    $this->data['sub']        = "Tambah barzah";
    $this->data['header']     = $this->data['module'];
    $this->data['action_individu']  = "barzah/create_action_individu";
    $this->data['action_komunitas'] = 'barzah/create_action_komunitas';


    $this->data['get_all_provinsi']  = $this->Barzah_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Barzah_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Barzah_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Barzah_model->get_all_kelurahan();

    $this->data['data']             = $this->Barzah_model->get_data_individu($id);
    $this->data['komunitas']        = $this->Barzah_model->get_data_komunitas($id);
    $this->data['program']          = $this->Barzah_model->get_program();
    $this->data['subprogram']       = $this->Barzah_model->get_sub_program();
    $this->data['cek_individu']     = $this->Barzah_model->check_transaksi_individu_by_id($id);
    $this->data['cek_komunitas']    = $this->Barzah_model->check_transaksi_komunitas_by_id($id);
    $this->data['notif_individu']   = $this->Barzah_model->get_transaksi_individu_by_date($id);
    $this->data['notif_komunitas']  = $this->Barzah_model->get_transaksi_komunitas_by_date($id);
    $this->data['rekomender']       = $this->Barzah_model->get_rekomender();
    $this->data['datapenduduk']     = $this->Barzah_model->get_datapenduduk();
    $this->data['petugas'] = $this->Barzah_model->get_petugas();

    $this->load->view('back/barzah/barzah_add', $this->data);
  }

  function detail_konselor($id)
  {
    is_login();
    is_read();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title']        = 'Detail ' . $this->data['module'];
    $this->data['header']            = $this->data['module'];
    $this->data['get_all_provinsi']  = $this->Barzah_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Barzah_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Barzah_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Barzah_model->get_all_kelurahan();
    $this->data['penduduk']          = $this->Barzah_model->get_penduduk($id);

    $this->data['data_individu']     = $this->Barzah_model->get_transaksi_individu_by_id($id);
    $this->data['data_komunitas']    = $this->Barzah_model->get_transaksi_komunitas_by_id($id);
    $this->data['detail_individu']   = $this->Barzah_model->get_detail_individu_by_id($id);
    $this->data['detail_komunitas']  = $this->Barzah_model->get_detail_komunitas_by_id($id);

    $data['path'] = base_url('assets');
    $this->load->view('back/barzah/konselor/konselor_detail', $this->data);
  }

  function create_action_individu()
  {
    $this->form_validation->set_rules('nik', 'nik', 'required');
    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('sebab_kematian', 'sebab_kematian', 'required');
    $this->form_validation->set_rules('bentuk_layanan', 'bentuk_layanan', 'required');
    $this->form_validation->set_rules('tempat_meninggal', 'tempat_meninggal', 'required');
    $this->form_validation->set_rules('meninggalkan', 'meninggalkan', 'required');
    $this->form_validation->set_rules('info_bantuan', 'info_bantuan', 'required');
    $this->form_validation->set_rules('petugas', 'petugas', 'required');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if ($this->form_validation->run() === FALSE) {
      $this->create();
    } else {
      //insert ke table barzah
      $data1 = array(
        'nik'                => $this->input->post('nik'),
        'nama'               => $this->input->post('nama'),
        'sebab_kematian'     => $this->input->post('sebab_kematian'),
        'bentuk_layanan'     => $this->input->post('bentuk_layanan'),
        'tempat_meninggal'   => $this->input->post('tempat_meninggal'),
        'meninggalkan'       => $this->input->post('meninggalkan'),
        'deleted_at'         => '0000-00-00 00:00:00',
        'created_by'         => $this->session->username,
      );
      $this->Barzah_model->insert($data1);
      write_log();
      //insert ke table transaksi_individu
      $data2 = array(
        'id_individu'        => $this->input->post('id_individu'),
        'nik'                => $this->input->post('nik'),
        'nama'               => $this->input->post('nama'),
        'sebab_kematian'     => $this->input->post('sebab_kematian'),
        'jenis_bantuan'      => $this->input->post('bentuk_layanan'),
        'asnaf'              => $this->input->post('asnaf'),
        'tempat_meninggal'   => $this->input->post('tempat_meninggal'),
        'meninggalkan'       => $this->input->post('meninggalkan'),
        'info_bantuan'       => $this->input->post('info_bantuan'),
        'petugas'            => $this->input->post('petugas'),
        'periode_bantuan'    => $this->input->post('periode_bantuan'),
        'total_periode'      => $this->input->post('total_periode'),
        'sumber_dana'        => $this->input->post('sumber_dana'),
        'id_program'         => '9',
        'id_subprogram'      => $this->input->post('id_subprogram'),
        'deleted_at'         => '0000-00-00 00:00:00',
        'created_at'         => date('Y-m-d H:i:s'),
        'created_by'         => $this->session->username,
      );

      $this->Barzah_model->insert_individu($data2);
      write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
      redirect('barzah');
    }
  }

  function update_individu($id)
  {
    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title'] = 'Update ' . $this->data['module'] . ' Individu';
    $this->data['sub']        = "Edit barzah";
    $this->data['header']     = $this->data['module'];
    $this->data['update_action_individu'] = 'barzah/update_action_individu';

    $this->data['data']         = $this->Barzah_model->get_data_barzah_individu($id);
    $this->data['subprogram']   = $this->Barzah_model->get_sub_program();
    $this->data['rekomender']   = $this->Barzah_model->get_rekomender();
    $this->data['datapenduduk'] = $this->Barzah_model->get_datapenduduk();
    $this->data['petugas']      = $this->Barzah_model->get_petugas();
    $this->load->view('back/barzah/barzah_edit_individu', $this->data);
  }

  function update_action_individu()
  {

    $this->form_validation->set_rules('nik', 'nik', 'required');
    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('sebab_kematian', 'sebab_kematian', 'required');
    $this->form_validation->set_rules('bentuk_layanan', 'bentuk_layanan', 'required');
    $this->form_validation->set_rules('tempat_meninggal', 'tempat_meninggal', 'required');
    $this->form_validation->set_rules('meninggalkan', 'meninggalkan', 'required');
    $this->form_validation->set_rules('info_bantuan', 'info_bantuan', 'required');
    $this->form_validation->set_rules('petugas', 'petugas', 'required');

    $id = $this->input->post('id_transaksi_individu');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if ($this->form_validation->run() === FALSE) {
      $this->update($id);
    } else {
      $data = array(
        'id_individu'        => $this->input->post('id_individu'),
        'nik'                => $this->input->post('nik'),
        'nama'               => $this->input->post('nama'),
        'sebab_kematian'     => $this->input->post('sebab_kematian'),
        'jenis_bantuan'      => $this->input->post('bentuk_layanan'),
        'asnaf'              => $this->input->post('asnaf'),
        'tempat_meninggal'   => $this->input->post('tempat_meninggal'),
        'meninggalkan'       => $this->input->post('meninggalkan'),
        'info_bantuan'       => $this->input->post('info_bantuan'),
        'petugas'            => $this->input->post('petugas'),
        'periode_bantuan'    => $this->input->post('periode_bantuan'),
        'total_periode'      => $this->input->post('total_periode'),
        'sumber_dana'        => $this->input->post('sumber_dana'),
        'id_program'         => '9',
        'id_subprogram'      => $this->input->post('id_subprogram'),
      );

      $this->Barzah_model->update_individu($id, $data);

      write_log();
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
      redirect('barzah');
    }
  }

  function create_action_komunitas()
  {
    $this->form_validation->set_rules('id_komunitas', 'id_komunitas', 'required');
    $this->form_validation->set_rules('id_program', 'id_program', 'required');
    $this->form_validation->set_rules('id_subprogram', 'id_subprogram', 'required');
    $this->form_validation->set_rules('bentuk_layanan', 'bentuk_layanan', 'required');
    $this->form_validation->set_rules('jml_individu', 'jml_individu', 'required');
    $this->form_validation->set_rules('alamat', 'alamat', 'required');
    $this->form_validation->set_rules('id_provinsi', 'id_provinsi', 'required');
    $this->form_validation->set_rules('id_kota_kab', 'id_kota_kab', 'required');
    $this->form_validation->set_rules('id_kecamatan', 'id_kecamatan', 'required');
    $this->form_validation->set_rules('id_desa_kelurahan', 'id_desa_kelurahan', 'required');
    $this->form_validation->set_rules('asnaf', 'asnaf', 'required');
    $this->form_validation->set_rules('sumber_dana', 'sumber_dana', 'required');
    $this->form_validation->set_rules('periode_bantuan', 'periode_bantuan', 'required');
    $this->form_validation->set_rules('total_periode', 'total_periode', 'required');
    $this->form_validation->set_rules('jumlah_bantuan', 'jumlah_bantuan', 'required');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if ($this->form_validation->run() === FALSE) {
      $this->create();
    } else {
      $code  = $this->Barzah_model->autonumber();
      $data = array(
        'code'               =>  $code,
        'nik'                => $this->input->post('nik'),
        'nama'               => $this->input->post('nama'),
        'id_komunitas'       => $this->input->post('id_komunitas'),
        'id_program'         => $this->input->post('id_program'),
        'id_subprogram'      => $this->input->post('id_subprogram'),
        'bentuk_manfaat'     => $this->input->post('bentuk_layanan'),
        'jumlah_pm'          => $this->input->post('jml_individu'),
        'asnaf'              => $this->input->post('asnaf'),
        'sumber_dana'        => $this->input->post('sumber_dana'),
        'periode_bantuan'    => $this->input->post('periode_bantuan'),
        'total_periode'      => $this->input->post('total_periode'),
        'jumlah_bantuan'     => str_replace(",", "", $this->input->post('jumlah_bantuan')),
        'info_bantuan'       => $this->input->post('info_bantuan'),
        'deleted_at'         => '0000-00-00 00:00:00',
        'created_at'         => date('Y-m-d H:i:s'),
        'created_by'         => $this->session->username,
      );
      $this->Barzah_model->insert_komunitas($data);

      $data = array(
        'id_trans_komunitas_h'         =>  $code,
        'alamat'                       => $this->input->post('alamat'),
        'provinsi'                     => $this->input->post('id_provinsi'),
        'kota'                         => $this->input->post('id_kota_kab'),
        'kecamatan'                    => $this->input->post('id_kecamatan'),
        'kelurahan'                    => $this->input->post('id_desa_kelurahan'),
      );
      $this->Barzah_model->insert_komunitasdetail($data);

      write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
      redirect('barzah');
    }
  }

  function update_komunitas($id)
  {
    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title'] = 'Update ' . $this->data['module'] . ' Individu';
    $this->data['sub']        = "Edit barzah";
    $this->data['header']     = $this->data['module'];
    $this->data['update_action_komunitas'] = 'barzah/update_action_komunitas';

    $this->data['get_all_provinsi']  = $this->Barzah_model->get_all_provinsi();
    $this->data['data']         = $this->Barzah_model->get_data_barzah_komunitas($id);
    $this->data['komunitas']    = $this->Barzah_model->get_data_komunitas($id);
    $this->data['subprogram']   = $this->Barzah_model->get_sub_program();
    $this->data['rekomender']   = $this->Barzah_model->get_rekomender();
    $this->data['petugas']      = $this->Barzah_model->get_petugas();
    $this->load->view('back/barzah/barzah_edit_komunitas', $this->data);
  }

  function update_action_komunitas()
  {
    $this->form_validation->set_rules('id_komunitas', 'id_komunitas', 'required');
    $this->form_validation->set_rules('id_program', 'id_program', 'required');
    $this->form_validation->set_rules('id_subprogram', 'id_subprogram', 'required');
    $this->form_validation->set_rules('bentuk_layanan', 'bentuk_layanan', 'required');
    $this->form_validation->set_rules('jml_individu', 'jml_individu', 'required');
    $this->form_validation->set_rules('alamat', 'alamat', 'required');
    $this->form_validation->set_rules('id_provinsi', 'id_provinsi', 'required');
    $this->form_validation->set_rules('id_kota_kab', 'id_kota_kab', 'required');
    $this->form_validation->set_rules('id_kecamatan', 'id_kecamatan', 'required');
    $this->form_validation->set_rules('id_desa_kelurahan', 'id_desa_kelurahan', 'required');
    $this->form_validation->set_rules('asnaf', 'asnaf', 'required');
    $this->form_validation->set_rules('sumber_dana', 'sumber_dana', 'required');
    $this->form_validation->set_rules('periode_bantuan', 'periode_bantuan', 'required');
    $this->form_validation->set_rules('total_periode', 'total_periode', 'required');
    $this->form_validation->set_rules('jumlah_bantuan', 'jumlah_bantuan', 'required');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    $id   = $this->input->post('id_transaksi_komunitas');
    $code = $this->input->post('code');

    if ($this->form_validation->run() === FALSE) {
      $this->update($id);
    } else {
      $data1 = array(
        'nik'                => $this->input->post('nik'),
        'nama'               => $this->input->post('nama'),
        'id_komunitas'       => $this->input->post('id_komunitas'),
        'id_subprogram'      => $this->input->post('id_subprogram'),
        'bentuk_manfaat'     => $this->input->post('bentuk_layanan'),
        'jumlah_pm'          => $this->input->post('jml_individu'),
        'asnaf'              => $this->input->post('asnaf'),
        'sumber_dana'        => $this->input->post('sumber_dana'),
        'periode_bantuan'    => $this->input->post('periode_bantuan'),
        'total_periode'      => $this->input->post('total_periode'),
        'jumlah_bantuan'     => str_replace(",", "", $this->input->post('jumlah_bantuan')),
        'info_bantuan'       => $this->input->post('info_bantuan'),
      );
      $this->Barzah_model->update_komunitas($id, $data1);

      $data2 = array(
        'alamat'                       => $this->input->post('alamat'),
        'provinsi'                     => $this->input->post('id_provinsi'),
        'kota'                         => $this->input->post('id_kota_kab'),
        'kecamatan'                    => $this->input->post('id_kecamatan'),
        'kelurahan'                    => $this->input->post('id_desa_kelurahan'),
      );
      $this->Barzah_model->update_komunitas_d($code, $data2);

      write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
      redirect('barzah');
    }
  }


  function view($id)
  {
    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['get_all_provinsi']  = $this->Barzah_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Barzah_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Barzah_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Barzah_model->get_all_kelurahan();
    $this->data['barzah']            = $this->Barzah_model->get_nik_penduduk($id);

    if ($this->data['barzah']) {
      $this->data['page_title'] = 'Detail Data';

      $this->load->view('back/barzah/barzah_view', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('barzah/detail');
    }
  }

  function detail($id)
  {
    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['get_all']      = $this->Barzah_model->get_detail_by_nama_barzah($id);

    if ($this->data['get_all']) {
      $this->data['page_title'] = 'Detail Data ' . $this->data['module'];
      $this->data['action']     = 'barzah/update_action';

      $this->load->view('back/barzah/barzah_list_detail', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('barzah');
    }
  }

  function delete_individu($id)
  {
    is_login();
    is_delete();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->Barzah_model->get_individu_by_id($id);

    if ($delete) {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Barzah_model->update_individu($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('barzah');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('barzah');
    }
  }

  function delete_komunitas($id)
  {
    is_login();
    is_delete();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->Barzah_model->delete_transaksi_komunitas_by_id($id);

    if ($delete) {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Barzah_model->update_komunitas($id, $data);

      // $this->write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('barzah');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('barzah');
    }
  }


  function delete_permanent_individu($id)
  {
    is_login();
    is_delete();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->Barzah_model->get_individu_by_id($id);

    if ($delete) {
      $dir        = "./assets/images/user/" . $delete->photo;
      $dir_thumb  = "./assets/images/user/" . $delete->photo_thumb;

      if (is_file($dir)) {
        unlink($dir);
        unlink($dir_thumb);
      }

      $this->Barzah_model->delete_individu($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('barzah/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('barzah/deleted_list');
    }
  }

  function delete_permanent_komunitas($id)
  {
    is_login();
    is_delete();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->Barzah_model->delete_transaksi_komunitas_by_id($id);

    if ($delete) {
      $dir        = "./assets/images/user/" . $delete->photo;
      $dir_thumb  = "./assets/images/user/" . $delete->photo_thumb;

      if (is_file($dir)) {
        unlink($dir);
        unlink($dir_thumb);
      }

      $this->Barzah_model->delete_komunitas($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('barzah/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('barzah/deleted_list');
    }
  }

  function deleted_list()
  {
    is_login();
    is_restore();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title'] = 'Deleted ' . $this->data['module'] . ' List';

    $this->data['individu'] = $this->Barzah_model->get_trans_individu_deleted();
    $this->data['komunitas'] = $this->Barzah_model->get_trans_komunitas_deleted();

    $this->load->view('back/barzah/barzah_deleted_list', $this->data);
  }

  function restore_individu($id)
  {
    is_login();
    is_restore();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $row = $this->Barzah_model->get_individu_by_id($id);

    if ($row) {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Barzah_model->update_individu($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('barzah/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('barzah/deleted_list');
    }
  }

  function restore_komunitas($id)
  {
    is_login();
    is_restore();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $row = $this->Barzah_model->delete_transaksi_komunitas_by_id($id);

    if ($row) {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Barzah_model->update_komunitas($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('barzah/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('barzah/deleted_list');
    }
  }

  function laporan_pusat()
  {
    is_login();
    is_read();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    //sql jumlah berdasarkan Posko
    $sql_sub_program = "SELECT
     `sub_program`.`nama_subprogram` AS `sub_program`,
     `sub_program`.`id_subprogram` AS `id_subprogram`
     FROM  `transaksi_individu`
     LEFT JOIN `sub_program`
     ON `transaksi_individu`.`id_subprogram` = `sub_program`.`id_subprogram`
     WHERE `transaksi_individu`.`id_program` = 9";
    $res_sql_sub_program = $this->db->query($sql_sub_program)->result_array();

    $arr_sub_program = [];
    for ($i = 0; $i < count($res_sql_sub_program); $i++) {
      $data_sub_program = [
        "jumlah_pm" => 1,
        "id_subprogram" =>  $res_sql_sub_program[$i]['id_subprogram'],
        "sub_program" =>  $res_sql_sub_program[$i]['sub_program']
      ];
      array_push($arr_sub_program, $data_sub_program);
    }

    $unique_subprogram = array();
    foreach ($arr_sub_program as $vals) {
      if (array_key_exists($vals['id_subprogram'], $unique_subprogram)) {
        $unique_subprogram[$vals['id_subprogram']]['jumlah_pm'] += $vals['jumlah_pm'];
      } else {
        $unique_subprogram[$vals['id_subprogram']] = $vals;
      }
    }
    $this->data['total_sub_program'] = $unique_subprogram;

    /////////////////////////////////////////////////
    $sql_kab_kota_individu = "SELECT `kota_kab`.`kota_kab` AS `kota_kab`
    FROM  `transaksi_individu`
    LEFT JOIN `penduduk`
    ON `penduduk`.`nik` = `transaksi_individu`.`nik`
    LEFT JOIN `kota_kab`
    ON `penduduk`.`id_kota_kab` = `kota_kab`.`id_kota_kab`
    WHERE `transaksi_individu`.`id_program` = 9";
    $res_sql_kab_kota_individu = $this->db->query($sql_kab_kota_individu)->result_array();
    $arr_kab_kota_individu = [];
    for ($i = 0; $i < count($res_sql_kab_kota_individu); $i++) {
      $data_kab_kota_individu = [
        "jumlah_pm" => 1,
        "kota_kab" => $res_sql_kab_kota_individu[$i]['kota_kab']
      ];
      array_push($arr_kab_kota_individu, $data_kab_kota_individu);
    }

    $unique_kab_kota_individu = array();
    foreach ($arr_kab_kota_individu as $vals) {
      if (array_key_exists($vals['kota_kab'], $unique_kab_kota_individu)) {
        $unique_kab_kota_individu[$vals['kota_kab']]['jumlah_pm'] += $vals['jumlah_pm'];
      } else {
        $unique_kab_kota_individu[$vals['kota_kab']] = $vals;
      }
    }
    $this->data['total_kab_kota_individu'] = $unique_kab_kota_individu;
    ///////////////////////////////////////////////////////////////////
    //sql jumlah berdasarkan kematian
    $sql_sebab_kematian = "SELECT
     `transaksi_individu`.`sebab_kematian` AS `sebab_kematian`
     FROM  `transaksi_individu`
     WHERE `transaksi_individu`.`id_program` = 9";
    $res_sql_sebab_kematian = $this->db->query($sql_sebab_kematian)->result_array();

    $arr_sebab_kematian = [];
    for ($i = 0; $i < count($res_sql_sebab_kematian); $i++) {
      $data_sebab_kematian = [
        "jumlah_pm" => 1,
        "sebab_kematian" =>  $res_sql_sebab_kematian[$i]['sebab_kematian']
      ];
      array_push($arr_sebab_kematian, $data_sebab_kematian);
    }

    $unique_sebab_kematian = array();
    foreach ($arr_sebab_kematian as $vals) {
      if (array_key_exists($vals['sebab_kematian'], $unique_sebab_kematian)) {
        $unique_sebab_kematian[$vals['sebab_kematian']]['jumlah_pm'] += $vals['jumlah_pm'];
      } else {
        $unique_sebab_kematian[$vals['sebab_kematian']] = $vals;
      }
    }
    $this->data['total_sebab_kematian_individu'] = $unique_sebab_kematian;
    /////////////////////////////////////////////////////
    //sql Rekap PM Berdasarkan Jenis Kelamin (komunitas)
    $sql_jk = "SELECT `penduduk`.`jk` AS `jk`
      FROM  `transaksi_komunitas`
      LEFT JOIN `penduduk`
      ON `penduduk`.`nik` = `transaksi_komunitas`.`nik`
      WHERE `transaksi_komunitas`.`id_program` = 9";
    $res_sql_jk = $this->db->query($sql_jk)->result_array();

    $arr_jk = [];
    for ($i = 0; $i < count($res_sql_jk); $i++) {
      $data_jk = [
        "jumlah_pm" => 1,
        "jk" =>  $res_sql_jk[$i]['jk']
      ];
      array_push($arr_jk, $data_jk);
    }

    $unique_jk = array();
    foreach ($arr_jk as $vals) {
      if (array_key_exists($vals['jk'], $unique_jk)) {
        $unique_jk[$vals['jk']]['jumlah_pm'] += $vals['jumlah_pm'];
      } else {
        $unique_jk[$vals['jk']] = $vals;
      }
    }
    $this->data['total_jk'] = $unique_jk;
    //////////////////////////////////////////////////////////////////
    //sql jumlah provinsi pada program bsl
    $sql_provinsi = "SELECT `penduduk`.`id_provinsi` AS `provinsi`
      FROM  `transaksi_komunitas`
      LEFT JOIN `penduduk`
      ON `penduduk`.`nik` = `transaksi_komunitas`.`nik`
      LEFT JOIN `provinsi`
      ON `penduduk`.`id_provinsi` = `provinsi`.`id_provinsi`
      WHERE `transaksi_komunitas`.`id_program` = 9";
    $res_sql_provinsi = $this->db->query($sql_provinsi)->result_array();
    $arr_prov = [];
    for ($i = 0; $i < count($res_sql_provinsi); $i++) {
      array_push($arr_prov, $res_sql_provinsi[$i]['provinsi']);
    }
    $prov_unique = array_unique($arr_prov);
    $this->data['total_provinsi'] = count($prov_unique);
    //sql jumlah kota pada program PKM
    $sql_kab_kota = "SELECT `penduduk`.`id_kota_kab` AS `kab_kota`, `transaksi_komunitas`.`total_pendamping` AS `total_pendamping`
      FROM  `transaksi_komunitas`
      LEFT JOIN `penduduk`
      ON `penduduk`.`nik` = `transaksi_komunitas`.`nik`
      LEFT JOIN `kota_kab`
      ON `penduduk`.`id_kota_kab` = `kota_kab`.`id_kota_kab`
      WHERE `transaksi_komunitas`.`id_program` = 9";
    $res_sql_kab_kota = $this->db->query($sql_kab_kota)->result_array();
    $arr_kab_kota = [];
    $jumlah_pendamping = 0;
    for ($i = 0; $i < count($res_sql_kab_kota); $i++) {
      array_push($arr_kab_kota, $res_sql_kab_kota[$i]['kab_kota']);
      $jumlah_pendamping += (int)$res_sql_kab_kota[$i]['total_pendamping'];
    }

    $kab_kota_unique = array_unique($arr_kab_kota);
    $this->data['total_kab_kota'] = count($kab_kota_unique);
    $this->data['total_pm'] = count($arr_kab_kota);
    $this->data['total_pendamping'] = $jumlah_pendamping;
    $this->data['jumlah'] = (int)$jumlah_pendamping + count($arr_kab_kota);


    $this->data['page_title']        = 'Data ' . $this->data['module'];
    $this->data['header']            = 'Laporan Pusat';
    $this->data['get_all_provinsi']  = $this->Barzah_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Barzah_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Barzah_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Barzah_model->get_all_kelurahan();
    $this->data['individu']          = $this->Barzah_model->get_all_admin_individu();
    $this->data['komunitas']         = $this->Barzah_model->get_laporan_komunitas();

    $data['path'] = base_url('assets');
    $this->load->view('back/barzah/laporan/pusat', $this->data);
  }

  function laporan_admin()
  {
    is_login();
    is_read();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title']        = 'Data ' . $this->data['module'];
    $this->data['header']            = 'Laporan Pusat';
    $this->data['get_all_provinsi']  = $this->Barzah_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Barzah_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Barzah_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Barzah_model->get_all_kelurahan();
    $this->data['individu']          = $this->Barzah_model->get_all_admin_individu();
    $this->data['umur'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $umur = $this->data['individu'][$i]->tgl_lahir;
      $res_umur = $this->hitung_umur($umur);
      array_push($this->data['umur'], $res_umur);
    }
    $this->data['komunitas']         = $this->Barzah_model->get_laporan_komunitas();

    $data['path'] = base_url('assets');
    $this->load->view('back/barzah/laporan/admin', $this->data);
  }

  function hitung_umur($tanggal_lahir)
  {
    $birthDate = new DateTime($tanggal_lahir);
    $today = new DateTime("today");
    if ($birthDate > $today) {
      exit("0 tahun 0 bulan 0 hari");
    }
    $y = $today->diff($birthDate)->y;
    $m = $today->diff($birthDate)->m;
    $d = $today->diff($birthDate)->d;
    return $y . " tahun " . $m . " bulan " . $d . " hari";
  }

  //------------------------[ DETAIL LAPORAN INDIVIDU & KOMUNITAS ]-----------------------------//
  function detail_laporan_individu($id)
  {
    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['get_all']      = $this->Barzah_model->get_laporan_individu_detail($id);

    if ($this->data['get_all']) {
      $this->data['page_title'] = 'Detail Data ' . $this->data['module'];
      $this->load->view('back/barzah/laporan/detail_laporan_individu', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('barzah');
    }
  }

  // -------------- DETAIL LAPORAN KOMNITAS --------------
  function detail_laporan_komunitas($id)
  {
    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['get_all']      = $this->Barzah_model->get_laporan_komunitas_detail($id);

    if ($this->data['get_all']) {
      $this->data['page_title'] = 'Detail Data ' . $this->data['module'];
      $this->load->view('back/barzah/laporan/detail_laporan_komunitas', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('barzah');
    }
  }
}
