<?php 

class Transaction extends CI_Controller {
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
}

?>