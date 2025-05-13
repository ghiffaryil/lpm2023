<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Infografis extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->data['module'] = 'Infografis';

        $this->load->model(array('Infografis_model'));

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

        // $this->data['btn_submit'] = '<button type="submit" name="button" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>';
        // $this->data['btn_reset']  = 'Bersih';
        // $this->data['btn_back']   = '<button type="button" onclick="history.back()" class="btn btn-success"> Kembali</button>';
        // $this->data['btn_add']    = 'Add New Data';
        // $this->data['add_action'] = base_url('barzah/create');

    }

    function index()
    {
        is_login();
        is_read();

      //  if (!is_superadmin()) {
        //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
       //     redirect('dashboard');
      //  }

        $this->data['page_title'] = $this->data['module'];
        $this->data['header'] = $this->data['module'];
        $this->data['program'] = $this->Infografis_model->get_all_program();
        $this->data['wilayah_provinsi'] = $this->Infografis_model->get_all_provinsi();
        $data['path'] = base_url('assets');

        $this->load->view('back/infografis/index', $this->data);
    }

    public function getJenisTransaksiByProgram()
    {
        $id_program = $this->input->get('idProgram');
        if ($id_program == "allProgram") {
            $res = "allProgram";
        } else {
            $sql = "SELECT
            `b`.`id` AS `id_nama_transaksi`,
            `b`.`nama_transaksi` AS `nama_transaksi`
            FROM `program_akses_transaksi` `a`
            JOIN `reff_jenis_transaksi` `b`
            ON `a`.`id_jenis_transaksi` = `b`.`id`
            WHERE `a`.`id_program` = $id_program";
            $res = $this->db->query($sql)->result();
        }

        echo json_encode($res);
    }

    public function getDataTransaksi()
    {
        $id_program = $this->input->get('idProgram');
        $id_jenis_laporan = $this->input->get('idJenisLaporan');
        $periode_bantuan = $this->input->get('periodeBantuan');
        $id_provinsi = $this->input->get('idProvinsi');


        $infografis = [];
        $provinsi = [];
        $kab_kota = [];

        $infografisAll = [];
        $provinsiAll = [];
        $kabKotaAll = [];
        if ($id_program == "allProgram") {
            //ambil yg jenis_laporan individu dulu per semua program
            $sqlIndividu = "SELECT *
            FROM `transaksi_individu`
            JOIN `penduduk`
            ON `transaksi_individu`.`nik` = `penduduk`.`nik`";
            if ($periode_bantuan != "") {
                $sqlIndividu .= " WHERE periode_bantuan LIKE '%$periode_bantuan%'";
            }
            if ($id_provinsi != "allWilayah") {
                $sqlIndividu .= " AND `penduduk`.`id_provinsi` = '$id_provinsi' ";
            }
            $sqlIndividu .= " GROUP BY `transaksi_individu`.`nik` ";
            $resIndividu = $this->db->query($sqlIndividu)->result();
            //ambil yg jenis_laporan komunitas per semua program
            $sqlKomunitas = "SELECT *
            FROM transaksi_komunitas
            JOIN `penduduk`
            ON `transaksi_komunitas`.`nik` = `penduduk`.`nik`";
            if ($periode_bantuan != "") {
                $sqlKomunitas .= " WHERE periode_bantuan LIKE '%$periode_bantuan%'";
            }
            if ($id_provinsi != "allWilayah") {
                $sqlKomunitas .= " AND `penduduk`.`id_provinsi` = '$id_provinsi' ";
            }
            $sqlKomunitas .= " GROUP BY `transaksi_komunitas`.`nik` ";
            $resKomunitas = $this->db->query($sqlKomunitas)->result();
            //SIAPIN NIK NYA DARI GABUNGAN INDIVIDU DAN KOMUNITAS
            foreach ($resIndividu as $r) {
                $nik = $r->nik;
                $sql_provinsi = "SELECT
                                `a`.`nik` AS `nik`,
                                `a`.`id_provinsi` AS `id_provinsi`,
                                `c`.`kode_provinsi` AS `kode_provinsi`,
                                `c`.`provinsi` AS `provinsi`
                                 FROM `transaksi_individu` `b`
                                 LEFT JOIN `penduduk` `a`
                                 ON `a`.`nik` = `b`.`nik`
                                 LEFT JOIN `provinsi` `c`
                                 ON `a`.`id_provinsi` = `c`.`id_provinsi`
                                 WHERE `a`.`nik` = '$nik' ";
                if ($id_provinsi != "allWilayah") {
                    $sql_provinsi .= " AND `c`.`id_provinsi` = '$id_provinsi' ";
                }
                $sql_provinsi .= " GROUP BY `c`.`kode_provinsi` ";


                $res_provinsi = $this->db->query($sql_provinsi)->row_array();
                if ($res_provinsi) {
                    array_push($provinsiAll, $res_provinsi['id_provinsi']);
                    $data_infografis = [
                        "id" => $res_provinsi['kode_provinsi'],
                        "nama" => $res_provinsi['provinsi']
                    ];
                    array_push($infografisAll, $data_infografis);
                }

                // $res_provinsi = $this->db->query($sql_provinsi)->result();
                // if ($res_provinsi != []) {
                //     array_push($provinsiAll, $res_provinsi[0]->id_provinsi);
                //     $data_infografis = [
                //         "id" => $res_provinsi[0]->kode_provinsi,
                //         "nama" => $res_provinsi[0]->provinsi
                //     ];
                //     array_push($infografisAll, $data_infografis);
                // }
            }

            foreach ($resKomunitas as $r) {
                $nik = $r->nik;
                $sql_provinsi = "SELECT
                `a`.`nik` AS `nik`,
                `a`.`id_provinsi` AS `id_provinsi`,
                `c`.`kode_provinsi` AS `kode_provinsi`,
                `c`.`provinsi` AS `provinsi`
                FROM `transaksi_komunitas` `b`
                LEFT JOIN `penduduk` `a`
                ON `a`.`nik` = `b`.`nik`
                LEFT JOIN `provinsi` `c`
                ON `a`.`id_provinsi` = `c`.`id_provinsi`
                WHERE `a`.`nik` = '$nik' ";
                if ($id_provinsi != "allWilayah") {
                    $sql_provinsi .= " AND `c`.`id_provinsi` = '$id_provinsi' ";
                }
                $sql_provinsi .= " GROUP BY `c`.`kode_provinsi` ";

                $res_provinsi = $this->db->query($sql_provinsi)->row_array();
                if ($res_provinsi) {
                    array_push($provinsiAll, $res_provinsi['id_provinsi']);
                    $data_infografis = [
                        "id" => $res_provinsi['kode_provinsi'],
                        "nama" => $res_provinsi['provinsi']
                    ];
                    array_push($infografisAll, $data_infografis);
                }
            }


            //masukin kab_kota yg individu
            foreach ($resIndividu as $r) {
                $nik = $r->nik;
                $sql_kab_kota = "SELECT
                                `a`.`nik` AS `nik`,
                                `a`.`id_kota_kab` AS `id_kota_kab`
                                 FROM `penduduk` `a`
                                 JOIN `transaksi_individu` `b`
                                 ON `a`.`nik` = `b`.`nik`
                                 WHERE `a`.`nik` = '$nik' ";
                if ($id_provinsi != "allWilayah") {
                    $sql_kab_kota .= " AND `a`.`id_provinsi` = '$id_provinsi' ";
                }
                $sql_kab_kota .= " GROUP BY `a`.`id_kota_kab` ";

                $res_kab_kota = $this->db->query($sql_kab_kota)->row_array();
                if ($res_kab_kota) {
                    array_push($kabKotaAll, $res_kab_kota['id_kota_kab']);
                }
            }
            //masukin kab_kota yg komunitas
            foreach ($resIndividu as $r) {
                $nik = $r->nik;
                $sql_kab_kota = "SELECT
                                `a`.`nik` AS `nik`,
                                `a`.`id_kota_kab` AS `id_kota_kab`
                                 FROM `penduduk` `a`
                                 JOIN `transaksi_komunitas` `b`
                                 ON `a`.`nik` = `b`.`nik`
                                 WHERE `a`.`nik` = '$nik' ";
                if ($id_provinsi != "allWilayah") {
                    $sql_kab_kota .= " AND `a`.`id_provinsi` = '$id_provinsi' ";
                }
                $sql_kab_kota .= " GROUP BY `a`.`id_kota_kab` ";

                $res_kab_kota = $this->db->query($sql_kab_kota)->row_array();
                if ($res_kab_kota) {
                    array_push($kabKotaAll, $res_kab_kota['id_kota_kab']);
                }
            }

            $data = ['dataPerOrangIndividu' => $resIndividu, 'dataPerOrangKomunitas' => $resKomunitas, 'dataProvinsi' => $provinsiAll, 'dataKabKota' => $kabKotaAll, 'dataInfografis' => $infografisAll];
        } else {
            if ($id_jenis_laporan == 1) {
                //jika jenis_laporan individu
                $sql = "SELECT *
                FROM `transaksi_individu`
                JOIN `penduduk`
                ON `transaksi_individu`.`nik` = `penduduk`.`nik`
                WHERE `transaksi_individu`.`id_program` = $id_program ";
                if ($periode_bantuan != "") {
                    $sql .= " AND periode_bantuan LIKE '%$periode_bantuan%' ";
                }
                if ($id_provinsi != "allWilayah") {
                    $sql .= " AND `penduduk`.`id_provinsi` = '$id_provinsi' ";
                }
                $sql .= " GROUP BY `transaksi_individu`.`nik` ";

                $res = $this->db->query($sql)->result();

                foreach ($res as $r) {
                    $nik = $r->nik;
                    $sql_provinsi = "SELECT
                                    `a`.`nik` AS `nik`,
                                    `a`.`id_provinsi` AS `id_provinsi`,
                                    `c`.`kode_provinsi` AS `kode_provinsi`,
                                    `c`.`provinsi` AS `provinsi`
                                     FROM `transaksi_individu` `b`
                                     LEFT JOIN `penduduk` `a`
                                     ON `a`.`nik` = `b`.`nik`
                                     LEFT JOIN `provinsi` `c`
                                     ON `a`.`id_provinsi` = `c`.`id_provinsi`
                                     WHERE `a`.`nik` = $nik ";
                    if ($id_provinsi != "allWilayah") {
                        $sql_provinsi .= " AND `c`.`id_provinsi` = '$id_provinsi' ";
                    }
                    $sql_provinsi .= " GROUP BY `c`.`kode_provinsi` ";

                    $res_provinsi = $this->db->query($sql_provinsi)->row_array();
                    if ($res_provinsi) {
                        array_push($provinsi, $res_provinsi['id_provinsi']);
                        $data_infografis = [
                            "id" => $res_provinsi['kode_provinsi'],
                            "nama" => $res_provinsi['provinsi']
                        ];
                        array_push($infografis, $data_infografis);
                    }
                }
                foreach ($res as $r) {
                    $nik = $r->nik;
                    $sql_kab_kota = "SELECT
                                    `a`.`nik` AS `nik`,
                                    `a`.`id_kota_kab` AS `id_kota_kab`
                                     FROM `penduduk` `a`
                                     JOIN `transaksi_individu` `b`
                                     ON `a`.`nik` = `b`.`nik`
                                     WHERE `a`.`nik` = $nik ";
                    if ($id_provinsi != "allWilayah") {
                        $sql_kab_kota .= " AND `a`.`id_provinsi` = '$id_provinsi' ";
                    }
                    $sql_kab_kota .= " GROUP BY `a`.`id_kota_kab` ";

                    $res_kab_kota = $this->db->query($sql_kab_kota)->row_array();
                    if ($res_kab_kota) {
                        array_push($kab_kota, $res_kab_kota['id_kota_kab']);
                    }
                }
            } else {
                //jika jenis_laporan komunitas
                $sql = "SELECT *
                FROM `transaksi_komunitas`
                JOIN `penduduk`
                ON `transaksi_komunitas`.`nik` = `penduduk`.`nik`
                WHERE id_program = $id_program";
                if ($periode_bantuan != "") {
                    $sql .= " AND periode_bantuan LIKE '%$periode_bantuan%'";
                }
                if ($id_provinsi != "allWilayah") {
                    $sql .= " AND `penduduk`.`id_provinsi` = '$id_provinsi' ";
                }
                $sql .= " GROUP BY `transaksi_komunitas`.`nik` ";
                $res = $this->db->query($sql)->result();

                foreach ($res as $r) {
                    $nik = $r->nik;
                    $sql_provinsi = "SELECT
                                    `a`.`nik` AS `nik`,
                                    `a`.`id_provinsi` AS `id_provinsi`,
                                    `c`.`kode_provinsi` AS `kode_provinsi`,
                                    `c`.`provinsi` AS `provinsi`
                                     FROM `transaksi_komunitas` `b`
                                     LEFT JOIN `penduduk` `a`
                                     ON `a`.`nik` = `b`.`nik`
                                     LEFT JOIN `provinsi` `c`
                                     ON `a`.`id_provinsi` = `c`.`id_provinsi`
                                     WHERE `a`.`nik` = $nik ";
                    if ($id_provinsi != "allWilayah") {
                        $sql_provinsi .= " AND `c`.`id_provinsi` = '$id_provinsi' ";
                    }
                    $sql_provinsi .= " GROUP BY `c`.`kode_provinsi` ";

                    $res_provinsi = $this->db->query($sql_provinsi)->row_array();
                    if ($res_provinsi) {
                        array_push($provinsi, $res_provinsi['id_provinsi']);
                        $data_infografis = [
                            "id" => $res_provinsi['kode_provinsi'],
                            "nama" => $res_provinsi['provinsi']
                        ];
                        array_push($infografis, $data_infografis);
                    }
                }

                foreach ($res as $r) {
                    $nik = $r->nik;
                    $sql_kab_kota = "SELECT
                                    `a`.`nik` AS `nik`,
                                    `a`.`id_kota_kab` AS `id_kota_kab`
                                     FROM `penduduk` `a`
                                     JOIN `transaksi_komunitas` `b`
                                     ON `a`.`nik` = `b`.`nik`
                                     WHERE `a`.`nik` = $nik ";
                    if ($id_provinsi != "allWilayah") {
                        $sql_kab_kota .= " AND `a`.`id_provinsi` = '$id_provinsi' ";
                    }
                    $sql_kab_kota .= " GROUP BY `a`.`id_kota_kab` ";

                    $res_kab_kota = $this->db->query($sql_kab_kota)->row_array();
                    if ($res_kab_kota) {
                        array_push($kab_kota, $res_kab_kota['id_kota_kab']);
                    }
                }
            }
            $data = ['dataPerOrang' => $res, 'dataProvinsi' => $provinsi, 'dataKabKota' => $kab_kota, 'dataInfografis' => $infografis];
        }
        echo json_encode($data);
    }

    public function getJenisProgramByWilayah()
    {
        $id_wilayah = $this->input->get('idWilayah');
        if ($id_wilayah == "allWilayah") {
            $res =  $this->Infografis_model->get_all_program();
        } else {
            $sql = "SELECT
            `a`.`nik` AS `nik`,
            `a`.`id_provinsi` AS `id_provinsi`
            FROM `penduduk` `a`
            JOIN `provinsi` `b`
            ON `a`.`id_provinsi` = `b`.`id_provinsi`
            WHERE `a`.`id_provinsi` = $id_wilayah
            GROUP BY `a`.`nik`";
            $data_penduduk = $this->db->query($sql)->result();
            //ambil program yg ada di tabel transaksi_individu dan transaksi_komunitas berdasarkan nik penduduk yg di dapat
            $sql_program = "SELECT
            `a`.`id_program` AS `id_program_individu`,
            `b`.`id_program` AS `id_program_komunitas`
            FROM `transaksi_individu` `a`
            JOIN `transaksi_komunitas` `b`
            WHERE `a`.`nik` = $id_wilayah
            GROUP BY `a`.`nik`";

            $program = [];
            foreach ($data_penduduk as $r) {
                $nik = $r->nik;
                $sql_program_individu = "SELECT
                `a`.`id_program` AS `id_program_individu`
                FROM `transaksi_individu` `a`
                WHERE `a`.`nik` = $nik";
                $res_program_individu = $this->db->query($sql_program_individu)->row();
                if ($res_program_individu != NULL) {
                    array_push($program, (int)$res_program_individu->id_program_individu);
                }

                $sql_program_komunitas = "SELECT
                `a`.`id_program` AS `id_program_komunitas`
                FROM `transaksi_komunitas` `a`
                WHERE `a`.`nik` = $nik";
                $res_program_komunitas = $this->db->query($sql_program_komunitas)->row();
                if ($res_program_komunitas != NULL) {
                    array_push($program, (int)$res_program_komunitas->id_program_komunitas);
                }
            }

            $program_unique = array_unique($program);
            $program_oke = [];
            foreach ($program_unique as $r) {
                $sql_program = "SELECT *
                FROM `program`
                WHERE `id_program` = $r";
                $res_program = $this->db->query($sql_program)->row();
                if ($res_program != NULL) {
                    $data_program = [
                        "id_program" => $res_program->id_program,
                        "kode_program" => $res_program->kode_program,
                        "nama_program" => $res_program->nama_program
                    ];
                    array_push($program_oke, $data_program);
                }
            }
            $res = $program_oke;
        }

        echo json_encode($res);
    }
}
