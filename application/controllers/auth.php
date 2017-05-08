<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("user_model","user");
	}

	public function index()
	{
		$this->load->view("login");
	}

	public function cek_login() {
		$data = array(
			'USERNAME' => $this->input->post('username', TRUE),
			'PASSWORD' => sha1($this->input->post('password', TRUE))
		);
	
		$hasil = $this->user->cek_user($data);
		if ($hasil->num_rows()==1) {
			$rs = $hasil->row();
			$sess_data = array(
				"user_id" => $rs->USER_ID, 
				"username" => $rs->USERNAME, 
				"session_id" => $rs->session_id, 
				"level_name" => $rs->NAME, 
				"level_id" => $rs->LEVE_ID, 
				);
			$this->session->set_userdata($sess_data);
			redirect('home');
		}

	}	

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level_name');
		session_destroy();
		redirect('auth');
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */