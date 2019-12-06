<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Reportdr extends CI_Model {

	function get_data_all($tanggal, $client){
        if($client == 'admin'){
            $array = array('DATE(createdTimeStamp)' => $tanggal);
        }else{
            $array = array('DATE(createdTimeStamp)' => $tanggal, 'client' => $client);    
        }
        
        $this->datatables->select('trxid,error_code,createdTimeStamp');
        $this->datatables->from('sms_dr_otp');
        $this->datatables->where($array);
        
        return $results = $this->datatables->generate('json', 'ISO-8859-1');
        //return $data['aaData'] = $results['aaData'];
    }

    function reportresult_download($tanggal, $client){
        $query = $this->db->query("
            SELECT 
                trxid,
                error_code,
                createdTimeStamp
            FROM
                sms_dr_otp
            WHERE 
                DATE(createdTimeStamp) = '$tanggal'
            $client
        ");
             
        return $query;
    }

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */