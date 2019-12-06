<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Priviledge extends CI_Model {

	function get_data_all(){
        $query = $this->db->query('
        	SELECT 
        		role_name,
        		CASE WHEN is_active = 1 THEN 
        			\'Active\'
        		ELSE 
        			\'Inactive\'
        		END as \'status\',
        		CONCAT(\'<button type="button" id="edit-role" class="btn btn-info">Edit</button>&nbsp;<button type="button" id="delete-role" class="btn btn-warning">Delete</button>&nbsp;<a href="priviledge/detail/\',id,\'" class="btn btn-info">Priviledge</a>\')
        	FROM
        		be_role
        ');
			 
        return $query;
    }
 
    function getpriviledge($id){
        $query = $this->db->query('
        	SELECT  a.id AS parentid, a.`caption` AS parent, a.`link`,  b.id, b.`caption` AS child, b.`link`, 
			IF((SELECT COUNT(be_priviledge.id) FROM be_priviledge WHERE  role_id = '.$id.' AND parent_id = a.`id` AND  child_id = b.id )>0,
			CONCAT(\'<input type="checkbox" id="menu" value = "\',IF (b.id  IS NULL ,CONCAT('.$id.',\',\',a.`id`,\',\',0),CONCAT('.$id.',\',\',a.`id`,\',\',b.id) ),\'" class="minimal-red" checked >\'),

			IF((SELECT COUNT(be_priviledge.id) FROM be_priviledge JOIN be_menu_parent ON be_priviledge.`parent_id`= be_menu_parent.`id` WHERE role_id =  '.$id.'  AND parent_id =   a.`id` AND isparent= \'N\' 
			)>0,CONCAT(\'<input type="checkbox" id="menu" value = "\',IF (b.id  IS NULL ,CONCAT('.$id.',\',\',a.`id`,\',\',0),CONCAT('.$id.',\',\',a.`id`,\',\',b.id) ),\'" class="minimal-red" checked >\'),
			
			CONCAT(\'<input type="checkbox" id="menu" value = "\',IF (b.id  IS NULL ,CONCAT('.$id.',\',\',a.`id`,\',\',0),CONCAT('.$id.',\',\',a.`id`,\',\',b.id) ),\'" class="minimal-red" >\'))) AS cek
			FROM
			be_menu_parent AS a 
			LEFT JOIN
			be_menu_child AS b
			ON
			a .id = b.`parent_id`
			WHERE
			a.`ismenu`= \'Y\'
			ORDER BY  a.`id`,b.id asc
        ');
			 
        return $query;
    }

    public function clean($id)
	{
		$query = $this->db->query(
		'DELETE 
			FROM 
			be_priviledge
			WHERE
			role_id = '.$id
			);
		return $query;
	}

	public function savepriviledge($menu)
	{
		$query = $this->db->query('
			INSERT IGNORE INTO 
				be_priviledge(
					role_id,
					parent_id,
					child_id) 
			VALUES ('.$menu.')
			');
		return $query;
	}

	public function update_role($rolename, $status)
	{
		$query = $this->db->query("
			UPDATE 
				be_role
			SET 
				is_active = '$status'
			WHERE 
				role_name = '$rolename'
		");
		
		return $query;
	}

	public function insert_role($rolename, $status)
	{
		$query = $this->db->query("
			INSERT IGNORE INTO 
				be_role(
					role_name,
					is_active
				)VALUES(
					'$rolename',
					$status
				)
		");
		
		return $query;
	}

	public function delete_role($rolename)
	{
		$query = $this->db->query("
			DELETE FROM 
				be_role
			WHERE 
				role_name = '$rolename'
		");
		
		return $query;
	}

}