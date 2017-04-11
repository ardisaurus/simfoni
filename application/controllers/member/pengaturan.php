<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pengaturan extends CI_Controller{

	function __construct(){
		parent::__construct();
        if($this->session->userdata('level')!='member'){ 
        	redirect('login');
        }
	}

	function index(){
		$data['datauser']=$this->m_user->getnama();       
        $data['userdetail']=$this->m_user->getuser();
        $data['title']='Pengaturan';
		$data['page']='member/v_pengaturan';
        $this->load->view('member/v_dashboard', $data);
	}

    function ubahpassword(){
        $this->form_validation->set_rules('passwordlama','Password Lama','required|trim|xss_clean');
        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','Password harus diisi.');
            redirect('member/pengaturan/index');
        }else{
            $username=$this->session->userdata('username');
            $password=$this->input->post('passwordlama');
            $cek=$this->m_user->cek($username, md5($password));
            if($cek->num_rows()>0){                      
                $this->form_validation->set_rules('passwordbaru','passwordbaru','required|trim|min_length[6]|max_length[12]|xss_clean');        
                $this->form_validation->set_rules('passwordbaru2','passwordbaru2','required|trim|xss_clean');
                if($this->form_validation->run()==false){
                    $this->session->set_flashdata('message','Password harus diisi dengan 6-12 Karakter.');
                    redirect('member/pengaturan/index');
                }else{
                    $passwordbaru=$this->input->post('passwordbaru');            
                    $passwordbaru2=$this->input->post('passwordbaru2');
                        if ($passwordbaru==$passwordbaru2) {                                
                            $data['password']=md5($passwordbaru);
                            $this->m_user->ubahakun($username, $data);
                            $this->session->set_flashdata('message','Password berhasil diubah.');
                            redirect('member/pengaturan/index');
                        }else{
                            $this->session->set_flashdata('message','Masukan password baru 2 kali dengan benar.');
                            redirect('member/pengaturan/index');
                        }
                }
            }else{
                //login gagal
                $this->session->set_flashdata('message','Password anda salah.');
                redirect('member/pengaturan/index');
            }
        }
    } 

	function logout(){
        $this->session->unset_userdata('username');        
        $this->session->unset_userdata('level');
        redirect('login');
    }
}
?>