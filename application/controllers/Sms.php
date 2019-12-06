<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_sms');
	}

	public function index()
	{
		parent::cek_validasi();
		$username = $this->session->userdata('nama');
		$role_id = $this->session->userdata('role_id');
		if($role_id == 1){
			$master_sender = $this->m_sms->get_senderadmin();
		}else{
			$master_sender = $this->m_sms->get_sender($username);
		}
		$upload = $this->m_sms->total_upload($username);

		$data = array(
			'master_sender' => $master_sender,
			'total_upload' => $upload,
			'title' => "SMS"
		);
		
		$this->load->view('template/sms/index', $data);
	}

	public function uploadFile()
	{
		$smstipe = $this->input->post('tipesmsupload');
		$sender = $this->input->post('senderupload');
		$sendtipe = $this->input->post('sendtipeupload');
		$username = $this->session->userdata('nama');

		$path = $_SERVER['DOCUMENT_ROOT']."/smsbackend/assets/files/";
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'csv';
		$config['max_size']	= '5000000000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload()){
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		} 
		else{

			$success_data = $this->upload->data();
			$path2 = $path.$success_data['file_name'];
			if($query = $this->m_sms->uploadData2($path2,$smstipe,$sender,$sendtipe,$username)){
				echo(1);
			}else{
				echo(0); 
			} 
			
			//print_r($success_data);
			redirect(base_url().'sms/');
		}	
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */