<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if(($this->session->userdata('level') != "admin") AND ($this->session->userdata('level') != "pengguna")){
            redirect('admin/auth');
        }
    }
    public function index()
	{
        $this->db->select('*')->from('kategori');
        $this->db->order_by('id_kategori','ASC');
        $user = $this->db->get()->result_array();
        $data = array(
            'user' => $user,
            'judul_halaman' => "kategori"
        );
		$this->template->load('admin/template','admin/form_kategori',array_merge($data));
	}

    public function simpan_kategori()
    {
        $kategori = $this->input->post('kategori');
        $cekkategori = $this->db->where('kategori', $kategori)->count_all_results('kategori');
        if ($cekkategori == 1) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>username sudah ada
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('admin/kategori/index');
        }

        $data = array(
			'kategori' => $this->input->post('kategori')	
		);
		$this->db->insert('kategori', $data);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>data berhasil di simpan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/kategori/index');
    }
    public function hapus($id_kategori)
    {
        $where = array('id_kategori' => $id_kategori);
        $this->db->Delete('kategori', $where);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>data berhasil di hapus
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/kategori/index');
    }

    public function update_kategori()
	{
		$data = array(
			'kategori' => $this->input->post('kategori'),
		);
		$where = array('id_kategori' => $this->input->post('id_kategori'));
		$this->db->update('kategori', $data, $where);
		redirect('admin/kategori/index');
	}
}