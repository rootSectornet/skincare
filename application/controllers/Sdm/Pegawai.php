<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {


    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login')=="") {
            redirect('Auth');
        }
        $this->load->library('Template','template');
        $this->load->model('Pegawai_model','pegawai');
        $this->load->model('User_model','user');
        $this->load->helper('date');
        $this->load->helper('tanggal');
        date_default_timezone_set("Asia/Jakarta");

    }
    public function index(){
        $data['pegawai'] = $this->pegawai->read();
        $this->template->layout('sdm/pegawai/table',$data);
    }
    public function create(){
        if (count($this->input->post()) > 0) {
            $post = $this->input->post();
            $this->db->trans_start();
                $this->pegawai->create($post);
            $this->db->trans_complete();
            if ($this->db->trans_status() === false) {
                   $this->session->set_flashdata("pesan_eror","<div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                            Gagal Menyimpan Data !
                    </div>");
           redirect('sdm/pegawai','refresh');
            }else{
                   $this->session->set_flashdata("pesan_eror","<div class='alert bg-blue alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                               Succes Menyimpan Data !.
                            </div>");
                   redirect('sdm/pegawai','refresh');
            }
        }
        $this->template->layout('sdm/pegawai/create');
    }
    public function update($id){
        if (count($this->input->post()) > 0) {
            $post = $this->input->post();
            $this->db->trans_start();
                $post['is_update'] = date('Y-m-d H:i:s');
                $this->pegawai->update($post,$id);
            $this->db->trans_complete();
            if ($this->db->trans_status() === false) {
                   $this->session->set_flashdata("pesan_eror","<div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                            Gagal Update Data !
                    </div>");
           redirect('sdm/pegawai','refresh');
            }else{
                   $this->session->set_flashdata("pesan_eror","<div class='alert bg-blue alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                               Succes Update Data !.
                            </div>");
                   redirect('sdm/pegawai','refresh');
            }
        }
        $data['pegawai'] = $this->pegawai->getByID($id);
        $this->template->layout('sdm/pegawai/update',$data);
    }
    public function delete($id){
        $this->db->trans_start();
            $post['flag_aktif'] = 0;
            $this->pegawai->update($post,$id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
               $this->session->set_flashdata("pesan_eror","<div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                        Gagal Delete Data !
                </div>");
       redirect('sdm/pegawai','refresh');
        }else{
               $this->session->set_flashdata("pesan_eror","<div class='alert bg-blue alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                           Succes Delete Data !.
                        </div>");
               redirect('sdm/pegawai','refresh');
        }
    }

    public function profile($id){
      $data['pegawai'] = $this->pegawai->getByID($id);
      $data['user_login']  = $this->user->getByIdPegawai($id);
      $this->template->layout('sdm/pegawai/profile',$data);
    }

    // start user lgin
        public function user(){
            $data['user'] = $this->user->read();
            $this->template->layout('sdm/pegawai/user/table',$data);
        }
        public function create_user(){
            if (count($this->input->post()) > 0) {
                $post = $this->input->post();
                $post['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
                $this->db->trans_start();
                    $this->user->create($post);
                $this->db->trans_complete();
                if ($this->db->trans_status() === false) {
                       $this->session->set_flashdata("pesan_eror","<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                                Gagal Menyimpan Data !
                        </div>");
               redirect('sdm/pegawai/user','refresh');
                }else{
                       $this->session->set_flashdata("pesan_eror","<div class='alert bg-blue alert-dismissible' role='alert'>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                    <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                                   Succes Menyimpan Data !.
                                </div>");
                       redirect('sdm/pegawai/user','refresh');
                }
            }
             $data['pegawai'] = $this->pegawai->read();
            $this->template->layout('sdm/pegawai/user/create',$data);
        }
        public function ganti_pass(){
            $post = $this->input->post();
            $data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
            $this->db->trans_start();
                $this->user->update($data,$post['id_user']);
            $this->db->trans_complete();
            if ($this->db->trans_status() === false) {
                   $this->session->set_flashdata("pesan_eror","<div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                            Gagal Update Password !
                    </div>");
           redirect('sdm/pegawai/'.$post['to'],'refresh');
            }else{
                   $this->session->set_flashdata("pesan_eror","<div class='alert bg-blue alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                               Succes Update Password !.
                            </div>");
                   redirect('sdm/pegawai/'.$post['to'],'refresh');
            }
        }
        public function update_user($id){
            if (count($this->input->post()) > 0) {
                $post = $this->input->post();
                $this->db->trans_start();
                    $this->user->update($post,$id);
                $this->db->trans_complete();
                if ($this->db->trans_status() === false) {
                       $this->session->set_flashdata("pesan_eror","<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                                Gagal Menyimpan Data !
                        </div>");
               redirect('sdm/pegawai/user','refresh');
                }else{
                       $this->session->set_flashdata("pesan_eror","<div class='alert bg-blue alert-dismissible' role='alert'>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                    <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                                   Succes Menyimpan Data !.
                                </div>");
                       redirect('sdm/pegawai/user','refresh');
                }
            }
            $data['user'] = $this->user->getByID($id);
            $data['pegawai'] = $this->pegawai->read();
            $this->template->layout('sdm/pegawai/user/update',$data);
        }
        public function delete_user($id){
            $this->db->trans_start();
                $this->user->delete($id);
            $this->db->trans_complete();
            if ($this->db->trans_status() === false) {
                   $this->session->set_flashdata("pesan_eror","<div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                            Gagal Hapus Data !
                    </div>");
           redirect('sdm/pegawai/user','refresh');
            }else{
                   $this->session->set_flashdata("pesan_eror","<div class='alert bg-blue alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                               Succes Hapus Data !.
                            </div>");
                   redirect('sdm/pegawai/user','refresh');
            }
        }
    // end user login

}
