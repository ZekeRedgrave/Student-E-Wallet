<?php 
class Access extends CI_Controller {
	function __construct()
	{
          parent::__construct();
          $this->load->database('default');
    }

	function index() {
		$this->load->view("Index");
	}
	function LoadView() {
		if(isset($_GET["Load"]) && isset($_GET["Name"])) {
			if($_GET["Load"] == "views") {
				switch ($_GET["Name"]) {
					case "login":
						$this->load->view("Login");
						break;

					case "app":
						$this->load->view("App");
						break;

					case "sidebar":
						$this->load->view("Sidebar");
						break;

					case "dashboard":
						$this->load->view("Dashboard");
						break;

					case "records":
						$this->load->view("Records");
						break;

					case "admin":
						$data["SlipType"] = json_encode($this->db->query("Select * from StoreType")->result());

						if($this->db->query("Select COUNT(*) as x from Store")->result()[0]->x == "0") $data["isStoreEmpty"] = true;
						else {
							$temp = array();

							foreach ($this->db->query("Select * from Store")->result() as $value) {
								array_push($temp, array(
									"StoreID" => $value->StoreID,
									"StoreTitle" => $value->StoreTitle,
									"StoreType" => $value->StoreType,
									"isOthers" => $value->isOthers,
									"isPurchasable" => $value->isPurchasable,
									"isPhysical" => $value->isPhysical,
									"StorePrice" => $value->StorePrice,
									"TimeRegister" => $value->TimeRegister,
									"DateRegister" => $value->DateRegister
								));
							}

							$data["Store"] = $temp;
							$data["isStoreEmpty"] = false;
						}

						// echo json_encode($data);

						$this->load->view("Admin", $data);

						break;
							
					default:
						echo "Error Code : 404";
						break;
				}
			}
			else echo "Error Code : 404";
		}  
		else echo "Error Code : 404";
	}

	function LoginAccess() {
		if(isset($_GET["formType"])) {
			switch ($_GET["formType"]) {
				case "login":
					$StudentID = "15730500";
					$Password = "1234";

					echo json_encode(array(
						"isError" => false,
						"QueryParam" => "Load=views&Name=app" 
					));
					break;
				
				default:
					// code...
					break;
			}
		}
	}
}

?>