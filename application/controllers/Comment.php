<?php 

class Comment extends CI_Controller {

	function __construct()
	{
          parent::__construct();
          $this->load->database('default');

          session_start();
          date_default_timezone_set("Asia/Taipei");
    }

    function Create_SendButton() {
    	if(isset($_GET['TimelineID']) && !empty($_GET['TimelineID'])) {
    		if(isset($_POST['CommentDescription']) && !empty($_POST['CommentDescription'])) {
    			$CommentQuery = $this->db->query("Select Count(*) as x from Comment")->result()[0];

    			if($CommentQuery->x != 0) {
    				$this->db->insert("comment", array(
		    			"CommentID" => null,
		    			"TimelineID" => $_GET['TimelineID'],
		    			"AccountID" => $_SESSION["AccountID"],
		    			"CommentDescription" => json_encode(array(
		    				"Text" => $_POST['CommentDescription'],
		    				"Image"=> []
		    			)),
		    			"isMention" => false,
		    			"DateRegister" => date("Y-m-d"),
		    			"TimeRegister" => date("H:i:s")
		    		));

		    		$CommentQuery = $this->db->query("Select * from Comment Order by CommentID DESC LIMIT 1")->result()[0];

		    		$data['isError'] = false;
		    		$data['isNew'] = false;
		    		$data["CommentID"] = $CommentQuery->CommentID;
    			}
    			else {
    				$this->db->insert("comment", array(
		    			"CommentID" => null,
		    			"TimelineID" => $_GET['TimelineID'],
		    			"AccountID" => $_SESSION["AccountID"],
		    			"CommentDescription" => json_encode(array(
		    				"Text" => $_POST['CommentDescription'],
		    				"Image"=> []
		    			)),
		    			"isMention" => false,
		    			"DateRegister" => date("Y-m-d"),
		    			"TimeRegister" => date("H:i:s")
		    		));

		    		$CommentQuery = $this->db->query("Select * from Comment Order by CommentID DESC LIMIT 1")->result()[0];

		    		$data['isError'] = false;
		    		$data['isNew'] = true;
		    		$data['CommentID'] = $CommentQuery->CommentID;
    			}

                $this->db->insert("Logs", array(
                    "AccountID" => $_SESSION['AccountID'],
                    "LogActivity" => json_encode(array(
                        "Page" => "Timeline",
                        "Action" => "Write Comment"
                    )),
                    "TimeRegister" => date("H:i:s"),
                    "DateRegister" => date("Y-m-d")
                ));

    			echo json_encode($data);
    		}
    		else echo json_encode(array(
	    		"isError" => true,
	    		"ErrorDisplay" => "Error: Commentbox is Empty!"
	    	));
    	}
    	else echo json_encode(array(
    		"isError" => true,
    		"ErrorDisplay" => "Error: 404 Not Found!"
    	));	
    }

    function View_ItemLoad() {
    	if(isset($_GET['CommentID']) && !empty($_GET['CommentID'])) {
    		$CommentQuery = $this->db->query("Select * from Comment where CommentID=". $_GET['CommentID'])->result()[0];

    		if(json_encode($CommentQuery) != null) {
    			$AccountQuery = $this->db->query("Select * from Account where AccountID=". $CommentQuery->AccountID)->result()[0];

    			$data['isError'] = false;
    			$data['CommentID'] = $CommentQuery->CommentID;
    			$data['CommentName'] = "[". $AccountQuery->AccountType ."]";
    			$data['CommetImage'] = $AccountQuery->AccountImage;
    			$data['CommentText'] = json_decode($CommentQuery->CommentDescription)->Text;
    			$data['CommentMention'] = $AccountQuery->AccountUsername. "@". $AccountQuery->AccountID ."#". ($AccountQuery->StudentID != 0 ? $AccountQuery->StudentID : $AccountQuery->EmployeeID) ." "; 

    			echo json_encode($data);
    		}
    		else echo json_encode(array(
	    		"isError" => true,
	    		"ErrorDisplay" => "Error: 404 Not Found!"
	    	));	
    	}
    	else echo json_encode(array(
    		"isError" => true,
    		"ErrorDisplay" => "Error: 404 Not Found!"
    	));	
    }

    function View_DeleteButton() {
    	if(isset($_GET['CommentID']) && !empty($_GET['CommentID'])) {
    		if($this->db->query("Select Count(*) as x from Comment where CommentID=". $_GET['CommentID'] ." and AccountID=".$_SESSION['AccountID'])->result()[0]->x != 0 || ($this->db->query("Select Count(*) as x from Comment where CommentID=". $_GET['CommentID'])->result()[0]->x != 0 && $_SESSION['AccountType'] != "STUDENT" ? true : false) != false) {
    			$this->db->query("Delete from Comment where CommentID=". $_GET['CommentID']);

                $this->db->insert("Logs", array(
                    "AccountID" => $_SESSION['AccountID'],
                    "LogActivity" => json_encode(array(
                        "Page" => "Timeline",
                        "Action" => "Delete Comment"
                    )),
                    "TimeRegister" => date("H:i:s"),
                    "DateRegister" => date("Y-m-d")
                ));

    			echo json_encode(array(
		    		"isError" => false,
		    		"CommentID" => $_GET['CommentID']
		    	));
    		}
    		else echo json_encode(array(
	    		"isError" => true,
	    		"ErrorDisplay" => "Error: 404 Not Found!"
	    	));
    	}
    	else echo json_encode(array(
    		"isError" => true,
    		"ErrorDisplay" => "Error: 404 Not Found!"
    	));
    }
}

?>