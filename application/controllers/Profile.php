<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_profile');
	}

	public function index()
	{
		parent::cek_validasi();
		$data = array(
			'title' => "Profile"
		);
		
		$this->load->view('template/setup/profile/index', $data);
	}

	public function updateUser()
	{
		$username = $this->input->post('username');
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$email = $this->input->post('email');
		$telp = $this->input->post('telp');

		$update_user = $this->m_profile->update_user($username, $firstname, $lastname, $email, $telp);

		$data_session = array(
			'firstname' => $firstname,
			'lastname' => $lastname,
			'email' => $email,
			'phone' => $telp
			);
 
		$this->session->set_userdata($data_session);

		redirect(base_url().'profile/');
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */