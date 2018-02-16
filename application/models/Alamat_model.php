<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alamat_model extends CI_Model{

	private $table = "alamat";
	private $primary = "id_alamat";

	function read(){
		$this->db->join('kelurahan','kelurahan.id_kel = alamat.id_kel','INNER');
		$this->db->join('provinsi','provinsi.id_prov = kabupaten.id_prov','INNER');
		$this->db->join('provinsi','provinsi.id_prov = kabupaten.id_prov','INNER');
		$this->db->join('provinsi','provinsi.id_prov = kabupaten.id_prov','INNER');
		return $this->db->get($this->table)->result();
	}
	function getById($id){
		$this->db->where($this->primary,$id);
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

}