<?php 
class Payment extends CI_Controller {
	function __construct()
	{
          parent::__construct();
          $this->load->database('default');
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

			echo json_encode($data);
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Error: Invalid!"
		));
	}
	
	function Create_AddButton() {
		if(isset($_POST['Name']) && !empty($_POST['Name'])) {
			$data["isError"] = false;

			$this->db->query("Insert into StoreType values(null, 15730500, '" .$_POST['Name']. "', '" .date("Y-m-d"). "', '" .date("H:i:s"). "')");
			$query = $this->db->query("Select * from StoreType")->result();

			foreach ($query as $value) {
				$data["Value"] = $value->StoreType_ID;
				$data["Name"] = $value->StoreType_Name;
			}

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

				if($Package->isOther == true) {
					$this->db->insert("Store", array(
						"UserID" => "15730500",
						"AccountID" => "0",
						"StoreTitle" => $Package->Titlebox,
						"StoreType" => $Package->SlipType->Number,
						"isOthers" => true,
						"isPurchasable" => $Package->isPurchasable,
						"isPhysical" => $Package->isPhysical,
						"StorePrice" => $Package->Price,
						"StoreIcon" => $Package->Icon,
						"TimeRegister" => date("Y-m-d"),
						"DateRegister" => date("H:i:s")
					));
				}
				else {
					$this->db->query("Insert into Store values(null, 15730500, 0, '" .$Package->Titlebox. "', '" .$Package->SlipType->Number. "', false, false, false, 0.00, '" .$Package->Icon. "', '" .date("Y-m-d"). "', '" .date("H:i:s"). "')");
				}

				$data["isError"] = false;

				foreach ($this->db->query("Select * from Store Order by StoreID DESC LIMIT 1")->result()[0] as $key => $value) $data[$key] = $value;

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

	function Edit_AddButton() {
		if(isset($_POST['Name']) && !empty($_POST['Name'])) {
			$data["isError"] = false;

			$this->db->query("Insert into StoreType values(null, 15730500, '" .$_POST['Name']. "', '" .date("Y-m-d"). "', '" .date("H:i:s"). "')");
			$query = $this->db->query("Select * from StoreType")->result();

			foreach ($query as $value) {
				$data["Value"] = $value->StoreType_ID;
				$data["Name"] = $value->StoreType_Name;
			}

			echo json_encode($data);
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Error: Invalid!"
		));
	}

	function Edit_DoneButton() {
		if(isset($_POST['Package']) && !empty($_POST['Package']) && isset($_GET['StoreID']) && !empty($_POST['StoreID'])) {
			try {
				$Package = json_decode($_POST['Package']);

				if($Package->isOther == true) $this->db->update("Store", array(
						"UserID" => "15730500",
						"AccountID" => "0",
						"StoreTitle" => $Package->Titlebox,
						"StoreType" => $Package->SlipType->Number,
						"isOthers" => true,
						"isPurchasable" => $Package->isPurchasable,
						"isPhysical" => $Package->isPhysical,
						"StorePrice" => $Package->Price,
						"StoreIcon" => $Package->Icon,
						"TimeRegister" => date("Y-m-d"),
						"DateRegister" => date("H:i:s")
					), "StoreID = ". $_POST['StoreID']);

				else $this->db->update("Store", array(
						"UserID" => "15730500",
						"AccountID" => "0",
						"StoreTitle" => $Package->Titlebox,
						"StoreType" => $Package->SlipType->Number,
						"isOthers" => true,
						"isPurchasable" => false,
						"isPhysical" => false,
						"StorePrice" => 0.00,
						"StoreIcon" => $Package->Icon,
						"TimeRegister" => date("Y-m-d"),
						"DateRegister" => date("H:i:s")
					), "StoreID = ". $_POST['StoreID']);

				$data["isError"] = false;

				foreach ($this->db->query("Select * from Store where StoreID=". $_POST['StoreID'])->result()[0] as $key => $value) $data[$key] = $value;

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