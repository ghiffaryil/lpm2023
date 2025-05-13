<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lamusta extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
    $this->data['module'] = 'Lamusta';
    $this->load->model(array('Lamusta_model'));
    $this->load->helper(array('url','html'));
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

    //if(!is_superadmin())
   // {
    //  $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
    //  redirect('dashboard');
  //  }
        
    $this->data['page_title'] = $this->data['module'].' List';
    $this->data['header']     = $this->data['module'];
    $this->data['konselor']   = $this->Lamusta_model->get_all_individu();
    $this->data['get_all_provinsi']  = $this->Lamusta_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Lamusta_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Lamusta_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Lamusta_model->get_all_kelurahan();
    $this->data['data_individu']     = $this->Lamusta_model->get_all_admin_individu();
    $this->data['data_komunitas']    = $this->Lamusta_model->get_laporan_komunitas();
    
    $data['path'] = base_url('assets');
    $this->load->view('back/lamusta/konselor/konselor_list', $this->data);
  }

  function create($id)
  {
    is_login();
    is_create();

  //  if(!is_superadmin())
  //  {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
    //  redirect('dashboard');
  //  }

    $this->data['page_title']       = 'Create New Manfaat Lamusta';
    $this->data['header']           =  $this->data['module'];
    $this->data['action_individu']  = 'lamusta/create_action_individu';
    $this->data['action_komunitas'] = 'lamusta/create_action_komunitas';

    $this->data['data']   		      = $this->Lamusta_model->get_data_individu($id);    
    $this->data['komunitas']        = $this->Lamusta_model->get_data_komunitas($id);
    $this->data['program']   	      = $this->Lamusta_model->get_program();
    $this->data['subprogram']       = $this->Lamusta_model->get_sub_program();
    $this->data['cek_individu']     = $this->Lamusta_model->check_transaksi_individu_by_id($id);
    $this->data['cek_komunitas']    = $this->Lamusta_model->check_transaksi_komunitas_by_id($id);
    $this->data['notif_individu']   = $this->Lamusta_model->get_transaksi_individu_by_date($id);
    $this->data['notif_komunitas']  = $this->Lamusta_model->get_transaksi_komunitas_by_date($id);
    $this->data['rekomender']       = $this->Lamusta_model->get_rekomender();

    $this->load->view('back/lamusta/konselor/konselor_add', $this->data);
  }

  function create_action_individu()
  {   
      if ($this->input->post('rekomendasi_bantuan') == 'Ditolak') {
        $data = array(
          'id_individu'        => $this->input->post('id_individu'),
          'nik'                => $this->input->post('nik'),
          'nama'               => $this->input->post('nama'),
          'id_program'         => $this->input->post('id_program'),
          'id_subprogram'      => $this->input->post('id_subprogram'),
          'info_bantuan'       => $this->input->post('info_bantuan'),
          'jenis_bantuan'      => $this->input->post('jenis_bantuan'),
          'asnaf'              => $this->input->post('asnaf'),
          'status_tinggal'     => $this->input->post('status_tinggal'),
          'kasus'              => $this->input->post('kasus'),
          'rekomendasi_bantuan'=> $this->input->post('rekomendasi_bantuan'),
          'jumlah_permohonan'  => str_replace(",", "", $this->input->post('jumlah_permohonan')),
          'sifat_bantuan'      => $this->input->post('sifat_bantuan'),
          'keterangan'         => $this->input->post('keterangan'),
          'periode_bantuan'    => date('Y-m-d'),
          'total_periode'      => 1,
          'status'             => 4,
          'deleted_at'         => '0000-00-00 00:00:00',
          'created_at'         => date('Y-m-d H:i:s'),
          'created_by'         => $this->session->username
        );
        $this->Lamusta_model->insert($data);
        write_log();
      }else{
        $data = array(
          'id_individu'        => $this->input->post('id_individu'),
          'nik'                => $this->input->post('nik'),
          'nama'               => $this->input->post('nama'),
          'id_program'         => $this->input->post('id_program'),
          'id_subprogram'      => $this->input->post('id_subprogram'),
          'info_bantuan'       => $this->input->post('info_bantuan'),
          'jenis_bantuan'      => $this->input->post('jenis_bantuan'),
          'asnaf'              => $this->input->post('asnaf'),
          'status_tinggal'     => $this->input->post('status_tinggal'),
          'kasus'              => $this->input->post('kasus'),
          'rekomendasi_bantuan'=> $this->input->post('rekomendasi_bantuan'),
          'rencana_bantuan'    => $this->input->post('rencana_bantuan'),
          'mekanisme_bantuan'  => $this->input->post('mekanisme_bantuan'),
          'jumlah_permohonan'  => str_replace(",", "", $this->input->post('jumlah_permohonan')),
          'sifat_bantuan'      => $this->input->post('sifat_bantuan'),
          'keterangan'         => $this->input->post('keterangan'),
          'periode_bantuan'    => date('Y-m-d'),
          'total_periode'      => 1,
          'status'             => 0,
          'deleted_at'         => '0000-00-00 00:00:00',
          'created_at'         => date('Y-m-d H:i:s'),
          'created_by'         => $this->session->username
        );
        $this->Lamusta_model->insert($data);
        write_log();
      }
  }

  function update_individu($id)
  {
    is_login();
    is_update();

   // if(!is_superadmin())
  //  {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
  //  }

    $this->data['page_title']  = 'Update Data '.$this->data['module'];
    $this->data['update_action_individu'] = 'lamusta/update_action_individu';

    $this->data['data']        = $this->Lamusta_model->get_transaksi_individu_update($id);
    $this->data['rekomender']  = $this->Lamusta_model->get_rekomender();
    $this->data['subprogram']  = $this->Lamusta_model->get_sub_program();

    if($this->data['data'])
    {
      $this->load->view('back/lamusta/konselor/konselor_edit_individu', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('lamusta/detail_konselor/'.$this->data['data'][0]['nik']);
    }
  }

  function update_action_individu()
  {   
      if ($this->input->post('rekomendasi_bantuan') == 'Ditolak') {
        $status = 4;
      }else{
        $status = 0;
      }

      $data = array(
        'id_individu'        => $this->input->post('id_individu'),
        'nik'                => $this->input->post('nik'),
        'nama'               => $this->input->post('nama'),
        'id_program'         => $this->input->post('id_program'),
        'id_subprogram'      => $this->input->post('id_subprogram'),
        'info_bantuan'       => $this->input->post('info_bantuan'),
        'jenis_bantuan'     => $this->input->post('jenis_bantuan'),
        'asnaf'              => $this->input->post('asnaf'),
        'status_tinggal'     => $this->input->post('status_tinggal'),
        'kasus'              => $this->input->post('kasus'),
        'rekomendasi_bantuan'=> $this->input->post('rekomendasi_bantuan'),
        'rencana_bantuan'    => $this->input->post('rencana_bantuan'),
        'mekanisme_bantuan'  => $this->input->post('mekanisme_bantuan'),
        'jumlah_permohonan'  => str_replace(",", "", $this->input->post('jumlah_permohonan')),
        'sifat_bantuan'      => $this->input->post('sifat_bantuan'),
        'keterangan'         => $this->input->post('keterangan'),
        'total_periode'      => 1,
        'status'             => $status,
        'deleted_at'         => '0000-00-00 00:00:00',
        'created_by'         => $this->session->username
      );

      $where = $this->input->post('id_transaksi_individu');
    
      $this->Lamusta_model->update($where,$data);

      write_log();
      $this->session->set_flashdata('message', '
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="alert alert-success">Data update succesfully</div>
          </div>
        </div>
      ');
      redirect('lamusta/detail_konselor/'.$this->input->post('nik'));
  } 

  //----------------------- end lamusta individu --------------------------//


  function create_action_komunitas()
  { 
      if ($this->input->post('rekomendasi_bantuan') == 'Ditolak') {
        $data = array(
          'id_komunitas'          => $this->input->post('id_komunitas'),
          'nik'                   => $this->input->post('nik'),
          'nama'                  => $this->input->post('nama'),
          'id_program'            => $this->input->post('id_program'),
          'id_subprogram'         => $this->input->post('id_subprogram'),
          'info_bantuan'          => $this->input->post('info_bantuan'),
          'jenis_bantuan'         => $this->input->post('jenis_bantuan'),
          'asnaf'                 => $this->input->post('asnaf'),        
          'jumlah_pm'             => $this->input->post('jumlah_pm'),
          'rekomendasi_bantuan'   => $this->input->post('rekomendasi_bantuan'),
          'jumlah_permohonan'     => str_replace(",", "", $this->input->post('jumlah_permohonan')),
          'sifat_bantuan'         => $this->input->post('sifat_bantuan'),
          'keterangan'            => $this->input->post('keterangan'),
          'periode_bantuan'       => date('Y-m-d'),
          'total_periode'         => 1,
          'status'                => 4,
          'deleted_at'            => '0000-00-00 00:00:00',
          'created_at'            => date('Y-m-d H:i:s'),
          'created_by'            => $this->session->username
        );
        $this->Lamusta_model->insert_komunitas($data);
        write_log();
      }else{
        $data = array(
          'id_komunitas'          => $this->input->post('id_komunitas'),
          'nik'                   => $this->input->post('nik'),
          'nama'                  => $this->input->post('nama'),
          'id_program'            => $this->input->post('id_program'),
          'id_subprogram'         => $this->input->post('id_subprogram'),
          'info_bantuan'          => $this->input->post('info_bantuan'),
          'jenis_bantuan'         => $this->input->post('jenis_bantuan'),
          'asnaf'                 => $this->input->post('asnaf'),        
          'jumlah_pm'             => $this->input->post('jumlah_pm'),
          'rekomendasi_bantuan'   => $this->input->post('rekomendasi_bantuan'),
          'rencana_bantuan'       => $this->input->post('rencana_bantuan'),
          'mekanisme_bantuan'     => $this->input->post('mekanisme_bantuan'),
          'jumlah_permohonan'     => str_replace(",", "", $this->input->post('jumlah_permohonan')),
          'sifat_bantuan'         => $this->input->post('sifat_bantuan'),
          'keterangan'            => $this->input->post('keterangan'),
          'periode_bantuan'       => date('Y-m-d'),
          'total_periode'         => 1,
          'status'                => 0,
          'deleted_at'            => '0000-00-00 00:00:00',
          'created_at'            => date('Y-m-d H:i:s'),
          'created_by'            => $this->session->username
        );
        $this->Lamusta_model->insert_komunitas($data);
        write_log();
      }
  }

  function update_komunitas($id)
  {
    is_login();
    is_update();

  //  if(!is_superadmin())
  //  {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
 //   }

    $this->data['page_title']  = 'Update Data '.$this->data['module'];
    $this->data['update_action_komunitas'] = 'lamusta/update_action_komunitas';

    $this->data['data']        = $this->Lamusta_model->get_transaksi_komunitas_update($id);
    $this->data['komunitas']   = $this->Lamusta_model->get_data_komunitas();   
    $this->data['program']     = $this->Lamusta_model->get_program();
    $this->data['rekomender']  = $this->Lamusta_model->get_rekomender();
    $this->data['subprogram']  = $this->Lamusta_model->get_sub_program();

    if($this->data['data']){
      $this->load->view('back/lamusta/konselor/konselor_edit_komunitas', $this->data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('lamusta/detail_konselor/'.$this->data['data'][0]['nik']);
    }
  }

  function update_action_komunitas()
  { 
      is_login();
      is_update();

    //  if(!is_superadmin())
   //   {
    //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
    //    redirect('dashboard');
   //   }

      $this->data['page_title'] = 'Edit Manfaat Lamusta';
      $this->data['header']     = $this->data['module'];

      if ($this->input->post('rekomendasi_bantuan') == 'Ditolak') {
        $status = 4;
      }else{
        $status = 0;
      }

      $data = array(
        'id_komunitas'          => $this->input->post('id_komunitas'),
        'id_subprogram'         => $this->input->post('id_subprogram'),
        'info_bantuan'          => $this->input->post('info_bantuan'),
        'jenis_bantuan'        => $this->input->post('jenis_bantuan'),
        'asnaf'                 => $this->input->post('asnaf'),        
        'jumlah_pm'             => $this->input->post('jumlah_pm'),
        'rekomendasi_bantuan'   => $this->input->post('rekomendasi_bantuan'),
        'rencana_bantuan'       => $this->input->post('rencana_bantuan'),
        'mekanisme_bantuan'     => $this->input->post('mekanisme_bantuan'),
        'jumlah_permohonan'     => str_replace(",", "", $this->input->post('jumlah_permohonan')),
        'keterangan'            => $this->input->post('keterangan'),
        'status'                => $status,
        'deleted_at'            => '0000-00-00 00:00:00'
      );

      $where = $this->input->post('id_transaksi_komunitas');
    
      $this->Lamusta_model->update_komunitas($where,$data);

      write_log();
      $this->session->set_flashdata('message', '
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="alert alert-success">Data update succesfully</div>
          </div>
        </div>
      ');
      redirect('lamusta/detail_konselor/'.$this->input->post('nik'));
  }

  function detail_konselor($id)
  {
    is_login();
    is_read();

   // if(!is_superadmin())
   // {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
    //  redirect('dashboard');
  //  }

    $this->data['page_title']        = 'Detail '.$this->data['module'];
    $this->data['header']            = $this->data['module'];
    $this->data['get_all_provinsi']  = $this->Lamusta_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Lamusta_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Lamusta_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Lamusta_model->get_all_kelurahan();
    $this->data['penduduk']          = $this->Lamusta_model->get_penduduk($id);
    $this->data['data_individu']     = $this->Lamusta_model->get_transaksi_individu_by_id($id);
    $this->data['data_komunitas']    = $this->Lamusta_model->get_transaksi_komunitas_by_id($id);
    $this->data['detail_individu']   = $this->Lamusta_model->get_detail_individu_by_id($id);
    $this->data['detail_komunitas']  = $this->Lamusta_model->get_detail_komunitas_by_id($id);

    $data['path'] = base_url('assets');
    $this->load->view('back/lamusta/konselor/konselor_detail', $this->data);
  }

  function delete_komunitas($id)
  {
    is_login();
    is_delete();

  //  if(!is_superadmin())
  //  {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
    //  redirect('dashboard');
  //  }

    $delete = $this->Lamusta_model->delete_transaksi_komunitas_by_id($id);

    if($delete)
    {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Lamusta_model->soft_delete_komunitas($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('lamusta/detail_konselor/'.$delete->nik);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('lamusta/detail_konselor');
    }
  }

  function delete_individu($id)
  {
    is_login();
    is_delete();

  //  if(!is_superadmin())
   // {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
   // }

    $delete = $this->Lamusta_model->delete_transaksi_individu_by_id($id);

    if($delete)
    {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Lamusta_model->soft_delete($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('lamusta/detail_konselor/'.$delete->nik);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('lamusta/detail_konselor'.$delete->nik);
    }
  }

  function delete_permanent_individu($id)
  {
    is_login();
    is_delete();

  //  if(!is_superadmin())
 //   {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
  //  }

    $delete = $this->Lamusta_model->get_by_id($id);

    if($delete)
    {
      $this->Lamusta_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('lamusta/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('lamusta/deleted_list');
    }
  }

  function delete_permanent_komunitas($id)
  {
    is_login();
    is_delete();

 //   if(!is_superadmin())
  //  {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
  //  }

    $delete = $this->Lamusta_model->delete_transaksi_komunitas_by_id($id);

    if($delete)
    {
      $this->Lamusta_model->delete_permanent($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('lamusta/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('lamusta/deleted_list');
    }
  }

  function deleted_list()
  {
    is_login();
    is_restore();

  //  if(!is_superadmin())
  //  {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
  //  }

    $this->data['page_title'] = 'Deleted '.$this->data['module'].' List';

    $this->data['komunitas'] = $this->Lamusta_model->get_all_deleted_komunitas();
    $this->data['individu']  = $this->Lamusta_model->get_all_deleted_individu();

    $this->load->view('back/lamusta/deleted_list', $this->data);
  }

  function restore_komunitas($id)
  {
    is_login();
    is_restore();

  //  if(!is_superadmin())
  //  {
    //  $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
  //  }

    $row = $this->Lamusta_model->get_transaksi_komunitas_update($id);

    if($row)
    {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Lamusta_model->update_komunitas($id, $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('lamusta/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('lamusta/deleted_list');
    }
  }

  function restore_individu($id)
  {
    is_login();
    is_restore();

  //  if(!is_superadmin())
  //  {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
   // }

    $row = $this->Lamusta_model->get_by_id($id);

    if($row)
    {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Lamusta_model->update($id, $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('lamusta/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('lamusta/deleted_list');
    }
  }

  //----------------------- lamusta admin --------------------------//

  function admin()
  {
    is_login();
    is_read();

   // if(!is_superadmin())
  //  {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
   // }

    $this->data['page_title']      = 'Data '.$this->data['module'];
    $this->data['header']          = $this->data['module'];
    $this->data['individu']        = $this->Lamusta_model->get_all_admin_individu();
    $this->data['notif_individu']  = $this->Lamusta_model->get_notif_admin_individu();
    $this->data['komunitas']       = $this->Lamusta_model->get_all_admin_komunitas();
    $this->data['notif_komunitas'] = $this->Lamusta_model->get_notif_admin_komunitas();

    $data['path'] = base_url('assets');
    $this->load->view('back/lamusta/admin/list', $this->data);
  }

  function update_admin_individu($id)
  {
    is_login();
    is_update();

  //  if(!is_superadmin())
  //  {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
  //  }

    $this->data['page_title']  = 'Update Data '.$this->data['module'];
    $this->data['action_admin_individu'] = 'lamusta/action_admin_individu';

    $this->data['data']        = $this->Lamusta_model->get_transaksi_individu_update($id);
    $this->data['rekomender']  = $this->Lamusta_model->get_rekomender();
    $this->data['subprogram']  = $this->Lamusta_model->get_sub_program();

    if($this->data['data'])
    {
      $this->load->view('back/lamusta/admin/edit_individu', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('lamusta/admin');
    }
  }

  function action_admin_individu()
  {
      if ($this->input->post('rekomendasi_bantuan') == 'Disurvey' || $this->input->post('rekomendasi_bantuan') == 'Datang Kembali' || $this->input->post('rekomendasi_bantuan') == 'Lengkapi Berkas') {
        $status = 0;
      }elseif($this->input->post('rekomendasi_bantuan') == 'Dibantu'){
        $status = 1;
      }elseif($this->input->post('rekomendasi_bantuan') == 'Ditolak'){
        $status = 4;
      }

      $data = array(
        'rekomendasi_bantuan'=> $this->input->post('rekomendasi_bantuan'),
        'sumber_dana'        => $this->input->post('sumber_dana'),
        'rencana_bantuan'    => $this->input->post('rencana_bantuan'),
        'mekanisme_bantuan'  => $this->input->post('mekanisme_bantuan'),
        'jumlah_bantuan'     => str_replace(",", "", $this->input->post('jumlah_bantuan')),
        'penyalur'           => $this->input->post('penyalur'),
        'status'             => $status,
      );

      $where = $this->input->post('id_transaksi_individu');
    
      $this->Lamusta_model->update($where,$data);

      write_log();
      $this->session->set_flashdata('message', '
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="alert alert-success">Data update succesfully</div>
          </div>
        </div>
      ');
      redirect('lamusta/admin');
  }

  function detail_admin_individu($id)
  {
    is_login();
    is_read();

  //  if(!is_superadmin())
  //  {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
  //  }

    $this->data['page_title']        = 'Detail '.$this->data['module'];
    $this->data['header']            = $this->data['module'];
    $this->data['get_all_provinsi']  = $this->Lamusta_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Lamusta_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Lamusta_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Lamusta_model->get_all_kelurahan();
    $this->data['penduduk']          = $this->Lamusta_model->get_penduduk($id);

    $data['path'] = base_url('assets');
    $this->load->view('back/lamusta/admin/detail_individu', $this->data);
  }

  function detail_admin_komunitas($id)
  {
    is_login();
    is_read();

  //  if(!is_superadmin())
 //   {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
   // }

    $this->data['page_title']        = 'Detail '.$this->data['module'];
    $this->data['header']            = $this->data['module'];
    $this->data['get_all_provinsi']  = $this->Lamusta_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Lamusta_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Lamusta_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Lamusta_model->get_all_kelurahan();
    $this->data['penduduk']          = $this->Lamusta_model->get_penduduk($id);
    $this->data['komunitas']         = $this->Lamusta_model->get_detail_komunitas_by_id($id);

    $data['path'] = base_url('assets');
    $this->load->view('back/lamusta/admin/detail_komunitas', $this->data);
  }

  function update_admin_komunitas($id)
  {
    is_login();
    is_update();

  //  if(!is_superadmin())
  //  {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
   // }

    $this->data['page_title']  = 'Update Data '.$this->data['module'];
    $this->data['action_admin_komunitas'] = 'lamusta/action_admin_komunitas';

    $this->data['data']        = $this->Lamusta_model->get_transaksi_komunitas_update($id);
    $this->data['rekomender']  = $this->Lamusta_model->get_rekomender();
    $this->data['subprogram']  = $this->Lamusta_model->get_sub_program();

    if($this->data['data'])
    {
      $this->load->view('back/lamusta/admin/edit_komunitas', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('lamusta/admin');
    }
  }

  function action_admin_komunitas()
  {
      if ($this->input->post('rekomendasi_bantuan') == 'Disurvey' || $this->input->post('rekomendasi_bantuan') == 'Datang Kembali' || $this->input->post('rekomendasi_bantuan') == 'Lengkapi Berkas')
      {
        $status = 0;
      } elseif ($this->input->post('rekomendasi_bantuan') == 'Dibantu'){
        $status = 1;
      } elseif ($this->input->post('rekomendasi_bantuan') == 'Ditolak'){
        $status = 4;
      }

      $data = array(
        'rekomendasi_bantuan'=> $this->input->post('rekomendasi_bantuan'),
        'rencana_bantuan'    => $this->input->post('rencana_bantuan'),
        'mekanisme_bantuan'  => $this->input->post('mekanisme_bantuan'),
        'jumlah_bantuan'     => str_replace(",", "", $this->input->post('jumlah_bantuan')),
        'penyalur'           => $this->input->post('penyalur'),
        'status'             => $status,
      );

      $where = $this->input->post('id_transaksi_komunitas');
    
      $this->Lamusta_model->update_komunitas($where,$data);

      write_log();
      $this->session->set_flashdata('message', '
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="alert alert-success">Data update succesfully</div>
          </div>
        </div>
      ');
      redirect('lamusta/admin');
  }

  //----------------------- lamusta approval --------------------------//

  function approval()
  {
    is_login();
    is_read();

  //  if(!is_superadmin())
  //  {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
  //  }

    $this->data['page_title']      = 'Data '.$this->data['module'];
    $this->data['header']          = $this->data['module'];    
    $this->data['action_approval_individu'] = 'lamusta/action_approval_individu';
    $this->data['individu']        = $this->Lamusta_model->get_all_approval_individu();
    $this->data['notif_individu']  = $this->Lamusta_model->get_notif_approveal_individu();
    $this->data['komunitas']       = $this->Lamusta_model->get_all_approval_komunitas();
    $this->data['notif_komunitas'] = $this->Lamusta_model->get_notif_approveal_komunitas();

    $data['path'] = base_url('assets');
    $this->load->view('back/lamusta/approval/list', $this->data);
  }

  function action_approval_individu($id)
  {   
      $data = array(
        'status' => 2,
      );

      $where = $id;
      $this->Lamusta_model->update($where,$data);

      write_log();
      $this->session->set_flashdata('message', '
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="alert alert-success">Data update succesfully</div>
          </div>
        </div>
      ');
      redirect('lamusta/approval');
  }

  function action_reject_individu($id)
  {   
      $data = array(
        'rekomendasi_bantuan'=> 'Ditolak',
        'rencana_bantuan'    => NULL,
        'mekanisme_bantuan'  => NULL,
        'jumlah_bantuan'     => NULL,
        'penyalur'           => NULL,
        'status'             => 4,
      );

      $where = $id;
      $this->Lamusta_model->update($where,$data);

      write_log();
      $this->session->set_flashdata('message', '
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="alert alert-success">Data update succesfully</div>
          </div>
        </div>
      ');
      redirect('lamusta/approval');
  }

  function detail_approval_individu($id)
  {
    is_login();
    is_read();

 //   if(!is_superadmin())
  //  {
 //     $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
  //  }

    $this->data['page_title']        = 'Detail '.$this->data['module'];
    $this->data['header']            = $this->data['module'];
    $this->data['get_all_provinsi']  = $this->Lamusta_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Lamusta_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Lamusta_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Lamusta_model->get_all_kelurahan();
    $this->data['penduduk']          = $this->Lamusta_model->get_penduduk($id);

    $data['path'] = base_url('assets');
    $this->load->view('back/lamusta/approval/detail_individu', $this->data);
  }

  function detail_approval_komunitas($id)
  {
    is_login();
    is_read();

 //   if(!is_superadmin())
  //  {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
  //  }

    $this->data['page_title']        = 'Detail '.$this->data['module'];
    $this->data['header']            = $this->data['module'];
    $this->data['get_all_provinsi']  = $this->Lamusta_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Lamusta_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Lamusta_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Lamusta_model->get_all_kelurahan();
    $this->data['penduduk']          = $this->Lamusta_model->get_penduduk($id);
    $this->data['komunitas']         = $this->Lamusta_model->get_detail_komunitas_by_id($id);

    $data['path'] = base_url('assets');
    $this->load->view('back/lamusta/approval/detail_komunitas', $this->data);
  }

  function update_approval_komunitas($id)
  {
    is_login();
    is_update();

  //  if(!is_superadmin())
  //  {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
  //  }

    $this->data['page_title']                = 'Update Data '.$this->data['module'];
    $this->data['action_approval_komunitas'] = 'lamusta/action_approval_komunitas';
    $this->data['data']                      = $this->Lamusta_model->get_transaksi_komunitas_update($id);
    $this->data['rekomender']                = $this->Lamusta_model->get_rekomender();
    $this->data['subprogram']                = $this->Lamusta_model->get_sub_program();

    if($this->data['data'])
    {
      $this->load->view('back/lamusta/approval/edit_komunitas', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('lamusta/approval');
    }
  }

  function action_approval_komunitas()
  {   
      if ($this->input->get('status') == '2')
      {
        $data = array(
            'status'             => 2,
        );
      }
      elseif($this->input->get('status') == '4')
      {
        $data = array(
            'rekomendasi_bantuan'=> 'Ditolak',
            'rencana_bantuan'    => NULL,
            'mekanisme_bantuan'  => NULL,
            'jumlah_bantuan'     => NULL,
            'penyalur'           => NULL,
            'status'             => 4,
        );
      }

      $where = $this->input->get('id_transaksi_komunitas');
      $this->Lamusta_model->update_komunitas($where,$data);

      write_log();
      $this->session->set_flashdata('message', '
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="alert alert-success">Data update succesfully</div>
          </div>
        </div>
      ');
      redirect('lamusta/approval');
  }

  //----------------------- lamusta approval kasir--------------------------//

  function kasir()
  {
    is_login();
    is_read();

  //  if(!is_superadmin())
  //  {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
  //  }

    $this->data['page_title']      = 'Data '.$this->data['module'];
    $this->data['header']          = $this->data['module'];
    $this->data['individu']        = $this->Lamusta_model->get_kasir_approval_individu();
    $this->data['notif_individu']  = $this->Lamusta_model->get_notif_kasir_individu();
    $this->data['komunitas']       = $this->Lamusta_model->get_kasir_approval_komunitas();
    $this->data['notif_komunitas'] = $this->Lamusta_model->get_notif_kasir_komunitas();
    $this->data['action_kasir_individu'] = 'lamusta/action_kasir_individu';

    $this->data['data_individu']   = $this->Lamusta_model->get_laporan_kasir_individu();
    $this->data['data_komunitas']  = $this->Lamusta_model->get_laporan_kasir_komunitas();

    $data['path'] = base_url('assets');
    $this->load->view('back/lamusta/kasir/list', $this->data);
  }

  function detail_kasir_individu($id)
  {
    is_login();
    is_read();

  //  if(!is_superadmin())
  //  {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
  //  }

    $this->data['page_title']        = 'Detail '.$this->data['module'];
    $this->data['header']            = $this->data['module'];
    $this->data['get_all_provinsi']  = $this->Lamusta_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Lamusta_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Lamusta_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Lamusta_model->get_all_kelurahan();
    $this->data['penduduk']          = $this->Lamusta_model->get_penduduk($id);

    $data['path'] = base_url('assets');
    $this->load->view('back/lamusta/kasir/detail_individu', $this->data);
  }

  function detail_kasir_komunitas($id)
  {
    is_login();
    is_read();

 //   if(!is_superadmin())
  //  {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
  //  }

    $this->data['page_title']        = 'Detail '.$this->data['module'];
    $this->data['header']            = $this->data['module'];
    $this->data['get_all_provinsi']  = $this->Lamusta_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Lamusta_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Lamusta_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Lamusta_model->get_all_kelurahan();
    $this->data['penduduk']          = $this->Lamusta_model->get_penduduk($id);
    $this->data['komunitas']         = $this->Lamusta_model->get_detail_komunitas_by_id($id);

    $data['path'] = base_url('assets');
    $this->load->view('back/lamusta/kasir/detail_komunitas', $this->data);
  }

  function action_kasir_individu()
  {   
      $status                = $this->input->get('status');
      $id_transaksi_individu = $this->input->get('id_transaksi_individu');
      if ($status == '3'){
        $data = array(
            'status'  => 3,
        );
      }elseif($status == '4'){
        $data = array(
            'rekomendasi_bantuan' => 'Ditolak',
            'rencana_bantuan'     => NULL,
            'mekanisme_bantuan'   => NULL,
            'jumlah_bantuan'      => NULL,
            'periode_bantuan'     => NULL,
            'total_periode'       => NULL,
            'penyalur'            => NULL,
            'status'              => 4,
        );
      }

      $where = $id_transaksi_individu;
      $this->Lamusta_model->update($where,$data);

      write_log();

      if ($status == '3') {
        $this->session->set_flashdata('message', '<script>Swal.fire({
              title:"Yeah!",
              html :"Data succesfully approved.",
              icon :"success"
           })</script>');
      }elseif ($status == '4') {
        $this->session->set_flashdata('message', '<script>Swal.fire({
              title:"Yeah!",
              html :"Data successfully rejected.",
              icon :"success"
           })</script>');
      }
      
      redirect('lamusta/kasir');
  }

  function update_kasir_komunitas($id)
  {
    is_login();
    is_update();

  //  if(!is_superadmin())
 //   {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
  //    redirect('dashboard');
   // }

    $this->data['page_title']  = 'Update Data '.$this->data['module'];
    $this->data['action_kasir_komunitas'] = 'lamusta/action_kasir_komunitas';

    $this->data['data']        = $this->Lamusta_model->get_transaksi_komunitas_update($id);
    $this->data['rekomender']  = $this->Lamusta_model->get_rekomender();
    $this->data['subprogram']  = $this->Lamusta_model->get_sub_program();

    if($this->data['data'])
    {
      $this->load->view('back/lamusta/kasir/edit_komunitas', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data not found</div>');
      redirect('lamusta/kasir');
    }
  }

  function action_kasir_komunitas()
  {   
      $status                 = $this->input->get('status');
      $id_transaksi_komunitas = $this->input->get('id_transaksi_komunitas');

      if ($status == '3'){
        $data = array(
            'status' => 3,
        );
      }elseif($status == '4'){
        $data = array(
            'rekomendasi_bantuan' => 'Ditolak',
            'rencana_bantuan'     => NULL,
            'mekanisme_bantuan'   => NULL,
            'jumlah_bantuan'      => NULL,
            'periode_bantuan'     => NULL,
            'total_periode'       => NULL,
            'penyalur'            => NULL,
            'status'              => 4,
        );
      }

      $where = $id_transaksi_komunitas;
      $this->Lamusta_model->update_komunitas($where,$data);

      write_log();
      if ($status == '3') {
        $this->session->set_flashdata('message', '<script>Swal.fire({
              title:"Yeah!",
              html :"Data succesfully approved.",
              icon :"success"
           })</script>');
      }elseif ($status == '4') {
        $this->session->set_flashdata('message', '<script>Swal.fire({
              title:"Yeah!",
              html :"Data successfully rejected.",
              icon :"success"
           })</script>');
      }
      redirect('lamusta/kasir');
  }

  //------------------------[ Lamusta Laporan Customer Care ]-----------------------------//

  function laporan_customer_care()
  {
    is_login();
    is_read();

 //   if(!is_superadmin())
  //  {
  //    $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
  //  }

    $this->data['page_title']        = 'Data '. $this->data['module'];
    $this->data['header']            = 'Laporan Customer Care';
    $this->data['get_all_provinsi']  = $this->Lamusta_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Lamusta_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Lamusta_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Lamusta_model->get_all_kelurahan();
    $this->data['individu']          = $this->Lamusta_model->get_all_admin_individu();
    $this->data['komunitas']         = $this->Lamusta_model->get_laporan_komunitas();

    $data['path'] = base_url('assets');
    $this->load->view('back/lamusta/laporan/customer_care', $this->data);
  }

  function detail_individu($id)
  {
    is_login();
    is_read();

   // if(!is_superadmin())
   // {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
    //  redirect('dashboard');
   // }

    $this->data['page_title']        = 'Detail '.$this->data['module'];
    $this->data['header']            = $this->data['module'];
    $this->data['get_all_provinsi']  = $this->Lamusta_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Lamusta_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Lamusta_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Lamusta_model->get_all_kelurahan();
    $this->data['penduduk']          = $this->Lamusta_model->get_penduduk($id);

    $data['path'] = base_url('assets');
    $this->load->view('back/lamusta/laporan/detail_individu', $this->data);
  }

  function detail_komunitas($id)
  {
    is_login();
    is_read();

   // if(!is_superadmin())
  //  {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
  //  }

    $this->data['page_title']        = 'Detail '.$this->data['module'];
    $this->data['header']            = $this->data['module'];
    $this->data['get_all_provinsi']  = $this->Lamusta_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Lamusta_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Lamusta_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Lamusta_model->get_all_kelurahan();
    $this->data['penduduk']          = $this->Lamusta_model->get_penduduk($id);
    $this->data['komunitas']         = $this->Lamusta_model->get_laporan_transaksi_komunitas($id);

    $data['path'] = base_url('assets');
    $this->load->view('back/lamusta/laporan/detail_komunitas', $this->data);
  }

  //------------------------[ Lamusta Laporan Konselor ]-----------------------------//

  function laporan_konselor()
  {
    is_login();
    is_read();

  //  if(!is_superadmin())
  //  {
    //  $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
   // }

    $this->data['page_title']        = 'Data '. $this->data['module'];
    $this->data['header']            = 'Laporan Konselor';
    $this->data['get_all_provinsi']  = $this->Lamusta_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Lamusta_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Lamusta_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Lamusta_model->get_all_kelurahan();
    $this->data['individu']          = $this->Lamusta_model->get_all_admin_individu();
    $this->data['komunitas']         = $this->Lamusta_model->get_laporan_komunitas();

    $data['path'] = base_url('assets');
    $this->load->view('back/lamusta/laporan/konselor', $this->data);
  }

  //------------------------[ Lamusta Laporan Admin         ]-----------------------------//

  function laporan_admin()
  {
    is_login();
    is_read();

   // if(!is_superadmin())
  //  {
    //  $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
   // }

    $this->data['page_title']        = 'Data '. $this->data['module'];
    $this->data['header']            = 'Laporan Admin';
    $this->data['get_all_provinsi']  = $this->Lamusta_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Lamusta_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Lamusta_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Lamusta_model->get_all_kelurahan();
    $this->data['individu']          = $this->Lamusta_model->get_all_admin_individu();
    $this->data['komunitas']         = $this->Lamusta_model->get_laporan_komunitas();

    $data['path'] = base_url('assets');
    $this->load->view('back/lamusta/laporan/admin', $this->data);
  }

  //------------------------[ Lamusta Laporan Kasir ]-----------------------------//

  function laporan_kasir()
  {
    is_login();
    is_read();

 //   if(!is_superadmin())
  //  {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
   // }

    $this->data['page_title']        = 'Data '. $this->data['module'];
    $this->data['header']            = 'Laporan Kasir';
    $this->data['get_all_provinsi']  = $this->Lamusta_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Lamusta_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Lamusta_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Lamusta_model->get_all_kelurahan();
    $this->data['individu']          = $this->Lamusta_model->get_laporan_kasir_individu();
    $this->data['komunitas']         = $this->Lamusta_model->get_laporan_kasir_komunitas();

    $this->data['total_individu_asnaf'] = $this->Lamusta_model->get_total_laporan_individu_asnaf();
    $this->data['total_individu_prov'] = $this->Lamusta_model->get_total_laporan_individu_prov();

    $this->data['total_komunitas_asnaf'] = $this->Lamusta_model->get_total_laporan_komunitas_asnaf();
    $this->data['total_komunitas_prov'] = $this->Lamusta_model->get_total_laporan_komunitas_prov();

    $data['path'] = base_url('assets');
    $this->load->view('back/lamusta/laporan/kasir', $this->data);
  }

  //------------------------[ Lamusta Laporan Untuk Pusat ]-----------------------------//

  function laporan_pusat()
  {
    is_login();
    is_read();

  //  if(!is_superadmin())
  //  {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
   // }

    $this->data['page_title']        = 'Data '. $this->data['module'];
    $this->data['header']            = 'Laporan Pusat';
    $this->data['get_all_provinsi']  = $this->Lamusta_model->get_all_provinsi();
    $this->data['get_all_kabupaten'] = $this->Lamusta_model->get_all_kabupaten();
    $this->data['get_all_kecamatan'] = $this->Lamusta_model->get_all_kecamatan();
    $this->data['get_all_kelurahan'] = $this->Lamusta_model->get_all_kelurahan();
    $this->data['individu']          = $this->Lamusta_model->get_laporan_pusat_individu();
    $this->data['komunitas']         = $this->Lamusta_model->get_laporan_komunitas();
    $this->data['penduduk']          = $this->Lamusta_model->get_all_penduduk();

    $data['path'] = base_url('assets');
    $this->load->view('back/lamusta/laporan/pusat', $this->data);
  }

  function kwitansi_individu($id)
  {
    is_login();
    is_read();

  //  if(!is_superadmin())
  //  {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
   // }
    
    $this->data['data'] = $this->Lamusta_model->kwitansi_individu($id);

    $this->load->library('Pdf');
    $title       = 'Kwitansi';
    $paper       = 'A4';
    $orientation = "portrait";
    $data        = $this->load->view('back/lamusta/laporan/kwitansi_individu', $this->data, true);     
    $this->pdf->generate($data, $title, $paper, $orientation);

  }

  function kwitansi_komunitas($id)
  {
    is_login();
    is_read();

  //  if(!is_superadmin())
  //  {
   //   $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
   //   redirect('dashboard');
  //  }
    
    $this->data['data'] = $this->Lamusta_model->kwitansi_komunitas($id);

    $this->load->library('Pdf');
    $title       = 'Kwitansi';
    $paper       = 'A4';
    $orientation = "portrait";
    $data        = $this->load->view('back/lamusta/laporan/kwitansi_komunitas', $this->data, true);     
    $this->pdf->generate($data, $title, $paper, $orientation);

  }

}
