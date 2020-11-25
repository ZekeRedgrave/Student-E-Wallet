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
		else {
			if(isset($_GET['myItem'])) {
				if(!empty($_GET['myItem'])) {
					$AccountQuery = $this->db->query("Select* from Account where AccountID=". $_SESSION['AccountID'])->result()[0];

					if($_GET['myItem'] != 0) {
						if($this->db->query("Select Count(*) as x from Transaction where StudentID=". $AccountQuery->StudentID)->result()[0]->x != 0) {
							$data['isError'] = false;
							$data['isEmpty'] = false;
							$data['TransactionArray'] = [];

							foreach ($this->db->query("Select * from Transaction where StudentID=". $AccountQuery->StudentID ." Order by TransactionID DESC LIMIT ". $_GET['myItem'])->result() as $value) array_push($data['TransactionArray'], $value->TransactionID);

							echo json_encode($data);
						}
						else echo json_encode(array(
							"isError" => false,
							"isEmpty" => true
						));
					}
					else {
						if($this->db->query("Select Count(*) as x from Transaction where StudentID=". $AccountQuery->StudentID)->result()[0]->x != 0) {
							$data['isError'] = false;
							$data['isEmpty'] = false;
							$data['TransactionArray'] = [];

							foreach ($this->db->query("Select * from Transaction where StudentID=". $AccountQuery->StudentID ." Order by TransactionID DESC LIMIT ". $_GET['myItem'])->result() as $value) array_push($data['TransactionArray'], $value->TransactionID);

							echo json_encode($data);
						}
						else echo json_encode(array(
							"isError" => false,
							"isEmpty" => true
						));
					}
				}
			}
			else echo json_encode(array(
				"isError" => false,
				"isEmpty" => true
			));
		}
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
		else {
			if(isset($_GET['search'])) {
				if(!empty($_GET['search'])) {
					$data['isError'] = false;
					$data['TransactionArray'] = [];

					$AccountQuery = $this->db->query("Select * from Account where AccountID=". $_SESSION['AccountID'])->result()[0];

					foreach ($this->db->query("Select * from Transaction where TransactionType like '%" .$_GET['search']. "%' or DateRegister like '%" .$_GET['search']. "%' or TimeRegister like '%" .$_GET['search']. "%' and StudentID=". $AccountQuery->StudentID)->result() as $value) array_push($data['TransactionArray'], $value->TransactionID);

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
									    if(!$mail->send())  echo json_encode(array(
										    "isError" => true,
										    "ErrorDisplay" => "The Server cannot send a Notification via Email Address due to Offline Mode or SMTP is broken.\n\nTry Again Later!"
										));

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
												"GiftFE" => $_POST['FEbox'],
												"GiftTE" => $_POST['TEbox'],
												"GiftCode" => $Code,
												"GiftAmount" => $_POST['Amountbox'],
												"GiftFee" => $Fee,
												"isClaim" => false,
											));

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
									//Recipients
									$mail->setFrom($x['Email'], "Student EWallet Notifications");
									$mail->addAddress($this->db->query("Select * from Account where StudentID=". $_POST["StudentID"])->result()[0]->AccountEmail);

									// Content
									$mail->isHTML(true);
									$mail->Subject = 'Redeem Gift Code';
									$mail->Body    = 'Redeem Gift Code is <b>'. $Code .'</b>';
									// Send
									if(!$mail->send())  echo json_encode(array(
									    "isError" => true,
									    "ErrorDisplay" => "The Server cannot send a Notification via Email Address due to Offline Mode or SMTP is broken.\n\nTry Again Later!"
									));

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

										echo json_encode(array(
											"isError" => false,
											"Total" => $_POST['Amountbox'] + intval($Fee),
											"Cash" => $_POST['Cashbox'],
											"Change" => ($_POST['Amountbox'] + intval($Fee)) - $_POST['Cashbox'],
											"Code" => $Code
										));
									}
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
					$AccountQuery = $this->db->query("Select * from Account where AccountID=". $_SESSION['AccountID'])->result()[0];

					$this->db->update("Account", array(
						"Account_AvailableBalance" => $this->db->query("Select * from Account where AccountID=". $_SESSION['AccountID']. " and AccountType ='STUDENT'")->result()[0]->Account_AvailableBalance + $GiftQuery->GiftAmount
					), "AccountID=". $_SESSION['AccountID']. " and AccountType ='STUDENT'");

					$this->db->update("Gift", array(
						"isClaim" => true,
						"GiftCode" => 0,
						"GiftAmount" => 0
					), "GiftCode=". $_GET['RedeemCode']. " and isClaim=false");

					$this->db->insert("Transaction", array(
						"StudentID" => $AccountQuery->StudentID,
						"TransactionType" => "GIFT(CLAIM)",
						"TransactionDescription" => json_encode(array(
							"EmployeeID" => "N/A",
							"StudentID" => $AccountQuery->StudentID,
							"TransactionAmount" => $GiftQuery->GiftAmount,
							"TransactionFee" => "N/A",
							"TransactionCash" => "N/A",
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
	// -----------------------------------------------------------------------------------------------------------------
	function View_TuitionButton() {
		if(isset($_POST['Amount'])) {
			if(!empty($_POST['Amount'])) {
				if($this->db->query("Select Count(*) as x from Account where AccountID=". $_SESSION['AccountID'])->result()[0]->x != 0) {
					$AccountQuery = $this->db->query("Select * from Account where AccountID=". $_SESSION['AccountID'])->result()[0];
					$AssessmentQuery = $this->db->query("Select * from Assessment where StudentID=". $AccountQuery->StudentID ." and isFullPaid=false  Order by AssessmentID DESC LIMIT 1")->result()[0];

					$BalanceLeft = $AccountQuery->Account_AvailableBalance - $_POST["Amount"];
					$CheckChar = count(explode("-", (string)$BalanceLeft));

					if($CheckChar == 2) echo json_encode(array(
						"isError" => true,
						"ErrorDisplay" => "Error: Invalid Input Amount!"
					));
					else {
						$BalanceLeft = $AccountQuery->Account_AvailableBalance - $_POST["Amount"];
						$FeeLeft = $AccountQuery->Account_TuitionBalance - $_POST["Amount"];
						$CheckChar = count(explode("-", (string)$FeeLeft));

						if($CheckChar == 2) echo json_encode(array(
							"isError" => true,
							"ErrorDisplay" => "Error: Please Input the Correct Amount!"
						));
						else {
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
							//Recipients
							$mail->setFrom($x['Email'], "Student EWallet Notifications");
							$mail->addAddress($AccountQuery->AccountEmail);

							// Content
							$mail->isHTML(true);
							$mail->Subject = 'Student EWallet Notifications';
							$mail->Body    = 'Thank you for paying your School Tuition Fee today (' .date('Y-m-d'). ' ' .date('H:i:s'). ')';
							// Send
							if(!$mail->send())  echo json_encode(array(
							    "isError" => true,
							    "ErrorDisplay" => "The Server cannot send a Notification via Email Address due to Offline Mode or SMTP is broken.\n\nTry Again Later!"
							));

							else {
								if($AssessmentQuery->Assessment_NewTuition / 2 <= $_POST["Amount"]) $this->db->update("Assessment", array(
									"Assessment_OldTuition" => $AssessmentQuery->Assessment_NewTuition,
									"Assessment_NewTuition" => $FeeLeft,
									"isHalfPaid" => true,
									"AssessmentStatus" => "Half Paid (Can now Enroll)"
								), "AssessmentID=". $AssessmentQuery->AssessmentID);

								if($FeeLeft == 0) $this->db->update("Assessment", array(
									"Assessment_OldTuition" => $AssessmentQuery->Assessment_NewTuition,
									"Assessment_NewTuition" => 0,
									"isHalfPaid" => true,
									"isFullPaid" => true,
									"AssessmentStatus" => "Fully Paid! (Can now Enroll)"
								), "AssessmentID=". $AssessmentQuery->AssessmentID);

								else $this->db->update("Assessment", array(
									"Assessment_OldTuition" => $AssessmentQuery->Assessment_NewTuition,
									"Assessment_NewTuition" => $FeeLeft,
								), "AssessmentID=". $AssessmentQuery->AssessmentID);

								$this->db->insert("Transaction", array(
									"StudentID" => $AccountQuery->StudentID,
									"TransactionType" => "FEE(SCHOOL TUITION)",
									"TransactionDescription" => json_encode(array(
										"EmployeeID" => "N/A",
										"StudentID" => $AccountQuery->StudentID,
										"TransactionAmount" => $_POST['Amount'],
										"TransactionFee" => $AccountQuery->Account_TuitionBalance,
										"TransactionCash" => $AccountQuery->Account_AvailableBalance,
									)),
									"DateRegister" => date("Y-m-d"),
									"TimeRegister" => date("H:i:s")
								));
								$this->db->update("Account", array(
									"Account_AvailableBalance" => $BalanceLeft,
									"Account_TuitionBalance" => $FeeLeft
								), "AccountID=". $_SESSION['AccountID']);

								echo json_encode(array(
									"isError" => false
								));
							}
						}
					}
				}
				else echo json_encode(array(
					"isError" => true,
					"ErrorDisplay" => "Error: Unexpected Error Occur!"
				));
			}
			else echo json_encode(array(
				"isError" => true,
				"ErrorDisplay" => "Error: Please Enter your Amount!"
			));
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Error: Unexpected Error Occur!"
		));
	}

	function View_PriceButton() {
		if(isset($_GET['id'])) {
			if(!empty($_GET['id'])) {
				$StoreQuery = $this->db->query("Select * from Store where StoreID=". $_GET['id'])->result()[0];

				$data["isError"] = false;
				$data["StoreTitle"] = $StoreQuery->StoreTitle;
				$data["StorePrice"] = $StoreQuery->StorePrice;

				echo json_encode($data);
			}
			else echo json_encode(array(
				"isError" => true,
				"ErrorDisplay" => "Unexpected Error Occur!"
			)); 
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Unexpected Error Occur!"
		)); 
	}

	function View_DynamicButton() {
		if(isset($_GET['id'])) {
			if(!empty($_GET['id'])) {
				if($this->db->query("Select Count(*) as x from Account where AccountID=". $_SESSION['AccountID'])->result()[0]->x != 0) {
					$AccountQuery = $this->db->query("Select * from Account where AccountID=". $_SESSION['AccountID'])->result()[0];
					$StoreQuery = $this->db->query("Select * from Store where StoreID=". $_GET['id'])->result()[0];

					$BalanceLeft = $AccountQuery->Account_AvailableBalance - $StoreQuery->StorePrice;
					$CheckChar = count(explode("-", (string)$BalanceLeft));

					if($CheckChar == 2) echo json_encode(array(
						"isError" => true,
						"ErrorDisplay" => "Invalid Input Amount!"
					));
					else {
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

						//Recipients
						$mail->setFrom($x['Email'], "Student EWallet Notifications");
						$mail->addAddress($AccountQuery->AccountEmail);

						// Content
						$mail->isHTML(true);
						$mail->Subject = 'Student EWallet Notifications';
						$mail->Body    = 'Purchase Item<br><br>Item: ' .$StoreQuery->StoreTitle. '<br>Price: ' .$StoreQuery->StorePrice. '<br><br><br><br>Thank you for purchasing today (' .date('Y-m-d'). ' ' .date('H:i:s'). '). Please Claim this Item Today or Later into your School!';
						// Send
						if(!$mail->send())  echo json_encode(array(
						    "isError" => true,
						    "ErrorDisplay" => "The Server cannot send a Notification via Email Address due to Offline Mode or SMTP is broken.\n\nTry Again Later!"
						));

						else {
							$this->db->insert("Transaction", array(
								"StudentID" => $AccountQuery->StudentID,
								"TransactionType" => strtoupper($StoreQuery->StoreType),
								"TransactionDescription" => json_encode(array(
									"EmployeeID" => "N/A",
									"StudentID" => $AccountQuery->StudentID,
									"TransactionAmount" => $StoreQuery->StorePrice,
									"TransactionFee" => 0,
									"TransactionCash" => $AccountQuery->Account_AvailableBalance,
								)),
								"DateRegister" => date("Y-m-d"),
								"TimeRegister" => date("H:i:s")
							));
							$this->db->insert("Request", array(
								"StudentID" =>$AccountQuery->StudentID,
								"RequestName" => $StoreQuery->StoreTitle,
								"isProcess" => false,
								"isClaim" => false,
								"Start_DateRegister" => date("Y-m-d"),
								"Start_TimeRegister" => date("H:i:s")
							));
							$this->db->update("Account", array(
								"Account_AvailableBalance" => $BalanceLeft
							), "AccountID=". $_SESSION['AccountID']);

							echo json_encode(array(
								"isError" => false
							));
						}
					}
				}
				else echo json_encode(array(
					"isError" => true,
					"ErrorDisplay" => "Unexpected Error Occur!"
				));
			}
			else echo json_encode(array(
				"isError" => true,
				"ErrorDisplay" => "Please Enter your Amount!"
			));
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Unexpected Error Occur!"
		));
	}
}

?>