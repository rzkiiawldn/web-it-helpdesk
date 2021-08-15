<?php

class Helpdesk_model extends CI_Model
{
    public function getDataUser($id_user = null)
    {
        if ($id_user != null) {
            return $this->db->get_where('tb_user', ['id_user' => $id_user]);
        }
        $this->db->order_by('id_user', 'DESC');
        return $this->db->get('tb_user');
    }

    public function getKerusakan($kode = null)
    {
        if ($kode != null) {
            return $this->db->get_where('tb_kerusakan', ['kode' => $kode]);
        }
        $this->db->order_by('kode', 'DESC');
        return $this->db->get('tb_kerusakan');
    }

    public function getKerusakanSelesai()
    {
        $this->db->order_by('waktu_selesai', 'DESC');
        return $this->db->get_where('tb_kerusakan', ['status_pengerjaan' => 'Selesai']);
    }

    public function getKerusakanBelumSelesai()
    {
        $this->db->order_by('kode', 'DESC');
        return $this->db->get_where('tb_kerusakan', ['status_pengerjaan !=' => 'Selesai']);
    }

    public function getKerusakanDitanggapi()
    {
        $this->db->order_by('kode', 'DESC');
        return $this->db->get_where('tb_kerusakan', ['status_pengerjaan' => 'Sedang ditanggapi']);
    }

    public function tambah_user()
    {
        $data = [
            'nama'          => htmlspecialchars($this->input->post('nama')),
            'username'      => htmlspecialchars($this->input->post('username')),
            'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'jabatan'       => htmlspecialchars($this->input->post('jabatan')),
            'level'         => htmlspecialchars($this->input->post('level'))
        ];
        $this->db->insert('tb_user', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">User berhasil ditambah</div>');
    }

    public function edit_user($id_user)
    {
        $nama          = htmlspecialchars($this->input->post('nama'));
        $username      = htmlspecialchars($this->input->post('username'));
        $password      = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $jabatan       = htmlspecialchars($this->input->post('jabatan'));
        $level         = htmlspecialchars($this->input->post('level'));
        $this->db->set('nama', $nama);
        $this->db->set('username', $username);
        $this->db->set('password', $password);
        $this->db->set('jabatan', $jabatan);
        $this->db->set('level', $level);
        $this->db->where('id_user', $id_user);
        $this->db->update('tb_user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">User berhasil di edit</div>');
    }

    // KERUSAKAN

    public function tambah_kerusakan()
    {
        date_default_timezone_set("Asia/Jakarta");
        $foto_kerusakan = $_FILES['foto_kerusakan'];
        if ($foto_kerusakan = '') {
        } else {
            $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
            $config['max_size']         = '2048';
            $config['upload_path']      = './assets/img/foto_kerusakan/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto_kerusakan')) {
                $foto_kerusakan   = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Tambah foto kerusakan gagal, silahkan cek file yang anda masukan</div>');
                redirect('staff/laporan_kerusakan');
            }
        }
        $data = [
            'id_user'           => 1,
            'deskripsi'         => htmlspecialchars($this->input->post('deskripsi')),
            'jenis_kerusakan'   => htmlspecialchars($this->input->post('jenis_kerusakan')),
            'waktu_pembuatan'   => date("H:i"),
            'status_pengerjaan' => 'Belum Selesai',
            'waktu_selesai'     => '',
            'foto_kerusakan'    => $foto_kerusakan,
        ];
        $this->db->insert('tb_kerusakan', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Laporan berhasil ditambah</div>');
    }

    public function edit_kerusakan($kode)
    {
        $kerusakan = $this->db->get_where('tb_kerusakan', ['kode' => $kode])->row_array();
        $deskripsi            = htmlspecialchars($this->input->post('deskripsi'));
        $jenis_kerusakan      = htmlspecialchars($this->input->post('jenis_kerusakan'));

        $foto_kerusakan = $_FILES['foto_kerusakan'];
        if ($foto_kerusakan = "") {
        } else {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/foto_kerusakan/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_kerusakan')) {
                $old_foto_kerusakan = $kerusakan['foto_kerusakan'];
                if ($old_foto_kerusakan != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/foto_kerusakan/' . $old_foto_kerusakan);
                }

                $foto_kerusakan = $this->upload->data('file_name');
                $this->db->set('foto_kerusakan', $foto_kerusakan);
            } else {
                echo $this->upload->display_errors('foto_kerusakan');
            }
        }

        $this->db->set('deskripsi', $deskripsi);
        $this->db->set('jenis_kerusakan', $jenis_kerusakan);
        $this->db->where('kode', $kode);
        $this->db->update('tb_kerusakan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Laporan berhasil di edit</div>');
    }
}
