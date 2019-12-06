<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sendsms extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_sendsms');
	}

	public function index()
	{
		$username = $this->session->userdata('nama');
		$trxdate = date('YmdHis');
		$userid = 'tiu';
		$secret = 'Bs9alWLKxWlH93eo6ToL';
		//$secret = 'apaajaisiyagataubenerapaengga';
		$phone = $this->input->post('phone');
		$message = $this->input->post('message');
		$tipesms = $this->input->post('tipesms');
		$sendtipe = $this->input->post('sendtipe');
		$senderid = $this->input->post('senderid');
		$trxid = uniqid();

		$prefix = substr($phone,0,4);

		$cek_prefix = $this->m_sendsms->cekPrefix($prefix);
		foreach ($cek_prefix->result() as $cek) {
			$operator = $cek->provider;
		}

		if(trim($operator) == 'Telkomsel'){
			//echo "masuk telkomsel";
			if($sendtipe == 1){
				$url = "https://api.smshub.co.id/sendOtp";
			}elseif($sendtipe == 2){
				$url = "https://api.smshub.co.id/sendSms";
			}

			if($tipesms == 1){
				$tipe = 'unmask';
			}else{
				$tipe = 'mask';
			}

			$vendor = 'Bhinneka';

			$insert_smsdata = $this->m_sendsms->insertsmsdata($username,$phone,$message,$tipesms,$senderid,$trxid,$sendtipe,$vendor);
			$inserr_queue = $this->m_sendsms->insertqueue($username,$trxid);

			$signature = SHA1($message.$phone.$senderid.$trxdate.$trxid.$tipe.$userid.$secret);

			$user_agent = "Beyond-sms-http-client/1.1";
			$data = array(
			        "userid" => $userid,
				    "msisdn" => $phone,
				    "message" => $message,
				    "type" => $tipe,
				    "sender" => $senderid,
				    "trxid" => $trxid,
				    "trxdate" => $trxdate,
				    "signature" => $signature
			);
			$data_string = json_encode($data);
			//$url = "http://35.247.191.132:3000/kirim";
			//$header = 'application/json'; 
			//setting the curl parameters.
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			// Following line is compulsary to add as it is:
			curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('content-type: application/json'));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 0);
			curl_setopt($ch, CURLOPT_TIMEOUT_MS, 0);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_VERBOSE, true);
			curl_setopt($ch, CURLOPT_FAILONERROR, true);
			$sdata = curl_exec($ch);
			if($sdata){
				//echo $sdata;
				$result = json_decode($sdata);
				//$ack = $result->code;
				$error_code = $result->error;
				$respon = $result->message;

				$info = array(
					"code" => $error_code,
					"message" => $respon
				);

				echo json_encode($info);

				if($error_code == '200'){
					$insert_sent = $this->m_sendsms->insertsent($trxid,$error_code,$respon);
				}else{
					$insert_unsent = $this->m_sendsms->insertunsent($trxid,$error_code,$respon);
				}

			}
			ob_end_flush();
			curl_close($ch);

		}else{

			$country_code = substr($phone,0,1);
							
			if($country_code == 0){
				$msisdndart = "62".substr(trim($phone),1);
			}else{
			
				$msisdndart = trim($phone);
			}

			$pesandart = urlencode(utf8_encode(trim($message)));

			if($tipesms == 1){
				$tipe = 'unmask';
			}else{
				$tipe = 'mask';
			}

			if($sendtipe == 1){
				$tipedart = "1";
			}else{
				$tipedart = "0";
			}

			$userdart = "userPKP";
			$passdart = "Qwte12eGBwr987Wu";

			$urldart = "http://203.166.197.162/ApiDM/receive.php?uid=$userdart&pwd=$passdart&serviceid=1000&msisdn=$msisdndart&sms=$pesandart&transid=$trxid&smstype=$tipedart&sc=$senderid";

			$vendor = 'Dartmedia';

			$insert_smsdata = $this->m_sendsms->insertsmsdata($username,$phone,$message,$tipesms,$senderid,$trxid,$sendtipe,$vendor);
			$inserr_queue = $this->m_sendsms->insertqueue($username,$trxid);

			$signature = SHA1($message.$phone.$senderid.$trxdate.$trxid.$tipe.$userid.$secret);

			$user_agent = "Beyond-sms-http-client/1.1";
			/*$data = array(
			        "userid" => $userid,
				    "msisdn" => $phone,
				    "message" => $message,
				    "type" => $tipe,
				    "sender" => $senderid,
				    "trxid" => $trxid,
				    "trxdate" => $trxdate,
				    "signature" => $signature
			);
			$data_string = json_encode($data);*/
			//$url = "http://35.247.191.132:3000/kirim";
			//$header = 'application/json'; 
			//setting the curl parameters.
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $urldart);
			// Following line is compulsary to add as it is:
			curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
			curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 0);
			curl_setopt($ch, CURLOPT_TIMEOUT_MS, 0);
			curl_setopt($ch, CURLOPT_VERBOSE, true);
			curl_setopt($ch, CURLOPT_FAILONERROR, false);
			curl_setopt($ch, CURLOPT_HTTP200ALIASES, (array)400);
			//$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			$sdata = curl_exec($ch);
			$infos = curl_getinfo($ch);
			$httpcode = $infos["http_code"]; 
			//var_dump();
			if($sdata){
				
				if($httpcode == 200){
					//echo $sdata;
					$result = simplexml_load_string($sdata);
					//$ack = $result->code;
					//
					//echo $result->STATUS;
					$error_code = $result->STATUS[0];
					$respon = $result->MSG[0];

					echo $error_code;

					$info = array(
						"code" => $error_code,
						"message" => $respon
					);

					echo json_encode($info);

					if($error_code == '0'){
						$insert_sent = $this->m_sendsms->insertsent($trxid,$error_code,$respon);
					}else{
						$insert_unsent = $this->m_sendsms->insertunsent($trxid,$error_code,$respon);
					}

				}elseif($httpcode == 400){
					$error_code = "400";
					$respon = "Error gateway 400";

					$info = array(
						"code" => $error_code,
						"message" => $respon
					);

					echo json_encode($info);

					if($error_code == '0'){
						$insert_sent = $this->m_sendsms->insertsent($trxid,$error_code,$respon);
					}else{
						$insert_unsent = $this->m_sendsms->insertunsent($trxid,$error_code,$respon);
					}
				}
				

			}
			ob_end_flush();
			curl_close($ch);

		}

		

	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */