<?php

class Cabang extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_cabang');
    }

    function index()
    {
        $data['cabang'] = $this->Model_cabang->getDataCabang()->result();
        $this->template->load('template/template', 'cabang/view_cabang.php', $data);
    }

    function inputcabang()
    {
        $this->load->view('cabang/input_cabang');
    }

    function simpancabang()
    {
        $kodecabang = $this->input->post('kodecabang');
        $namacabang = $this->input->post('namacabang');
        $alamatcabang = $this->input->post('alamatcabang');
        $telepon = $this->input->post('telepon');
        
        $data = array (
            'kode_cabang' => $kodecabang,
            'nama_cabang' => $namacabang,
            'alamat_cabang' => $alamatcabang,
            'telepon' => $telepon
        );

        $simpan = $this->Model_cabang->insertCabang($data);
        if ($simpan == 1) {
            $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data Berhasil disimpan
          </div>');
            redirect('cabang');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12" y2="12" /><line x1="12" y1="16" x2="12.01" y2="16" /></svg>
            Data Gagal Disimpan!
          </div>');
            redirect('cabang');
        }
    }

    function editcabang()
    {
        $kodecabang = $this->uri->segment(3);
        $data['cabang'] = $this->Model_cabang->getCabang($kodecabang)->row_array();
        $this->load->view('cabang/edit_cabang', $data);
    }

    function updatecabang()
    {
        $kodecabang = $this->input->post('kodecabang');
        $namacabang = $this->input->post('namacabang');
        $alamatcabang = $this->input->post('alamatcabang');
        $telepon = $this->input->post('telepon');
        
        $data = array (
            'kode_cabang' => $kodecabang,
            'nama_cabang' => $namacabang,
            'alamat_cabang' => $alamatcabang,
            'telepon' => $telepon
        );

        $simpan = $this->Model_cabang->updateCabang($data, $kodecabang);
        if ($simpan == 1) {
            $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data Berhasil Update
          </div>');
            redirect('cabang');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12" y2="12" /><line x1="12" y1="16" x2="12.01" y2="16" /></svg>
            Data Gagal di update!
          </div>');
            redirect('cabang');   
        }
    }

    function hapuscabang()
    {
        $kodecabang = $this->uri->segment(3);
        $hapus = $this->Model_cabang->deleteCabang($kodecabang);
        if ($hapus == 1) {
            $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data Berhasil Dihapus
          </div>');
            redirect('cabang');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12" y2="12" /><line x1="12" y1="16" x2="12.01" y2="16" /></svg>
            Data Gagal dihapus!
          </div>');
            redirect('cabang');   
        }
    }
}