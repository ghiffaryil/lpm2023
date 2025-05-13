<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekomender_model extends CI_Model{

  public $table = 'rekomender';
  public $id    = 'id_rekomender';
  public $order = 'DESC';

  function get_all()
  { 
    $this->db->where('is_delete', '0');
    return $this->db->get($this->table)->result();
  }

  function get_all_deleted()
  { 
    $this->db->where('is_delete', '1');
    return $this->db->get($this->table)->result();
  }

  function get_by_id($id)
  { 
    $this->db->where('id_rekomender', $id);
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
