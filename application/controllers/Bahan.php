<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bahan extends CI_Controller
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
    }

    public function index()
    {
        $this->load->helper('nav');
        $data['bahan'] = $this->M_Bahan->getAllBahan();
        $this->load->view('admin/v_dataBahan', $data);
    }

    public function addBahan()
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
            $this->M_Bahan->insertBahan($data);
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
