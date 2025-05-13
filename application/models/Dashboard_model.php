<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

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

  function get_transaksi_individu()
  {
    $this->db->select('*, transaksi_individu.created_at as tanggal_transaksi');
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
    $this->db->where('transaksi_individu.is_delete', '0');
    $query = $this->db->get();
    return $query->result();
  }

  function get_pencarian_individu($id)
  {
    $this->db->select('*, transaksi_individu.created_at as tanggal_transaksi');
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
    $this->db->where('transaksi_individu.is_delete', '0');
    $this->db->where('transaksi_individu.nik', $id);
    $query = $this->db->get();
    return $query->result();
  }

  function get_transaksi_komunitas()
  {
    $this->db->select('*, transaksi_komunitas.created_at as tanggal_transaksi, komunitas.id_provinsi as id_provinsi_komunitas, komunitas.id_kota_kab as id_kota_kab_komunitas, komunitas.id_kecamatan as id_kecamatan_komunitas, komunitas.id_desa_kelurahan as id_desa_kelurahan_komunitas, komunitas.alamat as alamat_komunitas, komunitas.kodepos as kodepos_komunitas, komunitas.negara as negara_komunitas');
    $this->db->from('transaksi_komunitas');
    $this->db->join('rekomender', 'rekomender.id_rekomender = transaksi_komunitas.info_bantuan', 'left');
    $this->db->join('penduduk', 'penduduk.nik = transaksi_komunitas.nik', 'left');
    $this->db->join('komunitas', 'komunitas.nik = transaksi_komunitas.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->join('program', 'program.id_program = transaksi_komunitas.id_program', 'left');
    $this->db->join('sub_program', 'sub_program.id_subprogram = transaksi_komunitas.id_subprogram', 'left');
    $this->db->where('transaksi_komunitas.is_delete', '0');
    $query = $this->db->get();
    return $query->result();
  }

  function get_pencarian_komunitas($id)
  {
    $this->db->select('*, transaksi_komunitas.created_at as tanggal_transaksi');
    $this->db->from('transaksi_komunitas');
    $this->db->join('komunitas', 'transaksi_komunitas.id_komunitas = komunitas.id_komunitas', 'left');
    $this->db->join('rekomender', 'rekomender.id_rekomender = transaksi_komunitas.info_bantuan', 'left');
    $this->db->join('penduduk', 'penduduk.nik = transaksi_komunitas.nik', 'left');
    $this->db->join('program', 'program.id_program = transaksi_komunitas.id_program', 'left');
    $this->db->join('sub_program', 'sub_program.id_subprogram = transaksi_komunitas.id_subprogram', 'left');
    $this->db->where('transaksi_komunitas.is_delete', '0');
    $this->db->where('transaksi_komunitas.nik', $id);
    $query = $this->db->get();
    return $query->result();
  }

  function get_nik_transaksi_individu($id)
  {
    $this->db->select('SUM(jumlah_bantuan) as bantuan_individu, COUNT(id_transaksi_individu) as pengajuan_individu');
    $this->db->from('transaksi_individu');
    $this->db->where('is_delete', '0');
    if ($id != 0) {
      $this->db->where('nik ', $id);
    }
    $query = $this->db->get();
    return $query->result();
  }

  function get_nik_transaksi_komunitas($id)
  {
    $this->db->select('SUM(jumlah_bantuan) as bantuan_komunitas, COUNT(id_transaksi_komunitas) as pengajuan_komunitas');
    $this->db->from('transaksi_komunitas');
    $this->db->where('is_delete', '0');
    if ($id != 0) {
      $this->db->where('nik ', $id);
    }
    $query = $this->db->get();
    return $query->result();
  }

  public function get_penduduk()
  {
    $this->db->select('*');
    $this->db->from('penduduk');
    $this->db->where('is_delete', '0');
    $query = $this->db->get();
    return $query->result();
  }

  public function get_nik_penduduk($nik)
  {
    $this->db->select('*');
    $this->db->from('penduduk');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('penduduk.is_active', '0');
    $this->db->where('penduduk.nik ', $nik);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_search_penduduk($nik)
  {
    $this->db->select('*');
    $this->db->from('penduduk');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('penduduk.is_delete', '0');
    $this->db->where('penduduk.nik ', $nik);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_all_data($nik)
  {
    $this->db->select('*,SUM(transaksi_individu.jumlah_bantuan) as bantuan_individu, COUNT(*) as pengajuan_individu');
    $this->db->from('penduduk');
    $this->db->join('transaksi_individu', 'transaksi_individu.nik = penduduk.nik', 'inner');
    $this->db->join('transaksi_komunitas', 'transaksi_komunitas.nik = penduduk.nik', 'inner');
    $this->db->where('penduduk.is_active', '0');
    $this->db->where('transaksi_individu.is_delete', '0');
    $this->db->or_where('transaksi_komunitas.is_delete', '0');
    $this->db->where('penduduk.nik ', $nik);
    $query = $this->db->get();
    return $query->row();
  }
}
