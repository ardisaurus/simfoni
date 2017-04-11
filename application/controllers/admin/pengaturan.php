<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pengaturan extends CI_Controller{

	function __construct(){
		parent::__construct();
        if($this->session->userdata('level')!='admin'){ 
        	redirect('login');
        }
	}

	function index(){
		$username=$this->session->userdata('username');
		$data['datauser']=$this->m_user->getnama($username);        
        $data['userdetail']=$this->m_user->getuser($username);
        $data['admin_num']=$this->m_user->admin_num();		
        $data['title']='Pengaturan';
		$data['page']='admin/v_pengaturan';
        $this->load->view('admin/v_dashboard', $data);
	}

        function ubahusername(){        
        $this->form_validation->set_rules('usernamebaru','usernamebaru','required|trim||min_length[4]|max_length[50]|xss_clean');
        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','Nama harus diisi antara 4-50 karakter.');
            redirect('admin/pengaturan/index');
        }else{
            $usernamelama=$this->session->userdata('username');
            $usernamebaru=$this->input->post('usernamebaru');        
            $data['username']=$usernamebaru;        
            $cek=$this->m_user->cekusername($usernamebaru);
            if($cek->num_rows()>0){
                $this->session->set_flashdata('message','username telah digunakan pengguna lain.');
                redirect('admin/pengaturan/index');
            }else{            
                $this->m_user->ubahusername($usernamelama, $data);
                $this->session->set_userdata('username',$data['username']);        
                $this->session->set_flashdata('message','username berhasil diubah.');
                redirect('admin/pengaturan/index');    
            }
        }
    }

    function ubahNama(){        
        $this->form_validation->set_rules('nama','nama','required|trim|min_length[4]|max_length[50]|xss_clean');
        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','Nama harus diisi antara 4-50 karakter.');
            redirect('admin/pengaturan/index');
        }else{
            $username=$this->session->userdata('username');        
            $data['nama']=$this->input->post('nama');
            $this->m_user->ubahakun($username, $data);        
            $this->session->set_flashdata('message','Nama pengguna berhasil diubah.');
            redirect('admin/pengaturan/index');
        }
    }

    function ubahEmail(){        
        $this->form_validation->set_rules('email','email','required|trim|valid_email|xss_clean');
        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','Email harus diisi alamat email valid.');
            redirect('admin/pengaturan/index');
        }else{
            $username=$this->session->userdata('username');        
            $data['email']=$this->input->post('email');
            $this->m_user->ubahakun($username, $data);        
            $this->session->set_flashdata('message','Nama pengguna berhasil diubah.');
            redirect('admin/pengaturan/index');
        }
    }

    function ubahno_hp(){        
        $this->form_validation->set_rules('no_hp','Nomor HP','trim|required|min_length[11]|max_length[12]|numeric|xss_clean');
        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','Nomor HP harus diisi dengan kombinasi 11-12 angka.');
            redirect('admin/pengaturan/index');
        }else{
            $username=$this->session->userdata('username');        
            $data['no_hp']=$this->input->post('no_hp');
            $this->m_user->ubahakun($username, $data);        
            $this->session->set_flashdata('message','Nomor HP berhasil diubah.');
            redirect('admin/pengaturan/index');
        }
    }

    function ubahpassword(){
        $this->form_validation->set_rules('passwordlama','Password Lama','required|trim|xss_clean');
        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','Password harus diisi.');
            redirect('admin/pengaturan/index');
        }else{
            $username=$this->session->userdata('username');
            $password=$this->input->post('passwordlama');
            $cek=$this->m_user->cek($username, md5($password));
            if($cek->num_rows()>0){                      
                $this->form_validation->set_rules('passwordbaru','passwordbaru','required|trim|min_length[6]|max_length[12]|xss_clean');        
                $this->form_validation->set_rules('passwordbaru2','passwordbaru2','required|trim|xss_clean');
                if($this->form_validation->run()==false){
                    $this->session->set_flashdata('message','Password harus diisi dengan 6-12 Karakter.');
                    redirect('admin/pengaturan/index');
                }else{
                    $passwordbaru=$this->input->post('passwordbaru');            
                    $passwordbaru2=$this->input->post('passwordbaru2');
                        if ($passwordbaru==$passwordbaru2) {                                
                            $data['password']=md5($passwordbaru);
                            $this->m_user->ubahakun($username, $data);
                            $this->session->set_flashdata('message','Password berhasil diubah.');
                            redirect('admin/pengaturan/index');
                        }else{
                            $this->session->set_flashdata('message','Masukan password baru 2 kali dengan benar.');
                            redirect('admin/pengaturan/index');
                        }
                }
            }else{
                //login gagal
                $this->session->set_flashdata('message','Password anda salah.');
                redirect('admin/pengaturan/index');
            }
        }
    }  
        
    function hapus_akun(){
        $username=$this->session->userdata('username');               
        $this->m_user->hapusakun($username);
        $this->logout();
    }

    function logout(){
        $this->session->unset_userdata('username');        
        $this->session->unset_userdata('level');
        redirect('login');
    }
}
?>