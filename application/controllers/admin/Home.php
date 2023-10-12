<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        parent::__construct();
        if(($this->session->userdata('level') != "admin") AND ($this->session->userdata('level') != "pengguna")){
            redirect('admin/auth');
        }
    }
	public function index()
	{
		$titel = array('judul_halaman' => 'dashboard');
		$this->template->load('admin/template','admin/dashboard',array_merge($titel));
	}

}