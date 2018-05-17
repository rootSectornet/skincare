<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
*
*/
class User_model extends CI_Model
{

	private $table = "user_login";
	private $primary = "id_user";
	public function cek_user($data) {
		$query = $this->db->get_where($this->table, $data);
		return $query;
	}
	function read(){
		$this->db->join('mst_pegawai','mst_pegawai.id_mst_pegawai = user_login.id_mst_pegawai','INNER');
		return $this->db->get($this->table)->result();
	}
	function create($data){
		$this->db->insert($this->table,$data);
	}
	function update($data,$id){
		$this->db->where($this->primary,$id);
		$this->db->update($this->table,$data);
	}
	function getByID($id){
		$this->db->where($this->primary,$id);
		$this->db->join('mst_pegawai','mst_pegawai.id_mst_pegawai = user_login.id_mst_pegawai','INNER');
		return $this->db->get($this->table)->result();
	}
	function delete($id){
		$this->db->where($this->primary,$id);
		$this->db->delete($this->table);
	}
	function getByIdPegawai($id){
		$this->db->where('id_mst_pegawai',$id);
		return $this->db->get($this->table)->row();
	}
}
