<?php

class M_Helm extends CI_Model
{
    public function getAllHelm()
    {
        return $this->db->get('helm')->result_array();
    }

    public function getHelmByKode($kode)
    {
        $query = $this->db->query("SELECT * FROM detail_helm WHERE kodeHelm = '$kode'");
        $data = $query->result();

        return $data;
    }

    public function getKodeHelm()
    {
        $query = $this->db->query(
            "SELECT IFNULL(MAX(SUBSTRING(kodeHelm,3)),0)+1 AS no_urut FROM helm"
        );
        $data = $query->row_array();
        $no_urut = sprintf("%'.03d", $data['no_urut']);

        $id = 'H' . $no_urut;


        return $id;
    }

    public function getKodeNamaBarang($term)
    {
        $query = $this->db->query("SELECT NamaBahan, KodeBahan FROM bahan WHERE NamaBahan like '%" . $term . "%' OR KodeBahan like '%" . $term . "%'");
        $data = $query->result();

        return $data;
    }

    function insertHelm($data)
    {
        $this->db->insert('detail_helm', $data);
    }

    function updateBahan($data, $id)
    {
        $this->db->where('KodeBahan', $id);
        $this->db->update('bahan', $data);
        return TRUE;
    }
}
