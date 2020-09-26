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
	
	function Add_SlipType() {
		if(isset($_POST['Name'])) {
			if($_POST['Name'] != "") {
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
	}

	function CreateStore() {
		if(isset($_POST['Package'])){
			if($_POST['Package'] != "") {
				try {
					$Package = json_decode($_POST['Package']);

					if($Package->isOther == true) {
						$this->db->query("Insert into Store values(null, 15730500, 0, '" .$Package->Titlebox. "', '" .$Package->SlipType->Number. "', true, " .$Package->isPurchasable. ", " .$Package->isPhysical. ", " .$Package->isPhysical. ", '" .date("Y-m-d"). "', '" .date("H:i:s"). "')");
					}
					else {
						$this->db->query("Insert into Store values(null, 15730500, 0, '" .$Package->Titlebox. "', '" .$Package->SlipType->Number. "', false, false, false, 0.00, '" .date("Y-m-d"). "', '" .date("H:i:s"). "')");
					}

					echo json_encode(array(
						"isError" => false
					));

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

			// echo json_encode(array(
			// 	"isError" => false
			// ));
		}
		else echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Error: Invalid!"
		));
	}
}

?>