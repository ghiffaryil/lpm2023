<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shelter extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
    $this->data['module'] = 'Shelter';
    $this->load->model(array('Shelter_model'));
    $this->load->helper(array('url', 'html'));
    $this->load->database();
    $this->data['company_data']          = $this->Company_model->company_profile();
    $this->data['logo_header_template']  = $this->Template_model->logo_header();
    $this->data['navbar_template']       = $this->Template_model->navbar();
    $this->data['sidebar_template']      = $this->Template_model->sidebar();
    $this->data['background_template']   = $this->Template_model->background();
    $this->data['sidebarstyle_template'] = $this->Template_model->sidebarstyle();
    $this->data['btn_submit'] = '<button type="submit" name="button" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>';
    $this->data['btn_reset']  = 'Bersih';
    $this->data['btn_back']   = '<button type="button" onclick="history.back()" class="btn btn-secondary"> Kembali</button>';
    $this->data['btn_add']    = 'Add New Data';
    $this->data['add_action'] = base_url('shelter/create');
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
    $this->data['konselor']   = $this->Shelter_model->get_all_individu();

    $this->data['get_all_provinsi']  = $this->Shelter_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Shelter_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Shelter_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Shelter_model->get_all_kelurahan();
    $this->data['individu']          = $this->Shelter_model->get_all_admin_individu();

    $this->data['nik_pendamping1'] = [];
    $this->data['detail_pendamping1'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $id_pendamping1 = $this->data['individu'][$i]->pendamping1;
      $sql_nik_pendamping1 = "SELECT
                                 penduduk.nik as nik_pendamping1,
                                 penduduk.nama as nama_pendamping1,
                                 penduduk.jk as jk_pendamping1
                                 FROM penduduk
                                 JOIN transaksi_individu
                                 ON penduduk.id_penduduk = transaksi_individu.pendamping1
                                 WHERE transaksi_individu.pendamping1 = $id_pendamping1";
      $res_nik_pendamping1 = $this->db->query($sql_nik_pendamping1)->row();
      array_push($this->data['nik_pendamping1'], $res_nik_pendamping1->nik_pendamping1);

      $dataDetailPendamping = $res_nik_pendamping1->nama_pendamping1;
      array_push($this->data['detail_pendamping1'], $dataDetailPendamping);
    }

    $this->data['nik_pendamping2'] = [];
    $this->data['detail_pendamping2'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $id_pendamping2 = $this->data['individu'][$i]->pendamping2;
      $sql_nik_pendamping2 = "SELECT
                                 penduduk.nik as nik_pendamping2,
                                 penduduk.nama as nama_pendamping2,
                                 penduduk.jk as jk_pendamping2
                                 FROM penduduk
                                 JOIN transaksi_individu
                                 ON penduduk.id_penduduk = transaksi_individu.pendamping2
                                 WHERE transaksi_individu.pendamping2 = $id_pendamping2";
      $res_nik_pendamping2 = $this->db->query($sql_nik_pendamping2)->row();
      array_push($this->data['nik_pendamping2'], $res_nik_pendamping2->nik_pendamping2);

      $dataDetailPendamping2 = $res_nik_pendamping2->nama_pendamping2;
      array_push($this->data['detail_pendamping2'], $dataDetailPendamping2);
    }
    $this->data['umur'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $umur = $this->data['individu'][$i]->tgl_lahir;
      $res_umur = $this->hitung_umur($umur);
      array_push($this->data['umur'], $res_umur);
    }

    $data['path'] = base_url('assets');
    $this->load->view('back/shelter/konselor/konselor_list', $this->data);
  }

  function create($id)
  {
    is_login();
    is_create();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title']       = 'Create New Manfaat Shelter';
    $this->data['header']           =  $this->data['module'];
    $this->data['action_individu']  = 'shelter/create_action_individu';
    $this->data['action_komunitas'] = 'shelter/create_action_komunitas';

    $this->data['data']             = $this->Shelter_model->get_data_individu($id);
    $this->data['komunitas']        = $this->Shelter_model->get_data_komunitas($id);
    $this->data['program']           = $this->Shelter_model->get_program();
    $this->data['subprogram']       = $this->Shelter_model->get_sub_program();
    $this->data['cek_individu']     = $this->Shelter_model->check_transaksi_individu_by_id($id);
    $this->data['cek_komunitas']    = $this->Shelter_model->check_transaksi_komunitas_by_id($id);
    $this->data['notif_individu']   = $this->Shelter_model->get_transaksi_individu_by_date($id);
    $this->data['notif_komunitas']  = $this->Shelter_model->get_transaksi_komunitas_by_date($id);
    $this->data['rekomender']       = $this->Shelter_model->get_rekomender();
    $this->data['datapenduduk']       = $this->Shelter_model->get_datapenduduk();
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
    // var_dump($this->Shelter_model->get_datapenduduk());die;
    $this->load->view('back/shelter/konselor/konselor_add', $this->data);
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
      'kasus'              => "",
      'rencana_bantuan'    => "",
      'mekanisme_bantuan'  => "",

      'jumlah_permohonan'  => 0,
      'jenis_bantuan'      => $this->input->post('jenis_bantuan'),
      'sifat_bantuan'      => $this->input->post('sifat_bantuan'),

      'penghasilan_bulan'      => $this->input->post('penghasilan_bulan'),
      'periode_bantuan'      => $this->input->post('periode_bantuan'),
      'penyakit'      => $this->input->post('penyakit'),
      'sumber_dana'      => $this->input->post('sumber_dana'),
      'total_pendamping'      => $this->input->post('total_pendamping'),
      'total_periode'      => $this->input->post('total_periode'),
      'lama_inap'      => $this->input->post('lama_inap'),
      'pendamping1'      => $this->input->post('det_ktp1'),
      'pendamping2'      => $this->input->post('det_ktp2'),
      'rekomendasi_bantuan '      => "",
      'created_at'         => date('Y-m-d H:i:s'),
      'deleted_at'         => '0000-00-00 00:00:00',
      'created_by'         => $this->session->username
    );

    $this->Shelter_model->insert($data);
    write_log();
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
    redirect(base_url('shelter/konselor'));
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
    $this->data['update_action_individu'] = 'shelter/update_action_individu';

    $this->data['data']        = $this->Shelter_model->get_transaksi_individu_update($id);
    $this->data['rekomender']  = $this->Shelter_model->get_rekomender();
    $this->data['subprogram']  = $this->Shelter_model->get_sub_program();
    $this->data['datapenduduk']       = $this->Shelter_model->get_datapenduduk();

    if ($this->data['data']) {
      $this->load->view('back/shelter/konselor/konselor_edit_individu', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('shelter/konselor/');
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
      'kasus'              => "",
      'rencana_bantuan'    => "",
      'mekanisme_bantuan'  => "",

      'jumlah_permohonan'  => 0,
      'jenis_bantuan'      => $this->input->post('jenis_bantuan'),
      'sifat_bantuan'      => $this->input->post('sifat_bantuan'),

      'penghasilan_bulan'      => $this->input->post('penghasilan_bulan'),
      'periode_bantuan'      => $this->input->post('periode_bantuan'),
      'penyakit'      => $this->input->post('penyakit'),
      'sumber_dana'      => $this->input->post('sumber_dana'),
      'total_pendamping'      => $this->input->post('total_pendamping'),
      'total_periode'      => $this->input->post('total_periode'),
      'lama_inap'      => $this->input->post('lama_inap'),
      'pendamping1'      => $this->input->post('det_ktp1'),
      'pendamping2'      => $this->input->post('det_ktp2'),
      'rekomendasi_bantuan '      => "",



      'deleted_at'         => '0000-00-00 00:00:00',
      'created_by'         => $this->session->username
    );

    $where = $this->input->post('id_transaksi_individu');

    $this->Shelter_model->update($where, $data);

    write_log();
    $this->session->set_flashdata('message', '
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="alert alert-success">Data  update succesfully</div>
          </div>
        </div>
      ');
    redirect('shelter/konselor/');
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

    $this->data['page_title'] = 'Tambah Manfaat';
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

    $this->Shelter_model->insert_komunitas($data);

    foreach ($this->input->post('unik') as $key => $item_id) {
      $data = array(

        'id_trans_komunitas_h'  => $this->input->post('unik')[$key],
        'nik'                   => $this->input->post('unik')[$key],
        'jenispidana_pasal'     => $this->input->post('ujenispasal')[$key],
        'jenispidana_keterangan' => $this->input->post('uketerangan')[$key],
        'masahukuman'         => $this->input->post('umasahukuman')[$key],
        'blokkamar'          => $this->input->post('ublok')[$key]
      );
      $this->Shelter_model->insert_komunitasdetail($data);
    }

    write_log();
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
    redirect(base_url('shelter/konselor'));
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
    $this->data['update_action_komunitas'] = 'shelter/update_action_komunitas';

    $this->data['data']          = $this->Shelter_model->get_transaksi_komunitas_update($id);
    $this->data['komunitas']     = $this->Shelter_model->get_data_komunitas();
    $this->data['program']       = $this->Shelter_model->get_program();
    $this->data['rekomender']    = $this->Shelter_model->get_rekomender();
    $this->data['subprogram']    = $this->Shelter_model->get_sub_program();

    if ($this->data['data']) {
      $this->load->view('back/shelter/konselor/konselor_edit_komunitas', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('shelter/konselor/');
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

    $this->data['page_title'] = 'Edit Manfaat shelter';
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

    $this->Shelter_model->update_komunitas($where, $data);

    write_log();
    $this->session->set_flashdata('message', '
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="alert alert-success">Data update succesfully</div>
          </div>
        </div>
      ');
    redirect('shelter/konselor/');
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
    $this->data['get_all_provinsi']  = $this->Shelter_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Shelter_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Shelter_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Shelter_model->get_all_kelurahan();
    $this->data['penduduk']          = $this->Shelter_model->get_penduduk($id);


    $this->data['data_individu']     = $this->Shelter_model->get_transaksi_individu_by_id($id);
    $this->data['data_komunitas']    = $this->Shelter_model->get_transaksi_komunitas_by_id($id);
    $this->data['detail_individu']   = $this->Shelter_model->get_detail_individu_by_id($id);
    $this->data['detail_komunitas']  = $this->Shelter_model->get_detail_komunitas_by_id($id);

    $data['path'] = base_url('assets');
    $this->load->view('back/shelter/konselor/konselor_detail', $this->data);
  }

  function delete($id)
  {
    is_login();
    is_delete();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->Shelter_model->get_by_id($id);

    if ($delete) {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Shelter_model->soft_delete($id, $data);

      // $this->write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('shelter/konselor/');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('shelter/konselor/');
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

    $delete = $this->Shelter_model->get_by_id($id);

    if ($delete) {
      $this->Shelter_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('shelter/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('shelter/deleted_list');
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
    $this->data['individu']   = $this->Shelter_model->get_all_deleted_individu();

    $this->data['nik_pendamping1'] = [];
    $this->data['detail_pendamping1'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $id_pendamping1 = $this->data['individu'][$i]->pendamping1;
      $sql_nik_pendamping1 = "SELECT
                                 penduduk.nik as nik_pendamping1,
                                 penduduk.nama as nama_pendamping1,
                                 penduduk.jk as jk_pendamping1
                                 FROM penduduk
                                 JOIN transaksi_individu
                                 ON penduduk.id_penduduk = transaksi_individu.pendamping1
                                 WHERE transaksi_individu.pendamping1 = $id_pendamping1";
      $res_nik_pendamping1 = $this->db->query($sql_nik_pendamping1)->row();
      array_push($this->data['nik_pendamping1'], $res_nik_pendamping1->nik_pendamping1);

      $dataDetailPendamping = $res_nik_pendamping1->nama_pendamping1;
      array_push($this->data['detail_pendamping1'], $dataDetailPendamping);
    }

    $this->data['nik_pendamping2'] = [];
    $this->data['detail_pendamping2'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $id_pendamping2 = $this->data['individu'][$i]->pendamping2;
      $sql_nik_pendamping2 = "SELECT
                                 penduduk.nik as nik_pendamping2,
                                 penduduk.nama as nama_pendamping2,
                                 penduduk.jk as jk_pendamping2
                                 FROM penduduk
                                 JOIN transaksi_individu
                                 ON penduduk.id_penduduk = transaksi_individu.pendamping2
                                 WHERE transaksi_individu.pendamping2 = $id_pendamping2";
      $res_nik_pendamping2 = $this->db->query($sql_nik_pendamping2)->row();
      array_push($this->data['nik_pendamping2'], $res_nik_pendamping2->nik_pendamping2);

      $dataDetailPendamping2 = $res_nik_pendamping2->nama_pendamping2;
      array_push($this->data['detail_pendamping2'], $dataDetailPendamping2);
    }
    $this->data['umur'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $umur = $this->data['individu'][$i]->tgl_lahir;
      $res_umur = $this->hitung_umur($umur);
      array_push($this->data['umur'], $res_umur);
    }

    $data['path'] = base_url('assets');
    $this->load->view('back/shelter/individu_deleted_list', $this->data);
  }


  function restore($id)
  {
    is_login();
    is_restore();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $row = $this->Shelter_model->get_by_id($id);

    if ($row) {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Shelter_model->update($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('shelter/deleted_list');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('shelter/deleted_list');
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
    $this->data['get_all_provinsi']  = $this->Shelter_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Shelter_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Shelter_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Shelter_model->get_all_kelurahan();
    $this->data['individu']          = $this->Shelter_model->get_all_admin_individu();
    $this->data['nik_pendamping'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $id_pendamping = $this->data['individu'][$i]->pendamping1;
      $sql_nik_pendamping = "SELECT
                                 `a`.`nik` as `nik_pendamping`
                                 FROM `penduduk` `a`
                                 JOIN `transaksi_individu` `b`
                                 ON `a`.`id_penduduk` = `b`.`pendamping1`
                                 WHERE `b`.`pendamping1` = $id_pendamping";
      $res_nik_pendamping = $this->db->query($sql_nik_pendamping)->row();
      array_push($this->data['nik_pendamping'], $res_nik_pendamping->nik_pendamping);
    }

    $this->data['nik_pendamping1'] = [];
    $this->data['detail_pendamping1'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $id_pendamping1 = $this->data['individu'][$i]->pendamping1;
      $sql_nik_pendamping1 = "SELECT
                                 `a`.`nik` as `nik_pendamping1`,
                                 `a`.`nama` as `nama_pendamping1`,
                                 `a`.`jk` as `jk_pendamping1`
                                 FROM `penduduk` `a`
                                 JOIN `transaksi_individu` `b`
                                 ON `a`.`id_penduduk` = `b`.`pendamping1`
                                 WHERE `b`.`pendamping1` = $id_pendamping1";
      $res_nik_pendamping1 = $this->db->query($sql_nik_pendamping1)->row();
      array_push($this->data['nik_pendamping1'], $res_nik_pendamping1->nik_pendamping1);

      $dataDetailPendamping = "Nik : " . $res_nik_pendamping1->nik_pendamping1 . ", Nama : " . $res_nik_pendamping1->nama_pendamping1 . ", Jenis Kelamin :" . $res_nik_pendamping1->jk_pendamping1;
      array_push($this->data['detail_pendamping1'], $dataDetailPendamping);
      // array_push($this->data['detail_pendamping1'], );
    }
    // $p = implode(" ", $detail_pendamping1);
    // var_dump($p);
    // die;

    $this->data['nik_pendamping2'] = [];
    $this->data['detail_pendamping2'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $id_pendamping2 = $this->data['individu'][$i]->pendamping2;
      $sql_nik_pendamping2 = "SELECT
                                `a`.`nik` as `nik_pendamping2`,
                                 `a`.`nama` as `nama_pendamping2`,
                                 `a`.`jk` as `jk_pendamping2`
                                 FROM `penduduk` `a`
                                 JOIN `transaksi_individu` `b`
                                 ON `a`.`id_penduduk` = `b`.`pendamping2`
                                 WHERE `b`.`pendamping2` = $id_pendamping2";
      $res_nik_pendamping2 = $this->db->query($sql_nik_pendamping2)->row();
      array_push($this->data['nik_pendamping2'], $res_nik_pendamping2->nik_pendamping2);

      $dataDetailPendamping2 = "Nik : " . $res_nik_pendamping2->nik_pendamping2 . ", Nama : " . $res_nik_pendamping2->nama_pendamping2 . ", Jenis Kelamin :" . $res_nik_pendamping2->jk_pendamping2;
      array_push($this->data['detail_pendamping2'], $dataDetailPendamping2);
    }

    $this->data['komunitas']  = $this->Shelter_model->get_laporan_komunitas();

    //sql jumlah provinsi pada program bsl
    $sql_provinsi = "SELECT `penduduk`.`id_provinsi` AS `provinsi`
       FROM  `transaksi_individu`
       LEFT JOIN `penduduk`
       ON `penduduk`.`nik` = `transaksi_individu`.`nik`
       LEFT JOIN `provinsi`
       ON `penduduk`.`id_provinsi` = `provinsi`.`id_provinsi`
       WHERE `transaksi_individu`.`id_program` = 4";
    $res_sql_provinsi = $this->db->query($sql_provinsi)->result_array();
    $arr_prov = [];
    for ($i = 0; $i < count($res_sql_provinsi); $i++) {
      array_push($arr_prov, $res_sql_provinsi[$i]['provinsi']);
    }
    $prov_unique = array_unique($arr_prov);
    $this->data['total_provinsi'] = count($prov_unique);
    //sql jumlah kota pada program PKM
    $sql_kab_kota = "SELECT `penduduk`.`id_kota_kab` AS `kab_kota`, `transaksi_individu`.`total_pendamping` AS `total_pendamping`
    FROM  `transaksi_individu`
    LEFT JOIN `penduduk`
    ON `penduduk`.`nik` = `transaksi_individu`.`nik`
    LEFT JOIN `kota_kab`
    ON `penduduk`.`id_kota_kab` = `kota_kab`.`id_kota_kab`
    WHERE `transaksi_individu`.`id_program` = 4";
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

    //sql jumlah kec pada program bsl
    $sql_kecamatan = "SELECT `penduduk`.`id_kecamatan` AS `kecamatan`
       FROM  `transaksi_individu`
       LEFT JOIN `penduduk`
       ON `penduduk`.`nik` = `transaksi_individu`.`nik`
       LEFT JOIN `kecamatan`
       ON `penduduk`.`id_kecamatan` = `kecamatan`.`id_kecamatan`
       WHERE `transaksi_individu`.`id_program` = 4";
    $res_sql_kecamatan = $this->db->query($sql_kecamatan)->result_array();
    $arr_kecamatan = [];
    for ($i = 0; $i < count($res_sql_kecamatan); $i++) {
      array_push($arr_kecamatan, $res_sql_kecamatan[$i]['kecamatan']);
    }
    $kecamatan_unique = array_unique($arr_kecamatan);
    $this->data['total_kecamatan'] = count($kecamatan_unique);

    //sql JENIS KELAMIN pada program SHELTER
    $sql_jk = "SELECT `penduduk`.`jk` AS `jk`,
      `transaksi_individu`.`jumlah_bantuan` AS `jumlah_bantuan`,
      `transaksi_individu`.`total_pendamping` AS `total_pendamping`
      FROM  `transaksi_individu`
      LEFT JOIN `penduduk`
      ON `penduduk`.`nik` = `transaksi_individu`.`nik`
      WHERE `transaksi_individu`.`id_program` = 4";
    $res_sql_jk = $this->db->query($sql_jk)->result_array();

    $arr_jk = [];
    for ($i = 0; $i < count($res_sql_jk); $i++) {
      $data_jk = [
        "jumlah_pm" => 1,
        "jk" =>  $res_sql_jk[$i]['jk'],
        "jumlah_bantuan" => $res_sql_jk[$i]['jumlah_bantuan'],
        "total_pendamping" => $res_sql_jk[$i]['total_pendamping']
      ];
      array_push($arr_jk, $data_jk);
    }

    $unique_jk = array();
    foreach ($arr_jk as $vals) {
      if (array_key_exists($vals['jk'], $unique_jk)) {
        $unique_jk[$vals['jk']]['jumlah_bantuan'] += $vals['jumlah_bantuan'];
        $unique_jk[$vals['jk']]['jumlah_pm'] += $vals['jumlah_pm'];
        $unique_jk[$vals['jk']]['total_pendamping'] += $vals['total_pendamping'];
      } else {
        $unique_jk[$vals['jk']] = $vals;
      }
    }
    $this->data['total_jk'] = $unique_jk;

    $data['path'] = base_url('assets');
    $this->load->view('back/shelter/laporan/konselor', $this->data);
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
    $this->data['get_all_provinsi']  = $this->Shelter_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Shelter_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Shelter_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Shelter_model->get_all_kelurahan();
    $this->data['individu']          = $this->Shelter_model->get_all_admin_individu();
    $this->data['nik_pendamping1'] = [];
    $this->data['detail_pendamping1'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $id_pendamping1 = $this->data['individu'][$i]->pendamping1;
      $sql_nik_pendamping1 = "SELECT
                                 `a`.`nik` as `nik_pendamping1`,
                                 `a`.`nama` as `nama_pendamping1`,
                                 `a`.`jk` as `jk_pendamping1`
                                 FROM `penduduk` `a`
                                 JOIN `transaksi_individu` `b`
                                 ON `a`.`id_penduduk` = `b`.`pendamping1`
                                 WHERE `b`.`pendamping1` = $id_pendamping1";
      $res_nik_pendamping1 = $this->db->query($sql_nik_pendamping1)->row();
      array_push($this->data['nik_pendamping1'], $res_nik_pendamping1->nik_pendamping1);

      $dataDetailPendamping = "Nik : " . $res_nik_pendamping1->nik_pendamping1 . ", Nama : " . $res_nik_pendamping1->nama_pendamping1 . ", Jenis Kelamin :" . $res_nik_pendamping1->jk_pendamping1;
      array_push($this->data['detail_pendamping1'], $dataDetailPendamping);
      // array_push($this->data['detail_pendamping1'], );
    }
    // $p = implode(" ", $detail_pendamping1);
    // var_dump($p);
    // die;

    $this->data['nik_pendamping2'] = [];
    $this->data['detail_pendamping2'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $id_pendamping2 = $this->data['individu'][$i]->pendamping2;
      $sql_nik_pendamping2 = "SELECT
                                `a`.`nik` as `nik_pendamping2`,
                                 `a`.`nama` as `nama_pendamping2`,
                                 `a`.`jk` as `jk_pendamping2`
                                 FROM `penduduk` `a`
                                 JOIN `transaksi_individu` `b`
                                 ON `a`.`id_penduduk` = `b`.`pendamping2`
                                 WHERE `b`.`pendamping2` = $id_pendamping2";
      $res_nik_pendamping2 = $this->db->query($sql_nik_pendamping2)->row();
      array_push($this->data['nik_pendamping2'], $res_nik_pendamping2->nik_pendamping2);

      $dataDetailPendamping2 = "Nik : " . $res_nik_pendamping2->nik_pendamping2 . ", Nama : " . $res_nik_pendamping2->nama_pendamping2 . ", Jenis Kelamin :" . $res_nik_pendamping2->jk_pendamping2;
      array_push($this->data['detail_pendamping2'], $dataDetailPendamping2);
    }
    $this->data['umur'] = [];
    for ($i = 0; $i < count($this->data['individu']); $i++) {
      $umur = $this->data['individu'][$i]->tgl_lahir;
      $res_umur = $this->hitung_umur($umur);
      array_push($this->data['umur'], $res_umur);
    }
    $this->data['komunitas']         = $this->Shelter_model->get_laporan_komunitas();
    // var_dump($this->data);die;
    $data['path'] = base_url('assets');
    $this->load->view('back/shelter/laporan/admin', $this->data);
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


  // -------------- DETAIL LAPORAN INDIVIDU --------------
  function detail_laporan_individu($id, $total_periode)
  {
    is_login();
    is_update();

    if (!is_superadmin()) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['get_all']      = $this->Shelter_model->get_laporan_individu_detail($id, $total_periode);

    if ($this->data['get_all']) {
      $this->data['page_title'] = 'Detail Data ' . $this->data['module'];
      $this->load->view('back/shelter/laporan/detail_laporan_individu', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
      redirect('shelter/konselor/');
    }
  }
}
