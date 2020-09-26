<?php 
class Payment extends CI_Controller {
	function index() {
		echo json_encode(array(
			"isError" => true,
			"ErrorDisplay" => "Testing"
		));
	}
}

?>