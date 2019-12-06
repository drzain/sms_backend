<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-07-15 00:14:48 --> Severity: Error --> Call to a member function result() on array C:\laragon\www\stisla\stisla-codeigniter\application\controllers\Users.php 26
ERROR - 2019-07-15 00:20:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '\'<button type='button' id='edit-user' class='btn btn-info'>Edit</button>&nbsp;<' at line 12 - Invalid query:  
        	SELECT 
        		username,
        		firstname,
        		lastname,
        		email,
        		role_id,
        		CASE WHEN is_active = 1 THEN 
        			'Active'
        		ELSE 
        			'Inactive'
        		END as 'status',
        		CONCAT(\'<button type='button' id='edit-user' class='btn btn-info'>Edit</button>&nbsp;<button type='button' id='delete-user' class='btn btn-info'>Delete</button>\')
        	FROM
        		be_user 
        
ERROR - 2019-07-15 10:54:02 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 10:54:02 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 10:54:02 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 10:54:19 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 10:54:19 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 10:54:20 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 10:55:14 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 10:55:14 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 10:55:15 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 10:55:32 --> 404 Page Not Found: Users/new_user
ERROR - 2019-07-15 10:55:42 --> 404 Page Not Found: Users/new_user
ERROR - 2019-07-15 10:59:05 --> 404 Page Not Found: Users/new_user
ERROR - 2019-07-15 11:02:17 --> Severity: Parsing Error --> syntax error, unexpected '}' C:\laragon\www\stisla\stisla-codeigniter\application\controllers\Users.php 54
ERROR - 2019-07-15 11:30:00 --> 404 Page Not Found: Users/index
ERROR - 2019-07-15 14:07:04 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 14:07:04 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 14:07:04 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 14:08:10 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 14:08:10 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 14:08:11 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 14:12:49 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 14:12:49 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 14:12:50 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 14:52:50 --> Severity: Notice --> Use of undefined constant delete_user - assumed 'delete_user' C:\laragon\www\stisla\stisla-codeigniter\application\controllers\Users.php 70
ERROR - 2019-07-15 15:30:38 --> Severity: error --> Exception: Unable to locate the model you have specified: M_priviledge C:\laragon\www\stisla\stisla-codeigniter\system\core\Loader.php 348
ERROR - 2019-07-15 15:31:06 --> Severity: Notice --> Undefined property: Priviledge::$m_users C:\laragon\www\stisla\stisla-codeigniter\application\controllers\Priviledge.php 14
ERROR - 2019-07-15 15:31:06 --> Severity: Error --> Call to a member function get_role() on null C:\laragon\www\stisla\stisla-codeigniter\application\controllers\Priviledge.php 14
ERROR - 2019-07-15 15:31:26 --> Severity: Notice --> Undefined variable: master_role C:\laragon\www\stisla\stisla-codeigniter\application\views\template\setup\priviledge\index.php 96
ERROR - 2019-07-15 15:31:26 --> Severity: Error --> Call to a member function result() on null C:\laragon\www\stisla\stisla-codeigniter\application\views\template\setup\priviledge\index.php 96
ERROR - 2019-07-15 15:32:09 --> Severity: Notice --> Undefined variable: master_role C:\laragon\www\stisla\stisla-codeigniter\application\views\template\setup\priviledge\index.php 96
ERROR - 2019-07-15 15:32:09 --> Severity: Error --> Call to a member function result() on null C:\laragon\www\stisla\stisla-codeigniter\application\views\template\setup\priviledge\index.php 96
ERROR - 2019-07-15 15:37:50 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 15:38:02 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 15:38:02 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 15:38:02 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 15:38:24 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 15:38:24 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 15:38:25 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 15:38:25 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 15:39:06 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 15:39:06 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 15:39:06 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 15:39:09 --> 404 Page Not Found: Assets/modules
ERROR - 2019-07-15 15:42:08 --> Query error: Unknown column 'role_name' in 'field list' - Invalid query: 
        	SELECT 
        		role_name,
        		CASE WHEN is_active = 1 THEN 
        			'Active'
        		ELSE 
        			'Inactive'
        		END as 'status',
        		CONCAT('<button type="button" id="edit-user" class="btn btn-info">Edit</button>&nbsp;<button type="button" id="delete-user" class="btn btn-info">Delete</button>')
        	FROM
        		be_user 
        
ERROR - 2019-07-15 15:42:17 --> Query error: Unknown column 'role_name' in 'field list' - Invalid query: 
        	SELECT 
        		role_name,
        		CASE WHEN is_active = 1 THEN 
        			'Active'
        		ELSE 
        			'Inactive'
        		END as 'status',
        		CONCAT('<button type="button" id="edit-user" class="btn btn-info">Edit</button>&nbsp;<button type="button" id="delete-user" class="btn btn-info">Delete</button>')
        	FROM
        		be_user 
        
ERROR - 2019-07-15 15:58:33 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\laragon\www\stisla\stisla-codeigniter\application\models\M_Priviledge.php 15
ERROR - 2019-07-15 15:58:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''<button type="button" id="edit-role" class="btn btn-info">Edit</button>&nbsp;<b' at line 8 - Invalid query: 
        	SELECT 
        		role_name,
        		CASE WHEN is_active = 1 THEN 
        			'Active'
        		ELSE 
        			'Inactive'
        		END as 'status',
        		CONCAT('<button type="button" id="edit-role" class="btn btn-info">Edit</button>&nbsp;<button type="button" id="delete-role" class="btn btn-warning">Delete</button>&nbsp;<a href="/priviledge/detail/
ERROR - 2019-07-15 15:59:11 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\laragon\www\stisla\stisla-codeigniter\application\models\M_Priviledge.php 15
ERROR - 2019-07-15 15:59:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''<button type="button" id="edit-role" class="btn btn-info">Edit</button>&nbsp;<b' at line 8 - Invalid query: 
        	SELECT 
        		role_name,
        		CASE WHEN is_active = 1 THEN 
        			'Active'
        		ELSE 
        			'Inactive'
        		END as 'status',
        		CONCAT('<button type="button" id="edit-role" class="btn btn-info">Edit</button>&nbsp;<button type="button" id="delete-role" class="btn btn-warning">Delete</button>&nbsp;<a href="http://localhost/stisla/stisla-codeigniter/priviledge/
ERROR - 2019-07-15 15:59:21 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\laragon\www\stisla\stisla-codeigniter\application\models\M_Priviledge.php 15
ERROR - 2019-07-15 15:59:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''<button type="button" id="edit-role" class="btn btn-info">Edit</button>&nbsp;<b' at line 8 - Invalid query: 
        	SELECT 
        		role_name,
        		CASE WHEN is_active = 1 THEN 
        			'Active'
        		ELSE 
        			'Inactive'
        		END as 'status',
        		CONCAT('<button type="button" id="edit-role" class="btn btn-info">Edit</button>&nbsp;<button type="button" id="delete-role" class="btn btn-warning">Delete</button>&nbsp;<a href="http://localhost/stisla/stisla-codeigniter/priviledge/
ERROR - 2019-07-15 16:00:42 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\laragon\www\stisla\stisla-codeigniter\application\models\M_Priviledge.php 15
ERROR - 2019-07-15 16:00:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''<button type="button" id="edit-role" class="btn btn-info">Edit</button>&nbsp;<b' at line 8 - Invalid query: 
        	SELECT 
        		role_name,
        		CASE WHEN is_active = 1 THEN 
        			'Active'
        		ELSE 
        			'Inactive'
        		END as 'status',
        		CONCAT('<button type="button" id="edit-role" class="btn btn-info">Edit</button>&nbsp;<button type="button" id="delete-role" class="btn btn-warning">Delete</button>&nbsp;<a href="http://localhost/stisla/stisla-codeigniter/priviledge/
ERROR - 2019-07-15 16:49:23 --> Severity: Parsing Error --> syntax error, unexpected '1' (T_LNUMBER) C:\laragon\www\stisla\stisla-codeigniter\application\models\M_Priviledge.php 26
ERROR - 2019-07-15 16:49:55 --> Severity: Notice --> Undefined variable: id C:\laragon\www\stisla\stisla-codeigniter\application\models\M_Priviledge.php 26
ERROR - 2019-07-15 16:49:55 --> Severity: Notice --> Undefined variable: id C:\laragon\www\stisla\stisla-codeigniter\application\models\M_Priviledge.php 27
ERROR - 2019-07-15 16:49:55 --> Severity: Notice --> Undefined variable: id C:\laragon\www\stisla\stisla-codeigniter\application\models\M_Priviledge.php 27
ERROR - 2019-07-15 16:49:55 --> Severity: Notice --> Undefined variable: id C:\laragon\www\stisla\stisla-codeigniter\application\models\M_Priviledge.php 29
ERROR - 2019-07-15 16:49:55 --> Severity: Notice --> Undefined variable: id C:\laragon\www\stisla\stisla-codeigniter\application\models\M_Priviledge.php 30
ERROR - 2019-07-15 16:49:55 --> Severity: Notice --> Undefined variable: id C:\laragon\www\stisla\stisla-codeigniter\application\models\M_Priviledge.php 30
ERROR - 2019-07-15 16:49:55 --> Severity: Notice --> Undefined variable: id C:\laragon\www\stisla\stisla-codeigniter\application\models\M_Priviledge.php 32
ERROR - 2019-07-15 16:49:55 --> Severity: Notice --> Undefined variable: id C:\laragon\www\stisla\stisla-codeigniter\application\models\M_Priviledge.php 32
ERROR - 2019-07-15 16:49:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND parent_id = a.`id` AND  child_id = b.id )>0,
			CONCAT('<input type="checkb' at line 2 - Invalid query: 
        	SELECT  a.id AS parentid, a.`caption` AS parent, a.`link`,  b.id, b.`caption` AS child, b.`link`, 
			IF((SELECT COUNT(be_priviledge.id) FROM be_priviledge WHERE  role_id =  AND parent_id = a.`id` AND  child_id = b.id )>0,
			CONCAT('<input type="checkbox" id="menu" value = "',IF (b.id  IS NULL ,CONCAT(,',',a.`id`,',',0),CONCAT(,',',a.`id`,',',b.id) ),'" class="minimal-red" checked >'),

			IF((SELECT COUNT(be_priviledge.id) FROM be_priviledge JOIN be_menu_parent ON be_priviledge.`parent_id`= be_menu_parent.`id` WHERE role_id =    AND parent_id =   a.`id` AND isparent= 'N' 
			)>0,CONCAT('<input type="checkbox" id="menu" value = "',IF (b.id  IS NULL ,CONCAT(,',',a.`id`,',',0),CONCAT(,',',a.`id`,',',b.id) ),'" class="minimal-red" checked >'),
			
			CONCAT('<input type="checkbox" id="menu" value = "',IF (b.id  IS NULL ,CONCAT(,',',a.`id`,',',0),CONCAT(,',',a.`id`,',',b.id) ),'" class="minimal-red" >'))) AS cek
			FROM
			be_menu_parent AS a 
			LEFT JOIN
			be_menu_child AS b
			ON
			a .id = b.`parent_id`
			WHERE
			a.`ismenu`= 'Y'
			ORDER BY  a.`id`,b.id asc
        
ERROR - 2019-07-15 16:49:55 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\laragon\www\stisla\stisla-codeigniter\system\core\Exceptions.php:271) C:\laragon\www\stisla\stisla-codeigniter\system\core\Common.php 570
ERROR - 2019-07-15 16:50:06 --> Severity: Notice --> Undefined variable: title C:\laragon\www\stisla\stisla-codeigniter\application\views\dist\_partials\header.php 9
ERROR - 2019-07-15 16:50:49 --> Severity: Notice --> Undefined variable: title C:\laragon\www\stisla\stisla-codeigniter\application\views\dist\_partials\header.php 9
ERROR - 2019-07-15 16:52:45 --> Severity: Notice --> Undefined variable: title C:\laragon\www\stisla\stisla-codeigniter\application\views\dist\_partials\header.php 9
ERROR - 2019-07-15 16:53:11 --> Severity: Notice --> Undefined variable: title C:\laragon\www\stisla\stisla-codeigniter\application\views\dist\_partials\header.php 9
ERROR - 2019-07-15 16:55:20 --> Severity: Notice --> Undefined variable: title C:\laragon\www\stisla\stisla-codeigniter\application\views\dist\_partials\header.php 9
ERROR - 2019-07-15 16:55:58 --> Severity: Notice --> Undefined variable: title C:\laragon\www\stisla\stisla-codeigniter\application\views\dist\_partials\header.php 9
ERROR - 2019-07-15 16:57:32 --> 404 Page Not Found: Priviledge/savepriviledge
ERROR - 2019-07-15 17:00:08 --> Severity: Notice --> Undefined variable: title C:\laragon\www\stisla\stisla-codeigniter\application\views\dist\_partials\header.php 9
ERROR - 2019-07-15 17:00:39 --> Severity: Notice --> Undefined variable: title C:\laragon\www\stisla\stisla-codeigniter\application\views\dist\_partials\header.php 9
ERROR - 2019-07-15 17:01:43 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE) C:\laragon\www\stisla\stisla-codeigniter\application\controllers\Priviledge.php 48
ERROR - 2019-07-15 17:01:59 --> 404 Page Not Found: Priviledge/priviledge
ERROR - 2019-07-15 17:19:25 --> 404 Page Not Found: Priviledge/update_role
ERROR - 2019-07-15 17:19:32 --> 404 Page Not Found: Priviledge/update_role
ERROR - 2019-07-15 21:01:19 --> 404 Page Not Found: Priviledge/update_role
ERROR - 2019-07-15 21:01:24 --> 404 Page Not Found: Priviledge/update_role
ERROR - 2019-07-15 21:06:35 --> 404 Page Not Found: Priviledge/new_role
ERROR - 2019-07-15 21:06:40 --> 404 Page Not Found: Priviledge/new_role
ERROR - 2019-07-15 21:11:44 --> Severity: Error --> Call to undefined method M_Priviledge::delete_role() C:\laragon\www\stisla\stisla-codeigniter\application\controllers\Priviledge.php 91
