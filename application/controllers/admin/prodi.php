<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Prodi extends CI_Controller{

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
	    $data['title']='Prodi';

        $config['base_url']=base_url()."admin/prodi/index";
        $config['total_rows']= $this->db->query("SELECT * FROM prodi;")->num_rows();
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

		$data['dataprodi']=$this->m_prodi->getprodi($config);        
		$data['page']='admin/v_prodi';	       
	    $this->load->view('admin/v_dashboard', $data);
	}

	function tambah(){
		$this->form_validation->set_rules('kode', 'Kode', 'trim|required|callback_cek_kode|min_length[4]|alpha_dash|xss_clean');
        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'trim|required|min_length[4]|xss_clean');
        if ($this->form_validation->run() == FALSE)
        {
            $this->index();
        }else{                    
            $data['kode']=$this->input->post('kode');
            $data['nama_prodi']=$this->input->post('nama_prodi');
            $this->m_prodi->tambah($data);
            $this->session->set_flashdata('msg_success','Program Didik berhasil ditambahkan.');
            redirect('admin/prodi');           
        }
	}

	function edit(){        
        	$kode=$this->input->post('kode');                   
            $kodebaru=$this->input->post('kode_baru');
            if ($kode==$kodebaru) {
                $this->form_validation->set_rules('kode_baru', 'Kode Baru', 'trim|required|min_length[4]|alpha_dash|xss_clean');
                $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'trim|required|min_length[4]|xss_clean');
                if ($this->form_validation->run() == FALSE)
                {
                    $this->index();
                }else{
                    $data['nama_prodi']=$this->input->post('nama_prodi');
                    $this->m_prodi->edit($kode, $data);
                    $this->session->set_flashdata('msg_success','Prodi berhasil diubah.');
                    redirect('admin/prodi');
                }
            }else{
                $this->form_validation->set_rules('kode_baru', 'Kode Baru', 'trim|required|callback_cek_kode|min_length[4]|alpha_dash|xss_clean');
                $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'trim|required|min_length[4]|xss_clean');
                if ($this->form_validation->run() == FALSE)
                {
                    $this->index();
                }else{
                    $data['kode']=$this->input->post('kode_baru');
                    $data['nama_prodi']=$this->input->post('nama_prodi');
                    $this->m_prodi->edit($kode, $data);
                    $this->session->set_flashdata('msg_success','Prodi berhasil diubah.');
                    redirect('admin/prodi');
                }
            }
	}

	function hapus(){
		$kode=$this->input->post('kode');
		$this->session->set_flashdata('msg_success','Prodi telah dihapus.');
		$this->m_prodi->hapusprodi($kode);		
		redirect('admin/prodi');
	}

    function cek_kode($input){
        $cek=$this->m_prodi->cekKode($input);
            if($cek->num_rows()>0){                
                $this->form_validation->set_message('cek_kode', '%s telah digunakan oleh prodi lain!');            
                return FALSE;
            }else{            
                return TRUE;
            }
    }
}
?>