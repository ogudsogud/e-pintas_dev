<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model
{


function ambilDataformUpload($id_permohonan)
    {
        $hasil = $this->db->query("SELECT 
        a.no_surat,
        a.id_permohonan,
        a.tgl_surat,
        b.nama_klas,
        c.nama
        FROM tbl_permohonan a
        JOIN mtr_klasifikasi b ON b.id_klas = a.id_klas
        JOIN tbl_user c ON c.id_user = a.id_user
        WHERE a.id_permohonan = '$id_permohonan'");
        return $hasil;

    }

// ====================== ambil data berkas untuk di view ======================================
function list_file_ptsp($id_permohonan)
    {
        $hasil = $this->db->query("SELECT 
        a.id_file,
        a.filename,
        a.tgl_upload,
        b.id_permohonan,
        b.no_surat
        FROM tbl_file a
        JOIN tbl_permohonan b ON b.id_permohonan = a.id_permohonan
        WHERE a.id_permohonan = '$id_permohonan' AND b.id_status = a.id_status");
        return $hasil;

    }

function list_file_wkpn($id_permohonan)
    {
        $hasil = $this->db->query("SELECT 
        a.id_file,
        a.filename,
        a.tgl_upload,
        b.id_permohonan,
        b.no_surat
        FROM tbl_file a
        JOIN tbl_permohonan b ON b.id_permohonan = a.id_permohonan
        WHERE a.id_permohonan = '$id_permohonan' AND b.id_status = a.id_status");
        return $hasil;

    }

function list_file_panitera($id_permohonan)
    {
        $hasil = $this->db->query("SELECT 
        a.id_file,
        a.filename,
        a.tgl_upload,
        b.id_permohonan,
        b.no_surat
        FROM tbl_file a
        JOIN tbl_permohonan b ON b.id_permohonan = a.id_permohonan
        WHERE a.id_permohonan = '$id_permohonan' AND b.id_status = a.id_status");
        return $hasil;

    }

function list_file_panmud($id_permohonan)
    {
        $hasil = $this->db->query("SELECT 
        a.id_file,
        a.filename,
        a.tgl_upload,
        b.id_permohonan,
        b.no_surat
        FROM tbl_file a
        JOIN tbl_permohonan b ON b.id_permohonan = a.id_permohonan
        WHERE a.id_permohonan = '$id_permohonan' AND b.id_status = a.id_status");
        return $hasil;

    }
//========================================== end ======================================

//================== ambil data di page ptsp, wkpn, panitera, panmud ====================
function cekdetil_ptsp($id_permohonan)
    {
        $hasil = $this->db->query("SELECT 
        a.id_user,
        a.nama,
        b.id_klas,
        b.nama_klas,
        c.id_satker,
        c.nama_satker,
        d.no_surat,
        d.tgl_surat,
        d.id_permohonan,
        d.perihal,
        d.jml_lembar,
        d.prioritas,
        d.tgl_reg,
        f.id_file,
        f.filename,
        f.tgl_upload,
        f.id_permohonan
        FROM tbl_permohonan d
        JOIN tbl_user a ON a.id_user = d.id_user
        JOIN mtr_klasifikasi b ON b.id_klas = d.id_klas
        JOIN mtr_satker c ON c.id_satker = d.id_satker
        JOIN tbl_file f ON f.id_permohonan = d.id_permohonan
        WHERE d.id_permohonan = '$id_permohonan' and f.id_status = 4");
        return $hasil;
    }


    function cekdetil_wkpn($id_permohonan)
    {
        $hasil = $this->db->query("SELECT 
        a.id_user,
        a.nama,
        b.id_klas,
        b.nama_klas,
        c.id_satker,
        c.nama_satker,
        d.no_surat,
        d.tgl_surat,
        d.id_permohonan,
        d.perihal,
        d.prioritas,
        d.tgl_reg,
        d.id_status,
        e.status,
        f.filename,
        f.tgl_upload,
        f.id_permohonan
        FROM tbl_permohonan d
        JOIN tbl_user a ON a.id_user = d.id_user
        JOIN mtr_klasifikasi b ON b.id_klas = d.id_klas
        JOIN mtr_satker c ON c.id_satker = d.id_satker
        JOIN mtr_status e ON e.id_status = d.id_status
        JOIN tbl_file f ON f.id_permohonan = d.id_permohonan
        WHERE d.id_permohonan = '$id_permohonan' and f.id_status = 5");
        return $hasil;
    }


function cekdetil_panitera($id_permohonan)
    {
        $hasil = $this->db->query("SELECT 
        a.id_user,
        a.nama,
        b.id_klas,
        b.nama_klas,
        c.id_satker,
        c.nama_satker,
        d.no_surat,
        d.tgl_surat,
        d.id_permohonan,
        d.perihal,
        d.jml_lembar,
        d.prioritas,
        d.tgl_reg,
        d.id_status,
        e.status,
        f.filename,
        f.tgl_upload,
        f.id_permohonan
        FROM tbl_permohonan d
        JOIN tbl_user a ON a.id_user = d.id_user
        JOIN mtr_klasifikasi b ON b.id_klas = d.id_klas
        JOIN mtr_satker c ON c.id_satker = d.id_satker
        JOIN mtr_status e ON e.id_status = d.id_status
        JOIN tbl_file f ON f.id_permohonan = d.id_permohonan
        WHERE d.id_permohonan = '$id_permohonan' and d.id_status = 8");
        return $hasil;
    }


function cekdetil_panmud($id_permohonan)
    {
        $hasil = $this->db->query("SELECT 
        a.id_user,
        a.nama,
        b.id_klas,
        b.nama_klas,
        c.id_satker,
        c.nama_satker,
        d.no_surat,
        d.tgl_surat,
        d.id_permohonan,
        d.perihal,
        d.jml_lembar,
        d.prioritas,
        d.tgl_reg,
        d.id_status,
        e.status,
        f.filename,
        f.tgl_upload,
        f.id_permohonan
        FROM tbl_permohonan d
        JOIN tbl_user a ON a.id_user = d.id_user
        JOIN mtr_klasifikasi b ON b.id_klas = d.id_klas
        JOIN mtr_satker c ON c.id_satker = d.id_satker
        JOIN mtr_status e ON e.id_status = d.id_status
        JOIN tbl_file f ON f.id_permohonan = d.id_permohonan
        WHERE d.id_permohonan = '$id_permohonan' and d.id_status = 10");
        return $hasil;
    }
// ==================================== end ============================================

// ==================cek hitung berkas untuk update tbl_permohonan======================

function hitung_berkas_ptsp($id_permohonan)
    {
        $jml = $this->db->query(
        "SELECT 
        a.id_file,
        a.filename,
        a.tgl_upload,
        b.id_permohonan,
        b.no_surat
        FROM tbl_file a
        JOIN tbl_permohonan b ON b.id_permohonan = a.id_permohonan
        WHERE a.id_status = 4 AND b.id_permohonan = '$id_permohonan'")->num_rows();
            return $jml;

    }

    function hitung_berkas_wkpn($id_permohonan)
    {
        $jml = $this->db->query(
        "SELECT 
        a.id_file,
        a.filename,
        a.tgl_upload,
        b.id_permohonan,
        b.no_surat
        FROM tbl_file a
        JOIN tbl_permohonan b ON b.id_permohonan = a.id_permohonan
        WHERE a.id_status = 5 AND b.id_permohonan = '$id_permohonan'")->num_rows();
            return $jml;

    }

    function hitung_berkas_panitera($id_permohonan)
    {
        $jml = $this->db->query(
        "SELECT 
        a.id_file,
        a.filename,
        a.tgl_upload,
        b.id_permohonan,
        b.no_surat
        FROM tbl_file a
        JOIN tbl_permohonan b ON b.id_permohonan = a.id_permohonan
        WHERE a.id_status = 6 AND b.id_permohonan = '$id_permohonan'")->num_rows();
            return $jml;

    }

    function hitung_berkas_panmud($id_permohonan)
    {
        $jml = $this->db->query(
        "SELECT 
        a.id_file,
        a.filename,
        a.tgl_upload,
        b.id_permohonan,
        b.no_surat
        FROM tbl_file a
        JOIN tbl_permohonan b ON b.id_permohonan = a.id_permohonan
        WHERE a.id_status = 7 AND b.id_permohonan = '$id_permohonan'")->num_rows();
            return $jml;

    }

//========================================== end ======================================

//==================== ubah status di tbl_file =======================================
function update_berkas_ptsp($id_file)
    {
        $data=array(
            'id_status' => 5
        );
   		$this->db->set('id_status');
		$this->db->where_in('id_file',$id_file);
		$this->db->update('tbl_file',$data);

    }

function mohon_ulang($id_permohonan)
    {
        $data=array(
            'id_status' => 3
        );
   		$this->db->set('id_status');
		$this->db->where('id_permohonan',$id_permohonan);
		$this->db->update('tbl_permohonan',$data);

    }

function update_berkas_wkpn($id_file)
    {
        $data=array(
            'id_status' => 6
        );
   		$this->db->set('id_status');
		$this->db->where_in('id_file',$id_file);
		$this->db->update('tbl_file',$data);

    }

function update_berkas_panitera($id_file)
    {
        $data=array(
            'id_status' => 7
        );
   		$this->db->set('id_status');
		$this->db->where_in('id_file',$id_file);
		$this->db->update('tbl_file',$data);

    }

function update_berkas_panmud($id_file)
    {
        $data=array(
            'id_status' => 8
        );
   		$this->db->set('id_status');
		$this->db->where_in('id_file',$id_file);
		$this->db->update('tbl_file',$data);

    }

//========================================== end ======================================


//==================== ubah status di tbl_permohonan =======================================
function update_status_ptsp($id_permohonan)
    {
        $hasil = $this->db->query("UPDATE tbl_permohonan SET 
        id_status = 5
        WHERE id_permohonan = '$id_permohonan'");
        return $hasil;

    }


function update_status_wkpn($id_permohonan)
    {
        $hasil = $this->db->query("UPDATE tbl_permohonan SET 
        id_status = 6
        WHERE id_permohonan = '$id_permohonan'");
        return $hasil;

    }

function update_status_panitera($id_permohonan)
    {
        $hasil = $this->db->query("UPDATE tbl_permohonan SET 
        id_status = 7
        WHERE id_permohonan = '$id_permohonan'");
        return $hasil;

    }


function update_status_panmud($id_permohonan)
    {
        $hasil = $this->db->query("UPDATE tbl_permohonan SET 
        id_status = 8
        WHERE id_permohonan = '$id_permohonan'");
        return $hasil;

    }

//========================================== end ======================================
}