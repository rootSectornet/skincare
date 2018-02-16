<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail_trx_tindakan_model extends CI_Model{

	private $table = "detail_trx_tindakan";
	private $primary = "id_detail_trx_tindakan";

	function read(){
		$this->db->join('mst_tindakan','mst_tindakan.id_mst_tindakan = detail_trx_tindakan.id_mst_tindakan','INNER');
		return $this->db->get($this->table)->result();
	}
	function getById($id){
		$this->db->join('mst_tindakan','mst_tindakan.id_mst_tindakan = detail_trx_tindakan.id_mst_tindakan','INNER');
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
	function getByTrx($id){
		$this->db->where('id_trx_tindakan',$id);
		$this->db->join('mst_tindakan','mst_tindakan.id_mst_tindakan = detail_trx_tindakan.id_mst_tindakan','INNER');
		return $this->db->get($this->table)->result();
	}
	function delete($id_detail_trx_tindakan){
		$this->db->where($this->primary,$id_detail_trx_tindakan);
		$this->db->delete($this->table);
	}

}