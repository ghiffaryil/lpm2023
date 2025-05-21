<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ytb extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
    $this->data['module'] = 'Ytb';
    $this->load->model(array('Ytb_model'));
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
    $this->data['add_action'] = base_url('ytb/create');
  }

  function konselor()
  {
    $this->session->set_flashdata('message', '');
    is_login();
    is_read();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title'] = $this->data['module'] . ' List';
    $this->data['header']     = $this->data['module'];
    $this->data['konselor']   = $this->Ytb_model->get_all_individu();
    $this->data['individu']   = $this->Ytb_model->get_all_admin_individu();
    $data['path'] = base_url('assets');
    $this->load->view('back/ytb/konselor/konselor_list', $this->data);
  }

  function create($id)
  {
    is_login();
    is_create();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title']       = 'Create New Manfaat YTB';
    $this->data['header']           =  $this->data['module'];
    $this->data['action_individu']  = 'ytb/create_action_individu';
    $this->data['action_komunitas'] = 'ytb/create_action_komunitas';

    $this->data['data']             = $this->Ytb_model->get_data_individu($id);
    $this->data['komunitas']        = $this->Ytb_model->get_data_komunitas($id);
    $this->data['program']           = $this->Ytb_model->get_program();
    $this->data['subprogram']       = $this->Ytb_model->get_sub_program();
    $this->data['cek_individu']     = $this->Ytb_model->check_transaksi_individu_by_id($id);
    $this->data['cek_komunitas']    = $this->Ytb_model->check_transaksi_komunitas_by_id($id);
    $this->data['notif_individu']   = $this->Ytb_model->get_transaksi_individu_by_date($id);
    $this->data['notif_komunitas']  = $this->Ytb_model->get_transaksi_komunitas_by_date($id);
    $this->data['rekomender']       = $this->Ytb_model->get_rekomender();
    $this->data['datapenduduk']       = $this->Ytb_model->get_datapenduduk();

    // var_dump($this->Ytb_model->get_datapenduduk());die;
    $this->load->view('back/ytb/konselor/konselor_add', $this->data);
  }

  function create_action_individu()
  {
    $data = array(
      'id_individu'        => $this->input->post('id_individu'),
      'nik'                => $this->input->post('nik'),
      'nama'               => $this->input->post('nama'),
      'id_program'         => $this->input->post('id_program'),
      'id_subprogram'      => $this->input->post('id_subprogram'),
      'info_bantuan'       => $this->input->post('info_bantuan'),

      'asnaf'              => $this->input->post('asnaf'),
      'status_tinggal'     => "",
      'kasus'              => $this->input->post('id_subprogram'),
      'rekomendasi_bantuan' => "",
      'rencana_bantuan'    => "",
      'mekanisme_bantuan'  => "",
      'penyalur' => $this->input->post('penyalur'),
      'sumber_dana'      => $this->input->post('sumber_dana'),
      'jumlah_bantuan'  => str_replace(",", "", $this->input->post('jumlah_bantuan')),
      'jenis_bantuan'      => $this->input->post('jenis_bantuan'),
      'sifat_bantuan'      => $this->input->post('sifat_bantuan'),
      'sekolah_nama'      => $this->input->post('sekolah_nama'),
      'sekolah_alamat'      => $this->input->post('sekolah_alamat'),
      'keterangan'      => $this->input->post('keterangan'),
      'periode_bantuan'      => $this->input->post('periode_bantuan'),
      'total_periode'      => $this->input->post('total_periode'),
      'created_at'         => date('Y-m-d H:i:s'),
      'deleted_at'         => '0000-00-00 00:00:00',
      'created_by'         => $this->session->username
    );

    $this->Ytb_model->insert($data);
    write_log();
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
    redirect(base_url('ytb/konselor'));
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
    $this->data['update_action_individu'] = 'ytb/update_action_individu';

    $this->data['data']        = $this->Ytb_model->get_transaksi_individu_update($id);
    $this->data['rekomender']  = $this->Ytb_model->get_rekomender();
    $this->data['subprogram']  = $this->Ytb_model->get_sub_program();

    if ($this->data['data']) {
      $this->load->view('back/ytb/konselor/konselor_edit_individu', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('ytb/konselor/');
    }
  }

  function update_action_individu()
  {
    $data = array(
      'id_individu'        => $this->input->post('id_individu'),
      'nik'                => $this->input->post('nik'),
      'nama'               => $this->input->post('nama'),
      'id_program'         => $this->input->post('id_program'),
      'id_subprogram'      => $this->input->post('id_subprogram'),
      'info_bantuan'       => $this->input->post('info_bantuan'),

      'asnaf'              => $this->input->post('asnaf'),
      'status_tinggal'     => "",
      'kasus'              => $this->input->post('id_subprogram'),
      'rekomendasi_bantuan' => "",
      'rencana_bantuan'    => "",
      'mekanisme_bantuan'  => "",
      'penyalur' => $this->input->post('penyalur'),
      'sumber_dana'      => $this->input->post('sumber_dana'),
      'jumlah_bantuan'  => str_replace(",", "", $this->input->post('jumlah_bantuan')),
      'jenis_bantuan'      => $this->input->post('jenis_bantuan'),
      'sifat_bantuan'      => $this->input->post('sifat_bantuan'),
      'sekolah_nama'      => $this->input->post('sekolah_nama'),
      'sekolah_alamat'      => $this->input->post('sekolah_alamat'),
      'keterangan'      => $this->input->post('keterangan'),
      'periode_bantuan'      => $this->input->post('periode_bantuan'),
      'total_periode'      => $this->input->post('total_periode'),

      'deleted_at'         => '0000-00-00 00:00:00',
      'created_by'         => $this->session->username
    );

    $where = $this->input->post('id_transaksi_individu');

    $this->Ytb_model->update($where, $data);

    write_log();
    $this->session->set_flashdata('message', '
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="alert alert-success">Data Ytb update succesfully</div>
          </div>
        </div>
      ');
    redirect('ytb/konselor/');
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

    $this->data['page_title'] = 'Tambah Manfaat Lamusta';
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

    $this->Ytb_model->insert_komunitas($data);

    foreach ($this->input->post('unik') as $key => $item_id) {
      $data = array(

        'id_trans_komunitas_h'  => $this->input->post('unik')[$key],
        'nik'                   => $this->input->post('unik')[$key],
        'jenispidana_pasal'     => $this->input->post('ujenispasal')[$key],
        'jenispidana_keterangan' => $this->input->post('uketerangan')[$key],
        'masahukuman'         => $this->input->post('umasahukuman')[$key],
        'blokkamar'          => $this->input->post('ublok')[$key]
      );
      $this->Ytb_model->insert_komunitasdetail($data);
    }

    write_log();
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
    redirect(base_url('ytb/konselor'));
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
    $this->data['header']            = 'Laporan Pusat';
    $this->data['get_all_provinsi']  = $this->Ytb_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Ytb_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Ytb_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Ytb_model->get_all_kelurahan();
    $this->data['individu']          = $this->Ytb_model->get_all_admin_individu();
    $this->data['komunitas']         = $this->Ytb_model->get_laporan_komunitas();

    //sql jumlah provinsi pada program ytb
    $sql_provinsi = "SELECT `penduduk`.`id_provinsi` AS `provinsi`
      FROM  `transaksi_individu`
      LEFT JOIN `penduduk`
      ON `penduduk`.`nik` = `transaksi_individu`.`nik`
      LEFT JOIN `provinsi`
      ON `penduduk`.`id_provinsi` = `provinsi`.`id_provinsi`
      WHERE `transaksi_individu`.`id_program` = 7
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
          WHERE `transaksi_individu`.`id_program` = 7
          AND `transaksi_individu`.`is_delete` = 0";
    $res_sql_kab_kota = $this->db->query($sql_kab_kota)->result_array();
    $arr_kab_kota = [];
    $jumlah_bantuan = 0;
    for ($i = 0; $i < count($res_sql_kab_kota); $i++) {
      array_push($arr_kab_kota, $res_sql_kab_kota[$i]['kab_kota']);
      $jumlah_bantuan += (int)$res_sql_kab_kota[$i]['jumlah_bantuan'];
    }
    // var_dump($jumlah_bantuan);
    // die;
    $kab_kota_unique = array_unique($arr_kab_kota);
    $this->data['total_kab_kota'] = count($kab_kota_unique);
    $this->data['total_pm'] = count($arr_kab_kota);
    $this->data['total_jumlah_bantuan'] = $jumlah_bantuan;
    //sql jumlah kecamatan pada program PKM
    $sql_kecamatan = "SELECT `penduduk`.`id_kecamatan` AS `kecamatan`
          FROM  `transaksi_individu`
          LEFT JOIN `penduduk`
          ON `penduduk`.`nik` = `transaksi_individu`.`nik`
          LEFT JOIN `kecamatan`
          ON `penduduk`.`id_kecamatan` = `kecamatan`.`id_kecamatan`
          WHERE `transaksi_individu`.`id_program` = 7
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
    WHERE `transaksi_individu`.`id_program` = 7
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
    WHERE `transaksi_individu`.`id_program` = 7
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
    WHERE `transaksi_individu`.`id_program` = 7
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

    $data['path'] = base_url('assets');
    $this->load->view('back/ytb/laporan/konselor', $this->data);
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
    $this->data['get_all_provinsi']  = $this->Ytb_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Ytb_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Ytb_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Ytb_model->get_all_kelurahan();
    $this->data['individu']          = $this->Ytb_model->get_all_admin_individu();
    $this->data['umur'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $umur = $this->data['individu'][$i]->tgl_lahir;
      $res_umur = $this->hitung_umur($umur);
      array_push($this->data['umur'], $res_umur);
    }
    $this->data['komunitas']         = $this->Ytb_model->get_laporan_komunitas();
    // var_dump($this->data);die;
    $data['path'] = base_url('assets');
    $this->load->view('back/ytb/laporan/admin', $this->data);
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

    $this->data['data']          = $this->Ytb_model->get_transaksi_komunitas_update($id);
    $this->data['komunitas']     = $this->Ytb_model->get_data_komunitas();
    $this->data['program']       = $this->Ytb_model->get_program();
    $this->data['rekomender']    = $this->Ytb_model->get_rekomender();
    $this->data['subprogram']    = $this->Ytb_model->get_sub_program();

    if ($this->data['data']) {
      $this->load->view('back/ytb/konselor/konselor_edit_komunitas', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('ytb/konselor/');
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

    $this->data['page_title'] = 'Edit Manfaat Lamusta';
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

    $this->Ytb_model->update_komunitas($where, $data);

    write_log();
    $this->session->set_flashdata('message', '
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="alert alert-success">Data update succesfully</div>
          </div>
        </div>
      ');
    redirect('ytb/konselor/');
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
    $this->data['get_all_provinsi']  = $this->Ytb_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Ytb_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Ytb_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Ytb_model->get_all_kelurahan();
    $this->data['penduduk']          = $this->Ytb_model->get_penduduk($id);


    $this->data['data_individu']     = $this->Ytb_model->get_transaksi_individu_by_id($id);
    $this->data['data_komunitas']    = $this->Ytb_model->get_transaksi_komunitas_by_id($id);
    $this->data['detail_individu']   = $this->Ytb_model->get_detail_individu_by_id($id);
    $this->data['detail_komunitas']  = $this->Ytb_model->get_detail_komunitas_by_id($id);

    $data['path'] = base_url('assets');
    $this->load->view('back/ytb/konselor/konselor_detail', $this->data);
  }

  function delete($id)
  {
    is_login();
    is_delete();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->Ytb_model->get_by_id($id);

    if ($delete) {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Ytb_model->soft_delete($id, $data);

      // $this->write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('ytb/konselor/');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('ytb/konselor/');
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

    $delete = $this->Ytb_model->get_by_id($id);

    if ($delete) {
      $this->Ytb_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('ytb/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('ytb/deleted_list');
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

    $this->data['komunitas'] = $this->Ytb_model->get_all_deleted_komunitas();
    $this->data['individu']  = $this->Ytb_model->get_all_deleted_individu();

    $this->load->view('back/ytb/individu_deleted_list', $this->data);
  }

  function restore($id)
  {
    is_login();
    is_restore();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $row = $this->Ytb_model->get_by_id($id);

    if ($row) {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Ytb_model->update($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('ytb/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('ytb/deleted_list');
    }
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


  //------------------------[ DETAIL INDIVIDU & KOMUNITAS ]-----------------------------//
  function detail_laporan_individu($id, $total_periode)
  {
    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['get_all']      = $this->Ytb_model->get_laporan_individu_detail($id, $total_periode);

    if ($this->data['get_all']) {
      $this->data['page_title'] = 'Detail Data ' . $this->data['module'];
      $this->load->view('back/ytb/laporan/detail_laporan_individu', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('ytb/konselor/');
    }
  }
}
