<?php
defined('BASEPATH') or exit('No direct script access allowed');

class It extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
    }
    public function index()
    {
        $data     = [
            'title'        => 'IT',
            'user'         => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('index');
        $this->load->view('template/footer');
    }
    public function laporan_selesai()
    {
        $data     = [
            'title'        => 'IT',
            'kerusakan'    => $this->helpdesk_model->getKerusakanSelesai()->result_array(),
            'user'         => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('it/laporan_selesai');
        $this->load->view('template/footer');
    }
    public function laporan_kerusakan()
    {
        $data     = [
            'title'        => 'IT',
            'kerusakan'    => $this->helpdesk_model->getKerusakanBelumSelesai()->result_array(),
            'user'         => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('it/laporan_kerusakan');
        $this->load->view('template/footer');
    }

    // TOMBOL
    public function tanggapi($kode)
    {
        $status_pengerjaan = $this->input->post('status_pengerjaan');

        $this->db->set('status_pengerjaan', $status_pengerjaan);
        $this->db->where('kode', $kode);
        $this->db->update('tb_kerusakan');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Status Pengerjaan Sedang ditangapi</div>');
        redirect('it/laporan_kerusakan');
    }

    public function selesai($kode)
    {
        date_default_timezone_set("Asia/Jakarta");
        $status_pengerjaan  = $this->input->post('status_pengerjaan');
        $waktu_selesai      = date("H:i");

        $this->db->set('status_pengerjaan', $status_pengerjaan);
        $this->db->set('waktu_selesai', $waktu_selesai);
        $this->db->where('kode', $kode);
        $this->db->update('tb_kerusakan');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Status Pengerjaan Selesai</div>');
        redirect('it/laporan_selesai');
    }
}
