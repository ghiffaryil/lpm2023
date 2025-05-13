<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brp extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    date_default_timezone_set('Asia/Jakarta');
    $this->data['module'] = 'Brp';

    $this->load->model(array('Brp_model'));

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
    is_login();
    is_read();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title'] = $this->data['module'] . ' List';
    $this->data['header']     = $this->data['module'];
    $this->data['konselor']   = $this->Brp_model->get_all_individu();
    $this->data['individu']   = $this->Brp_model->get_all_admin_individu();
    $this->data['umur'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $umur = $this->data['individu'][$i]->tgl_lahir;
      $res_umur = $this->hitung_umur($umur);
      array_push($this->data['umur'], $res_umur);
    }
    $this->data['komunitas']         = $this->Brp_model->get_laporan_komunitas();
    $list_umur_komunitas = [];
    for ($i = 0; $i < count($this->data['komunitas']); $i++) {
      $nik_user = $this->data['komunitas'][$i]->nik;
      $sql_umur_user = "SELECT
                        `a`.`tgl_lahir` as `tgl_lahir_user`
                        FROM `penduduk` `a`
                        JOIN `transaksi_komunitas` `b`
                        ON `a`.`nik` = `b`.`nik`
                        WHERE `b`.`nik` = '$nik_user'";
      $res_umur_user = $this->db->query($sql_umur_user)->row();
      array_push($list_umur_komunitas, $res_umur_user->tgl_lahir_user);
    }
    $this->data['umur_komunitas'] = [];
    for ($i = 0; $i < count($list_umur_komunitas); $i++) {
      $umur = $list_umur_komunitas[$i];
      $res_umur = $this->hitung_umur($umur);
      array_push($this->data['umur_komunitas'], $res_umur);
    }

    $data['path'] = base_url('assets');
    $this->load->view('back/brp/konselor/konselor_list', $this->data);
  }

  function create($id)
  {
    is_login();
    is_create();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title']       = 'Create New Manfaat BRP';
    $this->data['header']           =  $this->data['module'];
    $this->data['action_individu']  = 'brp/create_action_individu';
    $this->data['action_komunitas'] = 'brp/create_action_komunitas';

    $this->data['data']             = $this->Brp_model->get_data_individu($id);
    // $this->data['komunitas']        = $this->Brp_model->get_data_komunitas($id);
    $this->data['komunitas']        = $this->Brp_model->get_data_komunitas_by_program();
    $this->data['program']          = $this->Brp_model->get_program();
    $this->data['subprogram']       = $this->Brp_model->get_sub_program();
    $this->data['cek_individu']     = $this->Brp_model->check_transaksi_individu_by_id($id);
    // var_dump($this->data['cek_individu']);
    // die;
    $this->data['cek_komunitas']    = $this->Brp_model->check_transaksi_komunitas_by_id($id);
    $this->data['notif_individu']   = $this->Brp_model->get_transaksi_individu_by_date($id);
    $this->data['notif_komunitas']  = $this->Brp_model->get_transaksi_komunitas_by_date($id);
    $this->data['rekomender']       = $this->Brp_model->get_rekomender();
    $this->data['datapenduduk']       = $this->Brp_model->get_datapenduduk();
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

    // var_dump($this->Brp_model->get_datapenduduk());die;
    $this->load->view('back/brp/konselor/konselor_add', $this->data);
  }

  function create_action_individu()
  {

    //get profesi dari tabel penduduk berdasarkan nik

    $total_periode = $this->input->post('periode_bantuan');
    // var_dump($total_periode);
    // die;
    $nik = $this->input->post('nik');
    $sql_penduduk = "SELECT * FROM penduduk WHERE nik = $nik";
    $res_penduduk = $this->db->query($sql_penduduk)->row();
    if ($res_penduduk == null) {
      $profesi = "";
    } else {
      $profesi = $res_penduduk->pekerjaan;
    }

    $data = array(
      'id_individu' => $this->input->post('id_individu'),
      'nik' => $this->input->post('nik'),
      'nama' => $this->input->post('nama'),
      'id_program' => $this->input->post('id_program'),
      'id_subprogram' => $this->input->post('id_subprogram'),
      'info_bantuan'          => $this->input->post('info_bantuan'),

      'asnaf' => $this->input->post('asnaf'),

      'kasus' => "",
      'rekomendasi_bantuan' => "",
      'rencana_bantuan' => "",
      'mekanisme_bantuan' => "",

      'jumlah_bantuan'  => str_replace(",", "", $this->input->post('jumlah_bantuan')),
      'jenis_bantuan' => $this->input->post('jenis_bantuan'),
      'sifat_bantuan' => "",
      'bidang_tugas' => $this->input->post('bidang_tugas'),
      'profesi' => $profesi,
      'kopentensi' => $this->input->post('kopentensi'),
      'periode_bantuan'         => $this->input->post('periode_bantuan'),
      'total_periode'         => $this->input->post('total_periode'),
      'sumber_dana'         => $this->input->post('sumber_dana'),
      'created_at'         => date('Y-m-d H:i:s'),
      'deleted_at'         => '0000-00-00 00:00:00',
      'created_by'         => $this->session->username
    );

    $this->Brp_model->insert($data);
    write_log();
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
    redirect(base_url('brp/konselor'));
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
    $this->data['update_action_individu'] = 'brp/update_action_individu';

    $this->data['data']        = $this->Brp_model->get_transaksi_individu_update($id);
    $this->data['rekomender']  = $this->Brp_model->get_rekomender();
    $this->data['subprogram']  = $this->Brp_model->get_sub_program();

    if ($this->data['data']) {
      $this->load->view('back/brp/konselor/konselor_edit_individu', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('brp/konselor/');
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
      'info_bantuan'          => $this->input->post('info_bantuan'),

      'asnaf' => $this->input->post('asnaf'),

      'kasus' => "",
      'rekomendasi_bantuan' => "",
      'rencana_bantuan' => "",
      'mekanisme_bantuan' => "",

      'jumlah_bantuan'  => str_replace(",", "", $this->input->post('jumlah_bantuan')),
      'jenis_bantuan' => $this->input->post('jenis_bantuan'),
      'sifat_bantuan' => "",
      'bidang_tugas' => $this->input->post('bidang_tugas'),
      'profesi' => $this->input->post('profesi'),
      'kopentensi' => $this->input->post('kopentensi'),
      'periode_bantuan'         => $this->input->post('periode_bantuan'),
      'total_periode'         => $this->input->post('total_periode'),
      'sumber_dana'         => $this->input->post('sumber_dana'),

      'deleted_at'         => '0000-00-00 00:00:00',
      'created_by'         => $this->session->username
    );

    $where = $this->input->post('id_transaksi_individu');

    $this->Brp_model->update($where, $data);

    write_log();
    $this->session->set_flashdata('message', '
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="alert alert-success">Data update succesfully</div>
          </div>
        </div>
      ');
    redirect('brp/konselor/');
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

    $this->data['page_title'] = 'Tambah Manfaat brp';
    $this->data['header']     = $this->data['module'];
    $jml = 0;
    $code  = $this->Brp_model->autonumber();

    // var_dump($this->input->post('unama'));
    // die;
    foreach ($this->input->post('unama') as $key => $item_id) {

      $jml  += 1;
      $data = array(
        'id_trans_komunitas_h'  => $code,
        'nama_det'                   => $this->input->post('unama')[$key],
        'usia'     => $this->input->post('uusia')[$key],
        'jenis_kelamin' => $this->input->post('ujeniskelamin')[$key],
        'jenis_penyakit'         => $this->input->post('ujenispenyakit')[$key],
        'ruang_perawatan'          => $this->input->post('uruangperawatan')[$key],
        'kls_kamar'          => $this->input->post('ukelaskamar')[$key],
        'alamat'         => $this->input->post('ualamat')[$key],
        'kelurahan'          => $this->input->post('ukelurahan')[$key],
        'kecamatan'          => $this->input->post('ukecamatan')[$key],
        'kota'          => $this->input->post('ukota')[$key],
        'kesan'          => $this->input->post('ukesan')[$key],

      );

      $this->Brp_model->insert_komunitasdetail($data);
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
      'jumlah_pm'             => $jml,
      'rekomendasi_bantuan'   => "",
      'rencana_bantuan'       => $this->input->post('tgl_kunjungan'),
      'mekanisme_bantuan'     => "",
      'jumlah_bantuan'     => str_replace(",", "", $this->input->post('jumlah_bantuan')),
      'sumber_dana'         => $this->input->post('sumber_dana'),
      'jenis_bantuan'         => $this->input->post('jenis_bantuan'),
      'periode_bantuan'         => $this->input->post('periode_bantuan'),
      'total_periode'         => $this->input->post('total_periode'),
      'sifat_bantuan'         => "",
      'kunjungan'         => $this->input->post('kunjungan'),

      'deleted_at'            => '0000-00-00 00:00:00',
      'created_by'            => $this->session->username
    );


    $this->Brp_model->insert_komunitas($data);



    write_log();
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
    redirect(base_url('brp/konselor'));
  }

  function update_komunitas($id)
  {
    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }
    // var_dump($this->Brp_model->get_transaksi_komunitasdetail_update($id));die;
    $this->data['page_title']  = 'Update Data ' . $this->data['module'];
    $this->data['update_action_komunitas'] = 'brp/update_action_komunitas';

    $this->data['data']          = $this->Brp_model->get_transaksi_komunitas_update($id);
    $this->data['detail']          = $this->Brp_model->get_transaksi_komunitasdetail_update($id);
    $this->data['komunitas']     = $this->Brp_model->get_data_komunitas();
    $this->data['program']       = $this->Brp_model->get_program();
    $this->data['rekomender']    = $this->Brp_model->get_rekomender();
    $this->data['subprogram']    = $this->Brp_model->get_sub_program();

    if ($this->data['data']) {
      $this->load->view('back/brp/konselor/konselor_edit_komunitas', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('brp/konselor/');
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
    $jml =  $this->input->post('jumlah_pm');
    $code =  $this->input->post('code');
    //  var_dump($code);die;
    foreach ($this->input->post('unama') as $key => $item_id) {
      $jml  += 1;
      $iddet =  $this->input->post('uiddet')[$key];
      $delete = $this->Brp_model->get_by_id_detail($iddet);
      if ($delete) {
        $this->Brp_model->deletedetail($iddet);
      }
      $data = array(

        'id_trans_komunitas_h'  => $code,
        'nama_det'                   => $this->input->post('unama')[$key],
        'usia'     => $this->input->post('uusia')[$key],
        'jenis_kelamin' => $this->input->post('ujeniskelamin')[$key],
        'jenis_penyakit'         => $this->input->post('ujenispenyakit')[$key],
        'ruang_perawatan'          => $this->input->post('uruangperawatan')[$key],
        'kls_kamar'          => $this->input->post('ukelaskamar')[$key],
        'alamat'         => $this->input->post('ualamat')[$key],
        'kelurahan'          => $this->input->post('ukelurahan')[$key],
        'kecamatan'          => $this->input->post('ukecamatan')[$key],
        'kota'          => $this->input->post('ukota')[$key],
        'kesan'          => $this->input->post('ukesan')[$key],

      );
      $this->Brp_model->insert_komunitasdetail($data);
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
      'jumlah_pm'             => $jml,
      'rekomendasi_bantuan'   => "",
      'rencana_bantuan'       => "",
      'mekanisme_bantuan'     => "",
      'jumlah_bantuan'     => str_replace(",", "", $this->input->post('jumlah_bantuan')),
      'sumber_dana'         => $this->input->post('sumber_dana'),
      'jenis_bantuan'         => $this->input->post('jenis_bantuan'),
      'periode_bantuan'         => $this->input->post('periode_bantuan'),
      'total_periode'         => $this->input->post('total_periode'),
      'sifat_bantuan'         => "",
      'kunjungan'         => $this->input->post('kunjungan'),

      'deleted_at'            => '0000-00-00 00:00:00',
      'created_by'            => $this->session->username,
      'periode_bantuan'          => $this->input->post('tgl_kunjungan')
    );

    $where = $this->input->post('id_transaksi_komunitas');

    $this->Brp_model->update_komunitas($where, $data);

    write_log();
    $this->session->set_flashdata('message', '
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="alert alert-success">Data update succesfully</div>
          </div>
        </div>
      ');
    redirect('brp/konselor/');
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
    $this->data['get_all_provinsi']  = $this->Brp_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Brp_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Brp_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Brp_model->get_all_kelurahan();
    $this->data['penduduk']          = $this->Brp_model->get_penduduk($id);


    $this->data['data_individu']     = $this->Brp_model->get_transaksi_individu_by_id($id);
    $this->data['data_komunitas']    = $this->Brp_model->get_transaksi_komunitas_by_id($id);
    $this->data['detail_individu']   = $this->Brp_model->get_detail_individu_by_id($id);
    $this->data['detail_komunitas']  = $this->Brp_model->get_detail_komunitas_by_id($id);

    $data['path'] = base_url('assets');
    $this->load->view('back/brp/konselor/konselor_detail', $this->data);
  }

  function delete_komunitas($id)
  {
    is_login();
    is_delete();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->Brp_model->delete_transaksi_komunitas_by_id($id);

    if ($delete) {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Brp_model->soft_delete_komunitas($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('brp/konselor/');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('brp/detail_konselor');
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
    $this->data['get_all_provinsi']  = $this->Brp_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Brp_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Brp_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Brp_model->get_all_kelurahan();
    $this->data['individu']          = $this->Brp_model->get_all_admin_individu();
    $this->data['umur'] = [];
    $this->data['komunitas']         = $this->Brp_model->get_laporan_komunitas();

    //DATA REKAP
    //sql jumlah provinsi pada program BRP
    $sql_provinsi = "SELECT `penduduk`.`id_provinsi` AS `provinsi`
      FROM  `transaksi_individu`
      LEFT JOIN `penduduk`
      ON `penduduk`.`nik` = `transaksi_individu`.`nik`
      LEFT JOIN `provinsi`
      ON `penduduk`.`id_provinsi` = `provinsi`.`id_provinsi`
      WHERE `transaksi_individu`.`id_program` = 6";
    $res_sql_provinsi = $this->db->query($sql_provinsi)->result_array();
    $arr_prov = [];
    for ($i = 0; $i < count($res_sql_provinsi); $i++) {
      array_push($arr_prov, $res_sql_provinsi[$i]['provinsi']);
    }

    $prov_unique = array_unique($arr_prov);
    $this->data['total_provinsi'] = count($prov_unique);
    //sql jumlah kota pada program BRP
    $sql_kab_kota = "SELECT `penduduk`.`id_kota_kab` AS `kab_kota`
          FROM  `transaksi_individu`
          LEFT JOIN `penduduk`
          ON `penduduk`.`nik` = `transaksi_individu`.`nik`
          LEFT JOIN `kota_kab`
          ON `penduduk`.`id_kota_kab` = `kota_kab`.`id_kota_kab`
          WHERE `transaksi_individu`.`id_program` = 6";
    $res_sql_kab_kota = $this->db->query($sql_kab_kota)->result_array();
    $arr_kab_kota = [];
    for ($i = 0; $i < count($res_sql_kab_kota); $i++) {
      array_push($arr_kab_kota, $res_sql_kab_kota[$i]['kab_kota']);
    }
    // var_dump($jumlah_bantuan);
    // die;
    $kab_kota_unique = array_unique($arr_kab_kota);
    $this->data['total_kab_kota'] = count($kab_kota_unique);
    $this->data['total_pb'] = count($arr_kab_kota);

    //sql JENIS KELAMIN pada program BRP
    $sql_jk = "SELECT `penduduk`.`jk` AS `jk`,
    `transaksi_individu`.`jumlah_bantuan` AS `jumlah_bantuan`
    FROM  `transaksi_individu`
    LEFT JOIN `penduduk`
    ON `penduduk`.`nik` = `transaksi_individu`.`nik`
    WHERE `transaksi_individu`.`id_program` = 6";
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

    //sql Rekap Berdasarkan Jenis Penyakit KOMUNITAS PADA program BRP
    $sql_jp = "SELECT `transaksi_komunitas_d`.`jenis_penyakit` AS `jenis_penyakit`
    FROM  `transaksi_komunitas_d`
    LEFT JOIN `transaksi_komunitas`
    ON `transaksi_komunitas_d`.`id_trans_komunitas_h` = `transaksi_komunitas`.`code`
    WHERE `transaksi_komunitas`.`id_program` = 6";
    $res_sql_jp = $this->db->query($sql_jp)->result_array();

    $arr_jp = [];
    for ($i = 0; $i < count($res_sql_jp); $i++) {
      $data_jp = [
        "jumlah_pasien" => 1,
        "jenis_penyakit" =>  $res_sql_jp[$i]['jenis_penyakit']
      ];
      array_push($arr_jp, $data_jp);
    }

    $unique_jp = array();
    foreach ($arr_jp as $vals) {
      if (array_key_exists($vals['jenis_penyakit'], $unique_jp)) {
        $unique_jp[$vals['jenis_penyakit']]['jumlah_pasien'] += $vals['jumlah_pasien'];
      } else {
        $unique_jp[$vals['jenis_penyakit']] = $vals;
      }
    }
    $this->data['total_jenis_penyakit'] = $unique_jp;

    //sql Rekap Berdasarkan Petugas Bimroh KOMUNITAS PADA program BRP
    $sql_pb = "SELECT `komunitas`.`nama_komunitas` AS `nama_komunitas`, `transaksi_komunitas`.`jumlah_pm` AS `jumlah_pasien`, `transaksi_komunitas`.`kunjungan` AS `jumlah_kunjungan`
    FROM  `transaksi_komunitas`
    LEFT JOIN `komunitas`
    ON `transaksi_komunitas`.`id_komunitas` = `komunitas`.`id_komunitas`
    LEFT JOIN `transaksi_komunitas_d`
    ON `transaksi_komunitas_d`.`id_trans_komunitas_h` = `transaksi_komunitas`.`code`
    WHERE `transaksi_komunitas`.`id_program` = 6";
    $res_sql_pb = $this->db->query($sql_pb)->result_array();

    $arr_pb = [];
    for ($i = 0; $i < count($res_sql_pb); $i++) {
      $data_pb = [
        "jumlah_kunjungan" => 1,
        "nama_komunitas" =>  $res_sql_pb[$i]['nama_komunitas'],
        "jumlah_pasien" =>  $res_sql_pb[$i]['jumlah_pasien']
      ];
      array_push($arr_pb, $data_pb);
    }
    $unique_pb = array();
    foreach ($arr_pb as $vals) {
      if (array_key_exists($vals['nama_komunitas'], $unique_pb)) {
        $unique_pb[$vals['nama_komunitas']]['jumlah_kunjungan'] += $vals['jumlah_kunjungan'];
        $unique_pb[$vals['nama_komunitas']]['jumlah_pasien'] += $vals['jumlah_pasien'];
      } else {
        $unique_pb[$vals['nama_komunitas']] = $vals;
      }
    }
    $this->data['total_nama_komunitas'] = $unique_pb;

    //sql Rekap Berdasarkan Rumah Sakit KOMUNITAS PADA program BRP
    $sql_rs = "SELECT `komunitas`.`nama_komunitas` AS `nama_komunitas`, `transaksi_komunitas`.`jumlah_pm` AS `jumlah_pasien`, `transaksi_komunitas_d`.`jenis_kelamin` AS `jenis_kelamin`
    FROM  `transaksi_komunitas`
    LEFT JOIN `komunitas`
    ON `transaksi_komunitas`.`id_komunitas` = `komunitas`.`id_komunitas`
    LEFT JOIN `transaksi_komunitas_d`
    ON `transaksi_komunitas_d`.`id_trans_komunitas_h` = `transaksi_komunitas`.`code`
    WHERE `transaksi_komunitas`.`id_program` = 6";
    $res_sql_rs = $this->db->query($sql_rs)->result_array();

    $arr_rs = [];
    for ($i = 0; $i < count($res_sql_rs); $i++) {
      $data_rs = [
        "jenis_kelamin" =>  $res_sql_rs[$i]['jenis_kelamin'],
        "nama_komunitas" =>  $res_sql_rs[$i]['nama_komunitas'],
        "jumlah_pasien" =>  $res_sql_rs[$i]['jumlah_pasien']
      ];
      array_push($arr_rs, $data_rs);
    }

    // var_dump($arr_rs);
    // die;
    $unique_rs = array();
    $jk_l = [];
    $jk_p = [];
    $jk_lain = [];
    foreach ($arr_rs as $vals) {
      if (array_key_exists($vals['nama_komunitas'], $unique_rs)) {
        $unique_rs[$vals['nama_komunitas']]['jumlah_pasien'] += (int)$vals['jumlah_pasien'];
        if ($vals['jenis_kelamin'] == "L") {
          array_push($jk_l, $vals['jenis_kelamin']);
        } else if ($vals['jenis_kelamin'] == "P") {
          array_push($jk_p, $vals['jenis_kelamin']);
        } else {
          array_push($jk_lain, $vals['jenis_kelamin']);
        }
        $unique_rs[$vals['nama_komunitas']]['jk_l'] = count($jk_l);
        $unique_rs[$vals['nama_komunitas']]['jk_p'] = count($jk_p);
      } else {
        $unique_rs[$vals['nama_komunitas']] = $vals;
        $unique_rs[$vals['nama_komunitas']]['jk_l'] = count($jk_l);
        $unique_rs[$vals['nama_komunitas']]['jk_p'] = count($jk_p);
      }
    }
    $this->data['total_rumah_sakit'] = $unique_rs;
    // var_dump($this->data['total_rumah_sakit']);
    // die;

    //REKAP SAMPE SINI

    for ($i = 0; $i < count($this->data['komunitas']); $i++) {
      $umur = $this->data['komunitas'][$i]->tgl_lahir;
      $res_umur = $this->hitung_umur($umur);
      array_push($this->data['umur'], $res_umur);
    }

    $this->data['komunitas_d'] = [];
    for ($i = 0; $i < count($this->data['komunitas']); $i++) {
      $id_transaksi_komunitas = $this->data['komunitas'][$i]->id_transaksi_komunitas;
      $sql = "SELECT
              `b`.`ruang_perawatan` as `ruang_perawatan`,
              `b`.`kls_kamar` as `kls_kamar`,
              `b`.`kesan` as `kesan`
              FROM `transaksi_komunitas` `a`
              JOIN `transaksi_komunitas_d` `b`
              ON `a`.`id_transaksi_komunitas` = `b`.`id_trans_komunitas_d`
              WHERE `a`.`id_transaksi_komunitas` = '$id_transaksi_komunitas'";
      $res = $this->db->query($sql)->row();
      array_push($this->data['komunitas_d'], $res);
    }
    // echo json_encode($this->data['komunitas_d']);
    // die;
    $data['path'] = base_url('assets');
    $this->load->view('back/brp/laporan/konselor', $this->data);
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
    $this->data['get_all_provinsi']  = $this->Brp_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Brp_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Brp_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Brp_model->get_all_kelurahan();
    $this->data['individu']          = $this->Brp_model->get_all_admin_individu();
    $this->data['umur'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $umur = $this->data['individu'][$i]->tgl_lahir;
      $res_umur = $this->hitung_umur($umur);
      array_push($this->data['umur'], $res_umur);
    }
    $this->data['komunitas']         = $this->Brp_model->get_laporan_komunitas();
    $list_umur_komunitas = [];
    for ($i = 0; $i < count($this->data['komunitas']); $i++) {
      $nik_user = $this->data['komunitas'][$i]->nik;
      $sql_umur_user = "SELECT
                        `a`.`tgl_lahir` as `tgl_lahir_user`
                        FROM `penduduk` `a`
                        JOIN `transaksi_komunitas` `b`
                        ON `a`.`nik` = `b`.`nik`
                        WHERE `b`.`nik` = '$nik_user'";
      $res_umur_user = $this->db->query($sql_umur_user)->row();
      array_push($list_umur_komunitas, $res_umur_user->tgl_lahir_user);
    }
    $this->data['umur_komunitas'] = [];
    for ($i = 0; $i < count($list_umur_komunitas); $i++) {
      $umur = $list_umur_komunitas[$i];
      $res_umur = $this->hitung_umur($umur);
      array_push($this->data['umur_komunitas'], $res_umur);
    }

    $data['path'] = base_url('assets');
    $this->load->view('back/brp/laporan/admin', $this->data);
  }


  function delete_individu($id)
  {
    is_login();
    is_delete();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->Brp_model->get_by_id($id);

    if ($delete) {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Brp_model->soft_delete($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('brp/konselor/');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('brp/konselor');
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

    $delete = $this->Brp_model->get_by_id($id);

    if ($delete) {
      $this->Lamusta_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('brp/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('brp/deleted_list');
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

    $delete = $this->Brp_model->delete_transaksi_komunitas_by_id($id);

    if ($delete) {
      $this->Brp_model->delete_permanent($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('brp/deleted_list');
    } else {
      $this->brp->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('brp/deleted_list');
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

    $delete = $this->Brp_model->get_by_id($id);

    if ($delete) {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Brp_model->soft_delete($id, $data);

      // $this->write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('brp/konselor');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('brp/konselor');
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

    $delete = $this->Brp_model->get_by_id($id);

    if ($delete) {
      $this->Brp_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('brp/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('brp/deleted_list');
    }
  }

  function deleted_list()
  {
    is_login();
    is_read();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title'] = 'Deleted ' . $this->data['module'] . ' List';
    $this->data['header']     = $this->data['module'];
    $this->data['komunitas']  = $this->Brp_model->get_all_deleted_komunitas();
    $this->data['individu']   = $this->Brp_model->get_all_deleted_individu();
    $this->data['umur'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $umur = $this->data['individu'][$i]->tgl_lahir;
      $res_umur = $this->hitung_umur($umur);
      array_push($this->data['umur'], $res_umur);
    }
    $list_umur_komunitas = [];
    for ($i = 0; $i < count($this->data['komunitas']); $i++) {
      $nik_user = $this->data['komunitas'][$i]->nik;
      $sql_umur_user = "SELECT
                        `a`.`tgl_lahir` as `tgl_lahir_user`
                        FROM `penduduk` `a`
                        JOIN `transaksi_komunitas` `b`
                        ON `a`.`nik` = `b`.`nik`
                        WHERE `b`.`nik` = '$nik_user'";
      $res_umur_user = $this->db->query($sql_umur_user)->row();
      array_push($list_umur_komunitas, $res_umur_user->tgl_lahir_user);
    }
    $this->data['umur_komunitas'] = [];
    for ($i = 0; $i < count($list_umur_komunitas); $i++) {
      $umur = $list_umur_komunitas[$i];
      $res_umur = $this->hitung_umur($umur);
      array_push($this->data['umur_komunitas'], $res_umur);
    }

    $data['path'] = base_url('assets');
    $this->load->view('back/brp/individu_deleted_list', $this->data);
  }

  function restore_individu($id)
  {
    is_login();
    is_restore();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $row = $this->Brp_model->get_by_id($id);

    if ($row) {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Brp_model->update($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('brp/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('brp/deleted_list');
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

    $row = $this->Brp_model->delete_transaksi_komunitas_by_id($id);

    if ($row) {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Brp_model->update_komunitas($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('brp/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('brp/deleted_list');
    }
  }


  //------------------------[ DETAIL LAPORAN INDIVIDU & KOMUNITAS ]-----------------------------//
  function detail_laporan_individu($id, $total_periode)
  {
    // var_dump($id);
    // var_dump($total_periode);
    // die;
    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['get_all']      = $this->Brp_model->get_laporan_individu_detail($id, $total_periode);
    // var_dump($this->data['get_all']);
    // die;

    if ($this->data['get_all']) {
      $this->data['page_title'] = 'Detail Data ' . $this->data['module'];
      $this->load->view('back/brp/laporan/detail_laporan_individu', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('brp/konselor');
    }
  }

  // -------------- DETAIL LAPORAN KOMNITAS --------------
  function detail_laporan_komunitas($id, $total_periode)
  {
    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['get_all']      = $this->Brp_model->get_laporan_komunitas_detail($id, $total_periode);
    // var_dump($this->data['get_all']);
    // die;
    if ($this->data['get_all']) {
      $this->data['page_title'] = 'Detail Data ' . $this->data['module'];
      $this->load->view('back/brp/laporan/detail_laporan_komunitas', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('brp/konselor');
    }
  }
}
