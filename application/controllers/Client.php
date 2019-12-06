<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_client');
	}

	public function index() {

		parent::cek_validasi();
		$master_username = $this->m_client->username();
		$data = array(
			'master_username' => $master_username,
			'title' => "Client Management"
		);
		
		$this->load->view('template/setup/client/index', $data);
	}

	public function ajax_data()
	{      
        $get_data_all = $this->m_client->get_data_all();

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

	public function new_user()
	{
		$username = $this->input->post('username');
		$client = $this->input->post('client');
		$sender = $this->input->post('sender');
		$status = $this->input->post('status');

		$insert_new = $this->m_client->new_user($username,$client,$sender,$status);
		if($insert_new > 0){
			echo "1";
		}else{
			echo "0";
		}
	}

	public function delete_user()
	{
		$client = $this->input->post('client');
		$sender = $this->input->post('sender');

		$delete_user = $this->m_client->delete_user($client,$sender);
		if($delete_user > 0){
			echo (1);
		}else{
			echo (0);
		}
	}

	public function update_user()
	{
		$username = $this->input->post('username');
		$client = $this->input->post('client');
		$sender = $this->input->post('sender');
		$status = $this->input->post('status');

		$update_user = $this->m_client->update_user($username,$client,$sender,$status);
		if($update_user > 0){
			echo (1);
		}else{
			echo (0);
		}
	}

}