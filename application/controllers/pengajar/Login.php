<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_user','m_user');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('pengajar/login');
		$this->load->view('template/footer');
	}
	public function masuk()
	{
		$email = $this->input->post('email');
		$pass = $this->input->post('password');
		$user = $this->db->get_where('pengajar', ['email' => $email])->row_array();
		if(password_verify($pass, $user['password']) && $user['aktif'] == 1){
			$this->session->set_userdata('user', $user);
			redirect(base_url('pengajar/kelola_kelas'));
		}
		else
		{
			echo "<script>alert('mail atau password salah!')</script>";
			$this->load->view('template/header');
			$this->load->view('pengajar/login');
			$this->load->view('template/footer');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('user');
		redirect(base_url('welcome/pengajar'));
	}
	//halaman daftar
	public function daftar(){
		$this->load->view('template/header');
		$this->load->view('pengajar/daftar');
		$this->load->view('template/footer');
	}
	public function buat_user(){
		$nama = $this->input->post('nama',TRUE);
        $email = $this->input->post('email',TRUE);
        $password = $this->input->post('password',TRUE);
        $password_konfirm = $this->input->post('password_konfirm',TRUE);
        if ($password == $password_konfirm) 
    	{
    		$options = ['cost' => 10];
			$pass = password_hash($password, PASSWORD_DEFAULT, $options);
			$this->m_user->insert_pengajar($nama,$email,$pass,0);
	        echo "<script>alert('Akun Pengajar baru berhasil dibuat. Silahkan hubungi Admin terlebih dahulu untuk mengaktifkan akun!')</script>";
			$this->load->view('template/header');
			$this->load->view('pengajar/login');
			$this->load->view('template/footer');
		}
		else
		{
			echo "<script>alert('Password dan konfirmasi password harus sama!')</script>";
			$this->load->view('template/header');
			$this->load->view('pengajar/daftar');
			$this->load->view('template/footer');
		}
	}
}