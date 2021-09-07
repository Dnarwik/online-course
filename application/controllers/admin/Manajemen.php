<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_user','m_user');
		$this->load->model('M_materi','m_materi');
        $this->load->model('M_kelas','m_kelas');
        $this->load->model('M_progress','m_progress');
        $this->load->model('M_pembayaran','m_pembayaran');
		$this->load->library('session');
		$this->load->library('upload');
		if ($this->session->userdata('email') === null) {
			redirect(base_url('welcome/admin'));
		}
	}
	public function index()
	{
		$data["pengajar"] = $this->m_user->get_all_pengajar();
		$data["peserta"] = $this->m_user->get_all_peserta();
		$this->load->view('template/header_admin');
		$this->load->view('admin/index', $data);	
	}

	//halaman edit user
	public function h_user_edit($jenis_user=null,$id_user=null){
        if (!isset($jenis_user)) show_404();
        if (!isset($id_user)) show_404();
        $data["jenis_user"] = $jenis_user;
        if($jenis_user==1){
        	$data["user"] = $this->m_user->get_peserta_by_id($id_user)->row_array();
        }
        elseif ($jenis_user==2) {
        	$data["user"] = $this->m_user->get_pengajar_by_id($id_user)->row_array();
        }
        else{
        	show_404();
        }
        $this->load->view('template/header_admin');
		$this->load->view('admin/user_edit', $data);
	}

	//halaman kelas
	public function kelas(){
		$data["pengajar"] = $this->m_user->get_all_pengajar();
        $data["kelas"] = $this->m_kelas->get_all();
		$this->load->view('template/header_admin');
		$this->load->view('admin/kelas', $data);
	}

	//halaman edit kelas
	public function h_kelas_edit($id=null){
        if (!isset($id)) show_404();
        $data['id_kelas'] = $id;
        $data["kelas"] = $this->m_kelas->get_kelas_by_id($id)->row_array();
        $this->load->view('template/header_admin');
		$this->load->view('admin/kelas_edit', $data);
	}

	//halaman materi
	public function h_materi(){
        $data["materi"] = $this->m_materi->get_all();
        $data["kelas"] = $this->m_kelas->get_all();
		$this->load->view('template/header_admin');
		$this->load->view('admin/materi', $data);
	}

	//halaman edit materi
	public function h_materi_edit($id=null){
        if (!isset($id)) show_404();
        $data['id_materi'] = $id;
        $data["kelas"] = $this->m_kelas->get_all();
        $data["materi"] = $this->m_materi->get_materi_by_id($id)->row_array();
		$this->load->view('template/header_admin');
		$this->load->view('admin/materi_edit', $data);
	}

	//halaman progress
	public function h_progress(){
        $data["peserta"] = $this->m_user->get_all_peserta();
        $data["kelas"] = $this->m_kelas->get_all();
        $data["progress"] = $this->m_progress->get_all();
		$this->load->view('template/header_admin');
		$this->load->view('admin/progress_peserta', $data);
	}

	//halaman edit progress
	public function h_progress_edit($id=null){
        if (!isset($id)) show_404();
        $data['id_progress'] = $id;
        $data["peserta"] = $this->m_user->get_all_peserta();
        $data["kelas"] = $this->m_kelas->get_all();
        $data["progress"] = $this->m_progress->get_progress_by_id($id)->row_array();
		$this->load->view('template/header_admin');
		$this->load->view('admin/progress_peserta_edit', $data);
	}

	//halaman kelola akun admin
	public function akun_admin(){
		$akun = $this->session->userdata('email');
		$data['akun'] = $akun;
		$this->load->view('template/header_admin');
		$this->load->view('admin/akun', $data);
	}

    //halaman Pembayaran
    public function h_pembayaran(){
        $data['pembayaran'] = $this->m_pembayaran->get_all();
        $data['peserta'] = $this->m_user->get_all_peserta();
        $this->load->view('template/header_admin');
        $this->load->view('admin/pembayaran', $data);
    }

    //halaman edit pembayaran
    public function h_pembayaran_edit($id=null){
        if (!isset($id)) show_404();
        $data['id_pembayaran'] = $id;
        $data['pembayaran'] = $this->m_pembayaran->get_pembayaran_by_id($id)->row_array();
        $data['peserta'] = $this->m_user->get_all_peserta();
        $this->load->view('template/header_admin');
        $this->load->view('admin/pembayaran_edit', $data);
    }

	//update user
    public function edit_user($jenis_user=null,$id_user=null){
    	if (!isset($jenis_user)) show_404();
        if (!isset($id_user)) show_404();
        $email = $this->input->post('email',TRUE);
        $nama = $this->input->post('nama',TRUE);
        $aktif = $this->input->post('aktif',TRUE);
        if($jenis_user==1){
        	$this->m_user->update_peserta($id_user,$email,$nama,(int)$aktif);
        }
        elseif ($jenis_user==2) {
        	$this->m_user->update_pengajar($id_user,$email,$nama,(int)$aktif);
        }
        else{
        	show_404();
        }
        redirect(base_url('admin/manajemen/'));
    }

    //delete user
    public function hapus_user($jenis_user=null,$id_user=null){
        if (!isset($jenis_user)) show_404();
        if (!isset($id_user)) show_404();
        if($jenis_user==1){
        	$this->m_user->delete_peserta($id_user);
        }
        elseif ($jenis_user==2) {
        	$this->m_user->delete_pengajar($id_user);
        }
        else{
        	show_404();
        }
        redirect(base_url('admin/manajemen/'));
    }

    //Insert Kelas
    public function buat_kelas(){
    	$id_pengajar = $this->input->post('id_pengajar',TRUE);
        $nama_kelas = $this->input->post('nama_kelas',TRUE);
        $deskripsi = $this->input->post('deskripsi',TRUE);
        $this->m_kelas->insert_kelas((int)$id_pengajar,$nama_kelas,$deskripsi);
        redirect(base_url('admin/manajemen/kelas'));
    }

    //Update Kelas
    public function edit_kelas($id=null){
        if (!isset($id)) show_404();
        $nama_kelas = $this->input->post('nama_kelas',TRUE);
        $deskripsi = $this->input->post('deskripsi',TRUE);
        $this->m_kelas->update_kelas($id,$nama_kelas,$deskripsi);
        redirect(base_url('admin/manajemen/kelas'));
    }

    //delete kelas
    public function hapus_kelas($id=null){
        if (!isset($id)) show_404();
        $this->m_kelas->delete($id);
        redirect(base_url('admin/manajemen/kelas'));
    }

    //insert materi
	public function buat_materi(){
        $judul_materi = $this->input->post('judul_materi',TRUE);
        $isi_materi = $this->input->post('isi_materi',TRUE);
        $id_kelas = $this->input->post('id_kelas',TRUE);
        $step = $this->input->post('step',TRUE);
        $kelas_sementara = $this->m_kelas->get_kelas_by_id($id_kelas)->row_array();
        $this->m_materi->insert_materi($kelas_sementara['id_pengajar'],$id_kelas,$judul_materi,$isi_materi,$step);
        redirect(base_url('admin/manajemen/h_materi'));
    }

    //update materi
    public function edit_materi($id=null){
        if (!isset($id)) show_404();
        $id_kelas = $this->input->post('id_kelas',TRUE);
        $judul_materi = $this->input->post('judul_materi',TRUE);
        $isi_materi = $this->input->post('isi_materi',TRUE);
        $step = $this->input->post('step',TRUE);
        $this->m_materi->update_materi($id,$id_kelas,$judul_materi,$isi_materi,$step);
        redirect(base_url('admin/manajemen/h_materi'));
    }

    //delete materi
    public function hapus_materi($id=null){
        if (!isset($id)) show_404();
        $this->m_materi->delete($id);
        redirect(base_url('admin/manajemen/h_materi'));
    }

    //insert progress
	public function buat_progress(){
        $id_peserta = $this->input->post('id_peserta',TRUE);
        $id_kelas = $this->input->post('id_kelas',TRUE);
        $step = $this->input->post('step',TRUE);
        $this->m_progress->insert_progress($id_kelas,$id_peserta,$step);
        redirect(base_url('admin/manajemen/h_progress'));
    }

    //update progress
    public function edit_progress($id=null){
        if (!isset($id)) show_404();
        $id_peserta = $this->input->post('id_peserta',TRUE);
        $id_kelas = $this->input->post('id_kelas',TRUE);
        $step = $this->input->post('step',TRUE);
        $this->m_progress->update_progress($id,$id_peserta,$id_kelas,$step);
        redirect(base_url('admin/manajemen/h_progress'));
    }

    //delete materi
    public function hapus_progress($id=null){
        if (!isset($id)) show_404();
        $this->m_progress->delete($id);
        redirect(base_url('admin/manajemen/h_progress'));
    }

    //update akun admin
    public function edit_akun_admin($id=null){
        if (!isset($id)) show_404();
        $edit_akun_username = $this->input->post('edit_akun_username',TRUE);
        $edit_akun_email = $this->input->post('edit_akun_email',TRUE);
        $this->m_user->update_admin_akun($id,$edit_akun_username,$edit_akun_email);
        $akun = $this->m_user->get_admin_by_id($id)->row_array();
        $this->session->set_userdata('email', $akun);
		redirect(base_url('admin/manajemen'));
    }

    //update password admin
    public function edit_pass_admin($id=null){
        if (!isset($id)) show_404();
        $ganti_pass_lama = $this->input->post('ganti_pass_lama',TRUE);
        $ganti_pass_baru = $this->input->post('ganti_pass_baru',TRUE);
        $ganti_pass_konfirm = $this->input->post('ganti_pass_konfirm',TRUE);
        $akun = $this->m_user->get_admin_by_id($id)->row_array();
        $options = ['cost' => 10];
        if (password_verify($ganti_pass_lama, $akun['password'])) {
        	if ($ganti_pass_baru == $ganti_pass_konfirm) 
	        {
				$pass_baru = password_hash($ganti_pass_baru, PASSWORD_DEFAULT, $options);
				$this->m_user->update_admin_pass($id,$pass_baru);
		        $akun = $this->m_user->get_admin_by_id($id)->row_array();
		        $this->session->set_userdata('email', $akun);
				redirect(base_url('admin/manajemen'));
			}
			else
			{
				echo "<script>alert('Password baru dan konfirmasi password harus sama!')</script>";
				$akun = $this->session->userdata('email');
				$data['akun'] = $akun;
				$this->load->view('template/header_admin');
				$this->load->view('admin/akun', $data);
			}
        }
        else
        {
        	echo "<script>alert('Password lama salah!')</script>";
				$akun = $this->session->userdata('email');
				$data['akun'] = $akun;
				$this->load->view('template/header_admin');
				$this->load->view('admin/akun', $data);
        }
    }

    //create akun admin
    public function buat_akun_admin(){
        $buat_akun_username = $this->input->post('buat_akun_username',TRUE);
        $buat_akun_email = $this->input->post('buat_akun_email',TRUE);
        $buat_akun_pass = $this->input->post('buat_akun_pass',TRUE);
        $buat_akun_pass_konfirm = $this->input->post('buat_akun_pass_konfirm',TRUE);
        if ($buat_akun_pass == $buat_akun_pass_konfirm) 
    	{
    		$options = ['cost' => 10];
			$pass = password_hash($buat_akun_pass, PASSWORD_DEFAULT, $options);
			$this->m_user->insert_admin($buat_akun_username,$pass,$buat_akun_email);
	        echo "<script>alert('Akun Admin baru berhasil dibuat!')</script>";
			$data['akun'] = $this->session->userdata('email');
			$this->load->view('template/header_admin');
			$this->load->view('admin/akun', $data);
		}
		else
		{
			echo "<script>alert('Password dan konfirmasi password harus sama!')</script>";
			$data['akun'] = $this->session->userdata('email');
			$this->load->view('template/header_admin');
			$this->load->view('admin/akun', $data);
		}
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

    //insert pembayaran
    public function bayar(){
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
                $id_peserta = $this->input->post('id_peserta',TRUE);
                $this->m_pembayaran->insert_bayar($bukti_pembayaran,$nominal,$id_peserta,$tgl_bayar);
                redirect(base_url('admin/manajemen/h_pembayaran'));
            }
        }
    }
    //delete pembayaran
    public function hapus_pembayaran($id=null){
        if (!isset($id)) show_404();
        $src = ($this->m_pembayaran->get_pembayaran_by_id($id)->row_array())['bukti_pembayaran'] ;
        $file_name = str_replace(base_url(), '', $src);
        if(unlink($file_name))
        {
            echo 'File Delete Successfully';
        }
        $this->m_pembayaran->delete($id);
        redirect(base_url('admin/manajemen/h_pembayaran'));
    }
    //delete bukti pembayaran
    public function hapus_bukti($id=null){
        if (!isset($id)) show_404();
        $src = ($this->m_pembayaran->get_pembayaran_by_id($id)->row_array())['bukti_pembayaran'] ;
        $file_name = str_replace(base_url(), '', $src);
        $this->m_pembayaran->update_bukti_pembayaran($id,"");
        if(unlink($file_name))
        {
            echo 'File Delete Successfully';
        }
        redirect(base_url('admin/manajemen/h_pembayaran_edit/'.$id));
    }
    //update pembayaran
    public function edit_bayar($id=null){
        if (!isset($id)) show_404();
        if(!empty($_FILES["image"]["name"])){
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
                $id_peserta = $this->input->post('id_peserta',TRUE);
                $bukti = $this->input->post('image',TRUE);
                $this->m_pembayaran->update_bukti_pembayaran($id,$bukti_pembayaran);
                $this->m_pembayaran->update_pembayaran($id,$nominal,$id_peserta,$tgl_bayar);
                redirect(base_url('admin/manajemen/h_pembayaran'));         
            }
        }else{
            $nominal = $this->input->post('nominal',TRUE);
            $tgl_bayar = $this->input->post('tgl_bayar',TRUE);
            $id_peserta = $this->input->post('id_peserta',TRUE);
            $this->m_pembayaran->update_pembayaran($id,$nominal,$id_peserta,$tgl_bayar);
            redirect(base_url('admin/manajemen/h_pembayaran'));
        }
    }
}