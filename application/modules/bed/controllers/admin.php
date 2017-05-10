<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin_model',"admin");
	}
	
	public function index(){
		$query_menu = $this->admin->getMenu();
		// print_r($query_menu->result());
		$data = array(
			'main_menu' => $query_menu,
			'p'			=> 'admin/dashboard_view'
		);
		$this->load->view("admin_view",$data);
	}


}

