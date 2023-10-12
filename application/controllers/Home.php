<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct(){
    parent::__construct();
    $this->load->model('beranda_model');
    $this->load->helper('url');
    $this->load->library('pagination');
    $this->load->database();
}

    public function index($id=null)
    {
        $data['judul'] = 'beranda';

        $jml = $this->db->get('konten');

        $config['base_url'] = base_url('home/index');
        $config['total_rows'] = $jml->num_rows(); 
        $config['per_page'] = 4;


        //style
        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['attributes'] = array('class' => 'page-link');


        $this->pagination->initialize($config);

        $data['halaman'] = $this->pagination->create_links();
        $data['quer'] = $this->beranda_model->ambil($config['per_page'],$id);
        
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

        $data['judul'] = 'beranda';

        $jml = $this->db->get('konten');

        $config['base_url'] = base_url('home/index');
        $config['total_rows'] = $jml->num_rows(); 
        $config['per_page'] = 4;


        //style
        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['attributes'] = array('class' => 'page-link');


        $this->pagination->initialize($config);

        $data['halaman'] = $this->pagination->create_links();
        $data['quer'] = $this->beranda_model->ambil($config['per_page'],$id);
        
        $this->load->view('beranda', array_merge($data));

    }
}