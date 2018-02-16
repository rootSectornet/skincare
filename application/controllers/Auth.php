<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model('User_model','user');
        $this->load->model('Pegawai_model','pegawai');
        $this->load->model('Group_access_model','group_access');
        $this->load->helper('date');
        date_default_timezone_set("Asia/Jakarta");

    }
    public function index(){
    	if (count($this->input->post()) > 0) {
    		$req = $this->input->post();
    		$data = array(
    			'username' => $req['username']
    		);
            $pass = "";
    		$cek = $this->user->cek_user($data);
    		if (count($cek)  > 0) {
    			foreach ($cek->result() as $key => $row) {
    				$pass = $row->password;
    				$id_pegawai = $row->id_mst_pegawai;
    			}
    			if (password_verify($req['password'],$pass)) {
    				$data_pegawai = $this->pegawai->getByID($id_pegawai);
    				foreach ($data_pegawai as $key => $dp) {
						$sess_data['login'] 		= 	'Yes';
						$sess_data['id_mst_pegawai'] 		= 	$dp->id_mst_pegawai;
						$sess_data['nama_pegawai'] 		= 	$dp->nama_pegawai;
						$sess_data['aktif'] 		= 	$dp->flag_aktif;

    				}
    				$data_group = $this->group_access->getByPegawai($id_pegawai);
    				foreach ($data_group as $key => $dg) {
    					$sess_data['group']  = $dg->id_mst_group;
    					$sess_data['nama_group'] = $dg->nama_group;
    				}
					$this->session->set_userdata($sess_data);
					redirect('Home','refresh');
    			}else{
    				$this->session->set_flashdata("pesan_eror","<div class='alert bg-red alert-dismissible' role='alert'>
	                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	                           Password Salah !
	                        </div>");
    			}
    		}else{
    			$this->session->set_flashdata("pesan_eror","<div class='alert bg-red alert-dismissible' role='alert'>
	                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	                            Username Salah !
	                        </div>");
    		}
    	}
    	$this->load->view('Auth/Login');
    }
	public function logout(){
        $this->session->sess_destroy();
        redirect('Auth','refresh');
	}

}