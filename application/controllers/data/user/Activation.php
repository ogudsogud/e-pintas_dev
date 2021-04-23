<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Activation extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('data/user/activation_model');
    }


    //list data permohonan user untuk diaktivasi
    public function index()
    {
        $data['activation'] = $this->activation_model->list();
        $this->load->view('list/user/activation',$data);
    }


    //data user yang sudah aktif
    public function true()
    {
        $data['activated'] = $this->activation_model->activated_detail();
        $this->load->view('list/user/activated',$data);
    }



    // Ambil Data di form detail untuk di approve
    function apr_form($id_user)
    {
        $dta['approving']=$this->activation_model->activation_detail($id_user);
        $this->load->view("form/user/activation",$dta);

    }

    
    // Function utama untuk merubah kondisi status approval
    function send() {

        $this->load->library('email');

        $id_user = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $nama_satker = $this->input->post('nama_satker');
        $to = $this->input->post('email');
        $from ="pn.samarinda@gmail.com";
        
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'pn.samarinda@gmail.com',
            'smtp_pass' => 'alvaron2011',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );
        $this->email->initialize($config);
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        
        // Set to, from, message, etc.
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject('Aktivasi User e-PINTAS');


        $this->email->message(' <h3>User '.$to.' APlikasi e-PINTAS Anda Sudah Aktif <br>
        Silahkan Login http://localhost/e-pintas_dev/auth/login </h3><hr>');
        if($this->email->send()){
            $this->session->set_flashdata('msg_apr_activated','Sukses kirim email');
        }
        else{
            $this->session->set_flashdata('msg_apr_activated', $this->email->print_debugger());
        }

        $id_user=$this->input->post('id_user');

        $this->activation_model->active_user($id_user);

        $this->session->set_flashdata('msg_apr_activated', 
        '<div class="alert alert-success">
            <h4>Berhasil Aktivasi</h4>
        </div>');
        redirect('data/user/activation');
    }
}
