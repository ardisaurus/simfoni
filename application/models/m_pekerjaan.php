<?php
class M_Pekerjaan extends CI_Model{

	function getpekerjaan($id ,$config){
        $this->db->select('*');
        $this->db->where('nim', $id);
		$this->db->order_by("tgl_mulai", "desc");		
		$hasilquery=$this->db->get("pekerjaan",$config['per_page'], $this->uri->segment(4));
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function getstatus(){
        $hasilquery=$this->db->query("SELECT YEAR(`tgl_mulai`) as tahun_mulai FROM `pekerjaan` GROUP BY nim");
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function gettahun_status(){
        $hasilquery=$this->db->query("SELECT YEAR(`tanggal_lulus`) as tahun_mulai FROM `alumni` GROUP BY YEAR(`tanggal_lulus`) ORDER BY YEAR(`tanggal_lulus`) DESC");
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function getjenis(){
        $hasilquery=$this->db->query("SELECT YEAR(tgl_mulai) as tahun_mulai, `jenis_pekerjaan` FROM `pekerjaan` GROUP BY nim");
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function gettahun_jenis(){
        $hasilquery=$this->db->query("SELECT YEAR(tgl_mulai) as tahun_mulai FROM `pekerjaan` GROUP BY YEAR(`tgl_mulai`) ORDER BY YEAR(`tgl_mulai`) DESC");
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function getkesehatan(){
        $hasilquery=$this->db->query("SELECT nim, YEAR(`tgl_mulai`) as tahun_mulai FROM `pekerjaan` WHERE `bidang_pekerjaan`='Kesehatan' GROUP BY nim");
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function gettahun_kes(){
        $hasilquery=$this->db->query("SELECT YEAR(`tgl_mulai`) as tahun_mulai FROM `pekerjaan` WHERE `bidang_pekerjaan`='Kesehatan' GROUP BY YEAR(`tgl_mulai`) DESC");
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function getindustri(){
        $hasilquery=$this->db->query("SELECT nim, YEAR(`tgl_mulai`) as tahun_mulai FROM `pekerjaan` WHERE `bidang_pekerjaan`='Industri' GROUP BY nim");
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function gettahun_in(){
        $hasilquery=$this->db->query("SELECT YEAR(`tgl_mulai`) as tahun_mulai FROM `pekerjaan` WHERE `bidang_pekerjaan`='Industri' GROUP BY YEAR(`tgl_mulai`) DESC");
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function getpendidikan(){
        $hasilquery=$this->db->query("SELECT nim, YEAR(`tgl_mulai`) as tahun_mulai FROM `pekerjaan` WHERE `bidang_pekerjaan`='Pendidikan' GROUP BY nim");
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function gettahun_pen(){
        $hasilquery=$this->db->query("SELECT YEAR(`tgl_mulai`) as tahun_mulai FROM `pekerjaan` WHERE `bidang_pekerjaan`='Pendidikan' GROUP BY YEAR(`tgl_mulai`) DESC");
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function getmasa_ideal(){
        $hasilquery=$this->db->query("SELECT `pekerjaan`.`nim`, Year(tgl_mulai) as tahun_mulai,tgl_mulai-`alumni`.`tanggal_lulus` as masa_tunggu FROM `pekerjaan`, `alumni` where `pekerjaan`.`nim`=`alumni`.`nim` group by `pekerjaan`.`nim`");
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function gettahun_masa_ideal(){
        $hasilquery=$this->db->query("SELECT Year(tgl_mulai) as tahun_mulai FROM `pekerjaan`, `alumni` where `pekerjaan`.`nim`=`alumni`.`nim` group by Year(tgl_mulai) ORDER BY Year(tgl_mulai) DESC");
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function getmasa(){
		$hasilquery=$this->db->query("SELECT `pekerjaan`.`nim`, tgl_mulai-`alumni`.`tanggal_lulus` as masa_tunggu FROM `pekerjaan`, `alumni` where `pekerjaan`.`nim`=`alumni`.`nim` group by `pekerjaan`.`nim`");
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}


	function getlast($nim){
        $this->db->select('*');
        $this->db->where('nim', $nim);
        $this->db->limit(1);
		$this->db->order_by("tgl_mulai", "desc");		
		$hasilquery=$this->db->get("pekerjaan");
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function getall($nim, $config){
        $this->db->select('*');
        $this->db->where('nim', $nim);
		$this->db->order_by("tgl_mulai", "desc");		
		$hasilquery=$this->db->get("pekerjaan",$config['per_page'], $this->uri->segment(5));
		if ($hasilquery->num_rows > 0) {
			foreach ($hasilquery->result() as $value) {
				$data[]=$value;
			}
			return $data;
		}		
	}

	function getdetail($id){
        $this->db->select('*');
        $this->db->from("pekerjaan");
        $this->db->where('id_pekerjaan', $id);		
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
		$this->db->insert('pekerjaan', $data);
		return;
	}

	function edit($id_pekerjaan, $data){
		$this->db->where('id_pekerjaan', $id_pekerjaan);
		$this->db->update('pekerjaan', $data);
	}

	function hapuspekerjaan($id_pekerjaan){
		$this->db->where('id_pekerjaan', $id_pekerjaan);
		$this->db->delete('pekerjaan');
	}
}
?>