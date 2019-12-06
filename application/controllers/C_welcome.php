<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Welcome extends CI_Controller {

	public function index() {
		$data = array(
			'title' => "Your title"
		);
		$this->load->view('template/welcome', $data);
	}

}