<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_komunitas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->data['module'] = 'Kategori komunitas';

        // $this->load->model(array('Kk_model'));

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

        $this->data['btn_submit'] = 'Simpan';
        $this->data['btn_reset']  = 'Bersih';
        $this->data['btn_back']   = 'Kembali';
        $this->data['btn_add']    = 'Add New Data';
        $this->data['add_action'] = base_url('kategori_komunitas/create');
    }

    function index()
    {
        is_login();
        is_read();

    //    if (!is_superadmin()) {
      //      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
        //    redirect('dashboard');
        //}

        $this->data['page_title'] = $this->data['module'] . ' List';

        $sql_data = "SELECT * FROM reff_kategori_komunitas WHERE is_aktif = 1";

        $this->data['get_all'] = $this->db->query($sql_data)->result();


        $data['path'] = base_url('assets');

        $this->load->view('back/kategori_komunitas/kategori_komunitas_list', $this->data);
    }



    function create()
    {
        is_login();
        is_create();

       // if (!is_superadmin()) {
         //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
           // redirect('dashboard');
        //}

        $this->data['page_title'] = 'Create New ' . $this->data['module'];
        $this->data['sub']    = "Tambah Kategori Komunitas";
        $this->data['header'] = $this->data['module'];
        $this->data['action'] = "kategori_komunitas/create_action";


        $sql_isaktif = "SELECT * FROM reff_is_aktif";
        $this->data['is_aktif'] = $this->db->query($sql_isaktif)->result();

        $this->data['nama_kategori_komunitas'] = [
            'name'          => 'nama_kategori_komunitas',
            'id'            => 'nama_kategori_komunitas',
            'class'         => 'form-control',
            'autocomplete'  => 'off',
            'required'      => '',
        ];


        $this->load->view('back/kategori_komunitas/kategori_komunitas_add', $this->data);
    }

    function create_action()
    {
        $nama_kategori_komunitas  = $this->input->post('nama_kategori_komunitas');
        $is_aktif  = $this->input->post('is_aktif');
        $sql_cek = "SELECT id_kategori_komunitas
                    FROM reff_kategori_komunitas
                    WHERE nama_kategori_komunitas = '$nama_kategori_komunitas'";
        $res_cek = $this->db->query($sql_cek)->row();
        if ($res_cek == NULL) {

            $created_by = $this->session->username;
            $waktu =  date('Y-m-d H:i:a');

            $sql_insert = "INSERT INTO `reff_kategori_komunitas`(`nama_kategori_komunitas`, `is_aktif`, `created_at`, `created_by`, `updated_at`, `updated_by`)
             VALUES ('$nama_kategori_komunitas','$is_aktif','$waktu','$created_by','0000-00-00 00:00:00','')";

            $this->db->query($sql_insert);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data insert successfully</div>');
            redirect('kategori_komunitas');
        } else {

            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Sudah Ada</div>');
            redirect('kategori_komunitas');
        }
    }

    function update($id)
    {
        is_login();
        is_update();

        if (!is_superadmin()) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
            redirect('dashboard');
        }

        $nama_komunitas = $this->input->post('nama_komunitas');

        $this->data['page_title'] = 'Update Data ' . $this->data['module'];
        $this->data['action']     = 'kategori_komunitas/update_action';

        $sql_isaktif = "SELECT * FROM reff_is_aktif";
        $this->data['is_aktif'] = $this->db->query($sql_isaktif)->result();

        $sql_data = "SELECT * FROM reff_kategori_komunitas WHERE id_kategori_komunitas = $id";
        $this->data['kategori_komunitas'] = $this->db->query($sql_data)->row();

        if ($this->data['kategori_komunitas']) {

            $this->data['id_kategori_komunitas'] = [
                'name'          => 'id_kategori_komunitas',
                'type'          => 'hidden',
            ];



            $this->data['nama_kategori_komunitas'] = [
                'name'          => 'nama_kategori_komunitas',
                'id'            => 'nama_kategori_komunitas',
                'class'         => 'form-control',
                'autocomplete'  => 'off',
                'required'      => '',
            ];


            $this->load->view('back/kategori_komunitas/kategori_komunitas_edit', $this->data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">data not found</div>');
            redirect('kategori_komunitas');
        }
    }

    function update_action()
    {
        $this->form_validation->set_rules('nama_kategori_komunitas', 'nama_kategori_komunitas', 'required');

        $id_kategori_komunitas = $this->input->post('id_kategori_komunitas');
        $nama_kategori_komunitas = $this->input->post('nama_kategori_komunitas');
        $is_aktif = $this->input->post('is_aktif');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() === FALSE) {
            $this->update($this->input->post('id_kategori_komunitas'));
        } else {
            $updated_by = $this->session->username;
            $waktu =  date('Y-m-d H:i:a');
            $sql_update = "UPDATE `reff_kategori_komunitas`
            SET
            `nama_kategori_komunitas`= '$nama_kategori_komunitas',
            `is_aktif`= '$is_aktif',
            `updated_at`='$waktu',
            `updated_by`='$updated_by'
             WHERE id_kategori_komunitas = $id_kategori_komunitas";
            $this->db->query($sql_update);

            write_log();
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
            redirect('kategori_komunitas');
        }
    }

    function view($id)
    {
        is_login();
        is_update();

        if (!is_superadmin()) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
            redirect('dashboard');
        }

        $this->data['get_all_provinsi']  = $this->Komunitas_model->get_all_provinsi();
        $this->data['get_all_kabupaten'] = $this->Komunitas_model->get_all_kabupaten();
        $this->data['get_all_kecamatan'] = $this->Komunitas_model->get_all_kecamatan();
        $this->data['get_all_kelurahan'] = $this->Komunitas_model->get_all_kelurahan();
        $this->data['komunitas']         = $this->Komunitas_model->get_nik_penduduk($id);

        if ($this->data['komunitas']) {
            $this->data['page_title'] = 'Detail Data';

            $this->load->view('back/komunitas/komunitas_view', $this->data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
            redirect('komunitas/detail');
        }
    }

    // function detail($id)
    // {
    //     is_login();
    //     is_update();

    //     if (!is_superadmin()) {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
    //         redirect('dashboard');
    //     }

    //     if ($this->data['get_all']) {
    //         $this->data['page_title'] = 'Detail Data ' . $this->data['module'];
    //         $this->data['action']     = 'Komunitas/update_action';

    //         $this->load->view('back/Komunitas/Komunitas_list_detail', $this->data);
    //     } else {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger">Penduduk not found</div>');
    //         redirect('komunitas');
    //     }
    // }

    function delete($id)
    {
        is_login();
        is_delete();

        if (!is_superadmin()) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
            redirect('dashboard');
        }
        $cek_data = "SELECT * FROM reff_kategori_komunitas WHERE id_kategori_komunitas = $id";
        $res_data = $this->db->query($cek_data)->row();

        if ($res_data) {
            $data = array(
                'is_aktif'   => '0',
                'updated_by'  => $this->session->username,
                'updated_at'  => date('Y-m-d H:i:a'),
            );

            $this->db->where('id_kategori_komunitas', $id);
            $this->db->update('reff_kategori_komunitas', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
            redirect('Kategori_komunitas');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
            redirect('Kategori_komunitas');
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

        $cek_data = "SELECT * FROM reff_kategori_komunitas WHERE id_kategori_komunitas = $id";
        $res_data = $this->db->query($cek_data)->row();

        if ($res_data) {
            $sql_delete = "DELETE FROM `reff_kategori_komunitas` WHERE id_kategori_komunitas = '$id'";
            $this->db->query($sql_delete);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
            redirect('Kategori_komunitas/deleted_list');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
            redirect('Kategori_komunitas/deleted_list');
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

        $sql_data = "SELECT * FROM reff_kategori_komunitas WHERE is_aktif = 0";
        $this->data['get_all_deleted']  = $this->db->query($sql_data)->result();


        $this->load->view('back/kategori_komunitas/deleted_list', $this->data);
    }

    function restore($id)
    {
        is_login();
        is_restore();

        if (!is_superadmin()) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
            redirect('dashboard');
        }

        $cek_data = "SELECT * FROM reff_kategori_komunitas WHERE id_kategori_komunitas = $id";
        $res_data = $this->db->query($cek_data)->row();

        if ($res_data) {
            $data = array(
                'is_aktif'   => '1',
                'updated_by'  => $this->session->username,
                'updated_at'  => date('Y-m-d H:i:a'),
            );

            $this->db->where('id_kategori_komunitas', $id);
            $this->db->update('reff_kategori_komunitas', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
            redirect('Kategori_komunitas/deleted_list');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
            redirect('Kategori_komunitas/deleted_list');
        }
    }
}
