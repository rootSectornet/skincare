<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_access_model extends CI_Model{

	private $table = "menu_akses";
	private $primary = "id_menu_akses";

	function getBygroup($id,$is_main_menu){
		$this->db->where('id_mst_group',$id);
		$this->db->where('menu.is_main_menu',$is_main_menu);
		$this->db->join('menu','menu.id_menu = menu_akses.id_menu','INNER');
		return $this->db->get($this->table)->result();
	}
	function read(){
		$this->db->join('pegawai_group','pegawai_group.id_mst_group = menu_akses.id_mst_group','INNER');
		$this->db->join('menu','menu.id_menu = menu_akses.id_menu','INNER');
		return $this->db->get($this->table)->result();
	}
	function getBygrouping($id){
		$this->db->where('id_mst_group',$id);
		$this->db->join('menu','menu.id_menu = menu_akses.id_menu','INNER');
		return $this->db->get($this->table)->result();
	}
	function create($data){
		$this->db->insert($this->table,$data);
	}


}