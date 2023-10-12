<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index()
    {
        $this->load->view('admin/login');
    }

    public function login()
	{
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->db->from('pengguna');
        $this->db->where('username', $username)->where('password', $password);
        $data = $this->db->get()->row();
        if($data==NULL){
            $this->session->set_flashdata('alert','
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>username dan password salah
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            redirect('admin/auth');
        } else {
            $userdata = array(
                'id_login'	=> true,
                'id'	    => $data->id,
                'username'	=> $data->username,
				'password'	=> $data->password,
				'level'		=> $data->level, 
            );
        }
		$this->session->set_userdata($userdata);
        redirect('admin/home');
	}
    public function logout(){
        $this->session->sess_destroy();
        redirect('admin/auth');
    }
    
}