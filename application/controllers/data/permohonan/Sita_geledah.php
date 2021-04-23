<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sita_geledah extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('data/permohonan/sita_geledah_model');
        $this->load->model('data/permohonan/upload_model');
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->database();
        cek_notlogin();
    }

    //menampilkan combo turunan
    public function index()
    {

        $data['cmb_klas'] = $this->sita_geledah_model->cmbKlas();
        $data['cmbSatker'] = $this->sita_geledah_model->cmbSatker();
        $this->load->view('form/data/permohonan',$data);
    }

    function user(){
        $id_satker = $this->input->post('id_satker');
        $data = $this->sita_geledah_model->cmbUser($id_satker);
        echo json_encode($data);
    }

    public function status()
    {
        $config['base_url'] = site_url('data/permohonan/sita_geledah/status'); //site url
        $config['total_rows'] = $this->db->count_all('tbl_permohonan'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config['uri_segment'] = 5;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
      $config['first_link']       = 'First';
      $config['last_link']        = 'Last';
      $config['next_link']        = 'Next';
      $config['prev_link']        = 'Prev';
      $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
      $config['full_tag_close']   = '</ul></nav></div>';
      $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
      $config['num_tag_close']    = '</span></li>';
      $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
      $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
      $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
      $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['prev_tagl_close']  = '</span>Next</li>';
      $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
      $config['first_tagl_close'] = '</span></li>';
      $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['last_tagl_close']  = '</span></li>';

      $this->pagination->initialize($config);
      $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(3) : 0;

      //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
      $data['status'] = $this->sita_geledah_model->status($config['per_page'], $data['page']);           

      $data['pagination'] = $this->pagination->create_links();


        // $data['status'] = $this->sita_geledah_model->status();
        $this->load->view('list/permohonan/sita_geledah',$data);
    }


    public function find_status()
    {
        $keyword = $this->input->get('keyword');
        $data['status'] = $this->sita_geledah_model->cari_status($keyword);
        $this->load->view('list/permohonan/sita_geledah',$data);
    }

    public function ceklist_ptsp()
    {
        $data['ptsp'] = $this->sita_geledah_model->ceklist_ptsp();
        $this->load->view('list/ptsp/ceklist',$data);
    }

    public function ceklist_wkpn()
    {
        $data['wkpn'] = $this->sita_geledah_model->ceklist_wkpn();
        $this->load->view('list/wkpn/ceklist',$data);
    }

    public function ceklist_panitera()
    {
        $data['panitera'] = $this->sita_geledah_model->ceklist_panitera();
        $this->load->view('list/panitera/ceklist',$data);
    }

    public function ceklist_panmud()
    {
        $data['panmud'] = $this->sita_geledah_model->ceklist_panmud();
        $this->load->view('list/panmud/ceklist',$data);
    }



    //simpan data untuk pengajuan permohonan
    function kirim() {
        $id_klas=$this->input->post('id_klas');
        $id_satker =$this->input->post('id_satker');
        $id_user=$this->input->post('id_user');
        $no_surat=$this->input->post('no_surat');
        $tgl_surat=$this->input->post('tgl_surat');
        $perihal=$this->input->post('perihal');
        $prioritas=$this->input->post('prioritas');


        $surat = $this->sita_geledah_model->cek_no_surat($no_surat,$id_klas);
        $cek = $surat->num_rows();

        if ($cek == 1 ) {


            $this->session->set_flashdata('msg', 
            '<div class="alert alert-warning">
                <h4>Gagal!</h4>
                <p>Nomor Surat Sudah ada</p>
            </div>');    
            redirect('data/permohonan/sita_geledah');

            
    
        } else {

            $this->sita_geledah_model->simpan(
                $id_klas,
                $id_satker,
                $id_user,
                $no_surat,
                $tgl_surat,
                $perihal,
                $prioritas);
            
    
            $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil</h4>
                    <p>Mengajukan Permohonan</p>
                </div>');    
                redirect('data/permohonan/sita_geledah/status');

        }
    }

}
