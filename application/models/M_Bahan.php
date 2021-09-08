<?php

class M_Bahan extends CI_Model
{
    public function getAllBahan()
    {
        return $this->db->get('bahan')->result_array();
    }

    public function getKodeBahan()
    {
        $query = $this->db->query(
            "SELECT IFNULL(MAX(SUBSTRING(KodeBahan,4)),0)+1 AS no_urut FROM bahan"
        );
        $data = $query->row_array();
        $no_urut = sprintf("%'.04d", $data['no_urut']);

        $id = 'B' . $no_urut;


        return $id;
    }

    function getHargaBahan($kode)
    {
        $query = $this->db->query("SELECT harga FROM bahan WHERE KodeBahan = '$kode'");
        $data = $query->result_array();

        return $data;
    }

    function getSatuan($kode)
    {
        $query = $this->db->query("SELECT satuan FROM bahan WHERE KodeBahan = '$kode'");
        $data = $query->result_array();

        return $data;
    }

    function insertBahan($data)
    {
        $this->db->insert('bahan', $data);
    }

    function updateBahan($data, $id)
    {
        $this->db->where('KodeBahan', $id);
        $this->db->update('bahan', $data);
        return TRUE;
    }
}
