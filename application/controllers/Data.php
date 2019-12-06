<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
	}

	public function index()
	{
		parent::cek_validasi();
		//$master_role = $this->m_priviledge->get_role();
		$data = array(
			//'master_role' => $master_role,
			'title' => "Upload Data"
		);
		
		$this->load->view('template/masterdata/index', $data);
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */