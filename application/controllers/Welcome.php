<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('username')) {
			redirect('welcome/blocked');
		}
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$data 	= [
				'title'		=> 'Login'
			];
			$this->load->view('template/header', $data);
			$this->load->view('auth/login');
			$this->load->view('template/footer');
		} else {
			$username      	= $this->input->post('username');
			$password   	= $this->input->post('password');
			$user       	= $this->db->get_where('tb_user', ['username' => $username])->row_array();
			if ($user) {
				// jika email benar, di cek passwordnya
				if (password_verify($password, $user['password'])) {
					// jika password benar siapkan data
					$data = [
						'username'     	=> $user['username'],
						'level'   		=> $user['level']
					];
					// kemudian simpan data kedalam session
					$this->session->set_userdata($data);
					if ($user['level'] == 'Admin') {
						redirect('admin');
					} elseif ($user['level'] == 'IT') {
						redirect('it');
					} else {
						redirect('staff');
					}
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password yang anda masukan salah</div>');
					redirect('welcome');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Username tidak ditemukan</div>');
				redirect('welcome');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Anda berhasil keluar</div>');
		redirect('welcome');
	}

	public function blocked()
	{
		$this->load->view('blocked');
	}
}
