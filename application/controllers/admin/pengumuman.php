<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pengumuman extends CI_Controller{

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
	    $data['title']='Pengumuman';

        $config['base_url']=base_url()."admin/pengumuman/index";
        $config['total_rows']= $this->db->query("SELECT * FROM pengumuman;")->num_rows();
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

		$data['datapengumuman']=$this->m_pengumuman->getpengumuman($config);        
		$data['page']='admin/v_pengumuman';	       
	    $this->load->view('admin/v_dashboard', $data);
	}

	function tambah(){
		$this->form_validation->set_rules('judul', 'Judul', 'trim|required|min_length[4]|xss_clean');
        $this->form_validation->set_rules('isi', 'Isi', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE)
        {
            $this->index();
        }else{
        	$data['tgl_pengumuman']=date("Y-m-d");                    
            $data['judul_pengumuman']=$this->input->post('judul');
            $data['isi_pengumuman']=$this->input->post('isi');
            $this->m_pengumuman->tambah($data);
            $this->session->set_flashdata('msg_success','Pengumuman berhasil ditambahkan.');
            redirect('admin/pengumuman');           
        }
	}

	function edit(){
		$this->form_validation->set_rules('judul', 'Judul', 'trim|required|min_length[4]|xss_clean');
        $this->form_validation->set_rules('isi', 'Isi', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE)
        {
            $this->index();
        }else{
        	$id_pengumuman=$this->input->post('id_pengumuman');
        	$data['tgl_pengumuman']=$this->input->post('tgl');                    
            $data['judul_pengumuman']=$this->input->post('judul');
            $data['isi_pengumuman']=$this->input->post('isi');
            $this->m_pengumuman->edit($id_pengumuman, $data);
            $this->session->set_flashdata('msg_success','Pengumuman berhasil diubah.');
            redirect('admin/pengumuman');           
        }
	}

	function hapus(){
		$id_pengumuman=$this->input->post('id_pengumuman');
		$judul=$this->m_pengumuman->getjudul($id_pengumuman);
		$this->session->set_flashdata('msg_success','Pengumuman '.$judul.' telah dihapus.');
		$this->m_pengumuman->hapuspengumuman($id_pengumuman);		
		redirect('admin/pengumuman');
	}
}
?>