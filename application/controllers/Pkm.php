<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Load library phpspreadsheet
require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet
class Pkm extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->data['module'] = 'PKM';
    $this->load->model(array('pkm_model'));
    $this->load->helper(array('url', 'html'));
    $this->load->database();

    date_default_timezone_set('Asia/Jakarta');
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
    $this->data['add_action'] = base_url('pkm/create');
  }

  function konselor()
  {
    is_login();
    is_read();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title']        = $this->data['module'] . ' List';
    $this->data['header']            = $this->data['module'];
    $this->data['konselor']          = $this->pkm_model->get_all_individu();
    $this->data['get_all_provinsi']  = $this->pkm_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->pkm_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->pkm_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->pkm_model->get_all_kelurahan();
    $this->data['individu']          = $this->pkm_model->get_all_admin_individu();

    $data['path'] = base_url('assets');
    $this->load->view('back/pkm/konselor/konselor_list', $this->data);
  }

  function create($id)
  {
    is_login();
    is_create();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }
    $this->data['page_title']       = 'Create New Manfaat PKM';
    $this->data['header']           =  $this->data['module'];
    $this->data['action_individu']  = 'pkm/create_action_individu';
    $this->data['action_komunitas'] = 'pkm/create_action_komunitas';

    $this->data['data']             = $this->pkm_model->get_data_individu($id);
    $this->data['komunitas']        = $this->pkm_model->get_data_komunitas($id);
    $this->data['program']           = $this->pkm_model->get_program();
    $this->data['subprogram']       = $this->pkm_model->get_sub_program();
    $this->data['cek_individu']     = $this->pkm_model->check_transaksi_individu_by_id($id);
    $this->data['cek_komunitas']    = $this->pkm_model->check_transaksi_komunitas_by_id($id);
    $this->data['notif_individu']   = $this->pkm_model->get_transaksi_individu_by_date($id);
    $this->data['notif_komunitas']  = $this->pkm_model->get_transaksi_komunitas_by_date($id);
    $this->data['rekomender']       = $this->pkm_model->get_rekomender();
    $this->data['datapenduduk']       = $this->pkm_model->get_datapenduduk();

    // var_dump($this->pkm_model->get_datapenduduk());die;
    $this->load->view('back/pkm/konselor/konselor_add', $this->data);
  }

  function create_action_individu()
  {
    $data = array(
      'id_individu'        => $this->input->post('id_individu'),
      'nik'                => $this->input->post('nik'),
      'nama'               => $this->input->post('nama'),
      'id_program'         => "2",
      'id_subprogram'      => $this->input->post('id_subprogram'),
      'info_bantuan'       => $this->input->post('info_bantuan'),

      'asnaf'              => $this->input->post('asnaf'),
      'status_tinggal'     => "",
      'kasus'              => "",
      'rekomendasi_bantuan' => "",
      'rencana_bantuan'    => "",
      'mekanisme_bantuan'  => "",
      'jumlah_bantuan'  => str_replace(",", "", $this->input->post('jumlah_bantuan')),
      'jenis_bantuan'      => $this->input->post('jenis_bantuan'),
      'sifat_bantuan'      => $this->input->post('sifat_bantuan'),
      'sumber_dana'         => $this->input->post('sumber_dana'),
      'periode_bantuan'         => $this->input->post('periode_bantuan'),
      'total_periode'         => $this->input->post('total_periode'),
      'penyalur'       => $this->input->post('penyalur'),
      'keterangan'       => $this->input->post('keterangan'),
      'kasus'       => $this->input->post('kasus'),
      'created_at'         => date('Y-m-d H:i:s'),
      'deleted_at'         => '0000-00-00 00:00:00',
      'created_by'         => $this->session->username
    );

    $this->pkm_model->insert($data);
    write_log();
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
    redirect(base_url('pkm/konselor'));
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
    $this->data['update_action_individu'] = 'pkm/update_action_individu';

    $this->data['data']        = $this->pkm_model->get_transaksi_individu_update($id);
    $this->data['rekomender']  = $this->pkm_model->get_rekomender();
    $this->data['subprogram']  = $this->pkm_model->get_sub_program();
    $this->data['program']           = $this->pkm_model->get_program();

    if ($this->data['data']) {
      $this->load->view('back/pkm/konselor/konselor_edit_individu', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('pkm/konselor/');
    }
  }

  function update_action_individu()
  {
    $data = array(
      'id_individu'        => $this->input->post('id_individu'),
      'nik'                => $this->input->post('nik'),
      'nama'               => $this->input->post('nama'),
      'id_program'         => "2",
      'id_subprogram'      => $this->input->post('id_subprogram'),
      'info_bantuan'       => $this->input->post('info_bantuan'),

      'asnaf'              => $this->input->post('asnaf'),
      'status_tinggal'     => "",
      'kasus'              => "",
      'rekomendasi_bantuan' => "",
      'rencana_bantuan'    => "",
      'mekanisme_bantuan'  => "",
      'jumlah_permohonan'  => str_replace(",", "", $this->input->post('jumlah_permohonan')),
      'jenis_bantuan'      => $this->input->post('jenis_bantuan'),
      'sifat_bantuan'      => $this->input->post('sifat_bantuan'),
      'sumber_dana'         => $this->input->post('sumber_dana'),
      'periode_bantuan'         => $this->input->post('periode_bantuan'),
      'total_periode'         => $this->input->post('total_periode'),
      'penyalur'       => $this->input->post('penyalur'),
      'keterangan'       => $this->input->post('keterangan'),

      'deleted_at'         => '0000-00-00 00:00:00',
      'created_by'         => $this->session->username
    );

    $where = $this->input->post('id_transaksi_individu');

    $this->pkm_model->update($where, $data);

    write_log();
    $this->session->set_flashdata('message', '
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="alert alert-success">Data pkm update succesfully</div>
          </div>
        </div>
      ');
    redirect('pkm/konselor/');
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

    $this->data['page_title'] = 'Tambah Manfaat Pkm';
    $this->data['header']     = $this->data['module'];

    $data = array(
      'id_komunitas'          => $this->input->post('id_komunitas'),
      'nik'                   => $this->input->post('nik'),
      'nama'                  => $this->input->post('nama'),
      'id_program'            => $this->input->post('id_program'),
      'id_subprogram'         => $this->input->post('id_subprogram'),
      'info_bantuan'          => $this->input->post('info_bantuan'),
      'bentuk_manfaat'        => $this->input->post('bentuk_manfaat'),
      'asnaf'                 => $this->input->post('asnaf'),
      'jumlah_pm'             => $this->input->post('jumlah_pm'),
      'rekomendasi_bantuan'   => $this->input->post('rekomendasi_bantuan'),
      'rencana_bantuan'       => $this->input->post('rencana_bantuan'),
      'mekanisme_bantuan'     => $this->input->post('mekanisme_bantuan'),
      'jumlah_permohonan'     => str_replace(",", "", $this->input->post('jumlah_permohonan')),
      'jenis_bantuan'         => $this->input->post('jenis_bantuan'),
      'sifat_bantuan'         => $this->input->post('sifat_bantuan'),
      'created_at'         => date('Y-m-d H:i:s'),
      'deleted_at'            => '0000-00-00 00:00:00',
      'created_by'            => $this->session->username
    );

    $this->pkm_model->insert_komunitas($data);

    foreach ($this->input->post('unik') as $key => $item_id) {
      $data = array(

        'id_trans_komunitas_h'  => $this->input->post('unik')[$key],
        'nik'                   => $this->input->post('unik')[$key],
        'jenispidana_pasal'     => $this->input->post('ujenispasal')[$key],
        'jenispidana_keterangan' => $this->input->post('uketerangan')[$key],
        'masahukuman'         => $this->input->post('umasahukuman')[$key],
        'blokkamar'          => $this->input->post('ublok')[$key]
      );
      $this->pkm_model->insert_komunitasdetail($data);
    }

    write_log();
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
    redirect(base_url('pkm/konselor'));
  }

  function update_komunitas($id)
  {
    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title']  = 'Update Data ' . $this->data['module'];
    $this->data['update_action_komunitas'] = 'lamusta/update_action_komunitas';

    $this->data['data']          = $this->pkm_model->get_transaksi_komunitas_update($id);
    $this->data['komunitas']     = $this->pkm_model->get_data_komunitas();
    $this->data['program']       = $this->pkm_model->get_program();
    $this->data['rekomender']    = $this->pkm_model->get_rekomender();
    $this->data['subprogram']    = $this->pkm_model->get_sub_program();

    if ($this->data['data']) {
      $this->load->view('back/pkm/konselor/konselor_edit_komunitas', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('pkm/konselor/');
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

    $this->data['page_title'] = 'Edit Manfaat Pkm';
    $this->data['header']     = $this->data['module'];

    $data = array(
      'id_komunitas'          => $this->input->post('id_komunitas'),
      'id_subprogram'         => $this->input->post('id_subprogram'),
      'info_bantuan'          => $this->input->post('info_bantuan'),
      'bentuk_manfaat'        => $this->input->post('bentuk_manfaat'),
      'asnaf'                 => $this->input->post('asnaf'),
      'jumlah_pm'             => $this->input->post('jumlah_pm'),
      'rekomendasi_bantuan'   => $this->input->post('rekomendasi_bantuan'),
      'rencana_bantuan'       => $this->input->post('rencana_bantuan'),
      'mekanisme_bantuan'     => $this->input->post('mekanisme_bantuan'),
      'jumlah_permohonan'     => str_replace(",", "", $this->input->post('jumlah_permohonan')),
      'jenis_bantuan'         => $this->input->post('jenis_bantuan'),
      'deleted_at'            => '0000-00-00 00:00:00'
    );

    $where = $this->input->post('id_transaksi_komunitas');

    $this->pkm_model->update_komunitas($where, $data);

    write_log();
    $this->session->set_flashdata('message', '
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="alert alert-success">Data update succesfully</div>
          </div>
        </div>
      ');
    redirect('pkm/konselor/');
  }

  function detail_konselor($id)
  {
    is_login();
    is_read();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title']        = 'Detail PKM';
    $this->data['header']            = $this->data['module'];
    $this->data['get_all_provinsi']  = $this->pkm_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->pkm_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->pkm_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->pkm_model->get_all_kelurahan();
    $this->data['penduduk']          = $this->pkm_model->get_penduduk($id);


    $this->data['data_individu']     = $this->pkm_model->get_transaksi_individu_by_id($id);
    $this->data['data_komunitas']    = $this->pkm_model->get_transaksi_komunitas_by_id($id);
    $this->data['detail_individu']   = $this->pkm_model->get_detail_individu_by_id($id);
    $this->data['detail_komunitas']  = $this->pkm_model->get_detail_komunitas_by_id($id);

    $data['path'] = base_url('assets');
    $this->load->view('back/pkm/konselor/konselor_detail', $this->data);
  }

  function delete($id)
  {
    is_login();
    is_delete();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->pkm_model->get_by_id($id);

    if ($delete) {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->pkm_model->soft_delete($id, $data);

      // $this->write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      // redirect('pkm');

      $this->data['page_title'] = $this->data['module'] . ' List';
      $this->data['header']     = $this->data['module'];
      $this->data['konselor']   = $this->pkm_model->get_all_individu();

      $data['path'] = base_url('assets');
      redirect('pkm/konselor/');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('pkm/konselor/');
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

    $delete = $this->pkm_model->get_by_id($id);

    if ($delete) {
      $this->pkm_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('pkm/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('pkm/deleted_list');
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

    $this->data['page_title']        = 'Deleted ' . $this->data['module'] . ' List';
    $this->data['get_all_deleted']   = $this->pkm_model->get_all_deleted();
    $this->data['get_all_provinsi']  = $this->pkm_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->pkm_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->pkm_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->pkm_model->get_all_kelurahan();
    $this->data['individu']          = $this->pkm_model->get_all_admin_individu();
    $this->load->view('back/pkm/individu_deleted_list', $this->data);
  }

  function restore($id)
  {
    is_login();
    is_restore();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $row = $this->pkm_model->get_by_id($id);

    if ($row) {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->pkm_model->update($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('pkm/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('pkm/deleted_list');
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
    $this->data['get_all_provinsi']  = $this->pkm_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->pkm_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->pkm_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->pkm_model->get_all_kelurahan();
    $this->data['individu']          = $this->pkm_model->get_all_admin_individu();

    //sql jumlah provinsi pada program PKM
    $sql_provinsi = "SELECT `penduduk`.`id_provinsi` AS `provinsi`
                     FROM  `transaksi_individu`
                     LEFT JOIN `penduduk`
                     ON `penduduk`.`nik` = `transaksi_individu`.`nik`
                     LEFT JOIN `provinsi`
                     ON `penduduk`.`id_provinsi` = `provinsi`.`id_provinsi`
                     WHERE `transaksi_individu`.`id_program` = 2
                     AND `transaksi_individu`.`is_delete` = 0";
    $res_sql_provinsi = $this->db->query($sql_provinsi)->result_array();
    $arr_prov = [];
    for ($i = 0; $i < count($res_sql_provinsi); $i++) {
      array_push($arr_prov, $res_sql_provinsi[$i]['provinsi']);
    }
    $prov_unique = array_unique($arr_prov);
    $this->data['total_provinsi'] = count($prov_unique);
    //sql jumlah kota pada program PKM
    $sql_kab_kota = "SELECT `penduduk`.`id_kota_kab` AS `kab_kota`
                     FROM  `transaksi_individu`
                     LEFT JOIN `penduduk`
                     ON `penduduk`.`nik` = `transaksi_individu`.`nik`
                     LEFT JOIN `kota_kab`
                     ON `penduduk`.`id_kota_kab` = `kota_kab`.`id_kota_kab`
                     WHERE `transaksi_individu`.`id_program` = 2
                     AND `transaksi_individu`.`is_delete` = 0";
    $res_sql_kab_kota = $this->db->query($sql_kab_kota)->result_array();
    $arr_kab_kota = [];
    for ($i = 0; $i < count($res_sql_kab_kota); $i++) {
      array_push($arr_kab_kota, $res_sql_kab_kota[$i]['kab_kota']);
    }
    $kab_kota_unique = array_unique($arr_kab_kota);
    $this->data['total_kab_kota'] = count($kab_kota_unique);
    //sql jumlah kecamatan pada program PKM
    $sql_kecamatan = "SELECT `penduduk`.`id_kecamatan` AS `kecamatan`
                     FROM  `transaksi_individu`
                     LEFT JOIN `penduduk`
                     ON `penduduk`.`nik` = `transaksi_individu`.`nik`
                     LEFT JOIN `kecamatan`
                     ON `penduduk`.`id_kecamatan` = `kecamatan`.`id_kecamatan`
                     WHERE `transaksi_individu`.`id_program` = 2
                     AND `transaksi_individu`.`is_delete` = 0";
    $res_sql_kecamatan = $this->db->query($sql_kecamatan)->result_array();
    $arr_kecamatan = [];
    for ($i = 0; $i < count($res_sql_kecamatan); $i++) {
      array_push($arr_kecamatan, $res_sql_kecamatan[$i]['kecamatan']);
    }
    $kecamatan_unique = array_unique($arr_kecamatan);
    $this->data['total_kecamatan'] = count($kecamatan_unique);
    //sql jumlah desa_kelurahan pada program PKM
    $sql_desa_kelurahan = "SELECT `penduduk`.`id_desa_kelurahan` AS `desa_kelurahan`
     FROM  `transaksi_individu`
     LEFT JOIN `penduduk`
     ON `penduduk`.`nik` = `transaksi_individu`.`nik`
     LEFT JOIN `desa_kelurahan`
     ON `penduduk`.`id_desa_kelurahan` = `desa_kelurahan`.`id_desa_kelurahan`
     WHERE `transaksi_individu`.`id_program` = 2
     AND `transaksi_individu`.`is_delete` = 0";
    $res_sql_desa_kelurahan = $this->db->query($sql_desa_kelurahan)->result_array();
    $arr_desa_kelurahan = [];
    for ($i = 0; $i < count($res_sql_desa_kelurahan); $i++) {
      array_push($arr_desa_kelurahan, $res_sql_desa_kelurahan[$i]['desa_kelurahan']);
    }
    $desa_kelurahan_unique = array_unique($arr_desa_kelurahan);
    $this->data['total_desa_kelurahan'] = count($desa_kelurahan_unique);
    //sql jumlah sub_program pada program PKM
    $sql_sub_program = "SELECT
     `sub_program`.`nama_subprogram` AS `sub_program`,
     `sub_program`.`id_subprogram` AS `id_subprogram`,
     `transaksi_individu`.`jumlah_bantuan` AS `jumlah_bantuan`
     FROM  `transaksi_individu`
     LEFT JOIN `sub_program`
     ON `transaksi_individu`.`id_subprogram` = `sub_program`.`id_subprogram`
     WHERE `transaksi_individu`.`id_program` = 2
     AND `transaksi_individu`.`is_delete` = 0";
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

    //sql JENIS KELAMIN pada program PKM
    $sql_jk = "SELECT `penduduk`.`jk` AS `jk`,
    `transaksi_individu`.`jumlah_bantuan` AS `jumlah_bantuan`
     FROM  `transaksi_individu`
     LEFT JOIN `penduduk`
     ON `penduduk`.`nik` = `transaksi_individu`.`nik`
     WHERE `transaksi_individu`.`id_program` = 2
     AND `transaksi_individu`.`is_delete` = 0";
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
    // var_dump($this->data['total_jk']);
    // die;



    $data['path'] = base_url('assets');
    $this->load->view('back/pkm/laporan/konselor', $this->data);
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
    $this->data['get_all_provinsi']  = $this->pkm_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->pkm_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->pkm_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->pkm_model->get_all_kelurahan();
    $this->data['individu']          = $this->pkm_model->get_all_admin_individu();
    $data['path'] = base_url('assets');
    $this->load->view('back/pkm/laporan/admin', $this->data);
  }
  public function export()
  {

    $individu = $this->pkm_model->get_all_admin_individu();
    // Create new Spreadsheet object
    $spreadsheet = new Spreadsheet();

    $style_col = [
      'font' => ['bold' => true], // Set font nya jadi bold
      'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ],
      'borders' => [
        'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
        'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
        'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
        'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
      ]
    ];

    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = ['alignment' =>
    [
      'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
    ],      'borders' => [
      'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
      'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
      'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
      'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
    ]];

    // Set document properties
    // $spreadsheet->getProperties()->setCreator('SE')
    // ->setLastModifiedBy('Andoyo - Java Web Medi')
    // ->setTitle('Office 2007 XLSX Test Document')
    // ->setSubject('Office 2007 XLSX Test Document')
    // ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
    // ->setKeywords('office 2007 openxml php')
    // ->setCategory('Test result file');



    // Add some data

    // $spreadsheet->setActiveSheetIndex(0)
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', "PENGAJUAN PROGRAM PEMBERDAYAAN KELUARGA MANDIRI (PKM)");
    $sheet->mergeCells('A1:N1');
    $sheet->setCellValue('A2', "LPM DOMPET DHUAFA");
    $sheet->mergeCells('A2:N2');
    $sheet->setCellValue('A3', "BULAN FEBRUARI 2022");
    $sheet->mergeCells('A3:N3');
    $sheet->getStyle('A1')->getFont()->setBold(true);
    $sheet->getStyle('A2')->getFont()->setBold(true);
    $sheet->getStyle('A3')->getFont()->setBold(true);
    $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    $spreadsheet->getActiveSheet()
      ->setCellValue('A5', "NO")
      ->setCellValue('B5', "NIK")
      ->setCellValue('C5', "Nama")
      ->setCellValue('D5', "JK")
      ->setCellValue('E5', "Alamat")
      ->setCellValue('F5', "Kelurahan")
      ->setCellValue('G5', "Kecamatan")
      ->setCellValue('H5', "Kota")
      ->setCellValue('I5', "Propinsi")
      ->setCellValue('J5', "Jenis Bantuan")
      ->setCellValue('K5', "(Rp) Bantuan")
      ->setCellValue('L5', "Kasus")
      ->setCellValue('M5', "Yang Menyalurkan")
      ->setCellValue('N5', "SIFAT");

    $sheet->getStyle('A5')->applyFromArray($style_col);
    $sheet->getStyle('b5')->applyFromArray($style_col);
    $sheet->getStyle('c5')->applyFromArray($style_col);
    $sheet->getStyle('d5')->applyFromArray($style_col);
    $sheet->getStyle('e5')->applyFromArray($style_col);
    $sheet->getStyle('f5')->applyFromArray($style_col);
    $sheet->getStyle('g5')->applyFromArray($style_col);
    $sheet->getStyle('h5')->applyFromArray($style_col);
    $sheet->getStyle('i5')->applyFromArray($style_col);
    $sheet->getStyle('j5')->applyFromArray($style_col);
    $sheet->getStyle('k5')->applyFromArray($style_col);
    $sheet->getStyle('l5')->applyFromArray($style_col);
    $sheet->getStyle('m5')->applyFromArray($style_col);
    $sheet->getStyle('n5')->applyFromArray($style_col);

    // Miscellaneous glyphs, UTF-8
    $i = 6;
    $n = 1;
    foreach ($individu as $data) {
      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $i, $n)
        ->setCellValue('B' . $i, $data->nik)
        ->setCellValue('C' . $i, $data->nama)
        ->setCellValue('D' . $i, $data->jk)
        ->setCellValue('E' . $i, $data->alamat)
        ->setCellValue('F' . $i, $data->desa_kelurahan)
        ->setCellValue('G' . $i, $data->kecamatan_name)
        ->setCellValue('H' . $i, $data->kota_kab)
        ->setCellValue('I' . $i, $data->provinsi)
        ->setCellValue('J' . $i, $data->jenis_bantuan)
        ->setCellValue('K' . $i, $data->jumlah_bantuan)
        ->setCellValue('L' . $i, $data->kasus)
        ->setCellValue('M' . $i, $data->penyalur)
        ->setCellValue('N' . $i, $data->sifat_bantuan);

      $sheet->getStyle('A' . $i)->applyFromArray($style_row);
      $sheet->getStyle('B' . $i)->applyFromArray($style_row);
      $sheet->getStyle('E' . $i)->applyFromArray($style_row);
      $sheet->getStyle('D' . $i)->applyFromArray($style_row);
      $sheet->getStyle('F' . $i)->applyFromArray($style_row);
      $sheet->getStyle('G' . $i)->applyFromArray($style_row);
      $sheet->getStyle('H' . $i)->applyFromArray($style_row);
      $sheet->getStyle('I' . $i)->applyFromArray($style_row);
      $sheet->getStyle('J' . $i)->applyFromArray($style_row);
      $sheet->getStyle('K' . $i)->applyFromArray($style_row);
      $sheet->getStyle('L' . $i)->applyFromArray($style_row);
      $sheet->getStyle('M' . $i)->applyFromArray($style_row);
      $sheet->getStyle('N' . $i)->applyFromArray($style_row);

      $sheet->getStyle('B' . $i)->getNumberFormat()->setFormatCode('###0');
      $sheet->getStyle('K' . $i)->getNumberFormat()->setFormatCode(PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
      $i++;
      $n++;
    }



    // Miscellaneous glyphs, UTF-8
    // $i=2; foreach($provinsi as $provinsi) {

    // $spreadsheet->setActiveSheetIndex(0)
    // ->setCellValue('A'.$i, $provinsi->id_provinsi)
    // ->setCellValue('B'.$i, $provinsi->nama_provinsi);
    // $i++;
    // }

    // Rename worksheet
    $sheet->getDefaultRowDimension()->setRowHeight(-1);

    $spreadsheet->getActiveSheet()->setTitle('Report Excel ' . date('d-m-Y H'));

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $spreadsheet->setActiveSheetIndex(0);

    // Redirect output to a client’s web browser (Xlsx)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Report Excel.xlsx"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

    // If you're serving to IE over SSL, then the following may be needed
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
    header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header('Pragma: public'); // HTTP/1.0

    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
    exit;
  }

  // function hitung_umur($tanggal_lahir)
  // {
  //   $birthDate = new DateTime($tanggal_lahir);
  //   $today = new DateTime("today");
  //   if ($birthDate > $today) {
  //     exit("0 tahun 0 bulan 0 hari");
  //   }
  //   $y = $today->diff($birthDate)->y;
  //   $m = $today->diff($birthDate)->m;
  //   $d = $today->diff($birthDate)->d;
  //   return $y . " tahun " . $m . " bulan " . $d . " hari";
  // }


  //------------------------[ DETAIL LAPORAN INDIVIDU & KOMUNITAS ]-----------------------------//
  function detail_laporan_individu($id, $total_periode)
  {
    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['get_all']      = $this->pkm_model->get_laporan_individu_detail($id, $total_periode);

    if ($this->data['get_all']) {
      $this->data['page_title'] = 'Detail Data ' . $this->data['module'];
      $this->load->view('back/pkm/laporan/detail_laporan_individu', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('pkm/konselor');
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

    $this->data['get_all']      = $this->pkm_model->get_laporan_individu_detail($id);

    if ($this->data['get_all']) {
      $this->data['page_title'] = 'Detail Data ' . $this->data['module'];
      $this->load->view('back/pkm/laporan/detail_laporan_komunitas', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('pkm/konselor');
    }
  }
}
