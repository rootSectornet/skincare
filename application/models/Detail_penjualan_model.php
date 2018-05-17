<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class detail_penjualan_model extends CI_Model{

	private $table = "detail_penjualan";
	private $primary = "id_detail_penjualan";

	function read(){
		$this->db->select('detail_penjualan.*,nama_product');
		$this->db->join('product','product.id_product = detail_penjualan.id_product','INNER');
		return $this->db->get($this->table)->result();
	}
	function getByNoFaktur($NoFaktur){
		$this->db->select('detail_penjualan.*,nama_product');
			$this->db->join('product','product.id_product = detail_penjualan.id_product','INNER');
				$this->db->where('faktur_penjualan',$NoFaktur);
				return $this->db->get($this->table)->result();
	}
	function getById($id){
		$this->db->where($this->primary,$id);
		return $this->db->get($this->table)->row();
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
	function getSubTotal($id){
		$this->db->select('sub_total');
		$this->db->where($this->primary,$id);
		$query = $this->db->get($this->table);
		$hasil =  $query->row();
		return $hasil->sub_total;
	}
}
