<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pendonor extends CI_Model
{
    function getAll()
    {
        return $this->db->get('tb_pendonor')->result();
    }

    function getPendonorById($id)
    {
        return $this->db->get_where('tb_pendonor', ['id' => $id])->result();
    }

    function insertPendonor($data)
    {
        $this->db->insert('tb_pendonor', $data);
    }

    function updatePendonor($data, $id)
    {
        $this->db->update('tb_pendonor', $data, ['id' => $id]);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_pendonor');
    }
}
