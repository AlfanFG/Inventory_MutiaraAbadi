<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
    }

    public function index()
    {
        $this->load->view('v_login');
    }

    public function sign_in()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        $pegawai = $this->db->get_where('pegawai', ['id_pegawai' => $user['id_pegawai']])->row_array();

        // User available
        if ($user) {

            // Password Match
            if (($password == $user['password'])) {
                $data = [

                    'idJabatan' => $pegawai['id_jabatan'],
                    'idpegawai' => $pegawai['id_pegawai'],
                    'Nama' => $pegawai['namaPegawai'],
                    'tglLahir' => $pegawai['tgl_lahir'],
                    'Alamat' => $pegawai['alamatPegawai'],
                    'noTelp' => $pegawai['nomorTelp'],
                    'status' => 'login'
                ];
                $this->session->set_userdata($data);
                redirect('Dashboard');
                // if ($data['idJabatan'] == 1) {
                //     redirect('Dashboard');
                // } else {
                //     redirect('barista');
                // }
            } else {
                $this->load->view('Login');
            }
        }
    }
}
