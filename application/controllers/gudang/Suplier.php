<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suplier extends CI_Controller {


    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login')=="") {
            redirect('Auth');
        }
        $this->load->library('Template','template');
        $this->load->model('Pegawai_model','pegawai');
        $this->load->model('Suplier_model','suplier');
        $this->load->helper('date');
        $this->load->helper('tanggal');
        date_default_timezone_set("Asia/Jakarta");

    }
    public function index(){
        $data['suplier'] = $this->suplier->read();
        $this->template->layout('suplier/table',$data);
    }
    public function create(){
        if (count($this->input->post()) > 0) {
            $post = $this->input->post();
            $post['id_mst_pegawai'] = $this->session->userdata('id_mst_pegawai');
            $this->db->trans_start();
                $this->suplier->create($post);
            $this->db->trans_complete();
            if ($this->db->trans_status() === false) {
               $this->session->set_flashdata("pesan_eror",AlertFailed(' Gagal Menyimpan Data ! '));
                   redirect('gudang/suplier','refresh');
            }else{
               $this->session->set_flashdata("pesan_eror",AlertSuccess(' Berhasil Menyimpan Data !'));
                   redirect('gudang/suplier','refresh');
            }
        }
        $this->template->layout('suplier/create');
    }
    public function edit($id = 0){
        if (count($this->input->post()) > 0) {
            $post = $this->input->post();
            $post['id_mst_pegawai'] = $this->session->userdata('id_mst_pegawai');
            $post['is_update'] = date('Y-m-d H:i:s');
            $this->db->trans_start();
                $this->suplier->update($post,$id);
            $this->db->trans_complete();
            if ($this->db->trans_status() === false) {
               $this->session->set_flashdata("pesan_eror",AlertFailed(' Gagal Update Data ! '));
                   redirect('gudang/suplier','refresh');
            }else{
               $this->session->set_flashdata("pesan_eror",AlertSuccess(' Berhasil Update Data !'));
                   redirect('gudang/suplier','refresh');
            }
        }
        $data['suplier'] = $this->suplier->getById($id);
        $this->template->layout('suplier/edit',$data);
    }
    public function delete($id = 0){
        $this->db->trans_start();
            $this->suplier->delete($id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
               $this->session->set_flashdata("pesan_eror",AlertFailed(' Gagal Hapus Data ! '));
                   redirect('gudang/suplier','refresh');
        }else{
               $this->session->set_flashdata("pesan_eror",AlertSuccess(' Berhasil Hapus Data !'));
               redirect('gudang/suplier','refresh');
        }
    }
    public function json(){
        echo json_encode($this->suplier->read());
    }

}
