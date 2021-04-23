<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Upload_berkas extends CI_Controller 
{
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data/permohonan/upload_model');
        cek_notlogin();
    }
 
	function form_upload($id_permohonan){
        $dta['data']=$this->upload_model->ambilDataformUpload($id_permohonan);
        $this->load->view("form/data/upload_berkas",$dta);
		
		}

	function proses()
	{
		$config['upload_path']          = './berkas_ceklis/';
		$config['allowed_types']        = 'pdf|docx';
		$config['max_size']             = 5000;
		$this->load->library('upload',$config);
		$id_permohonan = $this->input->post('id_permohonan');
        $tgl_upload = $this->input->post('tgl_upload');
		$id_status = $this->input->post('id_status');
		$no_surat = $this->input->post('no_surat');
		
		// $this->load->view("form/data/upload_berkas",$dta);


        $jumlah_berkas = count($_FILES['berkas']['name']);
        
		for($i = 0; $i < $jumlah_berkas;$i++)
		{
            if(!empty($_FILES['berkas']['name'][$i])){
 
				$_FILES['file']['name'] = $_FILES['berkas']['name'][$i];
				$_FILES['file']['type'] = $_FILES['berkas']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['berkas']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['berkas']['error'][$i];
				$_FILES['file']['size'] = $_FILES['berkas']['size'][$i];
	   
				if($this->upload->do_upload('file')){
					
					$uploadData = $this->upload->data();

					$data['filename'] = $uploadData['file_name'];
					$data['tgl_upload'] = $tgl_upload[$i];	
					$data['id_permohonan'] = $id_permohonan[$i];
					$data['id_status'] = $id_status[$i];
					$data['type_file'] = $uploadData['file_ext'];
					$data['ukuran_file'] = $uploadData['file_size'];
					$this->db->insert('tbl_file',$data);

					$data2=array(
						'id_status' => 4
					);
					$this->db->set('id_status');
					$this->db->where('id_permohonan',$id_permohonan[$i]);
					$this->db->update('tbl_permohonan',$data2);
				}
			}
		}
 

		redirect('data/permohonan/sita_geledah/status');
	}



//ubah status di tbl_file sekaligus di tbl_permohonan

	function update_all_ptsp(){
			
		$id_file = $_POST['id_file'];
		$this->upload_model->update_berkas_ptsp($id_file);

		$id_permohonan = $this->input->post('id_permohonan');
		$dta['hitung_berkas']=$this->upload_model->hitung_berkas_ptsp($id_permohonan);

		if($dta['hitung_berkas'] == 0) {

		$this->upload_model->update_status_ptsp($id_permohonan);
		}

		redirect('data/permohonan/sita_geledah/ceklist_ptsp');
			
		}

	function canceled(){
		
		$id_permohonan = $this->input->post('id_permohonan');
		$this->upload_model->mohon_ulang($id_permohonan);
		redirect('data/permohonan/sita_geledah/ceklist_ptsp');
			
		}


	function update_all_wkpn(){
		
		$id_file = $_POST['id_file'];
		$this->upload_model->update_berkas_wkpn($id_file);

		$id_permohonan = $this->input->post('id_permohonan');
		$dta['hitung_berkas']=$this->upload_model->hitung_berkas_wkpn($id_permohonan);

		if($dta['hitung_berkas'] == 0) {

		$this->upload_model->update_status_wkpn($id_permohonan);
		}
		redirect('data/permohonan/sita_geledah/ceklist_wkpn');
		
	}


	function update_all_panitera(){
		
		$id_file = $_POST['id_file'];
		$this->upload_model->update_berkas_panitera($id_file);
	
		$id_permohonan = $this->input->post('id_permohonan');
		$dta['hitung_berkas']=$this->upload_model->hitung_berkas_panitera($id_permohonan);
	
		if($dta['hitung_berkas'] == 0) {
	
		$this->upload_model->update_status_panitera($id_permohonan);
		}

		redirect('data/permohonan/sita_geledah/ceklist_panitera');
			
		}

	function update_all_panmud(){
		
		$id_file = $_POST['id_file'];
		$this->upload_model->update_berkas_panmud($id_file);
	
		$id_permohonan = $this->input->post('id_permohonan');
		$dta['hitung_berkas']=$this->upload_model->hitung_berkas_panmud($id_permohonan);
	
		if($dta['hitung_berkas'] == 0) {
	
		$this->upload_model->update_status_panmud($id_permohonan);
		}

		redirect('data/permohonan/sita_geledah/ceklist_panmud');
			
		}

// ==================================== End ==================================================

//=================================== view berkas untuk di ceklis ============================

	function view_berkas_ptsp($id_permohonan){
			$dta['hitung_berkas']=$this->upload_model->hitung_berkas_ptsp($id_permohonan);
			$dta['view_berkas']=$this->upload_model->list_file_ptsp($id_permohonan);
			$this->load->view("form/ceklis/ptsp",$dta);
			
			}

	function view_berkas_wkpn($id_permohonan){
		$dta['hitung_berkas']=$this->upload_model->hitung_berkas_wkpn($id_permohonan);
		$dta['view_berkas']=$this->upload_model->list_file_wkpn($id_permohonan);
		$this->load->view("form/ceklis/wkpn",$dta);
		
		}

	function view_berkas_panitera($id_permohonan){
		$dta['hitung_berkas']=$this->upload_model->hitung_berkas_panitera($id_permohonan);
		$dta['view_berkas']=$this->upload_model->list_file_panitera($id_permohonan);
		$this->load->view("form/ceklis/panitera",$dta);
		
		}

	function view_berkas_panmud($id_permohonan){
		$dta['hitung_berkas']=$this->upload_model->hitung_berkas_panmud($id_permohonan);
		$dta['view_berkas']=$this->upload_model->list_file_panmud($id_permohonan);
		$this->load->view("form/ceklis/panmud",$dta);
		
		}

//========================================  End  ===============================================
		
//============================== list untuk di approve berjenjang ==============================
	function list_detil_ptsp(){
		$id_permohonan = $this->input->post('id_permohonan');
		$dta['ptsp']=$this->upload_model->cekdetil_ptsp($id_permohonan);
		$this->load->view("list/ceklis/ptsp",$dta);
			
			}


	function list_detil_wkpn(){
		$id_permohonan = $this->input->post('id_permohonan');
		$dta['wkpn']=$this->upload_model->cekdetil_ptsp($id_permohonan);
		$this->load->view("list/ceklis/wkpn",$dta);
			
			}

	function list_detil_panitera(){
		$id_permohonan = $this->input->post('id_permohonan');
		$dta['panitera']=$this->upload_model->cekdetil_ptsp($id_permohonan);
		$this->load->view("list/ceklis/panitera",$dta);
			
			}

	function list_detil_panmud(){
		$id_permohonan = $this->input->post('id_permohonan');
		$dta['panmud']=$this->upload_model->cekdetil_ptsp($id_permohonan);
		$this->load->view("list/ceklis/panmud",$dta);
				
				}

}