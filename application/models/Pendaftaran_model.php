<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model{

	private $table = "pendaftaran";
	private $primary = "id_trx_pendaftaran";

	function getByID($id){
		$this->db->where($this->primary,$id);
		$this->db->join('mst_pasien','mst_pasien.id_mst_pasien = pendaftaran.id_mst_pasien','INNER');
		$this->db->join('mst_pegawai','mst_pegawai.id_mst_pegawai = pendaftaran.id_mst_pegawai','INNER');
		$this->db->join('kelurahan','kelurahan.id_kel = mst_pasien.id_kel','INNER');
		$this->db->join('kecamatan','kecamatan.id_kec = kelurahan.id_kec','INNER');
		$this->db->join('kabupaten','kabupaten.id_kab = kecamatan.id_kab','INNER');
		$this->db->join('provinsi','provinsi.id_prov = kabupaten.id_prov','INNER');
		return $this->db->get($this->table)->result();
	}
	function read(){
		$this->db->join('mst_pegawai','mst_pegawai.id_mst_pegawai = pendaftaran.id_mst_pegawai','INNER');
		$this->db->join('mst_pasien','mst_pasien.id_mst_pasien = pendaftaran.id_mst_pasien','INNER');
		$this->db->join('kelurahan','kelurahan.id_kel = mst_pasien.id_kel','INNER');
		$this->db->join('kecamatan','kecamatan.id_kec = kelurahan.id_kec','INNER');
		$this->db->join('kabupaten','kabupaten.id_kab = kecamatan.id_kab','INNER');
		$this->db->join('provinsi','provinsi.id_prov = kabupaten.id_prov','INNER');
		return $this->db->get($this->table)->result();
	}
	function getoneDay($date){
		$this->db->where('pendaftaran.tgl',$date);
		$this->db->join('mst_pegawai','mst_pegawai.id_mst_pegawai = pendaftaran.id_mst_pegawai','INNER');
		$this->db->join('mst_pasien','mst_pasien.id_mst_pasien = pendaftaran.id_mst_pasien','INNER');
		$this->db->join('kelurahan','kelurahan.id_kel = mst_pasien.id_kel','INNER');
		$this->db->join('kecamatan','kecamatan.id_kec = kelurahan.id_kec','INNER');
		$this->db->join('kabupaten','kabupaten.id_kab = kecamatan.id_kab','INNER');
		$this->db->join('provinsi','provinsi.id_prov = kabupaten.id_prov','INNER');
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

	function kode_pendaftaran(){
		$this->db->select('RIGHT(pendaftaran.id_trx_pendaftaran,5)as kode',FALSE);
		$this->db->order_by('id_trx_pendaftaran','DESC');
		$this->db->limit(1);
		$query = $this->db->get('pendaftaran');
		if ($query->num_rows()<>0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;

		}else{
			$kode = 1;
		}
		$kodemax = str_pad($kode,5,"000",STR_PAD_LEFT);
		$kodejadi = 'P'.$kodemax;
		return $kodejadi;
	}

}