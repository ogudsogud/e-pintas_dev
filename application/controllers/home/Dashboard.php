<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		cek_notlogin();
	}

	public function index()
	{
        $this->load->view("home/dashboard");
	}
}
