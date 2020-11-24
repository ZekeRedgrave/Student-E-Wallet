<?php 
class Payment extends CI_Controller {
	function __construct()
	{
          parent::__construct();
          $this->load->database('default');

          session_start();
    }

	function index() {
		echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Testing"
		));
	}

	function View_EditButton() {
		if(isset($_GET['StoreID']) && !empty($_GET['StoreID'])) {
			$data["isError"] = false;

			if($this->db->query("Select * from Store where StoreID=". $_GET['StoreID'])->result()[0] != null) foreach ($this->db->query("Select * from Store where StoreID=". $_GET['StoreID'])->result()[0] as $key => $value) $data[$key] = $value;
			else $data["isError"] = true;

			echo json_encode($data);
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Error: Invalid!"
		));
	}

	function View_RemoveButton() {
		if(isset($_GET['StoreID']) && !empty($_GET['StoreID'])) {
			$data["isError"] = false;

			if($this->db->query("Select Count(*) as x from Store")->result()[0]->x == "0") $data["isEmpty"] = true;
			else $data["isEmpty"] = false;

			$this->db->query("Delete from Store where StoreID =". $_GET['StoreID']);
			$this->db->insert("Logs", array(
				"AccountID" => $_SESSION['AccountID'],
				"LogActivity" => json_encode(array(
					"Page" => "Store",
					"Action" => "Delete Store Item"
				)),
				"TimeRegister" => date("H:i:s"),
				"DateRegister" => date("Y-m-d")
			));

			echo json_encode($data);
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Error: Invalid!"
		));
	}

	function Create_DoneButton() {
		if(isset($_POST['Package']) && !empty($_POST['Package'])){
			try {
				$Package = json_decode($_POST['Package']);

				if($Package->isOther) { 
					$this->db->insert("Store", array(
						"AccountID" => $_SESSION['AccountID'],
						"StoreTitle" => $Package->Titlebox,
						"StoreType" => $Package->Otherbox, 
						"isOthers" => $Package->isOther,
						"isPhysical" => $Package->isPhysical,
						"StorePrice" => $Package->Price,
						"StoreIcon" => $Package->Icon,
						"TimeRegister" => date("Y-m-d"),
						"DateRegister" => date("H:i:s")
					));
				}
				else {
					$this->db->insert("Store", array(
						"AccountID" => $_SESSION['AccountID'],
						"StoreTitle" => $Package->Titlebox,
						"StoreType" => $Package->SlipType->Text, 
						"isOthers" => $Package->isOther,
						"isPhysical" => $Package->isPhysical,
						"StorePrice" => $Package->Price,
						"StoreIcon" => $Package->Icon,
						"TimeRegister" => date("Y-m-d"),
						"DateRegister" => date("H:i:s")
					));
				}

				$data["isError"] = false;

				foreach ($this->db->query("Select * from Store Order by StoreID DESC LIMIT 1")->result()[0] as $key => $value) $data[$key] = $value;

				$this->db->insert("Logs", array(
					"AccountID" => $_SESSION['AccountID'],
					"LogActivity" => json_encode(array(
						"Page" => "Store",
						"Action" => "Write Store Item"
					)),
					"TimeRegister" => date("H:i:s"),
					"DateRegister" => date("Y-m-d")
				));

				echo json_encode($data);

			} catch (Exception $e) {
				echo json_encode(array(
					"isError" => true,
					"ErrorDisplay" => "Error: Invalid!"
				));
			}
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Error: Invalid!"
		));
	}

	function Edit_DoneButton() {
		if(isset($_POST['Package']) && isset($_GET['StoreID']) && !empty($_POST['Package']) && !empty($_GET['StoreID'])) {
			try {
				$Package = json_decode($_POST['Package']);

				if($Package->isOther) {
					$this->db->update("Store", array(
						"AccountID" => $_SESSION['AccountID'],
						"StoreTitle" => $Package->Titlebox,
						"StoreType" => $Package->Otherbox,
						"isOthers" => $Package->isOther,
						"isPhysical" => $Package->isPhysical,
						"StorePrice" => $Package->Price,
						"StoreIcon" => $Package->Icon,
						"TimeRegister" => date("Y-m-d"),
						"DateRegister" => date("H:i:s")
					), "StoreID = ". $_GET['StoreID']);
				}
				else {
					$this->db->update("Store", array(
						"AccountID" => $_SESSION['AccountID'],
						"StoreTitle" => $Package->Titlebox,
						"StoreType" => $Package->SlipType->Text,
						"isOthers" => $Package->isOther,
						"isPhysical" => $Package->isPhysical,
						"StorePrice" => $Package->Price,
						"StoreIcon" => $Package->Icon,
						"TimeRegister" => date("Y-m-d"),
						"DateRegister" => date("H:i:s")
					), "StoreID = ". $_GET['StoreID']);
				}

				$data["isError"] = false;

				foreach ($this->db->query("Select * from Store where StoreID=". $_GET['StoreID'])->result()[0] as $key => $value) $data[$key] = $value;

				$this->db->insert("Logs", array(
					"AccountID" => $_SESSION['AccountID'],
					"LogActivity" => json_encode(array(
						"Page" => "Store",
						"Action" => "Edit Store Item"
					)),
					"TimeRegister" => date("H:i:s"),
					"DateRegister" => date("Y-m-d")
				));

				echo json_encode($data);

			} catch (Exception $e) {
				echo json_encode(array(
					"isError" => true,
					"ErrorDisplay" => "Error: Invalid!"
				));
			}
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Error: Invalid!"
		));
	}
}

?>