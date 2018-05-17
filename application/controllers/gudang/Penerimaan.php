<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan extends CI_Controller {


    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login')=="") {
            redirect('Auth');
        }
        $this->load->library('Template','template');
        $this->load->model('Pegawai_model','pegawai');
        $this->load->model('Suplier_model','suplier');
        $this->load->model('Product_model','product');
        $this->load->model('Penerimaan_model','penerimaan');
        $this->load->model('Detail_Penerimaan_model','detailPenerimaan');
        $this->load->helper('date');
        $this->load->helper('tanggal');
        date_default_timezone_set("Asia/Jakarta");

    }
    public function index(){
        $data['penerimaan'] = $this->penerimaan->getoneDay(date('Y-m-d'));
        $this->template->layout('penerimaan/table',$data);
    }
    public function list_penerimaan(){
        $data['penerimaan'] = $this->penerimaan->getoneDay($this->input->post('tgl'));
        $this->load->view('penerimaan/list',$data);
    }
    public function create(){
      if (count($this->input->post()) > 0) {
        $post = $this->input->post();
        $this->db->trans_start();
        $total = 0;
          foreach ($post['detail'] as $key => $rows) {
            $total += $rows['sub_total'];
          }
          $post['head']['total'] = $total;
          $post['head']['id_mst_pegawai'] = $this->session->userdata('id_mst_pegawai');
          $this->penerimaan->create($post['head']);

            foreach ($post['detail'] as $key => $row) {
              $row['faktur_penerimaan'] = $post['head']['faktur_penerimaan'];
              $this->detailPenerimaan->create($row);
            }
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
           $this->session->set_flashdata("pesan_eror",AlertFailed(' Gagal Menyimpan Data ! '));
           redirect('gudang/penerimaan/','refresh');
        }else{
           $this->session->set_flashdata("pesan_eror",AlertSuccess(' Berhasil Menyimpan Data !'));
               redirect('gudang/penerimaan/detail/'.$post['head']['faktur_penerimaan'],'refresh');
        }
      }
        $this->template->layout('penerimaan/create');
    }

    public function detail($NoFaktur){
      $data['penerimaan']['head'] = $this->penerimaan->getById($NoFaktur);
      $data['penerimaan']['detail'] = $this->detailPenerimaan->getByNoFaktur($NoFaktur);
      $this->template->layout('penerimaan/detail',$data);
    }

    public function edit($NoFaktur){
      if (count($this->input->post()) > 0) {
        $post = $this->input->post();
        $this->db->trans_start();
        $total = 0;
          foreach ($post['detail'] as $key => $rows) {
            $total += $rows['sub_total'];
          }
          $post['head']['total'] = $total;
          $post['head']['id_mst_pegawai'] = $this->session->userdata('id_mst_pegawai');
          $this->penerimaan->update($post['head'],$NoFaktur);
            foreach ($this->detailPenerimaan->getByNoFaktur($NoFaktur) as $key => $value) {
              $this->detailPenerimaan->delete($value->id_detail_penerimaan);
            }
            foreach ($post['detail'] as $key => $row) {
              $row['faktur_penerimaan'] = $post['head']['faktur_penerimaan'];
              $this->detailPenerimaan->create($row);
            }
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
           $this->session->set_flashdata("pesan_eror",AlertFailed(' Gagal Menyimpan Data ! '));
           redirect('gudang/penerimaan/','refresh');
        }else{
           $this->session->set_flashdata("pesan_eror",AlertSuccess(' Berhasil Menyimpan Data !'));
               redirect('gudang/penerimaan/detail/'.$post['head']['faktur_penerimaan'],'refresh');
        }
      }
      $data['penerimaan']['head'] = $this->penerimaan->getById($NoFaktur);
      $data['penerimaan']['detail'] = $this->detailPenerimaan->getByNoFaktur($NoFaktur);
      $this->template->layout('penerimaan/edit',$data);
    }

    public function verif($NoFaktur){
      $datadetail = $this->detailPenerimaan->getByNoFaktur($NoFaktur);
      $dataFlag = array(
        'flag_verif' => '1'
      );
      $this->penerimaan->update($dataFlag,$NoFaktur);
      foreach ($datadetail as $key => $row) {
        $dataProduct = $this->product->getById($row->id_product);
        // print_r($datadetail);
        foreach ($dataProduct as $keys => $DpRow) {
          $data = array(
            'qty' =>  $DpRow->qty + $row->qty,
            'harga_beli'  =>  $row->harga,
            'harga_jual'  =>  $row->harga_jual,
            'exp'         =>  $row->tgl_exp,
            'is_update'   =>  date('Y-m-d H:i:s')
          );
          $this->db->trans_start();
            $this->product->update($data,$row->id_product);
          $this->db->trans_complete();
          if ($this->db->trans_status() === false) {
             $this->session->set_flashdata("pesan_eror",AlertFailed(' Gagal Verif  Data ! '));
          }else{
             $this->session->set_flashdata("pesan_eror",AlertSuccess(' Berhasil Verif Data ! Silahkan Cek Stock Di Master Katalog Obat'));
          }
        }
      }
      redirect('gudang/penerimaan/','refresh');
    }
    public function unverif($NoFaktur){
        $dataFlag = array(
          'flag_verif' => '0'
        );
        $datadetail = $this->detailPenerimaan->getByNoFaktur($NoFaktur);
        foreach ($datadetail as $key => $row) {
          $dataProduct = $this->product->getById($row->id_product);
          foreach ($dataProduct as $keys => $DpRow) {
            $data = array(
              'qty' =>  $DpRow->qty - $row->qty,
            );
            $this->db->trans_start();
              $this->product->update($data,$row->id_product);
            $this->db->trans_complete();
            if ($this->db->trans_status() === false) {
               $this->session->set_flashdata("pesan_eror",AlertFailed(' Gagal UnVerif  Data ! '));
            }else{
               $this->session->set_flashdata("pesan_eror",AlertSuccess(' Berhasil UnVerif Data ! Silahkan Cek Stock Di Master Katalog Obat'));
            }
          }
        }
        $this->db->trans_start();
          $this->penerimaan->update($dataFlag,$NoFaktur);
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
           $this->session->set_flashdata("pesan_eror",AlertFailed(' Gagal UnVerif  Data ! '));
           redirect('gudang/penerimaan/','refresh');
        }else{
           $this->session->set_flashdata("pesan_eror",AlertSuccess(' Berhasil UnVerif Data ! Silahkan Cek Stock Di Master Katalog Obat'));
           redirect('gudang/penerimaan/','refresh');
        }
    }
    public function delete($NoFaktur){
      $this->db->trans_start();
        $this->penerimaan->delete($NoFaktur);
      $this->db->trans_complete();
      if ($this->db->trans_status() === false) {
         $this->session->set_flashdata("pesan_eror",AlertFailed(' Gagal Hapus  Data !, Silahkan Kosongkan Terlebih Dahulu  DetailNya'));
         redirect('gudang/penerimaan/','refresh');
      }else{
         $this->session->set_flashdata("pesan_eror",AlertSuccess(' Berhasil Hapus Data !'));
         redirect('gudang/penerimaan/','refresh');
      }
    }


    public function print($NoFaktur){
        $data['penerimaan']['head'] = $this->penerimaan->getById($NoFaktur);
        $data['penerimaan']['detail'] = $this->detailPenerimaan->getByNoFaktur($NoFaktur);
        $this->load->view('penerimaan/print',$data);
    }

}
