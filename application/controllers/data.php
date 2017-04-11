<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Data extends CI_Controller{
	function __construct(){
		parent::__construct();		
	}

	function index(){
		$config['base_url']=base_url()."data/index";
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
        if(isset($_POST['submit'])){
            $this->form_validation->set_rules('nim','NIM','trim|alpha_dash|min_length[4]|max_length[50]|xss_clean');        
            $this->form_validation->set_rules('nama','nama','trim|min_length[3]|max_length[50]|xss_clean');
            $this->form_validation->set_rules('email','email','trim|valid_email|xss_clean');
            if ($this->form_validation->run() == FALSE)
            {   
                $data['dataalumni']=$this->m_alumni->getalumni($config);        
                $data['page']='admin/v_alumni';        
                $this->load->view('admin/v_dashboard', $data);
            }else{
                $data2['nim']=$this->input->post('nim');                    
                $data2['nama']= strtoupper($this->input->post('nama'));                    
                $data2['email']=$this->input->post('email');                    
                $data2['tahun_lulus']=$this->input->post('tahun_lulus')."%";                    
                $data2['prodi']=$this->input->post('prodi');
                $data['dataprodi']=$this->m_prodi->getall();

                $data['dataalumni']=$this->m_alumni->getcari($data2, $config);
                $config['total_rows']= count($data['dataalumni']);
                $this->pagination->initialize($config);        
                $data['page']='admin/v_alumni';        
                $this->load->view('admin/v_dashboard', $data);
            }

        }else{
            $config['total_rows']= $this->db->query("SELECT * FROM user WHERE `level`='member';")->num_rows();
            $this->pagination->initialize($config);
            $data['dataprodi']=$this->m_prodi->getall();
			$data['datanya']=$this->m_alumni->getalumni_public($config);
    		$data['datapengumuman_side']=$this->m_pengumuman->getpengumuman_side();		
        	$this->load->view('pengunjung/v_data',$data);
        }
    }

    function lihat(){
        $id=$this->uri->segment(3);     
        $data['datapengumuman']=$this->m_pengumuman->getpengumuman_side();
        $data['dataalumni']=$this->m_alumni->getdetail($id);
        if ($data['dataalumni']) {
            $data['datapekerjaan']=$this->m_pekerjaan->getlast($id);
            $this->load->view('pengunjung/v_alumni_detail', $data);
        }else{
            redirect('welcome');
        }
    }

    function form_cari(){
        date_default_timezone_set('Asia/Jakarta');
        $data['tanggal']=date("Y-m-d");
        $data['datapengumuman']=$this->m_pengumuman->getpengumuman_side();          
        $data['dataprodi']=$this->m_prodi->getall();        
        $this->load->view('pengunjung/v_pencarian', $data);        
    }

    function cari(){
        $username=$this->session->userdata('username');
        date_default_timezone_set('Asia/Jakarta');
        $data['tanggal']=date("Y-m-d");
        $config['base_url']=base_url()."data/cari/index";
        $config['per_page']=4;
        $config['num_links']=3;
        $config['uri_segment']=4;
        $config['next_tag_open'] = '<li>'; $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>'; $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="background-color:#E0E0E0;">'; $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>'; $config['num_tag_close'] = '</li>';
        $config['first_link']='< Pertama';
        $config['last_link']='Terakhir >';
        $config['next_link']='>';
        $config['prev_link']='<';

        if(isset($_POST['submit'])){
            $this->form_validation->set_rules('nim','NIM','trim|alpha_dash|min_length[4]|max_length[50]|xss_clean');        
            $this->form_validation->set_rules('nama','nama','trim|min_length[3]|max_length[50]|xss_clean');
            $this->form_validation->set_rules('email','email','trim|valid_email|xss_clean');
            if ($this->form_validation->run() == FALSE)
            {   
                redirect('data/form_cari');
            }else{
                $data2['nim']=$this->input->post('nim');                    
                $data2['nama']= strtoupper($this->input->post('nama'));                    
                $data2['email']=$this->input->post('email');                    
                $data2['tahun_lulus']=$this->input->post('tahun_lulus')."%";                    
                $data2['prodi']=$this->input->post('prodi');
                $data['dataprodi']=$this->m_prodi->getall();        
                $this->session->set_userdata("nim", $this->input->post('nim'));
                $this->session->set_userdata("nama", $this->input->post('nama'));
                $this->session->set_userdata("email", $this->input->post('email'));
                $this->session->set_userdata("tahun_lulus", $this->input->post('tahun_lulus'));
                $this->session->set_userdata("prodi", $this->input->post('prodi'));
            }
        }else{
            $data2['nim']=$this->session->userdata("nim");                    
            $data2['nama']= strtoupper($this->session->userdata("nama"));                    
            $data2['email']=$this->session->userdata("email");                    
            $data2['tahun_lulus']=$this->session->userdata("tahun_lulus")."%";                    
            $data2['prodi']=$this->session->userdata("prodi");
            $data['dataprodi']=$this->m_prodi->getall(); 
        }
        $data['datanya']=$this->m_alumni->getcari_public($data2, $config);
        $this->m_alumni->getcari_jum($data2);
        $data['dataprodi']=$this->m_prodi->getall();
        $config['total_rows']= $this->session->userdata('jumlah');
        $this->pagination->initialize($config);
        $data['datapengumuman_side']=$this->m_pengumuman->getpengumuman_side();     
        $this->load->view('pengunjung/v_data',$data);        
    }
}
?>