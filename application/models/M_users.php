<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Users extends CI_Model {

	function get_data_all(){
        $query = $this->db->query('
        	SELECT 
        		username,
        		firstname,
        		lastname,
        		email,
                phone,
        		role_id,
                client_id,
        		CASE WHEN is_active = 1 THEN 
        			\'Active\'
        		ELSE 
        			\'Inactive\'
        		END as \'status\',
        		CONCAT(\'<button type="button" id="edit-user" class="btn btn-info">Edit</button>&nbsp;<button type="button" id="delete-user" class="btn btn-warning">Delete</button>\')
        	FROM
        		be_user 
        ');
			 
        return $query;
    }

    function get_role(){
        $query = $this->db->query('
            SELECT 
                id,
                role_name
            FROM
                be_role
        ');
             
        return $query;
    }	

    function get_client(){
        $query = $this->db->query('
            SELECT 
                id,
                nama_client
            FROM
                sms_client
        ');
             
        return $query;
    }   

    public function new_user($username,$password,$firstname,$lastname,$email,$phone,$roleuser,$clientgroup,$status)
    {
        $query = $this->db->query("
            INSERT INTO be_user(
                username,
                password,
                firstname,
                lastname,
                email,
                phone,
                role_id,
                client_id,
                is_active,
                createdTimeStamp,
                api_key
            )VALUES(
                '$username',
                '$password',
                '$firstname',
                '$lastname',
                '$email',
                '$phone',
                '$roleuser',
                '$clientgroup',
                '$status',
                NOW(),
                REPLACE(UUID(),'-','')
            )
        ");
             
        return $query;
    }

    function delete_user($username){
        $query = $this->db->query("
            DELETE FROM 
                be_user
            WHERE 
                username = '$username'
        ");
             
        return $query;
    }

    function update_user($username,$firstname,$lastname,$email,$phone,$roleuser,$clientgroup,$status){
        $query = $this->db->query("
            UPDATE 
                be_user
            SET 
                firstname = '$firstname',
                lastname = '$lastname',
                email = '$email',
                phone = '$phone',
                role_id = '$roleuser',
                client_id = '$clientgroup',
                is_active = '$status'
            WHERE 
                username = '$username'

        ");
             
        return $query;
    }  

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */