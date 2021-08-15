<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
    }
    public function index()
    {
        $data     = [
            'title'        => 'Staff',
            'user'         => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('index');
        $this->load->view('template/footer');
    }

    public function laporan_kerusakan()
    {
        $data     = [
            'title'        => 'Staff',
            'kerusakan'    => $this->helpdesk_model->getKerusakanBelumSelesai()->result_array(),
            'user'         => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('staff/laporan_kerusakan');
        $this->load->view('template/footer');
    }

    public function laporan_selesai()
    {
        $data     = [
            'title'        => 'Staff',
            'kerusakan'    => $this->helpdesk_model->getKerusakanSelesai()->result_array(),
            'user'         => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('staff/laporan_selesai');
        $this->load->view('template/footer');
    }

    public function proses($kode = null)
    {
        if (isset($_POST['tambah'])) {
            $this->helpdesk_model->tambah_kerusakan();
        } elseif (isset($_POST['edit'])) {
            $this->helpdesk_model->edit_kerusakan($kode);
        }
        redirect('staff/laporan_kerusakan');
    }
}
