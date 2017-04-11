<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pengurus extends CI_Controller{

	function __construct(){
		parent::__construct();
        if($this->session->userdata('level')!='admin'){ 
        	redirect('login');
        }
	}

	function index(){
		$username=$this->session->userdata('username');
		date_default_timezone_set('Asia/Jakarta');
		$data['tanggal']=date("Y-m-d");
		$data['datauser']=$this->m_user->getnama($username);
	    $data['title']='Pengurus';

        $config['base_url']=base_url()."admin/pengurus/index";
        $config['total_rows']= $this->db->query("SELECT * FROM user WHERE `level`='admin';")->num_rows();
        $config['per_page']=10;
        $config['num_links']=3;
        $config['uri_segment']=4;
        $config['next_tag_open'] = '<li>'; $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>'; $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="bg-orange">'; $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>'; $config['num_tag_close'] = '</li>';
        $config['first_link']='< Pertama';
        $config['last_link']='Terakhir >';
        $config['next_link']='>';
        $config['prev_link']='<';
        $this->pagination->initialize($config);

		$data['datapengurus']=$this->m_pengurus->getpengurus($config);        
		$data['page']='admin/v_pengurus';	       
	    $this->load->view('admin/v_dashboard', $data);
	}

	function tambah(){
		$this->form_validation->set_rules('username','username','required|trim||callback_cek_username|alpha_dash|min_length[4]|max_length[50]|xss_clean');        
        $this->form_validation->set_rules('nama','nama','required|trim|min_length[4]|max_length[50]|xss_clean');                             
        $this->form_validation->set_rules('password','password','required|trim|min_length[6]|max_length[12]|xss_clean');        
        $this->form_validation->set_rules('password2','password konfirmasi','required|trim|matches[password]|xss_clean');
        $this->form_validation->set_rules('no_hp','Nomor HP','trim|required|min_length[11]|max_length[12]|numeric|xss_clean');        
        $this->form_validation->set_rules('email','email','required|trim|valid_email|xss_clean');
        if ($this->form_validation->run() == FALSE)
        {
            $this->index();
        }else{                    
            $data['username']=$this->input->post('username');                    
            $data['nama']=$this->input->post('nama');                    
            $data['password']=md5($this->input->post('password'));
            $data['level']="admin";                    
            $data['no_hp']=$this->input->post('no_hp');                    
            $data['email']=$this->input->post('email');
            $this->m_pengurus->tambah($data);
            $this->session->set_flashdata('msg_success','Pengurus berhasil ditambahkan.');
            redirect('admin/pengurus');           
        }
	}

    function cek_username($input){
        $cek=$this->m_pengurus->cekusername($input);
            if($cek->num_rows()>0){                
                $this->form_validation->set_message('cek_username', 'Username telah digunakan oleh pengguna lain!');            
                return FALSE;
            }else{            
                return TRUE;
            }
    }
}
?>