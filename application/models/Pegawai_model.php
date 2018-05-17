<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai_model extends CI_Model{

	private $table = "mst_pegawai";
	private $primary = "id_mst_pegawai";

	function getByID($id){
		$this->db->where($this->primary,$id);
		$this->db->where('flag_aktif',1);
		return $this->db->get($this->table)->result();
	}
	function read(){
		$this->db->where('flag_aktif',1);
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
