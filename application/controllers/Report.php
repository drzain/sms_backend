<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_report');
	}

	public function index() {

		parent::cek_validasi();
		//$master_client = $this->m_users->get_client();
		$data = array(
			//'master_client' => $master_client,
			'title' => "Report SMS"
		);
		
		$this->load->view('template/report/index', $data);
	}

	public function ajax_data()
	{      
		$tanggal = $this->input->post('tanggal');
		$client = $this->input->post('username');

		$this->load->library('datatables');
		header('Content-Type: application/json');

		$result = $this->m_report->get_data_all($tanggal,$client);
        echo $result;

		/*if($client == 'admin'){
			$where = '';
		}else{
			$where = "AND client = '".$client."'";
		}

        $get_data_all = $this->m_report->get_data_all($tanggal,$client);

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
                
        $this->load->view('template/ajax_data/index',$data);*/
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
		header("Content-Disposition: attachment; filename=\"REPORT_SMS_".$tanggal.".txt\"");
		header("Pragma: no-cache");
		header("Expires: 0");

		$handle = fopen('php://output', 'w');

		$reportresult = $this->m_report->reportresult_download($tanggal, $where);
		

		fputs($handle, 'trx_id|phone|trx_date|sender|sms_type|send_type|message|error_code|result'."\r\n");

		foreach($reportresult->result_array() as $result){

			fputs($handle, $result['uniqueid'].'|'. $result['msisdn'].'|'. $result['createdTimeStamp'].'|'. $result['sender'].'|'. $result['sms_tipe'].'|'. $result['send_tipe'].'|'. $result['message'].'|'. $result['error_code'].'|'. $result['delivery_status']."\r\n");
		} 

		fclose($handle);
		exit;
	}

}