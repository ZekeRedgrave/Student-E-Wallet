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
}

?>