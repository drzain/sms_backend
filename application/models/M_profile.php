<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Profile extends CI_Model {

	function update_user($username, $firstname, $lastname, $email, $telp){
        $query = $this->db->query("
            UPDATE 
            	be_user
            SET 
            	firstname = '$firstname',
            	lastname = '$lastname',
            	email = '$email',
            	phone = '$telp'
            WHERE 
            	username = '$username'
        ");
             
        return $query;
    }

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */