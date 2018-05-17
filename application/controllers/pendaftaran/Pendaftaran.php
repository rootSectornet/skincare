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
        $this->load->model('PemakaianObat_model','pemakaian_obat');
        $this->load->model('Tindakan_model','tindakan');
        $this->load->model('Trx_tindakan_model','trx_tindakan');
        $this->load->model('Detail_trx_tindakan_model','detail_trx_tindakan');
        $this->load->model('Product_model','product');
        $this->load->model('Billing_model','Billing');
        $this->load->helper('date');
        $this->load->helper('tanggal');
        date_default_timezone_set("Asia/Jakarta");

    }
    public function index(){
        $data['pendaftaran'] = $this->pendaftaran->getoneDay(date('Y-m-d'));
        $this->template->layout('pendaftaran/table',$data);
    }
    public function create(){
        $post = $this->input->post();
        if (isset($post['id_trx_pendaftaran'])) {
            $this->db->trans_start();
        	//pendaftaran
            $data_pendaftaran = array(
                'id_trx_pendaftaran' => $post['id_trx_pendaftaran'],
                'id_mst_pasien' => $post['id_mst_pasien'],
                'id_mst_pegawai' => $this->session->userdata('id_mst_pegawai'),
                'keterangan' => $post['keterangan'],
                'tgl'  =>   date('Y-m-d')
            );
            $this->pendaftaran->create($data_pendaftaran);
            //tindakan
            $total = 0;
	        foreach ($post['tindakan'] as $key => $value) {
	          $tmp = $this->tindakan->getByIdo($value['id_tindakan']);
	          $total += $tmp->harga;
	        }
            $data_trx = array(
                'id_trx_pendaftaran' => $post['id_trx_pendaftaran'],
                'id_mst_pegawai' => $this->pendaftaran->getDokter(),
                'total' => $total
            );
            $id = $this->trx_tindakan->create($data_trx);
            $idd = 0;
            foreach ($post['tindakan'] as $key => $value) {
              $tmp = $this->tindakan->getByIdo($value['id_tindakan']);
              $data_detail_trx = array(
                  'id_trx_tindakan' => $id,
                  'id_mst_tindakan' => $value['id_tindakan'],
                  'harga' => $tmp->harga
              );
               $idd = $this->detail_trx_tindakan->create($data_detail_trx);
            }
            //pemakaian obat
            foreach ($post['detail'] as $key => $rowp) {
		        $PemakaianObat = array(
		          'id_detail_trx_tindakan' =>  $idd,
		          'id_product'  => $rowp['id_product'],
		          'id_mst_pegawai'  =>  $this->session->userdata('id_mst_pegawai'),
		          'qtyPemakaian' =>  $rowp['qty'],
		          'harga_jual'  =>  $rowp['harga_jual'],
		          'harga_beli'  =>  $rowp['harga_beli'],
		          'sub_total' =>  $rowp['qty'] * $rowp['harga_jual'],
		          'tanggal' => date('Y-m-d')
		        );
            $total += ($rowp['qty'] * $rowp['harga_jual']);
		        $dataTindakan = array(
		              'total' =>  $total,
		              'is_update' =>  date('Y-m-d H:i:s')
		        );
		        $Stock = $this->product->getStock($rowp['id_product']);
		        $dataProduct = array(
		          'qty' => $Stock - $rowp['qty'],
		          'is_update' =>  date('Y-m-d H:i:s')
		        );
	            $this->trx_tindakan->update($dataTindakan,$id);
	            $this->pemakaian_obat->create($PemakaianObat);
	            $this->product->update($dataProduct,$rowp['id_product']);
            }
	        //billing
            $billing['id_trx_pendaftaran'] = $post['id_trx_pendaftaran'];
            $billing['flag_from'] = '1';
            $billing['id_mst_pegawai'] = $this->session->userdata('id_mst_pegawai');
                $this->Billing->create($billing);
            $this->db->trans_complete();
            if ($this->db->trans_status() === false) {
                   $this->session->set_flashdata("pesan_eror","<div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                            Gagal Menyimpan Data !
                    </div>");
           redirect('pendaftaran/pendaftaran','refresh');
            }else{
                   $this->session->set_flashdata("pesan_eror","<div class='alert bg-blue alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                               Succes Menyimpan Data !.
                            </div>");
                   redirect('pendaftaran/pendaftaran','refresh');
            }
        }
        $data['tindakan'] = $this->tindakan->read();
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
            $dataDetailTrxTindakan = $this->detail_trx_tindakan->getByTrx($row->id_trx_tindakan);
            foreach ($dataDetailTrxTindakan as $i => $ddtt) {
              $dataDetailTrxTindakan[$i]->pemakaianObat = $this->pemakaian_obat->read($ddtt->id_detail_trx_tindakan);
            }
            $dataTrxTindakan[$key]->detail = $dataDetailTrxTindakan;
        }
        $data['trx_tindakan'] = $dataTrxTindakan;
        $data['tindakan'] = $this->tindakan->read();
        $data['dokter'] = $this->pendaftaran->getDokter();
        $this->template->layout('pendaftaran/detail',$data);
    }
    public function tindakan(){
        echo json_encode($this->tindakan->read());
    }
    public function insert_tindakan(){
        $post = $this->input->post();
        $total = 0;
        $id_trx_pendaftaran = $post['id_trx_pendaftaran'];
        foreach ($post['tindakan'] as $key => $value) {
          $tmp = $this->tindakan->getByIdo($value['id_tindakan']);
          $total += $tmp->harga;
        }
        $this->db->trans_start();
            $data_trx = array(
                'id_trx_pendaftaran' => $post['id_trx_pendaftaran'],
                'id_mst_pegawai' => $this->pendaftaran->getDokter(),
                'total' => $total
            );
            $id = $this->trx_tindakan->create($data_trx);

            foreach ($post['tindakan'] as $key => $value) {
              $tmp = $this->tindakan->getByIdo($value['id_tindakan']);
              $data_detail_trx = array(
                  'id_trx_tindakan' => $id,
                  'id_mst_tindakan' => $value['id_tindakan'],
                  'harga' => $tmp->harga
              );
               $this->detail_trx_tindakan->create($data_detail_trx);
            }
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
    public function update($id_trx_pendaftaran){
      if (count($this->input->post()) > 0) {
            $post = $this->input->post();
            $data_pendaftaran = array(
                'id_trx_pendaftaran' => $post['id_trx_pendaftaran'],
                'id_mst_pasien' => $post['id_mst_pasien'],
                'id_mst_pegawai' => $this->session->userdata('id_mst_pegawai'),
                'keterangan' => $post['keterangan'],
                'tgl'  =>   date('Y-m-d')
            );
            $this->db->trans_start();
                $this->pendaftaran->update($data_pendaftaran, $id_trx_pendaftaran);
            $this->db->trans_complete();
            if ($this->db->trans_status() === false) {
                   $this->session->set_flashdata("pesan_eror",AlertFailed(' Gagal Menyimpan Data ! '));
                   redirect('pendaftaran/pendaftaran','refresh');
            }else{
                   $this->session->set_flashdata("pesan_eror",AlertSuccess(' Berhasil Menyimpan Data !'));
                   redirect('pendaftaran/pendaftaran','refresh');
            }
      }
      $data['pendaftaran'] = $this->pendaftaran->getByID($id_trx_pendaftaran);
      $this->template->layout('pendaftaran/update',$data);
    }

    public function delete($id_trx_pendaftaran){
      $hasil = $this->Billing->getByIdPendaftaran($id_trx_pendaftaran);
      $this->db->trans_start();
        $this->Billing->delete($hasil->id_billing);
        $this->pendaftaran->delete($id_trx_pendaftaran);
      $this->db->trans_complete();
      if ($this->db->trans_status() === false) {
               $this->session->set_flashdata("pesan_eror",AlertFailed(' Gagal!, Pendaftaran ini sudah memiliki tindakan. '));
               redirect('pendaftaran/pendaftaran','refresh');
        }else{
               $this->session->set_flashdata("pesan_eror",AlertSuccess(' Berhasil Menghapus Data !'));
               redirect('pendaftaran/pendaftaran','refresh');
        }
    }

    public function insert_ObatOnTindakan(){
      $post = $this->input->post();
      if (isset($post['id_trx_tindakan'])) {
        $PemakaianObat = array(
          'id_detail_trx_tindakan' =>  $post['id_detail_trx_tindakan'],
          'id_product'  => $post['id_product'],
          'id_mst_pegawai'  =>  $this->session->userdata('id_mst_pegawai'),
          'qtyPemakaian' =>  $post['qty'],
          'harga_jual'  =>  $post['harga_jual'],
          'harga_beli'  =>  $post['harga_beli'],
          'sub_total' =>  $post['qty'] * $post['harga_jual'],
          'tanggal' => date('Y-m-d')
        );
        $dataTindakan = array(
              'total' =>  $post['total'] + ($post['qty'] * $post['harga_jual']),
              'is_update' =>  date('Y-m-d H:i:s')
        );
        $Stock = $this->product->getStock($post['id_product']);
        $dataProduct = array(
          'qty' => $Stock - $post['qty'],
          'is_update' =>  date('Y-m-d H:i:s')
        );
          $this->db->trans_start();
            $this->trx_tindakan->update($dataTindakan,$post['id_trx_tindakan']);
            $this->pemakaian_obat->create($PemakaianObat);
            $this->product->update($dataProduct,$post['id_product']);
          $this->db->trans_complete();
          if ($this->db->trans_status() === false) {
                   $this->session->set_flashdata("pesan_eror",AlertFailed(' Gagal!,Menambahkan Obat Pemakaian'));
                   redirect('pendaftaran/pendaftaran/detail/'.$post['id_trx_pendaftaran'],'refresh');
            }else{
                   $this->session->set_flashdata("pesan_eror",AlertSuccess(' Berhasil Menambahkan Obat Pemakaian !'));
                   redirect('pendaftaran/pendaftaran/detail/'.$post['id_trx_pendaftaran'],'refresh');
            }
      }
    }

    public function deletePemakaian($id){
      $data = $this->pemakaian_obat->getById($id);
      $dataProduct = array(
        'qty' => $data->qtyPemakaian + $data->qty,
        'is_update' =>  date('Y-m-d H:i:s')
      );
      $dataHeadTindakan = array(
        'total' =>  $data->total - $data->sub_total,
        'is_update' =>  date('Y-m-d H:i:s')
      );
        $this->db->trans_start();
          $this->trx_tindakan->update($dataHeadTindakan,$data->id_trx_tindakan);
          $this->pemakaian_obat->delete($data->id_pemakaian_obat);
          $this->product->update($dataProduct,$data->id_product);
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
                 $this->session->set_flashdata("pesan_eror",AlertFailed(' Gagal!, Menghapus Obat Pemakaian'));
                 redirect('pendaftaran/pendaftaran/detail/'.$data->id_trx_pendaftaran,'refresh');
        }else{
               $this->session->set_flashdata("pesan_eror",AlertSuccess(' Berhasil Menghapus Obat Pemakaian !'));
               redirect('pendaftaran/pendaftaran/detail/'.$data->id_trx_pendaftaran,'refresh');
        }
    }

}