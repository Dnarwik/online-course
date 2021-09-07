<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_user extends CI_Model{
     
    function insert_admin($username,$password,$email){
        $data = array(
            'username' => $username,
            'password' => $password,
            'email' => $email
        );
        $this->db->insert('admin',$data);
    }
    function insert_pengajar($nama="",$email="",$password="",$aktif=null){
        $data = array(
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'aktif' => $aktif
        );
        $this->db->insert('pengajar',$data);
    }
    function insert_peserta($nama="",$email="",$password="",$aktif=null){
        $data = array(
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'aktif' => $aktif
        );
        $this->db->insert('peserta',$data);
    }
    function get_all_pengajar(){
        return $this->db->get('pengajar')->result();
    }
    function get_all_peserta(){
        return $this->db->get('peserta')->result();
    }
    function update_peserta($id,$email,$nama,$aktif=null){
        $data = array(
            'email' => $email,
            'nama' => $nama,
            'aktif' => $aktif
        );
        return $this->db->update('peserta',$data,array('id' => $id));
    }
    function update_pengajar($id,$email,$nama,$aktif=null){
        $data = array(
            'email' => $email,
            'nama' => $nama,
            'aktif' => $aktif
        );
        return $this->db->update('pengajar',$data,array('id' => $id));
    }
    function update_admin_akun($id,$username,$email){
        $data = array(
            'username' => $username,
            'email' => $email
        );
        return $this->db->update('admin',$data,array('id' => $id));
    }
    function update_admin_pass($id,$password){
        $data = array(
            'password' => $password
        );
        return $this->db->update('admin',$data,array('id' => $id));
    }
    function update_pengajar_pass($id,$password){
        $data = array(
            'password' => $password
        );
        return $this->db->update('pengajar',$data,array('id' => $id));
    }
    function update_peserta_pass($id,$password){
        $data = array(
            'password' => $password
        );
        return $this->db->update('peserta',$data,array('id' => $id));
    }
    function get_peserta_by_id($id=null){
        if (!isset($id)) show_404();
        $query = $this->db->get_where('peserta', array('id' => $id));
        return $query;
    }
    function get_pengajar_by_id($id=null){
        if (!isset($id)) show_404();
        $query = $this->db->get_where('pengajar', array('id' => $id));
        return $query;
    }
    function get_admin_by_id($id=null){
        if (!isset($id)) show_404();
        $query = $this->db->get_where('admin', array('id' => $id));
        return $query;
    }
    function delete_peserta($id=null){
        if (!isset($id)) show_404();
        return $this->db->delete('peserta', array('id' => $id));
    }
    function delete_pengajar($id=null){
        if (!isset($id)) show_404();
        return $this->db->delete('pengajar', array('id' => $id));
    }
}