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

    function Create_NextButton() {
    	if(isset($_POST['RegisterEmail']) && isset($_POST['RegisterUsername']) && isset($_POST['RegisterPassword']) && isset($_POST['RegisterRP']) && isset($_POST['RegisterType'])) {
    		if(!empty($_POST['RegisterEmail']) && !empty($_POST['RegisterUsername']) && !empty($_POST['RegisterPassword']) && !empty($_POST['RegisterRP']) && !empty($_POST['RegisterType'])) {
    			if($_POST['RegisterPassword'] == $_POST['RegisterRP']) {
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
							"RegisterUsername" => $_POST['RegisterUsername'],
							"RegisterEmail" => $_POST['RegisterEmail'],
							"RegisterPassword" => $_POST['RegisterPassword'],
							"RegisterType" => $_POST['RegisterType'],
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
					   	"ErrorDisplay" => "Error: Invalid Code!"
					));
    			}
    			else echo json_encode(array(
				   	"isError" => true,
				   	"ErrorDisplay" => "Error: Password Mismatch!"
				));
    		}
    		else {
    			$ErrorDisplay = "Error: ";

    			if(empty($_POST['RegisterEmail'])) $ErrorDisplay .= "(Email) ";
    			if(empty($_POST['RegisterUsername'])) $ErrorDisplay .= "(Username) ";
    			if(empty($_POST['RegisterPassword'])) $ErrorDisplay .= "(Password) ";
    			if(empty($_POST['RegisterRP'])) $ErrorDisplay .= "(Repeat Password) ";
    			if(empty($_POST['RegisterType'])) $ErrorDisplay .= "(Account Type) ";

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

    function Create_DoneButton() {
    	if(isset($_POST['RegisterCode']) && isset($_POST['RegisterName']) && isset($_POST['RegisterPosition']) && isset($_POST['RegisterDepartment']) && isset($_POST['RegisterAge']) && isset($_POST['RegisterGender']) && isset($_POST['RegisterContact']) && isset($_POST['RegisterEI'])) {
    		if(!empty($_POST['RegisterCode']) &&!empty($_POST['RegisterName']) &&!empty($_POST['RegisterPosition']) &&!empty($_POST['RegisterDepartment']) &&!empty($_POST['RegisterAge']) &&!empty($_POST['RegisterGender']) &&!empty($_POST['RegisterEI'])) {
    			if($this->db->query("Select Count(*) as x from Registration where RegisterCode=" .$_POST['RegisterCode'])->result()[0]->x != 0) {
    				$RegisterQuery = $this->db->query("Select * from Registration where RegisterCode='" .$_POST['RegisterCode']. "'")->result()[0];

    				$this->db->insert("Account", array(
    					"EmployeeID" => $_POST['RegisterEI'],
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

    				if($this->db->query("Select Count(*) as x from Employee where EmployeeID=". $_POST['RegisterEI'])->result()[0]->x == 0) $this->db->insert("Employee", array(
    					"EmployeeID" => $_POST['RegisterEI'],
    					"Name" => $_POST['RegisterName'],
    					"Age" => $_POST['RegisterAge'],
    					"Gender" => $_POST['RegisterGender'],
    					"ContactNumber" => $_POST['RegisterContact'],
    					"Image" => "avatar.png",
    					"Position" => $_POST['RegisterPosition'],
    					"Department" => $_POST['RegisterDepartment']
    				));
    				else $this->db->update("Employee", array(
    					"EmployeeID" => $_POST['RegisterEI'],
    					"Name" => $_POST['RegisterName'],
    					"Age" => $_POST['RegisterAge'],
    					"Gender" => $_POST['RegisterGender'],
    					"ContactNumber" => $_POST['RegisterContact'],
    					"Image" => "avatar.png",
    					"Position" => $_POST['RegisterPosition'],
    					"Department" => $_POST['RegisterDepartment']
    				), "EmployeeID=". $_POST['RegisterEI']);

    				$this->db->update("Registration", array(
    					"RegisterExpire" => 0,
    					"RegisterCode" => 0,
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
    			if(empty($_POST['RegisterName'])) $ErrorDisplay .= "(Lastname) ";
    			if(empty($_POST['RegisterPosition'])) $ErrorDisplay .= "(Firstname) ";
    			if(empty($_POST['RegisterDepartment'])) $ErrorDisplay .= "(Middlename) ";
    			if(empty($_POST['RegisterAge'])) $ErrorDisplay .= "(Position) ";
    			if(empty($_POST['RegisterGender'])) $ErrorDisplay .= "(Department) ";
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
    	if(isset($_POST['RegisterEmail'])) {
    		if(!empty($_POST['RegisterEmail'])) {
    			if($this->db->query("Select Count(*) as x from Registration where RegisterEmail='" .$_POST['RegisterEmail']. "'")->result()[0]->x == 1) {
    				if($this->db->query("Select Count(*) as x from Registration where RegisterEmail='" .$_POST['RegisterEmail']. "' and isDelete=false")->result()[0]->x == 1) {
    					$this->db->query("Delete from Registration where RegisterEmail='" .$_POST['RegisterEmail']. "'");

    					echo json_encode(array(
						   	"isError" => false
						));
	    			}
	    			else echo json_encode(array(
					   	"isError" => true,
					   	"ErrorDisplay" => "Error: This account is already Registered!"
					));
    			}
    			else echo json_encode(array(
				   	"isError" => true,
				   	"ErrorDisplay" => "Error: This account is not Exist Yet!"
				));
    		}
    		else echo json_encode(array(
			   	"isError" => true,
			   	"ErrorDisplay" => "Error: (Email) is Empty!"
			));
    	}
    	else echo json_encode(array(
		   	"isError" => true,
		   	"ErrorDisplay" => "Error: Unexpected Error Occur!"
		));
    }

    function Edit_SendButton() {
    	if(isset($_POST['AccountEmail']) && !empty($_POST['AccountEmail'])) {
    		if($this->db->query("Select Count(*) as x from Account where AccountEmail='" .$_POST['AccountEmail']. "' and AccountType !='STUDENT'")->result()[0]->x != 0) {
    			$Code = rand(0, 999999999);
    			
    			$this->db->update("Registration", array(
    				"RegisterCode" => $Code
    			), "RegisterEmail='" .$_POST['AccountEmail']. "' and RegisterType != 'STUDENT'");

    			$RegisterQuery = $this->db->query("Select * from Registration where RegisterEmail='" .$_POST['AccountEmail']. "' and RegisterType != 'STUDENT'")->result()[0];

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
    				if($this->db->query("Select Count(*) as x from Registration where RegisterEmail='" .$_POST['AccountEmail']. "' and RegisterCode=" .$_POST['RegisterCode']. " and RegisterType != 'STUDENT'")->result()[0]->x != 0) {
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