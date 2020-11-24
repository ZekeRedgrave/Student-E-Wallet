<?php 
include APPPATH.'third_party/PHPMailer/src/Exception.php';
include APPPATH.'third_party/PHPMailer/src/PHPMailer.php';
include APPPATH.'third_party/PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Forgot extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->database('default');

        session_start();
    }

    function Edit_SendButton() {
    	
    }
}

?>