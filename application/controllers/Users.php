<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_users');
	}

	public function index() {

		parent::cek_validasi();
		$master_role = $this->m_users->get_role();
		$master_client = $this->m_users->get_client();
		$data = array(
			'master_client' => $master_client,
			'master_role' => $master_role,
			'title' => "User Management"
		);
		
		$this->load->view('template/setup/user/index', $data);
	}

	public function ajax_data()
	{      
        $get_data_all = $this->m_users->get_data_all();

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
		$password = MD5($this->input->post('password'));
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$roleuser = $this->input->post('roleuser');
		$clientgroup = $this->input->post('clientgroup');
		$status = $this->input->post('status');

		$insert_new = $this->m_users->new_user($username,$password,$firstname,$lastname,$email,$phone,$roleuser,$clientgroup,$status);
		if($insert_new > 0){
			echo "1";
		}else{
			echo "0";
		}
	}

	public function delete_user()
	{
		$username = $this->input->post('username');

		$delete_user = $this->m_users->delete_user($username);
		if($delete_user > 0){
			echo (1);
		}else{
			echo (0);
		}
	}

	public function update_user()
	{
		$username = $this->input->post('username');
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$roleuser = $this->input->post('roleuser');
		$clientgroup = $this->input->post('clientgroup');
		$status = $this->input->post('status');

		$update_user = $this->m_users->update_user($username,$firstname,$lastname,$email,$phone,$roleuser,$clientgroup,$status);
		if($update_user > 0){
			echo (1);
		}else{
			echo (0);
		}
	}

}