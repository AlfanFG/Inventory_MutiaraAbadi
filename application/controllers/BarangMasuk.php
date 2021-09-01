<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangMasuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pegawai');
        $this->load->model('M_BarangMasuk');
        $this->load->library('form_validation');
        $this->load->helper('nav');
    }

    public function index()
    {
        $data['barangMasuk'] = $this->M_BarangMasuk->getAllBarangMasuk();
        $this->load->view('admin/kelola_inventory/v_barangMasuk', $data);
        // if ($this->session->userdata('hakAkses') == '1' && $this->session->userdata('status') == 'login') {
        //     redirect('Login');
        // } else if ($this->session->userdata('hakAkses') == '2' && $this->session->userdata('status') == 'login') {


        // } else {
        //     redirect('Login');
        // }
    }

    function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->M_BarangMasuk->getKodeNamaBarang($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] =  '[' . $row->KodeBahan . '] - ' . $row->NamaBahan;
                echo json_encode($arr_result);
            }
        }
    }

    public function viewTambah()
    {
        $this->load->view('admin/kelola_inventory/v_tambahBarangMasuk');
    }

    public function detailBarangMasuk($id)
    {
        $data['detBarangMasuk'] = $this->M_BarangMasuk->getDetailBarangMasuk($id);
        $data['BarangMasuk'] = $this->M_BarangMasuk->getBarangMasukById($id);
        $this->load->view('admin/kelola_inventory/v_detBarangMasuk', $data);
    }

    public function addBarangMasuk()
    {

        // $this->form_validation->set_rules('noSurat', 'No. Surat', 'required');
        // $this->form_validation->set_rules('supplier', 'ID Jabatan', 'required');
        // $this->form_validation->set_rules('tglMasuk', 'Tanggal Masuk', 'required');
        // $jumlah = $this->input->post('noSurat');
        // print_r($this->input->post());
        // die();

        // for ($j = 1; $j < $jumlah; $j++) {
        //     $this->form_validation->set_rules('barang' . $j, 'Barang' . $j, 'required');
        //     $this->form_validation->set_rules('banyak' . $j, 'Banyak' . $j, 'required');
        //     $this->form_validation->set_rules('rincian' . $j, 'Rincian' . $j, 'required');
        // }
        // if ($this->form_validation->run()) {
        $jumlah = $this->input->post('jumlah');

        $total = 0;
        for ($i = 0; $i < $jumlah; $i++) {
            $namaKode = $this->input->post('barang')[$i];
            $namaBarang = substr($namaKode, 10);
            $namaKodeBarang = substr($namaKode, 1, 5);
            $rincian = $this->input->post('rincian')[$i];
            $clean = preg_replace('/\D/', '', $rincian);

            $dataBarang = array(
                'noSuratJalan' => $this->input->post('noSurat'),
                'KodeBarang' => $namaKodeBarang,
                'NamaBarang' => $namaBarang,
                'banyak' => $this->input->post('banyak')[$i],
                'rincian' => (int)$clean
            );

            $total += $this->input->post('rincian')[$i];
            $this->M_BarangMasuk->insertBarangMasuk($dataBarang);
        }
        $data = array(
            'noSuratJalan' => $this->input->post('noSurat'),
            'supplier' => $this->input->post('supplier'),
            'tanggalMasuk' => $this->input->post('tglMasuk'),
            'total' => $total
        );
        $this->db->insert('barang_masuk', $data);
        // } else {
        //     $json = array();
        //     $json1 = array();
        //     $json2 = array();
        //     $json3 = array();
        //     $jsonHasil = array();
        //     $json1 = array(

        //         'noSurat' => form_error('noSurat', '<p class="mt-3 text-danger">', '</p>'),
        //         'supplier' => form_error('supplier', '<p class="mt-3 text-danger">', '</p>'),
        //         'tglMasuk' => form_error('tglMasuk', '<p class="mt-3 text-danger">', '</p>')

        //     );

        //     for ($j = 1; $j < $jumlah; $j++) {
        //         $json2 = array(
        //             'barang' . $j => form_error('barang' . $j, '<p class="mt-3 text-danger">', '</p>'),
        //             'banyak' . $j => form_error('banyak' . $j, '<p class="mt-3 text-danger">', '</p>'),
        //             'rincian' . $j => form_error('rincian' . $j, '<p class="mt-3 text-danger">', '</p>'),
        //         );
        //         print_r(array_merge($json, $json2));
        //     }

        //     // print_r($jsonHasil);
        //     $json3 = array('status' => 'invalid');

        //     // print_r(array_merge($json, $json2, $json3));
        //     $this->output
        //         ->set_content_type('application/json')
        //         ->set_output(json_encode($json));
        // }
    }

    public function editPegawai($id)
    {
        $this->form_validation->set_rules('id_pegawai', 'ID Pegawai', 'required');
        $this->form_validation->set_rules('id_jabatan', 'ID Pegawai', 'required');
        $this->form_validation->set_rules('NamaPegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('alamatPegawai', 'alamatPegawai', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required');
        $this->form_validation->set_rules('nomorTelp', 'nomorTelp', 'required');


        if ($this->form_validation->run()) {
            $data = array(
                'id_pegawai' => $this->input->post('id_pegawai'),
                'id_jabatan' => $this->input->post('id_jabatan'),
                'NamaPegawai' => $this->input->post('NamaPegawai'),
                'alamatPegawai' => $this->input->post('alamatPegawai'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'nomorTelp' => $this->input->post('nomorTelp')

            );
            $this->M_Pegawai->updatePegawai($data, $id);
        } else {
            $json = array();
            $json = array(

                'id_pegawai' => form_error('id_pegawai', '<p class="mt-3 text-danger">', '</p>'),
                'id_jabatan' => form_error('id_jabatan', '<p class="mt-3 text-danger">', '</p>'),
                'NamaPegawai' => form_error('NamaPegawai', '<p class="mt-3 text-danger">', '</p>'),
                'alamatPegawai' => form_error('alamatPegawai', '<p class="mt-3 text-danger">', '</p>'),
                'tgl_lahir' => form_error('tgl_lahir', '<p class="mt-3 text-danger">', '</p>'),
                'nomorTelp' => form_error('nomorTelp', '<p class="mt-3 text-danger">', '</p>'),
                'status' => 'invalid'

            );

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($json));
        }

        // $insert = $this->M_Pegawai->insertGambar($name);
    }

    public function hapusPegawai($id)
    {

        $this->M_Pegawai->deletePegawai($id);
    }
}
