<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten extends CI_Controller {
    public function __construct(){
    parent::__construct();
        if($this->session->userdata('level')==NULL){
            redirect('admin/auth');
        }
    }
    public function index()
	{
        $this->db->from('kategori b');
        $this->db->order_by('kategori','ASC');
        $kategori = $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('pengguna c','a.username=c.username','left');
        $this->db->order_by('tanggal','DESC');
        $konten = $this->db->get()->result_array();

        $data = array(
            'judul_halaman' => "konten",
            'kategori' => $kategori,
            'konten' => $konten
        );
		$this->template->load('admin/template','admin/form_konten',array_merge($data));
	}

    public function simpan_konten()
    {
        $namafile = date('YmdHis').'.jpg';
        $config['upload_path']          = 'asset/admin/img/konten';
        $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['allowed_types']        = '*';
        $config['file_name']            = $namafile;
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 500 * 1024){
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 500 KB.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    ');
            redirect('admin/konten/simpan_konten/'.$this->input->post('foto'));  
        }  elseif( ! $this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }

        $judul = $this->input->post('judul');
        $cekjudul = $this->db->where('judul', $judul)->count_all_results('konten');
        if ($cekjudul == 1) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>username sudah ada
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('admin/konten/index');
        }

        $data = array(
			'judul'      => $this->input->post('judul'),
			'harga'      => $this->input->post('harga'),
			'keterangan' => $this->input->post('keterangan'),
            'id_konten'  => $this->input->post('id_konten'),
            'id_kategori'=> $this->input->post('id_kategori'),
            'foto'       => $namafile,
            'slug'       => str_replace(' ','-',$this->input->post('judul')),
            'tanggal'    => date('y-m-d'),
            'username'   => $this->session->userdata('username')
		);
		$this->db->insert('konten', $data);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>data berhasil di simpan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/konten/index');
    }

    public function hapus($id_konten)
    {
        $filename=FCPATH.'/asset/admin/img/konten/'.$id_konten;
        if (file_exists($filename)){
            unlink("./asset/admin/img/konten/".$id_konten);
        }

        $where = array('foto' => $id_konten);

        $this->db->Delete('konten', $where);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>data berhasil di hapus
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/konten/index');
    }

    public function update_konten()
    {
        $namafile = $this->input->post('nama_foto');
        $config['upload_path']          = 'asset/admin/img/konten';
        $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['allowed_types']        = '*';
        $config['file_name']            = $namafile;
        $config['overwrite']            = true;
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 500 * 1024){
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 500 KB.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    ');
            redirect('admin/konten/'.$this->input->post('foto'));  
        }  elseif( ! $this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }
        $data = array(
			'judul'      => $this->input->post('judul'),
			'harga'      => $this->input->post('harga'),
			'keterangan' => $this->input->post('keterangan'),
            'id_kategori'=> $this->input->post('id_kategori'),
            'slug'       => str_replace('','-',$this->input->post('judul'))
		);
        $where = array(
            'foto'      => $this->input->post('nama_foto')
        );
		$data = $this->db->update('konten',$data,$where);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>data berhasil di simpan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/konten/index');
    }

}