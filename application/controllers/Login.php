<?php 

class Login extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->database('default');

        session_start();
        date_default_timezone_set("Asia/Taipei");
    }

    function View_DoneButton() {
    	if(isset($_POST['AccountUsername']) && isset($_POST['AccountPassword'])) {
    		$x = include APPPATH.'third_party/AdminConfig.php';

    		if($this->db->query("Select Count(*) as x from Account where AccountEmail='". $_POST['AccountUsername'] ."' and AccountType='STUDENT'")->result()[0]->x != 0) {
    			if($this->db->query("Select Count(*) as x from Account where AccountEmail='". $_POST['AccountUsername'] ."' and AccountPassword='". $_POST['AccountPassword'] ."' and AccountType='STUDENT'")->result()[0]->x != 0) {
	    			$AccountQuery = $this->db->query("Select * from Account where AccountEmail='". $_POST['AccountUsername'] ."' and AccountPassword='". $_POST['AccountPassword'] ."' and AccountType='STUDENT'")->result()[0];
	    			$_SESSION['AccountID'] = $AccountQuery->AccountID;
		    		$_SESSION['AccountType'] = $AccountQuery->AccountType;

		    		$this->db->insert("Logs", array(
						"AccountID" => $_SESSION['AccountID'],
						"LogActivity" => json_encode(array(
							"Page" => "Login",
							"Action" => "Session In"
						)),
						"TimeRegister" => date("H:i:s"),
						"DateRegister" => date("Y-m-d")
					));

		    		echo json_encode(array(
				   		"isError" => false,
				   		"QueryParag" => "Load=views&Name=app"
				   	));
		    	}
		    	else echo json_encode(array(
			    	"isError" => true,
			    	"ErrorDisplay" => "Error: Password Mismatch!"
			    ));
    		}
    		else {
    			if($_POST['AccountUsername'] == $x["Username"]) {
	    			if($_POST['AccountUsername'] == $x["Username"] && $_POST['AccountPassword'] == $x["Password"]) {
	    				$_SESSION['AccountID'] = $x["Username"];
		    			$_SESSION['AccountType'] = "ADMIN";

		    			$this->db->insert("Logs", array(
							"AccountID" => $_SESSION['AccountID'],
							"LogActivity" => json_encode(array(
								"Page" => "Login",
								"Action" => "Session In"
							)),
							"TimeRegister" => date("H:i:s"),
							"DateRegister" => date("Y-m-d")
						));

		    			echo json_encode(array(
				    		"isError" => false,
				    		"QueryParag" => "Load=views&Name=admin"
				    	));
	    			}
	    			else echo json_encode(array(
				   		"isError" => true,
				   		"ErrorDisplay" => "Error: Password Mismatch!"
				   	));
	    		}
	    		else {
	    			if($this->db->query("Select Count(*) as x from Account where AccountEmail='" .$_POST['AccountUsername']. "'")->result()[0]->x != 0) {
	    				if($this->db->query("Select Count(*) as x from Account where AccountEmail='" .$_POST['AccountUsername']. "' and AccountPassword='" . $_POST['AccountPassword']. "'")->result()[0]->x != 0) {
	    					$AccountQuery = $this->db->query("Select * from Account where AccountEmail='" .$_POST['AccountUsername']. "' and AccountPassword='" . $_POST['AccountPassword']. "'")->result()[0];

	    					$_SESSION['AccountID'] = $AccountQuery->AccountID;
		    				$_SESSION['AccountType'] = $AccountQuery->AccountType;

		    				$this->db->insert("Logs", array(
								"AccountID" => $_SESSION['AccountID'],
								"LogActivity" => json_encode(array(
									"Page" => "Login",
									"Action" => "Session In"
								)),
								"TimeRegister" => date("H:i:s"),
								"DateRegister" => date("Y-m-d")
							));

		    				echo json_encode(array(
					    		"isError" => false,
					    		"QueryParag" => "Load=views&Name=app"
					    	));
	    				}
	    				else echo json_encode(array(
					   		"isError" => true,
					   		"ErrorDisplay" => "Error: Password Mismatch!"
					   	));
	    			}
	    			else echo json_encode(array(
				    	"isError" => true,
				    	"ErrorDisplay" => "Error: Email Incorrect!"
				    ));
	    		}
    		}
    	}
    	else echo json_encode(array(
    		"isError" => true,
    		"ErrorDisplay" => "Error: Unexpected Error Occur!"
    	));
    }
}

?>