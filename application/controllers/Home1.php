<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('beranda_model');
    }

    public function index()
    {
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();
        $this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array();
        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();
        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('pengguna c','a.username=c.username','left');
        $this->db->order_by('tanggal','DESC');
        $konten = $this->db->get()->result_array();
        $data = array(
            'judul' => "beranda",
            'konfig' => $konfig,
            'caraousel' => $caraousel,
            'kategori' => $kategori,
            'konten' => $konten
        );
        $this->load->view('beranda', array_merge($data));
    }
    
    public function about($id)
    {

        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();
        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();
        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('pengguna c','a.username=c.username','left');
        $this->db->order_by('tanggal','DESC');
        $this->db->where('slug', $id);
        $konten = $this->db->get()->row();

        $data = array(
            'judul' => "about",
            'konfig' => $konfig,
            'kategori' => $kategori,
            'konten' => $konten
        );
        $this->load->view('about', array_merge($data));

    }

    public function konten($id)
    {
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();
        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();
        $this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array();
        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('pengguna c','a.username=c.username','left');
        $this->db->where('a.id_kategori', $id);
        $konten = $this->db->get()->result_array();

        $data = array(
            'konfig' => $konfig,
            'kategori' => $kategori,
            'caraousel' => $caraousel,
            'konten' => $konten
        );
        $this->load->view('beranda', array_merge($data));

    }
}