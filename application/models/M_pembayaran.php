<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_pembayaran extends CI_Model{
	// Fungsi untuk menampilkan semua data gambar
	function get_all(){
    	return $this->db->get('pembayaran')->result();
  	}
  	function get_pembayaran_by_id($id=null){
        if (!isset($id)) show_404();
        $query = $this->db->get_where('pembayaran', array('id' => $id));
        return $query;
    }
    function update_pembayaran($id,$nominal,$id_peserta,$tgl_bayar){
        $data = array(
            'nominal' => $nominal,
            'id_peserta' => $id_peserta,
            'tgl_bayar' => $tgl_bayar
        );
        return $this->db->update('pembayaran',$data,array('id' => $id));
    }
    function update_bukti_pembayaran($id,$bukti_pembayaran){
        $data = array(
            'bukti_pembayaran' => $bukti_pembayaran
        );
        return $this->db->update('pembayaran',$data,array('id' => $id));
    }
  	function insert_bayar($bukti_pembayaran,$nominal,$id_peserta,$tgl_bayar){
        $data = array(
            'nominal' => $nominal,
            'id_peserta' => $id_peserta,
            'tgl_bayar' => $tgl_bayar,
            'bukti_pembayaran' => $bukti_pembayaran
        );
        $this->db->insert('pembayaran',$data);
    }
    function delete($id=null){
        if (!isset($id)) show_404();
        return $this->db->delete('pembayaran', array('id' => $id));
    }
}