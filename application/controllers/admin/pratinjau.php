<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pratinjau extends CI_Controller{

	function __construct(){
		parent::__construct();
        if($this->session->userdata('level')!='admin'){ 
        	redirect('login');
        }
	}

	function index(){
	$username=$this->session->userdata('username');
	$data['datauser']=$this->m_user->getnama($username);
    $data['title']='Pratinjau';


    $data['total_alumni']=$this->db->query("SELECT * FROM alumni;")->num_rows();
    $data['total_prodi']=$this->db->query("SELECT * FROM prodi;")->num_rows();
    $data['total_bekerja']=$this->db->query("SELECT DISTINCT nim FROM pekerjaan;")->num_rows();
    $data['belum_bekerja']=$data['total_alumni']-$data['total_bekerja'];

    $data['total_pns']=$this->db->query("SELECT DISTINCT nim FROM pekerjaan WHERE jenis_pekerjaan='PNS'")->num_rows();
    $data['total_swasta']=$this->db->query("SELECT DISTINCT nim FROM pekerjaan WHERE jenis_pekerjaan='Swasta'")->num_rows();
    $data['total_rs']=$this->db->query("SELECT DISTINCT nim FROM pekerjaan WHERE jenis_pekerjaan='Rumah Sakit'")->num_rows();
    $data['total_bps']=$this->db->query("SELECT DISTINCT nim FROM pekerjaan WHERE jenis_pekerjaan='BPS Mandiri'")->num_rows();
    $data['total_kuliah']=$this->db->query("SELECT DISTINCT nim FROM pekerjaan WHERE jenis_pekerjaan='Melanjutkan Kuliah'")->num_rows();

    $data['total_kesehatan']=$this->db->query("SELECT DISTINCT nim FROM pekerjaan WHERE bidang_pekerjaan='Kesehatan'")->num_rows();
    $data['total_industri']=$this->db->query("SELECT DISTINCT nim FROM pekerjaan WHERE bidang_pekerjaan='Industri'")->num_rows();
    $data['total_pendidikan']=$this->db->query("SELECT DISTINCT nim FROM pekerjaan WHERE bidang_pekerjaan='Pendidikan'")->num_rows();
    $data['masa']=$this->m_pekerjaan->getmasa();
	$data['page']='admin/v_pratinjau';      
    $this->load->view('admin/v_dashboard', $data);
	}

    function perbandingan_kesehatan(){
    $username=$this->session->userdata('username');
        date_default_timezone_set('Asia/Jakarta');
        $data['tanggal']=date("Y-m-d");
        $data['datauser']=$this->m_user->getnama($username);
        $data['title']='Perbandingan Bidang Kesehatan';
        $data['datakes']=$this->m_pekerjaan->getkesehatan();
        $data['datatahun']=$this->m_pekerjaan->gettahun_kes();        
        $data['page']='admin/v_perbandingan';         
        $this->load->view('admin/v_dashboard', $data);
    }

    function perbandingan_industri(){
    $username=$this->session->userdata('username');
        date_default_timezone_set('Asia/Jakarta');
        $data['tanggal']=date("Y-m-d");
        $data['datauser']=$this->m_user->getnama($username);
        $data['title']='Perbandingan Bidang Industri';
        $data['datakes']=$this->m_pekerjaan->getindustri();
        $data['datatahun']=$this->m_pekerjaan->gettahun_in();        
        $data['page']='admin/v_perbandingan';         
        $this->load->view('admin/v_dashboard', $data);
    }

    function perbandingan_pendidikan(){
    $username=$this->session->userdata('username');
        date_default_timezone_set('Asia/Jakarta');
        $data['tanggal']=date("Y-m-d");
        $data['datauser']=$this->m_user->getnama($username);
        $data['title']='Perbandingan Bidang Pendidikan';
        $data['datakes']=$this->m_pekerjaan->getpendidikan();
        $data['datatahun']=$this->m_pekerjaan->gettahun_pen();        
        $data['page']='admin/v_perbandingan';         
        $this->load->view('admin/v_dashboard', $data);
    }

    function perbandingan_masa_ideal(){
    $username=$this->session->userdata('username');
        date_default_timezone_set('Asia/Jakarta');
        $data['tanggal']=date("Y-m-d");
        $data['datauser']=$this->m_user->getnama($username);
        $data['title']='Perbandingan Masa Tunggu Ideal';
        $data['datakes']=$this->m_pekerjaan->getmasa_ideal();
        $data['datatahun']=$this->m_pekerjaan->gettahun_masa_ideal();        
        $data['page']='admin/v_perbandingan_masa';         
        $this->load->view('admin/v_dashboard', $data);
    }

    function perbandingan_masa_nonideal(){
    $username=$this->session->userdata('username');
        date_default_timezone_set('Asia/Jakarta');
        $data['tanggal']=date("Y-m-d");
        $data['datauser']=$this->m_user->getnama($username);
        $data['title']='Perbandingan Masa Tunggu Non-Ideal';
        $data['datakes']=$this->m_pekerjaan->getmasa_ideal();
        $data['datatahun']=$this->m_pekerjaan->gettahun_masa_ideal();        
        $data['page']='admin/v_perbandingan_masa2';         
        $this->load->view('admin/v_dashboard', $data);
    }

    function perbandingan_status(){
    $username=$this->session->userdata('username');
        date_default_timezone_set('Asia/Jakarta');
        $data['tanggal']=date("Y-m-d");
        $data['datauser']=$this->m_user->getnama($username);
        $data['title']='Perbandingan Status Kerja';
        $data['datakerja']=$this->m_pekerjaan->getstatus();
        $data['dataalumni']=$this->m_alumni->gettahun_alumni();
        $data['datatahun']=$this->m_pekerjaan->gettahun_status();        
        $data['page']='admin/v_perbandingan_status';         
        $this->load->view('admin/v_dashboard', $data);
    }

    function perbandingan_jenis(){
    $username=$this->session->userdata('username');
        date_default_timezone_set('Asia/Jakarta');
        $data['tanggal']=date("Y-m-d");
        $data['datauser']=$this->m_user->getnama($username);
        $data['title']='Perbandingan Jenis Pekerjaan';
        $data['datakerja']=$this->m_pekerjaan->getjenis();
        $data['datatahun']=$this->m_pekerjaan->gettahun_jenis();        
        $data['page']='admin/v_perbandingan_jenis';         
        $this->load->view('admin/v_dashboard', $data);
    }
}
?>