<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kamar_model extends CI_Model {

	var $table = 'm_kamar';
    var $column_order = array('id_kamar','nama_kamar','kelas','nama_paviliun',null); //set column field database for datatable orderable
    var $column_search = array('id_kamar','nama_kamar','kelas','nama_paviliun'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('id_kamar' => 'asc'); // default order 
    // primary key
    var $pk = "id_kamar";
	
	public $variable;

	public function __construct()
	{
		parent::__construct();
	}
	private function _get_datatables_query()
    {
        
        $this->db->from($this->table);
        $this->db->join("m_paviliun",'m_kamar.id_paviliun=m_paviliun.id_paviliun');
        $i = 0;
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 
    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where($this->pk,$id);
        $query = $this->db->get();
 
        return $query->row();
    }
 
    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
 
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
 
    public function delete_by_id($id)
    {
        $this->db->where($this->pk, $id);
        $this->db->delete($this->table);
    }

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */