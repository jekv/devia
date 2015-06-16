<?php
	class smscall extends WP_SMS {
		private $wsdl_link = "http://webservice.smscall.ir/index.php?wsdl";
		public $tariff = "http://www.smscall.ir/?page_id=63";
		public $unitrial = false;
		public $unit;
		public $flash = "enable";
		public $isflash = false;

		public function __construct() {
			parent::__construct();
			$this->validateNumber = "09xxxxxxxx";
			
			ini_set("soap.wsdl_cache_enabled", "0");
		}

		public function SendSMS() {
			
			$client = new SoapClient($this->wsdl_link);
			
			$result = $client->Send_Group_SMS($this->username, $this->password, implode(',', $this->to), $this->msg, $this->from, 1);
			
			if($result) {
				$this->InsertToDB($this->from, $this->msg, $this->to);
				$this->Hook('wp_sms_send', $result);
			}
			
			return $result;
		}

		public function GetCredit() {
		
			$client = new SoapClient($this->wsdl_link);
			
			return $client->CREDIT_LINESMS($this->username, $this->password, $this->from);
		}
	}
?>