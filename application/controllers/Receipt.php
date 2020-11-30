<?php 

class Receipt extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->database('default');

        session_start();
        date_default_timezone_set("Asia/Taipei");
    }

    function index() {
    	$this->load->view("Receipt");
    }
}

?>