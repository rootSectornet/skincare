<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model('Tag_model');
  	}
 	
 	public function getMahasiswa(){
	    $response = array(
	      'content' => $this->Tag_model->get_all()->result()
	      );   
	    $this->output
	      ->set_status_header(200)
	      ->set_content_type('application/json', 'utf-8')
	      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
	      ->_display();
	    exit;
	}

	public function getById($id){
		$data = (array)json_decode(file_get_contents('php://input'));
		if ($this->Tag_model->getByID($id)->num_rows() < 1) {
			$response = array(
					'Status'	=>	'Not ok',
					'massege'	=>	'Data tidak ditemukan',
					'content'	=>	'[]'
			);
		}else{
			$response = array(
					'Status'	=>	'ok',
					'massege'	=>	'Data ditemukan',
					'content'	=>	$data
			);	
		}
		
		$this->output
			->set_status_header(200)
			->set_content_type('application/json','utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
			exit;
	}
	
	  public function saveMahasiswa()
	  {
	      $data = (array)json_decode(file_get_contents('php://input'));
	      $this->Tag_model->insert($data);

	      $response = array(
	        'Success' => true,
	        'Info' => $data);

	      $this->output
	        ->set_status_header(201)
	        ->set_content_type('application/json', 'utf-8')
	        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
	        ->_display();
	        exit;
	  }
}
