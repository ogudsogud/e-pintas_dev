<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Activation_model extends CI_Model
{

    function list()
    {
               
        $hasil = $this->db->query("SELECT 
            b.nama_satker,
            c.id_user,
            c.nama,
            c.jabatan,
            c.email,
            c.tgl_input, 
            d.status 
        FROM tbl_user c
        JOIN mtr_satker b ON b.id_satker = c.id_satker
        JOIN mtr_status d ON d.id_status = c.id_status
        WHERE c.id_status = 1");
        return $hasil;

    }

    //function untuk ambil data di form aktivasi
    function activation_detail($id_user)
    {
               
        $hasil = $this->db->query("SELECT 
            b.nama_satker,
            c.id_user,
            c.nama,
            c.jabatan,
            c.email,
            c.tgl_input, 
            d.status 
        FROM tbl_user c
        JOIN mtr_satker b ON b.id_satker = c.id_satker
        JOIN mtr_status d ON d.id_status = c.id_status
        WHERE c.id_status = 1 and c.id_user = '$id_user'");
        return $hasil;

    }

    //data user yang sudah aktif
    function activated_detail()
    {
               
        $hasil = $this->db->query("SELECT 
            b.nama_satker,
            c.id_user,
            c.nama,
            c.jabatan,
            c.email,
            c.tgl_input,
            c.tgl_aktivasi, 
            d.status 
        FROM tbl_user c
        JOIN mtr_satker b ON b.id_satker = c.id_satker
        JOIN mtr_status d ON d.id_status = c.id_status
        WHERE c.id_status = 2");
        return $hasil;

    }
    
    //function untuk mengubah kondisi status
    public function active_user($id_user)
    {
        $hasil=$this->db->query(" UPDATE tbl_user SET 
            id_status = 2,
            tgl_aktivasi = now()
            WHERE id_user = '$id_user'");
        return $hasil;
    }




}