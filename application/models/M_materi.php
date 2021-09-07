<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_materi extends CI_Model{
     
    function insert_materi($id_pengajar,$id_kelas,$judul_materi,$isi_materi,$step){
        $data = array(
            'id_pengajar' => $id_pengajar,
            'id_kelas' => $id_kelas,
            'judul_materi' => $judul_materi,
            'isi_materi' => $isi_materi,
            'step' => $step
        );
        $this->db->insert('materi',$data);
    }
    function update_materi($id,$id_kelas,$judul_materi,$isi_materi,$step){
        $data = array(
            'id_kelas' => $id_kelas,
            'judul_materi' => $judul_materi,
            'isi_materi' => $isi_materi,
            'step' => $step
        );
        return $this->db->update('materi',$data,array('id' => $id));
    }
    function get_all(){
        return $this->db->get('materi')->result();
    }
    function get_materi_by_id($id=null){
        if (!isset($id)) show_404();
        $query = $this->db->get_where('materi', array('id' => $id));
        return $query;
    }
    function get_materi_by_kelas($nama_kelas=""){
        if (!isset($nama_kelas)) show_404();
        $query = $this->db->get_where('materi', array('nama_kelas' => $nama_kelas))->result();
        return $query;
    }
    function get_materi_by_id_kelas($id_kelas=null){
        if (!isset($id_kelas)) show_404();
        $query = $this->db->get_where('materi', array('id_kelas' => $id_kelas))->result();
        return $query;
    }
    function get_materi_by_nama_pengajar($nama_pengajar=""){
        $query = $this->db->get_where('materi', array('nama_pengajar' => $nama_pengajar))->result();
        return $query;
    }
    function get_materi_by_id_pengajar($id_pengajar=null){
        $query = $this->db->get_where('materi', array('id_pengajar' => $id_pengajar))->result();
        return $query;
    }
    function get_materi_by_kelas_dan_step($nama_kelas="",$step=null){
        $sql = "SELECT * FROM materi WHERE nama_kelas = ? AND step = ?";
        $query = $this->db->query($sql, [$nama_kelas, $step])->result();
        return $query;
    }
    function get_materi_by_id_kelas_dan_step($id_kelas=null,$step=null){
        $sql = "SELECT * FROM materi WHERE id_kelas = ? AND step = ?";
        $query = $this->db->query($sql, [$id_kelas, $step])->result();
        return $query;
    }
    function delete($id=null){
        if (!isset($id)) show_404();
        return $this->db->delete('materi', array('id' => $id));
    }
}