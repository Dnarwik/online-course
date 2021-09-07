<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_kelas','m_kelas');
		$this->load->library('session');
	}
	public function index()
	{
		$data["kelas"] = $this->m_kelas->get_all();
		$data["pengajar"] = $this->db->get('pengajar')->result();
		$this->load->view('template/header');
        $this->load->view('index', $data);
        $this->load->view('template/footer');
	}
	public function kelas()
	{
		$data["kelas"] = $this->m_kelas->get_all();
		$data["pengajar"] = $this->db->get('pengajar')->result();
		$this->load->view('template/header');
        $this->load->view('kelas', $data);
        $this->load->view('template/footer');
	}
	public function tentang()
	{
		$this->load->view('template/header');
        $this->load->view('tentang');
        $this->load->view('template/footer');
	}
	public function kontak()
	{
		$this->load->view('template/header');
        $this->load->view('kontak');
        $this->load->view('template/footer');
	}
	public function template_web()
	{
		$this->load->view('template/header');
        $this->load->view('template_web');
        $this->load->view('template/footer');
	}
	public function admin()
	{
        $this->load->view('admin/login');
	}
	public function peserta()
	{
        redirect(base_url('peserta/login'));
	}
	public function pengajar()
	{
        redirect(base_url('pengajar/login'));
	}
}
