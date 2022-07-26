<?php

class Home extends CI_Controller
{
    public function index($nama = '')
    {
        $data['title'] = 'Home Page';
        $data['nama'] = $nama;
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
}
