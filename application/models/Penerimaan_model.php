<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penerimaan_model extends CI_Model{

	private $table = "penerimaan";
	private $primary = "faktur_penerimaan";

	function read(){
		$this->db->select('penerimaan.*,nama_suplier,nama_pegawai');
		$this->db->join('mst_suplier','mst_suplier.id_suplier = penerimaan.id_suplier','INNER');
		$this->db->join('mst_pegawai','mst_pegawai.id_mst_pegawai = penerimaan.id_mst_pegawai','INNER');
		return $this->db->get($this->table)->result();
	}
	function getById($id){
		$this->db->select('penerimaan.*,nama_suplier,nama_pegawai');
		$this->db->where($this->primary,$id);
		$this->db->join('mst_pegawai','mst_pegawai.id_mst_pegawai = penerimaan.id_mst_pegawai','INNER');
		$this->db->join('mst_suplier','mst_suplier.id_suplier = penerimaan.id_suplier','INNER');
		return $this->db->get($this->table)->result();
	}
	function getoneDay($date){
		$this->db->select('penerimaan.*,nama_suplier,nama_pegawai');
			$this->db->where('penerimaan.tgl_penerimaan',$date);
		$this->db->join('mst_pegawai','mst_pegawai.id_mst_pegawai = penerimaan.id_mst_pegawai','INNER');
		$this->db->join('mst_suplier','mst_suplier.id_suplier = penerimaan.id_suplier','INNER');
		return $this->db->get($this->table)->result();
	}
	function create($data){
		$this->db->insert($this->table,$data);
	}
	function update($post,$id){
		$this->db->where($this->primary,$id);
		$this->db->update($this->table,$post);
	}
	function delete($id){
		$this->db->where($this->primary,$id);
		$this->db->delete($this->table);
	}
	function laporanPenerimaan($id,$awal,$akhir){
  		$query = "call laporanPenerimaan('".$id."','".$awal."','".$akhir."')";
  		$hasil = $this->db->query($query);
  		mysqli_next_result($this->db->conn_id);
  		if ($hasil->num_rows() > 0) {
  			return $hasil->result();
  		}
	}

}
