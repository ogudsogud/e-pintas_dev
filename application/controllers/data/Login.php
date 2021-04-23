<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data/registration_model');
        $this->load->library('form_validation');
        $this->load->library("pagination");
        // cek_notlogin();
    }


    public function form_login()
    {
        // $dta['ins']=$this->registration_model->cmbins(); 
        $this->load->view('login/login');
    }

}
