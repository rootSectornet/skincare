<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System extends CI_Controller {


    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login')=="") {
            redirect('Auth');
        }
        $this->load->library('Template','template');
        $this->load->model('Menu_model','menu');
        $this->load->model('Pegawai_group_model','group');
        $this->load->model('Menu_access_model','menu_akses');
        $this->load->model('Group_access_model','group_akses');
        $this->load->model('Pegawai_model','pegawai');
        $this->load->helper('date');
        date_default_timezone_set("Asia/Jakarta");
        
    }

    public function index(){
    	$data['menu'] = $this->menu->read();
    	$this->template->layout('system/menu/table',$data);
    }
    public function add_menu(){
    	if (count($this->input->post()) > 0) {
    		$post = $this->input->post();
    		if (! isset($post['is_main_menu'])) {
    			$post['is_main_menu'] = 0;
    		}
    		$data_menu = array(
    				'menu' => $post['menu'],
    				'link' => $post['link'],
    				'icon' => $post['icon'],
    				'is_main_menu' => $post['is_main_menu']
    		);
            $this->db->trans_start();
    			$this->menu->create($data_menu);
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
                   redirect('sistem/system','refresh');
            }
    	}
    	$data['menu'] = $this->menu->read();
    	$this->template->layout('system/menu/create',$data);
    }
    public function update_menu($id){
    	$data['menu'] = $this->menu->getById($id);
    	$this->template->layout('system/menu/update',$data);
    }

    // Star menu Akses
    	public function menu_akses(){
    		$data['group'] = $this->group->read();
    		$data['menu_akses'] = $this->menu_akses->read();
    		$this->template->layout('system/menu_akses/table',$data);
    	}
    	public function get_menu_akses(){
    		$id = $this->input->post('id');
    		$data['menu_akses'] = $this->menu_akses->getBygrouping($id);
    		$this->load->view('system/menu_akses/list',$data);
    	}
    	public function add_menu_akses(){
    		if (count($this->input->post()) > 0) {
    			$post = $this->input->post();
    			$this->db->trans_start();
    				$this->menu_akses->create($post);
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
	                   redirect('sistem/system/menu_akses','refresh');
	            }
    		}
    		$data['group'] = $this->group->read();
    		$data['menu'] = $this->menu->read();
    		$this->template->layout('system/menu_akses/create',$data);
    	}
    // end Menu Akses
    // start group akses
    	public function group_akses(){
    		$data['group'] = $this->group->read();
    		$this->template->layout('system/group_akses/table',$data);
    	}
    	public function get_group_akses(){
    		$id = $this->input->post('id');
    		$data['group_akses'] = $this->group_akses->getBygroup($id);
    		$this->load->view('system/group_akses/list',$data);
    	}
    	public function add_group_akses(){
    		if (count($this->input->post()) > 0) {
    			$post = $this->input->post();
    			$this->db->trans_start();
    				$this->group_akses->create($post);
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
	                   redirect('sistem/system/group_akses','refresh');
	            }
    		}
    		$data['group'] = $this->group->read();
    		$data['pegawai'] = $this->pegawai->read();
    		$this->template->layout('system/group_akses/create',$data);
    	}
    // end group akses
}