<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PemesananBarang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pegawai');
        $this->load->library('form_validation');
        $this->load->helper('nav');
    }

    public function index()
    {
        $data['NamaPegawai'] = $this->M_Pegawai->getAllPegawai();
        $this->load->view('admin/v_Pegawai', $data);
        // if ($this->session->userdata('hakAkses') == '1' && $this->session->userdata('status') == 'login') {
        //     redirect('Login');
        // } else if ($this->session->userdata('hakAkses') == '2' && $this->session->userdata('status') == 'login') {


        // } else {
        //     redirect('Login');
        // }
    }

    public function addPegawai()
    {

        $this->form_validation->set_rules('id_pegawai', 'ID Pegawai', 'required');
        $this->form_validation->set_rules('id_jabatan', 'ID Jabatan', 'required');
        $this->form_validation->set_rules('NamaPegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('alamatPegawai', 'Alamat Pegawai', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('nomorTelp', 'Nomor Telp', 'required');



        if ($this->form_validation->run()) {

            $data = array(
                'id_pegawai' => $this->input->post('id_pegawai'),
                'id_jabatan' => $this->input->post('id_jabatan'),
                'NamaPegawai' => $this->input->post('NamaPegawai'),
                'alamatPegawai' => $this->input->post('alamatPegawai'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'nomorTelp' => $this->input->post('nomorTelp')

            );
            $this->M_Pegawai->insertPegawai($data);
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
