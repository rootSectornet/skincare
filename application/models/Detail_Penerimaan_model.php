<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail_Penerimaan_model extends CI_Model{

	private $table = "detail_penerimaan";
	private $primary = "id_detail_penerimaan";

	function read(){
		$this->db->select('detail_penerimaan.*,nama_product');
		$this->db->join('product','product.id_product = detail_penerimaan.id_product','INNER');
		return $this->db->get($this->table)->result();
	}
	function getByNoFaktur($NoFaktur){
		$this->db->select('detail_penerimaan.*,nama_product');
			$this->db->join('product','product.id_product = detail_penerimaan.id_product','INNER');
				$this->db->where('faktur_penerimaan',$NoFaktur);
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
}
