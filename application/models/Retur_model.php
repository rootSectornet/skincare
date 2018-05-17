<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retur_model extends CI_Model{

	private $table = "retur";
	private $primary = "id_retur";

	function read(){
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
  function getByIdDetail($idDetail){
    $this->db->where('id_detail',$idDetail);
    $this->db->join('product','product.id_product = retur.id_product','INNER');
    $this->db->join('mst_pegawai','mst_pegawai.id_mst_pegawai = retur.id_mst_pegawai','INNER');
    $query =  $this->db->get($this->table);
    $hasil = $query->row();
    return $hasil;
  }

}
