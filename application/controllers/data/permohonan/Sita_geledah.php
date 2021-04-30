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
        $dari      = $this->uri->segment('5');
        $sampai = 10;
        $like      = '';

        //hitung jumlah row
        $jumlah= $this->sita_geledah_model->jumlah();

        //inisialisasi array
        $config = array();

        //set base_url untuk setiap link page
        $config['base_url'] = base_url().'data/permohonan/sita_geledah/status';

        //hitung jumlah row
       $config['total_rows'] = $jumlah;

       //mengatur total data yang tampil per page
       $config['per_page'] = $sampai;

       //mengatur jumlah nomor page yang tampil
       $config['num_links'] = $jumlah;

         // integrate bootstrap pagination
         $config['full_tag_open'] = '<ul class="pagination">';
         $config['full_tag_close'] = '</ul>';
         $config['first_link'] = false;
         $config['last_link'] = false;
         $config['first_tag_open'] = '<li>';
         $config['first_tag_close'] = '</li>';
         $config['prev_link'] = 'Prev';
         $config['prev_tag_open'] = '<li class="prev">';
         $config['prev_tag_close'] = '</li>';
         $config['next_link'] = 'Next';
         $config['next_tag_open'] = '<li>';
         $config['next_tag_close'] = '</li>';
         $config['last_tag_open'] = '<li>';
         $config['last_tag_close'] = '</li>';
         $config['cur_tag_open'] = '<li class="active"><a href="#">';
         $config['cur_tag_close'] = '</a></li>';
         $config['num_tag_open'] = '<li>';
         $config['num_tag_close'] = '</li>';
         $this->pagination->initialize($config);

       //inisialisasi array
        $data = array();

        //ambil data buku dari database
       $data['status'] = $this->sita_geledah_model->status($sampai, $dari, $like);

       //Membuat link
       $str_links = $this->pagination->create_links();
       $data["links"] = explode('&nbsp;',$str_links );
    //    $data['title'] = 'Tutorial Pagination CodeIgniter | https://recodeku.blogspot.com';

    // Load view
    $this->load->view('list/permohonan/sita_geledah',$data);
        
    }


    public function cari()
       {

            //mengambil nilai keyword dari form pencarian
     $search = (trim($this->input->post('key',true)))? trim($this->input->post('key',true)) : '';

     //jika uri segmen 3 ada, maka nilai variabel $search akan diganti dengan nilai uri segmen 3
     $search = ($this->uri->segment(5)) ? $this->uri->segment(5) : $search;

     //mengambil nilari segmen 4 sebagai offset
            $dari      = $this->uri->segment('4');

            //limit data yang ditampilkan
            $sampai = 5;

            //inisialisasi variabel $like
            $like      = '';

            //mengisi nilai variabel $like dengan variabel $search, digunakan sebagai kondisi untuk menampilkan data
            if($search) $like = "(no_surat LIKE '%$search%')";

            //hitung jumlah row
            $jumlah= $this->sita_geledah_model->jumlah($like);

            //inisialisasi array
            $config = array();

            //set base_url untuk setiap link page
            $config['base_url'] = base_url().'data/permohonan/sita_geledah/cari/'.$search;

            //hitung jumlah row
           $config['total_rows'] = $jumlah;

           //mengatur total data yang tampil per page
           $config['per_page'] = $sampai;

           //mengatur jumlah nomor page yang tampil
           $config['num_links'] = $jumlah;

            // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);


           //inisialisasi array
            $data = array();

            //ambil data buku dari database
           $data['status'] = $this->sita_geledah_model->status($sampai, $dari, $like);

           //Membuat link
           $str_links = $this->pagination->create_links();
           $data["links"] = explode('&nbsp;',$str_links );
        //    $data['title'] = 'Tutorial Searching with Pagination CodeIgniter | https://recodeku.blogspot.com';

        $this->load->view('list/permohonan/sita_geledah',$data);
      }  
    

    // public function find_status()
    // {
    //     $keyword = $this->input->get('keyword');
    //     $data['status'] = $this->sita_geledah_model->cari_status($keyword);
    //     $this->load->view('list/permohonan/sita_geledah',$data);
    // }

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
