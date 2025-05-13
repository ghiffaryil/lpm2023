<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Survey extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->data['module'] = 'Survey';

        // $this->load->model(array('Survey_model'));

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
        $this->data['add_action'] = base_url('Survey/create');
    }

    function index()
    {
        // is_login();
        // is_read();

        // if (!is_superadmin()) {
        //     $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
        //     redirect('dashboard');
        // }
        $this->data['page_title'] = $this->data['module'] . ' Dashboard';
        $this->data['header'] = $this->data['module'];
        $this->data['data_survey'] = $this->db->get('scoring')->result();

        $data['path'] = base_url('assets');
        $this->load->view('back/survey/dashboard', $this->data);
    }

    public function dataGrid()
    {
        $query = "SELECT * FROM scoring";
    }

    function scoring()
    {
        // is_login();
        // is_read();

        // if (!is_superadmin()) {
        //     $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
        //     redirect('dashboard');
        // }
        $this->data['page_title'] = $this->data['module'] . ' Scoring';
        $this->data['header'] = $this->data['module'];
        $sql_provinsi = "SELECT * FROM provinsi ORDER BY provinsi";
        $this->data['data_provinsi'] = $this->db->query($sql_provinsi)->result();
        $sql_penduduk = "SELECT * FROM penduduk ORDER BY id_penduduk ASC";
        $this->data['data_penduduk'] = $this->db->query($sql_penduduk)->result();

        $data['path'] = base_url('assets');
        $this->load->view('back/survey/scoring', $this->data);
    }


    function data_survey()
    {
        // is_login();
        // is_read();

        // if (!is_superadmin()) {
        //     $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
        //     redirect('dashboard');
        // }
        $this->data['page_title'] = $this->data['module'] . ' Data Survey';
        $this->data['header'] = $this->data['module'];
        $this->data['data_survey'] = $this->db->get('scoring')->result();

        $data['path'] = base_url('assets');
        $this->load->view('back/survey/data_survey', $this->data);
    }

    public function getKota()
    {
        $idProvinsi = $this->input->get('idProvinsi');
        $sql = "SELECT * FROM kota_kab WHERE id_provinsi=$idProvinsi ORDER BY kota_kab";
        $res = $this->db->query($sql)->result();
        echo json_encode($res);
    }



    public function getKec()
    {
        $idKota = $this->input->get('idKota');
        $sql = "SELECT * FROM kecamatan WHERE id_kota_kab=$idKota ORDER BY kecamatan_name";
        $res = $this->db->query($sql)->result();
        echo json_encode($res);
    }

    public function getKel()
    {
        $idKec = $this->input->get('idKec');
        $sql = "SELECT * FROM desa_kelurahan WHERE id_kecamatan=$idKec ORDER BY desa_kelurahan";
        $res = $this->db->query($sql)->result();
        echo json_encode($res);
    }

    public function getPenduduk()
    {
        $nama_mustahik =  $_POST['nama_mustahik'];
        $sql = "SELECT * FROM penduduk WHERE nama='$nama_mustahik'";
        $res = $this->db->query($sql)->row();
        echo json_encode($res);
    }

    public function storeData()
    {
        $id_user              = $this->session->userdata('id_users');
        // I. DATA MASUK LPM
        $maps                = isset($_POST['maps'])                  ? $_POST['maps']                : NULL;
        $tanggal_masuk       = isset($_POST['tanggal_masuk'])         ? $_POST['tanggal_masuk']         : NULL;
        $petugas_konseling   = isset($_POST['petugas_konseling'])     ? $_POST['petugas_konseling']     : NULL;
        $petugas_survey      = isset($_POST['petugas_survey'])        ? $_POST['petugas_survey']        : NULL;
        // II. PELAKSANAAN SURVEY
        $pekan               = isset($_POST['pekan'])                 ? $_POST['pekan']        : NULL;
        // III. IDENTITAS MUSTAHIK
        $nama_mustahik       = isset($_POST['nama_mustahik'])         ? $_POST['nama_mustahik']         : NULL;
        $jenis_kelamin       = isset($_POST['jenis_kelamin'])         ? $_POST['jenis_kelamin']         : NULL;
        $usia                = isset($_POST['usia'])                ? $_POST['usia']                : NULL;
        $nama_kepala_keluarga = isset($_POST['nama_kepala_keluarga'])                ? $_POST['nama_kepala_keluarga']                : NULL;
        $pekerjaan           = isset($_POST['pekerjaan'])            ? $_POST['pekerjaan']            : NULL;
        $penghasilan           = isset($_POST['penghasilan'])            ? $_POST['penghasilan']            : NULL;
        $jumlah_tanggungan   = isset($_POST['jumlah_tanggungan'])   ? $_POST['jumlah_tanggungan']   : NULL;
        $alamat              = isset($_POST['alamat'])                ? $_POST['alamat']                : NULL;
        $provinsi            = isset($_POST['provinsi'])              ? $_POST['provinsi']              : NULL;
        $kabupaten           = isset($_POST['kabupaten'])             ? $_POST['kabupaten']             : NULL;
        $kecamatan           = isset($_POST['kecamatan'])             ? $_POST['kecamatan']             : NULL;
        $kelurahan           = isset($_POST['kelurahan'])             ? $_POST['kelurahan']            : NULL;
        $no_telp                = isset($_POST['no_telp'])                ? $_POST['no_telp']                : NULL;
        $tmp_name             = $_FILES['foto']['tmp_name'];
        if ($tmp_name != NULL) {
            $config['upload_path']          = './assets/esurvey/foto';
            $config['allowed_types']        = 'jpg|jpeg|png|gif';
            $config['max_size']             = 12024; // 10mb you can set the value you want
            $config['max_width']            = 10000; // 6000px you can set the value you want
            $config['max_height']           = 10000; // 6000px
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $error = array('error' => $this->upload->display_errors());
                $file_name = "";
            } else {
                $data = array('upload_data' => $this->upload->data());
                $file_name = $data['upload_data']['file_name'];
            }
        } else {
            $file_name = "";
        }
        // IV. IDENTITAS MUSTAHIK : 6-30
        $no_1                   = isset($_POST['no_1'])                    ? $_POST['no_1']                  : NULL;
        $no_2                   = isset($_POST['no_2'])                   ? $_POST['no_2']                  : NULL;
        $no_3                   = isset($_POST['no_3'])                    ? $_POST['no_3']                  : NULL;
        $no_4                   = isset($_POST['no_4'])                    ? $_POST['no_4']                  : NULL;
        $no_5                   = isset($_POST['no_5'])                    ? $_POST['no_5']                  : NULL;
        $no_6                  = isset($_POST['no_6'])                    ? $_POST['no_6']                  : NULL;
        // V. PENGELUARAN RUTIN BULANAN : 4-20
        $no_7                   = isset($_POST['no_7'])                  ? $_POST['no_7']                  : NULL;
        $no_8                   = isset($_POST['no_8'])                  ? $_POST['no_8']                  : NULL;
        $no_9                  = isset($_POST['no_9'])                  ? $_POST['no_9']                  : NULL;
        $no_10                  = isset($_POST['no_10'])                 ? $_POST['no_10']                 : NULL;
        $no_11                  = isset($_POST['no_11'])                 ? $_POST['no_11']                 : NULL;
        // VI. POLA HIDUP : 5-15
        $no_12                  = isset($_POST['no_12'])                 ? $_POST['no_12']                 : NULL;
        $no_13                  = isset($_POST['no_13'])                 ? $_POST['no_13']                 : NULL;
        $no_14                  = isset($_POST['no_14'])                 ? $_POST['no_14']                 : NULL;
        // VII. INDEX RUMAH: 12-60
        $no_15                  = isset($_POST['no_15'])                 ? $_POST['no_15']                 : NULL;
        $no_16                  = isset($_POST['no_16'])                 ? $_POST['no_16']                 : NULL;
        $no_17                  = isset($_POST['no_17'])                 ? $_POST['no_17']                 : NULL;
        $no_18                  = isset($_POST['no_18'])                 ? $_POST['no_18']                 : NULL;
        $no_19                  = isset($_POST['no_19'])                 ? $_POST['no_19']                 : NULL;
        $no_20                  = isset($_POST['no_20'])                 ? $_POST['no_20']                 : NULL;
        $no_21                  = isset($_POST['no_21'])                 ? $_POST['no_21']                 : NULL;
        $no_22                  = isset($_POST['no_22'])                 ? $_POST['no_22']                 : NULL;
        $no_23                  = isset($_POST['no_23'])                 ? $_POST['no_23']                 : NULL;
        $no_24                  = isset($_POST['no_24'])                 ? $_POST['no_24']                 : NULL;
        $no_25                  = isset($_POST['no_25'])                 ? $_POST['no_25']                 : NULL;
        $no_26                  = isset($_POST['no_26'])                 ? $_POST['no_26']                 : NULL;
        // VIII. KEPEMILIKAN BARANG : 3-15
        $no_27                  = isset($_POST['no_27'])                 ? $_POST['no_27']                 : NULL;
        $no_28                     = isset($_POST['no_28'])                 ? $_POST['no_28']                 : NULL;
        $no_29                     = isset($_POST['no_29'])               ? $_POST['no_29']                 : NULL;
        // IX. DATA KELUARGA : 5-25
        $no_30                  = isset($_POST['no_30'])                 ? $_POST['no_30']                 : NULL;
        $no_31                  = isset($_POST['no_31'])                 ? $_POST['no_31']                 : NULL;
        $no_32                  = isset($_POST['no_32'])                 ? $_POST['no_32']                 : NULL;
        $no_33                  = isset($_POST['no_33'])                 ? $_POST['no_33']                 : NULL;
        $no_34                  = isset($_POST['no_34'])                 ? $_POST['no_34']                 : NULL;
        // X. INDIKATOR PERILAKU
        $no_35                  = isset($_POST['no_35'])                 ? $_POST['no_35']                 : NULL;
        $no_36                  = isset($_POST['no_36'])                 ? $_POST['no_35']                 : NULL;
        $no_37                  = isset($_POST['no_37'])                 ? $_POST['no_35']                 : NULL;
        $no_38                  = isset($_POST['no_38'])                 ? $_POST['no_35']                 : NULL;
        $no_39                  = isset($_POST['no_39'])                 ? $_POST['no_35']                 : NULL;
        $no_40                  = isset($_POST['no_40'])                 ? $_POST['no_35']                 : NULL;
        $no_41                  = isset($_POST['no_41'])                 ? $_POST['no_35']                 : NULL;

        $hasil_scoring       = isset($_POST['hasil_scoring'])       ? $_POST['hasil_scoring']       : NULL;
        $rekomendasi_skoring = isset($_POST['rekomendasi_skoring']) ? $_POST['rekomendasi_skoring'] : NULL;
        $jenis_permohonan    = isset($_POST['jenis_permohonan'])    ? $_POST['jenis_permohonan']    : NULL;
        $asnaf               = isset($_POST['asnaf'])               ? $_POST['asnaf']               : NULL;
        $kelayakan           = isset($_POST['kelayakan'])           ? $_POST['kelayakan']           : NULL;
        $alasan              = isset($_POST['alasan'])              ? $_POST['alasan']              : NULL;
        $catatan             = isset($_POST['catatan'])             ? $_POST['catatan']             : NULL;
        $rekomendasi_lpm     = isset($_POST['rekomendasi_lpm'])     ? $_POST['rekomendasi_lpm']     : NULL;
        $bentuk_bantuan      = isset($_POST['bentuk_bantuan'])      ? $_POST['bentuk_bantuan']      : NULL;
        $sifat_bantuan       = isset($_POST['sifat_bantuan'])       ? $_POST['sifat_bantuan']       : NULL;
        $tindak_lanjut       = isset($_POST['tindak_lanjut'])       ? $_POST['tindak_lanjut']       : NULL;
        $tanggal_rekomendasi = isset($_POST['tanggal_rekomendasi']) ? $_POST['tanggal_rekomendasi'] : NULL;

        $tmp_name_surveyor       = $_FILES['tanda_tangan_surveyor']['tmp_name'];
        if ($tmp_name_surveyor != NULL) {
            $config['upload_path']          = './assets/esurvey/foto';
            $config['allowed_types']        = 'jpg|jpeg|png|gif';
            $config['max_size']             = 12024; // 10mb you can set the value you want
            $config['max_width']            = 10000; // 6000px you can set the value you want
            $config['max_height']           = 10000; // 6000px
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('tanda_tangan_surveyor')) {
                $error = array('error' => $this->upload->display_errors());
                $file_name_surveyor = "";
            } else {
                $data = array('upload_data' => $this->upload->data());
                $file_name_surveyor = $data['upload_data']['file_name'];
            }
        } else {
            $file_name_surveyor = "";
        }

        $query = "INSERT INTO scoring (
                id_user,
                -- I. DATA MASUK LPM
                maps,
                tanggal_masuk,
                petugas_konseling,
                petugas_survey,
                -- II. PELAKSANAAN SURVEY
                pekan,
                -- III. IDENTITAS MUSTAHIK
                nama_mustahik,
                jenis_kelamin,
                usia,
                nama_kepala_keluarga,
                pekerjaan,
                penghasilan,
                jumlah_tanggungan,
                alamat,
                provinsi,
                kelurahan,
                kecamatan,
                kabupaten,
                foto,
                no_telp,
                -- IV. IDENTITAS MUSTAHIK : 6-30
                no_1,
                no_2,
                no_3,
                no_4,
                no_5,
                no_6,
                -- V. PENGELUARAN RUTIN BULANAN : 4-20
                no_7,
                no_8,
                no_9,
                no_10,
                no_11,
                -- VI. POLA HIDUP : 5-15
                no_12,
                no_13,
                no_14,
                -- VII. INDEX RUMAH: 12-60
                no_15,
                no_16,
                no_17,
                no_18,
                no_19,
                no_20,
                no_21,
                no_22,
                no_23,
                no_24,
                no_25,
                no_26,
                -- VIII. KEPEMILIKAN BARANG : 3-15
                no_27,
                no_28,
                no_29,
                -- IX. DATA KELUARGA : 5-25
                no_30,
                no_31,
                no_32,
                no_33,
                no_34,
                -- X. INDIKATOR PERILAKU
                no_35,
                no_36,
                no_37,
                no_38,
                no_39,
                no_40,
                no_41,

                hasil_scoring,
                rekomendasi_skoring,
                jenis_permohonan,
                asnaf,
                kelayakan,
                alasan,
                catatan,
                rekomendasi_lpm,
                bentuk_bantuan,
                sifat_bantuan,
                tindak_lanjut,
                tanggal_rekomendasi,
                tanda_tangan_surveyor,

                created_at,
                updated_at
                )

                VALUES(
                '$id_user',
                 -- I. DATA MASUK LPM
                '$maps',
                '$tanggal_masuk',
                '$petugas_konseling',
                '$petugas_survey',
                -- II. PELAKSANAAN SURVEY
                '$pekan',
                -- III. IDENTITAS MUSTAHIK
                '$nama_mustahik',
                '$jenis_kelamin',
                '$usia',
                '$nama_kepala_keluarga',
                '$pekerjaan',
                '$penghasilan',
                '$jumlah_tanggungan',
                '$alamat',
                '$provinsi',
                '$kelurahan',
                '$kecamatan',
                '$kabupaten',
                '$file_name',
                '$no_telp',
                -- IV. IDENTITAS MUSTAHIK : 6-30
                '$no_1',
                '$no_2',
                '$no_3',
                '$no_4',
                '$no_5',
                '$no_6',
                -- V. PENGELUARAN RUTIN BULANAN : 4-20
                '$no_7',
                '$no_8',
                '$no_9',
                '$no_10',
                '$no_11',
                -- VI. POLA HIDUP : 5-15
                '$no_12',
                '$no_13',
                '$no_14',
                -- VII. INDEX RUMAH: 12-60
                '$no_15',
                '$no_16',
                '$no_17',
                '$no_18',
                '$no_19',
                '$no_20',
                '$no_21',
                '$no_22',
                '$no_23',
                '$no_24',
                '$no_25',
                '$no_26',
                -- VIII. KEPEMILIKAN BARANG : 3-15
                '$no_27',
                '$no_28',
                '$no_29',
                -- IX. DATA KELUARGA : 5-25
                '$no_30',
                '$no_31',
                '$no_32',
                '$no_33',
                '$no_34',
                -- X. INDIKATOR PERILAKU
                '$no_35',
                '$no_36',
                '$no_37',
                '$no_38',
                '$no_39',
                '$no_40',
                '$no_41',

                '$hasil_scoring',
                '$rekomendasi_skoring',
                '$jenis_permohonan',
                '$asnaf',
                '$kelayakan',
                '$alasan',
                '$catatan',
                '$rekomendasi_lpm',
                '$bentuk_bantuan',
                '$sifat_bantuan',
                '$tindak_lanjut',
                '$tanggal_rekomendasi',
                '$file_name_surveyor',
                CURRENT_TIMESTAMP,
                '0000-00-00 00:00:00.000000')";
        $hasil = $this->db->query($query);
        var_dump($hasil);
        if ($hasil == true) {
            echo "ok";
        } else {
            echo "no";
        }
    }

    public function getMustahik()
    {
        $sql = "SELECT id, nama_mustahik FROM scoring ORDER BY nama_mustahik ASC";
        $res = $this->db->query($sql)->result();
        echo json_encode($res);
    }
    public function getPetugasSurvey()
    {
        $sql = "SELECT id, petugas_survey FROM scoring  GROUP BY petugas_survey";
        $res = $this->db->query($sql)->result();
        echo json_encode($res);
    }

    public function getScoring()
    {
        $sql = "SELECT * FROM scoring";
        $res = $this->db->query($sql)->result();
        // echo json_encode($res);

        $response = array(
            'status'  => 1,
            'message' => 'Get List Data Successfully.',
            'data'    => $res
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function detail()
    {
        $id = $this->input->get("id");
        $sql = "SELECT * FROM scoring WHERE id = '$id'";
        $res = $this->db->query($sql)->row_array();
        $this->data['detail'] = $res;

        $id_kel = $res['kelurahan'];
        $sql_kel = "SELECT * FROM desa_kelurahan WHERE id_desa_kelurahan = '$id_kel'";
        $this->data['nama_kel'] = $this->db->query($sql_kel)->row_array();

        $id_kec = $res['kecamatan'];
        $sql_kec = "SELECT * FROM kecamatan WHERE id_kecamatan = '$id_kec'";
        $this->data['nama_kec'] = $this->db->query($sql_kec)->row_array();

        $id_kab = $res['kabupaten'];
        $sql_kab = "SELECT * FROM kota_kab WHERE id_kota_kab = '$id_kab'";
        $this->data['nama_kab'] = $this->db->query($sql_kab)->row_array();

        $id_prov = $res['provinsi'];
        $sql_prov = "SELECT * FROM provinsi WHERE id_provinsi = '$id_prov'";
        $this->data['nama_prov'] = $this->db->query($sql_prov)->row_array();


        $this->data['page_title'] = $this->data['module'] . ' Detail';
        $this->data['header'] = $this->data['module'];
        $this->data['path'] = base_url('assets');

        $this->load->view('back/survey/detail', $this->data);
    }

    public function detail_scoring()
    {
        $id = $this->input->get("id");
        $sql = "SELECT * FROM scoring WHERE id = '$id'";
        $res = $this->db->query($sql)->row_array();
        $this->data['data'] = $res;
        $this->data['hari'] = array(
            "Sun" => "Minggu",
            "Mon" => "Senin",
            "Tue" => "Selasa",
            "Wed" => "Rabu",
            "Thu" => "Kamis",
            "Fri" => "Jumat",
            "Sat" => "Sabtu"
        );

        $id_kel = $res['kelurahan'];
        $sql_kel = "SELECT * FROM desa_kelurahan WHERE id_desa_kelurahan = '$id_kel'";
        $this->data['nama_kel'] = $this->db->query($sql_kel)->row_array();


        $id_kec = $res['kecamatan'];
        $sql_kec = "SELECT * FROM kecamatan WHERE id_kecamatan = '$id_kec'";
        $this->data['nama_kec'] = $this->db->query($sql_kec)->row_array();

        $id_kab = $res['kabupaten'];
        $sql_kab = "SELECT * FROM kota_kab WHERE id_kota_kab = '$id_kab'";
        $this->data['nama_kab'] = $this->db->query($sql_kab)->row_array();

        $id_prov = $res['provinsi'];
        $sql_prov = "SELECT * FROM provinsi WHERE id_provinsi = '$id_prov'";
        $this->data['nama_prov'] = $this->db->query($sql_prov)->row_array();


        $this->data['page_title'] = $this->data['module'] . ' Detail';
        $this->data['header'] = $this->data['module'];
        $this->data['path'] = base_url('assets');

        $this->load->view('back/survey/detail_scoring', $this->data);
    }

    public function print()
    {
        $id = $this->input->get("id");
        $sql = "SELECT * FROM scoring WHERE id = '$id'";
        $res = $this->db->query($sql)->row_array();
        $this->data['data'] = $res;

        $this->data['hari'] = array(
            "Sun" => "Minggu",
            "Mon" => "Senin",
            "Tue" => "Selasa",
            "Wed" => "Rabu",
            "Thu" => "Kamis",
            "Fri" => "Jumat",
            "Sat" => "Sabtu"
        );

        $id_kel = $res['kelurahan'];
        $sql_kel = "SELECT * FROM desa_kelurahan WHERE id_desa_kelurahan = '$id_kel'";
        $this->data['nama_kel'] = $this->db->query($sql_kel)->row_array();


        $id_kec = $res['kecamatan'];
        $sql_kec = "SELECT * FROM kecamatan WHERE id_kecamatan = '$id_kec'";
        $this->data['nama_kec'] = $this->db->query($sql_kec)->row_array();

        $id_kab = $res['kabupaten'];
        $sql_kab = "SELECT * FROM kota_kab WHERE id_kota_kab = '$id_kab'";
        $this->data['nama_kab'] = $this->db->query($sql_kab)->row_array();

        $id_prov = $res['provinsi'];
        $sql_prov = "SELECT * FROM provinsi WHERE id_provinsi = '$id_prov'";
        $this->data['nama_prov'] = $this->db->query($sql_prov)->row_array();

        $this->data['page_title'] = $this->data['module'] . ' Print';
        $this->data['header'] = $this->data['module'];
        $this->data['data_survey'] = $this->db->get('scoring')->result();

        $data['path'] = base_url('assets');
        $this->load->view('back/survey/print', $this->data);
    }
    public function print_detail()
    {
        $id = $this->input->get("id");
        $sql = "SELECT * FROM scoring WHERE id = '$id'";
        $res = $this->db->query($sql)->row_array();
        $this->data['detail'] = $res;

        $this->data['hari'] = array(
            "Sun" => "Minggu",
            "Mon" => "Senin",
            "Tue" => "Selasa",
            "Wed" => "Rabu",
            "Thu" => "Kamis",
            "Fri" => "Jumat",
            "Sat" => "Sabtu"
        );

        $id_kel = $res['kelurahan'];
        $sql_kel = "SELECT * FROM desa_kelurahan WHERE id_desa_kelurahan = '$id_kel'";
        $this->data['nama_kel'] = $this->db->query($sql_kel)->row_array();


        $id_kec = $res['kecamatan'];
        $sql_kec = "SELECT * FROM kecamatan WHERE id_kecamatan = '$id_kec'";
        $this->data['nama_kec'] = $this->db->query($sql_kec)->row_array();

        $id_kab = $res['kabupaten'];
        $sql_kab = "SELECT * FROM kota_kab WHERE id_kota_kab = '$id_kab'";
        $this->data['nama_kab'] = $this->db->query($sql_kab)->row_array();

        $id_prov = $res['provinsi'];
        $sql_prov = "SELECT * FROM provinsi WHERE id_provinsi = '$id_prov'";
        $this->data['nama_prov'] = $this->db->query($sql_prov)->row_array();

        $this->data['page_title'] = $this->data['module'] . ' Print';
        $this->data['header'] = $this->data['module'];
        $this->data['data_survey'] = $this->db->get('scoring')->result();

        $data['path'] = base_url('assets');
        $this->load->view('back/survey/print_detail', $this->data);
    }

    public function approved()
    {
        $id = $this->input->post("id");

        $query = "UPDATE scoring SET
        approve 		= '1',
        tanggal_approve	= CURRENT_TIMESTAMP
        WHERE id 		= '$id'";
        $data = $this->db->query($query);
        echo json_encode($data);
    }

    public function unapproved()
    {
        $id = $this->input->post("id");

        $query = "UPDATE scoring SET
        approve 		= '0',
        tanggal_approve	= CURRENT_TIMESTAMP
        WHERE id 		= '$id'";
        $data = $this->db->query($query);
        echo json_encode($data);
    }

    public function hapus()
    {
        $id = $this->input->get("id");

        $query = "DELETE FROM scoring WHERE id= '$id'";
        $data = $this->db->query($query);
        if ($data == true) {
            $response = array(
                'status'  => 1,
                'message' => 'Data Deleted Successfully.'
            );
        } else {
            $response = array(
                'status'  => 0,
                'message' => 'Data Deletion Failed.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function edit()
    {
        $id = $this->input->get("id");

      //  if (!is_superadmin()) {
       //     $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      //      redirect('dashboard');
     //   }

        $sql = "SELECT * FROM scoring WHERE id = '$id'";
        $res = $this->db->query($sql)->result_array();
        $this->data['data'] = $res;

        $this->data['page_title'] = $this->data['module'] . ' Scoring';
        $this->data['header'] = $this->data['module'];
        $sql_provinsi = "SELECT * FROM provinsi ORDER BY provinsi";
        $this->data['data_provinsi'] = $this->db->query($sql_provinsi)->result();

        $id_kab_kota = $res[0]['kabupaten'];
        $sql_kab_kota = "SELECT * FROM kota_kab WHERE id_kota_kab = '$id_kab_kota'";
        $this->data['data_kab_kota'] = $this->db->query($sql_kab_kota)->row();

        $id_kec = $res[0]['kecamatan'];
        $sql_kec = "SELECT * FROM kecamatan WHERE id_kecamatan = '$id_kec'";
        $this->data['data_kec'] = $this->db->query($sql_kec)->row();

        $id_desa = $res[0]['kelurahan'];
        $sql_desa = "SELECT * FROM desa_kelurahan WHERE id_desa_kelurahan = '$id_desa'";
        $this->data['data_desa'] = $this->db->query($sql_desa)->row();

        $sql_penduduk = "SELECT * FROM penduduk ORDER BY id_penduduk ASC";
        $this->data['data_penduduk'] = $this->db->query($sql_penduduk)->result();

        $data['path'] = base_url('assets');
        $this->load->view('back/survey/edit', $this->data);
    }

    public function update()
    {

        $id_user              = $this->session->userdata('id_users');
        // I. DATA MASUK LPM
        $maps                = isset($_POST['maps'])                  ? $_POST['maps']                : NULL;
        $tanggal_masuk       = isset($_POST['tanggal_masuk'])         ? $_POST['tanggal_masuk']         : NULL;
        $petugas_konseling   = isset($_POST['petugas_konseling'])     ? $_POST['petugas_konseling']     : NULL;
        $petugas_survey      = isset($_POST['petugas_survey'])        ? $_POST['petugas_survey']        : NULL;
        // II. PELAKSANAAN SURVEY
        $pekan               = isset($_POST['pekan'])                 ? $_POST['pekan']        : NULL;
        // III. IDENTITAS MUSTAHIK
        $nama_mustahik       = isset($_POST['nama_mustahik'])         ? $_POST['nama_mustahik']         : NULL;
        $jenis_kelamin       = isset($_POST['jenis_kelamin'])         ? $_POST['jenis_kelamin']         : NULL;
        $usia                = isset($_POST['usia'])                ? $_POST['usia']                : NULL;
        $nama_kepala_keluarga = isset($_POST['nama_kepala_keluarga'])                ? $_POST['nama_kepala_keluarga']                : NULL;
        $pekerjaan           = isset($_POST['pekerjaan'])            ? $_POST['pekerjaan']            : NULL;
        $penghasilan           = isset($_POST['penghasilan'])            ? $_POST['penghasilan']            : NULL;
        $jumlah_tanggungan   = isset($_POST['jumlah_tanggungan'])   ? $_POST['jumlah_tanggungan']   : NULL;
        $alamat              = isset($_POST['alamat'])                ? $_POST['alamat']                : NULL;
        $provinsi            = isset($_POST['provinsi'])              ? $_POST['provinsi']              : NULL;
        $kabupaten           = isset($_POST['kabupaten'])             ? $_POST['kabupaten']             : NULL;
        $kecamatan           = isset($_POST['kecamatan'])             ? $_POST['kecamatan']             : NULL;
        $kelurahan           = isset($_POST['kelurahan'])             ? $_POST['kelurahan']            : NULL;
        $no_telp                = isset($_POST['no_telp'])                ? $_POST['no_telp']                : NULL;
        if (empty($_FILES['foto'])) {
            $file_name = "";
        } else {
            $tmp_name             = $_FILES['foto']['tmp_name'];
            $config['upload_path']          = './assets/esurvey/foto';
            $config['allowed_types']        = 'jpg|jpeg|png|gif';
            $config['max_size']             = 12024; // 10mb you can set the value you want
            $config['max_width']            = 10000; // 6000px you can set the value you want
            $config['max_height']           = 10000; // 6000px
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $error = array('error' => $this->upload->display_errors());
                $file_name = "";
            } else {
                $data = array('upload_data' => $this->upload->data());
                $file_name = $data['upload_data']['file_name'];
            }
        }
        // IV. IDENTITAS MUSTAHIK : 6-30
        $no_1                   = isset($_POST['no_1'])                    ? $_POST['no_1']                  : NULL;
        $no_2                   = isset($_POST['no_2'])                   ? $_POST['no_2']                  : NULL;
        $no_3                   = isset($_POST['no_3'])                    ? $_POST['no_3']                  : NULL;
        $no_4                   = isset($_POST['no_4'])                    ? $_POST['no_4']                  : NULL;
        $no_5                   = isset($_POST['no_5'])                    ? $_POST['no_5']                  : NULL;
        $no_6                  = isset($_POST['no_6'])                    ? $_POST['no_6']                  : NULL;
        // V. PENGELUARAN RUTIN BULANAN : 4-20
        $no_7                   = isset($_POST['no_7'])                  ? $_POST['no_7']                  : NULL;
        $no_8                   = isset($_POST['no_8'])                  ? $_POST['no_8']                  : NULL;
        $no_9                  = isset($_POST['no_9'])                  ? $_POST['no_9']                  : NULL;
        $no_10                  = isset($_POST['no_10'])                 ? $_POST['no_10']                 : NULL;
        $no_11                  = isset($_POST['no_11'])                 ? $_POST['no_11']                 : NULL;
        // VI. POLA HIDUP : 5-15
        $no_12                  = isset($_POST['no_12'])                 ? $_POST['no_12']                 : NULL;
        $no_13                  = isset($_POST['no_13'])                 ? $_POST['no_13']                 : NULL;
        $no_14                  = isset($_POST['no_14'])                 ? $_POST['no_14']                 : NULL;
        // VII. INDEX RUMAH: 12-60
        $no_15                  = isset($_POST['no_15'])                 ? $_POST['no_15']                 : NULL;
        $no_16                  = isset($_POST['no_16'])                 ? $_POST['no_16']                 : NULL;
        $no_17                  = isset($_POST['no_17'])                 ? $_POST['no_17']                 : NULL;
        $no_18                  = isset($_POST['no_18'])                 ? $_POST['no_18']                 : NULL;
        $no_19                  = isset($_POST['no_19'])                 ? $_POST['no_19']                 : NULL;
        $no_20                  = isset($_POST['no_20'])                 ? $_POST['no_20']                 : NULL;
        $no_21                  = isset($_POST['no_21'])                 ? $_POST['no_21']                 : NULL;
        $no_22                  = isset($_POST['no_22'])                 ? $_POST['no_22']                 : NULL;
        $no_23                  = isset($_POST['no_23'])                 ? $_POST['no_23']                 : NULL;
        $no_24                  = isset($_POST['no_24'])                 ? $_POST['no_24']                 : NULL;
        $no_25                  = isset($_POST['no_25'])                 ? $_POST['no_25']                 : NULL;
        $no_26                  = isset($_POST['no_26'])                 ? $_POST['no_26']                 : NULL;
        // VIII. KEPEMILIKAN BARANG : 3-15
        $no_27                  = isset($_POST['no_27'])                 ? $_POST['no_27']                 : NULL;
        $no_28                     = isset($_POST['no_28'])                 ? $_POST['no_28']                 : NULL;
        $no_29                     = isset($_POST['no_29'])               ? $_POST['no_29']                 : NULL;
        // IX. DATA KELUARGA : 5-25
        $no_30                  = isset($_POST['no_30'])                 ? $_POST['no_30']                 : NULL;
        $no_31                  = isset($_POST['no_31'])                 ? $_POST['no_31']                 : NULL;
        $no_32                  = isset($_POST['no_32'])                 ? $_POST['no_32']                 : NULL;
        $no_33                  = isset($_POST['no_33'])                 ? $_POST['no_33']                 : NULL;
        $no_34                  = isset($_POST['no_34'])                 ? $_POST['no_34']                 : NULL;
        // X. INDIKATOR PERILAKU
        $no_35                  = isset($_POST['no_35'])                 ? $_POST['no_35']                 : NULL;
        $no_36                  = isset($_POST['no_36'])                 ? $_POST['no_35']                 : NULL;
        $no_37                  = isset($_POST['no_37'])                 ? $_POST['no_35']                 : NULL;
        $no_38                  = isset($_POST['no_38'])                 ? $_POST['no_35']                 : NULL;
        $no_39                  = isset($_POST['no_39'])                 ? $_POST['no_35']                 : NULL;
        $no_40                  = isset($_POST['no_40'])                 ? $_POST['no_35']                 : NULL;
        $no_41                  = isset($_POST['no_41'])                 ? $_POST['no_35']                 : NULL;

        $hasil_scoring       = isset($_POST['hasil_scoring'])       ? $_POST['hasil_scoring']       : NULL;
        $rekomendasi_skoring = isset($_POST['rekomendasi_skoring']) ? $_POST['rekomendasi_skoring'] : NULL;
        $jenis_permohonan    = isset($_POST['jenis_permohonan'])    ? $_POST['jenis_permohonan']    : NULL;
        $asnaf               = isset($_POST['asnaf'])               ? $_POST['asnaf']               : NULL;
        $kelayakan           = isset($_POST['kelayakan'])           ? $_POST['kelayakan']           : NULL;
        $alasan              = isset($_POST['alasan'])              ? $_POST['alasan']              : NULL;
        $catatan             = isset($_POST['catatan'])             ? $_POST['catatan']             : NULL;
        $rekomendasi_lpm     = isset($_POST['rekomendasi_lpm'])     ? $_POST['rekomendasi_lpm']     : NULL;
        $bentuk_bantuan      = isset($_POST['bentuk_bantuan'])      ? $_POST['bentuk_bantuan']      : NULL;
        $sifat_bantuan       = isset($_POST['sifat_bantuan'])       ? $_POST['sifat_bantuan']       : NULL;
        $tindak_lanjut       = isset($_POST['tindak_lanjut'])       ? $_POST['tindak_lanjut']       : NULL;
        $tanggal_rekomendasi = isset($_POST['tanggal_rekomendasi']) ? $_POST['tanggal_rekomendasi'] : NULL;

        if (empty($_FILES['tanda_tangan_surveyor'])) {
            $file_name_surveyor = "";
        } else {

            $tmp_name_surveyor       = $_FILES['tanda_tangan_surveyor']['tmp_name'];
            $config['upload_path']          = './assets/esurvey/foto';
            $config['allowed_types']        = 'jpg|jpeg|png|gif';
            $config['max_size']             = 12024; // 10mb you can set the value you want
            $config['max_width']            = 10000; // 6000px you can set the value you want
            $config['max_height']           = 10000; // 6000px
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('tanda_tangan_surveyor')) {
                $error = array('error' => $this->upload->display_errors());
                $file_name_surveyor = "";
            } else {
                $data = array('upload_data' => $this->upload->data());
                $file_name_surveyor = $data['upload_data']['file_name'];
            }
        }
        $id                       = isset($_POST['id'])                     ? $_POST['id']                     : NULL;

        $query = "UPDATE scoring SET
            -- I. DATA MASUK LPM
            tanggal_masuk 		= '$tanggal_masuk',
            petugas_konseling 	= '$petugas_konseling',
            petugas_survey 		= '$petugas_survey',
            -- II. PELAKSANAAN SURVEY
            pekan 	        	= '$pekan',
            -- III. IDENTITAS MUSTAHIK
            nama_mustahik 		= '$nama_mustahik',
            jenis_kelamin 		= '$jenis_kelamin',
            usia 				= '$usia',
            nama_kepala_keluarga= '$nama_kepala_keluarga',
            pekerjaan			= '$pekerjaan',
            penghasilan			= '$penghasilan',
            jumlah_tanggungan 	= '$jumlah_tanggungan',
            alamat 				= '$alamat',
            provinsi  			= '$provinsi',
            kelurahan 			= '$kelurahan',
            kecamatan 			= '$kecamatan',
            kabupaten 			= '$kabupaten', ";
        if ($file_name != "") {
            $query .= " foto 				= '$file_name', ";
        }

        // -- IV. IDENTITAS MUSTAHIK : 6-30
        $query .= "
            no_telp = '$no_telp',
            no_1 				= '$no_1',
            no_2 				= '$no_2',
            no_3 				= '$no_3',
            no_4 				= '$no_4',
            no_5 				= '$no_5',
            no_6 				= '$no_6',

            no_7 				= '$no_7',
            no_8 				= '$no_8',
            no_9 				= '$no_9',
            no_10 				= '$no_10',
            no_11 				= '$no_11',

            no_12 				= '$no_12',
            no_13 				= '$no_13',
            no_14 				= '$no_14',

            no_15 				= '$no_15',
            no_16 				= '$no_16',
            no_17 				= '$no_17',
            no_18 				= '$no_18',
            no_19 				= '$no_19',
            no_20 				= '$no_20',
            no_21 				= '$no_21',
            no_22 				= '$no_22',
            no_23 				= '$no_23',
            no_24 				= '$no_24',
            no_25 				= '$no_25',
            no_26 				= '$no_26',

            no_27 				= '$no_27',
            no_28 				= '$no_28',
            no_29 				= '$no_29',

            no_30 				= '$no_30',
            no_31 				= '$no_31',
            no_32 				= '$no_32',
            no_33 				= '$no_33',
            no_34 				= '$no_34',

            no_35 				= '$no_35',
            no_36 				= '$no_36',
            no_37 				= '$no_37',
            no_38 				= '$no_38',
            no_39 				= '$no_39',
            no_40 				= '$no_40',
            no_41 				= '$no_41',

            hasil_scoring 		= '$hasil_scoring',
            rekomendasi_skoring = '$rekomendasi_skoring',
            jenis_permohonan 	= '$jenis_permohonan',
            asnaf 				= '$asnaf',
            kelayakan 			= '$kelayakan',
            alasan 				= '$alasan',
            catatan 			= '$catatan',
            rekomendasi_lpm 	= '$rekomendasi_lpm',
            bentuk_bantuan 		= '$bentuk_bantuan',
            sifat_bantuan 		= '$sifat_bantuan',
            tindak_lanjut 		= '$tindak_lanjut',
            tanggal_rekomendasi = '$tanggal_rekomendasi', ";

        if ($file_name_surveyor != "") {
            $query .= " tanda_tangan_surveyor = '$file_name_surveyor', ";
        }
        $query .= "
            updated_at 			= CURRENT_TIMESTAMP
            WHERE id 			= '$id'";

        $hasil = $this->db->query($query);

        if ($hasil == true) {
            echo "ok";
        } else {
            echo "no";
        }
    }
}
