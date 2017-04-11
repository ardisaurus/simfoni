<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_wilayah extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}
		
		function get_all_provinsi() {
			$this->db->select('*');
			$this->db->from('wilayah_provinsi');
			$query = $this->db->get();
			
			return $query->result();
		}
	}
?>
