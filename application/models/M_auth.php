<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Auth extends CI_Model {

	function cek_login($table,$where){		
		$query = $this->db->get_where($table,$where);
		return $query->result();
	}	

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */