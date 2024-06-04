<?php

class Datadiri extends CI_Controller {
    public function index() {
        $this->load->view('input_datadiri');
    }

    public function tampil(){

        $data=[
            'nim' => $this->input->post('nim'),
            'nama' => $this->input->post('nama'),
            'prodi' => $this->input->post('prodi'),
            'kodeprodi' => $this->input->post('prodi'),

        ];
        $this->load->view('tampil_datadiri',$data);
       }
    }

