<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index() {

		parent::cek_validasi();

		$data = array(
			'title' => "Home"
		);
		
		$this->load->view('template/home/index', $data);
	}

}