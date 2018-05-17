<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {


    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login')=="") {
            redirect('Auth');
        }
        $this->load->library('Template','template');
        $this->load->model('User_model','user');
        $this->load->model('Pegawai_model','pegawai');
        $this->load->model('Pasien_model','pasien');
        $this->load->model('Group_access_model','group_access');
        $this->load->model('Menu_model','menu');
        $this->load->model('Menu_access_model','menu_access');
        $this->load->model('Kelurahan_model','kelurahan');
        $this->load->model('Pendaftaran_model','pendaftaran');
        $this->load->model('PemakaianObat_model','pemakaian_obat');
        $this->load->model('Trx_tindakan_model','trx_tindakan');
        $this->load->model('Detail_trx_tindakan_model','detail_trx_tindakan');
        $this->load->model('Billing_model','Billing');
        $this->load->model('Penjualan_model','penjualan');
        $this->load->model('Detail_penjualan_model','detailPenjualan');
        $this->load->model('Retur_model','Retur');
        $this->load->model('Penerimaan_model','penerimaan');
        $this->load->model('Detail_Penerimaan_model','detailPenerimaan');
        $this->load->model('Suplier_model','suplier');
        $this->load->helper('date');
        $this->load->helper('tanggal');
        date_default_timezone_set("Asia/Jakarta");
    }


    public function penjualan(){
      $this->template->layout('Laporan/penjualan/table');
    }
    public function listLaporanPenjualan(){
      $post = json_decode($this->input->post('data'));
      if ($post->option == '2') {
        $data['hasil'] = $this->penjualan->LaporanLunas($post->awal,$post->akhir);
      }elseif ($post->option == '3') {
        $data['hasil'] = $this->penjualan->LaporanBLunas($post->awal,$post->akhir);
      }else{
          $data['hasil'] = $this->penjualan->LaporanAll($post->awal,$post->akhir);
      }
      $this->load->view('Laporan/penjualan/list',$data);
    }

    public function listLaporanPenjualanPrint($awal,$akhir,$option){
        if ($option == '2') {
          $data['hasil'] = $this->penjualan->LaporanLunas($awal,$akhir);
        }elseif ($post->option == '3') {
          $data['hasil'] = $this->penjualan->LaporanBLunas($awal,$akhir);
        }else{
            $data['hasil'] = $this->penjualan->LaporanAll($awal,$akhir);
        }
        foreach ($data['hasil'] as $key => $head) {
          $data['hasil'][$key]->detail = $this->detailPenjualan->getByNoFaktur($head->faktur_penjualan);
          foreach ($data['hasil'][$key]->detail as $keys => $row) {
            $data['hasil'][$key]->detail[$keys]->retur = $this->Retur->getByIdDetail($row->id_detail_penjualan);
          }
        }
        $data['awal'] = $awal;
        $data['akhir'] = $akhir;
        $data['option'] = $option;
        $this->load->view('Laporan/penjualan/print',$data);
    }

    public function penerimaan(){
      $this->template->layout('Laporan/penerimaan/table');
    }

    public function listLaporanPenerimaan(){
      $post = json_decode($this->input->post('data'));
      $data['head'] = $this->penerimaan->laporanPenerimaan($post->id,$post->awal,$post->akhir);
      $this->load->view('Laporan/penerimaan/list',$data);
    }
    public function listLaporanPenerimaanPrint($awal,$akhir,$id){
      $data['head'] = $this->penerimaan->laporanPenerimaan($id,$awal,$akhir);
      foreach ($data['head'] as $key => $row) {
        $data['head'][$key]->detail = $this->detailPenerimaan->getByNoFaktur($row->faktur_penerimaan);
      }
      $data['awal'] = $awal;
      $data['akhir'] = $akhir;
      $data['suplier'] = $this->suplier->getById($id);
      $this->load->view('Laporan/penerimaan/print',$data);
    }

    public function pengunjung(){
      $this->template->layout('Laporan/pengunjung/table');
    }
    public function listLaporanPengunjung(){
      $post = json_decode($this->input->post('data'));
      if ($post->option == '2') {
        $data['head'] = $this->pendaftaran->laporanPengunjungAll($post->awal,$post->akhir);
      }else{
        $data['head'] = $this->pendaftaran->laporanPengunjung($post->option,$post->awal,$post->akhir);
      }
      foreach ($data['head'] as $key => $row) {
        $data['head'][$key]->total = $this->pendaftaran->totalTagihan($row->id_trx_pendaftaran);
      }
      $this->load->view('Laporan/pengunjung/list',$data);
    }

    public function listLaporanPengunjungPrint($awal,$akhir,$flag){
        if ($flag == '2') {
          $data['head'] = $this->pendaftaran->laporanPengunjungAll($awal,$akhir);
        }else{
          $data['head'] = $this->pendaftaran->laporanPengunjung($flag,$awal,$akhir);
        }
        foreach ($data['head'] as $key => $row) {
          $data['head'][$key]->total = $this->pendaftaran->totalTagihan($row->id_trx_pendaftaran);
          $data['head'][$key]->headTindakan = $this->trx_tindakan->getByPendaftaran($row->id_trx_pendaftaran);
          foreach ($data['head'][$key]->headTindakan as $ht => $Hrow) {
            $data['head'][$key]->headTindakan[$ht]->detailTindakan = $this->detail_trx_tindakan->getByTrx($Hrow->id_trx_tindakan);
          }
        }
        $data['awal'] = $awal;
        $data['akhir'] = $akhir;
        $this->load->view('Laporan/pengunjung/print',$data);
    }
}
