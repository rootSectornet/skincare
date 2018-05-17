<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
*/
class Template
{
	protected $CI;
	function __construct(){
		$this->CI =& get_instance();
	}
	function Icreate(){
		
	}
	function layout($link,$param = null){
		$data['menu'] = $this->menu($this->CI->session->userdata('group'));
		$this->CI->load->model('Product_model','product');
		$data['jumlahNStock'] = $this->CI->product->HitOutOfStock();
		$data['outOfStock'] = $this->CI->product->OutOfStock();
		$data['expobat'] = $this->CI->product->getExpProduct(date('Y-m-d'));
		$this->CI->load->view('template/header');
        $this->CI->load->view('template/Menu',$data);
        $this->CI->load->view($link,$param);
        $this->CI->load->view('template/Footer');
	}
	function menu($id_group){
		$menu = array();
		$temp_sub_menu = array();
		$this->CI->load->model('Menu_access_model','menu_access');
		$data_menu = $this->CI->menu_access->getBygroup($id_group,0);
		foreach ($data_menu as $key => $dm) {
			$temp_menu = array(
				'nama' => $dm->menu,
				'id_menu' => $dm->id_menu,
				'link' => $dm->link,
				'icon' => $dm->icon,
				'sub_menu' => array()
			);
			$data_sub_menu = $this->CI->menu_access->getBygroup($id_group,$dm->id_menu);
			foreach ($data_sub_menu as $key => $dsm) {
				$temp_menu['sub_menu'][] = array(
					'nama' => $dsm->menu,
					'id_menu' => $dsm->id_menu,
					'link' => $dsm->link,
					'icon' => $dsm->icon
				);
			}
			array_push($menu,$temp_menu);
		 }
		return json_encode($menu);
	}
}
