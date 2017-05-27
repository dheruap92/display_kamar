<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('panel_model','panel');
	}
	
	public function index(){
		$data = array(
			"p" 		=> "admin/dasboard_view",
			'paviliun' 	=> $this->loadPaviliun(),
			'kelas'		=> $this->loadViewKelas()
			);
		$this->load->view("display_view",$data);
	}

	public function loadPaviliun() {
		$data = $this->panel->getPaviliun();
		return $data->result();
	}

	public function loadViewKelas() {
		$data = $this->panel->getViewKelas();
		return $data->result();
	}

}

