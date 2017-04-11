<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pratinjau extends CI_Controller{

	function __construct(){
		parent::__construct();
        if($this->session->userdata('level')!='member'){ 
        	redirect('login');
        }
	}

	function index(){
		$username=$this->session->userdata('username');
		$data['datauser']=$this->m_user->getnama($username);
	    $id=$username;
	    $data['dataalumni']=$this->m_alumni->getdetail($id);
	    if ($data['dataalumni']) {
	        $email=$this->session->userdata('email');
	        date_default_timezone_set('Asia/Jakarta');
	        $data['tanggal']=date("Y-m-d");
	        $data['datauser']=$this->m_user->getnama($email);
	        $data['dataprodi']=$this->m_prodi->getall();

	        $data['provinsi']=$this->m_wilayah->get_all_provinsi();                
	        $data['path'] = base_url('assets');


            $data['datapekerjaan']=$this->m_pekerjaan->getlast($id);
	         
	        $data['title']='Pratinjau';                
	        $data['page']='member/v_pratinjau';        
	        $this->load->view('member/v_dashboard', $data);
	    }else{
	        redirect("login");
	    }
	}

	function editkon(){
        $nim=$this->input->post('nim');
        $this->form_validation->set_rules('no_hp','Nomor HP','trim|required|min_length[11]|max_length[12]|numeric|xss_clean');        
        $this->form_validation->set_rules('email','email','required|trim|valid_email|xss_clean');
        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('msg_error',validation_errors());
            redirect("admin/alumni/detail/$nim");
        }else{                    
            $data['no_hp']=$this->input->post('no_hp');                    
            $data['email']=$this->input->post('email');
            $this->m_alumni->edituser($nim, $data);
            $this->session->set_flashdata('msg_success','Data Alumni berhasil diubah.');
            redirect("admin/alumni/detail/$nim");
        }
    }

    function editalamat(){
        $nim=$this->input->post('nim');
        $this->form_validation->set_rules('alamat','alamat','required|trim|xss_clean');    
        $this->form_validation->set_rules('rt','RT','required|trim|max_length[3]|numeric|xss_clean');    
        $this->form_validation->set_rules('rw','RW','required|trim|max_length[3]|numeric|xss_clean');     
        $this->form_validation->set_rules('kelurahan','kelurahan','required|trim|xss_clean');     
        $this->form_validation->set_rules('kecamatan','kecamatan','required|trim|xss_clean'); 
        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('msg_error',validation_errors());
            redirect("admin/alumni/detail/$nim");
        }else{                    
            $data['alamat']=$this->input->post('alamat');
            $data['rt']=$this->input->post('rt');
            $data['rw']=$this->input->post('rw');
            $data['kecamatan']=$this->input->post('kecamatan');
            $data['kelurahan']=$this->input->post('kelurahan');
            $this->m_alumni->edit($nim, $data);
            $this->session->set_flashdata('msg_success','Data Alumni berhasil diubah.');
            redirect("admin/alumni/detail/$nim");
        }
    }

    function editkota(){
        $nim=$this->input->post('nim');            
        $this->form_validation->set_rules('propinsi','propinsi','required|trim|callback_cek_propinsi|xss_clean');    
        $this->form_validation->set_rules('kota','kabupaten/kota','required|trim|callback_cek_kabupaten|xss_clean');
        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('msg_error',validation_errors());
            redirect("admin/alumni/detail/$nim");
        }else{                    
            $provinsi=$this->m_alumni->getpropinsi($this->input->post('propinsi'));            
            $data['propinsi']=$provinsi[0]->nama;
            $kota=$this->m_alumni->getkota($this->input->post('kota'));
            $data['kota']=$kota[0]->nama;
            $this->m_alumni->edit($nim, $data);
            $this->session->set_flashdata('msg_success','Data Alumni berhasil diubah.');
            redirect("admin/alumni/detail/$nim");
        }
    }
        
    function add_ajax_kab($id_prov){
        $query = $this->db->get_where('wilayah_kabupaten',array('provinsi_id'=>$id_prov));
        $data = "<option value=''>- Select Kabupaten -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id."'>".$value->nama."</option>";
        }
        echo $data;
    }
}
?>