<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelurahan_model extends CI_Model{

	private $table = "kelurahan";
	private $primary = "id_kel";

	function read(){
		$this->db->join('kecamatan','kecamatan.id_kec = kelurahan.id_kec','INNER');
		$this->db->join('kabupaten','kabupaten.id_kab = kecamatan.id_kab','INNER');
		$this->db->join('provinsi','provinsi.id_prov = kabupaten.id_prov','INNER');
		return $this->db->get($this->table)->result();
	}
	function getById($id){
		$this->db->where($this->primary,$id);
		$this->db->join('kecamatan','kecamatan.id_kec = kelurahan.id_kec','INNER');
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