<?php 
class Payment extends CI_Controller {
	function __construct()
	{
          parent::__construct();
          $this->load->database('default');

          session_start();
          date_default_timezone_set("Asia/Taipei");
    }

	function index() {
		echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Testing"
		));
	}

	function View_ItemLoader() {
		$data["isError"] = false;
		$data["PaymentArray"] = [];
		$data["Payment_TypeArray"] = [];

		if($this->db->query("Select Count(*) as x from Store")->result()[0]->x == 0) $data["isEmpty"] = true;
		else {
			foreach ($this->db->query("Select * from Store Order by StoreID DESC")->result() as $value) {
				array_push($data["PaymentArray"], array(
					"StoreID" => $value->StoreID,
					"StoreTitle" => $value->StoreTitle,
					"StoreType" => $value->StoreType,
					"isOthers" => $value->isOthers,
					"isPhysical" => $value->isPhysical,
					"StorePrice" => $value->StorePrice,
					"StoreIcon" => $value->StoreIcon
				));
			}

			$data["isEmpty"] = false;
		}

		foreach ($this->db->query("Select * from StoreType")->result() as $value) array_push($data["Payment_TypeArray"], array(
			"StoreType_ID" => $value->StoreType_ID,
			"StoreType_Name" => $value->StoreType_Name
		));

		echo json_encode($data);
	}

	function View_EditButton() {
		if(isset($_GET['StoreID']) && !empty($_GET['StoreID'])) {
			$data["isError"] = false;

			if($this->db->query("Select Count(*) as x from Store where StoreID=". $_GET['StoreID'])->result()[0]->x != 0) {
				$StoreQuery = $this->db->query("Select * from Store where StoreID=". $_GET['StoreID'])->result()[0];

				$data["StoreID"] = $StoreQuery->StoreID;
				$data["StoreTitle"] = $StoreQuery->StoreTitle;
				$data["StoreType"] = $this->db->query("Select * from StoreType where StoreType_Name='" .$StoreQuery->StoreType. "'")->result()[0]->StoreType_ID;
				$data["isPhysical"] = $StoreQuery->isPhysical;
				$data["StorePrice"] = $StoreQuery->StorePrice;
				$data["StoreIcon"] = $StoreQuery->StoreIcon;
			}
			else {
				$data["isError"] = true;
				$data["ErrorDisplay"] = "Not Existed Anymore!";
			}

			echo json_encode($data);
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Unexpected Error Occur!"
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

				// echo $this->db->query("Select Count(*) as x from StoreType where Lower(StoreType_Name)='" .strtolower($Package->Otherbox). "'")->result()[0]->x;

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

					if($this->db->query("Select Count(*) as x from StoreType where Lower(StoreType_Name)='" .strtolower($Package->Otherbox). "'")->result()[0]->x == 0) $this->db->insert("StoreType", array(
						"AccountID" => $_SESSION['AccountID'],
						"StoreType_Name" => $Package->Otherbox
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

					if($this->db->query("Select Count(*) as x from StoreType where Lower(StoreType_Name)='" .strtolower($Package->Otherbox). "'")->result()[0]->x == 0) $this->db->insert("StoreType", array(
						"AccountID" => $_SESSION['AccountID'],
						"StoreType_Name" => $Package->Otherbox
					));
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