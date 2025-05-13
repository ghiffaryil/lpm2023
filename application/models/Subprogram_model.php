<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subprogram_model extends CI_Model{

  public $table = 'sub_program';
  public $id    = 'id_subprogram';
  public $order = 'DESC';

  function get_all()
  {
    $this->db->join('program', 'program.id_program = sub_program.id_program');
    $this->db->where('sub_program.is_delete', '0');
    return $this->db->get($this->table)->result();
  }

  function get_all_combobox($id)
  {
    $this->db->where('menu_id', $id);
    $this->db->order_by('submenu_name');
    $data = $this->db->get($this->table);

    if($data->num_rows() > 0)
    {
      foreach($data->result_array() as $row)
      {
        $result[''] = '- Please Choose Submenu';
        $result[$row['id_submenu']] = $row['submenu_name'];
      }
      return $result;
    }
  }

  function get_all_program() {
    $query ="SELECT * FROM program";
    // $this->db->join('penduduk', 'penduduk.id_provinsi = provinsi.id_provinsi', 'left');
    // $this->db->select('*');
    // $this->db->from('provinsi');
    $query = $this->db->query($query);
    
    return $query->result();
  }

  function get_all_combobox_program($id)
  {
    $this->db->where('id_program', $id);
    $this->db->order_by('nama_program');
    $data = $this->db->get($this->table);

    if($data->num_rows() > 0)
    {
      foreach($data->result_array() as $row)
      {
        $result[''] = '- Please Choose Submenu';
        $result[$row['id_program']] = $row['nama_program'];
      }
      return $result;
    }
  }


    function get_all_deleted()
  {
    $this->db->join('program', 'program.id_program = sub_program.id_program');
    $this->db->where('sub_program.is_delete', '1');
    return $this->db->get($this->table)->result();
  }


  function get_by_id($id)
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

  function update($id,$data)
  {
    $this->db->where($this->id, $id);
    $this->db->update($this->table, $data);
  }

  function delete($id)
  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
  }

  function soft_delete($id,$data)
  {
    
    $this->db->where($this->id, $id);
    $this->db->update($this->table, $data);
  }

  function lock_account($id,$data)
  {
    $this->db->where('username', $id);
    $this->db->update($this->table, $data);
  }

  // login attempt
  function get_total_login_attempts_per_user($id)
  {
    $this->db->where('username', $id);
    return $this->db->get('login_attempts')->num_rows();
  }

  function insert_login_attempt($data)
  {
    $this->db->insert('login_attempts', $data);
  }

  function clear_login_attempt($id)
  {
    $this->db->where('username', $id);
    $this->db->delete('login_attempts');
  }

}
