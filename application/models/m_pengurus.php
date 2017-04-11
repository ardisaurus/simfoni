<?php
class M_Pengurus extends CI_Model{

	function getpengurus($config){
        $this->db->select('username');
        $this->db->select('nama');	
        $this->db->select('level');	
        $this->db->select('no_hp');	
        $this->db->select('email');
        $this->db->where('level', "admin");		
		$hasilquery=$this->db->get('user', $config['per_page'], $this->uri->segment(4));
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function getpengurus_public($config){
        $this->db->select('username');
        $this->db->select('nama');	
        $this->db->select('level');	
        $this->db->select('no_hp');	
        $this->db->select('email');
        $this->db->where('level', "admin");		
		$hasilquery=$this->db->get('user', $config['per_page'], $this->uri->segment(3));
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function tambah($data){
		$this->db->insert('user', $data);
		return;
	}	

	function cekusername($usernamebaru){
		$this->db->where('username', $usernamebaru);
        return $this->db->get("user");
	}

}
?>