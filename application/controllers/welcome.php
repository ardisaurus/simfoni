<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller{
	function __construct(){
		parent::__construct();
       
	}

	function index(){
		$data['datapengumuman']=$this->m_pengumuman->getpengumuman_side();
        $this->load->view('pengunjung/v_pengunjung', $data);
    }
}
?>