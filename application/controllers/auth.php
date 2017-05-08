<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library("ion_auth");
	}

	public function index()
	{
		if ($this->ion_auth->logged_in()) {
			redirect("bed/bed");
		}
		$this->load->view("login");
	}

	public function login() {
		
		
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);
		$remember = $this->input->post('remember', TRUE);
		if ($this->ion_auth->login($username,$password,$remember)) {
			$this->session->set_flashdata('message',$this->ion_auth->messages());
			redirect('bed/bed');
		} else {
			$this->session->set_flashdata('message',"username dan password tidak dikenal");
			redirect("auth",'refresh');
		}


	}

	public function logout() {
		$this->ion_auth->logout();
		redirect('auth');
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */