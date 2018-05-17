<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelurahan_model extends CI_Model{

	private $table = "kelurahan";
	private $primary = "id_kel";

	function read(){
		$query = "call getAlamat()";
		$hasil = $this->db->query($query);
		mysqli_next_result($this->db->conn_id);
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		}
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
