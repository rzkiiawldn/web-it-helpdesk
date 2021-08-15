<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
    }
    public function index()
    {
        $data     = [
            'title'        => 'Admin',
            'user'      => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('index');
        $this->load->view('template/footer');
    }

    public function laporan_selesai()
    {
        $data     = [
            'title'        => 'Admin',
            'kerusakan'    => $this->helpdesk_model->getKerusakanSelesai()->result_array(),
            'user'         => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('admin/laporan_selesai');
        $this->load->view('template/footer');
    }

    public function laporan_kerusakan()
    {
        $data     = [
            'title'        => 'Admin',
            'kerusakan'    => $this->helpdesk_model->getKerusakanBelumSelesai()->result_array(),
            'user'         => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('admin/laporan_kerusakan');
        $this->load->view('template/footer');
    }

    public function data_user()
    {
        $data     = [
            'title'        => 'Admin',
            'data_user'    => $this->helpdesk_model->getDataUser()->result_array(),
            'user'         => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('admin/data_user');
        $this->load->view('template/footer');
    }

    public function proses($id_user = null)
    {
        if (isset($_POST['tambah'])) {
            $this->helpdesk_model->tambah_user();
        } else if (isset($_POST['edit'])) {
            $this->helpdesk_model->edit_user($id_user);
        }
        redirect('admin/data_user');
    }
}
