<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-07-19 08:18:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ORDER BY 
		 menu_order ASC' at line 16 - Invalid query: SELECT distinct
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
		 ismenu ='Y'
		 and
		 b.role_id=
		 ORDER BY 
		 menu_order ASC
		 
