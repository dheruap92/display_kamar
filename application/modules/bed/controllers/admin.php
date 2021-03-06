<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public $query_menu;
	public function __construct() {
		parent::__construct();
		$this->load->library("ion_auth");
		$this->load->model("paviliun_model",'paviliun');
		$this->load->model("kamar_model",'kamar');
		$this->load->model('bed_model',"bed");
		$this->load->model('admin_model',"admin");
		$this->query_menu = $this->admin->getMenu();
		if (!$this->ion_auth->logged_in()) {
			redirect("auth",'refresh');
		} else {
			if (!$this->ion_auth->in_group('admin')) {
				redirect("auth",'refresh');
			}
		}
	}
	
	public function index(){
		// print_r($query_menu->result());
		$data = array(
			'main_menu' => $this->query_menu,
			'p'			=> 'admin/dashboard_view'
		);
		$this->load->view("admin_view",$data);
	}

	#paviliun
	public function paviliun($param1="") {
		if ($param1=="tambah") {
			$data = array(
                'nama_paviliun' => $this->input->post('nama_paviliun', TRUE),
                'keterangan'    => $this->input->post('keterangan', TRUE),
            );
        
        	$insert = $this->paviliun->save($data);
        	echo json_encode(array("status" => TRUE));
		} else if ($param1=="ubah") {
			$data = array(
                'nama_paviliun' => $this->input->post('nama_paviliun', TRUE),
                'keterangan'    => $this->input->post('keterangan', TRUE),
            );

	        $this->paviliun->update(array("id_paviliun" => $this->input->post("id_pk")), $data);
	        echo json_encode(array("status" => TRUE));
			
		} else if ($param1=="edit") {
			$id = $this->input->post("id");
			$data = $this->paviliun->get_by_id($id);
        	echo json_encode($data);
		} else if ($param1=="hapus") {
			$id = $this->input->post("id");
			$this->paviliun->delete_by_id($id);
       		echo json_encode(array("status" => TRUE));
		} else if ($param1=="list") {
			$list = $this->paviliun->get_datatables();
	        $data = array();
	        $no = $_POST['start'];
	        foreach ($list as $r) {
	            $no++;
	            $row = array();
	            $row[] = "<input type='checkbox' class='data-check' value='".$r->id_paviliun."'>";
	            $row[] = $no;
	            $row[] = $r->nama_paviliun;
	            $row[] = $r->keterangan;
	            //add html for action
	            $row[] = '<button class="btn btn-xs btn-info" data-rel="tooltip" title="Edit" onclick="update('."'".$r->id_paviliun."'".')"><i class="ace-icon fa fa-pencil bigger-120"></i></button>
	                  <a class="btn btn-xs btn-danger" data-rel="tooltip" title="Hapus" onclick="hapus('."'".$r->id_paviliun."'".')"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>';
	 
	            $data[] = $row;
	        }
	 
	        $output = array(
	                        "sEcho" => $_POST['draw'],
	                        "iTotalRecords" => $this->paviliun->count_all(),
	                        "iTotalDisplayRecords" => $this->paviliun->count_filtered(),
	                        "aaData" => $data,
	                );
	        //output to json format
	        echo json_encode($output);			
		} else {
		  	$data = array(
				'main_menu' => $this->query_menu,
				'p'			=> 'admin/paviliun_view',
				'link1'		=> 'Admin',
				'link2'		=> 'Paviliun',
			);
			$this->load->view("admin_view",$data);
		}
	}

	#kamar
	public function Kamar($param1="") {
		if ($param1=="tambah") {
			$data = array(
              'nama_kamar'  => $this->input->post('nama_kamar', TRUE),
               'kelas'       => $this->input->post('kelas', TRUE),
               'id_paviliun' => $this->input->post('id_paviliun', TRUE)
            );
        
        	$insert = $this->kamar->save($data);
        	echo json_encode(array("status" => TRUE));
		} else if ($param1=="ubah") {
			$data = array(
                'nama_kamar'  => $this->input->post('nama_kamar', TRUE),
                'kelas'       => $this->input->post('kelas', TRUE),
                'id_paviliun' => $this->input->post('id_paviliun', TRUE)
            );

	        $this->kamar->update(array("id_kamar" => $this->input->post("id_pk")), $data);
	        echo json_encode(array("status" => TRUE));
			
		} else if ($param1=="edit") {
			$id = $this->input->post("id");
			$data = $this->kamar->get_by_id($id);
        	echo json_encode($data);
		} else if ($param1=="hapus") {
			$id = $this->input->post("id");
			$this->kamar->delete_by_id($id);
       		echo json_encode(array("status" => TRUE));
		} else if ($param1=="list") {
			$list = $this->kamar->get_datatables();
	        $data = array();
	        $no = $_POST['start'];
	        foreach ($list as $r) {
	            $no++;
	            $row = array();
	            $row[] = "<input type='checkbox' class='data-check' value='".$r->id_kamar."'>";
	            $row[] = $no;
	            $row[] = $r->nama_kamar;
	            $row[] = $r->kelas;
	            $row[] = $r->nama_paviliun;
	            //add html for action
	            $row[] = '<button class="btn btn-xs btn-info" data-rel="tooltip" title="Edit" onclick="update('."'".$r->id_kamar."'".')"><i class="ace-icon fa fa-pencil bigger-120"></i></button>
	            	  <a class="btn btn-xs btn-default" data-rel="tooltip" title="Lihat" onclick="lihat('."'".$r->id_kamar."'".')"><i class="ace-icon fa fa-eye bigger-120"></i></a>
	                  <a class="btn btn-xs btn-danger" data-rel="tooltip" title="Hapus" onclick="hapus('."'".$r->id_kamar."'".')"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>';
	 
	            $data[] = $row;
	        }
	 
	        $output = array(
	                        "sEcho" => $_POST['draw'],
	                        "iTotalRecords" => $this->kamar->count_all(),
	                        "iTotalDisplayRecords" => $this->kamar->count_filtered(),
	                        "aaData" => $data,
	                );
	        //output to json format
	        echo json_encode($output);			
		} else {
		  	$data = array(
				'main_menu' => $this->query_menu,
				'p'			=> 'admin/kamar_view',
				'link1'		=> 'Admin',
				'link2'		=> 'kamar',
				'paviliun'	=> $this->loadPaviliun()
			);
			$this->load->view("admin_view",$data);
		}
	}

	#bed
	public function bed($param1="") {
		if ($param1=="tambah") {
			$data = array(
              'id_kamar'    => $this->input->post('id_kamar', TRUE),
              'no_bed'      => $this->input->post('no_bed', TRUE)
            );
        
        	$insert = $this->bed->save($data);
        	echo json_encode(array("status" => TRUE));
		} else if ($param1=="ubah") {
			$data = array(
               'id_kamar'    => $this->input->post('id_kamar', TRUE),
               'no_bed'      => $this->input->post('no_bed', TRUE)
            );

	        $this->bed->update(array("id_bed" => $this->input->post("id_pk")), $data);
	        echo json_encode(array("status" => TRUE));
			
		} else if ($param1=="edit") {
			$id = $this->input->post("id");
			$data = $this->bed->get_by_id($id);
        	echo json_encode($data);
		} else if ($param1=="hapus") {
			$id = $this->input->post("id");
			$this->bed->delete_by_id($id);
       		echo json_encode(array("status" => TRUE));
		} else if ($param1=="list") {
			$list = $this->bed->get_datatables();
	        $data = array();
	        $no = $_POST['start'];
	        foreach ($list as $r) {
	            $no++;
	            if ($r->status==0) {
	            	$r->status = "Kosong";
	            } else {
	            	$r->status = "Terisi";
	            }
	            $row = array();
	            $row[] = "<input type='checkbox' class='data-check' value='".$r->id_bed."'>";
	            $row[] = $no;
	            $row[] = $r->nama_paviliun;
	            $row[] = $r->nama_kamar;
	            $row[] = $r->kelas;
	            $row[] = $r->no_bed;
	            $row[] = $r->status;
	            //add html for action
	            $row[] = '<button class="btn btn-xs btn-info" data-rel="tooltip" title="Edit" onclick="update('."'".$r->id_bed."'".')"><i class="ace-icon fa fa-pencil bigger-120"></i></button>
	                  <a class="btn btn-xs btn-danger" data-rel="tooltip" title="Hapus" onclick="hapus('."'".$r->id_bed."'".')"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>';
	 
	            $data[] = $row;
	        }
	 
	        $output = array(
	                        "sEcho" => $_POST['draw'],
	                        "iTotalRecords" => $this->kamar->count_all(),
	                        "iTotalDisplayRecords" => $this->kamar->count_filtered(),
	                        "aaData" => $data,
	                );
	        //output to json format
	        echo json_encode($output);			
		} else {
		  	$data = array(
				'main_menu' => $this->query_menu,
				'p'			=> 'admin/bed_view',
				'link1'		=> 'Admin',
				'link2'		=> 'Bed',
				'paviliun'	=> $this->loadPaviliun(),
			);
			$this->load->view("admin_view",$data);
		}
	}
	
	function loadPaviliun() {
		$data_paviliun = $this->paviliun->getPaviliun();
		return $data_paviliun->result();
	}

	function loadKamar($id="") {
		$data_kamar = $this->kamar->getKamar($id)->result();
		echo json_encode($data_kamar);
	}
	


}

