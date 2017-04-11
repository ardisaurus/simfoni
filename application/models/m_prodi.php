<?php
class M_Prodi extends CI_Model{

	function getprodi($config){
        $this->db->select('kode');
        $this->db->select('nama_prodi');		
		$hasilquery=$this->db->get('prodi', $config['per_page'], $this->uri->segment(4));
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function getall(){
        $this->db->select('kode');
        $this->db->select('nama_prodi');		
		$hasilquery=$this->db->get('prodi');
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function tambah($data){
		$this->db->insert('prodi', $data);
		return;
	}

	function hapusprodi($kode){
		$this->db->where('kode', $kode);
		$this->db->delete('prodi');
	}

	function edit($kode, $data){
		$this->db->where('kode', $kode);
		$this->db->update('prodi', $data);
	}

	function cekKode($kode){
		$this->db->where('kode', $kode);
        return $this->db->get("prodi");
	}

}