<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (($this->session->userdata('level') != "admin") and ($this->session->userdata('level') != "pengguna")) {
            redirect('admin/auth');
        }
    }
    public function hal_pengguna()
    {
        $this->db->select('*')->from('pengguna');
        $this->db->order_by('username', 'ASC');
        $user = $this->db->get()->result_array();
        $data = array(
            'user' => $user,
            'judul_halaman' => "pengguna"
        );
        $this->template->load('admin/template', 'admin/form_pengguna', array_merge($data));
    }
    public function simpan_pengguna()
    {
        $username = $this->input->post('username');
        $cekusername = $this->db->where('username', $username)->count_all_results('pengguna');
        if ($cekusername == 1) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>username sudah ada
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('admin/home/index');
        }

        $data = array(
            'username' => $this->input->post('username'),
            'nama' => $this->input->post('nama'),
            'password' => md5($this->input->post('password')),
            'level' => $this->input->post('level')
        );
        $this->db->insert('pengguna', $data);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>data berhasil di simpan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/home/index');
    }
    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->db->Delete('pengguna', $where);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>data berhasil di hapus
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/home/hal_pengguna');
    }

    public function edit_pengguna($id)
    {
        $this->db->select('*')->from('pengguna');
        $this->db->where('id', $id);
        $user = $this->db->get()->result_array();
        $data = array(
            'user' => $user,
            'judul_halaman' => 'edit_pengguna'
        );
        $this->template->load('admin/template', 'admin/edit_pengguna', array_merge($data));
    }

    public function update_pengguna()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'level' => $this->input->post('level'),
        );
        $where = array('id' => $this->input->post('id'));
        $this->db->update('pengguna', $data, $where);
        redirect('admin/home/index');
    }
}