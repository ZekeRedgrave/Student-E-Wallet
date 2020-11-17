<?php 

include APPPATH.'third_party/PHPMailer/src/Exception.php';
include APPPATH.'third_party/PHPMailer/src/PHPMailer.php';
include APPPATH.'third_party/PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Account extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->database('default');

        session_start();
    }

	function View_RegisterLoader() {
		if($this->db->query("Select Count(*) as x from Registration where isDelete=false and RegisterType='STUDENT'")->result()[0]->x != 0) {
			$RegisterQuery = $this->db->query("Select * from Registration where isDelete=false and RegisterType='STUDENT' Order by RegisterID DESC")->result();
			$data['isError'] = false;
			$data['RegisterID'] = [];

			foreach ($RegisterQuery as $value) array_push($data['RegisterID'], $value->RegisterID);

			echo json_encode($data);
		}
		else echo json_encode(array(
		   	"isError" => true
		));
	}

	function View_RegisterLoad() {
		if(isset($_GET['RegisterID']) && !empty($_GET['RegisterID'])) {
			$RegisterQuery = $this->db->query("Select * from Registration where RegisterID=". $_GET['RegisterID'])->result()[0];

			if(json_encode($RegisterQuery) != 'null') {
				$data['isError'] = false;
				$data['StudentID'] = $RegisterQuery->RegisterUsername. "@" .$RegisterQuery->RegisterSI. "#" .$RegisterQuery->RegisterID;

				$this->db->insert("Logs", array(
					"AccountID" => $_SESSION['AccountID'],
					"LogActivity" => json_encode(array(
						"Page" => "Account",
						"Action" => "View Account Registration"
					)),
					"TimeRegister" => date("H:i:s"),
					"DateRegister" => date("Y-m-d")
				));

				echo json_encode($data);
			}
			else echo json_encode(array(
			   	"isError" => true,
			   	"ErrorDisplay" => "Error: 404 Not Found!"
			));
		}
		else echo json_encode(array(
		   	"isError" => true,
		   	"ErrorDisplay" => "Error: Unexpected Error Occur!"
		));
	}

	function View_RegisterButton() {
		if(isset($_GET['RegisterID']) && !empty($_GET['RegisterID'])) {
			$RegisterQuery = $this->db->query("Select * from Registration where RegisterID=". $_GET['RegisterID'])->result()[0];

			if(json_encode($RegisterQuery) != 'null') {
				$data['isError'] = false;
				$data["RegisterUsername"] = $RegisterQuery->RegisterUsername;
				$data["RegisterEmail"] = $RegisterQuery->RegisterEmail;
				$data["RegisterSI"] = $RegisterQuery->RegisterSI;
				$data["RegisterExpire"] = date("Y-m-d H:i:s", $RegisterQuery->RegisterExpire);
				$data["isExpire"] = $RegisterQuery->RegisterExpire <= time() ? true : false;
				$data["RegisterDT"] = $RegisterQuery->DateRegister. " " .$RegisterQuery->TimeRegister;

				echo json_encode($data);
			}
			else echo json_encode(array(
			   	"isError" => true,
			   	"ErrorDisplay" => "Error: 404 Not Found!"
			));
		}
		else echo json_encode(array(
		   	"isError" => true,
		   	"ErrorDisplay" => "Error: Unexpected Error Occur!"
		));
	}

	function View_DeleteButton() {
		if(isset($_GET['RegisterID']) && !empty($_GET['RegisterID'])) {
			$RegisterQuery = $this->db->query("Select * from Registration where RegisterID=". $_GET['RegisterID'])->result()[0];

			if(json_encode($RegisterQuery) != 'null') {
				$data['isError'] = false;

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
				$mail->addAddress($RegisterQuery->RegisterEmail, $RegisterQuery->RegisterEmail);
				// Content
				$mail->isHTML(true);
				$mail->Subject = 'Notice Information';
				$mail->Body    = 'Your new Registration Account has been officially denied by the System Administrator. You are already created the Account. If there is a problem, please contact the Official Student E-Wallet Staff in the School.<br /><br /><br /><br />Respectfully yours,<br />Student E-Wallet Staff';
				// Send
				$mail->send();

				$this->db->query("Delete from Registration where RegisterID=". $_GET['RegisterID']);
				$this->db->insert("Logs", array(
					"AccountID" => $_SESSION['AccountID'],
					"LogActivity" => json_encode(array(
						"Page" => "Account",
						"Action" => "Delete Account Registration"
					)),
					"TimeRegister" => date("H:i:s"),
					"DateRegister" => date("Y-m-d")
				));

				echo json_encode($data);
			}
			else echo json_encode(array(
			   	"isError" => true,
			   	"ErrorDisplay" => "Error: 404 Not Found!"
			));
		}
		else echo json_encode(array(
		   	"isError" => true,
		   	"ErrorDisplay" => "Error: Unexpected Error Occur!"
		));
	}

	function View_AcceptButton() {
		if(isset($_GET['RegisterID']) && !empty($_GET['RegisterID'])) {
			if($this->db->query("Select Count(*) as x from Registration where RegisterID=". $_GET['RegisterID'])->result()[0]->x != 0) {
				$RegisterQuery = $this->db->query("Select * from Registration where RegisterID=". $_GET['RegisterID'])->result()[0];

				if($this->db->query("Select Count(*) as x from Student where StudentID=". $RegisterQuery->RegisterSI)->result()[0]->x != 0) {
					$StudentQuery = $this->db->query("Select * from Student where StudentID=". $RegisterQuery->RegisterSI)->result()[0];

					$this->db->insert("Account", array(
						"StudentID" => $RegisterQuery->RegisterSI,
						"EmployeeID" => 0,
						"AccountUsername" => $RegisterQuery->RegisterUsername,
						"AccountEmail" => $RegisterQuery->RegisterEmail,
						"AccountPassword" => $RegisterQuery->RegisterPassword,
						"AccountType" => "STUDENT",
						"Account_AvailableBalance" => 0.00,
						"Account_TuitionBalance" => 0.00,
						"AccountImage" => "avatar.png",
						"TimeRegister" => date("Y-m-d"),
						"DateRegister" => date("H:i:s")
					));

					$data['isError'] = false;
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
					$mail->addAddress($RegisterQuery->RegisterEmail, $RegisterQuery->RegisterEmail);
					// Content
					$mail->isHTML(true);
					$mail->Subject = 'Notice Information';
					$mail->Body    = 'Your Account has been Accepted by the Official System Administrator by Student E-Wallet Staff';
					// Send
					$mail->send();

					$this->db->update("Registration", array(
						"isApprove" => true,
						"isDelete" => true,
						"RegisterExpire" => 0
					), "RegisterID=". $_GET['RegisterID']);
					$this->db->insert("Logs", array(
						"AccountID" => $_SESSION['AccountID'],
						"LogActivity" => json_encode(array(
							"Page" => "Account",
							"Action" => "Accept Account Registration"
						)),
						"TimeRegister" => date("H:i:s"),
						"DateRegister" => date("Y-m-d")
					));

					echo json_encode($data);
				}
				else echo json_encode(array(
				   	"isError" => true,
				   	"ErrorDisplay" => "Error: Unexpected Error Occur!"
				));
			}
			else echo json_encode(array(
			   	"isError" => true,
			   	"ErrorDisplay" => "Error: 404 Not Found!"
			));
		}
		else echo json_encode(array(
		   	"isError" => true,
		   	"ErrorDisplay" => "Error: Unexpected Error Occur!"
		));
	}

	function Register_SearchButton() {
		if(isset($_GET['RegisterSI']) && !empty($_GET['RegisterSI'])) {
			if($this->db->query("Select Count(*) x from Student where StudentID=". $_GET['RegisterSI'])->result()[0]->x != 0) {
				$StudentQuery = $this->db->query("Select * from Student where StudentID=". $_GET['RegisterSI'])->result()[0];

				$data["isError"] = false;
				$data["SearchSI"] = $StudentQuery->StudentID;
				$data["SearchCY"] = strtoupper($StudentQuery->Course). "-" .$StudentQuery->Level;
				$data["SearchStatus"] = strtoupper($StudentQuery->Status);
				$data["SearchName"] = json_decode($StudentQuery->Name)->Lastname. ", " .json_decode($StudentQuery->Name)->Firstname. " " .substr(json_decode($StudentQuery->Name)->Middlename, 0, 1). ".";
				$data["SearchImage"] = $StudentQuery->Image;

				echo json_encode($data);
			}
			else echo json_encode(array(
			   	"isError" => true,
			   	"ErrorDisplay" => "Error: 404 Not Found!"
			));
		}
		else echo json_encode(array(
		   	"isError" => true,
		   	"ErrorDisplay" => "Error: Unexpected Error Occur!"
		));
	}

	function View_ProfileLoad() {
		$AccountQuery = $this->db->query("Select * from Account where AccountID=". $_SESSION['AccountID'] ." and AccountType='" .$_SESSION['AccountType']. "'")->result()[0];
		$ProfileQuery = ($AccountQuery->StudentID != 0 ? $this->db->query("Select * from Student where StudentID=". $AccountQuery->StudentID)->result()[0] : $this->db->query("Select * from Employee where EmployeeID=". $AccountQuery->EmployeeID)->result()[0]);

		$data["isError"] = false;
		$data["AccountImage"] = $AccountQuery->AccountImage;
		$data["AccountEmail"] = $AccountQuery->AccountEmail;
		$data["AccountUsername"] = $AccountQuery->AccountUsername;
		$data["AccountName"] = json_decode($ProfileQuery->Name)->Lastname. ", " .json_decode($ProfileQuery->Name)->Firstname. " " .substr(json_decode($ProfileQuery->Name)->Middlename, 0, 1). ".";
		$data["AccountMN"] = json_decode($ProfileQuery->Name)->Middlename;
		$data["AccountID"] = '@'. $_SESSION['AccountID']. '#' .($AccountQuery->StudentID != 0 ? $AccountQuery->StudentID : $AccountQuery->EmployeeID);
		$data["AccountDT"] = $AccountQuery->DateRegister. " " .$AccountQuery->TimeRegister;
		$data["AccountCourse"] = ($AccountQuery->StudentID != 0 ? $ProfileQuery->Course : 'N / A');

		echo json_encode($data);
	}

	function Edit_DoneButton() {
		if(isset($_POST['Package']) && isset($_FILES['AccountImage'])) {
			$Package = json_decode($_POST['Package']);

			if($Package->AccountPassword != "") {
				if($this->db->query("Select Count(*) as x from Account where AccountID=". $_SESSION['AccountID'] ." and AccountPassword='" .$Package->AccountPassword. "'")->result()[0]->x != 0) {
					if($Package->AccountUsername != "" && $Package->AccountEmail != "") {
						$Avatar = $_SESSION['AccountID']. "." .pathinfo($_FILES['AccountImage']['name'], PATHINFO_EXTENSION);

						move_uploaded_file($_FILES['AccountImage']['tmp_name'], "avatar/". $Avatar);

						$query['AccountImage'] = $Avatar;
						$query["AccountUsername"] = $Package->AccountUsername;
						$query["AccountEmail"] = $Package->AccountEmail;

						$this->db->update("Account", $query, "AccountID=". $_SESSION['AccountID'] ." and AccountPassword='" .$Package->AccountPassword. "'");

						$this->db->insert("Logs", array(
							"AccountID" => $_SESSION['AccountID'],
							"LogActivity" => json_encode(array(
								"Page" => "Profile",
								"Action" => "Updating His/Her Account Profile"
							)),
							"TimeRegister" => date("H:i:s"),
							"DateRegister" => date("Y-m-d")
						));

						echo json_encode(array(
						   	"isError" => false
						));
					}
					else {
						$ErrorDisplay = "";

						if($Package->AccountUsername == "") $ErrorDisplay .= "(Username) ";
						if($Package->AccountEmail == "") $ErrorDisplay .= "(Email) ";

						echo json_encode(array(
						   	"isError" => true,
						   	"ErrorDisplay" => "Error: ". $ErrorDisplay ."is Empty!"
						));
					}
				}
				else echo json_encode(array(
				   	"isError" => true,
				   	"ErrorDisplay" => "Error: Password Mismatched!"
				));
			}
			else echo json_encode(array(
			   	"isError" => true,
			   	"ErrorDisplay" => "Error: Please Enter Your Password!"
			));
		}
		else if(isset($_POST['Package'])) {
			$Package = json_decode($_POST['Package']);

			if($Package->AccountPassword != "") {
				if($this->db->query("Select Count(*) as x from Account where AccountID=". $_SESSION['AccountID'] ." and AccountPassword='" .$Package->AccountPassword. "'")->result()[0]->x != 0) {
					if($Package->AccountUsername != "" && $Package->AccountEmail != "") {
						$query["AccountUsername"] = $Package->AccountUsername;
						$query["AccountEmail"] = $Package->AccountEmail;

						$this->db->update("Account", $query, "AccountID=". $_SESSION['AccountID'] ." and AccountPassword='" .$Package->AccountPassword. "'");

						echo json_encode(array(
						   	"isError" => false
						));
					}
					else {
						$ErrorDisplay = "";

						if($Package->AccountUsername == "") $ErrorDisplay .= "(Username) ";
						if($Package->AccountEmail == "") $ErrorDisplay .= "(Email) ";

						echo json_encode(array(
						   	"isError" => true,
						   	"ErrorDisplay" => "Error: ". $ErrorDisplay ."is Empty!"
						));
					}
				}
				else echo json_encode(array(
				   	"isError" => true,
				   	"ErrorDisplay" => "Error: Password Mismatched!"
				));
				
			}
			else echo json_encode(array(
			   	"isError" => true,
			   	"ErrorDisplay" => "Error: Please Enter Your Password!"
			));
		}
		else echo json_encode(array(
		   	"isError" => true,
		   	"ErrorDisplay" => "Error: Unexpected Error Occur!"
		));
	}

	function ViewAssessment_SearchButton() {
		if(isset($_GET['id'])) {
			if(!empty($_GET['id'])) {
				if($this->db->query("Select Count(*) as x from Student where StudentID=". $_GET['id'])->result()[0]->x != 0) {
					$StudentQuery = $this->db->query("Select * from Student where StudentID=". $_GET['id'])->result()[0];

					$data['isError'] = false;
					$data['Name'] = json_decode($StudentQuery->Name)->Lastname. ", " .json_decode($StudentQuery->Name)->Firstname. " " .strtoupper(substr(json_decode($StudentQuery->Name)->Middlename, 0, 1));
					$data['CY'] = $StudentQuery->Course. "-" .$StudentQuery->Level;
					$data['Image'] = $StudentQuery->Image;
					$data['Status'] = $StudentQuery->Status;

					echo json_encode($data);
				}
				else echo json_encode(array(
				   	"isError" => true,
				   	"ErrorDisplay" => "Error: Not Found!"
				));
			}
			else echo json_encode(array(
			   	"isError" => true,
			   	"ErrorDisplay" => "Error: Unexpected Error Occur!"
			));
		}
		else echo json_encode(array(
		   	"isError" => true,
		   	"ErrorDisplay" => "Error: Unexpected Error Occur!"
		)); 
	}

	function CreateAssessment_DoneButton() {
		if(isset($_POST['StudentID']) && isset($_POST['TuitionFee'])) {
			if(!empty($_POST['StudentID']) && !empty($_POST['TuitionFee'])) {
				if($this->db->query("Select Count(*) as x from Student where StudentID=". $_POST['StudentID'])->result()[0]->x != 0) {
					if($_SESSION['AccountType'] == "DEPARTMENT") {
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
						$mail->addAddress($AccountQuery);
						// Content
						$mail->isHTML(true);
						$mail->Subject = 'Notification Alert';
						$mail->Body    = 'You got a new Tuition Fee Bills this Semester. We would like to notnice you that your bill is <b>P ' .($AccountQuery->Account_TuitionBalance + $_POST['TuitionFee']). '.</b><br /><br /><br /><br />Respectfully yours,<br />Student E-Wallet Staff';
						// Send
						$mail->send();

						$this->db->update("Account", array(
							"Account_TuitionBalance" => $AccountQuery->Account_TuitionBalance + $_POST['TuitionFee']
						), "StudentID=". $_POST['StudentID']);

						$this->db->insert("Logs", array(
							"AccountID" => $_SESSION['AccountID'],
							"LogActivity" => json_encode(array(
								"Page" => "Assessment",
								"Action" => "Deploying Student Assessment Info"
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
					   	"ErrorDisplay" => "Error: Unexpected Error Occur!"
					));  
				}
				else echo json_encode(array(
				   	"isError" => true,
				   	"ErrorDisplay" => "Error: Not Found!"
				));
			}
			else {
				$ErrorDisplay = "Error: ";

				if(empty($_POST['StudentID'])) $ErrorDisplay .= "(Student ID) ";
				if(empty($_POST['TuitionFee'])) $ErrorDisplay .= "(Tuition Fee) ";

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

	function StoreView_ItemLoad() {
		if($_SESSION['AccountType'] == "STUDENT") {
			$AccountQuery = $this->db->query("Select * from Account where AccountID=". $_SESSION['AccountID'])->result()[0];
			$StudentQuery = $this->db->query("Select * from Student where StudentID=". $AccountQuery->StudentID)->result()[0];

			$data['isError'] = false;
			$data['AccountDeposit'] = $AccountQuery->Account_AvailableBalance;
			$data['AccountTuition'] = $AccountQuery->Account_TuitionBalance;

			echo json_encode($data);
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Error: Unexpected Error Occur!"
		));
	}

	function View_TableLoad() {
		// if(isset($_GET['id']) {
		// 	if(!empty($_GET['id'])) {
		// 		echo '0';
		// 	}
		// 	else echo json_encode(array(
		// 		"isError" => true,
		// 		"ErrorDisplay" => "Error: Unexpected Error Occur!"
		// 	));
		// }
		// else echo json_encode(array(
		// 	"isError" => true,
		// 	"ErrorDisplay" => "Error: Unexpected Error Occur!"
		// ));  
	}

	function SRCreate_DoneButton() {
		if(isset($_POST['Lastname']) && isset($_POST['Firstname']) && isset($_POST['Middlename']) && isset($_POST['Gender']) && isset($_POST['Age']) && isset($_POST['Contact']) && isset($_POST['Status']) && isset($_POST['Course']) && isset($_POST['Level'])  && isset($_POST['ID'])) {
			if(!empty($_POST['Lastname']) && !empty($_POST['Firstname']) && !empty($_POST['Middlename']) && !empty($_POST['Gender']) && !empty($_POST['Age']) && !empty($_POST['Status']) && !empty($_POST['Course']) && !empty($_POST['Level'])  && !empty($_POST['ID'])) {

				if($this->db->query("Select Count(*) as x from Student where StudentID=". $_POST['ID'])->result()[0]->x == 0) {
					$this->db->insert("Student", array(
						"StudentID" => $_POST['ID'],
						"Name" => json_encode(array(
							"Lastname" => $_POST['Lastname'],
							"Firstname" => $_POST['Firstname'],
							"Middlename" => $_POST['Middlename'],
						)),
						"Course" => strtoupper($_POST['Course']),
						"Gender" => $_POST['Gender'],
						"Age" => $_POST['Age'],
						"Level" => $_POST['Level'],
						"ContactNumber" => $_POST['Contact'],
						"Image" => "avatar.png",
						"Status" => $_POST['Status']
					));

					$this->db->insert("Logs", array(
						"AccountID" => $_SESSION['AccountID'],
						"LogActivity" => json_encode(array(
							"Page" => "Account",
							"Action" => "School Registry(Add Student)"
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
					"ErrorDisplay" => "Error: The Student is Already existed!"
				));
			}
			else {
				$ErrorDisplay = "Error: ";

				if(empty($_POST['Lastname'])) $ErrorDisplay .= "(Lastname) ";
				if(empty($_POST['Firstname'])) $ErrorDisplay .= "(Firstname) ";
				if(empty($_POST['Middlename'])) $ErrorDisplay .= "(Middlename) ";
				if(empty($_POST['Gender'])) $ErrorDisplay .= "(Gender) ";
				if(empty($_POST['Age'])) $ErrorDisplay .= "(Age) ";
				if(empty($_POST['Status'])) $ErrorDisplay .= "(Status) ";
				if(empty($_POST['Course'])) $ErrorDisplay .= "(Course) ";
				if(empty($_POST['Level'])) $ErrorDisplay .= "(Level) ";
				if(empty($_POST['ID'])) $ErrorDisplay .= "(Student ID) ";

				echo json_encode(array(
					"isError" => true,
					"ErrorDisplay" => $ErrorDisplay . "is Empty!"
				));  
			}
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Error: Unexpected Error Occur!"
		));  
	}

	function SRView_SearchButton() {
		if(isset($_GET['ID'])) {
			if(!empty($_GET['ID'])) {
				if($this->db->query("Select Count(*) as x from Student where StudentID=". $_GET['ID'])->result()[0]->x != 0) {
					$StudentQuery = $this->db->query("Select * from Student where StudentID=". $_GET['ID'])->result()[0];
					$data["isError"] = false;
					$data["Name"] = json_decode($StudentQuery->Name)->Lastname. ", " .json_decode($StudentQuery->Name)->Firstname. " " .strtoupper(substr(json_decode($StudentQuery->Name)->Middlename, 0, 1)). " (" .json_decode($StudentQuery->Name)->Middlename. ")";
					$data["StudentID"] = $StudentQuery->StudentID;
					$data["Gender"] = $StudentQuery->Gender;
					$data["Age"] = $StudentQuery->Age;
					$data["Contact"] = $StudentQuery->ContactNumber;
					$data["CY"] = $StudentQuery->Course. "-" .$StudentQuery->Level;
					$data["Status"] = $StudentQuery->Status;

					if($this->db->query("Select Count(*) as x from Account where StudentID=". $_GET['ID'])->result()[0]->x != 0) {
						$AccountQuery = $this->db->query("Select * from Account where StudentID=". $_GET['ID'])->result()[0];

						$data["Image"] = $AccountQuery->AccountImage;
						$data["Email"] =  $AccountQuery->AccountEmail;
						$data["Username"] =  $AccountQuery->AccountUsername;
						$data["Deposits"] =  $AccountQuery->Account_AvailableBalance;
						$data["Tuition"] =  $AccountQuery->Account_TuitionBalance;
					}
					else {
						$data["Email"] =  "N / A";
						$data["Username"] =  "N / A";
						$data["Deposits"] =  "N / A";
						$data["Tuition"] =  "N / A";
					}

					echo json_encode($data);
				}
				else echo json_encode(array(
					"isError" => true,
					"ErrorDisplay" => "Error: Invalid Student ID!"
				));
			}
			else echo json_encode(array(
				"isError" => true,
				"ErrorDisplay" => "Error: Unexpected Error Occur!"
			));
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Error: Unexpected Error Occur!"
		)); 
	}

	function SRView_RemoveButton() {
		if(isset($_GET['ID'])) {
			if(!empty($_GET['ID'])) {
				if($this->db->query("Select Count(*) as x from Student where StudentID=". $_GET['ID'])->result()[0]->x != 0) {
					$this->db->query("Delete from Student where StudentID=". $_GET['ID']);

					echo json_encode(array(
						"isError" => false
					));
				}
				else echo json_encode(array(
					"isError" => true,
					"ErrorDisplay" => "Error: Invalid Student ID!"
				));
			}
			else echo json_encode(array(
				"isError" => true,
				"ErrorDisplay" => "Error: Unexpected Error Occur!"
			));
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Error: Unexpected Error Occur!"
		)); 
	}

	function SREdit_SearchButton() {
		if(isset($_GET['ID'])) {
			if(!empty($_GET['ID'])) {
				if($this->db->query("Select Count(*) as x from Student where StudentID=". $_GET['ID'])->result()[0]->x != 0) {
					$data["isError"] = false;

					foreach ($this->db->query("Select * from Student where StudentID=". $_GET['ID'])->result()[0] as $key => $value) $data[$key] = $value;

					echo json_encode($data);
				}
				else echo json_encode(array(
					"isError" => true,
					"ErrorDisplay" => "Error: Invalid Student ID!"
				));
			}
			else echo json_encode(array(
				"isError" => true,
				"ErrorDisplay" => "Error: Unexpected Error Occur!"
			));
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Error: Unexpected Error Occur!"
		));
	}

	function SREdit_DoneButton() {
		if(isset($_POST['Lastname']) && isset($_POST['Firstname']) && isset($_POST['Middlename']) && isset($_POST['Gender']) && isset($_POST['Age']) && isset($_POST['Contact']) && isset($_POST['Status']) && isset($_POST['Course']) && isset($_POST['Level'])  && isset($_POST['ID'])) {
			if(!empty($_POST['Lastname']) && !empty($_POST['Firstname']) && !empty($_POST['Middlename']) && !empty($_POST['Gender']) && !empty($_POST['Age']) && !empty($_POST['Status']) && !empty($_POST['Course']) && !empty($_POST['Level'])  && !empty($_POST['ID'])) {

				if($this->db->query("Select Count(*) as x from Student where StudentID=". $_POST['ID'])->result()[0]->x != 0) {
					$this->db->update("Student", array(
						"Name" => json_encode(array(
							"Lastname" => $_POST['Lastname'],
							"Firstname" => $_POST['Firstname'],
							"Middlename" => $_POST['Middlename']
						)),
						"Course" => $_POST['Course'],
						"Gender" => $_POST['Gender'],
						"Age" => $_POST['Age'],
						"Level" => $_POST['Level'],
						"ContactNumber" => $_POST['Contact'],
						"Status" => $_POST['Status']
					), "StudentID=". $_POST['ID']);

					$this->db->insert("Logs", array(
						"AccountID" => $_SESSION['AccountID'],
						"LogActivity" => json_encode(array(
							"Page" => "Account",
							"Action" => "School Registry(Edit Student)"
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
					"ErrorDisplay" => "Error: Invalid Student ID!"
				));
			}
			else {
				$ErrorDisplay = "Error: ";

				if(empty($_POST['Lastname'])) $ErrorDisplay .= "(Lastname) ";
				if(empty($_POST['Firstname'])) $ErrorDisplay .= "(Firstname) ";
				if(empty($_POST['Middlename'])) $ErrorDisplay .= "(Middlename) ";
				if(empty($_POST['Gender'])) $ErrorDisplay .= "(Gender) ";
				if(empty($_POST['Age'])) $ErrorDisplay .= "(Age) ";
				if(empty($_POST['Status'])) $ErrorDisplay .= "(Status) ";
				if(empty($_POST['Course'])) $ErrorDisplay .= "(Course) ";
				if(empty($_POST['Level'])) $ErrorDisplay .= "(Level) ";
				if(empty($_POST['ID'])) $ErrorDisplay .= "(Student ID) ";

				echo json_encode(array(
					"isError" => true,
					"ErrorDisplay" => $ErrorDisplay . "is Empty!"
				));  
			}
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Error: Unexpected Error Occur!"
		)); 
	}
}

?>