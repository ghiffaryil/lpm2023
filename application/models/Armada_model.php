<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Armada_model extends CI_Model{

  public $table = 'armada';
  public $id    = 'id_armada';
  public $order = 'DESC';

  function get_all()
  { 
    $this->db->select('*');
    $this->db->from('armada');
    $this->db->join('petugas','petugas.id_petugas = armada.id_petugas', 'left');
    $this->db->where('armada.is_delete', '0');
    return $this->db->get()->result();
  }

  function get_all_deleted()
  { 
    $this->db->select('*');
    $this->db->from('armada');
    $this->db->join('petugas','petugas.id_petugas = armada.id_petugas', 'left');
    $this->db->where('armada.is_delete', '1');
    return $this->db->get()->result();
  }

  function get_all_petugas()
  { 
    $this->db->select('*');
    $this->db->from('petugas');
    $this->db->where('is_delete', '0');    
    $this->db->where('is_active', '1');
    return $this->db->get()->result();
  }

  function get_by_id($id)
  { 
    $this->db->select('*');
    $this->db->from('armada');
    $this->db->join('petugas','petugas.id_petugas = armada.id_petugas', 'left');
    $this->db->where('armada.id_armada', $id);
    return $this->db->get()->row();
  }

  function get_check($id)
  {
    $this->db->where('no_polisi', $id);
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

  function update($id,$data)
  {
    $this->db->where($this->id, $id);
    $this->db->update($this->table, $data);
  }

  function soft_delete($id,$data)
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
