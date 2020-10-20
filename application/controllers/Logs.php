<?php 

class Logs extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->database('default');

        session_start();
    }

    function View_LogLoader() {
    	if($this->db->query("Select Count(*) as x from Logs")->result()[0]->x != 0) {
    		$data["isError"] = false;
    		$data["isEmpty"] = false;
    		$data["LogArray"] = [];

    		foreach ($this->db->query("Select * from Logs Order by LogID DESC LIMIT 25")->result() as $value) array_push($data["LogArray"], $value->LogID);

    		echo json_encode($data);
    	}
    	else echo json_encode(array(
		   	"isError" => false,
		   	"isEmpty" => true
		));
    }

    function View_LogLoad() {
    	if(isset($_GET['LogID']) && !empty($_GET['LogID'])) {
    		if($this->db->query("Select Count(*) as x from Logs where LogID=". $_GET['LogID'])->result()[0]->x != 0) {
    			$LogQuery = $this->db->query("Select * from Logs where LogID=". $_GET['LogID'])->result()[0];
    			$AccountQuery = $this->db->query("Select * from Account where AccountID=". $LogQuery->AccountID)->result()[0];

    			$Activity = json_decode($LogQuery->LogActivity);

    			$data["LogImage"] = $AccountQuery->AccountImage;
    			$data["LogType"] = $AccountQuery->AccountType;
    			$data["LogActivity"] = $Activity->Page. " - " .$Activity->Action;
    			$data["LogDT"] = $LogQuery->DateRegister. " " .$LogQuery->TimeRegister;

    			if($AccountQuery->StudentID != 0) {
    				$StudentQuery = json_decode($this->db->query("Select * from Student where StudentID=". $AccountQuery->StudentID)->result()[0]->Name);

    				$data["LogName"] = $StudentQuery->Lastname. ", " .$StudentQuery->Firstname. " " . substr($StudentQuery->Middlename, 0, 1). ".";
    			}
    			else {
    				$EmployeeQuery = json_decode($this->db->query("Select * from Employee where EmployeeID=". $AccountQuery->EmployeeID)->result()[0]->Name);

    				$data["LogName"] = $EmployeeQuery->Lastname. ", " .$EmployeeQuery->Firstname. " " . substr($EmployeeQuery->Middlename, 0, 1). ".";
    			}

    			$data["isError"] = false;

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

    function getLogData() {
        
    }
}

?>