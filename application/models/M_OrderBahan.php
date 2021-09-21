<?php

class M_OrderBahan extends CI_Model
{
    public function getAllOrder()
    {
        return $this->db->get('pemesanan_barang')->result_array();
    }

    public function getNoPemesanan()
    {
        $query = $this->db->query(
            "SELECT IFNULL(MAX(SUBSTRING(noPemesanan,4)),0)+1 AS no_urut FROM pemesanan_barang"
        );
        $data = $query->row_array();
        $no_urut = sprintf("%'.04d", $data['no_urut']);

        $id = 'PB' . $no_urut;
        return $id;
    }

    function pemesananById($id){
        $query = $this->db->query("SELECT * FROM pemesanan_barang WHERE noPemesanan = '$id'");
        $data = $query->result_array();

        return $data;
    }

    function getOrderDetail($id){
        $query = $this->db->query("SELECT b.KodeBahan, b.NamaBahan, b.satuan, dp.jumlahPemesanan, dp.totalPesan FROM detail_pemesanan_bahan AS dp INNER JOIN bahan AS b ON dp.KodeBahan = b.KodeBahan WHERE dp.noPemesanan = '$id'");
        $data = $query->result_array();

        return $data;
    }

    public function getKodeNamaBarang($term)
    {
        $query = $this->db->query("SELECT NamaBahan, KodeBahan FROM bahan WHERE NamaBahan like '%" . $term . "%' OR KodeBahan like '%" . $term . "%'");
        $data = $query->result();

        return $data;
    }

    function insertPemesanan($data)
    {
        $this->db->insert('detail_pemesanan_bahan', $data);
    }

    function updateBahan($data, $id)
    {
        $this->db->where('KodeBahan', $id);
        $this->db->update('bahan', $data);
        return TRUE;
    }
}
