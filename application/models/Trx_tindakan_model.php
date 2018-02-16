<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trx_tindakan_model extends CI_Model{

	private $table = "trx_tindakan";
	private $primary = "id_trx_tindakan";

	function read(){
		$this->db->join('mst_pegawai','mst_pegawai.id_mst_pegawai = trx_tindakan.id_mst_pegawai','INNER');
		$this->db->join('pendaftaran','pendaftaran.id_trx_pendaftaran = trx_tindakan.id_trx_pendaftaran','INNER');
		return $this->db->get($this->table)->result();
	}
	function getById($id){
		$this->db->join('mst_pegawai','mst_pegawai.id_mst_pegawai = trx_tindakan.id_mst_pegawai','INNER');
		$this->db->join('pendaftaran','pendaftaran.id_trx_pendaftaran = trx_tindakan.id_trx_pendaftaran','INNER');
		$this->db->where($this->primary,$id);
		return $this->db->get($this->table)->result();
	}
	function getByPendaftaran($id){
		$this->db->join('mst_pegawai','mst_pegawai.id_mst_pegawai = trx_tindakan.id_mst_pegawai','INNER');
		$this->db->where('id_trx_pendaftaran',$id);
		return $this->db->get($this->table)->result();
	}
	function getByPegawai($id){
		$this->db->join('pendaftaran','pendaftaran.id_trx_pendaftaran = trx_tindakan.id_trx_pendaftaran','INNER');
		$this->db->where('id_mst_pegawai',$id);
		return $this->db->get($this->table)->result();
	}
	function create($data){
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}
	function update($post,$id){
		$this->db->where($this->primary,$id);
		$this->db->update($this->table,$post);
	}

}