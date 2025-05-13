<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Noreg extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->data['module'] = 'Non Reguler';

        $this->load->model(array('Noreg_model'));

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
        $this->data['add_action'] = base_url('Noreg/create');
    }

    function index()
    {
        is_login();
        is_read();

        if (!is_superadmin()) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
            redirect('dashboard');
        }

        $this->data['page_title'] = $this->data['module'];
        $this->data['header'] = $this->data['module'];

        $this->data['konselor']  = $this->Noreg_model->get_all_individu();
        // $this->data['individu']  = $this->Noreg_model->get_all_admin_individu();
        $sql_data_individu = "SELECT *
                                FROM `transaksi_individu` `a`
                                JOIN `komunitas` `b`
                                ON `a`.`nama` = `b`.`id_komunitas`
                                JOIN `rekomender` `c`
                                ON `a`.`info_bantuan` = `c`.`id_rekomender`
                                JOIN `program` `d`
                                ON `a`.`id_program` = `d`.`id_program`
                                JOIN `sub_program` `e`
                                ON `a`.`id_subprogram` = `e`.`id_subprogram`
                                WHERE `a`.`id_program` = 10
                                AND `a`.`is_delete` = 0 ";
        $res_data_individu = $this->db->query($sql_data_individu)->result();
        $this->data['individu']  = $res_data_individu;

        // $this->data['komunitas'] = $this->Noreg_model->get_laporan_komunitas();
        $sql_data_komunitas = "SELECT *
                               FROM `transaksi_komunitas` `a`
                               JOIN `komunitas` `b`
                               ON `a`.`id_komunitas` = `b`.`id_komunitas`
                               JOIN `rekomender` `c`
                               ON `a`.`info_bantuan` = `c`.`id_rekomender`
                               JOIN `program` `d`
                               ON `a`.`id_program` = `d`.`id_program`
                               JOIN `sub_program` `e`
                               ON `a`.`id_subprogram` = `e`.`id_subprogram`
                               WHERE `a`.`id_program` = 10
                               AND `a`.`is_delete` = 0";
        $res_data_komunitas = $this->db->query($sql_data_komunitas)->result();
        $this->data['komunitas'] = $res_data_komunitas;

        $data['path'] = base_url('assets');

        $this->load->view('back/noreg/konselor/konselor_list', $this->data);
    }

    public function get_data_penduduk()
    {
        $nik  = $this->input->get('nik');
        $data = $this->Noreg_model->get_nik_penduduk($nik);
        echo json_encode($data);
    }

    public function get_data_Noreg()
    {
        $nama_Noreg  = $this->input->get('nama_Noreg');
        $data = $this->Noreg_model->get_data_Noreg($nama_Noreg);
        echo json_encode($data);
    }

    // function create($id)
    function create()
    {
        is_login();
        is_create();

        if (!is_superadmin()) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
            redirect('dashboard');
        }

        $this->data['page_title'] = 'Create New ' . $this->data['module'];
        $this->data['sub']        = "Tambah noreg";
        $this->data['header']     = $this->data['module'];
        $this->data['action_individu']  = "noreg/create_action_individu";
        $this->data['action_komunitas'] = 'noreg/create_action_komunitas';


        $this->data['get_all_provinsi']  = $this->Noreg_model->get_all_provinsi();
        $this->data['get_all_kabupaten'] = $this->Noreg_model->get_all_kabupaten();
        $this->data['get_all_kecamatan'] = $this->Noreg_model->get_all_kecamatan();
        $this->data['get_all_kelurahan'] = $this->Noreg_model->get_all_kelurahan();

        // $this->data['data']             = $this->Noreg_model->get_data_individu($id);
        $this->data['komunitas']        = $this->Noreg_model->get_data_komunitas_by_program();
        $this->data['konselor']         = $this->Noreg_model->get_all_individu();
        $this->data['program']          = $this->Noreg_model->get_program();
        $this->data['subprogram']       = $this->Noreg_model->get_sub_program();
        // $this->data['cek_individu']     = $this->Noreg_model->check_transaksi_individu_by_id($id);
        // $this->data['cek_komunitas']    = $this->Noreg_model->check_transaksi_komunitas_by_id($id);
        // $this->data['notif_individu']   = $this->Noreg_model->get_transaksi_individu_by_date($id);
        // $this->data['notif_komunitas']  = $this->Noreg_model->get_transaksi_komunitas_by_date($id);
        $this->data['rekomender']       = $this->Noreg_model->get_rekomender();
        $this->data['datapenduduk']     = $this->Noreg_model->get_datapenduduk();
        $this->data['petugas'] = $this->Noreg_model->get_petugas();

        $this->load->view('back/noreg/noreg_add', $this->data);
    }

    function create_action_individu()
    {
        $this->form_validation->set_rules('nama_donatur', 'nama_donatur', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() === FALSE) {
            $this->create();
        } else {
            //insert ke table transaksi_individu
            $data2 = array(
                // 'id_individu'        => $this->input->post('id_individu'),
                // 'nik'                => $this->input->post('nik'),
                'nama'               => $this->input->post('nama_donatur'),
                'id_program'         => '10',
                'id_subprogram'      => $this->input->post('id_subprogram'),
                'jenis_bantuan'      => $this->input->post('jenis_bantuan'),
                'info_bantuan'       => $this->input->post('info_bantuan'),
                'asnaf'              => $this->input->post('asnaf'),
                'sumber_dana'        => $this->input->post('sumber_dana'),
                'periode_bantuan'    => $this->input->post('periode_bantuan'),
                'total_periode'      => $this->input->post('total_periode'),
                'jumlah_bantuan'     => $this->input->post('jumlah_bantuan'),
                'nama_pic'           => $this->input->post('nama_pic'),
                'lokasi_program'     => $this->input->post('lokasi_program'),
                'jumlah_pm'          => $this->input->post('jumlah_pm'),
                'deleted_at'         => '0000-00-00 00:00:00',
                'created_by'         => $this->session->username,
            );

            $this->Noreg_model->insert_individu($data2);
            write_log();

            $get_last_id = "SELECT id_transaksi_individu FROM transaksi_individu ORDER BY id_transaksi_individu DESC limit 1";
            $res_last_id = $this->db->query($get_last_id)->row();
            $last_id = $res_last_id->id_transaksi_individu;

            foreach ($this->input->post('Nama') as $key => $item_id) {
                $unama_ = str_replace("\r\n ", "", $this->input->post('unama')[$key]);
                $unama = trim($unama_);
                $unik = $this->input->post('unik')[$key];


                $sql_insert = "INSERT INTO transaksi_individu_d (id_transaksi_individu, nama_pm, nik_pm)
                VALUES ('$last_id', '$unama', '$unik')";
                $this->db->query($sql_insert);
            }


            $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
            redirect('noreg');
        }
    }

    function create_action_komunitas()
    {
        is_login();
        is_update();

        if (!is_superadmin()) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
            redirect('dashboard');
        }

        $this->data['page_title'] = 'Tambah Manfaat Noreg';
        $this->data['header']     = $this->data['module'];
        $code  = $this->Noreg_model->autonumber();
        $number = 0;
        // foreach ($this->input->post('Nama') as $key => $item_id) {
        //     $number += 1;
        //     $data = array(
        //         'id_trans_komunitas_h'  => $code,
        //         'nama_det'              => $this->input->post('unama')[$key],
        //         'nik'                   => $this->input->post('unik')[$key]

        //     );
        //     $this->Noreg_model->insert_komunitasdetail($data);
        // }
        $data = array(

            'id_komunitas'          => $this->input->post('nama_donatur'),
            // 'nik'                   => $this->input->post('nik'),
            // 'code'                  =>  $code,
            // 'nama'                  => $this->input->post('nama'),
            'info_bantuan'          => $this->input->post('info_bantuan'),
            'jumlah_bantuan'     => $this->input->post('jumlah_bantuan'),

            'id_program'            => 10,
            'periode_bantuan' => $this->input->post('periode_bantuan'),
            'total_periode' => $this->input->post('total_periode'),
            'nama_pic'   => $this->input->post('nama_pic'),
            'jumlah_pm'             => $this->input->post('jumlah_pm'),
            'asnaf'                 => $this->input->post('asnaf'),

            'id_subprogram'         => $this->input->post('id_subprogram'),
            'jenis_bantuan'         => $this->input->post('jenis_bantuan'),
            'sumber_dana'         => $this->input->post('sumber_dana'),
            'lokasi_program'       => $this->input->post('lokasi_program'),

            'deleted_at'            => '0000-00-00 00:00:00',
            'created_by'            => $this->session->username
        );

        $this->Noreg_model->insert_komunitas($data);
        write_log();
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect(base_url('noreg'));
    }

    function detail_laporan_individu($id)
    {
        is_login();
        is_update();

        if (!is_superadmin()) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
            redirect('dashboard');
        }

        $this->data['konselor']         = $this->Noreg_model->get_all_individu();
        $this->data['komunitas']        = $this->Noreg_model->get_data_komunitas_by_program();
        $this->data['program']          = $this->Noreg_model->get_program();
        $this->data['subprogram']       = $this->Noreg_model->get_sub_program();
        $this->data['page_title']  = 'Update Data ' . $this->data['module'];
        // $this->data['update_action_individu'] = 'noreg/update_action_individu';

        $this->data['rekomender']  = $this->Noreg_model->get_rekomender();
        $this->data['subprogram']  = $this->Noreg_model->get_sub_program();

        $sql_data_individu = "SELECT *
                                FROM `transaksi_individu` `a`
                                JOIN `komunitas` `b`
                                ON `a`.`nama` = `b`.`id_komunitas`
                                JOIN `rekomender` `c`
                                ON `a`.`info_bantuan` = `c`.`id_rekomender`
                                JOIN `program` `d`
                                ON `a`.`id_program` = `d`.`id_program`
                                JOIN `sub_program` `e`
                                ON `a`.`id_subprogram` = `e`.`id_subprogram`
                                WHERE `a`.`id_transaksi_individu` = $id ";
        $res_data_individu = $this->db->query($sql_data_individu)->row();
        $this->data['data']        = $res_data_individu;

        $sql_pm = "SELECT *
                   FROM `transaksi_individu` `a`
                   JOIN `transaksi_individu_d` `b`
                   ON `a`.`id_transaksi_individu` = `b`.`id_transaksi_individu`
                   JOIN `penduduk` `c`
                   ON `c`.`nik` = `b`.`nik_pm`
                   JOIN `provinsi` `d`
                   ON `d`.`id_provinsi` = `c`.`id_provinsi`
                   JOIN `kecamatan` `e`
                   ON `e`.`id_kecamatan` = `c`.`id_kecamatan`
                   JOIN `kota_kab` `f`
                   ON `f`.`id_kota_kab` = `c`.`id_kota_kab`
                   JOIN `desa_kelurahan` `g`
                   ON `g`.`id_desa_kelurahan` = `c`.`id_desa_kelurahan`
                   WHERE `a`.`id_transaksi_individu` = '$id' ";

        $res_pm = $this->db->query($sql_pm)->result();
        $this->data['res_pm'] = $res_pm;

        if ($this->data['data']) {
            $this->load->view('back/noreg/laporan/detail_laporan_individu', $this->data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
            redirect('noreg/laporan_admin');
        }
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
        $this->data['get_all_provinsi']  = $this->Noreg_model->get_all_provinsi();
        $this->data['get_all_kabupaten'] = $this->Noreg_model->get_all_kabupaten();
        $this->data['get_all_kecamatan'] = $this->Noreg_model->get_all_kecamatan();
        $this->data['get_all_kelurahan'] = $this->Noreg_model->get_all_kelurahan();
        // $this->data['individu']          = $this->Noreg_model->get_all_admin_individu();
        // $this->data['umur'] = [];
        // for ($i = 0; $i < count($this->data['individu']); $i++) {
        //     $umur = $this->data['individu'][$i]->tgl_lahir;
        //     $res_umur = $this->hitung_umur($umur);
        //     array_push($this->data['umur'], $res_umur);
        // }

        $sql_data_individu = "SELECT *
                                FROM `transaksi_individu` `a`
                                JOIN `komunitas` `b`
                                ON `a`.`nama` = `b`.`id_komunitas`
                                JOIN `rekomender` `c`
                                ON `a`.`info_bantuan` = `c`.`id_rekomender`
                                JOIN `program` `d`
                                ON `a`.`id_program` = `d`.`id_program`
                                JOIN `sub_program` `e`
                                ON `a`.`id_subprogram` = `e`.`id_subprogram`
                                WHERE `a`.`id_program` = 10
                                AND `a`.`is_delete` = 0 ";
        $res_data_individu = $this->db->query($sql_data_individu)->result();
        $this->data['individu']  = $res_data_individu;


        // $this->data['komunitas']         = $this->Noreg_model->get_laporan_komunitas();
        $sql_data_komunitas = "SELECT *
                                FROM `transaksi_komunitas` `a`
                                JOIN `komunitas` `b`
                                ON `a`.`id_komunitas` = `b`.`id_komunitas`
                                JOIN `rekomender` `c`
                                ON `a`.`info_bantuan` = `c`.`id_rekomender`
                                JOIN `program` `d`
                                ON `a`.`id_program` = `d`.`id_program`
                                JOIN `sub_program` `e`
                                ON `a`.`id_subprogram` = `e`.`id_subprogram`
                                WHERE `a`.`id_program` = 10
                                AND `a`.`is_delete` = 0";
        $res_data_komunitas = $this->db->query($sql_data_komunitas)->result();
        $this->data['komunitas'] = $res_data_komunitas;

        $data['path'] = base_url('assets');
        $this->load->view('back/noreg/laporan/admin', $this->data);
    }

    function detail_laporan_komunitas($id)
    {
        is_login();
        is_update();

        if (!is_superadmin()) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
            redirect('dashboard');
        }
        // var_dump($this->Noreg_model->get_transaksi_komunitasdetail_update($id));die;
        $this->data['page_title']  = 'Update Data ' . $this->data['module'];
        $this->data['update_action_komunitas'] = 'noreg/update_action_komunitas';

        $this->data['data']          = $this->Noreg_model->get_transaksi_komunitas_update($id);
        $this->data['detail']        = $this->Noreg_model->get_transaksi_komunitasdetail_update($id);
        $this->data['komunitas']     = $this->Noreg_model->get_data_komunitas();
        $this->data['program']       = $this->Noreg_model->get_program();
        $this->data['rekomender']    = $this->Noreg_model->get_rekomender();
        $this->data['subprogram']    = $this->Noreg_model->get_sub_program();
        $this->data['jk'] = [
            'name'          => 'jk',
            'id'            => 'jk',
            'class'         => 'form-control',
            'autocomplete'  => 'off',
            'value'         => $this->form_validation->set_value('jk'),
        ];
        $this->data['jk_value'] = [
            ''              => 'Tidak ada keterangan',
            'L'             => 'Laki-laki',
            'P'             => 'Perempuan',
        ];
        if ($this->data['data']) {
            $this->load->view('back/noreg/laporan/detail_laporan_komunitas', $this->data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
            redirect('noreg/laporan_admin');
        }
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

    // function laporan_pusat()
    // {
    //     is_login();
    //     is_read();

    //     if (!is_superadmin()) {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
    //         redirect('dashboard');
    //     }

    //     $this->data['page_title']        = 'Data ' . $this->data['module'];
    //     $this->data['header']            = 'Laporan Konselor';
    //     $this->data['get_all_provinsi']  = $this->Noreg_model->get_all_provinsi();
    //     $this->data['get_all_kabupaten'] = $this->Noreg_model->get_all_kabupaten();
    //     $this->data['get_all_kecamatan'] = $this->Noreg_model->get_all_kecamatan();
    //     $this->data['get_all_kelurahan'] = $this->Noreg_model->get_all_kelurahan();
    //     $this->data['individu']          = $this->Noreg_model->get_all_admin_individu();
    //     $this->data['komunitas']         = $this->Noreg_model->get_laporan_komunitas();


    //     $data['path'] = base_url('assets');
    //     $this->load->view('back/noreg/laporan/konselor', $this->data);
    // }

    function laporan_pusat()
    {
        is_login();
        is_read();

        if (!is_superadmin()) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
            redirect('dashboard');
        }

        $this->data['page_title']        = 'Data ' . $this->data['module'];
        $this->data['header']            = 'Laporan Admin';
        $this->data['get_all_provinsi']  = $this->Noreg_model->get_all_provinsi();
        $this->data['get_all_kabupaten'] = $this->Noreg_model->get_all_kabupaten();
        $this->data['get_all_kecamatan'] = $this->Noreg_model->get_all_kecamatan();
        $this->data['get_all_kelurahan'] = $this->Noreg_model->get_all_kelurahan();
        // $this->data['individu']          = $this->Noreg_model->get_all_admin_individu();
        // $this->data['umur'] = [];
        // for ($i = 0; $i < count($this->data['individu']); $i++) {
        //     $umur = $this->data['individu'][$i]->tgl_lahir;
        //     $res_umur = $this->hitung_umur($umur);
        //     array_push($this->data['umur'], $res_umur);
        // }

        $sql_data_individu = "SELECT *
                                FROM `transaksi_individu` `a`
                                JOIN `komunitas` `b`
                                ON `a`.`nama` = `b`.`id_komunitas`
                                JOIN `rekomender` `c`
                                ON `a`.`info_bantuan` = `c`.`id_rekomender`
                                JOIN `program` `d`
                                ON `a`.`id_program` = `d`.`id_program`
                                JOIN `sub_program` `e`
                                ON `a`.`id_subprogram` = `e`.`id_subprogram`
                                WHERE `a`.`id_program` = 10
                                AND `a`.`is_delete` = 0 ";
        $res_data_individu = $this->db->query($sql_data_individu)->result();
        $this->data['individu']  = $res_data_individu;


        // $this->data['komunitas']         = $this->Noreg_model->get_laporan_komunitas();
        $sql_data_komunitas = "SELECT *
                                FROM `transaksi_komunitas` `a`
                                JOIN `komunitas` `b`
                                ON `a`.`id_komunitas` = `b`.`id_komunitas`
                                JOIN `rekomender` `c`
                                ON `a`.`info_bantuan` = `c`.`id_rekomender`
                                JOIN `program` `d`
                                ON `a`.`id_program` = `d`.`id_program`
                                JOIN `sub_program` `e`
                                ON `a`.`id_subprogram` = `e`.`id_subprogram`
                                WHERE `a`.`id_program` = 10
                                AND `a`.`is_delete` = 0";
        $res_data_komunitas = $this->db->query($sql_data_komunitas)->result();
        $this->data['komunitas'] = $res_data_komunitas;

        $data['path'] = base_url('assets');
        $this->load->view('back/noreg/laporan/pusat', $this->data);
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
        $this->data['get_all_provinsi']  = $this->Noreg_model->get_all_provinsi();
        $this->data['get_all_kabupaten'] = $this->Noreg_model->get_all_kabupaten();
        $this->data['get_all_kecamatan'] = $this->Noreg_model->get_all_kecamatan();
        $this->data['get_all_kelurahan'] = $this->Noreg_model->get_all_kelurahan();
        $this->data['penduduk']          = $this->Noreg_model->get_penduduk($id);


        $this->data['data_individu']     = $this->Noreg_model->get_transaksi_individu_by_id($id);
        $this->data['data_komunitas']    = $this->Noreg_model->get_transaksi_komunitas_by_id($id);
        $this->data['detail_individu']   = $this->Noreg_model->get_detail_individu_by_id($id);
        $this->data['detail_komunitas']  = $this->Noreg_model->get_detail_komunitas_by_id($id);

        $data['path'] = base_url('assets');
        $this->load->view('back/noreg/konselor/konselor_detail', $this->data);
    }

    function update_individu($id)
    {
        is_login();
        is_update();

        if (!is_superadmin()) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
            redirect('dashboard');
        }


        $this->data['konselor']         = $this->Noreg_model->get_all_individu();
        $this->data['komunitas']        = $this->Noreg_model->get_data_komunitas_by_program();
        $this->data['program']          = $this->Noreg_model->get_program();
        $this->data['subprogram']       = $this->Noreg_model->get_sub_program();
        $this->data['page_title']  = 'Update Data ' . $this->data['module'];
        $this->data['update_action_individu'] = 'noreg/update_action_individu';

        // $this->data['data']        = $this->Noreg_model->get_transaksi_individu_update($id);
        $this->data['rekomender']  = $this->Noreg_model->get_rekomender();
        $this->data['subprogram']  = $this->Noreg_model->get_sub_program();


        $sql_data_individu = "SELECT *
                                FROM `transaksi_individu` `a`
                                JOIN `komunitas` `b`
                                ON `a`.`nama` = `b`.`id_komunitas`
                                JOIN `rekomender` `c`
                                ON `a`.`info_bantuan` = `c`.`id_rekomender`
                                JOIN `program` `d`
                                ON `a`.`id_program` = `d`.`id_program`
                                JOIN `sub_program` `e`
                                ON `a`.`id_subprogram` = `e`.`id_subprogram`
                                WHERE `a`.`id_transaksi_individu` = $id ";
        $res_data_individu = $this->db->query($sql_data_individu)->row();
        $this->data['data']        = $res_data_individu;
        // var_dump($this->data['data']);
        // die;
        $sql_pm = "SELECT *
                   FROM `transaksi_individu` `a`
                   JOIN `transaksi_individu_d` `b`
                   ON `a`.`id_transaksi_individu` = `b`.`id_transaksi_individu`
                   JOIN `penduduk` `c`
                   ON `c`.`nik` = `b`.`nik_pm`
                   JOIN `provinsi` `d`
                   ON `d`.`id_provinsi` = `c`.`id_provinsi`
                   JOIN `kecamatan` `e`
                   ON `e`.`id_kecamatan` = `c`.`id_kecamatan`
                   JOIN `kota_kab` `f`
                   ON `f`.`id_kota_kab` = `c`.`id_kota_kab`
                   JOIN `desa_kelurahan` `g`
                   ON `g`.`id_desa_kelurahan` = `c`.`id_desa_kelurahan`
                   WHERE `a`.`id_transaksi_individu` = '$id' ";
        $res_pm = $this->db->query($sql_pm)->result();
        $this->data['res_pm'] = $res_pm;


        if ($this->data['data']) {
            $this->load->view('back/noreg/konselor/konselor_edit_individu', $this->data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
            redirect('noreg/konselor/');
        }
    }

    function update_action_individu()
    {
        $data = array(
            'nama'               => $this->input->post('nama_donatur'),
            'id_program'         => '10',
            'id_subprogram'      => $this->input->post('id_subprogram'),
            'jenis_bantuan'      => $this->input->post('jenis_bantuan'),
            'info_bantuan'       => $this->input->post('info_bantuan'),
            'asnaf'              => $this->input->post('asnaf'),
            'sumber_dana'        => $this->input->post('sumber_dana'),
            'periode_bantuan'    => $this->input->post('periode_bantuan'),
            'total_periode'      => $this->input->post('total_periode'),
            'jumlah_bantuan'     => $this->input->post('jumlah_bantuan'),
            'nama_pic'           => $this->input->post('nama_pic'),
            'lokasi_program'     => $this->input->post('lokasi_program'),
            'jumlah_pm'          => $this->input->post('jumlah_pm'),
            'deleted_at'         => '0000-00-00 00:00:00',
            'created_by'         => $this->session->username,
        );
        $where = $this->input->post('id_transaksi_individu');
        $this->Noreg_model->update($where, $data);
        write_log();

        $last_id = $this->input->post('id_transaksi_individu');
        //hapus dulu
        $sql_delete_trx = "DELETE FROM `transaksi_individu_d` WHERE id_transaksi_individu = $last_id";
        $res_delete_trx = $this->db->query($sql_delete_trx);
        //baru insert
        foreach ($this->input->post('Nama') as $key => $item_id) {
            $unama_ = str_replace("\r\n ", "", $this->input->post('unama')[$key]);
            $unama = trim($unama_);
            $unik = $this->input->post('unik')[$key];


            $sql_insert = "INSERT INTO transaksi_individu_d (id_transaksi_individu, nama_pm, nik_pm)
            VALUES ('$last_id', '$unama', '$unik')";
            $this->db->query($sql_insert);
        }


        $this->session->set_flashdata('message', '
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="alert alert-success">Data update succesfully</div>
            </div>
          </div>
        ');
        redirect('noreg/index/');
    }

    function update_komunitas($id)
    {
        is_login();
        is_update();

        if (!is_superadmin()) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
            redirect('dashboard');
        }
        // var_dump($this->Noreg_model->get_transaksi_komunitasdetail_update($id));die;
        $this->data['page_title']  = 'Update Data ' . $this->data['module'];
        $this->data['update_action_komunitas'] = 'noreg/update_action_komunitas';

        $this->data['data']          = $this->Noreg_model->get_transaksi_komunitas_update($id);
        $this->data['detail']        = $this->Noreg_model->get_transaksi_komunitasdetail_update($id);
        $this->data['komunitas']     = $this->Noreg_model->get_data_komunitas();
        $this->data['program']       = $this->Noreg_model->get_program();
        $this->data['rekomender']    = $this->Noreg_model->get_rekomender();
        $this->data['subprogram']    = $this->Noreg_model->get_sub_program();
        $this->data['jk'] = [
            'name'          => 'jk',
            'id'            => 'jk',
            'class'         => 'form-control',
            'autocomplete'  => 'off',
            'value'         => $this->form_validation->set_value('jk'),
        ];
        $this->data['jk_value'] = [
            ''              => 'Tidak ada keterangan',
            'L'             => 'Laki-laki',
            'P'             => 'Perempuan',
        ];
        if ($this->data['data']) {
            $this->load->view('back/noreg/konselor/konselor_edit_komunitas', $this->data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
            redirect('noreg/konselor/konselor_list');
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

        $this->data['page_title'] = 'Edit Non Reguler';
        $this->data['header']     = $this->data['module'];
        $jml = 1;

        // var_dump($this->input->post('Nama'));
        // die;

        $this->data['page_title'] = 'Edit Non Reguler';
        $this->data['header']     = $this->data['module'];
        $jml = 1;
        $iddet =  $this->input->post('id_transaksi_komunitas');
        // $delete_detail = "DELETE FROM transaksi_komunitas_d WHERE id_trans_komunitas_h = $iddet";
        // $this->db->query($delete_detail);
        // foreach ($this->input->post('Nama') as $key => $item_id) {
        //     $jml  += 1;
        //     // $delete = $this->Noreg_model->get_by_id_detail($iddet);
        //     // if ($delete) {
        //     //     $this->Noreg_model->deletedetail($iddet);
        //     // }

        //     $data = array(
        //         'id_trans_komunitas_h'  => $iddet,
        //         'nama_det'              => $this->input->post('unama')[$key],
        //         'nik'                   => $this->input->post('unik')[$key]
        //     );
        //     $this->Noreg_model->insert_komunitasdetail($data);
        // }

        // if ($this->input->post('Nama') != NULL) {
        //     $jml  += 1;
        //     $iddet =  $this->input->post('uid')[$key];
        //     $delete = $this->Bsl_model->get_by_id_detail($iddet);
        //     if ($delete) {
        //         $this->Bsl_model->deletedetail($iddet);
        //     }
        //     $data = array(
        //         'id_trans_komunitas_h'  => $code,
        //         'nama_det'              => $this->input->post('unama')[$key],
        //         'nik'                   => $this->input->post('unik')[$key]
        //     );
        //     // var_dump($data);
        //     $this->Noreg_model->insert_komunitasdetail($data);
        // }

        // die;

        $data = array(
            'id_komunitas'          => $this->input->post('id_komunitas'),
            // 'nik'                   => $this->input->post('nik'),
            // 'code'                  =>  $iddet,
            'nama'                  => $this->input->post('nama'),
            'jumlah_pm'             => $this->input->post('jumlah_pm'),
            'info_bantuan'          => $this->input->post('info_bantuan'),
            'asnaf'                 => $this->input->post('asnaf'),
            'jumlah_bantuan'     => $this->input->post('jumlah_bantuan'),

            'id_program'            => 10,
            'id_subprogram'         => $this->input->post('id_subprogram'),
            'periode_bantuan' => $this->input->post('periode_bantuan'),
            'total_periode' => $this->input->post('total_periode'),
            'jenis_bantuan'         => $this->input->post('jenis_bantuan'),
            'nama_pic'   => $this->input->post('nama_pic'),

            'sumber_dana'         => $this->input->post('sumber_dana'),
            'lokasi_program'       => $this->input->post('lokasi_program'),

            'deleted_at'            => '0000-00-00 00:00:00',
            'created_by'            => $this->session->username
        );

        $where = $this->input->post('id_transaksi_komunitas');

        $this->Noreg_model->update_komunitas($where, $data);

        write_log();
        $this->session->set_flashdata('message', '
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="alert alert-success">Data update succesfully</div>
            </div>
          </div>
        ');
        redirect('noreg/index');
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
        // $this->data['komunitas'] = $this->Noreg_model->get_all_deleted_komunitas();
        $sql_data_komunitas = "SELECT *
                                FROM `transaksi_komunitas` `a`
                                JOIN `komunitas` `b`
                                ON `a`.`id_komunitas` = `b`.`id_komunitas`
                                JOIN `rekomender` `c`
                                ON `a`.`info_bantuan` = `c`.`id_rekomender`
                                JOIN `program` `d`
                                ON `a`.`id_program` = `d`.`id_program`
                                JOIN `sub_program` `e`
                                ON `a`.`id_subprogram` = `e`.`id_subprogram`
                                WHERE `a`.`id_program` = 10
                                AND `a`.`is_delete` = 1";
        $res_data_komunitas = $this->db->query($sql_data_komunitas)->result();
        $this->data['komunitas'] = $res_data_komunitas;
        // $this->data['individu']  = $this->Noreg_model->get_all_deleted_individu();
        $sql_data_individu = "SELECT *
                                FROM `transaksi_individu` `a`
                                JOIN `komunitas` `b`
                                ON `a`.`nama` = `b`.`id_komunitas`
                                JOIN `rekomender` `c`
                                ON `a`.`info_bantuan` = `c`.`id_rekomender`
                                JOIN `program` `d`
                                ON `a`.`id_program` = `d`.`id_program`
                                JOIN `sub_program` `e`
                                ON `a`.`id_subprogram` = `e`.`id_subprogram`
                                WHERE `a`.`id_program` = 10
                                AND `a`.`is_delete` = 1 ";
        $res_data_individu = $this->db->query($sql_data_individu)->result();
        $this->data['individu']  = $res_data_individu;


        $data['path'] = base_url('assets');
        $this->load->view('back/noreg/konselor/individu_deleted_list', $this->data);
    }

    function delete_individu($id)
    {
        is_login();
        is_delete();

        if (!is_superadmin()) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
            redirect('dashboard');
        }

        $delete = $this->Noreg_model->delete_transaksi_individu_by_id($id);

        if ($delete) {
            $data = array(
                'is_delete'   => '1',
                'deleted_by'  => $this->session->username,
                'deleted_at'  => date('Y-m-d H:i:a'),
            );

            $this->Noreg_model->soft_delete($id, $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
            redirect('noreg');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
            redirect('noreg');
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

        $row = $this->Noreg_model->get_by_id($id);

        if ($row) {
            $data = array(
                'is_delete'   => '0',
                'deleted_by'  => NULL,
                'deleted_at'  => NULL,
            );

            $this->Noreg_model->update($id, $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
            redirect('noreg/deleted_list');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
            redirect('noreg/deleted_list');
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

        $delete = $this->Noreg_model->get_by_id($id);

        if ($delete) {
            $this->Noreg_model->delete($id);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
            redirect('noreg/deleted_list');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
            redirect('noreg/deleted_list');
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

        $delete = $this->Noreg_model->delete_transaksi_komunitas_by_id($id);

        if ($delete) {
            $data = array(
                'is_delete'   => '1',
                'deleted_by'  => $this->session->username,
                'deleted_at'  => date('Y-m-d H:i:a'),
            );

            $this->Noreg_model->soft_delete_komunitas($id, $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
            redirect('noreg');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
            redirect('noreg');
        }
    }

    function restore_komunitas($id)
    {
        // var_dump($id);
        // die;
        is_login();
        is_restore();

        if (!is_superadmin()) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
            redirect('dashboard');
        }

        $row = $this->Noreg_model->delete_transaksi_komunitas_by_id($id);

        if ($row) {
            $data = array(
                'is_delete'   => '0',
                'deleted_by'  => NULL,
                'deleted_at'  => NULL,
            );

            $this->Noreg_model->update_komunitas($id, $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
            redirect('noreg/deleted_list');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
            redirect('noreg/deleted_list');
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

        $delete = $this->Noreg_model->delete_transaksi_komunitas_by_id($id);

        if ($delete) {
            $this->Noreg_model->delete_permanent_komunitas($id);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
            redirect('noreg/deleted_list');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
            redirect('noreg/deleted_list');
        }
    }
}
