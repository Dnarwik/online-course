<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_user','m_user');
        $this->load->model('M_pembayaran','m_pembayaran');
		$this->load->library('session');;
		$this->load->library('upload');
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('peserta/login');
		$this->load->view('template/footer');
	}
	//halaman pembayaran
	public function pembayaran()
	{
		if ($this->session->userdata('user_peserta') === null) {
			redirect(base_url('welcome/peserta'));
		}
		else{
			$this->load->view('template/header_peserta');
			$this->load->view('peserta/pembayaran');
			$this->load->view('template/footer');
		}
	}
	public function masuk()
	{
		$email = $this->input->post('email');
		$pass = $this->input->post('password');
		$user = $this->db->get_where('peserta', ['email' => $email])->row_array();
		if(password_verify($pass, $user['password'])){
			if ($user['aktif'] == 1) {
				$this->session->set_userdata('user_peserta', $user);
				redirect(base_url('peserta/kelas'));
			}
			elseif ($user['aktif'] == 0) {
				$this->session->set_userdata('user_peserta', $user);
				redirect(base_url('peserta/login/pembayaran'));
			}
		}
		else
		{
			echo "<script>alert('mail atau password salah!')</script>";
			$this->load->view('template/header');
			$this->load->view('peserta/login');
			$this->load->view('template/footer');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('user_peserta');
		redirect(base_url('welcome/peserta'));
	}
	//halaman daftar
	public function daftar(){
		$this->load->view('template/header');
		$this->load->view('peserta/daftar');
		$this->load->view('template/footer');
	}
	//Buat akun peserta
	public function buat_user(){
		$nama = $this->input->post('nama',TRUE);
        $email = $this->input->post('email',TRUE);
        $password = $this->input->post('password',TRUE);
        $password_konfirm = $this->input->post('password_konfirm',TRUE);
        if ($password == $password_konfirm) 
    	{
    		$options = ['cost' => 10];
			$pass = password_hash($password, PASSWORD_DEFAULT, $options);
			$this->m_user->insert_peserta($nama,$email,$pass,0);
	        echo "<script>alert('Akun Pengajar baru berhasil dibuat. Silahkan hubungi Admin terlebih dahulu untuk mengaktifkan akun!')</script>";
			$this->load->view('template/header');
			$this->load->view('peserta/login');
			$this->load->view('template/footer');
		}
		else
		{
			echo "<script>alert('Password dan konfirmasi password harus sama!')</script>";
			$this->load->view('template/header');
			$this->load->view('peserta/daftar');
			$this->load->view('template/footer');
		}
	}
	//insert pembayaran
	public function bayar(){
		if ($this->session->userdata('user_peserta') === null) {
			redirect(base_url('welcome/peserta'));
		}
		else{
			if(isset($_FILES["image"]["name"])){
	            $config['upload_path'] = './assets/images_bayar/';
	            $config['allowed_types'] = 'jpg|jpeg|png|gif';
	            $this->upload->initialize($config);
	            if(!$this->upload->do_upload('image')){
	                $this->upload->display_errors();
	                return FALSE;
	            }else{
	                $data = $this->upload->data();
	                //Compress Image
	                $config['image_library']='gd2';
	                $config['source_image']='./assets/images_bayar/'.$data['file_name'];
	                $config['create_thumb']= FALSE;
	                $config['maintain_ratio']= TRUE;
	                $config['quality']= '60%';
	                $config['width']= 800;
	                $config['height']= 800;
	                $config['new_image']= './assets/images_bayar/'.$data['file_name'];
	                $this->load->library('image_lib', $config);
	                $this->image_lib->resize();
	                $bukti_pembayaran = base_url().'assets/images_bayar/'.$data['file_name'];
	                $nominal = $this->input->post('nominal',TRUE);
	                $tgl_bayar = $this->input->post('tgl_bayar',TRUE);
	                $id_peserta = ($this->session->userdata('user_peserta'))['id'];
	                $this->m_pembayaran->insert_bayar($bukti_pembayaran,$nominal,$id_peserta,$tgl_bayar);
	                echo "<script>alert('Pembayaran berhasil diperbarui. Silahkan tunggu Admin untuk mengecek pembayaran Anda!')</script>";
	                $this->load->view('template/header_peserta');
					$this->load->view('peserta/pembayaran');
					$this->load->view('template/footer');
	            }
	        }
		}
    }
}