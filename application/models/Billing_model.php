<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Billing_model extends CI_Model{

	private $table = "billing";
	private $primary = "id_billing";

  function create($post){
    $this->db->insert($this->table,$post);
  }
  function getByIdTagihan($IdTagihan){
    $this->db->where('id_tagihan',$IdTagihan);
    return $this->db->get($this->table)->row();
  }
  function delete($id){
    $this->db->where($this->primary,$id);
    $this->db->delete($this->table);
  }
  function getByIdPendaftaran($id){
      $this->db->where('id_trx_pendaftaran',$IdTagihan);
      return $this->db->get($this->table)->row();
  }
  function readTagihanPasien($date){
  		$query = "call ListTagihanPasienByDate('".$date."')";
  		$hasil = $this->db->query($query);
  		mysqli_next_result($this->db->conn_id);
  		if ($hasil->num_rows() > 0) {
  			return $hasil->result();
  		}
  }
	function readTagihanPenjualan($date){
  		$query = "call ListTagihanPenjualanByDate('".$date."')";
  		$hasil = $this->db->query($query);
  		mysqli_next_result($this->db->conn_id);
  		if ($hasil->num_rows() > 0) {
  			return $hasil->result();
  		}
	}
  function getDetail($id){
    $this->db->where($this->primary,$id);
    $this->db->join('pendaftaran','pendaftaran.id_trx_pendaftaran = billing.id_trx_pendaftaran','INNER');
    $this->db->join('mst_pasien','mst_pasien.id_mst_pasien = pendaftaran.id_mst_pasien','INNER');
    return $this->db->get($this->table)->row();
  }
	function update($data,$id){
		$this->db->where($this->primary,$id);
		$this->db->update($this->table,$data);
	}
	function readById($id){
		$this->db->where($this->primary,$id);
		$this->db->join('penjualan','penjualan.faktur_penjualan = billing.id_tagihan','INNER');
		$this->db->join('mst_pegawai','mst_pegawai.id_mst_pegawai = penjualan.id_mst_pegawai','INNER');
		return $this->db->get($this->table)->row();
	}

}
