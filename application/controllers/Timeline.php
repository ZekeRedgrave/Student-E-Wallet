<?php 

class Timeline extends CI_Controller {

	function __construct()
	{
          parent::__construct();
          $this->load->database('default');
    }

    function View_ItemLoad() {
    	if(isset($_GET['TimelineID']) && !empty($_GET['TimelineID'])) {
    		$TimelineQuery = $this->db->query("Select * from Timeline where TimelineID=". $_GET["TimelineID"])->result()[0];
    		$data["isError"] = false;

    		if(json_encode($TimelineQuery) != null) foreach ($TimelineQuery as $key => $value) $data[$key] = $value;
    		else echo json_encode(array(
				"isError" => true,
				"ErrorDisplay" => "Error: 404 Not Found!"
			));

    		echo json_encode($data);
    	}
    	else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Error: 404 Not Found!"
		));
    }

    function View_DeleteButton() {
    	if(isset($_GET['TimelineID']) && !empty($_GET['TimelineID'])) {
    		if($this->db->query("Select * from Timeline where TimelineID=". $_GET["TimelineID"])->result()[0] != null) {
    			$this->db->query("Delete from Timeline where TimelineID =". $_GET['TimelineID']);

    			echo json_encode(array(
					"isError" => false
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

	function Create_UploadButton() {
		if(isset($_FILES['TimelineImage'])) {
			$data["isError"] = false;

        	for ($i = 0; $i < count($_FILES['TimelineImage']['name']); $i++) {
        		if(!empty($_FILES['TimelineImage']['name'][$i])) {

        			$Filename = count(glob("storage/*")). "." .pathinfo(basename($_FILES['TimelineImage']['name'][$i]), PATHINFO_EXTENSION);

        			move_uploaded_file($_FILES['TimelineImage']['tmp_name'][$i], "storage/". $Filename);

        			$data["TimelineImage"][] = $Filename;
        		}
        	}

			echo json_encode($data);
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Error: Upload Failed"
		));
	}

	function Create_SendButton() {
		if(isset($_POST['Package']) && !empty($_POST['Package'])) {
			$Package = json_decode($_POST['Package']);
			$temp = array();

			if($Package->TimelineDescription != "") {
				if(count($Package->TimelineImage) != 0) foreach ($Package->TimelineImage as $value) if($value != "") array_push($temp, $value);

				$this->db->insert("Timeline", array(
					"TimelineID" => "null",
					"UserID" => 15730500,
					"AccountID" => 0,
					"TimelineDescription" => json_encode(array(
						"Text" => $Package->TimelineDescription,
						"Image" => $temp
					)),
					"DateRegister" => date("Y-m-d"),
					"TimeRegister" => date("H:i:s")
				));

				$data["TimelineID"] = $this->db->query("Select TimelineID from Timeline Order by TimelineID DESC LIMIT 1")->result()[0]->TimelineID;
				$data["isError"] = false;

				echo json_encode($data);
			}
			else echo json_encode(array(
				"isError" => true,
				"ErrorDisplay" => "Error: Postbox is Empty!"
			));

		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Error: Invalid!"
		));
	}
}

?>