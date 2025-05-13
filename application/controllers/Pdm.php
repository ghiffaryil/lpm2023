<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdm extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    date_default_timezone_set('Asia/Jakarta');
    $this->data['module'] = 'Pdm';

    $this->load->model(array('Pdm_model'));

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
    $this->data['add_action'] = base_url('pdmindividu/create');
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
    $this->data['get_all_provinsi']  = $this->Pdm_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Pdm_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Pdm_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Pdm_model->get_all_kelurahan();
    $this->data['konselor']   = $this->Pdm_model->get_all_individu();
    $this->data['individu']   = $this->Pdm_model->get_all_admin_individu();
    $this->data['umur'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $umur = $this->data['individu'][$i]->tgl_lahir;
      $res_umur = $this->hitung_umur($umur);
      array_push($this->data['umur'], $res_umur);
    };
    $this->data['komunitas']  = $this->Pdm_model->get_laporan_komunitas();

    $data['path'] = base_url('assets');
    $this->load->view('back/pdm/konselor/konselor_list', $this->data);
  }

  function create($id)
  {
    is_login();
    is_create();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title']       = 'Create New Manfaat PDM';
    $this->data['header']           =  $this->data['module'];
    $this->data['action_individu']  = 'pdm/create_action_individu';
    $this->data['action_komunitas'] = 'pdm/create_action_komunitas';

    $this->data['data']             = $this->Pdm_model->get_data_individu($id);
    // $this->data['komunitas']        = $this->Pdm_model->get_data_komunitas($id);
    $this->data['komunitas']        = $this->Pdm_model->get_data_komunitas_by_program();
    $this->data['program']           = $this->Pdm_model->get_program();
    $this->data['subprogram']       = $this->Pdm_model->get_sub_program();
    $this->data['cek_individu']     = $this->Pdm_model->check_transaksi_individu_by_id($id);
    $this->data['cek_komunitas']    = $this->Pdm_model->check_transaksi_komunitas_by_id($id);
    $this->data['notif_individu']   = $this->Pdm_model->get_transaksi_individu_by_date($id);
    $this->data['notif_komunitas']  = $this->Pdm_model->get_transaksi_komunitas_by_date($id);
    $this->data['rekomender']       = $this->Pdm_model->get_rekomender();
    $this->data['datapenduduk']       = $this->Pdm_model->get_datapenduduk();
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

    // var_dump($this->Pdm_model->get_datapenduduk());die;
    $this->load->view('back/pdm/konselor/konselor_add', $this->data);
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
      'status_tinggal' => "",
      'kasus' => "",
      'rekomendasi_bantuan' => "",
      'rencana_bantuan' => "",
      'mekanisme_bantuan' => "",
      'jumlah_bantuan' => str_replace(",", "", $this->input->post('jumlah_bantuan')),
      'jenis_bantuan' => $this->input->post('jenis_bantuan'),
      'sifat_bantuan' => "",
      'bidang_tugas' => $this->input->post('bidang_tugas'),
      'profesi' => $this->input->post('profesi'),
      'kopentensi' => $this->input->post('kopentensi'),
      'sumber_dana'         => $this->input->post('sumber_dana'),
      'periode_bantuan'         => $this->input->post('periode_bantuan'),
      'total_periode'         => $this->input->post('total_periode'),
      'created_at'         => date('Y-m-d H:i:s'),
      'deleted_at'         => '0000-00-00 00:00:00',
      'created_by'         => $this->session->username
    );

    $this->Pdm_model->insert($data);
    write_log();
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
    redirect(base_url('pdm/konselor'));
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
    $this->data['update_action_individu'] = 'pdm/update_action_individu';

    $this->data['data']        = $this->Pdm_model->get_transaksi_individu_update($id);
    $this->data['rekomender']  = $this->Pdm_model->get_rekomender();
    $this->data['subprogram']  = $this->Pdm_model->get_sub_program();

    if ($this->data['data']) {
      $this->load->view('back/pdm/konselor/konselor_edit_individu', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('pdm/detail_konselor/' . $this->data['data'][0]['nik']);
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

    $this->Pdm_model->update($where, $data);

    write_log();
    $this->session->set_flashdata('message', '
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="alert alert-success">Data update succesfully</div>
          </div>
        </div>
      ');
    redirect('pdm/detail_konselor/' . $this->input->post('nik'));
  }

  //----------------------- end pdm individu --------------------------//


  function create_action_komunitas()
  {

    // var_dump($this->input->post('unik'));die;

    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title'] = 'Tambah Manfaat PDM';
    $this->data['header']     = $this->data['module'];
    $code  = $this->Pdm_model->autonumber();



    $jml = 0;
    foreach ($this->input->post('unama') as $key => $item_id) {
      $jml  += 1;
      $data = array(


        'id_trans_komunitas_h'  => $code,
        'nik'                   => $this->input->post('unik')[$key],
        'nama_det'                   => $this->input->post('unama')[$key],
        'usia'     => $this->input->post('uusia')[$key],
        'jenis_kelamin' => $this->input->post('ujeniskelamin')[$key],
        'tempat_lahir'         => $this->input->post('utempatlahir')[$key],
        'tgl_lahir'          => $this->input->post('utgllahir')[$key],
        'faktor_penyebab'          => $this->input->post('ufaktorpenyebab')[$key],
        'alamat'         => $this->input->post('ualamat')[$key],
        'kelurahan'          => $this->input->post('ukelurahan')[$key],
        'kecamatan'          => $this->input->post('ukecamatan')[$key],
        'kota'          => $this->input->post('ukota')[$key],
        'pra_bimroh'          => $this->input->post('uprabimroh')[$key],
        'pasca_bimroh'          => $this->input->post('upascabimroh')[$key]
      );
      $this->Pdm_model->insert_komunitasdetail($data);
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
      'jumlah_permohonan'     => str_replace(",", "", $this->input->post('jumlah_permohonan')),
      'jumlah_bantuan'     => str_replace(",", "", $this->input->post('jumlah_bantuan')),
      'sumber_dana'         => $this->input->post('sumber_dana'),
      'periode_bantuan'         => $this->input->post('periode_bantuan'),
      'total_periode'         => $this->input->post('total_periode'),
      'jenis_bantuan'         => $this->input->post('jenis_bantuan'),
      'sifat_bantuan'         => "",
      // 'kunjungan'         => $this->input->post('kunjungan'),
      'deleted_at'            => '0000-00-00 00:00:00',
      'created_at'         => date('Y-m-d H:i:s'),
      'created_by'            => $this->session->username
    );
    $this->Pdm_model->insert_komunitas($data);
    write_log();
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
    redirect(base_url('pdm/konselor'));
  }

  function update_komunitas($id)
  {
    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }
    // var_dump($this->Pdm_model->get_transaksi_komunitasdetail_update($id));die;
    $this->data['page_title']  = 'Update Data ' . $this->data['module'];
    $this->data['update_action_komunitas'] = 'pdm/update_action_komunitas';

    $this->data['data']          = $this->Pdm_model->get_transaksi_komunitas_update($id);
    $this->data['detail']          = $this->Pdm_model->get_transaksi_komunitasdetail_update($id);
    $this->data['komunitas']     = $this->Pdm_model->get_data_komunitas();
    $this->data['program']       = $this->Pdm_model->get_program();
    $this->data['rekomender']    = $this->Pdm_model->get_rekomender();
    $this->data['subprogram']    = $this->Pdm_model->get_sub_program();
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
      $this->load->view('back/pdm/konselor/konselor_edit_komunitas', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('brp/detail_konselor/' . $this->data['data'][0]['nik']);
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

    $this->data['page_title'] = 'Edit Manfaat Pdm';
    $this->data['header']     = $this->data['module'];

    $jml = 0;

    foreach ($this->input->post('unama') as $key => $item_id) {
      $jml  += 1;
      $iddet =  $this->input->post('uid')[$key];
      // var_dump(  $iddet);die;
      $delete = $this->Pdm_model->get_by_id_detail($iddet);
      if ($delete) {
        $this->Pdm_model->deletedetail($iddet);
      }
      $data = array(


        'id_trans_komunitas_h'  => $this->input->post('code'),
        'nik'                   => $this->input->post('unik')[$key],
        'nama_det'                   => $this->input->post('unama')[$key],
        'usia'     => $this->input->post('uusia')[$key],
        'jenis_kelamin' => $this->input->post('ujeniskelamin')[$key],
        'tempat_lahir'         => $this->input->post('utempatlahir')[$key],
        'tgl_lahir'          => $this->input->post('utgllahir')[$key],
        'faktor_penyebab'          => $this->input->post('ufaktorpenyebab')[$key],
        'alamat'         => $this->input->post('ualamat')[$key],
        'kelurahan'          => $this->input->post('ukelurahan')[$key],
        'kecamatan'          => $this->input->post('ukecamatan')[$key],
        'kota'          => $this->input->post('ukota')[$key],
        'pra_bimroh'          => $this->input->post('uprabimroh')[$key],
        'pasca_bimroh'          => $this->input->post('upascabimroh')[$key]
      );
      $this->Pdm_model->insert_komunitasdetail($data);
    }
    $data = array(

      'id_komunitas'          => $this->input->post('id_komunitas'),
      'nik'                   => $this->input->post('nik'),
      'code'                  =>  $this->input->post('code'),
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
      'jumlah_permohonan'     => str_replace(",", "", $this->input->post('jumlah_permohonan')),
      'jumlah_bantuan'     => str_replace(",", "", $this->input->post('jumlah_bantuan')),
      'sumber_dana'         => $this->input->post('sumber_dana'),
      'periode_bantuan'         => $this->input->post('periode_bantuan'),
      'total_periode'         => $this->input->post('total_periode'),
      'jenis_bantuan'         => $this->input->post('jenis_bantuan'),
      'sifat_bantuan'         => "",
      // 'kunjungan'         => $this->input->post('kunjungan'),

      'deleted_at'            => '0000-00-00 00:00:00',
      'created_by'            => $this->session->username
    );

    $where = $this->input->post('id_transaksi_komunitas');

    $this->Pdm_model->update_komunitas($where, $data);

    write_log();
    $this->session->set_flashdata('message', '
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="alert alert-success">Data update succesfully</div>
          </div>
        </div>
      ');
    redirect('pdm/konselor/');
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
    $this->data['get_all_provinsi']  = $this->Pdm_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Pdm_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Pdm_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Pdm_model->get_all_kelurahan();
    $this->data['penduduk']          = $this->Pdm_model->get_penduduk($id);


    $this->data['data_individu']     = $this->Pdm_model->get_transaksi_individu_by_id($id);
    $this->data['data_komunitas']    = $this->Pdm_model->get_transaksi_komunitas_by_id($id);
    $this->data['detail_individu']   = $this->Pdm_model->get_detail_individu_by_id($id);
    $this->data['detail_komunitas']  = $this->Pdm_model->get_detail_komunitas_by_id($id);

    $data['path'] = base_url('assets');
    $this->load->view('back/pdm/konselor/konselor_detail', $this->data);
  }
  function delete_komunitas($id)
  {
    is_login();
    is_delete();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->Pdm_model->delete_transaksi_komunitas_by_id($id);

    if ($delete) {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Pdm_model->soft_delete_komunitas($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('pdm/konselor/');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('pdm/konselor');
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
    $this->data['get_all_provinsi']  = $this->Pdm_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Pdm_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Pdm_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Pdm_model->get_all_kelurahan();
    $this->data['individu']          = $this->Pdm_model->get_all_admin_individu();
    $this->data['komunitas']         = $this->Pdm_model->get_laporan_komunitas();

    $data['path'] = base_url('assets');
    $this->load->view('back/pdm/laporan/konselor', $this->data);
  }
  //------------------------[ pdm Laporan Admin         ]-----------------------------//

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
    $this->data['get_all_provinsi']  = $this->Pdm_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Pdm_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Pdm_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Pdm_model->get_all_kelurahan();
    $this->data['individu']          = $this->Pdm_model->get_all_admin_individu();
    $this->data['umur'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $umur = $this->data['individu'][$i]->tgl_lahir;
      $res_umur = $this->hitung_umur($umur);
      array_push($this->data['umur'], $res_umur);
    }
    $this->data['komunitas']         = $this->Pdm_model->get_laporan_komunitas();
    // var_dump($this->data);die;
    $data['path'] = base_url('assets');
    $this->load->view('back/pdm/laporan/admin', $this->data);
  }

  function delete_individu($id)
  {
    is_login();
    is_delete();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->Pdm_model->delete_transaksi_individu_by_id($id);

    if ($delete) {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Pdm_model->soft_delete($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('pdm/konselor/');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('pdm/konselor');
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

    $delete = $this->Pdm_model->get_by_id($id);

    if ($delete) {
      $this->Pdm_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('pdm/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('pdm/deleted_list');
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

    $delete = $this->pdm_model->delete_transaksi_komunitas_by_id($id);

    if ($delete) {
      $this->pdm_model->delete_komunitas($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('pdm/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('pdm/deleted_list');
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

    $delete = $this->Pdm_model->get_by_id($id);

    if ($delete) {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Pdm_model->soft_delete($id, $data);

      // $this->write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('pdm/konselor');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('pdm/konselor');
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

    $delete = $this->Pdm_model->get_by_id($id);

    if ($delete) {
      $this->Pdm_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('pdm/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('pdm/deleted_list');
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
    $this->data['komunitas']  = $this->Pdm_model->get_all_deleted_komunitas();
    $this->data['individu']   = $this->Pdm_model->get_all_deleted_individu();
    $this->data['umur'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $umur = $this->data['individu'][$i]->tgl_lahir;
      $res_umur = $this->hitung_umur($umur);
      array_push($this->data['umur'], $res_umur);
    };

    $this->load->view('back/pdm/individu_deleted_list', $this->data);
  }

  function restore_individu($id)
  {
    is_login();
    is_restore();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $row = $this->Pdm_model->get_by_id($id);

    if ($row) {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Pdm_model->update($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('pdm/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('pdm/deleted_list');
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

    $row = $this->Pdm_model->get_transaksi_komunitas_update($id);

    if ($row) {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Pdm_model->update_komunitas($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('pdm/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('pdm/deleted_list');
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


  //------------------------[ DETAIL LAPORAN INDIVIDU & KOMUNITAS ]-----------------------------//
  function detail_laporan_individu($id)
  {
    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['get_all']      = $this->Pdm_model->get_laporan_individu_detail($id);

    if ($this->data['get_all']) {
      $this->data['page_title'] = 'Detail Data ' . $this->data['module'];
      $this->load->view('back/pdm/laporan/detail_laporan_individu', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('pdm');
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

    $this->data['get_all']      = $this->Pdm_model->get_laporan_komunitas_detail($id);

    if ($this->data['get_all']) {
      $this->data['page_title'] = 'Detail Data ' . $this->data['module'];
      $this->load->view('back/pdm/laporan/detail_laporan_komunitas', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('pdm');
    }
  }
  
}
