<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Report extends CI_Model {

	function get_data_all($tanggal, $client){
        /*$query = $this->db->query("
            SELECT 
                uniqueid,
                msisdn,
                createdTimeStamp,
                sender,
                CASE WHEN sms_tipe = 1 THEN 'Long Number' ELSE 'Masking' END as sms_tipe,
                CASE WHEN send_tipe = 1 THEN 'OTP' ELSE 'Blast' END as send_tipe,
                message,
                error_code,
                delivery_status
            FROM
                sms_data
            WHERE 
            	lkdDate = '$tanggal'
            AND 
                flag = 'Y'
            $client
        ");
             
        return $query;*/

        if($client == 'admin'){
            $array = array('lkdDate' => $tanggal, 'flag' => 'Y');
        }else{
            $array = array('lkdDate' => $tanggal, 'flag' => 'Y', 'client' => $client);    
        }
        
        $this->datatables->select("uniqueid,msisdn,createdTimeStamp,sender,CASE WHEN sms_tipe = 1 THEN 'Long Number' ELSE 'Masking' END as sms_tipe,CASE WHEN send_tipe = 1 THEN 'OTP' ELSE 'Blast' END as send_tipe,message,error_code,delivery_status");
        $this->datatables->from('sms_data');
        $this->datatables->where($array);
        
        return $results = $this->datatables->generate('json', 'ISO-8859-1');
    }

    function reportresult_download($tanggal, $client){
        $query = $this->db->query("
            SELECT 
                uniqueid,
                msisdn,
                createdTimeStamp,
                sender,
                CASE WHEN sms_tipe = 1 THEN 'Long Number' ELSE 'Masking' END as sms_tipe,
                CASE WHEN send_tipe = 1 THEN 'OTP' ELSE 'Blast' END as send_tipe,
                message,
                error_code,
                delivery_status
            FROM
                sms_data
            WHERE 
                lkdDate = '$tanggal'
            AND 
                flag = 'Y'
            $client
        ");
             
        return $query;
    }

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */