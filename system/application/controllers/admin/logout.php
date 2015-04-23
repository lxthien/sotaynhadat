<?php

class Logout extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('login_manager', array('autologin' => FALSE));
	}
	
	function index()
	{
		$this->login_manager->logout();
		redirect('admin/login');
	}
}

/* End of file login.php */
/* Location: ./system/application/controllers/login.php */