<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {


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
        $this->load->model('Trx_tindakan_model','trx_tindakan');
        $this->load->model('Detail_trx_tindakan_model','detail_trx_tindakan');
        $this->load->model('Detail_penjualan_model','detailPenjualan');
        $this->load->model('PemakaianObat_model','pemakaian_obat');
        $this->load->helper('date');
        $this->load->helper('tanggal');
        date_default_timezone_set("Asia/Jakarta");

    }
    public function index(){
        $data['pasien'] = $this->pasien->read();
        $this->template->layout('pasien/table',$data);
    }
    public function create(){
        if (count($this->input->post()) > 0) {
            $post = $this->input->post();
            $data_post = array(
                'nama_pasien' => $post['nama_pasien'],
                'no_rm' => $post['no_rm'],
                'tgl_lahir' => $post['tgl_lahir'],
                'no_telp' => $post['no_tlp'],
                'gender' => $post['gender'],
                'alamat' => $post['alamat'],
                'id_kel' => $post['id_kel']
            );

            $this->db->trans_start();
                $this->pasien->create($data_post);
            $this->db->trans_complete();
            if ($this->db->trans_status() === false) {
                   $this->session->set_flashdata("pesan_eror","<div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                            Gagal Menyimpan Data !
                    </div>");
           redirect('pasien/pasien','refresh');
            }else{
                   $this->session->set_flashdata("pesan_eror","<div class='alert bg-blue alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                               Succes Menyimpan Data !.
                            </div>");
                   redirect('pasien/pasien','refresh');
            }
        }
        $data['noRm'] = $this->pasien->noRm();
        $data['kelurahan'] = $this->kelurahan->read();
        $this->template->layout('pasien/create',$data);
    }
    public function alamat(){
        $kelurahan = $this->kelurahan->read();
        echo json_encode($kelurahan);
    }
    public function update($id){
        if (count($this->input->post()) > 0) {
            $post = $this->input->post();
            $data_post = array(
                'nama_pasien' => $post['nama_pasien'],
                'no_rm' => $post['no_rm'],
                'tgl_lahir' => $post['tgl_lahir'],
                'no_telp' => $post['no_tlp'],
                'gender' => $post['gender'],
                'alamat' => $post['alamat'],
                'id_kel' => $post['id_kel']
            );

            $this->db->trans_start();
                $this->pasien->update($data_post,$id);
            $this->db->trans_complete();
            if ($this->db->trans_status() === false) {
                   $this->session->set_flashdata("pesan_eror","<div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                            Gagal Update Data !
                    </div>");
           redirect('pasien/pasien','refresh');
            }else{
                   $this->session->set_flashdata("pesan_eror","<div class='alert bg-blue alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                               Succes Update Data !.
                            </div>");
                   redirect('pasien/pasien','refresh');
            }
        }
        $data['pasien'] = $this->pasien->getByID($id);
        $this->template->layout('pasien/update',$data);
    }
    public function delete($id){
        $this->db->trans_start();
            $this->pasien->delete($id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
               $this->session->set_flashdata("pesan_eror","<div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                        Gagal Hapus Data !
                </div>");
       redirect('pasien/pasien','refresh');
        }else{
               $this->session->set_flashdata("pesan_eror","<div class='alert bg-blue alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                           Succes Hapus Data !.
                        </div>");
               redirect('pasien/pasien','refresh');
        }
    }

    public function detail($id_mst_pasien){
        $data['pasien'] = $this->pasien->getByID($id_mst_pasien);
        $data['pendaftaran'] = $this->pendaftaran->getByPasien($id_mst_pasien);
        $data['penjualan'] = $this->pasien->getRiwayatPembelian($id_mst_pasien);
        foreach ($data['penjualan'] as $key => $pjl) {
            $pjl->obats = $this->detailPenjualan->getByNoFaktur($pjl->faktur_penjualan);
        }
        foreach ($data['pendaftaran'] as $key => $row) {
            $hasil_head = $this->trx_tindakan->getByPendaftaran($row->id_trx_pendaftaran);
            $row->tindakan = $hasil_head;
            foreach ($hasil_head as $key => $value) {
                $hasil_detail = $this->detail_trx_tindakan->getByTrx($value->id_trx_tindakan);
                $value->detail = $hasil_detail;
                foreach ($hasil_detail as $key => $po) {
                	$po->pemakaianObat = $this->pemakaian_obat->read($po->id_detail_trx_tindakan);
                }
            }
        }
        $this->template->layout('pasien/detail',$data);
    }

    public function updateTemp(){
      $data['id_kel'] = '1411';
      $pasien = $this->pasien->read();
      foreach ($pasien as $key => $value) {
          $this->pasien->update($data,$value->id_mst_pasien);
      }
    }
    public function testing(){
      $pasien = $this->pasien->read();
      $i = 1;
      foreach ($pasien as $key => $value) {
        echo "RM".sprintf("%07d", $i)."-Nama-".$value->nama_pasien."<br>";
          $data['no_rm'] = "RM".$value->no_rm;
          $this->pasien->update($data,$value->id_mst_pasien);
          $i++;
      }
    }

}