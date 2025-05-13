<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barzah_model extends CI_Model
{

  public $table = 'barzah';
  public $table_individu = 'transaksi_individu';
  public $table_komunitas = 'transaksi_komunitas';
  public $table_komunitasdetail = 'transaksi_komunitas_d';
  public $id    = 'id_barzah';
  public $id_individu  = 'id_transaksi_individu';
  public $id_komunitas = 'id_transaksi_komunitas';
  public $order = 'DESC';

  function get_all()
  {
    $this->db->join('penduduk', 'penduduk.nik = barzah.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('barzah.is_delete', '0');

    return $this->db->get($this->table)->result();
  }

  function get_individu()
  {
    $this->db->select('*');
    $this->db->from('individu');
    $this->db->where('is_delete', '0');
    $query = $this->db->get();
    return $query->result();
  }

  function get_petugas()
  {
    $this->db->select('*');
    $this->db->from('petugas');
    $this->db->where('is_active', '1');
    $this->db->where('is_delete', '0');
    $query = $this->db->get();
    return $query->result();
  }

  function get_rekomender()
  {
    $this->db->select('*');
    $this->db->from('rekomender');
    $this->db->where('is_delete', '0');
    $query = $this->db->get();
    return $query->result();
  }

  function get_all_header()
  {
    $this->db->select('*');
    $this->db->from('barzah');
    $this->db->join('penduduk', 'penduduk.nik = barzah.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('barzah.is_delete', '0');
    $this->db->order_by('barzah.created_at', 'asc');
    $query = $this->db->get();
    return $query->result();
  }

  function get_check($id)
  {
    $this->db->where('nik', $id);
    return $this->db->get($this->table_individu)->row();
  }

  function get_all_combobox()
  {
    $this->db->order_by('name');
    $data = $this->db->get($this->table);

    if ($data->num_rows() > 0) {
      foreach ($data->result_array() as $row) {
        $result[''] = '- Please Choose Users';
        $result[$row['id_users']] = $row['name'];
      }
      return $result;
    }
  }

  function get_transaksi_individu_by_id($id)
  {
    $this->db->select('*, COUNT(*) AS total_individu, SUM(`transaksi_individu`.`jumlah_bantuan`) AS rincian_individu');
    $this->db->from('transaksi_individu');
    $this->db->join('individu', 'individu.nik = transaksi_individu.nik', 'left');
    $this->db->join('penduduk', 'penduduk.nik = individu.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('transaksi_individu.is_delete', '0');
    $this->db->where('transaksi_individu.id_program', '9');
    $this->db->where('transaksi_individu.nik', $id);
    $query = $this->db->get();
    return $query->result();
  }

  function get_detail_individu_by_id($id)
  {
    $this->db->select('*');
    $this->db->from('transaksi_individu');
    $this->db->join('individu', 'individu.nik = transaksi_individu.nik', 'left');
    $this->db->join('program', 'program.id_program = transaksi_individu.id_program', 'left');
    $this->db->join('sub_program', 'sub_program.id_subprogram = transaksi_individu.id_subprogram', 'left');
    $this->db->join('penduduk', 'penduduk.nik = individu.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('transaksi_individu.is_delete', '0');
    $this->db->where('transaksi_individu.id_program', '9');
    $this->db->where('transaksi_individu.nik', $id);
    $query = $this->db->get();
    return $query->result();
  }

  function get_detail_komunitas_by_id($id)
  {
    $this->db->select('*');
    $this->db->from('transaksi_komunitas');
    $this->db->join('komunitas', 'komunitas.nik = transaksi_komunitas.nik', 'left');
    $this->db->join('program', 'program.id_program = transaksi_komunitas.id_program', 'left');
    $this->db->join('sub_program', 'sub_program.id_subprogram = transaksi_komunitas.id_subprogram', 'left');
    $this->db->join('penduduk', 'penduduk.nik = komunitas.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('transaksi_komunitas.is_delete', '0');
    $this->db->where('transaksi_komunitas.id_program', '9');
    $this->db->where('transaksi_komunitas.nik', $id);
    $query = $this->db->get();
    return $query->result();
  }

  function get_transaksi_komunitas_by_id($id)
  {
    $this->db->select('*, COUNT(*) AS total_komunitas, SUM(`transaksi_komunitas`.`jumlah_bantuan`) AS rincian_komunitas');
    $this->db->from('transaksi_komunitas');
    $this->db->join('komunitas', 'komunitas.nik = transaksi_komunitas.nik', 'left');
    $this->db->join('penduduk', 'penduduk.nik = komunitas.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('transaksi_komunitas.is_delete', '0');
    $this->db->where('transaksi_komunitas.nik', $id);
    $query = $this->db->get();
    return $query->result();
  }

  public function get_nik_penduduk($nik)
  {
    $this->db->select('*, penduduk.nama as nama, penduduk.nik as nik');
    $this->db->from('penduduk');
    $this->db->join('barzah', 'barzah.nik = penduduk.nik', 'left');
    $this->db->join('individu', 'penduduk.nik = individu.nik', 'left');
    $this->db->where('penduduk.is_active', '0');
    $this->db->where('penduduk.nik ', $nik);
    $query = $this->db->get();
    return $query->row();
  }

  function get_negara()
  {
    $this->db->select('*');
    $this->db->from('negara');

    return $this->db->get()->result();
  }

  function get_agama()
  {
    $this->db->select('*');
    $this->db->from('agama');

    return $this->db->get()->result();
  }

  function get_all_provinsi()
  {
    $this->db->select('*');
    $this->db->from('provinsi');

    return $this->db->get()->result();
  }

  function get_all_kabupaten()
  {
    $this->db->select('*');
    $this->db->from('kota_kab');
    return $this->db->get()->result();
  }

  function get_all_kecamatan()
  {
    $this->db->select('*');
    $this->db->from('kecamatan');
    return $this->db->get()->result();
  }

  function get_all_kelurahan()
  {
    $this->db->select('*');
    $this->db->from('desa_kelurahan');
    return $this->db->get()->result();
  }

  function get_all_barzah()
  {
    $this->db->select('*');
    $this->db->from('barzah');
    $this->db->join('penduduk', 'penduduk.nik = barzah.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('barzah.is_delete', '0');
    $query = $this->db->get();
    return $query->result();
  }

  function get_all_individu()
  {
    $this->db->select('*');
    $this->db->from('individu');
    $this->db->join('penduduk', 'penduduk.nik = individu.nik', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('individu.is_delete', '0');
    $query = $this->db->get();
    return $query->result();
  }

  function check_transaksi_komunitas_by_id($id)
  {
    $this->db->select('*');
    $this->db->from('transaksi_komunitas');
    $this->db->where('is_delete', '0');
    $this->db->where('nik', $id);
    $this->db->where('id_program', '9');
    $query = $this->db->get();
    return $query->num_rows();
  }

  function check_transaksi_individu_by_id($id)
  {
    $this->db->select('*');
    $this->db->from('transaksi_individu');
    $this->db->where('is_delete', '0');
    $this->db->where('nik', $id);
    $this->db->where('id_program', '9');
    $query = $this->db->get();
    return $query->num_rows();
  }

  function get_transaksi_individu_by_date($id)
  {
    $this->db->select('*');
    $this->db->from('transaksi_individu');
    $this->db->where('is_delete', '0');
    $this->db->where('nik', $id);
    $this->db->where('id_program', '9');
    $this->db->order_by('created_at', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  function get_datapenduduk()
  {
    $this->db->select('*');
    $this->db->from('penduduk');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('is_delete', '0');
    $query = $this->db->get();
    return $query->result();
  }

  function get_transaksi_komunitas_by_date($id)
  {
    $this->db->select('*');
    $this->db->from('transaksi_komunitas');
    $this->db->where('is_delete', '0');
    $this->db->where('nik', $id);
    $this->db->where('id_program', '9');
    $this->db->order_by('created_at', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  function get_data_individu($id)
  {
    $this->db->select('*');
    $this->db->from('individu');
    $this->db->join('penduduk', 'penduduk.nik = individu.nik', 'left');
    $this->db->where('individu.is_delete', '0');
    $this->db->where('individu.nik', $id);
    $query = $this->db->get();
    return $query->row();
  }

  function get_penduduk($id)
  {
    $this->db->select('*');
    $this->db->from('penduduk');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('is_delete', '0');
    $this->db->where('penduduk.nik', $id);
    $query = $this->db->get();
    return $query->row();
  }

  function get_data_komunitas()
  {
    $this->db->select('*');
    $this->db->from('komunitas');
    $this->db->where('is_delete', '0');
    $query = $this->db->get();
    return $query->result();
  }

  function get_program()
  {
    $this->db->select('*');
    $this->db->from('program');
    $this->db->where('is_active', '1');
    $this->db->where('id_program ', '9');
    $query = $this->db->get();
    return $query->result();
  }

  function get_sub_program()
  {
    $this->db->select('*');
    $this->db->from('sub_program');
    $this->db->where('is_delete', '0');
    $this->db->where('id_program', '9');
    $query = $this->db->get();
    return $query->result();
  }


  public function get_kabupaten($data = null)
  {
    $where = ' ';
    if (@$data['id_kota_kab']) {
      $where .= "AND a.id_kota_kab = '" . $data['id_kota_kab'] . "'";
    }
    if (@$data['id_provinsi']) {
      $where .= "AND a.id_provinsi = '" . $data['id_provinsi'] . "'";
    }
    $sql = 'SELECT a.*
      FROM kota_kab AS a
      WHERE 1+1=2 ' . $where;
    $query = $this->db->query($sql);
    $result = $query->result_array();
    return $result;
  }

  public function get_kecamatan($data = null)
  {
    $where = ' ';
    if (@$data['id_kota_kab']) {
      $where .= "AND a.id_kota_kab = '" . $data['id_kota_kab'] . "'";
    }
    if (@$data['id_kecamatan']) {
      $where .= "AND a.id_kecamatan = '" . $data['id_kecamatan'] . "'";
    }
    $sql = 'SELECT a.*
      FROM kecamatan AS a
      WHERE 1+1=2 ' . $where;
    $query = $this->db->query($sql);
    $result = $query->result_array();
    return $result;
  }



  public function get_desa_kelurahan($data = null)
  {
    $where = ' ';
    if (@$data['id_kecamatan']) {
      $where .= "AND a.id_kecamatan = '" . $data['id_kecamatan'] . "'";
    }
    if (@$data['id_desa_kelurahan']) {
      $where .= "AND a.id_desa_kelurahan = '" . $data['id_desa_kelurahan'] . "'";
    }
    $sql = 'SELECT a.*
      FROM desa_kelurahan AS a
      WHERE 1+1=2 ' . $where;
    $query = $this->db->query($sql);
    $result = $query->result_array();
    return $result;
  }

  function get_all_admin_individu()
  {
    $this->db->select('*, transaksi_individu.created_at as tanggal_transaksi,  transaksi_individu.created_by as created_by');
    $this->db->from('transaksi_individu');
    $this->db->join('rekomender', 'rekomender.id_rekomender = transaksi_individu.info_bantuan', 'left');
    $this->db->join('individu', 'individu.nik = transaksi_individu.nik', 'left');
    $this->db->join('penduduk', 'penduduk.nik = transaksi_individu.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->join('program', 'program.id_program = transaksi_individu.id_program', 'left');
    $this->db->join('sub_program', 'sub_program.id_subprogram = transaksi_individu.id_subprogram', 'left');
    $this->db->where('transaksi_individu.id_program', '9');
    $this->db->where('transaksi_individu.is_delete', '0');
    $query = $this->db->get();
    return $query->result();
  }

  function get_data_barzah_individu($id)
  {
    $this->db->select('*, transaksi_individu.created_at as tanggal_transaksi,  transaksi_individu.created_by as created_by');
    $this->db->from('transaksi_individu');
    $this->db->join('rekomender', 'rekomender.id_rekomender = transaksi_individu.info_bantuan', 'left');
    $this->db->join('individu', 'individu.nik = transaksi_individu.nik', 'left');
    $this->db->join('penduduk', 'penduduk.nik = transaksi_individu.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->join('program', 'program.id_program = transaksi_individu.id_program', 'left');
    $this->db->join('sub_program', 'sub_program.id_subprogram = transaksi_individu.id_subprogram', 'left');
    $this->db->where('transaksi_individu.id_transaksi_individu', $id);
    $query = $this->db->get();
    return $query->row();
  }

  function get_laporan_komunitas()
  {
    $this->db->select('*,transaksi_komunitas.nik as nik_transaksi,penduduk.nama as nama_penduduk, transaksi_komunitas.created_at as tanggal_transaksi, komunitas.id_provinsi as id_provinsi_komunitas, komunitas.id_kota_kab as id_kota_kab_komunitas, komunitas.id_kecamatan as id_kecamatan_komunitas, komunitas.id_desa_kelurahan as id_desa_kelurahan_komunitas, transaksi_komunitas_d.alamat as alamat_komunitas, komunitas.no_telpon as no_hp, komunitas.negara as negara_komunitas, rekomender.nama_rekomender as nama_rekomender');
    $this->db->from('transaksi_komunitas');
    $this->db->join('transaksi_komunitas_d', 'transaksi_komunitas_d.id_trans_komunitas_h = transaksi_komunitas.code', 'left');
    $this->db->join('rekomender', 'rekomender.id_rekomender = transaksi_komunitas.info_bantuan', 'left');
    $this->db->join('penduduk', 'penduduk.nik = transaksi_komunitas.nik', 'left');
    $this->db->join('komunitas', 'komunitas.id_komunitas = transaksi_komunitas.id_komunitas', 'left');
    $this->db->join('provinsi', 'transaksi_komunitas_d.provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'transaksi_komunitas_d.kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'transaksi_komunitas_d.kota = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'transaksi_komunitas_d.kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->join('program', 'program.id_program = transaksi_komunitas.id_program', 'left');
    $this->db->join('sub_program', 'sub_program.id_subprogram = transaksi_komunitas.id_subprogram', 'left');
    $this->db->where('transaksi_komunitas.is_delete', '0');
    $this->db->where('transaksi_komunitas.id_program', '9');
    $query = $this->db->get();
    return $query->result();
  }

  function get_data_barzah_komunitas($id)
  {
    $this->db->select('*, transaksi_komunitas.nik as nik, transaksi_komunitas.nama as nama, transaksi_komunitas_d.alamat as alamat, transaksi_komunitas_d.provinsi as provinsi, transaksi_komunitas_d.kota as kota, transaksi_komunitas_d.kecamatan as kecamatan, transaksi_komunitas_d.kelurahan as kelurahan');
    $this->db->from('transaksi_komunitas');
    $this->db->join('transaksi_komunitas_d', 'transaksi_komunitas_d.id_trans_komunitas_h = transaksi_komunitas.code', 'left');
    $this->db->join('provinsi', 'transaksi_komunitas_d.provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'transaksi_komunitas_d.kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'transaksi_komunitas_d.kota = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'transaksi_komunitas_d.kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('transaksi_komunitas.id_transaksi_komunitas', $id);
    $query = $this->db->get();
    return $query->row();
  }

  function get_trans_individu_deleted()
  {
    $this->db->select('*, transaksi_individu.created_at as tanggal_transaksi,  transaksi_individu.created_by as created_by');
    $this->db->from('transaksi_individu');
    $this->db->join('rekomender', 'rekomender.id_rekomender = transaksi_individu.info_bantuan', 'left');
    $this->db->join('individu', 'individu.nik = transaksi_individu.nik', 'left');
    $this->db->join('penduduk', 'penduduk.nik = transaksi_individu.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->join('program', 'program.id_program = transaksi_individu.id_program', 'left');
    $this->db->join('sub_program', 'sub_program.id_subprogram = transaksi_individu.id_subprogram', 'left');
    $this->db->where('transaksi_individu.id_program', '9');
    $this->db->where('transaksi_individu.is_delete', '1');
    $query = $this->db->get();
    return $query->result();
  }

  function get_trans_komunitas_deleted()
  {
    $this->db->select('*,transaksi_komunitas.nik as nik_transaksi,penduduk.nama as nama_penduduk, transaksi_komunitas.created_at as tanggal_transaksi, komunitas.id_provinsi as id_provinsi_komunitas, komunitas.id_kota_kab as id_kota_kab_komunitas, komunitas.id_kecamatan as id_kecamatan_komunitas, komunitas.id_desa_kelurahan as id_desa_kelurahan_komunitas, komunitas.alamat as alamat_komunitas, komunitas.kodepos as kodepos_komunitas, komunitas.negara as negara_komunitas');
    $this->db->from('transaksi_komunitas');
    $this->db->join('transaksi_komunitas_d', 'transaksi_komunitas_d.id_trans_komunitas_d = transaksi_komunitas.id_transaksi_komunitas', 'left');
    $this->db->join('rekomender', 'rekomender.id_rekomender = transaksi_komunitas.info_bantuan', 'left');
    $this->db->join('penduduk', 'penduduk.nik = transaksi_komunitas.nik', 'left');
    $this->db->join('komunitas', 'komunitas.id_komunitas = transaksi_komunitas.id_komunitas', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->join('program', 'program.id_program = transaksi_komunitas.id_program', 'left');
    $this->db->join('sub_program', 'sub_program.id_subprogram = transaksi_komunitas.id_subprogram', 'left');
    $this->db->where('transaksi_komunitas.is_delete', '1');
    $this->db->where('transaksi_komunitas.id_program', '9');
    $query = $this->db->get();
    return $query->result();
  }

  function get_detail_by_nama_barzah($id)
  {
    $this->db->select('*');
    $this->db->from('barzah');
    $this->db->join('penduduk', 'penduduk.nik = barzah.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('barzah.is_delete', '0');
    $this->db->where('barzah.nik', $id);
    $query = $this->db->get();
    return $query->result();
  }

  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
  }

  function get_individu_by_id($id)
  {
    $this->db->where($this->id_individu, $id);
    return $this->db->get($this->table_individu)->row();
  }

  function get_by_nik($id)
  {
    $this->db->where('nik', $id);
    return $this->db->get($this->table)->row();
  }

  function total_rows()
  {
    return $this->db->get($this->table)->num_rows();
  }

  function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  function insert_individu($data)
  {
    $this->db->insert($this->table_individu, $data);
  }

  function insert_komunitas($data)
  {
    $this->db->insert($this->table_komunitas, $data);
  }

  function insert_komunitasdetail($data)
  {
    $this->db->insert($this->table_komunitasdetail, $data);
  }

  function autonumber()
  {
    $cd = $this->db->query("SELECT MAX(RIGHT(code,4)) AS kd_max FROM transaksi_komunitas WHERE DATE(created_at )=CURDATE()");
    $kd = "";
    if ($cd->num_rows() > 0) {
      foreach ($cd->result() as $k) {
        $tmp = ((int)$k->kd_max) + 1;
        $kd = sprintf("%04s", $tmp);
      }
    } else {
      $kd = "0001";
    }
    date_default_timezone_set('Asia/Jakarta');
    return date('my') . "-" . $kd;
  }

  function update($id, $data)
  {
    $this->db->where($this->id, $id);
    $this->db->update($this->table, $data);
  }

  function update_komunitas($id, $data)
  {
    $this->db->where($this->id_komunitas, $id);
    $this->db->update($this->table_komunitas, $data);
  }

  function update_komunitas_d($id, $data)
  {
    $this->db->where('id_trans_komunitas_h', $id);
    $this->db->update('transaksi_komunitas_d', $data);
  }

  function update_individu($id, $data)
  {

    $this->db->where($this->id_individu, $id);
    $this->db->update($this->table_individu, $data);
  }

  function soft_delete($id, $data)
  {

    $this->db->where($this->id, $id);
    $this->db->update($this->table, $data);
  }

  function delete($id)
  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
  }

  function delete_individu($id)
  {
    $this->db->where($this->id_individu, $id);
    $this->db->delete($this->table_individu);
  }

  function delete_komunitas($id)
  {
    $this->db->where($this->id_komunitas, $id);
    $this->db->delete($this->table_komunitas);
  }

  // ----------------- GET LAPORAN DETAIL ------------------- //
  function get_laporan_individu_detail($id)
  {
    $this->db->select('*, transaksi_individu.created_at as tanggal_transaksi, transaksi_individu.created_by as created_by');
    $this->db->from('transaksi_individu');
    $this->db->join('rekomender', 'rekomender.id_rekomender = transaksi_individu.info_bantuan', 'left');
    $this->db->join('individu', 'individu.nik = transaksi_individu.nik', 'left');
    $this->db->join('penduduk', 'penduduk.nik = transaksi_individu.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->join('program', 'program.id_program = transaksi_individu.id_program', 'left');
    $this->db->join('sub_program', 'sub_program.id_subprogram = transaksi_individu.id_subprogram', 'left');
    $this->db->where('transaksi_individu.id_program', '9');
    $this->db->where('transaksi_individu.is_delete', '0');
    $this->db->where('transaksi_individu.nik', $id);
    $query = $this->db->get();
    return $query->result();
  }
  function get_laporan_komunitas_detail($id)
  {
    $this->db->select('*,transaksi_komunitas.nik as nik_transaksi,penduduk.nama as nama_penduduk, transaksi_komunitas.created_at as tanggal_transaksi, komunitas.id_provinsi as id_provinsi_komunitas, komunitas.id_kota_kab as id_kota_kab_komunitas, komunitas.id_kecamatan as id_kecamatan_komunitas, komunitas.id_desa_kelurahan as id_desa_kelurahan_komunitas, komunitas.alamat as alamat_komunitas, komunitas.kodepos as kodepos_komunitas, komunitas.negara as negara_komunitas');
    $this->db->from('transaksi_komunitas');
    $this->db->join('rekomender', 'rekomender.id_rekomender = transaksi_komunitas.info_bantuan', 'left');
    $this->db->join('penduduk', 'penduduk.nik = transaksi_komunitas.nik', 'left');
    $this->db->join('komunitas', 'komunitas.id_komunitas = transaksi_komunitas.id_komunitas', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->join('program', 'program.id_program = transaksi_komunitas.id_program', 'left');
    $this->db->join('sub_program', 'sub_program.id_subprogram = transaksi_komunitas.id_subprogram', 'left');
    $this->db->where('transaksi_komunitas.id_program', '9');
    $this->db->where('transaksi_komunitas.is_delete', '0');
    $this->db->where('transaksi_komunitas.nik', $id);
    $query = $this->db->get();
    return $query->result();
  }
}
