<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_materi','m_materi');
        $this->load->model('M_kelas','m_kelas');
        $this->load->model('M_progress','m_progress');
        $this->load->model('M_user','m_user');
        $this->load->model('M_pembayaran','m_pembayaran');
		$this->load->library('session');
		$this->load->library('upload');
		if ($this->session->userdata('user_peserta') === null || ($this->session->userdata('user_peserta'))['aktif'] == 0) {
            redirect(base_url('welcome/peserta'));
        }
	}
	public function index()
	{
		$data["kelas"] = $this->m_kelas->get_all();
		$data["pengajar"] = $this->db->get('pengajar')->result();
		$this->load->view('template/header_peserta');
		$this->load->view('peserta/index', $data);
		$this->load->view('template/footer');
	}
	//halaman kelola akun
    public function akun_peserta(){
        $akun = $this->session->userdata('user_peserta');
        $data['akun'] = $akun;
        $this->load->view('template/header_peserta');
        $this->load->view('peserta/edit_akun',$data);
        $this->load->view('template/footer');
    }
	public function detail_kelas($id=null){
		if (!isset($id)) show_404();
		$user = $this->session->userdata('user_peserta');
        $progress = $this->m_progress->get_progress_by_id_peserta_dan_id_kelas($user['id'],$id);
        if (($progress)==null) {
        	$this->m_progress->insert_progress($id, $user['id'], 1);
        	$progress = $this->m_progress->get_progress_by_id_peserta_dan_id_kelas($user['id'],$id);
        }
		$data["progress"] = $progress;
		$data["kelas"] = $this->m_kelas->get_kelas_by_id($id)->row_array();
		$data["materi"] = $this->m_materi->get_materi_by_id_kelas($id);
		//Sorting materi berdasarkan step
		usort($data["materi"], function($a, $b) {
		    return strcmp($a->step, $b->step);
		});
		$this->load->view('template/header_peserta');
		$this->load->view('peserta/detail_kelas', $data);
		$this->load->view('template/footer');
	}
	public function tampil_materi($jumlah_materi=null,$id=null,$progress=null){
		if (!isset($id)) show_404();
		else if (!isset($progress)) show_404();
		else if (!isset($jumlah_materi)) show_404();
		$user = $this->session->userdata('user_peserta');
		$materi = $this->m_materi->get_materi_by_id($id)->row_array();
		//Untuk materi sebelum dan sesudah
		$materi_sebelum = null;
		$materi_sesudah = null;
		if (($materi['step']-1)>=1) {
			$materi_sebelum = $this->m_materi->get_materi_by_id_kelas_dan_step($materi['id_kelas'], ($materi['step']-1));
		}
		if (($materi['step']+1)<=$jumlah_materi) {
			$materi_sesudah = $this->m_materi->get_materi_by_id_kelas_dan_step($materi['id_kelas'], ($materi['step']+1));
		}
		$data['materi_sebelum'] = $materi_sebelum;
		$data['materi_sesudah'] = $materi_sesudah;
		$data['jumlah_materi'] = $jumlah_materi;
		//Menambah progress peserta
		$step = $this->m_progress->get_progress_by_id_peserta_dan_id_kelas($user['id'],$materi['id_kelas']);
		if ($progress==$step[0]->step) {
			$progress++;
			$this->m_progress->update_step($progress,$step[0]->id);
		}
        $data['materi'] = $materi;
        $this->load->view('template/header_peserta');
        $this->load->view('peserta/materi', $data);
        $this->load->view('template/footer');
	}
	//update akun
    public function edit_akun($id=null){
        if (!isset($id)) show_404();
        $nama = $this->input->post('nama',TRUE);
        $email = $this->input->post('email',TRUE);
        $password_lama = $this->input->post('password_lama',TRUE);
        $password_baru = $this->input->post('password_baru',TRUE);
        $password_konfirm = $this->input->post('password_konfirm',TRUE);
        $akun = $this->m_user->get_peserta_by_id($id)->row_array();
        $this->m_user->update_peserta($id,$email,$nama,$akun['aktif']);
        if ($password_lama && $password_konfirm && $password_baru != "") {
            $options = ['cost' => 10];
            if (password_verify($password_lama, $akun['password'])) {
                if ($password_baru == $password_konfirm) 
                {
                    $pass_baru = password_hash($password_baru, PASSWORD_DEFAULT, $options);
                    $this->m_user->update_peserta_pass($id,$pass_baru);
                    echo "<script>alert('Password berhasil diperbarui!')</script>";
                    $akun = $this->m_user->get_peserta_by_id($id)->row_array();
                    $this->session->set_userdata('user_peserta', $akun);
                    $data["kelas"] = $this->m_kelas->get_all();
					$data["pengajar"] = $this->db->get('pengajar')->result();
					$this->load->view('template/header_peserta');
					$this->load->view('peserta/index', $data);
					$this->load->view('template/footer');
                }
                else
                {
                    echo "<script>alert('Password baru dan konfirmasi password harus sama!')</script>";
                    $akun = $this->session->userdata('user_peserta');
			        $data['akun'] = $akun;
			        $this->load->view('template/header_peserta');
			        $this->load->view('peserta/edit_akun',$data);
			        $this->load->view('template/footer');
                }
            }
            else
            {
                echo "<script>alert('Password lama salah!')</script>";
                    $akun = $this->session->userdata('user_peserta');
			        $data['akun'] = $akun;
			        $this->load->view('template/header_peserta');
			        $this->load->view('peserta/edit_akun',$data);
			        $this->load->view('template/footer');
            }
        }
        else{
        	echo "<script>alert('Akun berhasil diedit!')</script>";
            $akun = $this->m_user->get_peserta_by_id($id)->row_array();
            $this->session->set_userdata('user_peserta', $akun);
            $data["kelas"] = $this->m_kelas->get_all();
			$data["pengajar"] = $this->db->get('pengajar')->result();
			$this->load->view('template/header_peserta');
			$this->load->view('peserta/index', $data);
			$this->load->view('template/footer');
        }
    }
  
}