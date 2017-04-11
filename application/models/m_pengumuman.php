<?php
class M_Pengumuman extends CI_Model{

	function getpengumuman($config){
        $this->db->select('id_pengumuman');
        $this->db->select('judul_pengumuman');
        $this->db->select('tgl_pengumuman');
        $this->db->select('isi_pengumuman');		
		$hasilquery=$this->db->get('pengumuman', $config['per_page'], $this->uri->segment(4));
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function getpengumuman_public($config){
        $this->db->select('id_pengumuman');
        $this->db->select('judul_pengumuman');
        $this->db->select('tgl_pengumuman');
        $this->db->select('isi_pengumuman');		
		$hasilquery=$this->db->get('pengumuman', $config['per_page'], $this->uri->segment(3));
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function getpengumuman_detail($id){
        $this->db->select('id_pengumuman');
        $this->db->select('judul_pengumuman');
        $this->db->select('tgl_pengumuman');
        $this->db->select('isi_pengumuman');
        $this->db->where('id_pengumuman', $id);		
		$hasilquery=$this->db->get('pengumuman');
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function getpengumuman_side(){
        $this->db->select('id_pengumuman');
        $this->db->select('judul_pengumuman');
        $this->db->select('tgl_pengumuman');
        $this->db->select('isi_pengumuman');		
		$hasilquery=$this->db->get('pengumuman', 4);
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function tambah($data){
		$this->db->insert('pengumuman', $data);
		return;
	}

	function hapuspengumuman($id_pengumuman){
		$this->db->where('id_pengumuman', $id_pengumuman);
		$this->db->delete('pengumuman');
	}

	function edit($id_pengumuman, $data){
		$this->db->where('id_pengumuman', $id_pengumuman);
		$this->db->update('pengumuman', $data);
	}

	function getjudul($id_pengumuman)
	{			
        $this->db->where("id_pengumuman",$id_pengumuman);
        $this->db->select('judul_pengumuman');
		$query=$this->db->get('pengumuman');
		$full_judul=$query->result();
		foreach ($full_judul as $pengumuman) {
				$judul=$pengumuman->judul;
		}
		return $judul;
	}
}