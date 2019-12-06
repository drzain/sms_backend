<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
	}

	public function index() {
		
		$islogin = $this->session->userdata('islogin');

		if($islogin == TRUE){
			redirect('home','refresh');
		}

		$data = array(
			'title' => "Login Apps"
		);

		$this->load->view('template/login/index', $data);
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE)
        {
                $username = $this->input->post('username');
                $password = $this->input->post('password');

            	$where = array(
					'username' => $username,
					'password' => md5($password),
					'is_active' => 1
					);
				$cek = $this->m_auth->cek_login("be_user",$where);
				//print_r($cek);
				if(count($cek) > 0){
			 		foreach ($cek as $data) {
			 			$role_id = $data->role_id;
			 			$firstname = $data->firstname;
			 			$lastname = $data->lastname;
			 			$email = $data->email;
			 			$client_id = $data->client_id;
			 			$phone = $data->phone;
			 			$api_key = $data->api_key;
			 		}
					$data_session = array(
						'nama' => $username,
						'role_id' => $role_id,
						'firstname' => $firstname,
						'lastname' => $lastname,
						'email' => $email,
						'client_id' => $client_id,
						'phone' => $phone,
						'islogin' => TRUE,
						'api_key' => $api_key
						);
			 
					$this->session->set_userdata($data_session);
			 
					redirect(base_url("home"));
				}else{
					$this->session->set_flashdata('message','username atau password salah !');
                	redirect('auth', 'refresh');
				}

        }
        else
        {
                (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                redirect('auth', 'refresh');
        }
	}

	public function logout() {

        $this->session->sess_destroy();
        redirect('auth', 'refresh');
    
    }

}