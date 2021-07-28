<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('data/user/registration_model');
    }


    public function index()
    {
        $data['cmbUnit'] = $this->registration_model->cmbUnit();
        $this->load->view('form/user/registration', $data);
    }


    function satker(){
        $id_unit = $this->input->post('id_unit');
        $data = $this->registration_model->cmbSatker($id_unit);
        echo json_encode($data);
    }


    function kirim() {

        $id_satker=$this->input->post('id_satker');
        $nama=$this->input->post('nama');
        $nip=$this->input->post('nip');
        $jabatan=$this->input->post('jabatan');
        $email=$this->input->post('email');
        $pswd=$this->input->post('pswd');
        $id_user_level=$this->input->post('id_user_level');

            $this->registration_model->simpan(
                    $id_satker,
                    $nama,
                    $nip,
                    $jabatan,
                    $email,
                    $pswd,
                    $id_user_level
                );
            
                
            $this->session->set_flashdata('msg', 
                '<div id="myModal2" class="modal hide">
                <div class="modal-header">
                  <button data-dismiss="modal" class="close" type="button">×</button>
                  <h3>Alert modal</h3>
                </div>
                <div class="modal-body">
                  <p><img src="images/gallery/imgbox3.jpg"/></p>
                </div>
                <div class="modal-footer">
                <a data-dismiss="modal" class="btn btn-inverse" href="#">Cancel</a> </div>
              </div>');    
                redirect('auth/login');   

            // echo "<script>
            // alert('Pengajuan Cuti Berhasil');window.location='new'
            //         </script>";
    }

}
