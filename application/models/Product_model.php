<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model{

	private $table = "product";
	private $primary = "id_product";

	function read(){
		return $this->db->get($this->table)->result();
	}
	function readJson(){
		$this->db->where('exp >=', date('Y-m-d'));
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
	function delete($id){
		$this->db->where($this->primary,$id);
		$this->db->delete($this->table);
	}
	function getStock($id){
			$this->db->select('qty as stock');
			$this->db->where($this->primary,$id);
			$query = $this->db->get($this->table);
			$data = $query->row();
			return $data->stock;
	}
	function getStockRusak($id){
		$this->db->select('qty_rusak as stockRusak');
		$this->db->where($this->primary,$id);
		$query = $this->db->get($this->table);
		$hasil = $query->row();
		return $hasil->stockRusak;
	}
	function getStockExp($id){
		$this->db->select('qty_exp as stockExp');
		$this->db->where($this->primary,$id);
		$query = $this->db->get($this->table);
		$hasil = $query->row();
		return $hasil->stockExp;
	}
	function HitOutOfStock(){
		$query = "call HitOutOfStock()";
		$hasil = $this->db->query($query);
		mysqli_next_result($this->db->conn_id);
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		}
	}
	function OutOfStock(){
		$query = "call outOfStock()";
		$hasil = $this->db->query($query);
		mysqli_next_result($this->db->conn_id);
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		}
	}
	function getExpProduct($tgl){
		$query = "call getExpProduct('".$tgl."')";
		$hasil = $this->db->query($query);
		mysqli_next_result($this->db->conn_id);
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		}
	}

	function qtyTerjual($id,$awal,$akhir){
		$query = "call getQtyTerjual('".$id."','".$awal."','".$akhir."')";
		$hasil = $this->db->query($query);
		mysqli_next_result($this->db->conn_id);
		if ($hasil->num_rows() > 0) {
				$row = $hasil->row();
				return $row->qtyTerjual;
		}
	}

}
