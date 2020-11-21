<?php 

include APPPATH.'third_party/PHPMailer/src/Exception.php';
include APPPATH.'third_party/PHPMailer/src/PHPMailer.php';
include APPPATH.'third_party/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class RegisterStudent extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->database('default');
    }

    function Create_NextButton() {
    	if(isset($_POST['RegisterUsername']) && isset($_POST['RegisterEmail']) && isset($_POST['RegisterPassword'])  && isset($_POST['RegisterRP'])  && isset($_POST['RegisterSI']) && !empty($_POST['RegisterUsername']) && !empty($_POST['RegisterEmail']) && !empty($_POST['RegisterPassword']) && !empty($_POST['RegisterRP']) && !empty($_POST['RegisterSI'])) {
    		$Code = rand(0, 999999999);

  			if($this->db->query("Select Count(*) as x from Student where StudentID=". $_POST['RegisterSI'])->result()[0]->x != 0) {

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

				if($this->db->query("Select Count(*) as x from Registration")->result()[0]->x != 0) {
			    	if($this->db->query("Select Count(*) as x from Registration where RegisterSI=". $_POST['RegisterSI'])->result()[0]->x == 0) {
				    	if($_POST['RegisterPassword'] == $_POST['RegisterRP']) {
							$this->db->insert("Registration", array(
					    		"RegisterID" => null,
					    		"RegisterUsername" => $_POST['RegisterUsername'],
					    		"RegisterEmail" => $_POST['RegisterEmail'],
					    		"RegisterPassword" => $_POST['RegisterPassword'],
					    		"RegisterSI" => $_POST['RegisterSI'],
					    		"RegisterCode" => $Code,
					    		"RegisterType" => "STUDENT",
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
					    	"ErrorDisplay" => "Error: Password Mismatched!"
					    ));
				    }
				    else echo json_encode(array(
					   	"isError" => true,
					   	"ErrorDisplay" => "Error: Student ID is already Registered!"
					));
			    }
			    else {
			    	if($_POST['RegisterPassword'] == $_POST['RegisterRP']) {
					   	$this->db->insert("Registration", array(
					    	"RegisterID" => null,
					    	"RegisterUsername" => $_POST['RegisterUsername'],
					    	"RegisterEmail" => $_POST['RegisterEmail'],
					    	"RegisterPassword" => $_POST['RegisterPassword'],
					    	"RegisterSI" => $_POST['RegisterSI'],
					    	"RegisterCode" => $Code,
					    	"RegisterType" => "STUDENT",
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
					    "ErrorDisplay" => "Error: Password Mismatched!"
					));
			    }
  			}
  			else echo json_encode(array(
				"isError" => true,
				"ErrorDisplay" => "Error: Student ID Invalid!"
			));
    	}
    	else echo json_encode(array(
    		"isError" => true,
    		"ErrorDisplay" => "Error: Either of these 5 are empty!"
    	));
    }

    function Create_BackButton() {
    	if(isset($_GET['RegisterSI']) && !empty($_GET['RegisterSI'])) {
    		if(json_encode($this->db->query("Select * from Registration where RegisterSI=". $_GET['RegisterSI'])->result()[0]) != 'null') {
    			$this->db->query("Delete from Registration where RegisterSI=". $_GET['RegisterSI']);

    			 echo json_encode(array(
		    		"isError" => false
		    	));
    		}
    	}
    	else echo json_encode(array(
    		"isError" => true,
    		"ErrorDisplay" => "Error: Unexpected Error Occurs!"
    	));
    }

    function Create_ResendButton() {
    	if(isset($_GET['Resend']) && isset($_POST['RegisterUsername'])  && isset($_POST['RegisterEmail']) && isset($_POST['RegisterSI']) && !empty($_GET['Resend']) && !empty($_POST['RegisterSI']) && !empty($_POST['RegisterUsername']) && !empty($_POST['RegisterEmail'])) {
    		$RegisterQuery = $this->db->query("Select * from Register where RegisterSI=". $_POST['RegisterSI'])->result()[0];

    		if(json_encode($RegisterQuery) != null) {
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
			    $mail->Body    = 'Verification Code is <b>'. $RegisterQuery->RegisterCode .'</b>';
			    // Send
			    $mail->send();

			    echo json_encode(array(
				   	"isError" => false
				));
    		}
    		else echo json_encode(array(
	    		"isError" => true,
	    		"ErrorDisplay" => "Error: Unexpected Error Occurs!"
	    	));
    	}
    	else  echo json_encode(array(
    		"isError" => true,
    		"ErrorDisplay" => "Error: Unexpected Error Occurs!"
    	));
    }

    function Create_DoneButton() {
    	if(isset($_POST['RegisterCode']) && isset($_POST['RegisterSI']) && !empty($_POST['RegisterCode']) && !empty($_POST['RegisterSI'])) {
    		if(json_encode($this->db->query("Select * from Registration where RegisterSI=". $_POST['RegisterSI'] ." and RegisterCode=". $_POST['RegisterCode'])->result()[0]) != 'null') {
    			$this->db->update("Registration", array(
    				"isApprove" => true
    			), "RegisterSI=". $_POST['RegisterSI']);

    			echo json_encode(array(
				   	"isError" => false
				));
    		}
    		else echo json_encode(array(
	    		"isError" => true,
	    		"ErrorDisplay" => "Error: Verification is Invalid!"
	    	));
    	}
    	else echo json_encode(array(
    		"isError" => true,
    		"ErrorDisplay" => "Error: Verification Codebox is Empty!"
    	)); 
    }

    function Edit_SendButton() {
    	if(isset($_POST['AccountEmail']) && !empty($_POST['AccountEmail'])) {
    		if($this->db->query("Select Count(*) as x from Account where AccountEmail='" .$_POST['AccountEmail']. "' and AccountType='STUDENT'")->result()[0]->x != 0) {
    			$Code = rand(0, 999999999);
    			
    			$this->db->update("Registration", array(
    				"RegisterCode" => $Code
    			), "RegisterEmail='" .$_POST['AccountEmail']. "' and RegisterType='STUDENT'");

    			$RegisterQuery = $this->db->query("Select * from Registration where RegisterEmail='" .$_POST['AccountEmail']. "' and RegisterType='STUDENT'")->result()[0];

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
			    $mail->addAddress($_POST['AccountEmail']);

			    // Content
			    $mail->isHTML(true);
			    $mail->Subject = 'Verification Code';
			    $mail->Body    = 'Verification Code is <b>'. $RegisterQuery->RegisterCode .'</b>';
			    // Send
			    $mail->send();

			    echo json_encode(array(
				   	"isError" => false
				));
    		}
    		else echo json_encode(array(
	    		"isError" => true,
	    		"ErrorDisplay" => "Error: Email is not Existed!"
	    	)); 
    	}
    	else echo json_encode(array(
    		"isError" => true,
    		"ErrorDisplay" => "Error: Emailbox is Empty!"
    	)); 
    }

    function Edit_DoneButton() {
    	if(isset($_POST['AccountEmail']) && isset($_POST['AccountPassword']) && isset($_POST['AccountRP']) && isset($_POST['RegisterCode'])) {
    		if(!empty($_POST['AccountEmail']) && !empty($_POST['AccountPassword']) && !empty($_POST['AccountRP']) && !empty($_POST['RegisterCode'])) {
    			if($_POST['AccountPassword'] == $_POST['AccountRP']) {
    				if($this->db->query("Select Count(*) as x from Registration where RegisterEmail='" .$_POST['AccountEmail']. "' and RegisterCode=" .$_POST['RegisterCode']. " and RegisterType='STUDENT'")->result()[0]->x != 0) {
	    				$this->db->update("Account", array(
	    					"AccountPassword" => $_POST['AccountPassword']
	    				), "AccountEmail='" .$_POST['AccountEmail']. "'");

	    				echo json_encode(array(
						   	"isError" => false
						));
	    			}
	    			else echo json_encode(array(
			    		"isError" => true,
			    		"ErrorDisplay" => "Error: Incorrect Verification Code!"
			    	));
    			}
    			else echo json_encode(array(
			    	"isError" => true,
			    	"ErrorDisplay" => "Error: Password Mismatch!"
			    ));
    		}
    		else {
    			$ErrorDisplay = "";

    			if(empty($_POST['AccountEmail'])) $ErrorDisplay .= "(Email) ";
    			if(empty($_POST['AccountPassword'])) $ErrorDisplay .= "(Password) ";
    			if(empty($_POST['AccountRP'])) $ErrorDisplay .= "(Repeat Password) ";
    			if(empty($_POST['RegisterCode'])) $ErrorDisplay .= "(Code) ";

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
}

?>