<?php 
include APPPATH.'third_party/PHPMailer/src/Exception.php';
include APPPATH.'third_party/PHPMailer/src/PHPMailer.php';
include APPPATH.'third_party/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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

	function View_RecordLoad() {
		if(isset($_GET['item'])) {
			if(!empty($_GET['item'])) {
				if($_GET['item'] != 0) {
					if($this->db->query("Select Count(*) as x from Transaction")->result()[0]->x != 0) {
						$data['isError'] = false;
						$data['isEmpty'] = false;
						$data['TransactionArray'] = [];

						foreach ($this->db->query("Select * from Transaction Order by TransactionID DESC LIMIT ". $_GET['item'])->result() as $value) array_push($data['TransactionArray'], $value->TransactionID);

						echo json_encode($data);
					}
					else echo json_encode(array(
						"isError" => false,
						"isEmpty" => true
					));
				}
				else {
					if($this->db->query("Select Count(*) as x from Transaction")->result()[0]->x != 0) {
						$data['isError'] = false;
						$data['isEmpty'] = false;
						$data['TransactionArray'] = [];

						foreach ($this->db->query("Select * from Transaction Order by TransactionID DESC LIMIT ". $_GET['item'])->result() as $value) array_push($data['TransactionArray'], $value->TransactionID);

						echo json_encode($data);
					}
					else echo json_encode(array(
						"isError" => false,
						"isEmpty" => true
					));
				}
			}
			else echo json_encode(array(
				"isError" => true,
				"ErrorDisplay" => "Error: Unexpected Error Occurs!"
			));
		}
		else echo json_encode(array(
			"isError" => true
		)); 
	}

	function View_RecordItem() {
		if(isset($_GET['id'])) {
			if(!empty($_GET['id'])) {
				$TransactionQuery = $this->db->query("Select * from Transaction where TransactionID=". $_GET['id'])->result()[0];
				$StudentQuery = $this->db->query("Select * from Student where StudentID=". $TransactionQuery->StudentID)->result()[0];

				$data['isError'] = false;
				$data['StudentName'] = json_decode($StudentQuery->Name)->Lastname. ", " .json_decode($StudentQuery->Name)->Firstname. " " .strtoupper(substr(json_decode($StudentQuery->Name)->Middlename, 0, 1));
				$data['TransactionType'] = $TransactionQuery->TransactionType;
				$data['TransactionAmount'] = json_decode($TransactionQuery->TransactionDescription)->TransactionAmount;
				$data['TransactionFee'] = json_decode($TransactionQuery->TransactionDescription)->TransactionFee;
				$data['Cash'] = json_decode($TransactionQuery->TransactionDescription)->TransactionCash;
				$data['Timeline'] = $TransactionQuery->DateRegister. " " .$TransactionQuery->TimeRegister;

				echo json_encode($data);
			}
			else echo json_encode(array(
				"isError" => true,
				"ErrorDisplay" => "Error: Unexpected Error Occurs!"
			));
		}
		else echo json_encode(array(
			"isError" => true
		)); 
	}

	function View_SearchButton() {
		if(isset($_GET['id'])) {
			if(!empty($_GET['id'])) {
				if($this->db->query("Select Count(*) as x from Student where StudentID=". $_GET['id'])->result()[0]->x != 0) {
					$StudentQuery = $this->db->query("Select * from Student where StudentID=". $_GET['id'])->result()[0];

					$data['isError'] = false;
					$data['TransactionArray'] = [];

					foreach ($this->db->query("Select * from Transaction where StudentID=". $_GET['id'])->result() as $value) array_push($data['TransactionArray'], array(
						'StudentName' => json_decode($StudentQuery->Name)->Lastname. ", " .json_decode($StudentQuery->Name)->Firstname. " " .strtoupper(substr(json_decode($StudentQuery->Name)->Middlename, 0, 1)),
						'TransactionType' => $value->TransactionType,
						'TransactionAmount' => json_decode($value->TransactionDescription)->TransactionAmount,
						'TransactionFee' => json_decode($value->TransactionDescription)->TransactionFee,
						'Cash' => json_decode($value->TransactionDescription)->TransactionCash,
						'Timeline' => $value->DateRegister. " " .$value->TimeRegister
					));

					echo json_encode($data);
				}
			}
			else echo json_encode(array(
				"isError" => true,
				"ErrorDisplay" => "Error: Unexpected Error Occurs!"
			));
		}
		else echo json_encode(array(
			"isError" => true
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

	function Deposits_NextButton() {
		if(isset($_POST['StudentID']) && isset($_POST['Amountbox']) && isset($_POST['Cashbox'])) {
			if(!empty($_POST['StudentID']) && !empty($_POST['Amountbox']) && !empty($_POST['Cashbox'])) {
				$Fee = '1';

				if(strlen($_POST['Amountbox']) >= 2) for ($i = 2; $i < strlen($_POST['Amountbox']); $i++) $Fee .= '0';
				if(strlen($_POST['Amountbox']) == 1) $Fee = '0';

				if($_POST['Amountbox'] + intval($Fee) <= $_POST['Cashbox']) {

					// Checking if the StudentID is Valid
					if($this->db->query("Select Count(*) as x from Account where StudentID=". $_POST['StudentID']. " and AccountType ='STUDENT'")->result()[0]->x != 0) {
						// Checking if the StudentID is Exist
						if($this->db->query("Select Count(*) as x from Student where StudentID=". $_POST['StudentID'])->result()[0]->x != 0) {
							// Checking if the StudentID is not graduated yet
							if($this->db->query("Select * from Student where StudentID=". $_POST['StudentID'])->result()[0]->Status == "non-graduated") {
								$this->db->insert("Transaction", array(
									"StudentID" => $_POST['StudentID'],
									"TransactionType" => "DEPOSITS",
									"TransactionDescription" => json_encode(array(
											"EmployeeID" => $_SESSION['AccountID'],
											"StudentID" => $_POST['StudentID'],
											"TransactionFee" => $Fee,
											"TransactionAmount" => $_POST['Amountbox'],
											"TransactionCash" => $_POST['Cashbox']
									)),
									"DateRegister" => date("Y-m-d"),
									"TimeRegister" => date("H:i:s")
								));

								$this->db->update("Account", array(
									"Account_AvailableBalance" => $this->db->query("Select * from Account where StudentID=". $_POST['StudentID']. " and AccountType ='STUDENT'")->result()[0]->Account_AvailableBalance + $_POST['Amountbox']
								), "StudentID=". $_POST['StudentID']. " and AccountType ='STUDENT'");

								echo json_encode(array(
									"isError" => false,
									"Total" => $_POST['Amountbox'] + intval($Fee),
									"Cash" => $_POST['Cashbox'],
									"Change" => ($_POST['Amountbox'] + intval($Fee)) - $_POST['Cashbox']
								));
							}
							else echo json_encode(array(
								"isError" => true,
								"ErrorDisplay" => "Error: This Student is already Graduated, Therefore not allowed to do any 'Transaction' anymore!"
							));
						}
						else echo json_encode(array(
							"isError" => true,
							"ErrorDisplay" => "Error: Not Existed!"
						));
					}
					else echo json_encode(array(
						"isError" => true,
						"ErrorDisplay" => "Error: Invalid Student ID!"
					));
				}
				else echo json_encode(array(
					"isError" => true,
					"ErrorDisplay" => "Error: Cash not enough!"
				));
			}
			else {
				$ErrorDisplay = "";

				if(empty($_POST['StudentID'])) $ErrorDisplay .= "(Student ID) ";
				if(empty($_POST['Amountbox'])) $ErrorDisplay .= "(Amount) ";
				if(empty($_POST['Cashbox'])) $ErrorDisplay .= "(Cash) ";

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

	function Redeem_NextButton() {
		if(isset($_POST['StudentID']) && isset($_POST['Amountbox']) && isset($_POST['Cashbox'])) {
			if(!empty($_POST['StudentID']) && !empty($_POST['Amountbox']) && !empty($_POST['Cashbox'])) {
				$Fee = '1';
				$Code = rand(0, 999999999);

				if(strlen($_POST['Amountbox']) >= 2) for ($i = 2; $i < strlen($_POST['Amountbox']); $i++) $Fee .= '0';
				if(strlen($_POST['Amountbox']) == 1) $Fee = '0';

				if($_POST['Amountbox'] + intval($Fee) <= $_POST['Cashbox']) {

					// Checking if the StudentID is Valid
					if($this->db->query("Select Count(*) as x from Account where StudentID=". $_POST['StudentID']. " and AccountType ='STUDENT'")->result()[0]->x != 0) {
						// Checking if the StudentID is Exist
						if($this->db->query("Select Count(*) as x from Student where StudentID=". $_POST['StudentID'])->result()[0]->x != 0) {
							// Checking if the StudentID is not graduated yet
							if($this->db->query("Select * from Student where StudentID=". $_POST['StudentID'])->result()[0]->Status == "non-graduated") {
								$x = include APPPATH.'third_party/SMTPConfig.php';

					  			// Sending a Verification Key Code to Email Account
					  			$mail = new PHPMailer();
								$mail->isSMTP();
								$mail->Host = 'smtp.gmail.com'; 
								$mail->SMTPSecure = 'ssl';
								$mail->SMTPAuth = true;
								$mail->Username = $x['Email'];
								$mail->Password = $x['Password'];
								$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
								$mail->Port = 465;

								if(isset($_POST['FEbox']) && isset($_POST['TEbox'])) {
									if(!empty($_POST['FEbox']) && !empty($_POST['TEbox'])) {
										$this->db->insert("Transaction", array(
											"StudentID" => $_POST['StudentID'],
											"TransactionType" => "GIFT",
											"TransactionDescription" => json_encode(array(
											"EmployeeID" => $_SESSION['AccountID'],
											"StudentID" => $_POST['StudentID'],
												"TransactionFee" => $Fee,
												"TransactionAmount" => $_POST['Amountbox'],
												"TransactionCash" => $_POST['Cashbox'],
												"Transaction_RedeemCode" => $Code
											)),
											"DateRegister" => date("Y-m-d"),
											"TimeRegister" => date("H:i:s")
										));

										$this->db->insert("Gift", array(
											"EmployeeID" => $_SESSION['AccountID'],
											"StudentID" => $_POST['StudentID'],
											"GiftFE" => $_POST['FEbox'],
											"GiftTE" => $_POST['TEbox'],
											"GiftCode" => $Code,
											"GiftAmount" => $_POST['Amountbox'],
											"GiftFee" => $Fee,
											"isClaim" => false,
										));
									    //Recipients
									    $mail->setFrom($x['Email'], "Student EWallet Notifications");
									    $mail->addAddress($_POST['FEbox']);

									    // Content
									    $mail->isHTML(true);
									    $mail->Subject = 'Redeem Gift Code';
									    $mail->Body    = 'Redeem Gift Code will be send by the email name  <b>'. $_POST['TEbox'] .'</b>.<br>Redeem Gift Code is <b>'. $Code .'</b>';
									    // Send
									    $mail->send();

									    $mail->setFrom($x['Email'], "Student EWallet Notifications");
									    $mail->addAddress($_POST['TEbox']);

									    // Content
									    $mail->isHTML(true);
									    $mail->Subject = 'Redeem Gift Code';
									    $mail->Body    = 'Redeem your Gift Code Today or Later and the Gift Code is <b>'. $Code .'</b>';
									    // Send
									    $mail->send();

									    echo json_encode(array(
											"isError" => false,
											"Total" => $_POST['Amountbox'] + intval($Fee),
											"Cash" => $_POST['Cashbox'],
											"Change" => ($_POST['Amountbox'] + intval($Fee)) - $_POST['Cashbox'],
											"Code" => $Code
										));
									}
									else {
										$ErrorDisplay = '';

										if(empty($_POST['FEbox'])) $ErrorDisplay .= '(From) ';
										if(empty($_POST['TEbox'])) $ErrorDisplay .= '(To) ';

										echo json_encode(array(
											"isError" => true,
											"ErrorDisplay" => "Error: ". $ErrorDisplay ."Email is Empty!"
										));
									}
								}
								else {
									$this->db->insert("Transaction", array(
										"StudentID" => $_POST['StudentID'],
										"TransactionType" => "GIFT",
										"TransactionDescription" => json_encode(array(
										"EmployeeID" => $_SESSION['AccountID'],
										"StudentID" => $_POST['StudentID'],
											"TransactionFee" => $Fee,
											"TransactionAmount" => $_POST['Amountbox'],
											"TransactionCash" => $_POST['Cashbox'],
											"Transaction_RedeemCode" => $Code
										)),
										"DateRegister" => date("Y-m-d"),
										"TimeRegister" => date("H:i:s")
									));

									$this->db->insert("Gift", array(
										"EmployeeID" => $_SESSION['AccountID'],
										"StudentID" => $_POST['StudentID'],
										"GiftCode" => $Code,
										"GiftAmount" => $_POST['Amountbox'],
										"GiftFee" => $Fee,
										"isClaim" => false,
									));

									//Recipients
									$mail->setFrom($x['Email'], "Student EWallet Notifications");
									$mail->addAddress($this->db->query("Select * from Account where StudentID=". $_POST["StudentID"])->result()[0]->AccountEmail);

									// Content
									$mail->isHTML(true);
									$mail->Subject = 'Redeem Gift Code';
									$mail->Body    = 'Redeem Gift Code is <b>'. $Code .'</b>';

									echo json_encode(array(
										"isError" => false,
										"Total" => $_POST['Amountbox'] + intval($Fee),
										"Cash" => $_POST['Cashbox'],
										"Change" => ($_POST['Amountbox'] + intval($Fee)) - $_POST['Cashbox'],
										"Code" => $Code
									));
								}
							}
							else {
								echo json_encode(array(
									"isError" => true,
									"ErrorDisplay" => "Error: This Student is already Graduated, Therefore not allowed to do any 'Transaction' anymore!"
								));
							}
						}
						else echo json_encode(array(
							"isError" => true,
							"ErrorDisplay" => "Error: Not Existed!"
						));
					}
					else echo json_encode(array(
						"isError" => true,
						"ErrorDisplay" => "Error: Invalid Student ID!"
					));
				}
				else echo json_encode(array(
					"isError" => true,
					"ErrorDisplay" => "Error: Cash not enough!"
				));
			}
			else {
				$ErrorDisplay = "";

				if(empty($_POST['StudentID'])) $ErrorDisplay .= "(Student ID) ";
				if(empty($_POST['Amountbox'])) $ErrorDisplay .= "(Amount) ";
				if(empty($_POST['Cashbox'])) $ErrorDisplay .= "(Cash) ";

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

	// -----------------------------------------------------------------------------------------------------------------
	function Update_RedeemButton() {
		if(isset($_GET['RedeemCode'])) {
			if(!empty($_GET['RedeemCode'])) {
				if($this->db->query("Select Count(*) as x from Gift where GiftCode=". $_GET['RedeemCode']. " and isClaim=false")->result()[0]->x != 0) {
					$GiftQuery = $this->db->query("Select * from Gift where GiftCode=". $_GET['RedeemCode']. " and isClaim=false")->result()[0];

					$this->db->update("Account", array(
						"Account_AvailableBalance" => $this->db->query("Select * from Account where AccountID=". $_SESSION['AccountID']. " and AccountType ='STUDENT'")->result()[0]->Account_AvailableBalance + $GiftQuery->GiftAmount
					), "AccountID=". $_SESSION['AccountID']. " and AccountType ='STUDENT'");

					$this->db->update("Gift", array(
						"isClaim" => true,
						"GiftCode" => 0,
						"GiftAmount" => 0
					), "GiftCode=". $_GET['RedeemCode']. " and isClaim=false");

					$this->db->insert("Transaction", array(
						"StudentID" => $_SESSION['AccountID'],
						"TransactionType" => "GIFT(CLAIM)",
						"TransactionDescription" => json_encode(array(
							"GiftCode" => $_GET['RedeemCode'],
							"GiftAmount" => $GiftQuery->GiftAmount
						)),
						"DateRegister" => date("Y-m-d"),
						"TimeRegister" => date("H:i:s")
					));

					echo json_encode(array(
						"isError" => false
					)); 
				}
				else echo json_encode(array(
					"isError" => true,
					"ErrorDisplay" => "Error: Invalid Redeem Gift Code!"
				)); 
			}
			else echo json_encode(array(
				"isError" => true,
				"ErrorDisplay" => "Error: Error: Redeem is Empty!"
			)); 
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Error: Unexpected Error Occur!"
		)); 
	}

}

?>