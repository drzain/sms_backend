<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Priviledge extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_priviledge');
	}

	public function index() {

		parent::cek_validasi();
		//$master_role = $this->m_priviledge->get_role();
		$data = array(
			//'master_role' => $master_role,
			'title' => "Role Management"
		);
		
		$this->load->view('template/setup/priviledge/index', $data);
	}
 
	public function ajax_data()
	{      
        $get_data_all = $this->m_priviledge->get_data_all();

        $rows = array();
        foreach ($get_data_all->result() as $row) {
          $rows[] = array_values((array)$row);
        }
                
        $this->output->set_content_type('application/json');
        //$cdr_ajax = $this->output->set_output(json_encode($cdr));
        $release_ajax = json_encode(array('aaData'=> $rows));
        
        $data = array(
            'release_ajax' => $release_ajax,
        );
                
        $this->load->view('template/ajax_data/index',$data);
	}

	public function detail()
	{
		$id = $this->uri->segment(3);
		$data['getpriviledge'] = $this->m_priviledge->getpriviledge($id);
		$data['title'] = "Detail Role Priviledge";
		$this->load->view('template/setup/priviledge/detail/index', $data);
	}

	public function savepriviledge()
	{	
		$data['menu'] = $this->input->post('menu');
		$data['id'] = $this->input->post('id');
		$clean = $this->m_priviledge->clean($data['id']);
		foreach ($data['menu'] as $resmenu) {
		$this->m_priviledge->savepriviledge($resmenu);
		}
	}

	public function update_role()
	{
		$rolename = $this->input->post('rolename');
		$status = $this->input->post('status');

		$update_role = $this->m_priviledge->update_role($rolename, $status);
		if($update_role > 0){
			echo(1);
		}else{
			echo(0);
		}
	}

	public function new_role()
	{
		$rolename = $this->input->post('rolename');
		$status = $this->input->post('status');

		$insert_role = $this->m_priviledge->insert_role($rolename, $status);
		if($insert_role > 0){
			echo(1);
		}else{
			echo(0);
		}
	}

	public function delete_role()
	{
		$rolename = $this->input->post('rolename');

		$delete_role = $this->m_priviledge->delete_role($rolename);

		if($delete_role > 0){
			echo(1);
		}else{
			echo(0);
		}
	}
}