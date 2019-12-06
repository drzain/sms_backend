<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function cek_validasi()
	{
		$isLogin = $this->session->userdata('islogin');
		if($isLogin == FALSE){
			$this->session->set_flashdata('message','Please Login First !');
            redirect('auth', 'refresh');
		}
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */