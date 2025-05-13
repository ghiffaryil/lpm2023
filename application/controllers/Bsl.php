<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bsl extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    
    date_default_timezone_set('Asia/Jakarta');
    $this->data['module'] = 'Bsl';

    $this->load->model(array('Bsl_model'));

    $this->load->helper(array('url', 'html'));
    $this->load->database();

    // company_profile
    $this->data['company_data']          = $this->Company_model->company_profile();

    // template
    $this->data['logo_header_template']  = $this->Template_model->logo_header();
    $this->data['navbar_template']       = $this->Template_model->navbar();
    $this->data['sidebar_template']      = $this->Template_model->sidebar();
    $this->data['background_template']   = $this->Template_model->background();
    $this->data['sidebarstyle_template'] = $this->Template_model->sidebarstyle();

    $this->data['btn_submit'] = '<button type="submit" name="button" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>';
    $this->data['btn_reset']  = 'Bersih';
    $this->data['btn_back']   = '<button type="button" onclick="history.back()" class="btn btn-secondary"> Kembali</button>';
    $this->data['btn_add']    = 'Add New Data';
    $this->data['add_action'] = base_url('bsl/create');
  }

  function konselor()
  {
    is_login();
    is_read();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title'] = $this->data['module'] . ' List';
    $this->data['header']     = $this->data['module'];
    $this->data['konselor']   = $this->Bsl_model->get_all_individu();
    $this->data['individu']   = $this->Bsl_model->get_all_admin_individu();
    // var_dump($this->data['individu']);
    // die;
    $this->data['umur'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $umur = $this->data['individu'][$i]->tgl_lahir;
      $res_umur = $this->hitung_umur($umur);
      array_push($this->data['umur'], $res_umur);
    }
    $this->data['komunitas']         = $this->Bsl_model->get_laporan_komunitas();
    $data['path'] = base_url('assets');
    $this->load->view('back/bsl/konselor/konselor_list', $this->data);
  }

  function create($id)
  {
    is_login();
    is_create();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title']       = 'Create New Manfaat BSL';
    $this->data['header']           =  $this->data['module'];
    $this->data['action_individu']  = 'bsl/create_action_individu';
    $this->data['action_komunitas'] = 'bsl/create_action_komunitas';

    $this->data['data']             = $this->Bsl_model->get_data_individu($id);
    // $this->data['komunitas']        = $this->Bsl_model->get_data_komunitas($id);
    $this->data['komunitas']        = $this->Bsl_model->get_data_komunitas_by_program();
    $this->data['program']           = $this->Bsl_model->get_program();
    $this->data['subprogram']       = $this->Bsl_model->get_sub_program();
    $this->data['cek_individu']     = $this->Bsl_model->check_transaksi_individu_by_id($id);
    $this->data['cek_komunitas']    = $this->Bsl_model->check_transaksi_komunitas_by_id($id);
    $this->data['notif_individu']   = $this->Bsl_model->get_transaksi_individu_by_date($id);
    $this->data['notif_komunitas']  = $this->Bsl_model->get_transaksi_komunitas_by_date($id);
    $this->data['rekomender']       = $this->Bsl_model->get_rekomender();
    $this->data['datapenduduk']       = $this->Bsl_model->get_datapenduduk();
    $this->data['jk'] = [
      'name'          => 'jk',
      'id'            => 'jk',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      // 'required'      => '',
      'value'         => $this->form_validation->set_value('jk'),
    ];
    $this->data['jk_value'] = [
      ''              => 'Tidak ada keterangan',
      'L'             => 'Laki-laki',
      'P'             => 'Perempuan',
    ];

    // var_dump($this->Bsl_model->get_datapenduduk());die;
    $this->load->view('back/bsl/konselor/konselor_add', $this->data);
  }

  function create_action_individu()
  {
    $nik = $this->input->post('nik');
    $sql_penduduk = "SELECT pekerjaan FROM penduduk WHERE nik = $nik";
    $res_penduduk = $this->db->query($sql_penduduk)->row();
    if ($res_penduduk) {
      $profesi = $res_penduduk->pekerjaan;
    } else {
      $profesi = "";
    }
    $data = array(
      'id_individu' => $this->input->post('id_individu'),
      'nik' => $this->input->post('nik'),
      'nama' => $this->input->post('nama'),
      'id_program' => $this->input->post('id_program'),
      'id_subprogram' => $this->input->post('id_subprogram'),
      'info_bantuan' => $this->input->post('info_bantuan'),

      'asnaf' => $this->input->post('asnaf'),
      'status_tinggal' => "",
      'kasus' => "",
      'rekomendasi_bantuan' => "",
      'rencana_bantuan' => "",
      'mekanisme_bantuan' => "",
      'jumlah_bantuan' => str_replace(",", "", $this->input->post('jumlah_bantuan')),
      'jumlah_permohonan' => str_replace(",", "", $this->input->post('jumlah_permohonan')),
      'jenis_bantuan' => $this->input->post('jenis_bantuan'),
      'sifat_bantuan' => "",
      'bidang_tugas' => $this->input->post('bidang_tugas'),
      'profesi' => $profesi,
      'kopentensi' => $this->input->post('kopentensi'),
      'sumber_dana'         => $this->input->post('sumber_dana'),
      'periode_bantuan'         => $this->input->post('periode_bantuan'),
      'total_periode'         => $this->input->post('total_periode'),

      'deleted_at'         => '0000-00-00 00:00:00',
      'created_by'         => $this->session->username
    );

    $this->Bsl_model->insert($data);
    write_log();
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
    redirect(base_url('bsl/konselor'));
  }

  function update_individu($id)
  {
    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title']  = 'Update Data ' . $this->data['module'];
    $this->data['update_action_individu'] = 'bsl/update_action_individu';

    $this->data['data']        = $this->Bsl_model->get_transaksi_individu_update($id);
    $this->data['rekomender']  = $this->Bsl_model->get_rekomender();
    $this->data['subprogram']  = $this->Bsl_model->get_sub_program();

    if ($this->data['data']) {
      $this->load->view('back/bsl/konselor/konselor_edit_individu', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('bsl/konselor/');
    }
  }

  function update_action_individu()
  {
    $data = array(
      'id_individu' => $this->input->post('id_individu'),
      'nik' => $this->input->post('nik'),
      'nama' => $this->input->post('nama'),
      'id_program' => $this->input->post('id_program'),
      'id_subprogram' => $this->input->post('id_subprogram'),
      'info_bantuan' => $this->input->post('info_bantuan'),

      'asnaf' => $this->input->post('asnaf'),
      'status_tinggal' => "",
      'kasus' => "",
      'rekomendasi_bantuan' => "",
      'rencana_bantuan' => "",
      'mekanisme_bantuan' => "",
      'jumlah_bantuan' => str_replace(",", "", $this->input->post('jumlah_bantuan')),
      'jumlah_permohonan' => str_replace(",", "", $this->input->post('jumlah_permohonan')),
      'jenis_bantuan' => $this->input->post('jenis_bantuan'),
      'sifat_bantuan' => "",
      'bidang_tugas' => $this->input->post('bidang_tugas'),
      'profesi' => $this->input->post('profesi'),
      'kopentensi' => $this->input->post('kopentensi'),
      'sumber_dana'         => $this->input->post('sumber_dana'),
      'periode_bantuan'         => $this->input->post('periode_bantuan'),
      'total_periode'         => $this->input->post('total_periode'),

      'deleted_at'         => '0000-00-00 00:00:00',
      'created_by'         => $this->session->username
    );

    $where = $this->input->post('id_transaksi_individu');

    $this->Bsl_model->update($where, $data);

    write_log();
    $this->session->set_flashdata('message', '
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="alert alert-success">Data update succesfully</div>
          </div>
        </div>
      ');
    redirect('bsl/konselor/');
  }

  //----------------------- end bsl individu --------------------------//


  function create_action_komunitas()
  {

    // var_dump($this->input->post('unik'));die;

    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title'] = 'Tambah Manfaat Bsl';
    $this->data['header']     = $this->data['module'];
    $code  = $this->Bsl_model->autonumber();
    $number = 0;
    foreach ($this->input->post('Nama') as $key => $item_id) {
      $number += 1;
      $data = array(
        'id_trans_komunitas_h'  => $code,
        'nik'                   => "",
        'nama_det'                   => $this->input->post('unama')[$key],
        'jenispidana_pasal'     => $this->input->post('ujenispasal')[$key],
        'jenispidana_keterangan' => $this->input->post('uketerangan')[$key],
        'masahukuman'         => $this->input->post('umasahukuman')[$key],
        'blokkamar'          => $this->input->post('ublok')[$key],
        'jenis_kelamin '          => $this->input->post('ujk')[$key],
        'alamat'          => $this->input->post('ualamat')[$key]

      );
      $this->Bsl_model->insert_komunitasdetail($data);
    }
    $data = array(

      'id_komunitas'          => $this->input->post('id_komunitas'),
      'nik'                   => $this->input->post('nik'),
      'code'                  =>  $code,
      'nama'                  => $this->input->post('nama'),
      'id_program'            => $this->input->post('id_program'),
      'id_subprogram'         => $this->input->post('id_subprogram'),
      'info_bantuan'          => $this->input->post('info_bantuan'),
      'bentuk_manfaat'        => "",
      'asnaf'                 => $this->input->post('asnaf'),
      'jumlah_pm'             => $number,
      'rekomendasi_bantuan'   => "",
      'rencana_bantuan'       => "",
      'mekanisme_bantuan'     => "",
      // 'jumlah_permohonan'     => $this->input->post('jumlah_permohonan'),
      'jumlah_permohonan'     => "0",
      'jumlah_bantuan'     => $this->input->post('jumlah_bantuan'),
      'jenis_bantuan'         => $this->input->post('jenis_bantuan'),
      'sifat_bantuan'         => "",
      'sumber_dana'         => $this->input->post('sumber_dana'),
      'total_periode' => $this->input->post('total_periode'),
      'periode_bantuan' => $this->input->post('periode_bantuan'),
      'deleted_at'            => '0000-00-00 00:00:00',
      'created_by'            => $this->session->username
    );

    $this->Bsl_model->insert_komunitas($data);
    write_log();
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
    redirect(base_url('bsl/konselor'));
  }

  function update_komunitas($id)
  {
    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }
    // var_dump($this->Bsl_model->get_transaksi_komunitasdetail_update($id));die;
    $this->data['page_title']  = 'Update Data ' . $this->data['module'];
    $this->data['update_action_komunitas'] = 'bsl/update_action_komunitas';

    $this->data['data']          = $this->Bsl_model->get_transaksi_komunitas_update($id);
    $this->data['detail']          = $this->Bsl_model->get_transaksi_komunitasdetail_update($id);
    $this->data['komunitas']     = $this->Bsl_model->get_data_komunitas();
    $this->data['program']       = $this->Bsl_model->get_program();
    $this->data['rekomender']    = $this->Bsl_model->get_rekomender();
    $this->data['subprogram']    = $this->Bsl_model->get_sub_program();
    $this->data['jk'] = [
      'name'          => 'jk',
      'id'            => 'jk',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      // 'required'      => '',
      'value'         => $this->form_validation->set_value('jk'),
    ];
    $this->data['jk_value'] = [
      ''              => 'Tidak ada keterangan',
      'L'             => 'Laki-laki',
      'P'             => 'Perempuan',
    ];
    if ($this->data['data']) {
      $this->load->view('back/bsl/konselor/konselor_edit_komunitas', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('bsl/konselor/');
    }
  }

  function update_action_komunitas()
  {
    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title'] = 'Edit BSL';
    $this->data['header']     = $this->data['module'];
    $jml = 1;
    foreach ($this->input->post('Nama') as $key => $item_id) {
      $jml  += 1;
      $iddet =  $this->input->post('uid')[$key];
      $delete = $this->Bsl_model->get_by_id_detail($iddet);
      if ($delete) {
        $this->Bsl_model->deletedetail($iddet);
      }
      $data = array(
        'id_trans_komunitas_h'  => $iddet,
        'nik'                   => "",
        'nama_det'                   => $this->input->post('unama')[$key],
        'jenispidana_pasal'     => $this->input->post('ujenispasal')[$key],
        'jenispidana_keterangan' => $this->input->post('uketerangan')[$key],
        'masahukuman'         => $this->input->post('umasahukuman')[$key],
        'blokkamar'          => $this->input->post('ublok')[$key],
        'jenis_kelamin '          => $this->input->post('jk')[$key],
        'alamat'          => $this->input->post('det_alamat')[$key]

      );
      $this->Bsl_model->insert_komunitasdetail($data);
    }
    $data = array(
      'id_komunitas'          => $this->input->post('id_komunitas'),
      'nik'                   => $this->input->post('nik'),
      'code'                  =>  $iddet,
      'nama'                  => $this->input->post('nama'),
      'id_program'            => $this->input->post('id_program'),
      'id_subprogram'         => $this->input->post('id_subprogram'),
      'info_bantuan'          => $this->input->post('info_bantuan'),
      'bentuk_manfaat'        => "",
      'asnaf'                 => $this->input->post('asnaf'),
      'jumlah_pm'             => $jml,
      'rekomendasi_bantuan'   => "",
      'rencana_bantuan'       => "",
      'mekanisme_bantuan'     => "",
      'jumlah_permohonan'     => $this->input->post('jumlah_permohonan'),
      'jenis_bantuan'         => $this->input->post('jenis_bantuan'),
      'sifat_bantuan'         => "",
      'sumber_dana'         => $this->input->post('sumber_dana'),
      'total_periode' => $this->input->post('total_periode'),
      'periode_bantuan' => $this->input->post('periode'),
      'deleted_at'            => '0000-00-00 00:00:00',
      'created_by'            => $this->session->username
    );

    $where = $this->input->post('id_transaksi_komunitas');

    $this->Bsl_model->update_komunitas($where, $data);

    write_log();
    $this->session->set_flashdata('message', '
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="alert alert-success">Data update succesfully</div>
          </div>
        </div>
      ');
    redirect('bsl/konselor/');
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
    $this->data['get_all_provinsi']  = $this->Bsl_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Bsl_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Bsl_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Bsl_model->get_all_kelurahan();
    $this->data['penduduk']          = $this->Bsl_model->get_penduduk($id);


    $this->data['data_individu']     = $this->Bsl_model->get_transaksi_individu_by_id($id);
    $this->data['data_komunitas']    = $this->Bsl_model->get_transaksi_komunitas_by_id($id);
    $this->data['detail_individu']   = $this->Bsl_model->get_detail_individu_by_id($id);
    $this->data['detail_komunitas']  = $this->Bsl_model->get_detail_komunitas_by_id($id);

    $data['path'] = base_url('assets');
    $this->load->view('back/bsl/konselor/konselor_detail', $this->data);
  }

  function delete($id)
  {
    is_login();
    is_delete();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->Bsl_model->get_by_id($id);

    if ($delete) {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Bsl_model->soft_delete($id, $data);

      // $this->write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('bsl/konselor');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('bsl/konselor');
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

    $delete = $this->Bsl_model->delete_transaksi_individu_by_id($id);

    if ($delete) {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Bsl_model->soft_delete($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('bsl/konselor/');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('bsl/konselor');
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

    $delete = $this->Bsl_model->get_by_id_komunitas($id);

    if ($delete) {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Bsl_model->soft_delete_komunitas($id, $data);

      // $this->write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');

      redirect('bsl/konselor');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('bsl/konselor');
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

    $delete = $this->Bsl_model->get_by_id($id);

    if ($delete) {
      $this->Bsl_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('bsl/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('bsl/deleted_list');
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

    $delete = $this->Bsl_model->delete_transaksi_komunitas_by_id($id);

    if ($delete) {
      $this->Bsl_model->delete_komunitas($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('bsl/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('bsl/deleted_list');
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

    $this->data['komunitas'] = $this->Bsl_model->get_all_deleted_komunitas();
    $this->data['individu']  = $this->Bsl_model->get_all_deleted_individu();
    $this->data['umur'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $umur = $this->data['individu'][$i]->tgl_lahir;
      $res_umur = $this->hitung_umur($umur);
      array_push($this->data['umur'], $res_umur);
    }

    $this->load->view('back/bsl/individu_deleted_list', $this->data);
  }

  function restore_individu($id)
  {
    is_login();
    is_restore();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $row = $this->Bsl_model->get_by_id($id);

    if ($row) {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Bsl_model->update($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('bsl/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('bsl/deleted_list');
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

    $row = $this->Bsl_model->delete_transaksi_komunitas_by_id($id);

    if ($row) {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Bsl_model->update_komunitas($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('bsl/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('bsl/deleted_list');
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

    $this->data['page_title']        = 'Data ' . $this->data['module'];
    $this->data['header']            = 'Laporan Konselor';
    $this->data['get_all_provinsi']  = $this->Bsl_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Bsl_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Bsl_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Bsl_model->get_all_kelurahan();
    $this->data['individu']          = $this->Bsl_model->get_all_admin_individu();
    $this->data['komunitas']         = $this->Bsl_model->get_laporan_komunitas();

    //sql jumlah provinsi pada program bsl
    $sql_provinsi = "SELECT `penduduk`.`id_provinsi` AS `provinsi`
     FROM  `transaksi_individu`
     LEFT JOIN `penduduk`
     ON `penduduk`.`nik` = `transaksi_individu`.`nik`
     LEFT JOIN `provinsi`
     ON `penduduk`.`id_provinsi` = `provinsi`.`id_provinsi`
     WHERE `transaksi_individu`.`id_program` = 8";
    $res_sql_provinsi = $this->db->query($sql_provinsi)->result_array();
    $arr_prov = [];
    for ($i = 0; $i < count($res_sql_provinsi); $i++) {
      array_push($arr_prov, $res_sql_provinsi[$i]['provinsi']);
    }
    $prov_unique = array_unique($arr_prov);
    $this->data['total_provinsi'] = count($prov_unique);
    //sql jumlah kota pada program PKM
    $sql_kab_kota = "SELECT `penduduk`.`id_kota_kab` AS `kab_kota`, `transaksi_individu`.`jumlah_bantuan` AS `jumlah_bantuan`
    FROM  `transaksi_individu`
    LEFT JOIN `penduduk`
    ON `penduduk`.`nik` = `transaksi_individu`.`nik`
    LEFT JOIN `kota_kab`
    ON `penduduk`.`id_kota_kab` = `kota_kab`.`id_kota_kab`
    WHERE `transaksi_individu`.`id_program` = 8";
    $res_sql_kab_kota = $this->db->query($sql_kab_kota)->result_array();
    $arr_kab_kota = [];
    $jumlah_bantuan = 0;
    for ($i = 0; $i < count($res_sql_kab_kota); $i++) {
      array_push($arr_kab_kota, $res_sql_kab_kota[$i]['kab_kota']);
      $jumlah_bantuan += (int)$res_sql_kab_kota[$i]['jumlah_bantuan'];
    }
    $kab_kota_unique = array_unique($arr_kab_kota);
    $this->data['total_kab_kota'] = count($kab_kota_unique);
    $this->data['total_pm'] = count($arr_kab_kota);
    $this->data['total_jumlah_bantuan'] = $jumlah_bantuan;

    //sql JENIS KELAMIN pada program BRP
    $sql_jk = "SELECT `penduduk`.`jk` AS `jk`,
     `transaksi_individu`.`jumlah_bantuan` AS `jumlah_bantuan`
     FROM  `transaksi_individu`
     LEFT JOIN `penduduk`
     ON `penduduk`.`nik` = `transaksi_individu`.`nik`
     WHERE `transaksi_individu`.`id_program` = 8";
    $res_sql_jk = $this->db->query($sql_jk)->result_array();

    $arr_jk = [];
    for ($i = 0; $i < count($res_sql_jk); $i++) {
      $data_jk = [
        "jumlah_pm" => 1,
        "jk" =>  $res_sql_jk[$i]['jk'],
        "jumlah_bantuan" => $res_sql_jk[$i]['jumlah_bantuan']
      ];
      array_push($arr_jk, $data_jk);
    }

    $unique_jk = array();
    foreach ($arr_jk as $vals) {
      if (array_key_exists($vals['jk'], $unique_jk)) {
        $unique_jk[$vals['jk']]['jumlah_bantuan'] += $vals['jumlah_bantuan'];
        $unique_jk[$vals['jk']]['jumlah_pm'] += $vals['jumlah_pm'];
      } else {
        $unique_jk[$vals['jk']] = $vals;
      }
    }
    $this->data['total_jk'] = $unique_jk;

    //REKAP BERDSASARKAN KASUS BSL///////
    $sql_kasus = "SELECT `transaksi_komunitas_d`.`jenispidana_pasal` AS `jenis_pidana`
     FROM  `transaksi_komunitas`
     LEFT JOIN `transaksi_komunitas_d`
     ON `transaksi_komunitas`.`code` = `transaksi_komunitas_d`.`id_trans_komunitas_h`
     WHERE `transaksi_komunitas`.`id_program` = 8";
    $res_sql_kasus = $this->db->query($sql_kasus)->result_array();

    $arr_kasus = [];
    for ($i = 0; $i < count($res_sql_kasus); $i++) {
      $data_kasus = [
        "jumlah_wbp" => 1,
        "jenis_pidana" =>  $res_sql_kasus[$i]['jenis_pidana']
      ];
      array_push($arr_kasus, $data_kasus);
    }

    $unique_kasus = array();
    foreach ($arr_kasus as $vals) {
      if (array_key_exists($vals['jenis_pidana'], $unique_kasus)) {
        $unique_kasus[$vals['jenis_pidana']]['jumlah_wbp'] += $vals['jumlah_wbp'];
      } else {
        $unique_kasus[$vals['jenis_pidana']] = $vals;
      }
    }
    $this->data['total_kasus'] = $unique_kasus;

    //REKAP BERDSASARKAN Petugas Bimroh BSL///////
    $sql_lapas = "SELECT `komunitas`.`nama_komunitas` AS `lapas`
     FROM  `transaksi_komunitas`
     LEFT JOIN `transaksi_komunitas_d`
     ON `transaksi_komunitas`.`code` = `transaksi_komunitas_d`.`id_trans_komunitas_h`
     LEFT JOIN `komunitas`
     ON `transaksi_komunitas`.`id_komunitas` = `komunitas`.`id_komunitas`
     WHERE `transaksi_komunitas`.`id_program` = 8";
    $res_sql_lapas = $this->db->query($sql_lapas)->result_array();

    $arr_lapas = [];
    for ($i = 0; $i < count($res_sql_lapas); $i++) {
      $data_lapas = [
        "jumlah_wbp" => 1,
        "lapas" =>  $res_sql_lapas[$i]['lapas']
      ];
      array_push($arr_lapas, $data_lapas);
    }

    $unique_lapas = array();
    foreach ($arr_lapas as $vals) {
      if (array_key_exists($vals['lapas'], $unique_lapas)) {
        $unique_lapas[$vals['lapas']]['jumlah_wbp'] += $vals['jumlah_wbp'];
      } else {
        $unique_lapas[$vals['lapas']] = $vals;
      }
    }
    $this->data['total_lapas'] = $unique_lapas;

    //REKAP BERDSASARKAN LAPAS BSL///////
    $sql_lapas_jk = "SELECT `komunitas`.`nama_komunitas` AS `lapas`, `transaksi_komunitas_d`.`jenis_kelamin` AS `jenis_kelamin`
     FROM  `transaksi_komunitas`
     LEFT JOIN `transaksi_komunitas_d`
     ON `transaksi_komunitas`.`code` = `transaksi_komunitas_d`.`id_trans_komunitas_h`
     LEFT JOIN `komunitas`
     ON `transaksi_komunitas`.`id_komunitas` = `komunitas`.`id_komunitas`
     WHERE `transaksi_komunitas`.`id_program` = 8";
    $res_sql_lapas_jk = $this->db->query($sql_lapas_jk)->result_array();
    // var_dump($res_sql_lapas_jk);
    // die;
    $arr_lapas_jk = [];
    for ($i = 0; $i < count($res_sql_lapas_jk); $i++) {
      // var_dump($res_sql_lapas_jk[$i]['jenis_kelamin']);
      $data_lapas_jk = [
        "jumlah_wbp" => 1,
        "jenis_kelamin" =>  $res_sql_lapas_jk[$i]['jenis_kelamin'],
        "lapas" =>  $res_sql_lapas_jk[$i]['lapas']
      ];
      array_push($arr_lapas_jk, $data_lapas_jk);
    }

    $unique_lapas_jk = array();
    $jk_l = [];
    $jk_p = [];
    $jk_lain = [];
    foreach ($arr_lapas_jk as $vals) {
      if (array_key_exists($vals['lapas'], $unique_lapas_jk)) {

        $unique_lapas_jk[$vals['lapas']]['jumlah_wbp'] += $vals['jumlah_wbp'];
        if ($vals['jenis_kelamin'] == "L") {
          array_push($jk_l, $vals['jenis_kelamin']);
        } else if ($vals['jenis_kelamin'] == "P") {
          array_push($jk_p, $vals['jenis_kelamin']);
        } else {
          array_push($jk_lain, $vals['jenis_kelamin']);
        }

        $unique_lapas_jk[$vals['lapas']]['jk_l'] = count($jk_l);
        $unique_lapas_jk[$vals['lapas']]['jk_p'] = count($jk_p);
      } else {
        $unique_lapas_jk[$vals['lapas']] = $vals;
        $unique_lapas_jk[$vals['lapas']]['jk_l'] = count($jk_l);
        $unique_lapas_jk[$vals['lapas']]['jk_p'] = count($jk_p);
      }
    }
    $this->data['total_lapas_jk'] = $unique_lapas_jk;
    // var_dump($this->data['total_lapas_jk']);
    // die;
    $data['path'] = base_url('assets');
    $this->load->view('back/bsl/laporan/konselor', $this->data);
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
    $this->data['header']            = 'Laporan Admin';
    $this->data['get_all_provinsi']  = $this->Bsl_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Bsl_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Bsl_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Bsl_model->get_all_kelurahan();
    $this->data['individu']          = $this->Bsl_model->get_all_admin_individu();
    $this->data['umur'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $umur = $this->data['individu'][$i]->tgl_lahir;
      $res_umur = $this->hitung_umur($umur);
      array_push($this->data['umur'], $res_umur);
    }
    $this->data['komunitas']         = $this->Bsl_model->get_laporan_komunitas();

    $data['path'] = base_url('assets');
    $this->load->view('back/bsl/laporan/admin', $this->data);
  }

  function hitung_umur($tanggal_lahir)
  {
    $birthDate = new DateTime($tanggal_lahir);
    $today = new DateTime("today");
    if ($birthDate > $today) {
      return "0 tahun 0 bulan 0 hari";
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

    $this->data['get_all']      = $this->Bsl_model->get_laporan_individu_detail($id);

    if ($this->data['get_all']) {
      $this->data['page_title'] = 'Detail Data ' . $this->data['module'];
      $this->load->view('back/bsl/laporan/detail_laporan_individu', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('bsl/konselor');
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

    $this->data['get_all']      = $this->Bsl_model->get_laporan_komunitas_detail($id);

    if ($this->data['get_all']) {
      $this->data['page_title'] = 'Detail Data ' . $this->data['module'];
      $this->load->view('back/bsl/laporan/detail_laporan_komunitas', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('bsl/konselor');
    }
  }
}
