<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PemesananBarang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pegawai');
        $this->load->model('M_OrderBahan');
        $this->load->model('M_BarangMasuk');
        $this->load->library('form_validation');
        $this->load->helper('nav');
    }

    public function index()
    {

        if (($this->session->userdata('idJabatan') == 1) && ($this->session->userdata('status') == 'login')) {

            redirect('Login');
        } else if (($this->session->userdata('idJabatan') == 2) && ($this->session->userdata('status') == 'login')) {
            $data['orderBahan'] = $this->M_OrderBahan->getAllOrder();
            $this->load->view('admin/kelola_inventory/v_orderBahan', $data);
        } else {
            redirect('Login');
        }
    }
    //get kode dan nama barang auto complete
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

    // redirect ke halaman tambah pemesanan
    public function tambahPemesanan()
    {
       
        $this->load->view('admin/kelola_inventory/v_tambahOrder');
    }

    public function addPemesanan()
    {
        $this->form_validation->set_rules('noPemesanan', 'No Pemesanan', 'required');
        $this->form_validation->set_rules('tgl_pemesanan', 'Tanggal Pemesanan', 'required');
        $this->form_validation->set_rules('supplier', 'Supplier', 'required');
        $this->form_validation->set_rules('bahan[]', 'Bahan', 'required');
        $this->form_validation->set_rules('jmlPesanan[]', 'Jumlah Pesanan', 'required');

        if ($this->form_validation->run()) {
            $jumlah = $this->input->post('jumlah');

            $total = 0;
            for ($i = 0; $i < $jumlah; $i++) {
                $namaKode = $this->input->post('bahan')[$i];
                $namaBarang = substr($namaKode, 10);
                $namaKodeBarang = substr($namaKode, 1, 5);
                $jml = $this->input->post('jmlPesanan')[$i];

                $dataBarang = array(
                    'noPemesanan' => $this->input->post('noPemesanan'),
                    'KodeBahan' => $namaKodeBarang,
                    'jumlahPemesanan' => $this->input->post('jmlPesanan')[$i]
                );

                $this->M_OrderBahan->insertPemesanan($dataBarang);
            }
            $data = array(
                'noPemesanan' => $this->input->post('noPemesanan'),
                'supplier' => $this->input->post('supplier'),
                'tanggalPemesanan' => $this->input->post('tgl_pemesanan')
            );
            $this->db->insert('pemesanan_barang', $data);
        } else {
            $json = array();
            $json = array(

                'noPemesanan' => form_error('noPemesanan', '<p class="mt-3 text-danger">', '</p>'),
                'tgl_pemesanan' => form_error('tgl_pemesanan', '<p class="mt-3 text-danger">', '</p>'),
                'supplier' => form_error('supplier', '<p class="mt-3 text-danger">', '</p>'),
                'bahan' => form_error('bahan[]', '<p class="mt-3 text-danger">', '</p>'),
                'jmlPesanan' => form_error('jmlPesanan[]', '<p class="mt-3 text-danger">', '</p>'),
                'status' => 'invalid'

            );

            // print_r(array_merge($json, $json2, $json3));
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($json));
        }
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
