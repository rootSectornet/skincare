<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kecamatan_model extends CI_Model{

	private $table = "kecamatan";
	private $primary = "id_kec";

	function read(){
		$this->db->join('kabupaten','kabupaten.id_kab = kecamatan.id_prov','INNER');
		return $this->db->get($this->table)->result();
	}
	function getById($id){
		$this->db->where($this->primary,$id);
		$this->db->join('kabupaten','kabupaten.id_kab = kecamatan.id_prov','INNER');
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