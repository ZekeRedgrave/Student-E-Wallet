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

    function FullReceipt($ReceiptNo, $Timeline, $ReceiptArray, $SubTotal, $Cash, $Total) {
    	$CashierHTML = '';
    	$DepartmentHTML = '';

    	foreach ($ReceiptArray as $value) {
    		if($value["Type"] == "CASHIER") $CashierHTML .= '<div style="display: flex; flex-flow: row; width: 100%">
				<div style="width: 100%; color: #375692;">' .$value["Name"]. '</div>
				<div style="margin-left: 1%; margin-right: 1%">' .$value["Price"]. '</div>
				<div style="margin-left: 1%; margin-right: 1%">x</div>
				<div style="margin-left: 1%; margin-right: 1%">' .$value["Quantity"]. '</div>
				<div style="margin-left: 1%; margin-right: 1%">=</div>

				<div style="margin-left: 1%; margin-right: 2%">' .$value["PreTotal"]. '</div>
			</div>';
			else $DepartmentHTML .= '<div style="display: flex; flex-flow: row; width: 100%">
				<div style="width: 100%; color: #375692;">' .$value["Name"]. '</div>
				<div style="margin-left: 1%; margin-right: 1%">' .$value["Price"]. '</div>
				<div style="margin-left: 1%; margin-right: 1%">x</div>
				<div style="margin-left: 1%; margin-right: 1%">' .$value["Quantity"]. '</div>
				<div style="margin-left: 1%; margin-right: 1%">=</div>

				<div style="margin-left: 1%; margin-right: 2%">' .$value["PreTotal"]. '</div>
			</div>';
    	}

    	return '<div style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll; color: #555555 !important; font-family: Roboto; font-weight: bold;">
				<div style="margin: 2%">STUDENT E-WALLET</div>

				<div style="padding: 2%; padding-top: 0; border-bottom: 1px solid #dee2e6!important;">
					<div style="color: #375692 !important; font-size: 12px;">OFFICIAL RECEIPT</div>
					<div style="font-size: 12px;">RECEIPT NO. # <span style="color: #f44336 !important;">' .$ReceiptNo. '</span></div>
					<div style="font-size: 12px;">TIMELINE # <span style="color: #f44336 !important;">' .$Timeline. '</span></div>
				</div>

				<div style="padding: 2% 0%; margin-left: 2%; border-bottom: 1px solid #dee2e6!important;">
					<div style="padding: 0% 2%">CASHIER</div>
					<div style="margin-bottom: 2%; margin-top: 1%; padding: 0% 2%">' .$CashierHTML. '</div>

					<div style="padding: 0% 2%">DEPARTMENT</div>
					<div style="margin-top: 1%; padding: 0% 2%">' .$DepartmentHTML. '</div>
				</div>

				<div style="padding: 1%; width: 100%">
					<div style="display: flex; flex-flow: row; width: 100%">
						<div style="width: 100%"></div>
						<div style="min-width: 125px; max-width: 125px;">SUB-TOTAL</div>
						<div>' .$SubTotal. '</div>
					</div>
					<div style="display: flex; flex-flow: row; width: 100%">
						<div style="width: 100%"></div>
						<div style="min-width: 125px; max-width: 125px;">CASH</div>
						<div>' .$Cash. '</div>
					</div>
					<div style="display: flex; flex-flow: row; margin-top: 2%; width: 100%; margin-top: 1%; color: #f44336 !important;">
						<div style="width: 100%"></div>
						<div style="min-width: 125px; max-width: 125px;">TOTAL</div>
						<div>' .$Total. '</div>
					</div>
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
				$data['isError'] = false;
				$data['isEmpty'] = false;
				$data['TransactionArray'] = [];

				if($_SESSION["AccountType"] == "CASHIER" || $_SESSION["AccountType"] == "3RD-PARTY") {
					if($_GET['item'] != 0) {
						if($this->db->query("Select Count(*) as x from Transaction")->result()[0]->x != 0) {
							foreach ($this->db->query("Select * from Transaction Order by TransactionID DESC LIMIT ". $_GET['item'])->result() as $value) array_push($data['TransactionArray'], $value->TransactionID);

							echo json_encode($data);
						}
						else echo json_encode(array(
							"isError" => false,
							"isEmpty" => true
						));
					}
					else echo json_encode(array(
						"isError" => false,
						"isEmpty" => true
					));
				}
				// This is for Department Only
				else {
					if($_GET['item'] != 0) {
						if($this->db->query("Select Count(*) as x from Transaction")->result()[0]->x != 0) {
							foreach ($this->db->query("Select * from Transaction Order by TransactionID DESC LIMIT ". $_GET['item'])->result() as $value) {
								if($value->StoreID == 0 && $value->EmployeeID != 0) {
									$AccountQuery = $this->db->query("Select * from Account where EmployeeID=". $value->EmployeeID)->result()[0];

									if($AccountQuery->AccountID == $_SESSION["AccountID"]) array_push($data['TransactionArray'], $value->TransactionID);
								}
								else {
									// if($value->StoreID == 0 || $_SESSION["AccountType"] != "DEPARTMENT") array_push($data['TransactionArray'], $value->TransactionID);
									if($value->StoreID == 0 || $_SESSION["AccountType"] != "DEPARTMENT");
									
									else {
										$StoreQuery = $this->db->query("Select * from Store where StoreID=". $value->StoreID)->result()[0];

										$AccountQuery = $this->db->query("Select * from Account where AccountID=". $StoreQuery->AccountID)->result()[0];

										if($AccountQuery->AccountType == $_SESSION["AccountType"]) array_push($data['TransactionArray'], $value->TransactionID);
									}
								}
							}

							echo json_encode($data);
						}
						else echo json_encode(array(
							"isError" => false,
							"isEmpty" => true
						));
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
				$TransactionDescription = json_decode($TransactionQuery->TransactionDescription);

				$data['isError'] = false;
				$data['StudentName'] = "";

				if($TransactionQuery->StudentID != 0) {
					if($this->db->query("Select Count(*) as x from Student where StudentID=". $TransactionQuery->StudentID)->result()[0]->x == 1) {
						$StudentQuery = $this->db->query("Select * from Student where StudentID=". $TransactionQuery->StudentID)->result()[0];

						$data['StudentName'] = json_decode($StudentQuery->Name)->Lastname. ", " .json_decode($StudentQuery->Name)->Firstname. " " .strtoupper(substr(json_decode($StudentQuery->Name)->Middlename, 0, 1));
					}
				}
				else {
					$EmployeeQuery = $this->db->query("Select * from Employee where EmployeeID=". $TransactionQuery->EmployeeID)->result()[0];

					$data['StudentName'] = json_decode($EmployeeQuery->Name)->Lastname. ", " .json_decode($EmployeeQuery->Name)->Firstname. " " .strtoupper(substr(json_decode($EmployeeQuery->Name)->Middlename, 0, 1));
				}
				
				$data["TransactionName"] = $TransactionDescription->TransactionName;
				$data['TransactionType'] = $TransactionQuery->TransactionType;

				if($TransactionQuery->StoreID != 0) {
					$CartQuery = $this->db->query('Select * from Cart where CartID='. $TransactionQuery->CartID)->result()[0];

					if($TransactionQuery->CartID == $CartQuery->CartID) {
						foreach (json_decode($CartQuery->CartInfo) as $value) {
							if($value->StoreID == $TransactionQuery->StoreID) {
								$data['Quantity'] = $value->Quantity;
								$data['Price'] = $value->Price;
								$data['PreTotal'] = $value->PreTotal;

								break;
							}
						}
					}
				}
				else {
					$data['Quantity'] = "N / A";
					$data['Price'] = $TransactionDescription->TransactionAmount;
					$data['PreTotal'] = $TransactionDescription->TransactionAmount + $TransactionDescription->TransactionFee;
				}

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

	function View_CartLoad() {
		if($this->db->query("Select Count(*) as x from Cart where AccountID=". $_SESSION['AccountID'] ." and isDone=false")->result()[0]->x != 0) {
			$CartQuery = $this->db->query("Select * from Cart where AccountID=". $_SESSION['AccountID']." and isDone=false")->result()[0];
			$data["isError"] = false;
			$data["isEmpty"] = false;
			$data["CartID"] = $CartQuery->CartID;
			$data["Cart_DepartmentArray"] = [];
			$data["Cart_CashierArray"] = [];
			$data["is_DepartmentEmpty"] = false;
			$data["is_CashierEmpty"] = false;

			foreach (json_decode($CartQuery->CartInfo) as $value) {
				if($this->db->query("Select * from Account where AccountID=". $this->db->query("Select * from Store where StoreID=". $value->StoreID)->result()[0]->AccountID)->result()[0]->AccountType == "DEPARTMENT") {
					$StoreQuery = $this->db->query("Select * from Store where StoreID=". $value->StoreID)->result()[0];

					array_push($data["Cart_DepartmentArray"], array(
						"StoreID" => $StoreQuery->StoreID,
						"StoreName" => $StoreQuery->StoreTitle,
						"StorePrice" => $StoreQuery->StorePrice,
						"PreTotal" => $StoreQuery->StorePrice * $value->Quantity,
						"StoreQuantity" => $value->Quantity,
						"setQuantity" => $StoreQuery->setQuantity
					));
				}
				if($this->db->query("Select * from Account where AccountID=". $this->db->query("Select * from Store where StoreID=". $value->StoreID)->result()[0]->AccountID)->result()[0]->AccountType == "CASHIER") {
					$StoreQuery = $this->db->query("Select * from Store where StoreID=". $value->StoreID)->result()[0];

					array_push($data["Cart_CashierArray"], array(
						"StoreID" => $StoreQuery->StoreID,
						"StoreName" => $StoreQuery->StoreTitle,
						"StorePrice" => $StoreQuery->StorePrice,
						"PreTotal" => $StoreQuery->StorePrice * $value->Quantity,
						"StoreQuantity" => $value->Quantity,
						"setQuantity" => $StoreQuery->setQuantity
					));
				}
			}

			if(count($data["Cart_DepartmentArray"]) == 0) $data["is_DepartmentEmpty"] = true;
			if(count($data["Cart_CashierArray"]) == 0) $data["is_CashierEmpty"] = true;

			echo json_encode($data);
		}
		else echo json_encode(array(
			"isError" => false,
			"isEmpty" => true
		));
	}
	// Cashier
	function View_CDButton() {
		if(isset($_GET['StoreID']) && isset($_POST['id'])) {
			if(!empty($_GET['StoreID']) && !empty($_POST['id'])) {
				$CartQuery = $this->db->query("Select * from Cart where CartID=". $_POST['id'] ." and isDone=false and AccountID=". $_SESSION['AccountID'])->result()[0];

				$temp = [];
				foreach (json_decode($CartQuery->CartInfo) as $value) {
					if($value->StoreID != $_GET['StoreID']) array_push($temp, array(
						"StoreID" => $value->StoreID,
						"Quantity" => $value->Quantity
					));
				}

				$this->db->update("Cart", array(
					"CartInfo" => json_encode($temp)
				), "CartID=". $CartQuery->CartID ." and AccountID=". $_SESSION['AccountID'] ." and isDone=false");

				echo json_encode(array(
					"isError" => false
				));
			}
			else echo json_encode(array(
				"isError" => true,
				"ErrorDisplay" => "Unexpected Error Occurs!"
			));
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Unexpected Error Occurs!"
		));
	}
	// Department
	function View_DDButton() {
		if(isset($_GET['StoreID']) && isset($_POST['id'])) {
			if(!empty($_GET['StoreID']) && !empty($_POST['id'])) {
				$CartQuery = $this->db->query("Select * from Cart where CartID=". $_POST['id'] ." and isDone=false and AccountID=". $_SESSION['AccountID'])->result()[0];

				$temp = [];
				foreach (json_decode($CartQuery->CartInfo) as $value) {
					if($value->StoreID != $_GET['StoreID']) array_push($temp, array(
						"StoreID" => $value->StoreID,
						"Quantity" => $value->Quantity
					));
				}

				$this->db->update("Cart", array(
					"CartInfo" => json_encode($temp)
				), "CartID=". $CartQuery->CartID ." and AccountID=". $_SESSION['AccountID'] ." and isDone=false");

				echo json_encode(array(
					"isError" => false
				));
			}
			else echo json_encode(array(
				"isError" => true,
				"ErrorDisplay" => "Unexpected Error Occurs!"
			));
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Unexpected Error Occurs!"
		));
	}

	function View_ClearButton() {
		if(isset($_GET['id']) && !empty($_GET['id'])) {
			$this->db->update("Cart", array(
				"CartInfo" => json_encode([])
			), "CartID=". $_GET['id']);

			echo json_encode(array(
				"isError" => false
			));
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Unexpected Error Occurs!"
		));
	}

	function View_PurchaseButton() {
		if(isset($_GET['CartID']) && isset($_POST["StoreCart_CashierList"]) && isset($_POST["StoreCart_DepartmentList"]) ) {
			$AccountQuery = $this->db->query("Select * from Account where AccountID=". $_SESSION['AccountID'])->result()[0];

			$StoreCart_CashierList = json_decode($_POST["StoreCart_CashierList"]);
			$StoreCart_DepartmentList = json_decode($_POST["StoreCart_DepartmentList"]);
			$Total = .0;
			$CartArray = [];
			$ReceiptArray = [];
			$DateRegister = date("Y-m-d");
			$TimeRegister = date("H:i:s");

			if($AccountQuery->Account_AvailableBalance == 0 || $AccountQuery->Account_AvailableBalance <= 0) echo json_encode(array(
				"isError" => true,
				"ErrorDisplay" => "Not Enough Balance!"
			));
			else {
				if(count($StoreCart_CashierList) != 0) {
					foreach($StoreCart_CashierList as $value) {
						$Total  += $value->Price * $value->Quantity;

						array_push($CartArray, array(
							"StoreID" => $value->StoreID,
							"Quantity" => $value->Quantity
						));
						array_push($ReceiptArray, array(
							"StoreID" => $value->StoreID,
							"Name" => $this->db->query("Select * from Store where StoreID=" .$value->StoreID)->result()[0]->StoreTitle,
							"Price" => $value->Price,
							"Quantity" => $value->Quantity,
							"PreTotal" => $value->Price * $value->Quantity,	
							"Type" => "CASHIER"
						));
					}
				}
				if(count($StoreCart_DepartmentList) != 0) {
					foreach($StoreCart_DepartmentList as $value) {
						$Total  += $value->Price * $value->Quantity;

						array_push($CartArray, array(
							"StoreID" => $value->StoreID,
							"Quantity" => $value->Quantity
						));
						array_push($ReceiptArray, array(
							"StoreID" => $value->StoreID,
							"Name" => $this->db->query("Select * from Store where StoreID=" .$value->StoreID)->result()[0]->StoreTitle,
							"Price" => $value->Price,
							"Quantity" => $value->Quantity,
							"PreTotal" => $value->Price * $value->Quantity,
							"Type" => "DEPARTMENT"
						));
					}
				}

				$BalanceLeft = $AccountQuery->Account_AvailableBalance - $Total;
				$CheckChar = count(explode("-", (string)$BalanceLeft));

				if($CheckChar == 2) echo json_encode(array(
					"isError" => true,
					"ErrorDisplay" => "Not Enough Balance!"
				));
				if($this->db->query("Select Count(*) as x from Account where AccountID=". $_SESSION['AccountID'])->result()[0]->x != 0) {
					$x = include APPPATH.'third_party/SMTPConfig.php';
					$No = $this->db->query("Select Count(*) as x from Transaction")->result()[0]->x != 0 ? $this->db->query("Select * from Transaction Order by TransactionID DESC LIMIT 1")->result()[0]->TransactionID + 1 : 1;

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
					$mail->Body = $this->FullReceipt($No, $DateRegister. ' - ' .$TimeRegister, $ReceiptArray, $Total, $AccountQuery->Account_AvailableBalance, $BalanceLeft);
					// Send
					if(!$mail->send())  echo json_encode(array(
					    "isError" => true,
					    "ErrorDisplay" => "The Server cannot send a Notification via Email Address due to Offline Mode or SMTP is broken.\n\nTry Again Later!"
					));

					else {
						foreach ($ReceiptArray as $value) {
							$StoreQuery = $this->db->query("Select * from Store where StoreID=". $value["StoreID"])->result()[0];

							if($this->db->query("Select Count(*) as x from Account where AccountID=". $StoreQuery->AccountID. " and AccountType='DEPARTMENT'")->result()[0]->x != 0) {
								$_AccountQuery = $this->db->query("Select * from Account where AccountID=". $StoreQuery->AccountID. " and AccountType='DEPARTMENT'")->result()[0];

								$this->db->update("Account", array(
									"Account_AvailableBalance" => $_AccountQuery->Account_AvailableBalance + $value["PreTotal"]
								), "AccountID=". $StoreQuery->AccountID);
							}

							$this->db->insert("Transaction", array(
								"StudentID" => $AccountQuery->StudentID,
								"StoreID" => $StoreQuery->StoreID,
								"CartID" => $_GET['CartID'],
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
								"DateRegister" => $DateRegister,
								"TimeRegister" => $TimeRegister
							));

							$this->db->insert("Request", array(
								"StudentID" =>$AccountQuery->StudentID,
								"RequestName" => $StoreQuery->StoreTitle,
								"Quantity" => $value["Quantity"] == 0 ? 1 : $value["Quantity"],
								"isProcess" => false,
								"isClaim" => false,
								"Start_DateRegister" => $DateRegister,
								"Start_TimeRegister" => $TimeRegister
							));
						}

						$this->db->insert("Logs", array(
							"AccountID" => $_SESSION['AccountID'],
							"LogActivity" => json_encode(array(
								"Page" => "Store",
								"Action" => "Purchase an Item on Receipt ID#" .$_GET['CartID']
							)),
							"TimeRegister" => $TimeRegister,
							"DateRegister" => $DateRegister
						));
						$this->db->update("Cart", array(
							"CartInfo" => json_encode($ReceiptArray),
							"isDone" => true
						), "CartID=". $_GET['CartID'] ." and AccountID=". $_SESSION['AccountID']);
						$this->db->update("Account", array(
							"Account_AvailableBalance" => $BalanceLeft
						), "AccountID=". $_SESSION['AccountID']);

						echo json_encode(array(
							"isError" => false,
							"ReceiptID" => $No,
							"Timeline" => $DateRegister. ' - ' .$TimeRegister,
							"ReceiptArray" => $ReceiptArray,
							"SubTotal" => $Total,
							"Cash" => $AccountQuery->Account_AvailableBalance,
							"Total" => $BalanceLeft
						));
					}
				}
			}			
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Unexpected Error Occurs!"
		));
	}

	function View_SearchButton() {
		if(isset($_GET['id'])) {
			if(!empty($_GET['id'])) {
				if($this->db->query("Select Count(*) as x from Student where StudentID=". $_GET['id'])->result()[0]->x != 0) {
					$StudentQuery = $this->db->query("Select * from Student where StudentID=". $_GET['id'])->result()[0];

					$data['isError'] = false;
					$data['TransactionArray'] = [];

					if($_SESSION["AccountType"] == "CASHIER") {
						foreach ($this->db->query("Select * from Transaction where StudentID=". $_GET['id'])->result() as $value) {
							if($value->StoreID != 0) {
								$CartQuery = $this->db->query('Select * from Cart where CartID='. $value->CartID)->result()[0];

								if($value->CartID == $CartQuery->CartID) {
									foreach (json_decode($CartQuery->CartInfo) as $value) {
										if($value->StoreID == $value->StoreID) {
											array_push($data['TransactionArray'], array(
												'TransactionID' => $value->TransactionID,
												'StudentName' => json_decode($StudentQuery->Name)->Lastname. ", " .json_decode($StudentQuery->Name)->Firstname. " " .strtoupper(substr(json_decode($StudentQuery->Name)->Middlename, 0, 1)),
												'TransactionName' => json_decode($value->TransactionDescription)->TransactionName,
												'Quantity' => $value->Quantity,
												"Price" => $value->Price,
												"PreTotal" => $value->PreTotal,
												'TransactionType' => $value->TransactionType,
												'Timeline' => $value->DateRegister. " " .$value->TimeRegister
											));
										}
									}
								}
							}
							else {
								$TransactionDescription = json_decode($value->TransactionDescription);
								array_push($data['TransactionArray'], array(
									'TransactionID' => $value->TransactionID,
									'StudentName' => json_decode($StudentQuery->Name)->Lastname. ", " .json_decode($StudentQuery->Name)->Firstname. " " .strtoupper(substr(json_decode($StudentQuery->Name)->Middlename, 0, 1)),
									'TransactionName' => $TransactionDescription->TransactionName,
									'Quantity' => "N / A",
									"Price" => $TransactionDescription->TransactionAmount,
									"PreTotal" => $TransactionDescription->TransactionAmount + $TransactionDescription->TransactionFee,
									'TransactionType' => $value->TransactionType,
									'Timeline' => $value->DateRegister. " " .$value->TimeRegister
								));
							}
						}
					}
					else if($_SESSION["AccountType"] == "3RD-PARTY") {
						foreach ($this->db->query("Select * from Transaction where StoreID=0 and StudentID=". $_GET['id'])->result() as $value) {
							$TransactionDescription = json_decode($value->TransactionDescription);

							array_push($data['TransactionArray'], array(
								'TransactionID' => $value->TransactionID,
								'StudentName' => json_decode($StudentQuery->Name)->Lastname. ", " .json_decode($StudentQuery->Name)->Firstname. " " .strtoupper(substr(json_decode($StudentQuery->Name)->Middlename, 0, 1)),
								'TransactionName' => $TransactionDescription->TransactionName,
								'Quantity' => "N / A",
								"Price" => $TransactionDescription->TransactionAmount,
								"PreTotal" => $TransactionDescription->TransactionAmount + $TransactionDescription->TransactionFee,
								'TransactionType' => $value->TransactionType,
								'Timeline' => $value->DateRegister. " " .$value->TimeRegister
							));
						}
					}
					else {
						foreach ($this->db->query("Select * from Transaction where StoreID!=0 and StudentID=". $_GET['id'])->result() as $value) {
							if($this->db->query("Select * from Account where AccountID=". $this->db->query("Select * from Store where StoreID=". $value->StoreID)->result()[0]->AccountID)->result()[0]->AccountType == $_SESSION["AccountType"]) {
								$CartQuery = $this->db->query('Select * from Cart where CartID='. $TransactionQuery->CartID)->result()[0];

								if($TransactionQuery->CartID == $CartQuery->CartID) {
									foreach (json_decode($CartQuery->CartInfo) as $value) {
										if($value->StoreID == $TransactionQuery->StoreID) {
											array_push($data['TransactionArray'], array(
												'TransactionID' => $value->TransactionID,
												'StudentName' => json_decode($StudentQuery->Name)->Lastname. ", " .json_decode($StudentQuery->Name)->Firstname. " " .strtoupper(substr(json_decode($StudentQuery->Name)->Middlename, 0, 1)),
												'TransactionName' => json_decode($value->TransactionDescription)->TransactionName,
												'Quantity' => $value->Quantity,
												"Price" => $value->Price,
												"PreTotal" => $value->PreTotal,
												'TransactionType' => $value->TransactionType,
												'Timeline' => $value->DateRegister. " " .$value->TimeRegister
											));
										}
									}
								}
							}
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

		$data['isError'] = false;
		$data['Account_SM'] = $AccountQuery->Account_AvailableBalance;
		$data['Account_STF'] = 0;

		if($AccountQuery->StudentID != 0) $data['Account_STF'] = $AccountQuery->Account_TuitionBalance;
		else {
			if($AccountQuery->AccountType == "DEPARTMENT" || $AccountQuery->AccountType == "STUDENT" || $AccountQuery->AccountType == "3RD-PARTY") $data['Account_SM'] = $AccountQuery->Account_AvailableBalance;
			else $data['Account_SM'] = 'N / A';
			$data['Account_STF'] = 'N / A';
		}

		echo json_encode($data);
	}

	function View_InfoButton() {
		if(isset($_GET['id']) && !empty($_GET['id'])) {
			$TransactionQuery = $this->db->query('Select * from Transaction where TransactionID='. $_GET['id'])->result()[0];
			$StudentQuery = null;
			$AccountQuery = null;
			$data["StudentID"] = "";
			$data["StudentCY"] = "";

			if($this->db->query("Select Count(*) as x from Student where StudentID=". $TransactionQuery->StudentID)->result()[0]->x != 0) {
				$StudentQuery = $this->db->query("Select * from Student where StudentID=". $TransactionQuery->StudentID)->result()[0];
				$AccountQuery = $this->db->query("Select * from Account where StudentID=". $TransactionQuery->StudentID)->result()[0];

				$data["StudentID"] =  $TransactionQuery->StudentID;
				$data["StudentCY"] =  $StudentQuery->Course. "-" .$StudentQuery->Level;
			}
			else {
				$StudentQuery = $this->db->query("Select * from Employee where EmployeeID=". $TransactionQuery->EmployeeID)->result()[0];
				$AccountQuery = $this->db->query("Select * from Account where EmployeeID=". $TransactionQuery->EmployeeID)->result()[0];

				$data["StudentID"] =  $TransactionQuery->EmployeeID;
				$data["StudentCY"] = "N / A";
			}

			$data["isError"] = false;
			$data["StudentImage"] =  $AccountQuery->AccountImage;
			$data["StudentName"] =  json_decode($StudentQuery->Name)->Lastname. ", " .json_decode($StudentQuery->Name)->Firstname. " " .strtoupper(substr(json_decode($StudentQuery->Name)->Middlename, 0, 1)). ". (" .json_decode($StudentQuery->Name)->Middlename. ")";
			$data["StudentBalance"] =  $AccountQuery->Account_AvailableBalance;

			$TransactionJSON = json_decode($TransactionQuery->TransactionDescription);

			$data["TransactionType"] =  $TransactionQuery->TransactionType;

			$data["TransactionName"] = $TransactionJSON->TransactionName;
			$data["TransactionPrice"] = $TransactionJSON->TransactionAmount;
			$data["TransactionFee"] =  $TransactionJSON->TransactionFee;
			$data["TransactionST"] =  $TransactionJSON->TransactionAmount + $TransactionJSON->TransactionFee;
			$data["TransactionCash"] =  $TransactionJSON->TransactionCash;

			$data["TransactionTotal"] =  ($TransactionJSON->TransactionAmount + $TransactionJSON->TransactionFee) - $TransactionJSON->TransactionCash;
			$data["TransactionBalance"] =  $TransactionQuery->StoreID == 0 ? (json_decode($TransactionQuery->TransactionDescription)->TransactionBalance != 0 ? json_decode($TransactionQuery->TransactionDescription)->TransactionBalance : 0) : json_decode($TransactionQuery->TransactionDescription)->TransactionBalance;

			echo json_encode($data);
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Unexpected Error Occurs!"
		));
	}

	function View_FullButton() {
		if(isset($_GET['id']) && !empty($_GET['id'])) {
			$AccountQuery = null;
			$StudentQuery = null;

			$data["isError"] = false;
			$data["isEmpty"] = false;
			$data["TransactionArray"] = [];
			$data["StudentCY"] =  "";
			$data["StudentID"] =  "";
			$data["StudentStatus"] = "";
			$data["StudentTuition"] =  "";

			if($this->db->query("Select Count(*) as x from Account where StudentID=" .$_GET['id'])->result()[0]->x != 0) {
				$AccountQuery = $this->db->query("Select * from Account where StudentID=" .$_GET['id'])->result()[0];
				$StudentQuery = $this->db->query("Select * from Student where StudentID=" .$AccountQuery->StudentID)->result()[0];

				$data["StudentCY"] =  $StudentQuery->Course. "-" .$StudentQuery->Level;
				$data["StudentID"] =  $AccountQuery->StudentID;
				$data["StudentStatus"] =  $StudentQuery->Status;
				$data["StudentTuition"] =  $AccountQuery->Account_TuitionBalance;

				if($this->db->query("Select Count(*) as x from Transaction where StudentID=". $_GET['id'])->result()[0]->x == 0) $data["isEmpty"] = true;

				foreach ($this->db->query("Select * from Transaction where StudentID=". $_GET['id'])->result() as $value) {
					array_push($data['TransactionArray'], array(
						'TransactionID' => $value->TransactionID,
						'TransactionName' => json_decode($value->TransactionDescription)->TransactionName,
						'TransactionType' => $value->TransactionType,
						'TransactionPrice' => json_decode($value->TransactionDescription)->TransactionAmount,
						'TransactionCash' => json_decode($value->TransactionDescription)->TransactionCash,
						'TransactionST' => json_decode($value->TransactionDescription)->TransactionAmount + json_decode($value->TransactionDescription)->TransactionFee,
						'TransactionTotal' => (json_decode($value->TransactionDescription)->TransactionAmount + json_decode($value->TransactionDescription)->TransactionFee) - json_decode($value->TransactionDescription)->TransactionCash,
						'TransactionBalance' => $value->StoreID == 0 ? 0 : json_decode($value->TransactionDescription)->TransactionBalance,
						'Timeline' => $value->DateRegister. " " .$value->TimeRegister
					));
				}
			}
			else {
				$AccountQuery = $this->db->query("Select * from Account where EmployeeID=" .$_GET['id'])->result()[0];
				$StudentQuery = $this->db->query("Select * from Employee where EmployeeID=" .$AccountQuery->EmployeeID)->result()[0];

				$data["StudentCY"] =  "N / A";
				$data["StudentID"] =  $AccountQuery->EmployeeID;
				$data["StudentStatus"] =  ($StudentQuery->isRetired == true ? "Retired" : "Non-Retired");
				$data["StudentTuition"] =  " N / A";

				if($this->db->query("Select Count(*) as x from Transaction where EmployeeID=". $_GET['id'])->result()[0]->x == 0) $data["isEmpty"] = true;

				foreach ($this->db->query("Select * from Transaction where EmployeeID=". $_GET['id'])->result() as $value) {
					array_push($data['TransactionArray'], array(
						'TransactionID' => $value->TransactionID,
						'TransactionName' => json_decode($value->TransactionDescription)->TransactionName,
						'TransactionType' => $value->TransactionType,
						'TransactionPrice' => json_decode($value->TransactionDescription)->TransactionAmount,
						'TransactionCash' => json_decode($value->TransactionDescription)->TransactionCash,
						'TransactionST' => json_decode($value->TransactionDescription)->TransactionAmount + json_decode($value->TransactionDescription)->TransactionFee,
						'TransactionTotal' => (json_decode($value->TransactionDescription)->TransactionAmount + json_decode($value->TransactionDescription)->TransactionFee) - json_decode($value->TransactionDescription)->TransactionCash,
						'TransactionBalance' => $value->StoreID == 0 ? 0 : json_decode($value->TransactionDescription)->TransactionBalance,
						'Timeline' => $value->DateRegister. " " .$value->TimeRegister
					));
				}
			}
			
			$data["StudentImage"] =  $AccountQuery->AccountImage;
			$data["StudentName"] =  json_decode($StudentQuery->Name)->Lastname. ", " .json_decode($StudentQuery->Name)->Firstname. " " .strtoupper(substr(json_decode($StudentQuery->Name)->Middlename, 0, 1)). ". (" .json_decode($StudentQuery->Name)->Middlename. ")";
			

			
			$data["StudentGender"] =  $StudentQuery->Gender;
			$data["StudentAge"] =  $StudentQuery->Age;
			$data["StudentNumber"] =  $StudentQuery->ContactNumber;
			$data["StudentEmail"] =  $AccountQuery->AccountEmail;

			$data["StudentDeposits"] =  $AccountQuery->Account_AvailableBalance;

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

										if($_SESSION['AccountType'] == "3RD-PARTY") {
											$this->db->update("Account", array(
												"Account_AvailableBalance" => $this->db->query("Select * from Account where AccountID=". $_SESSION['AccountID']. " and AccountType ='3RD-PARTY'")->result()[0]->Account_AvailableBalance + $_POST['Amountbox']
											), "AccountID=" .$_SESSION['AccountID']. " and AccountType ='3RD-PARTY'");
										}

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

											if($_SESSION['AccountType'] == "3RD-PARTY") {
												$this->db->update("Account", array(
													"Account_AvailableBalance" => $this->db->query("Select * from Account where AccountID=". $_SESSION['AccountID']. " and AccountType ='3RD-PARTY'")->result()[0]->Account_AvailableBalance + $_POST['Amountbox']
												), "AccountID=" .$_SESSION['AccountID']. " and AccountType ='3RD-PARTY'");
											}

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

										if($_SESSION['AccountType'] == "3RD-PARTY") {
											$this->db->update("Account", array(
												"Account_AvailableBalance" => $this->db->query("Select * from Account where AccountID=". $_SESSION['AccountID']. " and AccountType ='3RD-PARTY'")->result()[0]->Account_AvailableBalance + $_POST['Amountbox']
											), "AccountID=" .$_SESSION['AccountID']. " and AccountType ='3RD-PARTY'");
										}

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

	// -------------------------------------------------------------------------
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
	// -------------------------------------------------------------------------
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
						"ErrorDisplay" => "Invalid Input Amount!"
					));
					else {
						$BalanceLeft = $AccountQuery->Account_AvailableBalance - $_POST["Amount"];
						$FeeLeft = $AccountQuery->Account_TuitionBalance - $_POST["Amount"];
						$CheckChar = count(explode("-", (string)$FeeLeft));

						if($CheckChar == 2) echo json_encode(array(
							"isError" => true,
							"ErrorDisplay" => "Please Input the Correct Amount!"
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
				$data["StoreQuantity"] = $StoreQuery->setQuantity;

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
		if(isset($_GET['id']) && isset($_GET['quantity'])) {
			if(!empty($_GET['id']) && !empty($_GET['quantity'])) {
				if($this->db->query("Select Count(*) as x from Account where AccountID=". $_SESSION['AccountID'])->result()[0]->x != 0) {
					$StoreQuery = $this->db->query('Select * from Store where StoreID='. $_GET['id'])->result()[0];

					if($this->db->query("Select Count(*) as x from Cart where AccountID=". $_SESSION['AccountID'] ." and isDone=false")->result()[0]->x != 0) {
						$CartQuery =  $this->db->query("Select * from Cart where AccountID=". $_SESSION['AccountID']." and isDone=false")->result()[0];
						$data["isError"] = false;
						$data["ErrorDisplay"] = "";

						if(count(json_decode($CartQuery->CartInfo)) != 0) {
							foreach (json_decode($CartQuery->CartInfo) as $value) {
								if($value->StoreID == $_GET['id']) {
									$data["isError"] = true;
									$data["ErrorDisplay"] = "This Item is already exist into your Payment List!";

									break;
								}
								else {
									$data["isError"] = false;
									$data["ErrorDisplay"] = "";
								}
							}

							if($data["isError"] == false) {
								$temp = json_decode($CartQuery->CartInfo);
								array_push($temp, array(
									"StoreID" => $_GET['id'],
									"Quantity" => $_GET['quantity']
								));

								$this->db->update("Cart", array(
									"CartInfo" => json_encode($temp)
								), "CartID=". $CartQuery->CartID ." and AccountID=". $_SESSION['AccountID'] ." and isDone=false");
							}
						}
						else {
							$data["isError"] = false;
							$data["ErrorDisplay"] = "";

							$temp = [];
							array_push($temp, array(
								"StoreID" => $_GET['id'],
								"Quantity" => $_GET['quantity']
							));

							$this->db->update("Cart", array(
								"CartInfo" => json_encode($temp)
							), "CartID=". $CartQuery->CartID ." and AccountID=". $_SESSION['AccountID'] ." and isDone=false");
						}

						echo json_encode($data);
					}
					else {
						$temp = [];
						array_push($temp, array(
							"StoreID" => $_GET['id'],
							"Quantity" => $_GET['quantity']
						));

						$this->db->insert("Cart", array(
							"AccountID" => $_SESSION['AccountID'],
							"CartInfo" => json_encode($temp),
							"isDone" => false,
							"DateRegister" => date("Y-m-d"),
							"TimeRegister" => date("H:i:s")
						));

						echo json_encode(array(
							"isError" => false
						));
					}
 
				}
				else echo json_encode(array(
					"isError" => true,
					"ErrorDisplay" => "Unexpected Error Occur!"
				));
			}
			else echo json_encode(array(
				"isError" => true,
				"ErrorDisplay" => "Set Quantity to Zero is Invalid!"
			));
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Unexpected Error Occur!"
		));
	}

	// -------------------------------------------------------------------------
	function CashView_SearchButton() {
		if(isset($_GET['id'])) {
			if(!empty($_GET['id'])) {
				if($this->db->query("Select Count(*) as x from Account where StudentID=". $_GET['id'])->result()[0]->x != 0) {
					$AccountQuery = $this->db->query("Select * from Account where StudentID=". $_GET['id'])->result()[0];

					$data["isError"] = false;
					$data["Balance"] = $AccountQuery->Account_AvailableBalance;

					echo json_encode($data);
				}
				else {
					if($_SESSION['AccountType'] == "CASHIER") {
						if($this->db->query("Select Count(*) as x from Account where EmployeeID=". $_GET['id'])->result()[0]->x != 0) {
							$AccountQuery = $this->db->query("Select * from Account where EmployeeID=". $_GET['id'])->result()[0];

							$data["isError"] = false;
							$data["Balance"] = $AccountQuery->Account_AvailableBalance;

							echo json_encode($data);
						}
						else echo json_encode(array(
							"isError" => true,
							"ErrorDisplay" => "Invalid Student ID / Employee ID!"
						)); 
					}
					else echo json_encode(array(
						"isError" => true,
						"ErrorDisplay" => "Unexpected Error Occur!"
					));
				}
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
		if(isset($_GET['id']) && isset($_POST["Amount"])) {
			if(!empty($_GET['id']) && !empty($_POST["Amount"])) {
				if($this->db->query("Select Count(*) as x from Account where Account_AvailableBalance!=0 and StudentID=". $_GET['id'])->result()[0]->x == 1) {
					$AccountQuery = $this->db->query("Select * from Account where StudentID=". $_GET['id'])->result()[0];
					$x = include APPPATH.'third_party/SMTPConfig.php';

					if($AccountQuery->Account_AvailableBalance == 0 || $AccountQuery->Account_AvailableBalance <= 0) echo json_encode(array(
						"isError" => true,
						"ErrorDisplay" => "Not Enough Balance!"
					));
					else {
						$BalanceLeft = $AccountQuery->Account_AvailableBalance - $_POST["Amount"];
						$CheckChar = count(explode("-", (string)$BalanceLeft));

						if($CheckChar == 2) echo json_encode(array(
							"isError" => true,
							"ErrorDisplay" => "Not Enough Balance!"
						));
						else {
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
							$mail->Body    = 'Cash-Out P ' .$BalanceLeft. ' out of your Account.<br><br><br><br>Thank you for Widthrawal today (' .date('Y-m-d'). ' ' .date('H:i:s'). '). Please enjoy!';
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
										"TransactionName" => "WIDTHDRAWAL",
										"TransactionAmount" => $_POST["Amount"],
										"TransactionFee" => 0,
										"TransactionCash" =>$_POST["Amount"],
										"TransactionBalance" => $BalanceLeft
									)),
									"DateRegister" => date("Y-m-d"),
									"TimeRegister" => date("H:i:s")
								));
								$this->db->update("Account", array(
									"Account_AvailableBalance" => $BalanceLeft
								), "StudentID=". $_GET['id']);

								if($_SESSION['AccountType'] == "3RD-PARTY") {
									$this->db->update("Account", array(
										"Account_AvailableBalance" => $this->db->query("Select * from Account where AccountID=". $_SESSION['AccountID']. " and AccountType ='3RD-PARTY'")->result()[0]->Account_AvailableBalance + $_POST['Amount']
										), "AccountID=" .$_SESSION['AccountID']. " and AccountType ='3RD-PARTY'");
								}

								echo json_encode(array(
									"isError" => false
								));
							}
						}
					}
				}				
				else {
					if ($this->db->query("Select Count(*) as x from Account where Account_AvailableBalance!=0 and EmployeeID=". $_GET['id'])->result()[0]->x == 1) {
						if($_SESSION['AccountType'] == "CASHIER") {
							$AccountQuery = $this->db->query("Select * from Account where EmployeeID=". $_GET['id'])->result()[0];
							$x = include APPPATH.'third_party/SMTPConfig.php';

							if($AccountQuery->Account_AvailableBalance == 0 || $AccountQuery->Account_AvailableBalance <= 0) echo json_encode(array(
								"isError" => true,
								"ErrorDisplay" => "Not Enough Balance!"
							));
							else {
								$BalanceLeft = $AccountQuery->Account_AvailableBalance - $_POST["Amount"];
								$CheckChar = count(explode("-", (string)$BalanceLeft));

								if($CheckChar == 2) echo json_encode(array(
									"isError" => true,
									"ErrorDisplay" => "Not Enough Balance!"
								));
								else {
									$HTML = 'Cash-Out <b>P '.($_POST["Amount"]).'<b> out of your Account. You have <b>P ' .$BalanceLeft. '</b> remaining balance left.<br><br><br><br>Thank you for Widthrawal today (' .date('Y-m-d'). ' ' .date('H:i:s'). '). Please enjoy!';;

									if($BalanceLeft == 0) $HTML = 'Cash-Out P ' .$BalanceLeft. ' out of your Account.<br><br><br><br>Thank you for Widthrawal today (' .date('Y-m-d'). ' ' .date('H:i:s'). '). Please enjoy!';

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
									$mail->Body    = $HTML;
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
												"Action" => "Widthrawal for Employee"
											)),
											"TimeRegister" => date("H:i:s"),
											"DateRegister" => date("Y-m-d")
										));
										$this->db->insert("Transaction", array(
											"EmployeeID" => $AccountQuery->EmployeeID,
											"TransactionType" => "WIDTHDRAWAL",
											"TransactionDescription" => json_encode(array(
												"EmployeeID" => $this->db->query("Select * from Account where AccountID=". $_SESSION["AccountID"])->result()[0]->EmployeeID,
												"StudentID" => "",
												"TransactionName" => "WIDTHDRAWAL",
												"TransactionAmount" => $_POST["Amount"],
												"TransactionFee" => 0,
												"TransactionCash" => $_POST["Amount"],
												"TransactionBalance" => $BalanceLeft
											)),
											"DateRegister" => date("Y-m-d"),
											"TimeRegister" => date("H:i:s")
										));
										$this->db->update("Account", array(
											"Account_AvailableBalance" => $BalanceLeft
										), "EmployeeID=". $_GET['id']);

										echo json_encode(array(
											"isError" => false
										));
									}
								}
							}
						}
						else echo json_encode(array(
							"isError" => true,
							"ErrorDisplay" => "Not Allowed to do a Widthrawal Transaction!"
						));
					}
					else echo json_encode(array(
						"isError" => true,
						"ErrorDisplay" => "Amount Balance is Zero!\nCannot Cashout Anymore!"
					));
				}
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