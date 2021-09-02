<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Helm extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        $this->load->model('M_Pegawai');
        $this->load->model('M_Bahan');
        $this->load->model('M_Helm');
        $this->load->model('M_BarangMasuk');
    }

    public function index()
    {
        $this->load->helper('nav');
        $data['helm'] = $this->M_Helm->getAllHelm();
        $this->load->view('admin/data_master/v_dataHelm', $data);
    }

    public function tambahHelm()
    {
        $this->load->view('admin/data_master/v_tambahHelm');
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

    function getHargaBahan($kode)
    {

        $data = $this->M_Bahan->getHargaBahan($kode);
        $value = 0;
        foreach ($data as $val) {
            echo $val['harga'];
        }
        // print_r($data[0]);
        // echo json_encode($value);
    }

    public function insertHelm()
    {
        $jumlah = $this->input->post('jumlah');
        $total = 0;
        for ($i = 0; $i < $jumlah; $i++) {
            $namaKode = $this->input->post('bahan')[$i];
            // $namaBarang = substr($namaKode, 10);
            $namaKodeBarang = substr($namaKode, 1, 5);
            $bagianHelm = $this->input->post('bagian')[$i];
            $harga = $this->input->post('harga')[$i];
            $cleanHarga = preg_replace('/\D/', '', $harga);
            $hargaSet = $this->input->post('hargaSet')[$i];
            $cleanHargaSet = preg_replace('/\D/', '', $hargaSet);
            $kodeHelm = $this->input->post('kodeHelm');
            $namaHelm = $this->input->post('namaHelm');

            $dataHelm = array(
                'kodeHelm' => $kodeHelm,
                'KodeBahan' => $namaKodeBarang,
                'bagianHelm' => $bagianHelm,
                'harga' => $cleanHarga,
                'hasil' => $this->input->post('hasil')[$i],
                'hargaSet' => $cleanHargaSet
            );
            $this->M_Helm->insertHelm($dataHelm);
        }
        $data = array(
            'kodeHelm' => $kodeHelm,
            'namaHelm' => $namaHelm
        );
        $this->db->insert('helm', $data);
    }

    public function editBahan($id)
    {
        $this->form_validation->set_rules('kodeBahan', 'Kode Bahan', 'required');
        $this->form_validation->set_rules('namaBahan', 'Nama Bahan', 'required');
        $this->form_validation->set_rules('sisa', 'Sisa Bahan', 'required');


        if ($this->form_validation->run()) {
            $data = array(
                'KodeBahan' => $this->input->post('kodeBahan'),
                'NamaBahan' => $this->input->post('namaBahan'),
                'pcs' => $this->input->post('sisa')
            );
            $this->M_Bahan->updateBahan($data, $id);
        } else {
            $json = array();
            $json = array(
                'kodeBahan' => form_error('kodeBahan', '<p class="mt-3 text-danger">', '</p>'),
                'namaBahan' => form_error('namaBahan', '<p class="mt-3 text-danger">', '</p>'),
                'sisa' => form_error('sisa', '<p class="mt-3 text-danger">', '</p>'),
                'status' => 'invalid'
            );

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($json));
        }

        // $insert = $this->M_Pegawai->insertGambar($name);
    }
}
