<?php
class M_Alumni extends CI_Model{

	function getalumni($config){
        $this->db->select('*');
        $this->db->from("user");
		$this->db->join('alumni', 'alumni.nim = user.username');
        $this->db->where('level', "member");
		$this->db->order_by("tanggal_lulus", "desc");		
		$hasilquery=$this->db->get("",$config['per_page'], $this->uri->segment(4));
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function getcari($data2, $config){
        $this->db->select('*');
        $this->db->from("user");
		$this->db->join('alumni', 'alumni.nim = user.username');
		if ($data2['nim']!="") {
        	$this->db->where('nim =', $data2['nim']);
		}
        if ($data2['prodi']!="- Pilih Prodi -") {
			$this->db->where('prodi =', $data2['prodi']);
        }
        if ($data2['email']) {
			$this->db->where('email =', $data2['email']);
        }
        if ($data2['tahun_lulus']!="- Pilih Tahun Lulus -%") {
			$this->db->where('tanggal_lulus LIKE', $data2['tahun_lulus']);
        }
		if ($data2['nama']) {
	        $this->db->like('nama', $data2['nama']);
	        $this->db->or_like('nama', $data2['nama']);
        }
		$this->db->order_by("tanggal_lulus", "desc");		
		$hasilquery=$this->db->get("",$config['per_page'], $this->uri->segment(5));
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function getcari_jum($data2){
        $this->db->select('*');
		$this->db->join('alumni', 'alumni.nim = user.username');
		if ($data2['nim']!="") {
        	$this->db->where('nim =', $data2['nim']);
		}
        if ($data2['prodi']!="- Pilih Prodi -") {
			$this->db->where('prodi =', $data2['prodi']);
        }
        if ($data2['email']) {
			$this->db->where('email =', $data2['email']);
        }
        if ($data2['tahun_lulus']!="- Pilih Tahun Lulus -%") {
			$this->db->where('tanggal_lulus LIKE', $data2['tahun_lulus']);
        }
		if ($data2['nama']) {
	        $this->db->like('nama', $data2['nama']);
	        $this->db->or_like('nama', $data2['nama']);
        }
		$this->db->order_by("tanggal_lulus", "desc");		
		$hasilquery=$this->db->get("user");
		$jum=$hasilquery->num_rows;
		$this->session->set_userdata('jumlah', $jum);
					
	}

	function getalumni_public($config){
        $this->db->select('*');
        $this->db->from("user");
		$this->db->join('alumni', 'alumni.nim = user.username');
        $this->db->where('level', "member");
		$this->db->order_by("tanggal_lulus", "desc");		
		$hasilquery=$this->db->get("",$config['per_page'], $this->uri->segment(3));
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function getcari_public($data2, $config){
        $this->db->select('*');
        $this->db->from("user");
		$this->db->join('alumni', 'alumni.nim = user.username');
		if ($data2['nim']!="") {
        	$this->db->where('nim =', $data2['nim']);
		}
        if ($data2['prodi']!="- Pilih Prodi -") {
			$this->db->where('prodi =', $data2['prodi']);
        }
        if ($data2['email']) {
			$this->db->where('email =', $data2['email']);
        }
        if ($data2['tahun_lulus']!="- Pilih Tahun Lulus -%") {
			$this->db->where('tanggal_lulus LIKE', $data2['tahun_lulus']);
        }
		if ($data2['nama']) {
	        $this->db->like('nama', $data2['nama']);
	        $this->db->or_like('nama', $data2['nama']);
        }
		$this->db->order_by("tanggal_lulus", "desc");		
		$hasilquery=$this->db->get("",$config['per_page'], $this->uri->segment(4));
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function getdetail($id){
        $this->db->select('*');
        $this->db->from("user");
        $this->db->where('level', "member");
        $this->db->where('nim', $id);
		$this->db->join('alumni', 'alumni.nim = user.username');		
		$hasilquery=$this->db->get();
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function getpropinsi($id){
        $this->db->select('*');
        $this->db->from("wilayah_provinsi");
        $this->db->where('id', $id);		
		$hasilquery=$this->db->get();
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function getkota($id){
        $this->db->select('*');
        $this->db->from("wilayah_kabupaten");
        $this->db->where('id', $id);		
		$hasilquery=$this->db->get();
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function tambah($data){
		$this->db->insert('alumni', $data);
		return;
	}

	function get_foto($nim){
        $query=$this->db->query("SELECT foto FROM `alumni` WHERE nim=".$nim);
			if ($query->num_rows > 0) {
				foreach ($query->result() as $alumni)
				{
				   $foto=$alumni->foto;
				}
			return $foto;
			}
	}

	function foto_baru($nim, $data){
		$this->db->where('nim', $nim);
		$this->db->update('alumni', $data);
	}

	function edit($nim, $data){
		$this->db->where('nim', $nim);
		$this->db->update('alumni', $data);
	}

	function edituser($nim, $data){
		$this->db->where('username', $nim);
		$this->db->update('user', $data);
	}

	function hapusalumni($nim){
		$this->db->where('username', $nim);
		$this->db->delete('user');
		$this->db->where('nim', $nim);
		$this->db->delete('alumni');
		$this->db->where('nim', $nim);
		$this->db->delete('pekerjaan');
	}

	function gettahun_alumni(){
        $hasilquery=$this->db->query("SELECT YEAR(`tanggal_lulus`) as tahun_lulus FROM `alumni` GROUP BY nim");
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}
}
?>