<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function getEmailPass($email,$pswd) {
                $hasil=$this->db->query("SELECT 
                a.id_user,
                a.email,
                a.pswd,
                a.nama,
                a.nip,
                a.jabatan,
                a.id_status,
                b.id_satker,
                b.nama_satker,
                c.role,
                c.level,
                c.id_user_level
        FROM tbl_user a
        JOIN mtr_satker b ON b.id_satker = a.id_satker
        JOIN mtr_role_level c ON c.id_user_level = a.id_user_level
        WHERE a.email = '$email' AND a.pswd= md5('$pswd') AND a.id_status = 2");
            return $hasil;
        }


           public function updateProfile($id_user,$pswd)
        {
            
            $hasil=$this->db->query(" UPDATE tbl_user SET 
                password = md5('$pswd')
                WHERE id_user = '$id_user'");
            return $hasil;
        }
    
        function delete($id_user){
            $hasil=$this->db->query("DELETE FROM tbl_user WHERE id_user='$id_user'");
            return $hasil;
        }
}
