<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lamusta_model extends CI_Model
{

  public $table           = 'transaksi_individu';
  public $table_komunitas = 'transaksi_komunitas';
  public $id_komunitas    = 'id_transaksi_komunitas';
  public $id              = 'id_transaksi_individu';
  public $order           = 'DESC';

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
    $this->db->where('transaksi_individu.id_program', '1');
    $query = $this->db->get();
    return $query->row();
  }

  function kwitansi_individu($id)
  { 
    $this->db->select('*');
    $this->db->from('transaksi_individu');
    $this->db->where('id_transaksi_individu', $id);
    $query = $this->db->get();
    return $query->row();
  }

  function kwitansi_komunitas($id)
  { 
    $this->db->select('*');
    $this->db->from('transaksi_komunitas');
    $this->db->join('komunitas', 'komunitas.id_komunitas = transaksi_komunitas.id_komunitas', 'left');
    $this->db->where('id_transaksi_komunitas', $id);
    $query = $this->db->get();
    return $query->row();
  }

  function get_total_laporan_individu_asnaf()
  {
    $this->db->select('*, COUNT(id_transaksi_individu) as total_pm, SUM(jumlah_bantuan) as total_nominal');
    $this->db->from('transaksi_individu');
    $this->db->where('is_delete', '0');
    $this->db->where('id_program', '1');
    $this->db->where('rekomendasi_bantuan', 'Dibantu');
    $this->db->group_by('asnaf');
    $query = $this->db->get();
    return $query->result();
  }

  function get_total_laporan_komunitas_asnaf()
  {
    $this->db->select('*, COUNT(id_transaksi_komunitas) as total_pm, SUM(jumlah_bantuan) as total_nominal');
    $this->db->from('transaksi_komunitas');
    $this->db->where('is_delete', '0');
    $this->db->where('id_program', '1');
    $this->db->where('rekomendasi_bantuan', 'Dibantu');
    $this->db->group_by('asnaf');
    $query = $this->db->get();
    return $query->result();
  }

  function get_total_laporan_individu_prov()
  {
    $this->db->select('*, COUNT(transaksi_individu.id_transaksi_individu) as total_pm, SUM(transaksi_individu.jumlah_bantuan) as total_nominal, provinsi.provinsi as provinsi');
    $this->db->from('transaksi_individu');
    $this->db->join('penduduk', 'penduduk.nik = transaksi_individu.nik', 'left');
    $this->db->join('provinsi', 'provinsi.id_provinsi = penduduk.id_provinsi', 'left');
    $this->db->where('transaksi_individu.is_delete', '0');
    $this->db->where('transaksi_individu.id_program', '1');
    $this->db->where('transaksi_individu.rekomendasi_bantuan', 'Dibantu');
    $this->db->group_by('provinsi.provinsi');
    $query = $this->db->get();
    return $query->result();
  }

  function get_total_laporan_komunitas_prov()
  {
    $this->db->select('*, COUNT(transaksi_komunitas.id_transaksi_komunitas) as total_pm, SUM(transaksi_komunitas.jumlah_bantuan) as total_nominal, provinsi.provinsi as provinsi');
    $this->db->from('transaksi_komunitas');
    $this->db->join('penduduk', 'penduduk.nik = transaksi_komunitas.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->where('transaksi_komunitas.is_delete', '0');
    $this->db->where('transaksi_komunitas.id_program', '1');
    $this->db->where('transaksi_komunitas.rekomendasi_bantuan', 'Dibantu');
    $this->db->group_by('penduduk.id_provinsi');
    $query = $this->db->get();
    return $query->result();
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
    $this->db->where('transaksi_individu.id_program', '1');
    $this->db->where('transaksi_individu.nik', $id);
    $query = $this->db->get();
    return $query->result();
  }

  function get_detail_komunitas_by_id($id)
  {
    $this->db->select('*, transaksi_komunitas.created_at as tanggal');
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
    $this->db->where('transaksi_komunitas.id_program', '1');
    $this->db->where('transaksi_komunitas.nik', $id);
    $query = $this->db->get();
    return $query->result();
  }

  function get_laporan_komunitas()
  {
    $this->db->select('*, transaksi_komunitas.created_at as tanggal_transaksi, komunitas.id_provinsi as id_provinsi_komunitas, komunitas.id_kota_kab as id_kota_kab_komunitas, komunitas.id_kecamatan as id_kecamatan_komunitas, komunitas.id_desa_kelurahan as id_desa_kelurahan_komunitas, komunitas.alamat as alamat_komunitas, komunitas.kodepos as kodepos_komunitas, komunitas.negara as negara_komunitas, transaksi_komunitas.created_by as petugas, komunitas.nik as nik, komunitas.nama as nama, komunitas.nama_komunitas as nama_komunitas');
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
    $this->db->where('transaksi_komunitas.is_delete', '0');
    $this->db->where('transaksi_komunitas.id_program', '1');
    $query = $this->db->get();
    return $query->result();
  }

  function get_laporan_kasir_komunitas()
  {
    $this->db->select('*, transaksi_komunitas.created_at as tanggal_transaksi, komunitas.id_provinsi as id_provinsi_komunitas, komunitas.id_kota_kab as id_kota_kab_komunitas, komunitas.id_kecamatan as id_kecamatan_komunitas, komunitas.id_desa_kelurahan as id_desa_kelurahan_komunitas, komunitas.alamat as alamat_komunitas, komunitas.kodepos as kodepos_komunitas, komunitas.negara as negara_komunitas, transaksi_komunitas.created_by as petugas');
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
    $this->db->where('transaksi_komunitas.is_delete', '0');
    $this->db->where('transaksi_komunitas.id_program', '1');
    $this->db->where('transaksi_komunitas.rekomendasi_bantuan', 'Dibantu');
    $query = $this->db->get();
    return $query->result();
  }

  function get_laporan_transaksi_komunitas($id)
  {
    $this->db->select('*, komunitas.id_provinsi as id_provinsi_komunitas, komunitas.id_kota_kab as id_kota_kab_komunitas, komunitas.id_kecamatan as id_kecamatan_komunitas, komunitas.id_desa_kelurahan as id_desa_kelurahan_komunitas, komunitas.alamat as alamat_komunitas, komunitas.kodepos as kodepos_komunitas, komunitas.negara as negara_komunitas');
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
    $this->db->where('transaksi_komunitas.id_program', '1');
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
    $this->db->where('id_program', '1');
    $query = $this->db->get();
    return $query->num_rows();
  }

  function check_transaksi_komunitas_by_id($id)
  {
    $this->db->select('*');
    $this->db->from('transaksi_komunitas');
    $this->db->where('is_delete', '0');
    $this->db->where('nik', $id);
    $this->db->where('id_program', '1');
    $query = $this->db->get();
    return $query->num_rows();
  }

  function get_transaksi_individu_by_date($id)
  {
    $this->db->select('*');
    $this->db->from('transaksi_individu');
    $this->db->where('is_delete', '0');
    $this->db->where('nik', $id);
    $this->db->where('id_program', '1');
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
    $this->db->where('id_program', '1');
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
    $this->db->where('transaksi_individu.id_program', '1');
    $this->db->where('transaksi_individu.nik', $id);
    $query = $this->db->get();
    return $query->result();
  }
  function get_transaksi_komunitas_by_id($id)
  {
    $this->db->select('*, COUNT(*) AS total_komunitas, SUM(`transaksi_komunitas`.`jumlah_bantuan`) AS rincian_komunitas');
    $this->db->from('transaksi_komunitas');
    $this->db->join('komunitas', 'komunitas.id_komunitas = transaksi_komunitas.id_komunitas', 'left');
    $this->db->join('penduduk', 'penduduk.nik = komunitas.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('transaksi_komunitas.is_delete', '0');
    $this->db->where('transaksi_komunitas.id_program', '1');
    $this->db->where('transaksi_komunitas.nik', $id);
    $query = $this->db->get();
    return $query->result();
  }

  function get_transaksi_individu_update($id)
  {
    $this->db->select('*');
    $this->db->from('transaksi_individu');
    $this->db->join('penduduk', 'penduduk.nik = transaksi_individu.nik', 'left');
    $this->db->where('transaksi_individu.id_transaksi_individu', $id);
    $this->db->where('transaksi_individu.id_program', '1');
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
    $this->db->where('transaksi_komunitas.id_program', '1');
    $query = $this->db->get();
    return $query->row();
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

  function get_data_komunitas_by_program()
  {
    $sql = "SELECT
            `a`.`id_komunitas` AS `id_komunitas`,
            `a`.`nama_komunitas` AS `nama_komunitas`
            FROM `komunitas` `a`
            JOIN `reff_kategori_komunitas` `b`
            ON `a`.`kategori_komunitas` = `b`.`id_kategori_komunitas`
            WHERE `b`.`id_kategori_komunitas` = 4 OR `b`.`id_kategori_komunitas` = 5
            ";
    // $sql = "SELECT * FROM komunitas";
    $res = $this->db->query($sql)->result();
    return $res;
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
    $this->db->where('id_program ', '1');
    $query = $this->db->get();
    return $query->row();
  }

  function get_sub_program()
  {
    $this->db->select('*');
    $this->db->from('sub_program');
    $this->db->where('is_delete', '0');
    $this->db->where('id_program', '1');
    $query = $this->db->get();
    return $query->result();
  }

  function get_all_deleted_komunitas()
  {
    $this->db->select('*');
    $this->db->from('transaksi_komunitas');
    $this->db->join('penduduk', 'penduduk.nik = transaksi_komunitas.nik', 'left');
    $this->db->join('komunitas', 'komunitas.id_komunitas = transaksi_komunitas.id_komunitas', 'left');
    $this->db->join('program', 'program.id_program = transaksi_komunitas.id_program', 'left');
    $this->db->join('sub_program', 'sub_program.id_subprogram = transaksi_komunitas.id_subprogram', 'left');
    $this->db->where('transaksi_komunitas.is_delete', '1');
    $this->db->where('transaksi_komunitas.id_program', '1');
    $query = $this->db->get();
    return $query->result();
  }

  function get_all_admin_komunitas()
  {
    $this->db->select('*, transaksi_komunitas.created_at as tanggal_transaksi');
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
    $this->db->where('transaksi_komunitas.is_delete', '0');
    $this->db->where('transaksi_komunitas.id_program', '1');
    $query = $this->db->get();
    return $query->result();
  }

  function get_notif_admin_individu()
  {
    $this->db->select('*, count(*) as total_individu');
    $this->db->from('transaksi_individu');
    $this->db->where('is_delete', '0');
    $this->db->where('id_program', '1');
    $this->db->where('status', '0');
    $this->db->or_where('status', '1');
    $query = $this->db->get();
    return $query->row();
  }

  function get_notif_admin_komunitas()
  {
    $this->db->select('*, count(*) as total_komunitas');
    $this->db->from('transaksi_komunitas');
    $this->db->where('is_delete', '0');
    $this->db->where('id_program', '1');
    $this->db->where('status', '0');
    $this->db->or_where('status', '1');
    $query = $this->db->get();
    return $query->row();
  }

  function get_notif_approveal_individu()
  {
    $this->db->select('*, count(*) as total_individu');
    $this->db->from('transaksi_individu');
    $this->db->where('is_delete', '0');
    $this->db->where('id_program', '1');
    $this->db->where('status', '1');
    $this->db->where('rekomendasi_bantuan', 'Dibantu');
    $query = $this->db->get();
    return $query->row();
  }

  function get_notif_kasir_individu()
  {
    $this->db->select('*, count(*) as total_individu');
    $this->db->from('transaksi_individu');
    $this->db->where('is_delete', '0');
    $this->db->where('id_program', '1');
    $this->db->where('status', '2');
    $this->db->where('rekomendasi_bantuan', 'Dibantu');
    $query = $this->db->get();
    return $query->row();
  }

  function get_notif_approveal_komunitas()
  {
    $this->db->select('*, count(*) as total_komunitas');
    $this->db->from('transaksi_komunitas');
    $this->db->where('is_delete', '0');
    $this->db->where('id_program', '1');
    $this->db->where('status', '1');
    $this->db->where('rekomendasi_bantuan', 'Dibantu');
    $query = $this->db->get();
    return $query->row();
  }

  function get_notif_kasir_komunitas()
  {
    $this->db->select('*, count(*) as total_komunitas');
    $this->db->from('transaksi_komunitas');
    $this->db->where('is_delete', '0');
    $this->db->where('id_program', '1');
    $this->db->where('status', '2');
    $this->db->where('rekomendasi_bantuan', 'Dibantu');
    $query = $this->db->get();
    return $query->row();
  }

  function get_all_deleted_individu()
  {
    $this->db->select('*');
    $this->db->from('transaksi_individu');
    $this->db->join('penduduk', 'penduduk.nik = transaksi_individu.nik', 'left');
    $this->db->join('individu', 'individu.nik = transaksi_individu.nik', 'left');
    $this->db->join('program', 'program.id_program = transaksi_individu.id_program', 'left');
    $this->db->join('sub_program', 'sub_program.id_subprogram = transaksi_individu.id_subprogram', 'left');
    $this->db->where('transaksi_individu.is_delete', '1');
    $this->db->where('transaksi_individu.id_program', '1');
    $query = $this->db->get();
    return $query->result();
  }

  function get_all_admin_individu()
  {
    $this->db->select('*, transaksi_individu.created_at as tanggal_transaksi, transaksi_individu.created_by as petugas');
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
    $this->db->where('transaksi_individu.id_program', '1');
    $this->db->where('transaksi_individu.is_delete', '0');
    $query = $this->db->get();
    return $query->result();
  }

  function get_laporan_pusat_individu()
  {
    $this->db->select('*');
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
    $this->db->where('transaksi_individu.id_program', '1');
    $this->db->where('transaksi_individu.is_delete', '0');
    $this->db->where('transaksi_individu.jumlah_bantuan >', '0');
    $this->db->where('transaksi_individu.status', '3');
    $this->db->where('transaksi_individu.rekomendasi_bantuan', 'Dibantu');
    $query = $this->db->get();
    return $query->result();
  }

  function get_laporan_kasir_individu()
  {
    $this->db->select('*, transaksi_individu.created_at as "tanggal_transaksi", transaksi_individu.created_by as petugas');
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
    $this->db->where('transaksi_individu.id_program', '1');
    $this->db->where('transaksi_individu.is_delete', '0');
    $this->db->where('transaksi_individu.jumlah_bantuan >', '0');
    $this->db->where('transaksi_individu.status', '3');
    $this->db->where('transaksi_individu.rekomendasi_bantuan', 'Dibantu');
    $query = $this->db->get();
    return $query->result();
  }


  function get_all_approval_individu()
  {
    $this->db->select('*, transaksi_individu.created_at as tanggal_transaksi');
    $this->db->from('transaksi_individu');
    $this->db->join('individu', 'individu.nik = transaksi_individu.nik', 'left');
    $this->db->join('penduduk', 'penduduk.nik = transaksi_individu.nik', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->join('program', 'program.id_program = transaksi_individu.id_program', 'left');
    $this->db->join('sub_program', 'sub_program.id_subprogram = transaksi_individu.id_subprogram', 'left');
    $this->db->where('transaksi_individu.id_program', '1');
    $this->db->where('transaksi_individu.is_delete', '0');
    $this->db->where('transaksi_individu.status', '1');
    $this->db->or_where('transaksi_individu.rekomendasi_bantuan', 'Ditolak');
    $query = $this->db->get();
    return $query->result();
  }

  function get_kasir_approval_individu()
  {
    $this->db->select('*, transaksi_individu.created_at as tanggal_transaksi');
    $this->db->from('transaksi_individu');
    $this->db->join('individu', 'individu.nik = transaksi_individu.nik', 'left');
    $this->db->join('penduduk', 'penduduk.nik = transaksi_individu.nik', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->join('program', 'program.id_program = transaksi_individu.id_program', 'left');
    $this->db->join('sub_program', 'sub_program.id_subprogram = transaksi_individu.id_subprogram', 'left');
    $this->db->where('transaksi_individu.id_program', '1');
    $this->db->where('transaksi_individu.is_delete', '0');
    $this->db->where('transaksi_individu.status', '2');
    $this->db->where('transaksi_individu.rekomendasi_bantuan', 'Dibantu');
    $query = $this->db->get();
    return $query->result();
  }

  function get_all_approval_komunitas()
  {
    $this->db->select('*');
    $this->db->from('transaksi_komunitas');
    $this->db->join('penduduk', 'penduduk.nik = transaksi_komunitas.nik', 'left');
    $this->db->join('komunitas', 'komunitas.id_komunitas = transaksi_komunitas.id_komunitas', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->join('program', 'program.id_program = transaksi_komunitas.id_program', 'left');
    $this->db->join('sub_program', 'sub_program.id_subprogram = transaksi_komunitas.id_subprogram', 'left');
    $this->db->where('transaksi_komunitas.is_delete', '0');
    $this->db->where('transaksi_komunitas.id_program', '1');
    $this->db->where('transaksi_komunitas.status', '1');
    $this->db->where('transaksi_komunitas.rekomendasi_bantuan', 'Dibantu');
    $query = $this->db->get();
    return $query->result();
  }

  function get_kasir_approval_komunitas()
  {
    $this->db->select('*');
    $this->db->from('transaksi_komunitas');
    $this->db->join('penduduk', 'penduduk.nik = transaksi_komunitas.nik', 'left');
    $this->db->join('komunitas', 'komunitas.id_komunitas = transaksi_komunitas.id_komunitas', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->join('program', 'program.id_program = transaksi_komunitas.id_program', 'left');
    $this->db->join('sub_program', 'sub_program.id_subprogram = transaksi_komunitas.id_subprogram', 'left');
    $this->db->where('transaksi_komunitas.is_delete', '0');
    $this->db->where('transaksi_komunitas.id_program', '1');
    $this->db->where('transaksi_komunitas.status', '2');
    $this->db->where('transaksi_komunitas.rekomendasi_bantuan', 'Dibantu');
    $query = $this->db->get();
    return $query->result();
  }

  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
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

  function total_rows()
  {
    return $this->db->get($this->table)->num_rows();
  }

  function insert_komunitas($data)
  {
    $this->db->insert($this->table_komunitas, $data);
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

  function soft_delete_komunitas($id, $data)
  {
    $this->db->where($this->id_komunitas, $id);
    $this->db->update($this->table_komunitas, $data);
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

  function delete_permanent($id)
  {
    $this->db->where($this->id_komunitas, $id);
    $this->db->delete($this->table_komunitas);
  }
}
