<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_kelas extends CI_Model{
     
    function insert_kelas($id_pengajar,$nama_kelas,$deskripsi){
        $data = array(
            'id_pengajar' => $id_pengajar,
            'nama_kelas' => $nama_kelas,
            'deskripsi' => $deskripsi
        );
        $this->db->insert('kelas',$data);
    }
    function update_kelas($id,$nama_kelas,$deskripsi){
        $data = array(
            'nama_kelas' => $nama_kelas,
            'deskripsi' => $deskripsi
        );
        return $this->db->update('kelas',$data,array('id' => $id));
    }
    function get_all(){
        return $this->db->get('kelas')->result();
    }
    function get_kelas_by_id($id=null){
        if (!isset($id)) show_404();
        $query = $this->db->get_where('kelas', array('id' => $id));
        return $query;
    }
    function get_kelas_by_nama_kelas($nama_kelas=""){
        if (!isset($nama_kelas)) show_404();
        $query = $this->db->get_where('kelas', array('nama_kelas' => $nama_kelas))->result();
        return $query;
    }
    function get_kelas_by_nama_pengajar($nama_pengajar=""){
        $query = $this->db->get_where('kelas', array('nama_pengajar' => $nama_pengajar))->result();
        return $query;
    }
    function get_kelas_by_id_pengajar($id_pengajar=null){
        $query = $this->db->get_where('kelas', array('id_pengajar' => $id_pengajar))->result();
        return $query;
    }
    function delete($id=null){
        if (!isset($id)) show_404();
        return $this->db->delete('kelas', array('id' => $id));
    }
}