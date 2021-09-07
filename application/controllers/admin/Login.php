<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('admin/login');
		
	}
	public function masuk()
	{
		$email = $this->input->post('email');
		$pass = $this->input->post('password');
		$user = $this->db->get_where('admin', ['email' => $email])->row_array();

		if(password_verify($pass, $user['password'])){
			$this->session->set_userdata('email', $user);
			redirect(base_url('admin/manajemen'));
		}
		else
		{
			echo "<script>alert('mail atau password salah!')</script>";
			$this->load->view('admin/login');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('email');
		redirect(base_url('welcome/admin'));
	}

}