<?php
class M_user extends CI_Model{

// =========================== Login Section ================================
    function cek($username,$password){
        $this->db->where("username",$username);
        $this->db->where("password",$password);    
        return $this->db->get("user");
    }

    function cek_aktif($username){
    	$this->db->where("username",$username);     
        return $this->db->get("user");
    }

    function goPageUser()
	{			
		$username=$this->session->userdata('username');
		$this->db->where('username',$username);
        $this->db->select('level');
		$query=$this->db->get('user');
		$row = $query->row();
		$level=$row->level;		
        $this->session->set_userdata('level',$level);
		redirect($level.'/pratinjau/');
	}

	function getNama()
	{			
		$username=$this->session->userdata('username');
        $this->db->where("username",$username);
        $this->db->select('nama');
		$query=$this->db->get('user');
		$full_name=$query->result();
		foreach ($full_name as $user) {
			$nick_name=explode(" ",$user->nama);
			if (count($nick_name)>1) {				
				$nama_user=$nick_name[0]." ".$nick_name[1];	
			}else{
				$nama_user=$user->nama;
			}
		}
		return $nama_user;
	}

	function getEmail($username)
	{			
        $this->db->where("username",$username);
        $this->db->select('email');
		$query=$this->db->get('user');
		foreach ($query->result() as $user) {
			$email_user=$user->email;
		}
		return $email_user;
	}

	function daftar($data){
		$this->db->insert('user', $data);
		return;
	}

// =========================== Login Section End ===============================

// ========================== Pengaturan Section ===============================
	function getUser(){		
		$username=$this->session->userdata('username');
        $this->db->select('nama');
        $this->db->select('username');
        $this->db->select('email');
        $this->db->select('no_hp');
		$this->db->where('username', $username);
		$hasilquery=$this->db->get('user');
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function admin_num(){
        $this->db->select('level');		
		$this->db->where('level', 'admin');
		$hasilquery=$this->db->get('user');
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function cekusername($usernamebaru){
		$this->db->where('username', $usernamebaru);
        return $this->db->get("user");
	}

	function ubahusername($usernamelama, $data){
		$this->db->where('username', $usernamelama);
		$this->db->update('user', $data);
	}

	function ubahAkun($username, $data){
		$this->db->where('username', $username);
		$this->db->update('user', $data);
	}

	function hapusAkun($username){
		$this->db->where('username', $username);
		$this->db->delete('user');
	}

// ============================== Pengaturan End ==============================
}
?>