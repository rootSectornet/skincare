<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PemakaianObat_model extends CI_Model{

	private $table = "pemakaian_obat";
	private $primary = "id_pemakaian_obat";

  function create($data){
  		$this->db->insert($this->table,$data);
  }
  function read($id_trx_tindakan){
		$this->db->select('pemakaian_obat.*,nama_product,nama_pegawai');
    $this->db->where('id_detail_trx_tindakan',$id_trx_tindakan);
		$this->db->join('product','product.id_product = pemakaian_obat.id_product','INNER');
		$this->db->join('mst_pegawai','mst_pegawai.id_mst_pegawai = pemakaian_obat.id_mst_pegawai','INNER');
    return $this->db->get($this->table)->result();
  }
	function getById($id){
		$this->db->where($this->primary,$id);
		$this->db->join('detail_trx_tindakan','detail_trx_tindakan.id_detail_trx_tindakan = pemakaian_obat.id_detail_trx_tindakan','INNER');
		$this->db->join('trx_tindakan','trx_tindakan.id_trx_tindakan = detail_trx_tindakan.id_trx_tindakan','INNER');
		$this->db->join('product','product.id_product = pemakaian_obat.id_product','INNER');
		$this->db->join('mst_pegawai','mst_pegawai.id_mst_pegawai = pemakaian_obat.id_mst_pegawai','INNER');
		$data = $this->db->get($this->table);
		return $data->row();
	}
	function delete($id){
		$this->db->where($this->primary,$id);
		$this->db->delete($this->table);
	}
}
