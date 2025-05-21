<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Darling extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    date_default_timezone_set('Asia/Jakarta');
    $this->data['module'] = 'Darling';

    $this->load->model(array('Darling_model'));

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
    $this->data['add_action'] = base_url('lamustaindividu/create');
  }

  function konselor()
  {
    //
    is_login();
    is_read();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title'] = $this->data['module'] . ' List';
    $this->data['header']     = $this->data['module'];
    $this->data['get_all_provinsi']  = $this->Darling_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Darling_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Darling_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Darling_model->get_all_kelurahan();
    $this->data['konselor']          = $this->Darling_model->get_all_individu();
    $this->data['individu']          = $this->Darling_model->get_all_admin_individu();
    $this->data['umur'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $umur = $this->data['individu'][$i]->tgl_lahir;
      $res_umur = $this->hitung_umur($umur);
      array_push($this->data['umur'], $res_umur);
    }
    $this->data['komunitas']         = $this->Darling_model->get_laporan_komunitas();
    $data['path'] = base_url('assets');
    $this->load->view('back/darling/konselor/konselor_list', $this->data);
  }

  function create($id)
  {
    is_login();
    is_create();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title']       = 'Create New Manfaat Darling';
    $this->data['header']           =  $this->data['module'];
    $this->data['action_individu']  = 'darling/create_action_individu';
    $this->data['action_komunitas'] = 'darling/create_action_komunitas';

    $this->data['data']             = $this->Darling_model->get_data_individu($id);
    // $this->data['komunitas']        = $this->Darling_model->get_data_komunitas($id);
    $this->data['komunitas']        = $this->Darling_model->get_data_komunitas_by_program();
    $this->data['program']          = $this->Darling_model->get_program();
    $this->data['subprogram']       = $this->Darling_model->get_sub_program();
    $this->data['cek_individu']     = $this->Darling_model->check_transaksi_individu_by_id($id);
    $this->data['cek_komunitas']    = $this->Darling_model->check_transaksi_komunitas_by_id($id);
    $this->data['notif_individu']   = $this->Darling_model->get_transaksi_individu_by_date($id);
    $this->data['notif_komunitas']  = $this->Darling_model->get_transaksi_komunitas_by_date($id);
    $this->data['rekomender']       = $this->Darling_model->get_rekomender();
    $this->data['datapenduduk']       = $this->Darling_model->get_datapenduduk();

    // var_dump($this->Darling_model->get_datapenduduk());die;
    $this->load->view('back/darling/konselor/konselor_add', $this->data);
  }

  function create_action_individu()
  {
    $data = array(
      'id_individu' => $this->input->post('id_individu'),
      'nik' => $this->input->post('nik'),
      'nama' => $this->input->post('nama'),
      'id_program' => $this->input->post('id_program'),
      'id_subprogram' => $this->input->post('id_subprogram'),
      'info_bantuan' => $this->input->post('info_bantuan'),

      'asnaf' => $this->input->post('asnaf'),

      'kasus' => "",
      'rekomendasi_bantuan' => "",
      'rencana_bantuan' => "",
      'mekanisme_bantuan' => "",

      'jumlah_bantuan' => str_replace(",", "", $this->input->post('jumlah_bantuan')),
      'jenis_bantuan' => $this->input->post('jenis_bantuan'),
      'total_periode' => $this->input->post('total_periode'),
      'periode_bantuan' => $this->input->post('periode_bantuan'),
      'sumber_dana' => $this->input->post('sumber_dana'),
      'penghasilan_bulan' => $this->input->post('penghasilan_bulan'),
      'deleted_at'         => '0000-00-00 00:00:00',
      'created_at'         => date('Y-m-d H:i:s'),
      'created_by'         => $this->session->username
    );

    $this->Darling_model->insert($data);
    write_log();
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
    redirect(base_url('darling/konselor'));
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
    $this->data['update_action_individu'] = 'darling/update_action_individu';

    $this->data['data']        = $this->Darling_model->get_transaksi_individu_update($id);
    $this->data['rekomender']  = $this->Darling_model->get_rekomender();
    $this->data['subprogram']  = $this->Darling_model->get_sub_program();

    if ($this->data['data']) {
      $this->load->view('back/darling/konselor/konselor_edit_individu', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('darling/konselor/');
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

      'kasus' => "",
      'rekomendasi_bantuan' => "",
      'rencana_bantuan' => "",
      'mekanisme_bantuan' => "",

      'jumlah_bantuan' => str_replace(",", "", $this->input->post('jumlah_bantuan')),
      'jenis_bantuan' => $this->input->post('jenis_bantuan'),
      'total_periode' => $this->input->post('total_periode'),
      'periode_bantuan' => $this->input->post('periode_bantuan'),
      'sumber_dana' => $this->input->post('sumber_dana'),
      'penghasilan_bulan' => $this->input->post('penghasilan_bulan'),

      'deleted_at'         => '0000-00-00 00:00:00',
      'created_by'         => $this->session->username
    );

    $where = $this->input->post('id_transaksi_individu');

    $this->Darling_model->update($where, $data);

    write_log();
    $this->session->set_flashdata('message', '
      <div class="row mt-3">
      <div class="col-md-12">
      <div class="alert alert-success">Data update succesfully</div>
      </div>
      </div>
      ');
    redirect('darling/konselor/');
  }

  //----------------------- end lamusta individu --------------------------//


  function create_action_komunitas()
  {

    // var_dump($this->input->post('unik'));die;

    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title'] = 'Tambah Manfaat Darling';
    $this->data['header']     = $this->data['module'];
    $code  = $this->Darling_model->autonumber();
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
      'jumlah_pm'             => $this->input->post('jumlah_pm'),
      'rekomendasi_bantuan'   => "",
      'rencana_bantuan'       => "",
      'mekanisme_bantuan'     => "",
      'jumlah_permohonan'     => str_replace(",", "", $this->input->post('jumlah_permohonan')),

      'sifat_bantuan'         => "",
      'periode_bantuan'         => $this->input->post('periode_bantuan'),
      'jenis_bantuan'         => $this->input->post('jenis_bantuan'),
      'total_periode'         => $this->input->post('total_periode'),
      'sumber_dana' =>        $this->input->post('det_sumber_dana'),
      'deleted_at'            => '0000-00-00 00:00:00',
      'created_at'         => date('Y-m-d H:i:s'),
      'created_by'            => $this->session->username
    );

    $this->Darling_model->insert_komunitas($data);

    write_log();
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
    redirect(base_url('darling/konselor'));
  }

  function update_komunitas($id)
  {
    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }
    // var_dump($this->Darling_model->get_transaksi_komunitasdetail_update($id));die;
    $this->data['page_title']  = 'Update Data ' . $this->data['module'];
    $this->data['update_action_komunitas'] = 'darling/update_action_komunitas';

    $this->data['data']          = $this->Darling_model->get_transaksi_komunitas_update($id);
    $this->data['detail']          = $this->Darling_model->get_transaksi_komunitasdetail_update($id);
    $this->data['komunitas']     = $this->Darling_model->get_data_komunitas();
    $this->data['program']       = $this->Darling_model->get_program();
    $this->data['rekomender']    = $this->Darling_model->get_rekomender();
    $this->data['subprogram']    = $this->Darling_model->get_sub_program();

    if ($this->data['data']) {
      $this->load->view('back/darling/konselor/konselor_edit_komunitas', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('darling/konselor/');
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

    $this->data['page_title'] = 'Edit Manfaat Darling';
    $this->data['header']     = $this->data['module'];

    $data = array(
      'id_komunitas'          => $this->input->post('id_komunitas'),
      'nik'                   => $this->input->post('nik'),
      // 'code'                  =>  $this->input->post('nik') ,
      'nama'                  => $this->input->post('nama'),
      'id_program'            => $this->input->post('id_program'),
      'id_subprogram'         => $this->input->post('id_subprogram'),
      'info_bantuan'          => $this->input->post('info_bantuan'),
      'bentuk_manfaat'        => "",
      'asnaf'                 => $this->input->post('asnaf'),
      'jumlah_pm'             => $this->input->post('jumlah_pm'),
      'rekomendasi_bantuan'   => "",
      'rencana_bantuan'       => "",
      'mekanisme_bantuan'     => "",
      'jumlah_permohonan'     => str_replace(",", "", $this->input->post('jumlah_permohonan')),
      'jenis_bantuan'         => "",
      'sifat_bantuan'         => "",
      'periode_bantuan'         => $this->input->post('periode_bantuan'),
      'jenis_bantuan'         => $this->input->post('jenis_bantuan'),
      'total_periode'         => $this->input->post('total_periode'),
      'sumber_dana' => $this->input->post('det_sumber_dana'),
      'deleted_at'            => '0000-00-00 00:00:00',
      'created_by'            => $this->session->username
    );

    $where = $this->input->post('id_transaksi_komunitas');

    $this->Darling_model->update_komunitas($where, $data);

    write_log();
    $this->session->set_flashdata('message', '
      <div class="row mt-3">
      <div class="col-md-12">
      <div class="alert alert-success">Data update succesfully</div>
      </div>
      </div>
      ');
    redirect('darling/konselor/');
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
    $this->data['get_all_provinsi']  = $this->Darling_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Darling_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Darling_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Darling_model->get_all_kelurahan();
    $this->data['penduduk']          = $this->Darling_model->get_penduduk($id);


    $this->data['data_individu']     = $this->Darling_model->get_transaksi_individu_by_id($id);
    $this->data['data_komunitas']    = $this->Darling_model->get_transaksi_komunitas_by_id($id);
    $this->data['detail_individu']   = $this->Darling_model->get_detail_individu_by_id($id);
    $this->data['detail_komunitas']  = $this->Darling_model->get_detail_komunitas_by_id($id);

    $data['path'] = base_url('assets');
    $this->load->view('back/darling/konselor/konselor_detail', $this->data);
  }
  function delete_komunitas($id)
  {
    is_login();
    is_delete();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->Darling_model->delete_transaksi_komunitas_by_id($id);

    if ($delete) {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Darling_model->soft_delete_komunitas($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('darling/konselor');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('darling/konselor');
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

    $delete = $this->Darling_model->delete_transaksi_individu_by_id($id);

    if ($delete) {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Darling_model->soft_delete($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('darling/konselor');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('darling/konselor');
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

    $delete = $this->Darling_model->get_by_id($id);

    if ($delete) {
      $this->Darling_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('darling/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('darling/deleted_list');
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

    $delete = $this->Darling_model->delete_transaksi_komunitas_by_id($id);

    if ($delete) {
      $this->Darling_model->delete_permanent($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('darling/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('darling/deleted_list');
    }
  }

  function delete($id)
  {
    is_login();
    is_delete();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->Darling_model->get_by_id($id);

    if ($delete) {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Darling_model->soft_delete($id, $data);

      // $this->write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('darling');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('darling/konselor');
    }
  }


  function delete_permanent($id)
  {
    is_login();
    is_delete();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->Darling_model->get_by_id($id);

    if ($delete) {
      $this->Darling_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('darling/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('darling/deleted_list');
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
    $this->data['komunitas'] = $this->Darling_model->get_all_deleted_komunitas();
    $this->data['individu']  = $this->Darling_model->get_all_deleted_individu();
    $this->data['umur'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $umur = $this->data['individu'][$i]->tgl_lahir;
      $res_umur = $this->hitung_umur($umur);
      array_push($this->data['umur'], $res_umur);
    }
    $data['path'] = base_url('assets');
    $this->load->view('back/darling/individu_deleted_list', $this->data);
  }

  function restore_komunitas($id)
  {
    is_login();
    is_restore();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $row = $this->Darling_model->delete_transaksi_komunitas_by_id($id);

    if ($row) {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Darling_model->update_komunitas($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('darling/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('darling/deleted_list');
    }
  }

  function restore_individu($id)
  {
    is_login();
    is_restore();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $row = $this->Darling_model->get_by_id($id);

    if ($row) {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Darling_model->update($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('darling/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('darling/deleted_list');
    }
  }
  //------------------------[ Lamusta Laporan Konselor ]-----------------------------//

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
    $this->data['get_all_provinsi']  = $this->Darling_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Darling_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Darling_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Darling_model->get_all_kelurahan();
    $this->data['individu']          = $this->Darling_model->get_all_admin_individu();
    $this->data['komunitas']         = $this->Darling_model->get_laporan_komunitas();

    //sql jumlah provinsi pada program ytb
    $sql_provinsi = "SELECT `penduduk`.`id_provinsi` AS `provinsi`
        FROM  `transaksi_individu`
        LEFT JOIN `penduduk`
        ON `penduduk`.`nik` = `transaksi_individu`.`nik`
        LEFT JOIN `provinsi`
        ON `penduduk`.`id_provinsi` = `provinsi`.`id_provinsi`
        WHERE `transaksi_individu`.`id_program` = 3
        AND `transaksi_individu`.`is_delete` = 0";
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
     WHERE `transaksi_individu`.`id_program` = 3
     AND `transaksi_individu`.`is_delete` = 0";
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

    //REKAP KOMUNITAS
    //sql jumlah provinsi pada program ytb
    $sql_provinsi_komunitas = "SELECT `penduduk`.`id_provinsi` AS `provinsi`
     FROM  `transaksi_komunitas`
     LEFT JOIN `penduduk`
     ON `penduduk`.`nik` = `transaksi_komunitas`.`nik`
     LEFT JOIN `provinsi`
     ON `penduduk`.`id_provinsi` = `provinsi`.`id_provinsi`
     WHERE `transaksi_komunitas`.`id_program` = 3
     AND `transaksi_komunitas`.`is_delete` = 0";
    $res_sql_provinsi_komunitas = $this->db->query($sql_provinsi_komunitas)->result_array();
    $arr_prov_komunitas = [];
    for ($i = 0; $i < count($res_sql_provinsi_komunitas); $i++) {
      array_push($arr_prov_komunitas, $res_sql_provinsi_komunitas[$i]['provinsi']);
    }
    $prov_unique_komunitas = array_unique($arr_prov_komunitas);
    $this->data['total_provinsi_komunitas'] = count($prov_unique_komunitas);

    $sql_kab_kota_komunitas = "SELECT `penduduk`.`id_kota_kab` AS `kab_kota`, `transaksi_komunitas`.`jumlah_bantuan` AS `jumlah_bantuan`, `transaksi_komunitas`.`jumlah_pm` AS `jumlah_pm_komunitas`
    FROM  `transaksi_komunitas`
    LEFT JOIN `penduduk`
    ON `penduduk`.`nik` = `transaksi_komunitas`.`nik`
    LEFT JOIN `kota_kab`
    ON `penduduk`.`id_kota_kab` = `kota_kab`.`id_kota_kab`
    WHERE `transaksi_komunitas`.`id_program` = 3
    AND `transaksi_komunitas`.`is_delete` = 0";
    $res_sql_kab_kota_komunitas = $this->db->query($sql_kab_kota_komunitas)->result_array();
    $arr_kab_kota_komunitas = [];
    $jumlah_bantuan_komunitas = 0;
    $jumlah_pm_komunitas = 0;
    for ($i = 0; $i < count($res_sql_kab_kota_komunitas); $i++) {
      array_push($arr_kab_kota_komunitas, $res_sql_kab_kota_komunitas[$i]['kab_kota']);
      $jumlah_bantuan_komunitas += (int)$res_sql_kab_kota_komunitas[$i]['jumlah_bantuan'];
      $jumlah_pm_komunitas += (int)$res_sql_kab_kota_komunitas[$i]['jumlah_pm_komunitas'];
    }
    $kab_kota_unique_komunitas = array_unique($arr_kab_kota_komunitas);
    $this->data['total_kab_kota_komunitas'] = count($kab_kota_unique_komunitas);
    $this->data['total_pm_komunitas'] = $jumlah_pm_komunitas;
    $this->data['total_jumlah_bantuan_komunitas'] = $jumlah_bantuan_komunitas;

    //sql jumlah sub_program KOMUNITAS pada program DARLING
    $sql_sub_program = "SELECT
     `sub_program`.`nama_subprogram` AS `sub_program`,
     `sub_program`.`id_subprogram` AS `id_subprogram`,
     `transaksi_komunitas`.`jumlah_bantuan` AS `jumlah_bantuan`
     FROM  `transaksi_komunitas`
     LEFT JOIN `sub_program`
     ON `transaksi_komunitas`.`id_subprogram` = `sub_program`.`id_subprogram`
     WHERE `transaksi_komunitas`.`id_program` = 3
     AND `transaksi_komunitas`.`is_delete` = 0";
    $res_sql_sub_program = $this->db->query($sql_sub_program)->result_array();

    $arr_sub_program = [];
    for ($i = 0; $i < count($res_sql_sub_program); $i++) {
      $data_sub_program = [
        "jumlah_pm" => 1,
        "id_subprogram" =>  $res_sql_sub_program[$i]['id_subprogram'],
        "sub_program" =>  $res_sql_sub_program[$i]['sub_program'],
        "jumlah_bantuan" => $res_sql_sub_program[$i]['jumlah_bantuan']
      ];
      array_push($arr_sub_program, $data_sub_program);
    }

    $unique_subprogram = array();
    foreach ($arr_sub_program as $vals) {
      if (array_key_exists($vals['id_subprogram'], $unique_subprogram)) {
        $unique_subprogram[$vals['id_subprogram']]['jumlah_bantuan'] += $vals['jumlah_bantuan'];
        $unique_subprogram[$vals['id_subprogram']]['jumlah_pm'] += $vals['jumlah_pm'];
      } else {
        $unique_subprogram[$vals['id_subprogram']] = $vals;
      }
    }
    $this->data['total_sub_program'] = $unique_subprogram;

    $data['path'] = base_url('assets');
    $this->load->view('back/darling/laporan/konselor', $this->data);
  }
  //------------------------[ Lamusta Laporan Admin         ]-----------------------------//

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
    $this->data['get_all_provinsi']  = $this->Darling_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Darling_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Darling_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Darling_model->get_all_kelurahan();
    $this->data['individu']          = $this->Darling_model->get_all_admin_individu();
    $this->data['umur'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $umur = $this->data['individu'][$i]->tgl_lahir;
      $res_umur = $this->hitung_umur($umur);
      array_push($this->data['umur'], $res_umur);
    }
    $this->data['komunitas']         = $this->Darling_model->get_laporan_komunitas();
    // var_dump($this->data);die;
    $data['path'] = base_url('assets');
    $this->load->view('back/darling/laporan/admin', $this->data);
  }

  //------------------------[ Lamusta Laporan Kasir ]-----------------------------//

  function laporan_kasir()
  {
    is_login();
    is_read();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title']        = 'Data ' . $this->data['module'];
    $this->data['header']            = 'Laporan Kasir';
    $this->data['get_all_provinsi']  = $this->Darling_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Darling_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Darling_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Darling_model->get_all_kelurahan();
    $this->data['individu']          = $this->Darling_model->get_all_admin_individu();
    $this->data['komunitas']         = $this->Darling_model->get_laporan_komunitas();

    $data['path'] = base_url('assets');
    $this->load->view('back/darling/laporan/kasir', $this->data);
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

    $this->data['get_all']      = $this->Darling_model->get_laporan_individu_detail($id);

    if ($this->data['get_all']) {
      $this->data['page_title'] = 'Detail Data ' . $this->data['module'];
      $this->load->view('back/darling/laporan/detail_laporan_individu', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('darling/konselor');
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

    $this->data['get_all']      = $this->Darling_model->get_laporan_komunitas_detail($id);

    if ($this->data['get_all']) {
      $this->data['page_title'] = 'Detail Data ' . $this->data['module'];
      $this->load->view('back/darling/laporan/detail_laporan_komunitas', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('darling/konselor');
    }
  }
}
