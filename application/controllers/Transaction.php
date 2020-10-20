<?php 

class Transaction extends CI_Controller {
	function __construct()
	{
          parent::__construct();
          $this->load->database('default');

          session_start();
    }

    function View_StoreLoad() {
		echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Testing"
		));
	}

	function View_BalanceLoad() {
		$AccountQuery = $this->db->query("Select * from Account where AccountID=". $_SESSION['AccountID'])->result()[0];

		if($AccountQuery->StudentID != 0) {

			$data['isError'] = false;
			$data['Account_SM'] = $AccountQuery->Account_AvailableBalance;
			$data['Account_STF'] = $AccountQuery->Account_TuitionBalance;

			echo json_encode($data);
		}
		else echo json_encode(array(
			"isError" => true
		));
	}

	function Create_DoneButton() {
		if(isset($_POST['CardType']) && isset($_POST['Amount']) && isset($_POST['CardNumber']) && isset($_POST['SecurityNumber']) && isset($_POST['CardName']) && isset($_POST['ExpireYear']) && isset($_POST['ExpireMonth']) && isset($_POST['ExpireDay']) && isset($_POST['AddressLine_A']) && isset($_POST['AddressLine_B']) && isset($_POST['AddressCP']) && isset($_POST['AddressSR']) && isset($_POST['ZipNumber']) && isset($_POST['isTOS'])) {
			if(!empty($_POST['CardType']) && !empty($_POST['Amount']) && !empty($_POST['CardNumber']) && !empty($_POST['SecurityNumber']) && !empty($_POST['CardName']) && !empty($_POST['ExpireYear']) && !empty($_POST['ExpireMonth']) && !empty($_POST['ExpireDay']) && !empty($_POST['AddressLine_A']) && !empty($_POST['AddressLine_B']) && !empty($_POST['AddressCP']) && !empty($_POST['AddressSR']) && !empty($_POST['ZipNumber']) && !empty($_POST['isTOS'])) {
				if(strtoupper($_POST['CardType']) != "PAYPAL") echo json_encode(array(
					"isError" => true,
					"ErrorDisplay" => "Error: Please Select Any Card Type!"
				));
				else {
					if($_POST['isTOS'] == true) {
						if(strtoupper($_POST['CardType']) == "PAYPAL") $this->Paypal(json_encode($_POST));
					}
					else echo json_encode(array(
						"isError" => true,
						"ErrorDisplay" => "Error: Please press the Checkbox TOS to Agree!"
					));
				}
			}
			else {
				$ErrorDisplay = "";

				if(empty($_POST['CardType'])) $ErrorDisplay .= "(Card Type) ";
				if(empty($_POST['Amount'])) $ErrorDisplay .= "(Amount) ";

				if(empty($_POST['CardNumber'])) $ErrorDisplay .= "(Card Number) ";
				if(empty($_POST['SecurityNumber'])) $ErrorDisplay .= "(Security Code) ";
				if(empty($_POST['CardName'])) $ErrorDisplay .= "(Name) ";

				if(empty($_POST['ExpireYear'])) $ErrorDisplay .= "(Year) ";
				if(empty($_POST['ExpireMonth'])) $ErrorDisplay .= "(Month) ";
				if(empty($_POST['ExpireDay'])) $ErrorDisplay .= "(Day) ";

				if(empty($_POST['AddressLine_A'])) $ErrorDisplay .= "(Address Line 1) ";
				if(empty($_POST['AddressLine_B'])) $ErrorDisplay .= "(Address Line 2) ";
				if(empty($_POST['AddressCP'])) $ErrorDisplay .= "(City / Provice) ";
				if(empty($_POST['AddressSR'])) $ErrorDisplay .= "(State / Region) ";
				if(empty($_POST['ExpireDay'])) $ErrorDisplay .= "(Zip Code) ";

				if(empty($_POST['isTOS'])) $ErrorDisplay .= "(isTOS) ";

				echo json_encode(array(
					"isError" => true,
					"ErrorDisplay" => "Error: " .$ErrorDisplay. "is Empty!"
				));
			}
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Error: Unexpected Error Occur!"
		));
	}

	function Paypal($arr) {
		$Package = json_decode($arr);
		$PayPalConfig = include APPPATH.'third_party/PayPalConfig.php';

		//
	} 
}

?>