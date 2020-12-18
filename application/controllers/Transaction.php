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
        date_default_timezone_set("Asia/Taipei");
    }

    function Receipt($ReceiptNo, $ItemName, $ItemPrice, $SubTotal, $Balance, $Total, $Message, $Status) {
    	return '
				<div style="position: fixed; display: flex; justify-content: center; top: 0; bottom: 0; left: 0; right: 0; width: 100%; height: 100%; background: #282828; color: white;">
					<div style="width: 500px;">
						<h1 style="text-align: center; color: #7289da; font-weight: bold;">STUDENT E-WALLET</h1>
						<div style="text-align: center; color: #7289da; font-weight: bold;">OFFICIAL RECEIPT</div>
						<div style="text-align: center; color: #7289da; font-weight: bold;">RECEIPT NO. #' .$ReceiptNo. '</div>
						<div style="text-align: center; color: #7289da; font-weight: bold;">TIMELINE #' .date('Y/m/d'). ' ' .date('H:i:s'). '</div>

						<div style="margin-top: 8%; padding-left: 15%; padding-right: 15%;">
							<div style="display: flex; background: #333333; padding: 5%; border-radius: 6px;">
								<div style="width: 200px; color: #7289da; font-weight: bold;">ITEM NAME : </div>
								<div style="width: 100%; font-weight: bold;">' .$ItemName. '</div>
							</div>
							<div style="display: flex; background: #333333; padding: 5%; margin-top: 1%; border-radius: 6px;">
								<div class="" style="width: 200px; color: #7289da; font-weight: bold;">ITEM PRICE : </div>
								<div style="width: 100%; font-weight: bold;">P ' .$ItemPrice. '</div>
							</div>
						</div>

						<div style="margin-top: 2%; padding-top: 2%; border-top: 2px solid #7289da">
							<div style="padding-left: 15%; padding-right: 15%;">
								<div style="display: flex; background: #333333; padding: 5%; border-radius: 6px;">
									<div style="width: 200px; color: #7289da; font-weight: bold;">BALANCE : </div>
									<div style="width: 100%; font-weight: bold;">P ' .$Balance. '</div>
								</div>

								<div style="display: flex; background: #333333; padding: 5%; margin-top: 1%; border-radius: 6px;">
									<div class="mr-4" style="width: 200px; color: #7289da; font-weight: bold;">SUB TOTAL : </div>
									<div style="width: 100%; font-weight: bold;">P ' .$SubTotal. '</div>
								</div>

								<div style="display: flex; margin-top: 5%; margin-bottom: 5%; margin-left: 10%; margin-right: 10%;">
									<div style="width: 200px; padding: 5%; font-weight: bold;">TOTAL / BALANCE : </div>
									<div style="background: #333333; width: 100%; padding: 5%; border-radius: 6px; font-weight: bold;">P ' .$Total. '</div>
								</div>
							</div>
						</div>

						<div style="border: 2px solid #7289da; padding: 3%; border-radius: 6px; text-align: center; font-weight: bold; margin-left: 10%; margin-right: 10%">' .$Message. '</div>
						<div style="text-align: center; margin-top: 3%; font-weight: bold; color: #f44336; margin-bottom: 5%; margin-left: 10%; margin-right: 10%">' .$Status. '</div>
					</div>
				</div>';
    }

    function View_DynamicLoad() {
    	$data["isError"] = false;
    	$data["StoreArray"] = [];
		$data["isStoreEmpty"] = false;

		if($this->db->query("Select Count(*) as x from Store where isDeleted=false Order by StoreID DESC")->result()[0]->x == 0) $data["isStoreEmpty"] = true;
		else foreach ($this->db->query("Select * from Store where isDeleted=false Order by StoreID DESC")->result() as $value) array_push($data["StoreArray"], array(
			"StoreID" => $value->StoreID,
			"StoreTitle" => $value->StoreTitle,
			"StoreType" => $value->StoreType,
			"StorePrice" => $value->StorePrice,
			"StoreIcon" => $value->StoreIcon
		));

		echo json_encode($data);
	}

	function View_RecordLoad() {
		// Employee Only
		if(isset($_GET['item'])) {
			if(!empty($_GET['item'])) {
				// This is for Cashier Only
				if($_SESSION["AccountType"] == "CASHIER") {
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
				else {
					if($_GET['item'] != 0) {
						if($this->db->query("Select Count(*) as x from Transaction")->result()[0]->x != 0) {
							// $getNonCashier = $this->db->query("Select * from Transaction where StoreID != 0")
							$data['isError'] = false;
							$data['isEmpty'] = false;
							$data['TransactionArray'] = [];

							foreach ($this->db->query("Select * from Transaction where StoreID !=0 Order by TransactionID DESC LIMIT ". $_GET['item'])->result() as $value) {
								if($this->db->query("Select * from Account where AccountID=". $this->db->query("Select * from Store where StoreID=". $value->StoreID)->result()[0]->AccountID)->result()[0]->AccountType == $_SESSION["AccountType"]) array_push($data['TransactionArray'], $value->TransactionID);
							}

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

							foreach ($this->db->query("Select * from Transaction where StoreID !=0 Order by TransactionID DESC LIMIT ". $_GET['item'])->result() as $value) {
								if($this->db->query("Select * from Account where AccountID=". $this->db->query("Select * from Store where StoreID=". $value->StoreID)->result()[0]->AccountID)->result()[0]->AccountType == $_SESSION["AccountType"]) array_push($data['TransactionArray'], $value->TransactionID);
							}

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
				"isError" => true,
				"ErrorDisplay" => "Error: Unexpected Error Occurs!"
			));
		}
		// Student Only
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
				$data["TransactionName"] = json_decode($TransactionQuery->TransactionDescription)->TransactionName;
				$data['TransactionType'] = $TransactionQuery->TransactionType;
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

					foreach ($this->db->query("Select * from Transaction where StudentID=". $_GET['id'])->result() as $value) {
						if($this->db->query("Select * from Account where AccountID=". $this->db->query("Select * from Store where StoreID=". $value->StoreID)->result()[0]->AccountID)->result()[0]->AccountType == $_SESSION["AccountType"]) {
							array_push($data['TransactionArray'], array(
								'TransactionID' => $value->TransactionID,
								'StudentName' => json_decode($StudentQuery->Name)->Lastname. ", " .json_decode($StudentQuery->Name)->Firstname. " " .strtoupper(substr(json_decode($StudentQuery->Name)->Middlename, 0, 1)),
								'TransactionName' => json_decode($value->TransactionDescription)->TransactionName,
								'TransactionType' => $value->TransactionType,
								'Timeline' => $value->DateRegister. " " .$value->TimeRegister
							));
						}
					}

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

	function View_InfoButton() {
		if(isset($_GET['id']) && !empty($_GET['id'])) {
			$TransactionQuery = $this->db->query('Select * from Transaction where TransactionID='. $_GET['id'])->result()[0];
			$StudentQuery = $this->db->query("Select * from Student where StudentID=". $TransactionQuery->StudentID)->result()[0];
			$AccountQuery = $this->db->query("Select * from Account where StudentID=". $TransactionQuery->StudentID)->result()[0];

			$data["isError"] = false;
			$data["StudentImage"] =  $AccountQuery->AccountImage;
			$data["StudentName"] =  json_decode($StudentQuery->Name)->Lastname. ", " .json_decode($StudentQuery->Name)->Firstname. " " .strtoupper(substr(json_decode($StudentQuery->Name)->Middlename, 0, 1)). ". (" .json_decode($StudentQuery->Name)->Middlename. ")";
			$data["StudentCY"] =  $StudentQuery->Course. "-" .$StudentQuery->Level;
			$data["StudentID"] =  $TransactionQuery->StudentID;
			$data["StudentBalance"] =  $AccountQuery->Account_AvailableBalance;

			$TransactionJSON = json_decode($TransactionQuery->TransactionDescription);

			$data["TransactionType"] =  $TransactionQuery->TransactionType;

			$data["TransactionName"] = $TransactionJSON->TransactionName;
			$data["TransactionPrice"] = $TransactionJSON->TransactionAmount;
			$data["TransactionFee"] =  $TransactionJSON->TransactionFee;
			$data["TransactionST"] =  $TransactionJSON->TransactionAmount + $TransactionJSON->TransactionFee;
			$data["TransactionCash"] =  $TransactionJSON->TransactionCash;

			$data["TransactionTotal"] =  $TransactionJSON->TransactionAmount + $TransactionJSON->TransactionFee - $TransactionJSON->TransactionCash;
			$data["TransactionBalance"] =  $TransactionJSON->TransactionBalance;

			echo json_encode($data);
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Unexpected Error Occurs!"
		));
	}

	function Deposits_NextButton() {
		if(isset($_POST['StudentID']) && isset($_POST['Amountbox']) && isset($_POST['Cashbox'])) {
			if(!empty($_POST['StudentID']) && !empty($_POST['Amountbox']) && !empty($_POST['Cashbox'])) {
				$Fee = .005;

				// if(strlen($_POST['Amountbox']) >= 2) for ($i = 2; $i < strlen($_POST['Amountbox']); $i++) $Fee .= '0';
				// if(strlen($_POST['Amountbox']) == 1) $Fee = '0';
				$Fee = $Fee * $_POST['Amountbox'];

				if($_POST['Amountbox'] >= 100) {
					if($_POST['Amountbox'] + $Fee <= $_POST['Cashbox']) {
						// Checking if the StudentID is Valid
						if($this->db->query("Select Count(*) as x from Account where StudentID=". $_POST['StudentID']. " and AccountType ='STUDENT'")->result()[0]->x != 0) {
							// Checking if the StudentID is Exist
							if($this->db->query("Select Count(*) as x from Student where StudentID=". $_POST['StudentID'])->result()[0]->x != 0) {
								// Checking if the StudentID is not graduated yet
								if($this->db->query("Select * from Student where StudentID=". $_POST['StudentID'])->result()[0]->Status == "non-graduated") {
									$AccountQuery = $this->db->query("Select * from Account where StudentID=". $_POST['StudentID'])->result()[0];

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
									$mail->Subject = 'Deposits';
									$mail->Body    = $this->Receipt( ($this->db->query("Select Count(*) as x from Transaction")->result()[0]->x != 0 ? $this->db->query("Select * from Transaction Order by TransactionID DESC LIMIT 1")->result()[0]->TransactionID + 1 : 1) , "Deposits", $_POST['Amountbox'], $_POST['Amountbox'] + $Fee, 0, $_POST['Cashbox'] - ($_POST['Amountbox'] + $Fee), "Thank you for your Patronage!", "");
									// Send
									if(!$mail->send())  echo json_encode(array(
										"isError" => true,
										"ErrorDisplay" => "The Server cannot send a Notification via Email Address due to Offline Mode or SMTP is broken.\n\nTry Again Later!"
									));
									else {
										$this->db->insert("Transaction", array(
											"StudentID" => $_POST['StudentID'],
											"TransactionType" => "DEPOSITS",
											"TransactionDescription" => json_encode(array(
												"EmployeeID" => $_SESSION['AccountID'],
												"StudentID" => $_POST['StudentID'],
												"TransactionName" => "DEPOSITS",
												"TransactionFee" => $Fee,
												"TransactionAmount" => $_POST['Amountbox'],
												"TransactionCash" => $_POST['Cashbox'],
												"TransactionBalance" => $this->db->query("Select * from Account where StudentID=". $_POST['StudentID']. " and AccountType ='STUDENT'")->result()[0]->Account_AvailableBalance + $_POST['Amountbox']
											)),
											"DateRegister" => date("Y-m-d"),
											"TimeRegister" => date("H:i:s")
										));

										$this->db->update("Account", array(
											"Account_AvailableBalance" => $this->db->query("Select * from Account where StudentID=". $_POST['StudentID']. " and AccountType ='STUDENT'")->result()[0]->Account_AvailableBalance + $_POST['Amountbox']
										), "StudentID=". $_POST['StudentID']. " and AccountType ='STUDENT'");

										echo json_encode(array(
											"isError" => false,
											"Total" => $_POST['Amountbox'] + $Fee,
											"Cash" => $_POST['Cashbox'],
											"Change" => ($_POST['Amountbox'] + $Fee) - $_POST['Cashbox']
										));
									}
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
				else echo json_encode(array(
					"isError" => true,
					"ErrorDisplay" => "The Minimum Amount for Deposits is 100!"
				));
			}
			else {
				$ErrorDisplay = "";

				if(empty($_POST['StudentID'])) $ErrorDisplay .= "(Student ID) ";
				if(empty($_POST['Amountbox'])) $ErrorDisplay .= "(Amount) ";
				if(empty($_POST['Cashbox'])) $ErrorDisplay .= "(Cash) ";

				echo json_encode(array(
					"isError" => true,
					"ErrorDisplay" => $ErrorDisplay. "is Empty!"
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
				$Fee = 0.005;
				$Code = rand(0, 999999999);

				// if(strlen($_POST['Amountbox']) >= 2) for ($i = 2; $i < strlen($_POST['Amountbox']); $i++) $Fee .= '0';
				// if(strlen($_POST['Amountbox']) == 1) $Fee = '0';

				$Fee = $Fee * $_POST['Amountbox'];

				if($_POST['Amountbox'] + $Fee <= $_POST['Cashbox']) {

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
													"TransactionName" => "GIFT",
													"TransactionFee" => $Fee,
													"TransactionAmount" => $_POST['Amountbox'],
													"TransactionCash" => $_POST['Cashbox'],
													"Transaction_RedeemCode" => $Code,
													"TransactionBalance" => $this->db->query("Select * from Account where StudentID=". $_POST['StudentID']. " and AccountType ='STUDENT'")->result()[0]->Account_AvailableBalance
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
											$this->db->insert("Logs", array(
												"AccountID" => $_SESSION['AccountID'],
												"LogActivity" => json_encode(array(
													"Page" => "Deposits",
													"Action" => "Redeem Code Gift for Student"
												)),
												"TimeRegister" => date("H:i:s"),
												"DateRegister" => date("Y-m-d")
											));

									    	echo json_encode(array(
												"isError" => false,
												"Total" => $_POST['Amountbox'] + $Fee,
												"Cash" => $_POST['Cashbox'],
												"Change" => ($_POST['Amountbox'] + $Fee) - $_POST['Cashbox'],
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
												"Transaction_RedeemCode" => $Code,
												"TransactionBalance" => $this->db->query("Select * from Account where StudentID=". $_POST['StudentID']. " and AccountType ='STUDENT'")->result()[0]->Account_AvailableBalance
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

										$this->db->insert("Logs", array(
											"AccountID" => $_SESSION['AccountID'],
											"LogActivity" => json_encode(array(
												"Page" => "Redeem",
												"Action" => "Redeem Code Gift for Student"
											)),
											"TimeRegister" => date("H:i:s"),
											"DateRegister" => date("Y-m-d")
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
					$this->db->insert("Logs", array(
						"AccountID" => $_SESSION['AccountID'],
						"LogActivity" => json_encode(array(
							"Page" => "Redeem",
							"Action" => "Claimed"
						)),
						"TimeRegister" => date("H:i:s"),
						"DateRegister" => date("Y-m-d")
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

							if($AssessmentQuery->Assessment_NewTuition / 2 <= $_POST["Amount"]) $mail->Body = $this->Receipt( ($this->db->query("Select Count(*) as x from Transaction")->result()[0]->x != 0 ? $this->db->query("Select * from Transaction Order by TransactionID DESC LIMIT 1")->result()[0]->TransactionID + 1 : 1) , 'Tuition', $_POST["Amount"], $_POST["Amount"], $AccountQuery->Account_AvailableBalance, $BalanceLeft, 'Thank you for purchasing today', 'Half Paid (Can now Enroll)');

							if($FeeLeft == 0) $mail->Body = $this->Receipt( ($this->db->query("Select Count(*) as x from Transaction")->result()[0]->x != 0 ? $this->db->query("Select * from Transaction Order by TransactionID DESC LIMIT 1")->result()[0]->TransactionID + 1 : 1) , 'Tuition', $_POST["Amount"], $_POST["Amount"], $AccountQuery->Account_AvailableBalance, $BalanceLeft, 'Thank you for purchasing today', 'Fully Paid! (Can now Enroll)');

							else $mail->Body = $this->Receipt( ($this->db->query("Select Count(*) as x from Transaction")->result()[0]->x != 0 ? $this->db->query("Select * from Transaction Order by TransactionID DESC LIMIT 1")->result()[0]->TransactionID + 1 : 1) , 'Tuition', $_POST["Amount"], $_POST["Amount"], $AccountQuery->Account_AvailableBalance, $BalanceLeft, 'Thank you for purchasing today', '');

							//$mail->Body    = 'Thank you for paying your School Tuition Fee today (' .date('Y-m-d'). ' ' .date('H:i:s'). ')';
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
										"TransactionName" => $AssessmentQuery->AssessmentType,
										"TransactionAmount" => $_POST['Amount'],
										"TransactionFee" => 0,
										"TransactionCash" => $AccountQuery->Account_AvailableBalance,
										"TransactionBalance" => $this->db->query("Select * from Account where StudentID=". $AccountQuery->StudentID. " and AccountType ='STUDENT'")->result()[0]->Account_AvailableBalance - $_POST['Amount']
									)),
									"DateRegister" => date("Y-m-d"),
									"TimeRegister" => date("H:i:s")
								));
								$this->db->insert("Logs", array(
									"AccountID" => $_SESSION['AccountID'],
									"LogActivity" => json_encode(array(
										"Page" => "Store",
										"Action" => "Paying Tuition Fee"
									)),
									"TimeRegister" => date("H:i:s"),
									"DateRegister" => date("Y-m-d")
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
						$mail->Body    = $this->Receipt( ($this->db->query("Select Count(*) as x from Transaction")->result()[0]->x != 0 ? $this->db->query("Select * from Transaction Order by TransactionID DESC LIMIT 1")->result()[0]->TransactionID + 1 : 1) , $StoreQuery->StoreTitle, $StoreQuery->StorePrice, $StoreQuery->StorePrice, $AccountQuery->Account_AvailableBalance, $BalanceLeft, 'Thank you for purchasing today', 'Please wait for the verification of the process.');
						//$mail->Body    = 'Purchase Item<br><br>Item: ' .$StoreQuery->StoreTitle. '<br>Price: ' .$StoreQuery->StorePrice. '<br><br><br><br>Thank you for purchasing today (' .date('Y-m-d'). ' ' .date('H:i:s'). '). Please wait for the verification of the process.';
						// Send
						if(!$mail->send())  echo json_encode(array(
						    "isError" => true,
						    "ErrorDisplay" => "The Server cannot send a Notification via Email Address due to Offline Mode or SMTP is broken.\n\nTry Again Later!"
						));

						else {
							$this->db->insert("Transaction", array(
								"StudentID" => $AccountQuery->StudentID,
								"StoreID" => $StoreQuery->StoreID,
								"TransactionType" => strtoupper($StoreQuery->StoreType),
								"TransactionDescription" => json_encode(array(
									"EmployeeID" => "N/A",
									"StudentID" => $AccountQuery->StudentID,
									"TransactionName" => $StoreQuery->StoreTitle,
									"TransactionAmount" => $StoreQuery->StorePrice,
									"TransactionFee" => 0,
									"TransactionCash" => $AccountQuery->Account_AvailableBalance,
									"TransactionBalance" => $this->db->query("Select * from Account where StudentID=". $AccountQuery->StudentID. " and AccountType ='STUDENT'")->result()[0]->Account_AvailableBalance - $StoreQuery->StorePrice
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
							$this->db->insert("Logs", array(
								"AccountID" => $_SESSION['AccountID'],
								"LogActivity" => json_encode(array(
									"Page" => "Store",
									"Action" => "Purchase an Item ID#" .$_GET['id']
								)),
								"TimeRegister" => date("H:i:s"),
								"DateRegister" => date("Y-m-d")
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

	// -----------------------------------------------------------------------------------------------------------------
	function CashView_SearchButton() {
		if(isset($_GET['id'])) {
			if(!empty($_GET['id'])) {
				$AccountQuery = $this->db->query("Select * from Account where StudentID=". $_GET['id'])->result()[0];

				$data["isError"] = false;
				$data["Balance"] = $AccountQuery->Account_AvailableBalance;

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

	function CashView_NextButton() {
		if(isset($_GET['id'])) {
			if(!empty($_GET['id'])) {
				if($this->db->query("Select Count(*) as x from Account where Account_AvailableBalance!=0 and StudentID=". $_GET['id'])->result()[0]->x == 1) {
					$AccountQuery = $this->db->query("Select * from Account where Account_AvailableBalance!=0 and StudentID=". $_GET['id'])->result()[0];
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
					$mail->Body    = 'Cash-Out P ' .$AccountQuery->Account_AvailableBalance. ' out of your Account.<br><br><br><br>Thank you for Widthrawal today (' .date('Y-m-d'). ' ' .date('H:i:s'). '). Please enjoy!';
					// Send
					if(!$mail->send())  echo json_encode(array(
					    "isError" => true,
					    "ErrorDisplay" => "The Server cannot send a Notification via Email Address due to Offline Mode or SMTP is broken.\n\nTry Again Later!"
						));

					else {
						$data["isError"] = false;

						$this->db->insert("Logs", array(
							"AccountID" => $_SESSION['AccountID'],
							"LogActivity" => json_encode(array(
								"Page" => "Bank",
								"Action" => "Cashout Money for Student"
							)),
							"TimeRegister" => date("H:i:s"),
							"DateRegister" => date("Y-m-d")
						));
						$this->db->insert("Transaction", array(
							"StudentID" => $AccountQuery->StudentID,
							"TransactionType" => "WIDTHDRAWAL",
							"TransactionDescription" => json_encode(array(
								"EmployeeID" => $this->db->query("Select * from Account where AccountID=". $_SESSION["AccountID"])->result()[0]->EmployeeID,
								"StudentID" => $AccountQuery->StudentID,
								"TransactionAmount" => $AccountQuery->Account_AvailableBalance,
								"TransactionFee" => 0,
								"TransactionCash" => $AccountQuery->Account_AvailableBalance,
							)),
							"DateRegister" => date("Y-m-d"),
							"TimeRegister" => date("H:i:s")
						));
						$this->db->update("Account", array(
							"Account_AvailableBalance" => 0
						), "StudentID=". $_GET['id']);

						echo json_encode(array(
							"isError" => false
						));
					}
				}
				else echo json_encode(array(
					"isError" => true,
					"ErrorDisplay" => "Amount Balance is Zero!\nCannot Cashout Anymore!"
				));
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
}

?>