<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu extends CI_Model {

public function getmenuparent($role)
{
	$query = $this->db->query(
		'SELECT distinct
			a.id,
			a.caption,
			a.style,
			a.link,
			a.isparent
		 FROM be_menu_parent AS a
		 JOIN
		 be_priviledge AS b
		 ON
		 a.id = b.parent_id
		 where
		 ismenu =\'Y\'
		 and
		 b.role_id='.$role.'
		 ORDER BY 
		 menu_order ASC
		 ');
	return $query;
}	

public function getusergroup($id)
{
	$query = $this->db->query(
	'select role_id from be_user where username = '.$id);
	return $query;
}

public function getmenuchild($id,$group)
{
	$query = $this->db->query(
	'select a.* 
	 from be_menu_child as a 
	 join
	 be_priviledge as b
	 on
	 a.id = b.child_id
	 where ismenu = \'Y\' and role_id = '.$group.' and a.parent_id = '.$id);
	return $query;
}

public function cek_priv($page,$id)
{
	$query = $this->db->query(
			'SELECT 
				a.id,
				a.caption,
				a.style,
				a.link,
				c.link,
				b.role_id
			 FROM be_menu_parent AS a
			 JOIN
			 be_priviledge AS b
			 ON
			 a.id = b.parent_id
			 LEFT JOIN
			 be_menu_child AS c
			 ON
			 c.id = b.child_id
			WHERE 
			(b.`role_id` = '.$id.'
			AND a.`link` = \''.$page.'\')
			OR
			(b.`role_id` ='.$id.'
			AND c.`link` =\''.$page.'\')');
	return $query;
}
}

/* End of file m_menu.php */
/* Location: ./application/models/m_menu.php */