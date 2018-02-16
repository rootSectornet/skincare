<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kabupaten_model extends CI_Model{

	private $table = "kabupaten";
	private $primary = "id_kab";

	function read(){
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