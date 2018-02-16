<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group_access_model extends CI_Model{

	private $table = "group_access";
	private $primary = "id_group_acces";

	function getByPegawai($id){
		$this->db->where('id_mst_pegawai',$id);
		$this->db->join('pegawai_group','pegawai_group.id_mst_group = group_access.id_mst_group','INNER');
		return $this->db->get($this->table)->result();
	}
	function getBygroup($id){
		$this->db->where('id_mst_group',$id);
		$this->db->join('mst_pegawai','mst_pegawai.id_mst_pegawai = group_access.id_mst_pegawai','INNER');
		return $this->db->get($this->table)->result();
	}
	function create($data){
		$this->db->insert($this->table,$data);
	}


}