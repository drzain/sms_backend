<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Callback extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_callback');
	}

	public function index() {

		$trxid = $this->input->get('trx_id');
		$status = $this->input->get('status');
		$ref_id = $this->input->get('ref_id');
		$dr = $this->input->get('dr');
		$userid = $this->input->get('userid');

		$insert_dr = $this->m_callback->insertdr($trxid,$status,$ref_id,$dr,$userid);

		if($insert_dr > 0){
			$data = array('reason'=>'Success', 'code'=> '200');
			$respon = json_encode($data);
			echo $respon;
		}else{
			$data = array('reason'=>'Failed', 'code'=> '400');
			$respon = json_encode($data);
			echo $respon;
		}

	}

}