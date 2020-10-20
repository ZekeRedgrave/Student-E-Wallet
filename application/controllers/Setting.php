<?php 

class Setting extends CI_Controller {

	function __construct()
	{
          parent::__construct();
          $this->load->database('default');

          session_start();
    }

    function View_ProfileLoad() {

    }
    
}

?>