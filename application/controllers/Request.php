<?php 
include APPPATH.'third_party/PHPMailer/src/Exception.php';
include APPPATH.'third_party/PHPMailer/src/PHPMailer.php';
include APPPATH.'third_party/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Request extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->database('default');
		date_default_timezone_set("Asia/Taipei");
	}

	function index() {
		$this->load->view("Request");
	}

	function View_TableLoad() {
		if(isset($_GET['load'])) {
			if(!empty($_GET['load'])) {
				$data['isError'] = false;
				$data['RecordArray'] = [];
				$data["isEmpty"] = false;

				if($this->db->query("Select Count(*) as x from Request where isClaim=false")->result()[0]->x != 0) {
					foreach ($this->db->query("Select * from Request where isClaim=false Order by RequestID DESC LIMIT ". $_GET['load'])->result() as $value) {
						$StudentQuery = $this->db->query("Select * from Student where StudentID=". $value->StudentID)->result()[0];

						array_push($data["RecordArray"], array(
							"RequestID" => $value->RequestID,
							"RequestName" => $value->RequestName,
							"StudentName" => json_decode($StudentQuery->Name)->Lastname. ", " .json_decode($StudentQuery->Name)->Firstname. " " .strtoupper(substr(json_decode($StudentQuery->Name)->Middlename, 0, 1)). ".",
							"StudentID" => $value->StudentID,
							"Status" => (!$value->isProcess ? "Progress" : ($value->isClaim ? "Already Claimed" : "Waiting for Claim")),
							"isProcess" => $value->isProcess,
							"isClaim" => $value->isClaim
						));
					}

					$data["isEmpty"] = false;
				}
				else $data["isEmpty"] = true;

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

	function View_SearchButton() {
		if(isset($_GET['load']) && isset($_GET['search'])) {
			if(!empty($_GET['load']) && !empty($_GET['search'])) {
				$data['isError'] = false;
				$data['RecordArray'] = [];
				$data["isEmpty"] = false;

				if($this->db->query("Select Count(*) as x from Request where isClaim=false and StudentID like '%" .$_GET['search']. "%' or RequestName like '%" .$_GET['search']. "%'")->result()[0]->x != 0) {
					foreach ($this->db->query("Select * from Request where isClaim=false and StudentID like '%" .$_GET['search']. "%' or RequestName like '%" .$_GET['search']. "%' Order by RequestID DESC LIMIT ". $_GET['load'])->result() as $value) {
						$StudentQuery = $this->db->query("Select * from Student where StudentID=". $value->StudentID)->result()[0];

						array_push($data["RecordArray"], array(
							"RequestID" => $value->RequestID,
							"RequestName" => $value->RequestName,
							"StudentName" => json_decode($StudentQuery->Name)->Lastname. ", " .json_decode($StudentQuery->Name)->Firstname. " " .strtoupper(substr(json_decode($StudentQuery->Name)->Middlename, 0, 1)). ".",
							"StudentID" => $value->StudentID,
							"Status" => (!$value->isProcess ? "Progress" : ($value->isClaim ? "Already Claimed" : "Waiting for Claim")),
							"isProcess" => $value->isProcess,
							"isClaim" => $value->isClaim
						));
					}

					$data["isEmpty"] = false;
				}
				else $data["isEmpty"] = true;

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

	function View_ProcessButton() {
		if(isset($_GET['id'])) {
			if(!empty($_GET['id'])) {
				if($this->db->query("Select Count(*) as x from Request where isProcess=false and RequestID=" .$_GET['id'])->result()[0]->x != 0) {
					$RequestQuery = $this->db->query("Select * from Request where RequestID=" .$_GET['id'])->result()[0];
					$AccountQuery = $this->db->query("Select * from Account where StudentID=". $RequestQuery->StudentID)->result()[0];
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
					$mail->addAddress($AccountQuery->AccountEmail,$AccountQuery->AccountUsername);

					// Content
					$mail->isHTML(true);
					$mail->Subject = 'Verification Code';
					$mail->Body    = 'The Process of your Request (' .$RequestQuery->RequestName. ') is Done. Please Claim the Item Today or Later.';
					// Send
					if(!$mail->send())  echo json_encode(array(
					    "isError" => true,
					    "ErrorDisplay" => "The Server cannot send into your Email for Notifications due to Offline Mode or SMTP is broken.\n\nTry Again Later!"
					));
					else {
						$this->db->update("Request", array(
							"isProcess" => true
						), "RequestID=" .$_GET['id']);

						echo json_encode(array(
						   	"isError" => false
						)); 
					}
				}
				else echo json_encode(array(
				   	"isError" => true,
				   	"ErrorDisplay" => "Already Done Process!"
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

	function View_ClaimButton() {
		if(isset($_GET['id'])) {
			if(!empty($_GET['id'])) {
				if($this->db->query("Select Count(*) as x from Request where isProcess=true and RequestID=" .$_GET['id'])->result()[0]->x != 0) {
					$this->db->update("Request", array(
						"isClaim" => true
					), "RequestID=" .$_GET['id']);

					echo json_encode(array(
					   	"isError" => false
					)); 
				}
				else echo json_encode(array(
				   	"isError" => true,
				   	"ErrorDisplay" => "The Request is under Process. Please Click the 'Done Process' if the Process is Done."
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