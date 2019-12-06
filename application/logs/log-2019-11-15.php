<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-11-15 10:27:19 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 10:27:19 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 10:27:19 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 10:28:45 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 10:28:45 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 10:28:45 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 10:28:55 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 10:28:55 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 10:28:55 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 10:29:57 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 10:29:57 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 10:29:57 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 10:31:19 --> 404 Page Not Found: Sourcemaps/inpage.js.map
ERROR - 2019-11-15 10:31:21 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 10:31:21 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 10:31:26 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 10:31:26 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 10:31:26 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 10:31:37 --> 404 Page Not Found: Sourcemaps/inpage.js.map
ERROR - 2019-11-15 10:31:39 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 10:31:39 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 10:31:43 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 10:31:43 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 10:31:43 --> 404 Page Not Found: Assets/modules
ERROR - 2019-11-15 14:14:07 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\laragon\www\smsbackend\application\controllers\Sendsms.php:69) C:\laragon\www\smsbackend\system\core\Common.php 570
ERROR - 2019-11-15 14:14:07 --> Severity: Error --> Call to undefined method M_Sendsms::insertsmsdata() C:\laragon\www\smsbackend\application\controllers\Sendsms.php 72
ERROR - 2019-11-15 14:20:17 --> Severity: Notice --> Undefined variable: sender_id C:\laragon\www\smsbackend\application\controllers\Sendsms.php 37
ERROR - 2019-11-15 14:27:13 --> Query error: Unknown column 'createdTimeStamp' in 'field list' - Invalid query: 
            INSERT INTO sms_sent(
                unique_id,
                error_code,
                createdTimeStamp
            )VALUES(
                '5dce5350ca490',
                '200',
                NOW()
            )
        
ERROR - 2019-11-15 14:28:23 --> Query error: Unknown column 'createdTimeStamp' in 'field list' - Invalid query: 
            INSERT INTO sms_sent(
                unique_id,
                error_code,
                createdTimeStamp
            )VALUES(
                '5dce53962db84',
                '200',
                NOW()
            )
        
ERROR - 2019-11-15 14:28:49 --> Query error: Unknown column 'createdTimeStamp' in 'field list' - Invalid query: 
            INSERT INTO sms_sent(
                unique_id,
                error_code,
                createdTimeStamp
            )VALUES(
                '5dce53b0959f7',
                '200',
                NOW()
            )
        
ERROR - 2019-11-15 14:29:18 --> Query error: The user specified as a definer ('ceontab'@'%') does not exist - Invalid query: 
            INSERT INTO sms_sent(
                unique_id,
                error_code,
                create_TimeStamp
            )VALUES(
                '5dce53cdb9ca3',
                '200',
                NOW()
            )
        
ERROR - 2019-11-15 14:39:34 --> Query error: The user specified as a definer ('root'@'%') does not exist - Invalid query: 
            INSERT INTO sms_sent(
                unique_id,
                error_code,
                create_TimeStamp
            )VALUES(
                '5dce563597741',
                '200',
                NOW()
            )
        
ERROR - 2019-11-15 15:45:42 --> Query error: Unknown column 'trxid' in 'field list' - Invalid query: 
            SELECT 
                trxid,
                msisdn,
                createdTimeStamp,
                sms_tipe,
                send_tipe,
                content,
                error_code
            FROM
                sms_data
            WHERE 
            	client = 'admin'
            AND 
            	lkdDate = '2019-11-15'
            AND 
                flag = 'Y'
        
ERROR - 2019-11-15 15:45:48 --> Query error: Unknown column 'trxid' in 'field list' - Invalid query: 
            SELECT 
                trxid,
                msisdn,
                createdTimeStamp,
                sms_tipe,
                send_tipe,
                content,
                error_code
            FROM
                sms_data
            WHERE 
            	client = 'admin'
            AND 
            	lkdDate = '2019-11-15'
            AND 
                flag = 'Y'
        
ERROR - 2019-11-15 15:46:09 --> Query error: Unknown column 'content' in 'field list' - Invalid query: 
            SELECT 
                uniqueid,
                msisdn,
                createdTimeStamp,
                sms_tipe,
                send_tipe,
                content,
                error_code
            FROM
                sms_data
            WHERE 
            	client = 'admin'
            AND 
            	lkdDate = '2019-11-15'
            AND 
                flag = 'Y'
        
ERROR - 2019-11-15 15:48:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '== 1 THEN 'Long Number' ELSE 'Masking' END as sms_tipe,
                CASE WH' at line 6 - Invalid query: 
            SELECT 
                uniqueid,
                msisdn,
                createdTimeStamp,
                sender,
                CASE WHEN sms_tipe == 1 THEN 'Long Number' ELSE 'Masking' END as sms_tipe,
                CASE WHEN send_tipe == 1 THEN 'OTP' ELSE 'Blast' END as send_tipe,
                message,
                error_code
            FROM
                sms_data
            WHERE 
            	client = 'admin'
            AND 
            	lkdDate = '2019-11-15'
            AND 
                flag = 'Y'
        
ERROR - 2019-11-15 15:48:45 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '== 1 THEN 'Long Number' ELSE 'Masking' END as sms_tipe,
                CASE WH' at line 6 - Invalid query: 
            SELECT 
                uniqueid,
                msisdn,
                createdTimeStamp,
                sender,
                CASE WHEN sms_tipe == 1 THEN 'Long Number' ELSE 'Masking' END as sms_tipe,
                CASE WHEN send_tipe == 1 THEN 'OTP' ELSE 'Blast' END as send_tipe,
                message,
                error_code
            FROM
                sms_data
            WHERE 
            	client = 'admin'
            AND 
            	lkdDate = '2019-11-15'
            AND 
                flag = 'Y'
        
ERROR - 2019-11-15 15:49:38 --> Query error: Unknown column 'respon' in 'field list' - Invalid query: 
            SELECT 
                uniqueid,
                msisdn,
                createdTimeStamp,
                sender,
                CASE WHEN sms_tipe = 1 THEN 'Long Number' ELSE 'Masking' END as sms_tipe,
                CASE WHEN send_tipe = 1 THEN 'OTP' ELSE 'Blast' END as send_tipe,
                message,
                error_code,
                respon
            FROM
                sms_data
            WHERE 
            	client = 'admin'
            AND 
            	lkdDate = '2019-11-15'
            AND 
                flag = 'Y'
        
ERROR - 2019-11-15 16:20:33 --> Severity: Notice --> Undefined property: Client::$m_users C:\laragon\www\smsbackend\application\controllers\Client.php 66
ERROR - 2019-11-15 16:20:33 --> Severity: Error --> Call to a member function delete_user() on null C:\laragon\www\smsbackend\application\controllers\Client.php 66
ERROR - 2019-11-15 16:20:48 --> Severity: Notice --> Undefined property: Client::$m_users C:\laragon\www\smsbackend\application\controllers\Client.php 66
ERROR - 2019-11-15 16:20:48 --> Severity: Error --> Call to a member function delete_user() on null C:\laragon\www\smsbackend\application\controllers\Client.php 66
ERROR - 2019-11-15 16:28:31 --> Severity: Parsing Error --> syntax error, unexpected '$data' (T_VARIABLE), expecting ',' or ';' C:\laragon\www\smsbackend\application\views\template\setup\client\index.php 70
ERROR - 2019-11-15 16:28:51 --> Severity: Parsing Error --> syntax error, unexpected '$datas' (T_VARIABLE), expecting ',' or ';' C:\laragon\www\smsbackend\application\views\template\setup\client\index.php 70
