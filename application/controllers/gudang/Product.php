<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {


    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login')=="") {
            redirect('Auth');
        }
        $this->load->library('Template','template');
        $this->load->model('Pegawai_model','pegawai');
        $this->load->model('Product_model','product');
        $this->load->helper('date');
        $this->load->helper('tanggal');
        date_default_timezone_set("Asia/Jakarta");

    }
    public function index(){
        $data['test'] = $this->product->HitOutOfStock();
        $data['product'] = $this->product->read();
        $this->template->layout('product/master/table',$data);
    }
    public function create(){
        if (count($this->input->post()) > 0) {
            $post = $this->input->post();
            $post['id_mst_pegawai'] = $this->session->userdata('id_mst_pegawai');
            $this->db->trans_start();
                $this->product->create($post);
            $this->db->trans_complete();
            if ($this->db->trans_status() === false) {
               $this->session->set_flashdata("pesan_eror",AlertFailed(' Gagal Menyimpan Data ! '));
                   redirect('gudang/product','refresh');
            }else{
               $this->session->set_flashdata("pesan_eror",AlertSuccess(' Berhasil Menyimpan Data !'));
                   redirect('gudang/product','refresh');
            }
        }
        $this->template->layout('product/master/create');
    }
    public function verifKatalog($id = 0){
        $post['flag_aktif'] = 1;
        $post['is_update'] = date('Y-m-d H:i:s');
        $this->db->trans_start();
            $this->product->update($post,$id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
               $this->session->set_flashdata("pesan_eror",AlertFailed(' Gagal Verif Data ! '));
                   redirect('gudang/product','refresh');
        }else{
               $this->session->set_flashdata("pesan_eror",AlertSuccess(' Berhasil Verif Data !'));
               redirect('gudang/product','refresh');
        }
    }
    public function edit($id = 0){
        if (count($this->input->post()) > 0) {
            $post = $this->input->post();
            $post['id_mst_pegawai'] = $this->session->userdata('id_mst_pegawai');
            $post['is_update'] = date('Y-m-d H:i:s');
            $this->db->trans_start();
                $this->product->update($post,$id);
            $this->db->trans_complete();
            if ($this->db->trans_status() === false) {
               $this->session->set_flashdata("pesan_eror",AlertFailed(' Gagal Update Data ! '));
                   redirect('gudang/product','refresh');
            }else{
               $this->session->set_flashdata("pesan_eror",AlertSuccess(' Berhasil Update Data !'));
                   redirect('gudang/product','refresh');
            }
        }
        $data['product'] = $this->product->getById($id);
        $this->template->layout('product/master/edit',$data);
    }
    public function delete($id = 0){
        $this->db->trans_start();
            $this->product->delete($id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
               $this->session->set_flashdata("pesan_eror",AlertFailed(' Gagal Hapus Data ! '));
                   redirect('gudang/product','refresh');
        }else{
               $this->session->set_flashdata("pesan_eror",AlertSuccess(' Berhasil Hapus Data !'));
               redirect('gudang/product','refresh');
        }
    }

    public function jsonpenjualan(){
        echo json_encode($this->product->readJson());
    }
    public function json(){
        echo json_encode($this->product->read());
    }

}
