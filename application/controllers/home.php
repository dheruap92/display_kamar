<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->secure_model->getSecure();
	}

	public function index() {
		$this->load->view("home.php");
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */