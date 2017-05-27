<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getPaviliun() {
		$this->db->select("*");
		$this->db->from('m_paviliun');
		return $this->db->get();
	}

	public function getViewKelas() {
		$sql = "SELECT *  from view_kelas";
		$query = $this->db->query($sql);
		return $query;
	}

}

/* End of file panel_model.php */
/* Location: ./application/models/panel_model.php */