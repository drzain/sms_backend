<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_client extends CI_Model {

	function get_data_all(){
        $query = $this->db->query('
        	SELECT 
        		nama_client,
        		username,
        		sender_id,
                createdDate,
        		CASE WHEN state = \'Y\' THEN 
        			\'Active\'
        		ELSE 
        			\'Inactive\'
        		END as \'status\',
        		CONCAT(\'<button type="button" id="edit-client" class="btn btn-info">Edit</button>&nbsp;<button type="button" id="delete-client" class="btn btn-warning">Delete</button>\')
        	FROM
        		sms_client
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

    public function new_user($username,$client,$sender,$status)
    {
        $query = $this->db->query("
            INSERT INTO sms_client(
                nama_client,
                username,
                createdDate,
                state,
                sender_id
            )VALUES(
                '$client',
                '$username',
                CURDATE(),
                '$status',
                '$sender'
            )
        ");
             
        return $query;
    }

    public function username()
    {
        $query = $this->db->query("
            SELECT 
                username 
            FROM 
                be_user
            WHERE 
                role_id = 3
        ");
             
        return $query;
    }

    function delete_user($client,$sender){
        $query = $this->db->query("
            DELETE FROM 
                sms_client
            WHERE 
                nama_client = '$client'
            AND 
                sender_id = '$sender'
        ");
             
        return $query;
    }

    function update_user($username,$client,$sender,$status){
        $query = $this->db->query("
            UPDATE 
                sms_client
            SET 
                sender_id = '$sender',
                state = '$status'
            WHERE 
                username = '$username'
            AND 
                nama_client = '$client'

        ");
             
        return $query;
    }  

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */