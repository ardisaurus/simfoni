<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kontak extends CI_Controller{
	function __construct(){
		parent::__construct();
       
	}

	function index(){
		$username=$this->session->userdata('username');
        $config['base_url']=base_url()."kontak/index";
        $config['total_rows']= $this->db->query("SELECT * FROM user WHERE `level`='admin';")->num_rows();
        $config['per_page']=10;
        $config['num_links']=3;
        $config['uri_segment']=3;
        $config['next_tag_open'] = '<li>'; $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>'; $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="background-color:#E0E0E0;">'; $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>'; $config['num_tag_close'] = '</li>';
        $config['first_link']='< Pertama';
        $config['last_link']='Terakhir >';
        $config['next_link']='>';
        $config['prev_link']='<';
        $this->pagination->initialize($config);

		$data['datapengurus']=$this->m_pengurus->getpengurus_public($config);
		$data['datapengumuman']=$this->m_pengumuman->getpengumuman_side();
		$this->load->view('pengunjung/v_kontak', $data);     
    }
}
?>