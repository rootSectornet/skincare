<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {


    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login')=="") {
            redirect('Auth');
        }
        $this->load->library('Template','template');
        $this->load->model('Pegawai_model','pegawai');
        $this->load->model('Pegawai_group_model','group');
        $this->load->helper('date');
        date_default_timezone_set("Asia/Jakarta");

    }
    public function index(){
        $data['group'] = $this->group->read();
        $this->template->layout('sdm/group/table',$data);
    }
    public function create(){
        if (count($this->input->post()) > 0) {
            $post = $this->input->post();
            $this->db->trans_start();
                $this->group->create($post);
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
                   redirect('sdm/group','refresh');
            }
        }
        $this->template->layout('sdm/group/create');
    }
    public function update($id){
        if (count($this->input->post()) > 0) {
            $post = $this->input->post();
            $this->db->trans_start();
                $post['is_update'] = date('Y-m-d H:i:s');
                $this->group->update($post,$id);
            $this->db->trans_complete();
            if ($this->db->trans_status() === false) {
                   $this->session->set_flashdata("pesan_eror","<div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                            Gagal Update Data !
                    </div>");
            }else{
                   $this->session->set_flashdata("pesan_eror","<div class='alert bg-blue alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                               Succes Update Data !.
                            </div>");
                   redirect('sdm/group','refresh');
            }
        }
        $data['group'] = $this->group->getById($id);
        $this->template->layout('sdm/group/update',$data);
    }
    public function delete($id){
        $this->db->trans_start();
            $post['flag_aktif'] = 0;
            $this->group->update($post,$id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
               $this->session->set_flashdata("pesan_eror","<div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                        Gagal Delete Data !
                </div>");
        }else{
               $this->session->set_flashdata("pesan_eror","<div class='alert bg-blue alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <h4><i class='icon fa fa-ban'></i> Information !!!</h4>
                           Succes Delete Data !.
                        </div>");
               redirect('sdm/group','refresh');
        }
    }

}