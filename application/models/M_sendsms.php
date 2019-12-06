<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Sendsms extends CI_Model {

	function insertsmsdata($userid,$phone,$message,$tipesms,$sender_id,$trxid,$sendtipe, $vendor){
        $query = $this->db->query("
            INSERT INTO sms_data(
                uniqueid,
                sender,
                msisdn,
                message,
                createdTimeStamp,
                lkddate,
                client,
                sms_tipe,
                send_tipe,
                system_by,
                vendor
            )VALUES(
                '$trxid',
                '$sender_id',
                '$phone',
                '$message',
                NOW(),
                CURDATE(),
                '$userid',
                '$tipesms',
                '$sendtipe',
                'Single BE',
                '$vendor'
            )
        ");
             
        return $query;
    }

    function insertsent($trxid,$error_code,$respon){
        $query = $this->db->query("
            INSERT INTO sms_sent(
                unique_id,
                error_code,
                create_TimeStamp,
                message
            )VALUES(
                '$trxid',
                '$error_code',
                NOW(),
                '$respon'
            )
        ");
             
        return $query;
    }

    function cekPrefix($prefix){
         $query = $this->db->query("
            SELECT 
                provider 
            FROM 
                sms_prefix 
            WHERE 
                kodePrefix = '$prefix' 
            LIMIT 1
        ");
             
        return $query;
    }

    function insertunsent($trxid,$error_code,$respon){
        $query = $this->db->query("
            INSERT INTO sms_unsent(
                unique_id,
                error_code,
                create_TimeStamp,
                message
            )VALUES(
                '$trxid',
                '$error_code',
                NOW(),
                '$respon'
            )
        ");
             
        return $query;
    }

    function insertqueue($userid,$trxid){
        $query = $this->db->query("
            INSERT INTO sms_queue(
                unique_id,
                client,
                create_TimeStamp
            )VALUES(
                '$trxid',
                '$userid',
                NOW()
            )
        ");
             
        return $query;
    }

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */