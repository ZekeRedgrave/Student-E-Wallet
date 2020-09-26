<?php 
class Access extends CI_Controller {
	public function index() {
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
						$this->load->view("Admin");
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