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

	 public function getViewReservasi() {
        $this->db->select("*");
        $this->db->from("reservasi");
        $this->db->join("m_bed as a",'reservasi.id_bed=a.id_bed','left');
        $this->db->join("m_kamar as b",'a.id_kamar=b.id_kamar','left');
        $this->db->join("m_paviliun c",'b.id_paviliun=c.id_paviliun','left');
        $this->db->order_by("id_reservasi","desc");
        $this->db->limit(5);
        $this->db->where('status_reservasi','0');
        return $this->db->get();
    }

    public function getViewPengumuman() {
    	$this->db->from("m_pengumuman");
    	return $this->db->get();
    }


}

/* End of file panel_model.php */
/* Location: ./application/models/panel_model.php */