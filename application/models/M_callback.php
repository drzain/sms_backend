<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_callback extends CI_Model {

	function insertdr($trxid,$status,$ref_id,$dr,$userid){
        $query = $this->db->query("
        	INSERT INTO sms_dr_otp(
                trxid,
                status,
                ref_id,
                dr,
                userid,
                createdTimeStamp
            )VALUES(
                '$trxid',
                '$status',
                '$ref_id',
                '$dr',
                '$userid',
                NOW()
            )
        ");
			 
        //return $query;
        return $this->db->affected_rows();
    } 

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */