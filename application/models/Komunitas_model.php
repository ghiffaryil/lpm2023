<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komunitas_model extends CI_Model
{

  public $table = 'komunitas';
  public $id    = 'id_komunitas';
  public $order = 'DESC';

  function get_all()
  {
    $this->db->select('*');
    $this->db->from('komunitas');
    $this->db->join('penduduk', 'penduduk.nik = komunitas.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('komunitas.is_delete', '0');

    return $this->db->get($this->table)->result();
  }

  function get_all_header()
  {
    $this->db->select('*');
    $this->db->from('komunitas');
    $this->db->join('penduduk', 'penduduk.nik = komunitas.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('komunitas.is_delete', '0');
    $this->db->order_by('komunitas.created_at', 'asc');
    $query = $this->db->get();
    return $query->result();
  }

  function get_check($id)
  {
    $this->db->where('nama_komunitas', $id);
    return $this->db->get($this->table)->row();
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

  public function get_nik_penduduk($nik)
  {
    $this->db->select('*, penduduk.nama as nama, penduduk.nik as nik');
    $this->db->from('penduduk');
    $this->db->join('komunitas', 'komunitas.nik = penduduk.nik', 'left');
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

  function get_kategori_komunitas()
  {
    $this->db->select('*');
    $this->db->from('reff_kategori_komunitas');
    $this->db->where('is_aktif', '1');

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

  function get_all_komunitas()
  {
    $this->db->select('komunitas.id_komunitas as id_komunitas, komunitas.is_active as is_active, komunitas.is_delete as is_delete, komunitas.nama as nama, komunitas.nama_komunitas as nama_komunitas, komunitas.nik as nik, komunitas.alamat as alamat, provinsi.provinsi as provinsi, desa_kelurahan.desa_kelurahan as desa_kelurahan, kecamatan.kecamatan_name as kecamatan_name, kota_kab.kota_kab as kota_kab');
    $this->db->from('komunitas');
    $this->db->join('penduduk', 'penduduk.nik = komunitas.nik', 'left');
    $this->db->join('provinsi', 'komunitas.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'komunitas.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'komunitas.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'komunitas.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('komunitas.is_delete', '0');
    $query = $this->db->get();
    return $query->result();
  }

  function get_penduduk()
  {
    $this->db->select('*');
    $this->db->from('penduduk');
    $this->db->where('is_delete', '0');
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

  function get_all_deleted()
  {
    $this->db->select('*');
    $this->db->from('komunitas');
    $this->db->join('penduduk', 'penduduk.nik = komunitas.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('komunitas.is_delete', '1');
    $query = $this->db->get();
    return $query->result();
  }

  function get_detail_by_id($id)
  {
    $this->db->select('*');
    $this->db->from('komunitas');
    $this->db->join('penduduk', 'penduduk.nik = komunitas.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->join('reff_kategori_komunitas', 'komunitas.kategori_komunitas = reff_kategori_komunitas.id_kategori_komunitas', 'left');
    $this->db->where('komunitas.is_delete', '0');
    $this->db->where('komunitas.id_komunitas', $id);
    $query = $this->db->get();
    return $query->result();
  }

  function get_by_id($id)
  {
    $this->db->select('*, komunitas.id_komunitas as id_komunitas, komunitas.negara as negara, komunitas.id_provinsi as id_provinsi, komunitas.id_kota_kab as id_kota_kab, komunitas.id_provinsi as id_provinsi, komunitas.id_kecamatan as id_kecamatan, komunitas.id_desa_kelurahan as id_desa_kelurahan, komunitas.kodepos as kodepos');
    $this->db->from('komunitas');
    $this->db->join('penduduk', 'penduduk.nik = komunitas.nik', 'left');
    $this->db->join('provinsi', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    $this->db->join('kecamatan', 'penduduk.id_kecamatan = kecamatan.id_kecamatan', 'left');
    $this->db->join('kota_kab', 'penduduk.id_kota_kab = kota_kab.id_kota_kab', 'left');
    $this->db->join('desa_kelurahan', 'penduduk.id_desa_kelurahan = desa_kelurahan.id_desa_kelurahan', 'left');
    $this->db->where('komunitas.id_komunitas', $id);
    $query = $this->db->get();
    return $query->row();
  }

  function get_id($id)
  {
    $this->db->where($this->id, $id);
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

  function update($id, $data)
  {
    $this->db->where($this->id, $id);
    $this->db->update($this->table, $data);
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
}
