<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pasien_model extends CI_Model{

	private $table = "mst_pasien";
	private $primary = "id_mst_pasien";

	function getByID($id){
		$this->db->where($this->primary,$id);
		$this->db->join('kelurahan','kelurahan.id_kel = mst_pasien.id_kel','INNER');
		$this->db->join('kecamatan','kecamatan.id_kec = kelurahan.id_kec','INNER');
		$this->db->join('kabupaten','kabupaten.id_kab = kecamatan.id_kab','INNER');
		$this->db->join('provinsi','provinsi.id_prov = kabupaten.id_prov','INNER');
		return $this->db->get($this->table)->result();
	}
	function read(){
		$this->db->join('kelurahan','kelurahan.id_kel = mst_pasien.id_kel','INNER');
		$this->db->join('kecamatan','kecamatan.id_kec = kelurahan.id_kec','INNER');
		$this->db->join('kabupaten','kabupaten.id_kab = kecamatan.id_kab','INNER');
		$this->db->join('provinsi','provinsi.id_prov = kabupaten.id_prov','INNER');
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


}