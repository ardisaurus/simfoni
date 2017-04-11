<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pengumuman extends CI_Controller{
	function __construct(){
		parent::__construct();
	}

	function index(){
		$config['base_url']=base_url()."pengumuman/index";
        $config['total_rows']= $this->db->query("SELECT * FROM pengumuman;")->num_rows();
        $config['per_page']=4;
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

        $data['datapengumuman']=$this->m_pengumuman->getpengumuman_public($config);
    	$data['datapengumuman_side']=$this->m_pengumuman->getpengumuman_side();
        $this->load->view('pengunjung/v_pengumuman',$data);
    }

    function lihat(){
    	$id=$this->uri->segment(3);    	
    	$data['datapengumuman']=$this->m_pengumuman->getpengumuman_side();
    	$data['datapengumuman_lihat']=$this->m_pengumuman->getpengumuman_detail($id);
    	if ($data['datapengumuman_lihat']) {
        	$this->load->view('pengunjung/v_pengumuman_detail', $data);
    	}else{
    		redirect('welcome');
    	}
    }
}
?>