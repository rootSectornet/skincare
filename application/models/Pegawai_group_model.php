<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai_group_model extends CI_Model{

	private $table = "pegawai_group";
	private $primary = "id_mst_group";

	function read(){
		$this->db->where('flag_aktif',1);
		return $this->db->get($this->table)->result();
	}
	function getById($id){
		$this->db->where($this->primary,$id);
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