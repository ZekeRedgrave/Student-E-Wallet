<?php 
class Access extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->database('default');
        
        session_start();
    }

	function index() {
		$x = include APPPATH.'third_party/AdminConfig.php';

		if($_SESSION['AccountID'] != null) {
			if($_SESSION['AccountID'] == $x['Username']) {
				$data["QueryParam"] = "Load=views&Name=admin";

				$this->load->view("Index", $data);
			}
			else {
				$data["QueryParam"] = "Load=views&Name=app";

				$this->load->view("Index", $data);
			}
		}
		else {
			$data["QueryParam"] = "Load=views&Name=entrance";

			$this->load->view("Index", $data);
		}
	}

	function LoadView() {
		if(isset($_GET["Load"]) && isset($_GET["Name"])) {
			if($_GET["Load"] == "views") {
				$data["AccountType"] = $_SESSION["AccountType"];

				switch ($_GET["Name"]) {
					case "admin":
						$this->load->view("Admin");
						break;

					case "app":
						$this->load->view("App", $data);
						break;

					case "entrance":
						$_SESSION["AccountType"] = $_SESSION['AccountID'] = "";

						$this->load->view("Entrance");
						break;

					case "sidebar":
						$this->load->view("Sidebar", $data);
						break;

					case "store":
						$data["SlipType"] = json_encode($this->db->query("Select * from StoreType")->result());

						if($this->db->query("Select COUNT(*) as x from Store")->result()[0]->x == "0") $data["isStoreEmpty"] = true;
						else {
							$temp = array();

							foreach ($this->db->query("Select * from Store Order by StoreID DESC")->result() as $value) {
								array_push($temp, array(
									"StoreID" => $value->StoreID,
									"StoreTitle" => $value->StoreTitle,
									"StoreType" => $value->StoreType,
									"isOthers" => $value->isOthers,
									"isPurchasable" => $value->isPurchasable,
									"isPhysical" => $value->isPhysical,
									"StorePrice" => $value->StorePrice,
									"StoreIcon" => $value->StoreIcon,
									"TimeRegister" => $value->TimeRegister,
									"DateRegister" => $value->DateRegister
								));
							}

							$data["Store"] = $temp;
							$data["isStoreEmpty"] = false;
						}

						$this->load->view("Store", $data);
						break;

					case "records":
						$this->load->view("Records");
						break;

					case "payment":
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
									"StoreIcon" => $value->StoreIcon,
									"TimeRegister" => $value->TimeRegister,
									"DateRegister" => $value->DateRegister
								));
							}

							$data["Store"] = $temp;
							$data["isStoreEmpty"] = false;
						}

						$this->load->view("Payment", $data);
						break;

					case "timeline":
						$this->load->view("Timeline");
						break;

					case "account":
						$this->load->view("Account");
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
}

?>