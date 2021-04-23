<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login/login_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function login()
    {
        cek_login();
        $this->load->view("login/login");

    }

    public function process() {
        $email=$this->input->post('email');
        $pswd=$this->input->post('pswd');

        if(isset($_POST['login'])) {
            $query = $this->login_model->getEmailPass($email,$pswd);
            if($query->num_rows()>0) {
                $row = $query->row();
               $params = array (
                   'id_user' => $row->id_user,
                   'pswd'=> $row->pswd,
                   'nama'=> $row->nama,
                   'nip'=> $row->nip,
                   'jabatan'=> $row->jabatan,
                   'email'=> $row->email,
                   'id_satker'=> $row->id_satker,
                   'nama'=> $row->nama,
                   'role'=> $row->role,
                   'level'=> $row->level,
                   'id_user_level'=> $row->id_user_level
                   
               );
               $this->session->set_userdata($params);
               echo 
               "<script>
               window.location='".site_url('dashboard')."';
                    </script>";
            } else {
                echo 
                "<script>
               alert('Login Gagal, Email atau Password Salah');
               window.location='".site_url('auth/login')."';
                    </script>";
            }
        }
        
    }

    function logout(){

        $params=array('email','pswd');
        $this->session->unset_userdata($params);
        $this->session->sess_destroy();
        redirect('auth/login');
    }
       


}
