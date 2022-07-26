<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('main');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('Auth/register');
    }

    public function proses()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[1]|max_length[50]|is_unique[tb_user.username]');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required|min_length[1]|max_length[500]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('lahir', 'lahir', 'trim|required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[1]|max_length[50]');


        if ($this->form_validation->run() == true) {
            $username = $this->input->post('username');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $lahir = $this->input->post('lahir');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->main->register($username, $nama, $alamat, $email, $lahir, $password);
            $this->session->set_flashdata('success_register', 'Proses Pendaftaran User Berhasil');
            redirect('Auth');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('register');
        }
    }
}
