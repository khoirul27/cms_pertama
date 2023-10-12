<?php 

class Beranda_model extends CI_Model{    
    public function ketegori()
	{
        $this->db->from('kategori');
        return $this->db->get()->result_array();
	}
    public function caraousel()
	{
        $this->db->from('caraousel');
        return $this->db->get()->result_array();
	}
    public function ambil($num, $offset){
        
        $data = $this->db->get('konten',$num,$offset);
        return $data->result();

    }

    
}