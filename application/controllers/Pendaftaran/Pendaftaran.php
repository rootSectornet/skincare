<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {


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
        $this->load->model('Tindakan_model','tindakan');
        $this->load->model('Trx_tindakan_model','trx_tindakan');
        $this->load->model('Detail_trx_tindakan_model','detail_trx_tindakan');
        $this->load->helper('date');
        date_default_timezone_set("Asia/Jakarta");

    }
    public function index(){
        $data['pendaftaran'] = $this->pendaftaran->getoneDay(date('Y-m-d'));
        $this->template->layout('pendaftaran/table',$data);
    }
    public function create(){
        $post = $this->input->post();
        if (isset($post['id_trx_pendaftaran'])) {
            $data_pendaftaran = array(
                'id_trx_pendaftaran' => $post['id_trx_pendaftaran'],
                'id_mst_pasien' => $post['id_mst_pasien'],
                'id_mst_pegawai' => $this->session->userdata('id_mst_pegawai'),
                'keterangan' => $post['keterangan']
            );
            $this->db->trans_start();
                $this->pendaftaran->create($data_pendaftaran);
            $this->db->trans_complete();
            if ($this->db->trans_status() === false) {
                   $this->session->set_flashdata("pesan_eror","<div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                            Gagal Menyimpan Data !
                    </div>");
            }else{
                   $this->session->set_flashdata("pesan_eror","<div class='alert bg-blue alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                               Succes Menyimpan Data !.
                            </div>");
                   redirect('pendaftaran/pendaftaran','refresh');
            }
        }
        $data['kode_pendaftaran'] = $this->pendaftaran->kode_pendaftaran();
        $this->template->layout('pendaftaran/create',$data);
    }
    public function cari_pasien(){
        $data_pasien = $this->pasien->read();
        echo json_encode($data_pasien);
    }
    public function list_pendaftaran(){
        $data['pendaftaran'] = $this->pendaftaran->getoneDay($this->input->post('tgl'));
        $this->load->view('pendaftaran/list',$data);
    }
    public function detail($id = 0){
        $data['pendaftaran'] = $this->pendaftaran->getByID($id);
        $dataTrxTindakan = $this->trx_tindakan->getByPendaftaran($id);
        foreach ($dataTrxTindakan as $key => $row) {
            $dataTrxTindakan[$key]->detail = $this->detail_trx_tindakan->getByTrx($row->id_trx_tindakan);
        }
        $data['trx_tindakan'] = $dataTrxTindakan;
        $data['tindakan'] = $this->tindakan->read();
        $this->template->layout('pendaftaran/detail',$data);
    }
    public function tindakan(){
        echo json_encode($this->tindakan->read());
    }
    public function insert_tindakan(){
        $post = $this->input->post();
        $id_trx_pendaftaran = $post['id_trx_pendaftaran'];
        $this->db->trans_start();
            $data_trx = array(
                'id_trx_pendaftaran' => $post['id_trx_pendaftaran'],
                'id_mst_pegawai' => $post['id_mst_pegawai'],
                'total' => $post['harga']
            );
            $id = $this->trx_tindakan->create($data_trx);
            $data_detail_trx = array(
                'id_trx_tindakan' => $id,
                'id_mst_tindakan' => $post['id_mst_tindakan'],
                'harga' => $post['harga']
            );
            $this->detail_trx_tindakan->create($data_detail_trx);
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
               $this->session->set_flashdata("pesan_eror","<div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                        Gagal Menyimpan Data !
                </div>");
               redirect('pendaftaran/pendaftaran/detail/'.$id_trx_pendaftaran,'refresh');
        }else{
               $this->session->set_flashdata("pesan_eror","<div class='alert bg-blue alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                           Succes Menyimpan Data !.
                        </div>");
               redirect('pendaftaran/pendaftaran/detail/'.$id_trx_pendaftaran,'refresh');
        }
    }

    public function insert_tindakanOnDokter(){
        $post = $this->input->post();
        $id_trx_pendaftaran = $post['id_trx_pendaftaran'];
        $this->db->trans_start();
            $data_trx = array(
                'total' => $post['harga'] + $post['total']
            );
            $this->trx_tindakan->update($data_trx,$post['id_trx_tindakan']);
            $data_detail_trx = array(
                'id_trx_tindakan' => $post['id_trx_tindakan'],
                'id_mst_tindakan' => $post['id_mst_tindakan'],
                'harga' => $post['harga']
            );
            $this->detail_trx_tindakan->create($data_detail_trx);
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
               $this->session->set_flashdata("pesan_eror","<div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                        Gagal Menyimpan Data !
                </div>");
               redirect('pendaftaran/pendaftaran/detail/'.$id_trx_pendaftaran,'refresh');
        }else{
               $this->session->set_flashdata("pesan_eror","<div class='alert bg-blue alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                           Succes Menyimpan Data !.
                        </div>");
               redirect('pendaftaran/pendaftaran/detail/'.$id_trx_pendaftaran,'refresh');
        }
    }
    public function hapus_tindakan($Iddetail, $IdHead, $total, $harga, $id_trx_pendaftaran){
        $post = $this->input->post();
        $data_tindakan = array(
            'total' =>  $total - $harga,
            'is_update' =>  date('Y-m-d H:i:s')
        );
        $this->db->trans_start();
            $this->detail_trx_tindakan->delete($Iddetail);
            $this->trx_tindakan->update($data_tindakan,$IdHead);
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
               $this->session->set_flashdata("pesan_eror","<div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                        Gagal Menyimpan Data !
                </div>");
               redirect('pendaftaran/pendaftaran/detail/'.$id_trx_pendaftaran,'refresh');
        }else{
               $this->session->set_flashdata("pesan_eror","<div class='alert bg-blue alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                           Succes Menyimpan Data !.
                        </div>");
               redirect('pendaftaran/pendaftaran/detail/'.$id_trx_pendaftaran,'refresh');
        }
    }

}