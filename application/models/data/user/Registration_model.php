<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_model extends CI_Model
{

    function index()
    {
               
        $hasil = $this->db->query(
            "SELECT * FROM tbl_user");
        return $hasil;

    }

    function cmbUnit()
    {
        $this->db->order_by('nama_unit', 'ASC');
        return $this->db->from('mtr_Unit')
          ->get()
          ->result();
    }

    function cmbSatker($id_unit)
    {
        $this->db->where('id_unit', $id_unit);
        $this->db->order_by('nama_satker', 'ASC');
        return $this->db->from('mtr_satker')
            ->get()
            ->result();
    }

    
    public function simpan( 
        $id_satker,
        $nama,
        $nip,
        $jabatan,
        $email,
        $pswd,
        $id_user_level
        )
            {
                $hasil=$this->db->query("INSERT INTO tbl_user 
                (
                id_satker,
                nama,
                nip,
                jabatan,
                email,
                pswd,
                tgl_input,
                id_user_level,
                id_status
                ) 
                VALUES (
                '$id_satker',
                '$nama',
                '$nip',
                '$jabatan',
                '$email',
                md5('$pswd'),
                now(),
                '$id_user_level',
                '1'
                )"
                );
                
            return $hasil;
        }


    public function updateUser($id_user,$id_satker,$email,$pswd)
        {
            
            $hasil=$this->db->query(" UPDATE tbl_user SET 
                id_satker='$id_satker',
                email='$email', 
                pswd = md5('$pswd'), 
                WHERE id_user = '$id_user'");
            return $hasil;
        }

       
    function cmbgol()
        {  
            $query = $this->db->get('mtr_golongan');
            return $query;
        }

}