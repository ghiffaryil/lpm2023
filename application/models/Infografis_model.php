<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Infografis_model extends CI_Model
{

    function get_all_program()
    {
        return $this->db->get("program")->result();
    }

    function get_all_provinsi()
    {
        return $this->db->get("provinsi")->result();
    }


    // function get_by_id($id)
    // {
    //     $this->db->where($this->id, $id);
    //     return $this->db->get($this->table)->row();
    // }

    // function total_rows()
    // {
    //     return $this->db->get($this->table)->num_rows();
    // }

    // function insert($data)
    // {
    //     $this->db->insert($this->table, $data);
    // }

    // function update($id, $data)
    // {
    //     $this->db->where($this->id, $id);
    //     $this->db->update($this->table, $data);
    // }

    // function delete($id)
    // {
    //     $this->db->where($this->id, $id);
    //     $this->db->delete($this->table);
    // }

}
