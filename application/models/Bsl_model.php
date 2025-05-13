<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bsl_model extends CI_Model
{

  public $table           = 'transaksi_individu';
  public $table_komunitas = 'transaksi_komunitas';
  public $table_komunitasdetail = 'transaksi_komunitas_d';
  public $id_komunitas    = 'id_transaksi_komunitas';
  public $id              = 'id_transaksi_individu';
  public $order           = 'DESC';

  function autonumber()
  {
    $cd = $this->db->query("SELECT MAX(RIGHT(code,4)) AS kd_max FROM transaksi_komunitas WHERE DATE(created_at)=CURDATE()");
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
  function get_all_transaksi_individu()
  {
    $this->db->select('*, COUNT(*) AS total_manfaat, SUM(`transaksi_individu`.`jumlah_bantuan`) AS rincian_manfaat');
    $this->db->from('transaksi_individu');
    $this->db->join('individu', 'individu.nik = transaksi_individu.nik', 'left');
    $this->db->join('penduduk', 'penduduk.nik = individu.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('transaksi_individu.is_delete', '0');
    $this->db->where('transaksi_individu.id_program', '8');
    $query = $this->db->get();
    return $query->row();
  }

  //-------------------- start detail penduduk -------------------//
  function get_penduduk($id)
  {
    $this->db->select('*');
    $this->db->from('penduduk');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('is_delete', '0');
    $this->db->where('nik', $id);
    return $this->db->get()->row();
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

  function get_data_komunitas_by_program()
  {
    $sql = "SELECT
            `a`.`id_komunitas` AS `id_komunitas`,
            `a`.`nama_komunitas` AS `nama_komunitas`
            FROM `komunitas` `a`
            JOIN `reff_kategori_komunitas` `b`
            ON `a`.`kategori_komunitas` = `b`.`id_kategori_komunitas`
            WHERE `b`.`id_kategori_komunitas` = 2
            ";
    // $sql = "SELECT * FROM komunitas";
    $res = $this->db->query($sql)->result();
    return $res;
  }

  function get_all_provinsi()
  {
    $query = "SELECT * FROM provinsi";
    $query = $this->db->query($query);
    return $query->result();
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
  //-------------------- end detail penduduk -------------------//

  function get_detail_individu_by_id($id)
  {
    $this->db->select('*,transaksi_individu.created_at as tanggal_transaksi');
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
    $this->db->where('transaksi_individu.id_program', '8');
    $this->db->where('transaksi_individu.nik', $id);
    $query = $this->db->get();
    return $query->result();
  }
  function get_detail_komunitas_by_id($id)
  {
    $this->db->select('*,transaksi_komunitas.created_at as tanggal_transaksi');
    $this->db->from('transaksi_komunitas');
    $this->db->join('komunitas', 'komunitas.id_komunitas = transaksi_komunitas.id_komunitas', 'left');
    $this->db->join('program', 'program.id_program = transaksi_komunitas.id_program', 'left');
    $this->db->join('sub_program', 'sub_program.id_subprogram = transaksi_komunitas.id_subprogram', 'left');
    $this->db->join('penduduk', 'penduduk.nik = komunitas.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('transaksi_komunitas.is_delete', '0');
    $this->db->where('transaksi_komunitas.id_program', '8');
    $this->db->where('transaksi_komunitas.nik', $id);
    $query = $this->db->get();
    return $query->result();
  }

  function check_transaksi_individu_by_id($id)
  {
    $this->db->select('*');
    $this->db->from('transaksi_individu');
    $this->db->where('is_delete', '0');
    $this->db->where('nik', $id);
    $this->db->where('id_program', '8');
    $query = $this->db->get();
    return $query->num_rows();
  }

  function check_transaksi_komunitas_by_id($id)
  {
    $this->db->select('*');
    $this->db->from('transaksi_komunitas');
    $this->db->where('is_delete', '0');
    $this->db->where('nik', $id);
    $this->db->where('id_program', '8');
    $query = $this->db->get();
    return $query->num_rows();
  }

  function get_transaksi_individu_by_date($id)
  {
    $this->db->select('*');
    $this->db->from('transaksi_individu');
    $this->db->where('is_delete', '0');
    $this->db->where('nik', $id);
    $this->db->where('id_program', '8');
    $this->db->order_by('created_at', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  function get_transaksi_komunitas_by_date($id)
  {
    $this->db->select('*');
    $this->db->from('transaksi_komunitas');
    $this->db->where('is_delete', '0');
    $this->db->where('nik', $id);
    $this->db->where('id_program', '8');
    $this->db->order_by('created_at', 'desc');
    $query = $this->db->get();
    return $query->result();
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
    $this->db->where('transaksi_individu.id_program', '8');
    $this->db->where('transaksi_individu.nik', $id);
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
    $this->db->where('transaksi_individu.id_program', '8');
    $this->db->where('transaksi_individu.is_delete', '0');
    $query = $this->db->get();
    return $query->result();
  }
  function get_laporan_komunitas()
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
    $this->db->where('transaksi_komunitas.is_delete', '0');
    $this->db->where('transaksi_komunitas.id_program', '8');
    $query = $this->db->get();
    return $query->result();
  }
  function get_transaksi_individu_update($id)
  {
    $this->db->select('*');
    $this->db->from('transaksi_individu');
    $this->db->join('penduduk', 'penduduk.nik = transaksi_individu.nik', 'left');
    $this->db->where('transaksi_individu.id_transaksi_individu', $id);
    $query = $this->db->get();
    return $query->row();
  }

  function get_transaksi_komunitas_update($id)
  {
    $this->db->from('transaksi_komunitas');
    $this->db->join('penduduk', 'penduduk.nik = transaksi_komunitas.nik', 'left');
    $this->db->join('komunitas', 'komunitas.id_komunitas = transaksi_komunitas.id_komunitas', 'left');
    $this->db->join('program', 'program.id_program = transaksi_komunitas.id_program', 'left');
    $this->db->join('sub_program', 'sub_program.id_subprogram = transaksi_komunitas.id_subprogram', 'left');
    $this->db->where('transaksi_komunitas.id_transaksi_komunitas', $id);
    $query = $this->db->get();
    return $query->row();
  }
  function get_transaksi_komunitasdetail_update($id)
  {
    // $this->db->select('*,transaksi_komunitas_d.nama as nama_det');
    $this->db->from('transaksi_komunitas_d');
    $this->db->join('transaksi_komunitas', 'transaksi_komunitas.code = transaksi_komunitas_d.id_trans_komunitas_h', 'left');
    $this->db->where('transaksi_komunitas.id_transaksi_komunitas', $id);
    $query = $this->db->get();

    // var_dump($query->result());die;
    return $query->result();
  }

  function get_all_penduduk()
  {
    $this->db->select('*');
    $this->db->from('penduduk');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('is_delete', '0');
    $this->db->where('is_active', '0');

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

  function get_data_komunitas()
  {
    $this->db->select('*');
    $this->db->from('komunitas');
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

  function get_program()
  {
    $this->db->select('*');
    $this->db->from('program');
    $this->db->where('is_active', '1');
    $this->db->where('id_program ', '8');
    $query = $this->db->get();
    return $query->row();
  }

  function get_all_deleted_individu()
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
    $this->db->where('transaksi_individu.id_program', '8');
    $this->db->where('transaksi_individu.is_delete', '1');
    $query = $this->db->get();
    return $query->result();
  }
  function get_all_deleted_komunitas()
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
    $this->db->where('transaksi_komunitas.id_program', '8');
    $query = $this->db->get();
    return $query->result();
  }
  function get_sub_program()
  {
    $this->db->select('*');
    $this->db->from('sub_program');
    $this->db->where('is_delete', '0');
    $this->db->where('id_program', '8');
    $query = $this->db->get();
    return $query->result();
  }

  function get_all_deleted()
  {
    $this->db->where('is_delete', '1');
    $query = $this->db->get();
    return $query->result();
  }

  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
  }
  function get_by_id_komunitas($id)
  {
    $this->db->where($this->id_komunitas, $id);
    return $this->db->get($this->table_komunitas)->row();
  }

  function total_rows()
  {
    return $this->db->get($this->table)->num_rows();
  }

  function insert_komunitas($data)
  {
    $this->db->insert($this->table_komunitas, $data);
  }
  function insert_komunitasdetail($data)
  {
    $this->db->insert($this->table_komunitasdetail, $data);
  }
  function insert($data)
  {
    $this->db->insert($this->table, $data);
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
  function delete_transaksi_komunitas_by_id($id)
  {
    $this->db->where($this->id_komunitas, $id);
    return $this->db->get($this->table_komunitas)->row();
  }

  function delete_transaksi_individu_by_id($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
  }
  function soft_delete($id, $data)
  {

    $this->db->where($this->id, $id);
    $this->db->update($this->table, $data);
  }
  function soft_delete_komunitas($id, $data)
  {

    $this->db->where($this->id_komunitas, $id);
    $this->db->update($this->table_komunitas, $data);
  }

  function delete_komunitas($id)
  {

    $this->db->where($this->id_komunitas, $id);
    $this->db->delete($this->table_komunitas);
  }

  function delete($id)
  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
  }
  function deletedetail($id)
  {
    $this->db->where('id_trans_komunitas_d', $id);
    $this->db->delete('transaksi_komunitas_d');
  }
  function get_by_id_detail($id)
  {
    $this->db->where('id_trans_komunitas_d', $id);
    return $this->db->get('transaksi_komunitas_d')->row();
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
    $this->db->where('transaksi_individu.id_program', '8');
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
    $this->db->where('transaksi_komunitas.id_program', '8');
    $this->db->where('transaksi_komunitas.is_delete', '0');
    $this->db->where('transaksi_komunitas.nik', $id);
    $query = $this->db->get();
    return $query->result();
  }
}
