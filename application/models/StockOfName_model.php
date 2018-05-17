<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StockOfName_model extends CI_Model{

	private $table = "stockofname";
	private $primary = "id_stockOfName";


	function create($data){
		$this->db->insert($this->table,$data);
	}
	function read($date){
		$query = "call getStockOfname('".$date."')";
		$hasil = $this->db->query($query);
		mysqli_next_result($this->db->conn_id);
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		}
	}
	function getById($id){
		$this->db->where($this->primary,$id);
		return $this->db->get($this->table)->row();
	}

	function update($post,$id){
		$this->db->where($this->primary,$id);
		$this->db->update($this->table,$post);
	}

	function delete($id){
		$this->db->where($this->primary,$id);
		$this->db->delete($this->table);
	}
}
