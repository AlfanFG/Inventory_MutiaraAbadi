<?php

class M_BarangMasuk extends CI_Model
{
    public function getAllBarangMasuk()
    {
        return $this->db->get('barang_masuk')->result_array();
    }

    public function getKodeNamaBarang($term)
    {
        $query = $this->db->query("SELECT NamaBahan, KodeBahan FROM bahan WHERE NamaBahan like '%" . $term . "%' OR KodeBahan like '%" . $term . "%'");
        $data = $query->result();

        return $data;
    }

    public function getNoSuratJalan()
    {

        $date = date('dmy');
        $query = $this->db->query(
            "SELECT IFNULL(MAX(SUBSTRING(noSuratJalan,11)),0)+1 AS no_urut FROM barang_masuk"
        );
        $data = $query->row_array();
        $no_urut = sprintf("%'.04d", $data['no_urut']);

        $id = $date . $no_urut;


        return $id;
    }

    function insertBarangMasuk($data)
    {
        $this->db->insert('barang_masuk', $data);
    }

    function updateBarangMasuk($data, $id)
    {
        $this->db->where('id_barangMasuk', $id);
        $this->db->update('barang_masuk', $data);
        return TRUE;
    }
}
