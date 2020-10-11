<?php 
include APPPATH.'third_party/PHPMailer/src/Exception.php';
include APPPATH.'third_party/PHPMailer/src/PHPMailer.php';
include APPPATH.'third_party/PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class RegisterAdmin extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->database('default');

        session_start();
    }

    function View_LogoutButton() {
    	$_SESSION['AccountID'] = "";
    	$_SESSION['AccountType'] = "";

    	echo json_encode(array(
    		"isError" => false,
    		"QueryParag" => "Load=views&Name=entrance"
    	));
    }

    function Create_SendButton() {
    	if(isset($_POST['RegisterEmail']) && !empty($_POST['RegisterEmail'])) {
    		if($this->db->query("Select Count(*) as x from Registration where RegisterEmail='" .$_POST['RegisterEmail']. "'")->result()[0]->x == 0) {
    			$Code = rand(0, 999999999);

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
				$mail->addAddress($_POST['RegisterEmail']);

				// Content
				$mail->isHTML(true);
				$mail->Subject = 'Verification Code';
				$mail->Body    = 'Verification Code is <b>'. $Code .'</b>';
				// Send
				$mail->send();

				$this->db->insert("Registration", array(
					"RegisterID" => null,
					"RegisterEmail" => $_POST['RegisterEmail'],
					"RegisterCode" => $Code,
					"RegisterExpire" => time() + (30 * 24 * 60 * 60),
					"isApprove" => false,
					"isDelete" => false,
					"TimeRegister" => date("H:i:s"),
					"DateRegister" => date("Y-m-d")
				));

				 echo json_encode(array(
				   	"isError" => false
				));
    		}
    		else echo json_encode(array(
			   	"isError" => true,
			   	"ErrorDisplay" => "Error: This Account has been already Registered!"
			));
    	}
    	else echo json_encode(array(
		   	"isError" => true,
		   	"ErrorDisplay" => "Error: Unexpected Error Occur!"
		));
    }

    function Create_ResendButton1() {
    	if(isset($_POST['RegisterEmail']) && !empty($_POST['RegisterEmail'])) {
    		if($this->db->query("Select Count(*) as x from Registration where RegisterEmail='" .$_POST['RegisterEmail']. "'")->result()[0]->x != 0) {
    			$RegisterQuery = $this->db->query("Select * from Registration where RegisterEmail='" .$_POST['RegisterEmail']. "'")->result()[0];

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
				$mail->addAddress($_POST['RegisterEmail']);

				// Content
				$mail->isHTML(true);
				$mail->Subject = 'Verification Code';
				$mail->Body    = 'Verification Code is <b>'. $RegisterQuery->RegisterCode .'</b>';
				// Send
				$mail->send();

				echo json_encode(array(
				   	"isError" => false,
				   	"SuccessDisplay" => "Check your Email Account name zekeredgrave@gmail.com and if the Verification Code is already send to your Inbox."
				));
    		}
    		else echo json_encode(array(
			   	"isError" => true,
			   	"ErrorDisplay" => "Error: Invalid Email!"
			));
    	}
    	else echo json_encode(array(
		   	"isError" => true,
		   	"ErrorDisplay" => "Error: Unexpected Error Occur!"
		));
    }

    function Create_NextButton1() {
    	if(isset($_POST['RegisterEmail']) && isset($_POST['RegisterCode']) && isset($_POST['RegisterType']) && !empty($_POST['RegisterType'])) {
    		if(!empty($_POST['RegisterEmail']) && !empty($_POST['RegisterCode'])) {
    			if($this->db->query("Select Count(*) as x from Registration where RegisterEmail='" .$_POST['RegisterEmail']. "' and RegisterCode=". $_POST['RegisterCode'])->result()[0]->x != 0) {
    				$this->db->update("Registration", array(
    					"RegisterType" => $_POST['RegisterType']
    				), "RegisterEmail='" .$_POST['RegisterEmail']. "' and RegisterCode=". $_POST['RegisterCode']);

					echo json_encode(array(
					   	"isError" => false
					));
    			}
    			else echo json_encode(array(
				   	"isError" => true,
				   	"ErrorDisplay" => "Error: Invalid Code!"
				));
    		}
    		else {
    			$ErrorDisplay = "Error: ";

    			if(empty($_POST['RegisterEmail'])) $ErrorDisplay .= "(Email) ";
    			if(empty($_POST['RegisterCode'])) $ErrorDisplay .= "(Verification Code) ";

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

    function Create_NextButton2() {
    	if(isset($_POST['RegisterUsername']) && isset($_POST['RegisterEmail']) && isset($_POST['RegisterPassword']) && isset($_POST['RegisterRP']) && isset($_POST['RegisterEI'])) {
    		if(!empty($_POST['RegisterUsername']) && !empty($_POST['RegisterEmail']) && !empty($_POST['RegisterPassword']) && !empty($_POST['RegisterRP']) && !empty($_POST['RegisterEI'])) {
    			if($_POST['RegisterPassword'] == $_POST['RegisterRP']) {
    				if($this->db->query("Select Count(*) as x from Employee where EmployeeID=". $_POST['RegisterEI'])->result()[0]->x != 0) {
    					$Code = rand(0, 999999999);

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
						$mail->addAddress($_POST['RegisterEmail'], $_POST['RegisterUsername']);

						// Content
						$mail->isHTML(true);
						$mail->Subject = 'Verification Code';
						$mail->Body    = 'Verification Code is <b>'. $Code .'</b>';
						// Send
						$mail->send();

						$this->db->update("Registration", array(
	    					"RegisterUsername" => $_POST['RegisterUsername'],
	    					"RegisterPassword" => $_POST['RegisterPassword'],
	    					"RegisterCode" => $Code,
	    					"RegisterSI" => $_POST['RegisterEI']
	    				), "RegisterEmail='" .$_POST['RegisterEmail']. "'");

	    				echo json_encode(array(
						   	"isError" => false
						));
    				}
    				else echo json_encode(array(
					   	"isError" => true,
					   	"ErrorDisplay" => "Error: Employee ID Incorrect!"
					)); 
    			}
    			else echo json_encode(array(
				   	"isError" => true,
				   	"ErrorDisplay" => "Error: Password Mismatch!"
				)); 
    		}
    		else {
    			$ErrorDisplay = "Error: ";

    			if(empty($_POST['RegisterUsername'])) $ErrorDisplay .= "(Username) ";
    			if(empty($_POST['RegisterEmail'])) $ErrorDisplay .= "(Email) ";
    			if(empty($_POST['RegisterPassword'])) $ErrorDisplay .= "(Password) ";
    			if(empty($_POST['RegisterRP'])) $ErrorDisplay .= "(Repeat Password) ";
    			if(empty($_POST['RegisterEI'])) $ErrorDisplay .= "(Employee ID) ";

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

    function Create_BackButton() {

    }

    function Create_DoneButton() {
    	if(isset($_POST['RegisterCode']) && isset($_POST['RegisterEI'])) {
    		if(!empty($_POST['RegisterCode']) &&!empty($_POST['RegisterEI'])) {
    			if($this->db->query("Select Count(*) as x from Registration where RegisterCode=" .$_POST['RegisterCode']. " and RegisterSI=" .$_POST['RegisterEI'])->result()[0]->x != 0) {
    				$EmployeeQuery = $this->db->query("Select * from Employee where EmployeeID=". $_POST['RegisterEI'])->result()[0];
    				$RegisterQuery = $this->db->query("Select * from Registration where RegisterCode='" .$_POST['RegisterCode']. "' and RegisterCode=". $_POST['RegisterCode'])->result()[0];

    				$this->db->insert("Account", array(
    					"StudentID" => 0,
    					"EmployeeID" => $EmployeeQuery->EmployeeID,
    					"AccountUsername" => $RegisterQuery->RegisterUsername,
    					"AccountEmail" => $RegisterQuery->RegisterEmail,
    					"AccountPassword" => $RegisterQuery->RegisterPassword,
    					"AccountType" => $RegisterQuery->RegisterType,
    					"Account_AvailableBalance" => 0.0,
    					"Account_TuitionBalance" => 0.0,
    					"AccountImage" => "avatar.png",
    					"TimeRegister" => date("H:i:s"),
    					"DateRegister" => date("Y-m-d")
    				));
    				$this->db->update("Registration", array(
    					"RegisterExpire" => 0,
    					"isApprove" => true,
    					"isDelete" => true
    				), "RegisterCode='" .$_POST['RegisterCode']. "' and RegisterCode=". $_POST['RegisterCode']);

					echo json_encode(array(
					   	"isError" => false
					));
    			}
    			else echo json_encode(array(
				   	"isError" => true,
				   	"ErrorDisplay" => "Error: Invalid Code!"
				));
    		}
    		else {
    			$ErrorDisplay = "Error: ";

    			if(empty($_POST['RegisterCode'])) $ErrorDisplay .= "(Verification Code) ";
    			if(empty($_POST['RegisterEI'])) $ErrorDisplay .= "(Employee ID) ";

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

    function Create_ResendButton2() {
    	Create_ResendButton1();
    }
}

?>