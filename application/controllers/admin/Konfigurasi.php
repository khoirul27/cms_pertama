<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	public function __construct(){
        parent::__construct();
        if(($this->session->userdata('level') != "admin") AND ($this->session->userdata('level') != "pengguna")){
            redirect('admin/auth');
        }
    }
	public function index()
	{
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();
		$data = array(
            'judul_halaman' => 'konfigurasi',
            'konfig'        => $konfig);
		$this->template->load('admin/template','admin/form_konfigurasi',array_merge($data));
	}

    public function update_konfigurasi() {
        $where = array('id_konfigurasi' => 1);
        $data = array(
            'judul_website' => $this->input->post('judul_web'),
            'profil_website' => $this->input->post('profil_web'),
            'instagram' => $this->input->post('instagram'),
            'facebook' => $this->input->post('facebook'),
            'email' => $this->input->post('email'),
            'no_wa' => $this->input->post('no_wa'),
            'alamat' => $this->input->post('alamat')
        );
        $this->db->update('konfigurasi',$data,$where);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>data berhasil di simpan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/konfigurasi');
    }
}