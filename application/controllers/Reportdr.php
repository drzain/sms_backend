<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportdr extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_reportdr');
	}

	public function index() {

		parent::cek_validasi();
		//$master_client = $this->m_users->get_client();
		$data = array(
			//'master_client' => $master_client,
			'title' => "Report DR SMS"
		);
		
		$this->load->view('template/reportdr/index', $data);
	}

	public function ajax_data()
	{      
		$this->load->library('datatables');
		header('Content-Type: application/json');
		$tanggal = $this->input->post('tanggal');
		$client = $this->input->post('username');

		//$tanggal = '2019-11-27';
		//$client = 'admin';

        $result = $this->m_reportdr->get_data_all($tanggal,$client);
        echo $result;
	}

	function download()
	{
		$tanggal = $this->input->get('tanggal');
		$username = $this->input->get('username');
		if($username == 'admin'){
			$where = '';
		}else{
			$where = "AND client = '".$username."'";
		}

		header("Content-type: application/txt");
		header("Content-Disposition: attachment; filename=\"REPORT_DR_SMS_".$tanggal.".txt\"");
		header("Pragma: no-cache");
		header("Expires: 0");

		$handle = fopen('php://output', 'w');

		$reportresult = $this->m_reportdr->reportresult_download($tanggal, $where);
		

		fputs($handle, 'trx_id|error_code|created_timestamp'."\r\n");

		foreach($reportresult->result_array() as $result){

			fputs($handle, $result['trxid'].'|'. $result['error_code'].'|'. $result['createdTimeStamp']."\r\n");
		} 

		fclose($handle);
		exit;
	}

}