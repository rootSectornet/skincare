<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockOfname extends CI_Controller {


    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login')=="") {
            redirect('Auth');
        }
        $this->load->library('Template','template');
        $this->load->model('Pegawai_model','pegawai');
        $this->load->model('Product_model','product');
        $this->load->model('StockOfName_model','ofname');
        $this->load->helper('date');
        $this->load->helper('tanggal');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index(){
      $data['list'] = $this->ofname->read(date('Y-m-d'));
      $this->template->layout('stockofname/table',$data);
    }
    public function list(){
        $data['list'] = $this->ofname->read($this->input->post('tgl'));
        $this->load->view('stockofname/list',$data);
    }
    public function create(){
      $post = $this->input->post('stock');
      if (count($post) > 0) {
        $post['id_mst_pegawai'] = $this->session->userdata('id_mst_pegawai');
        $post['tgl_stockOfName'] = date('Y-m-d');
        $this->db->trans_start();
          $this->ofname->create($post);
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
           $this->session->set_flashdata("pesan_eror",AlertFailed(' Gagal Buat Stock Of Name'));
           redirect('gudang/StockOfname/','refresh');
        }else{
           $this->session->set_flashdata("pesan_eror",AlertSuccess(' Berhasil Buat Stock Of Name!'));
           redirect('gudang/StockOfname/','refresh');
        }
      }
      $this->template->layout('stockofname/create');
    }
    public function search(){
      $post = json_decode($this->input->post('post'));
      $product = $this->product->getById($post->id_product);
      foreach ($product as $key => $row) {
        $product[$key]->qtyTerjual = $this->product->qtyTerjual($post->id_product,$post->awal,$post->akhir);
      }
      echo json_encode($product);
    }
    public function verif($id){
      $data['ofname'] = $this->ofname->getById($id);
      $updateStock['qty'] = $data['ofname']->qty_baru;
      $updateStock['is_update'] = date('Y-m-d H:i:s');
      $updateOfname['is_update'] = date('Y-m-d H:i:s');
      $updateOfname['flag_verif'] = '1';
      $this->db->trans_start();
        $this->product->update($updateStock,$data['ofname']->id_product);
        $this->ofname->update($updateOfname,$id);
      $this->db->trans_complete();
      if ($this->db->trans_status() === false) {
         $this->session->set_flashdata("pesan_eror",AlertFailed(' Gagal Verif Stock Of Name'));
         redirect('gudang/StockOfname/','refresh');
      }else{
         $this->session->set_flashdata("pesan_eror",AlertSuccess(' Berhasil Verif Stock Of Name!'));
         redirect('gudang/StockOfname/','refresh');
      }
    }

    public function delete($id){
        $this->db->trans_start();
            $this->ofname->delete($id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
               $this->session->set_flashdata("pesan_eror",AlertFailed(' Gagal Hapus Data ! '));
                   redirect('gudang/StockOfname','refresh');
        }else{
               $this->session->set_flashdata("pesan_eror",AlertSuccess(' Berhasil Hapus Data !'));
               redirect('gudang/StockOfname','refresh');
        }
    }
}
