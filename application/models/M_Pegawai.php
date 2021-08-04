<?php

class M_Pegawai extends CI_Model
{
    public function getAllPegawai()
    {
        return $this->db->get('pegawai')->result_array();
    }

    public function id_pegawai()
    {
        $query = $this->db->query(
            "SELECT IFNULL(MAX(SUBSTRING(id_pegawai,3)),0)+1 AS no_urut FROM pegawai"
        );
        $data = $query->row_array();
        $no_urut = sprintf("%'.03d", $data['no_urut']);

        $id = 'P' . $no_urut;


        return $id;
    }

    function insertPegawai($data)
    {
        $this->db->insert('pegawai', $data);
    }

    function updatePegawai($data, $id)
    {
        $this->db->where('id_pegawai', $id);
        $this->db->update('pegawai', $data);
        return TRUE;
    }

    function deletePegawai($id)
    {
        $this->db->where('id_pegawai', $id);
        $this->db->delete('pegawai');
    }
}
