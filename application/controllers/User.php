<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $this->load->model('M_User');
    }

    public function index()
    {
        $this->load->helper('nav');
        $data['user'] = $this->M_User->getAllUser();
        $this->load->view('admin/data_master/v_dataUser', $data);
    }

    public function addUser()
    {

        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('Password', 'Password', 'required');
        $this->form_validation->set_rules('idPegawai', 'ID Pegawai', 'required');

        if ($this->form_validation->run()) {

            $data = array(
                'id_user' => $this->input->post('id_user'),
                'username' => $this->input->post('username'),
                'Password' => $this->input->post('Password'),
                'idPegawai' => $this->input->post('idPegawai'),
            );
            $this->M_Bahan->insertUser($data);
        } else {
            $json = array();
            $json = array(

                'id_user' => form_error('id_user', '<p class="mt-3 text-danger">', '</p>'),
                'username' => form_error('username', '<p class="mt-3 text-danger">', '</p>'),
                'Password' => form_error('Password', '<p class="mt-3 text-danger">', '</p>'),
                'idPegawai' => form_error('idPegawai', '<p class="mt-3 text-danger">', '</p>'),
                'status' => 'invalid'

            );

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($json));
        }
    }

    public function editBahan($id)
    {
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('Password', 'Password', 'required');
        $this->form_validation->set_rules('idPegawai', 'ID Pegawai', 'required');


        if ($this->form_validation->run()) {
            $data = array(
                'id_user' => $this->input->post('id-user'),
                'username' => $this->input->post('username'),
                'Password' => $this->input->post('Password'),
                'idPegawai' => $this->input->post('idPegawai'),
            );
            $this->M_Bahan->updateBahan($data, $id);
        } else {
            $json = array();
            $json = array(

                'id_user' => form_error('id_user', '<p class="mt-3 text-danger">', '</p>'),
                'username' => form_error('username', '<p class="mt-3 text-danger">', '</p>'),
                'Password' => form_error('Password', '<p class="mt-3 text-danger">', '</p>'),
                'idPegawai' => form_error('idPegawai', '<p class="mt-3 text-danger">', '</p>'),
                'status' => 'invalid'

            );

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($json));
        }

        // $insert = $this->M_Pegawai->insertGambar($name);
    }
}
