<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Sms extends CI_Model {

	function get_sender($username){
        $query = $this->db->query("
            SELECT 
                sender_id
            FROM
                sms_client
            WHERE 
            	username = '$username'
        ");
             
        return $query;
    }

    function total_upload($username){
        $query = $this->db->query("
            SELECT 
                count(id) as total
            FROM
                sms_data
            WHERE 
                client = '$username'
            AND 
                system_by = 'Upload BE'
            AND 
                lkddate = CURDATE()
        ");
             
        return $query;
    }

    function get_senderadmin(){
        $query = $this->db->query("
            SELECT 
                sender_id
            FROM
                sms_client
            WHERE 
            	state = 'Y'
        ");
             
        return $query;
    }

    public function uploadData2($file,$smstipe,$sender,$sendtipe,$username){
        $dbsms  =   $this->load->database('default', TRUE);
        $query  =   $dbsms->query("
            LOAD DATA LOCAL INFILE '".$file."' 
            IGNORE 
            INTO TABLE sms_data
            FIELDS TERMINATED BY '|' 
            OPTIONALLY ENCLOSED BY '\"' 
            LINES TERMINATED BY '\r\n' 
            IGNORE 1 LINES 
            (
              uniqueid,
              msisdn,
              message
            )
            SET `sender` = '$sender', 
            sms_tipe = '$smstipe', 
            send_tipe = '$sendtipe',
            client = '$username',
            lkddate = CURDATE(),
            flag = 'N',
            system_by = 'Upload BE',
            createdTimeStamp = NOW();
        ");

        return $query;
    }

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */