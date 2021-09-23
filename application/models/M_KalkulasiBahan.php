<?php

class M_KalkulasiBahan extends CI_Model
{
    public function getAllKalkulasi()
    {
        $query = $this->db->query("SELECT * FROM perhitungan_produksi order by idPerhitungan desc");
        $data = $query->result_array();

        return $data;
    }

    public function getNomorBarangKeluar()
    {

        $date = date('dmy');
        $query = $this->db->query(
            "SELECT IFNULL(MAX(SUBSTRING(id_barangKeluar,11)),0)+1 AS no_urut FROM barang_keluar"
        );
        $data = $query->row_array();
        $no_urut = sprintf("%'.04d", $data['no_urut']);

        $id = $date . $no_urut;
        return $id;
    }

    function getDetailBarangKeluar($id)
    {
        $query = $this->db->query("SELECT D.kodeBarang, B.NamaBahan, B.satuan, D.banyak, D.rincian, dp.totalPesan, dp.jumlahPemesanan FROM bahan AS B INNER JOIN detail_barang_masuk AS D ON B.KodeBahan = D.kodeBarang INNER JOIN detail_pemesanan_bahan AS dp ON D.kodeBarang = dp.KodeBahan WHERE D.noSuratJalan = '$id'");
        $data = $query->result_array();

        return $data;
    }

    public function getKodeNamaBarang($term)
    {
        $query = $this->db->query("SELECT NamaBahan, KodeBahan FROM bahan WHERE NamaBahan like '%" . $term . "%' OR KodeBahan like '%" . $term . "%'");
        $data = $query->result();

        return $data;
    }


    public function getBarangMasukById($id)
    {
        $query = $this->db->query("SELECT bm.noSuratJalan, bm.noPemesanan, p.supplier, bm.tanggalMasuk, bm.total, dp.jumlahPemesanan, dp.totalPesan FROM barang_masuk AS bm INNER JOIN pemesanan_barang AS p ON bm.noPemesanan = p.noPemesanan INNER JOIN detail_pemesanan_bahan AS dp ON p.noPemesanan = dp.noPemesanan WHERE bm.noSuratJalan = '$id'");
        $data = $query->result_array();

        return $data;
    }


    function insertBarangMasuk($data)
    {
        $this->db->insert('detail_barang_masuk', $data);
    }

    function insertKalkulasi($data)
    {
        $this->db->insert('perhitungan_produksi', $data);
    }

    function updateBarangMasuk($data, $id)
    {
        $this->db->where('id_barangMasuk', $id);
        $this->db->update('barang_masuk', $data);
        return TRUE;
    }
}
