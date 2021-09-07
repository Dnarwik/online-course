<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_progress extends CI_Model{
     
    function insert_progress($id_kelas=null,$id_peserta=null,$step=null){
        $data = array(
            'id_kelas' => $id_kelas,
            'id_peserta' => $id_peserta,
            'step' => $step
        );
        $this->db->insert('progress_kelas',$data);
    }
    function get_all(){
        return $this->db->get('progress_kelas')->result();
    }
    function get_progress_by_id($id=null){
        if (!isset($id)) show_404();
        $query = $this->db->get_where('progress_kelas', array('id' => $id));
        return $query;
    }
    function get_progress_by_nama_peserta($nama_peserta=""){
        if (!isset($nama_peserta)) show_404();
        $query = $this->db->get_where('progress_kelas', array('nama_peserta' => $nama_peserta))->result();
        return $query;
    }
    function get_progress_by_nama_peserta_dan_id_kelas($nama_peserta="",$id_kelas=null){
        $sql = "SELECT * FROM progress_kelas WHERE nama_peserta = ? AND id_kelas = ?";
        $query = $this->db->query($sql, [$nama_peserta, $id_kelas])->result();
        return $query;
    }
    function get_progress_by_id_peserta_dan_id_kelas($id_peserta=null,$id_kelas=null){
        $sql = "SELECT * FROM progress_kelas WHERE id_peserta = ? AND id_kelas = ?";
        $query = $this->db->query($sql, [$id_peserta, $id_kelas])->result();
        return $query;
    }
    function update_step($step=null,$id=null){
        $data = array(
            'step' => $step
        );
        return $this->db->update('progress_kelas',$data,array('id' => $id));
    }
    function update_progress($id=null,$id_peserta=null,$id_kelas=null,$step=null){
        $data = array(
            'id_kelas' => $id_kelas,
            'id_peserta' => $id_peserta,
            'step' => $step
        );
        return $this->db->update('progress_kelas',$data,array('id' => $id));
    }
    function delete($id=null){
        if (!isset($id)) show_404();
        return $this->db->delete('progress_kelas', array('id' => $id));
    }
}