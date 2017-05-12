<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function getMenu($param1="") {
		if ($param1=="") {
			$this->db->where('parent_id',0);
		} else {
			$this->db->where('parent_id',$param1);
		}
		return $this->db->get("menu");
	}

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */