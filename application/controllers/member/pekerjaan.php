<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pekerjaan extends CI_Controller{

	function __construct(){
		parent::__construct();
        if($this->session->userdata('level')!='member'){ 
        	redirect('login');
        }
	}

	function index(){
		$username=$this->session->userdata('username');
		date_default_timezone_set('Asia/Jakarta');
		$data['tanggal']=date("Y-m-d");
		$data['datauser']=$this->m_user->getnama($username);
	    $data['title']='Pekerjaan';
        $config['base_url']=base_url()."member/pekerjaan/index";
        $config['total_rows']= $this->db->query("SELECT * FROM pekerjaan WHERE `nim`='".$username."';")->num_rows();
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
        $data['datapekerjaan']=$this->m_pekerjaan->getpekerjaan($username, $config);         
        $data['page']='member/v_pekerjaan';        
        $this->load->view('member/v_dashboard', $data);
	}

	

    function form_tambah(){
        $username=$this->session->userdata('username');
        date_default_timezone_set('Asia/Jakarta');
        $data['tanggal']=date("Y-m-d");
        $data['datauser']=$this->m_user->getnama($username);
        $data['dataprodi']=$this->m_prodi->getall();

        $data['provinsi']=$this->m_wilayah->get_all_provinsi();                
        $data['path'] = base_url('assets');

        $data['title']='Tambah Alumni';
        $data['page']='member/v_tambah_pekerjaan';          
        $this->load->view('member/v_dashboard', $data);

    }
        
    function add_ajax_kab($id_prov){
        $query = $this->db->get_where('wilayah_kabupaten',array('provinsi_id'=>$id_prov));
        $data = "<option value=''>- Select Kabupaten -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id."'>".$value->nama."</option>";
        }
        echo $data;
    }

	function tambah(){        
        $this->form_validation->set_rules('nama_kantor','nama_kantor','required|trim|min_length[4]|max_length[50]|xss_clean');  
        $this->form_validation->set_rules('pendapatan','pendapatan','required|trim|xss_clean');
        $this->form_validation->set_rules('sumber_info','sumber info','required|trim|xss_clean');
        $this->form_validation->set_rules('tgl_mulai','tanggal mulai','required|trim|xss_clean');        
        $this->form_validation->set_rules('tgl_akhir','tanggal akhir','trim|xss_clean');        
        $this->form_validation->set_rules('jabatan','jabatan','required|trim|xss_clean');      
        $this->form_validation->set_rules('no_telepon','Nomor Telepon','trim|required|min_length[11]|max_length[12]|numeric|xss_clean'); 
        $this->form_validation->set_rules('no_fax','Nomor Fax','trim|min_length[11]|max_length[12]|numeric|xss_clean');       
        $this->form_validation->set_rules('email','email','required|trim|valid_email|xss_clean');
        $this->form_validation->set_rules('website','website','trim|xss_clean');     
        $this->form_validation->set_rules('alamat','alamat','required|trim|xss_clean');    
        $this->form_validation->set_rules('propinsi','propinsi','required|trim|callback_cek_propinsi|xss_clean');    
        $this->form_validation->set_rules('kota','kabupaten/kota','required|trim|callback_cek_kabupaten|xss_clean');
        if ($this->input->post('bidang_pekerjaan')=="Lain-lain") {
            $this->form_validation->set_rules('bidang2','bidang pekerjaan','required|trim|min_length[4]|xss_clean');
        }
        if ($this->form_validation->run() == FALSE)
        {   
            $this->form_tambah();
        }else{        
            $data['nim']=$this->input->post('nim');
            $data['email']=$this->input->post('email');
            $data['website']=$this->input->post('website');
            $data['nama_kantor']=$this->input->post('nama_kantor');
            $data['jabatan']=$this->input->post('jabatan');
            $data['bidang_pekerjaan']=$this->input->post('bidang_pekerjaan');
            if ($this->input->post('bidang_pekerjaan')=="Lain-lain") {
                $data['bidang_pekerjaan']=$this->input->post('bidang2');
            }
            $data['jenis_pekerjaan']=$this->input->post('jenis_pekerjaan');
            $data['no_telepon']=$this->input->post('no_telepon');
            $data['no_fax']=$this->input->post('no_fax');          
            $data['tgl_mulai']=$this->input->post('tgl_mulai');
            $data['tgl_akhir']=$this->input->post('tgl_akhir');
            $data['pendapatan']=$this->input->post('pendapatan');
            $data['sumber_info']=$this->input->post('sumber_info');
            $data['alamat']=$this->input->post('alamat');

            $provinsi=$this->m_alumni->getpropinsi($this->input->post('propinsi'));            
            $data['propinsi']=$provinsi[0]->nama;
            $kota=$this->m_alumni->getkota($this->input->post('kota'));
            $data['kota']=$kota[0]->nama;
            $this->m_pekerjaan->tambah($data);
            $this->session->set_flashdata('msg_success','Alumni berhasil ditambahkan.');             
            $this->index();           
        }
	}

    function cek_propinsi($input){
        if($input=="0"){                
            $this->form_validation->set_message('cek_propinsi', 'Pilih propinsi asal!');
            return FALSE;
        }else{            
            return TRUE;
        }
    }

    function cek_kabupaten($input){
        if($input=="0"){                
            $this->form_validation->set_message('cek_kabupaten', 'Pilih kabupaten asal!');
            return FALSE;
        }else{            
            return TRUE;
        }
    }

    function detail(){
        $id=$this->uri->segment(4);
        $data['datapekerjaan']=$this->m_pekerjaan->getdetail($id);
        if ($data['datapekerjaan']) {
            $username=$this->session->userdata('username');
            date_default_timezone_set('Asia/Jakarta');
            $data['tanggal']=date("Y-m-d");
            $data['datauser']=$this->m_user->getnama($username);

            $data['provinsi']=$this->m_wilayah->get_all_provinsi();                
            $data['path'] = base_url('assets');

            if ($data['datapekerjaan'][0]->bidang_pekerjaan!="Kesehatan" AND $data['datapekerjaan'][0]->bidang_pekerjaan!="Industri" AND $data['datapekerjaan'][0]->bidang_pekerjaan!="Pendidikan") {
                $data['datapekerjaan'][0]->bidang2=$data['datapekerjaan'][0]->bidang_pekerjaan;
                $data['datapekerjaan'][0]->bidang_pekerjaan="Lain-lain";
            }
            
            $data['title']='Detail Pekerjaaan';                
            $data['page']='member/v_detail';        
            $this->load->view('member/v_dashboard', $data);
        }else{
            redirect("member/pekerjaan");
        }       
    }

    function edit(){        
            $id_pekerjaan=$this->input->post('id_pekerjaan');  
            $this->form_validation->set_rules('nama_kantor','nama_kantor','required|trim|min_length[4]|max_length[50]|xss_clean');  
            $this->form_validation->set_rules('pendapatan','pendapatan','required|trim|xss_clean');  
            $this->form_validation->set_rules('sumber_info','sumber info','required|trim|xss_clean');
            $this->form_validation->set_rules('tgl_mulai','tanggal mulai','required|trim|xss_clean');        
            $this->form_validation->set_rules('tgl_akhir','tanggal akhir','trim|xss_clean');        
            $this->form_validation->set_rules('jabatan','jabatan','required|trim|xss_clean');
            if ($this->input->post('bidang_pekerjaan')=="Lain-lain") {
                $this->form_validation->set_rules('bidang2','bidang pekerjaan','required|trim|min_length[4]|xss_clean');
            }
            if ($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('msg_error',validation_errors());
                redirect("member/pekerjaan/detail/$id_pekerjaan");
            }else{
                $data['nama_kantor']=$this->input->post('nama_kantor');
                $data['jabatan']=$this->input->post('jabatan');
                $data['bidang_pekerjaan']=$this->input->post('bidang_pekerjaan');
                if ($this->input->post('bidang_pekerjaan')=="Lain-lain") {
                    $data['bidang_pekerjaan']=$this->input->post('bidang2');
                }
                $data['jenis_pekerjaan']=$this->input->post('jenis_pekerjaan');        
                $data['tgl_mulai']=$this->input->post('tgl_mulai');
                $data['tgl_akhir']=$this->input->post('tgl_akhir');
                $data['pendapatan']=$this->input->post('pendapatan');
                $data['sumber_info']=$this->input->post('sumber_info');
                $this->m_pekerjaan->edit($id_pekerjaan, $data);
                $this->session->set_flashdata('msg_success','Data Alumni berhasil diubah.');
                redirect("member/pekerjaan/detail/$id_pekerjaan");
            }
    }

    function editkon(){
        $id_pekerjaan=$this->input->post('id_pekerjaan');
        $this->form_validation->set_rules('no_telepon','Nomor Telepon','trim|required|min_length[11]|max_length[12]|numeric|xss_clean'); 
        $this->form_validation->set_rules('no_fax','Nomor Fax','trim|min_length[11]|max_length[12]|numeric|xss_clean');       
        $this->form_validation->set_rules('email','email','required|trim|valid_email|xss_clean');
        $this->form_validation->set_rules('website','website','trim|xss_clean');     
        $this->form_validation->set_rules('alamat','alamat','required|trim|xss_clean'); 
        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('msg_error',validation_errors());
            redirect("member/pekerjaan/detail/$id_pekerjaan");
        }else{                    
            $data['no_telepon']=$this->input->post('no_telepon');
            $data['no_fax']=$this->input->post('no_fax');  
            $data['alamat']=$this->input->post('alamat');
            $data['email']=$this->input->post('email');
            $data['website']=$this->input->post('website');
            $this->m_pekerjaan->edit($id_pekerjaan, $data);
            $this->session->set_flashdata('msg_success','Data Pekerjaan berhasil diubah.');
            redirect("member/pekerjaan/detail/$id_pekerjaan");
        }
    }

    function editkota(){
        $id_pekerjaan=$this->input->post('id_pekerjaan');            
        $this->form_validation->set_rules('propinsi','propinsi','required|trim|callback_cek_propinsi|xss_clean');    
        $this->form_validation->set_rules('kota','kabupaten/kota','required|trim|callback_cek_kabupaten|xss_clean');
        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('msg_error',validation_errors());
            redirect("member/pekerjaan/detail/$id_pekerjaan");
        }else{                    
            $provinsi=$this->m_alumni->getpropinsi($this->input->post('propinsi'));            
            $data['propinsi']=$provinsi[0]->nama;
            $kota=$this->m_alumni->getkota($this->input->post('kota'));
            $data['kota']=$kota[0]->nama;
            $this->m_pekerjaan->edit($id_pekerjaan, $data);
            $this->session->set_flashdata('msg_success','Data Alumni berhasil diubah.');
            redirect("member/pekerjaan/detail/$id_pekerjaan");
        }
    }

    function hapus(){
        $id_pekerjaan=$this->input->post('id_pekerjaan');
        $this->session->set_flashdata('msg_success','Data Alumni telah dihapus.');
        $this->m_pekerjaan->hapuspekerjaan($id_pekerjaan);       
        redirect('member/pekerjaan');
    }
}
?>