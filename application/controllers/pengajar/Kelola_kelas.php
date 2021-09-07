<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_kelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_materi','m_materi');
        $this->load->model('M_kelas','m_kelas');
        $this->load->model('M_user','m_user');
        $this->load->library('upload');
        if ($this->session->userdata('user') === null) {
            redirect(base_url('welcome/pengajar'));
        }
	}
	public function index()
	{
        $user = $this->session->userdata('user');
        $this->load->view('template/header_pengajar');
        $this->load->view('pengajar/index', $user);
        $this->load->view('template/footer');  	
	}

    //halaman kelas
	public function k_kelas(){
        $user = $this->session->userdata('user');
        $data["kelas"] = $this->m_kelas->get_all();
		$this->load->view('template/header_pengajar');
		$this->load->view('pengajar/kelas', $data);
		$this->load->view('template/footer');
	}

    //halaman edit kelas
    public function k_kelas_edit($id=null){
        if (!isset($id)) show_404();
        $data['id_kelas'] = $id;
        $data["kelas"] = $this->m_kelas->get_kelas_by_id($id)->row_array();
        $this->load->view('template/header_pengajar');
        $this->load->view('pengajar/kelas_edit',$data);
        $this->load->view('template/footer');
    }

    //halaman materi
	public function k_materi_buat(){
        $user = $this->session->userdata('user');
        $data["kelas"] = $this->m_kelas->get_kelas_by_id_pengajar($user['id']);
        $data["materi"] = $this->m_materi->get_materi_by_id_pengajar($user['id']);
        usort($data["materi"], function($a, $b) {
            return strcmp($a->id_kelas, $b->id_kelas);
        });
		$this->load->view('pengajar/materi', $data);
	}

    //halaman edit materi
	public function k_materi_edit($id=null){
        if (!isset($id)) show_404();
        $data['id_materi'] = $id;
        $data["kelas"] = $this->m_kelas->get_all();
        $data["materi"] = $this->m_materi->get_materi_by_id($id)->row_array();
        $data["user"] = $this->session->userdata('user');
		$this->load->view('pengajar/materi_edit', $data);
	}

    //halaman kelola akun
    public function akun_pengajar(){
        $akun = $this->session->userdata('user');
        $data['akun'] = $akun;
        $this->load->view('template/header_pengajar');
        $this->load->view('pengajar/edit_akun',$data);
        $this->load->view('template/footer');
    }

    //insert materi
	public function buat_materi(){
        $user = $this->session->userdata('user');
        $judul_materi = $this->input->post('judul_materi',TRUE);
        $isi_materi = $this->input->post('isi_materi',TRUE);
        $id_kelas = $this->input->post('id_kelas',TRUE);
        $step = $this->input->post('step',TRUE);
        $this->m_materi->insert_materi($user['id'],$id_kelas,$judul_materi,$isi_materi,$step);
        redirect(base_url('pengajar/Kelola_kelas/k_materi_buat'));
    }

    //update materi
    public function edit_materi($id=null){
        if (!isset($id)) show_404();
        $id_kelas = $this->input->post('id_kelas',TRUE);
        $judul_materi = $this->input->post('judul_materi',TRUE);
        $isi_materi = $this->input->post('isi_materi',TRUE);
        $step = $this->input->post('step',TRUE);
        $this->m_materi->update_materi($id,$id_kelas,$judul_materi,$isi_materi,$step);
        redirect(base_url('pengajar/Kelola_kelas/k_materi_buat'));
    }
 
    //delete materi
    public function hapus_materi($id=null){
        if (!isset($id)) show_404();
        $this->m_materi->delete($id);
        redirect(base_url('pengajar/Kelola_kelas/k_materi_buat'));
    }

    //Upload image summernote
    public function upload_image(){
        if(isset($_FILES["image"]["name"])){
            $config['upload_path'] = './assets/images_materi/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('image')){
                $this->upload->display_errors();
                return FALSE;
            }else{
                $data = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images_materi/'.$data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '60%';
                $config['width']= 800;
                $config['height']= 800;
                $config['new_image']= './assets/images_materi/'.$data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url().'assets/images_materi/'.$data['file_name'];
            }
        }
    }
 
    //Delete image summernote
    public function delete_image(){
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if(unlink($file_name))
        {
            echo 'File Delete Successfully';
        }
    }

    //Insert Kelas
    public function buat_kelas(){
        $user = $this->session->userdata('user');
        $nama_kelas = $this->input->post('nama_kelas',TRUE);
        $deskripsi = $this->input->post('deskripsi',TRUE);
        $this->m_kelas->insert_kelas($user['id'],$nama_kelas,$deskripsi);
        redirect(base_url('pengajar/Kelola_kelas/k_kelas'));
    }

    //Update Kelas
    public function edit_kelas($id=null){
        if (!isset($id)) show_404();
        $nama_kelas = $this->input->post('nama_kelas',TRUE);
        $deskripsi = $this->input->post('deskripsi',TRUE);
        $this->m_kelas->update_kelas($id,$nama_kelas,$deskripsi);
        redirect(base_url('pengajar/Kelola_kelas/k_kelas'));
    }

    //delete kelas
    public function hapus_kelas($id=null){
        if (!isset($id)) show_404();
        $this->m_kelas->delete($id);
        redirect(base_url('pengajar/Kelola_kelas/k_kelas'));
    }

    //update akun
    public function edit_akun($id=null){
        if (!isset($id)) show_404();
        $nama = $this->input->post('nama',TRUE);
        $email = $this->input->post('email',TRUE);
        $password_lama = $this->input->post('password_lama',TRUE);
        $password_baru = $this->input->post('password_baru',TRUE);
        $password_konfirm = $this->input->post('password_konfirm',TRUE);
        $akun = $this->m_user->get_pengajar_by_id($id)->row_array();
        $this->m_user->update_pengajar($id,$email,$nama,$akun['aktif']);
        if ($password_lama && $password_konfirm && $password_baru != "") {
            $options = ['cost' => 10];
            if (password_verify($password_lama, $akun['password'])) {
                if ($password_baru == $password_konfirm) 
                {
                    $pass_baru = password_hash($password_baru, PASSWORD_DEFAULT, $options);
                    $this->m_user->update_pengajar_pass($id,$pass_baru);
                    echo "<script>alert('Password berhasil diperbarui!')</script>";
                    $akun = $this->m_user->get_pengajar_by_id($id)->row_array();
                    $this->session->set_userdata('user', $akun);
                    $user = $this->session->userdata('user');
                    $this->load->view('template/header_pengajar');
                    $this->load->view('pengajar/index', $user);
                    $this->load->view('template/footer');
                }
                else
                {
                    echo "<script>alert('Password baru dan konfirmasi password harus sama!')</script>";
                    $akun = $this->session->userdata('user');
                    $data['akun'] = $akun;
                    $this->load->view('template/header_pengajar');
                    $this->load->view('pengajar/edit_akun',$data);
                    $this->load->view('template/footer');
                }
            }
            else
            {
                echo "<script>alert('Password lama salah!')</script>";
                    $akun = $this->session->userdata('user');
                    $data['akun'] = $akun;
                    $this->load->view('template/header_pengajar');
                    $this->load->view('pengajar/edit_akun',$data);
                    $this->load->view('template/footer');
            }
        }
        else{
            echo "<script>alert('Akun berhasil diedit!')</script>";
            $akun = $this->m_user->get_pengajar_by_id($id)->row_array();
            $this->session->set_userdata('user', $akun);
            $user = $this->session->userdata('user');
            $this->load->view('template/header_pengajar');
            $this->load->view('pengajar/index', $user);
            $this->load->view('template/footer');
        }
    }
}