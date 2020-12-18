<?php 
class Access extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->database('default');
        
        session_start();
        date_default_timezone_set("Asia/Taipei");
    }

	function index() {
		if(count($_SESSION) != 0) {
			$x = include APPPATH.'third_party/AdminConfig.php';

			if($_SESSION['AccountID'] != "") {
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
		else {
			$_SESSION['AccountID'] = "";
			$_SESSION['AccountType'] = "";

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
						$this->db->insert("Logs", array(
							"AccountID" => $_SESSION['AccountID'],
							"LogActivity" => json_encode(array(
								"Page" => "Admin",
								"Action" => "View"
							)),
							"TimeRegister" => date("H:i:s"),
							"DateRegister" => date("Y-m-d")
						));
						$this->load->view("Admin");
						break;

					case "app":
						// $this->db->insert("Logs", array(
						// 	"AccountID" => $_SESSION['AccountID'],
						// 	"LogActivity" => json_encode(array(
						// 		"Page" => "App",
						// 		"Action" => "View"
						// 	)),
						// 	"TimeRegister" => date("H:i:s"),
						// 	"DateRegister" => date("Y-m-d")
						// ));
						$this->load->view("App", $data);
						break;

					case "entrance":
						$this->db->insert("Logs", array(
							"AccountID" => $_SESSION['AccountID'],
							"LogActivity" => json_encode(array(
								"Page" => "Logout",
								"Action" => "Session Out"
							)),
							"TimeRegister" => date("H:i:s"),
							"DateRegister" => date("Y-m-d")
						));

						session_destroy();

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
									"isPhysical" => $value->isPhysical,
									"StorePrice" => $value->StorePrice,
									"StoreIcon" => $value->StoreIcon,
									"TimeRegister" => $value->TimeRegister,
									"DateRegister" => $value->DateRegister
								));
							}

							$data["Store"] = $temp;
							$data["isStoreEmpty"] = false;
							$data["StudentID"] = $this->db->query("Select * from Account where AccountID=". $_SESSION['AccountID'])->result()[0]->StudentID;
							$data["AccountID"] = $_SESSION["AccountID"];
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
								$AccountQuery = $this->db->query("Select * from Account where AccountID=". $_SESSION['AccountID'])->result()[0];
								$EmployeeQuery = $this->db->query("Select * from Employee where EmployeeID=". $AccountQuery->EmployeeID)->result()[0];

								array_push($temp, array(
									"Name" => substr(json_decode($EmployeeQuery->Name)->Firstname, 0, 1). ". " . json_decode($EmployeeQuery->Name)->Lastname,
									"Image" => $AccountQuery->AccountImage,
									"StoreID" => $value->StoreID,
									"StoreTitle" => $value->StoreTitle,
									"StoreType" => $value->StoreType,
									"isOthers" => $value->isOthers,
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

					case "bank":
						$data["AccountType"] = $_SESSION["AccountType"];

						$this->load->view("Bank", $data);
						break;

					case "timeline":
						$data['AccountID'] = $_SESSION['AccountID'];

						$this->load->view("Timeline", $data);
						break;

					case "account":
						$data['AccountType'] = $_SESSION['AccountType'];

						$this->load->view("Account", $data);
						break;
							
					case "employee": 
						$this->load->view("Employee");
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