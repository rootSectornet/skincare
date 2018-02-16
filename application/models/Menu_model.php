<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model{

	private $table = "menu";
	private $primary = "id_menu";

	function read(){
		return $this->db->get($this->table)->result();
	}
	function create($data){
		$this->db->insert($this->table,$data);
	}
	function getById($id){
		$this->db->where($this->primary,$id);
		return $this->db->get($this->table)->result();
	}

}