<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sita_geledah_model extends CI_Model
{

    function cmbKlas()
    {
        $hasil = $this->db->query("SELECT * FROM mtr_klasifikasi");
        return $hasil;
    }


    function cmbSatker()
    {
        $this->db->where('id_satker <= 6');
        $this->db->order_by('nama_satker', 'ASC');
        return $this->db->from('mtr_satker')
          ->get()
          ->result();
    }

    function cmbUser($id_satker)
    {
        $this->db->where('id_satker', $id_satker );
        $this->db->order_by('nama', 'ASC');
        return $this->db->from('tbl_user')
            ->get()
            ->result();
    }



    public function simpan( 

        $id_klas,
        $id_satker,
        $id_user,
        $no_surat,
        $tgl_surat,
        $perihal,
        $prioritas)
    {

        $hasil=$this->db->query(
        "INSERT INTO tbl_permohonan (
            id_klas,
            id_satker,
            id_user,
            no_surat,
            tgl_reg,
            tgl_surat,
            perihal,
            prioritas,
            id_status) 
            VALUES (
            '$id_klas',
            '$id_satker',
            '$id_user',
            '$no_surat',
             now(),
            '$tgl_surat',
            '$perihal',
            '$prioritas',
             3)"
            );
        return $hasil;
    }

    function cek_no_surat($no_surat,$id_klas)
    {
        $query = $this->db->query("SELECT * FROM tbl_permohonan where no_surat = '$no_surat' AND id_klas = '$id_klas'");
        return $query;
    }

    function status($sampai, $dari, $like = '')
    {
        
        if($like)
        $this->db->where($like);
        $this->db->order_by('id_permohonan','desc');
        $query = $this->db->get('tbl_permohonan',$sampai,$dari);
                
       return $query->result_array();
      }
    
      //hitung jumlah row
    
      function jumlah($like=''){
    
       if($like)
        $this->db->where($like);
        $this->db->order_by('id_permohonan','desc');
       $query = $this->db->get('tbl_permohonan');
       return $query->num_rows();
      }


    

    // function jml_status($keyword=null)
    // {
    //     if ($keyword=="NIL") $keyword="";

    //     $sql = "SELECT 
    //     a.id_user,
    //     a.nama,
    //     b.id_klas,
    //     b.nama_klas,
    //     c.id_satker,
    //     c.nama_satker,
    //     d.no_surat,
    //     d.tgl_surat,
    //     d.id_permohonan,
    //     d.perihal,
    //     -- d.jml_lembar,
    //     d.prioritas,
    //     d.tgl_reg,
    //     d.id_status,
    //     e.status,
    //     (SELECT COUNT(a.filename) FROM tbl_file a JOIN tbl_permohonan b ON b.id_permohonan = a.id_permohonan 
    //     WHERE d.id_permohonan = a.id_permohonan) AS jml_berkas,
    //     (SELECT COUNT(a.filename) FROM tbl_file a JOIN tbl_permohonan b ON b.id_permohonan = a.id_permohonan 
    //     WHERE a.id_status = 5 AND d.id_permohonan = a.id_permohonan) AS berkas_done_ptsp,
    //     (SELECT COUNT(a.filename) FROM tbl_file a JOIN tbl_permohonan b ON b.id_permohonan = a.id_permohonan 
    //     WHERE a.id_status = 6 AND d.id_permohonan = a.id_permohonan) AS berkas_done_wkpn,
    //     (SELECT COUNT(a.filename) FROM tbl_file a JOIN tbl_permohonan b ON b.id_permohonan = a.id_permohonan 
    //     WHERE a.id_status = 7 AND d.id_permohonan = a.id_permohonan) AS berkas_done_panitera,
    //     (SELECT COUNT(a.filename) FROM tbl_file a JOIN tbl_permohonan b ON b.id_permohonan = a.id_permohonan 
    //     WHERE a.id_status = 8 AND d.id_permohonan = a.id_permohonan) AS berkas_done_panmud
    //     FROM tbl_permohonan d
    //     JOIN tbl_user a ON a.id_user = d.id_user
    //     JOIN mtr_klasifikasi b ON b.id_klas = d.id_klas
    //     JOIN mtr_satker c ON c.id_satker = d.id_satker
    //     JOIN mtr_status e ON e.id_status = d.id_status 
    //     where d.no_surat LIKE '%$keyword%' 
    //     OR d.tgl_surat LIKE '%$keyword%'
    //     OR d.tgl_reg LIKE '%$keyword%'
    //     OR b.nama_klas LIKE '%$keyword%'
    //     OR d.perihal LIKE '%$keyword%'
    //     OR e.status LIKE '%$keyword%'
    //     ORDER BY d.id_status ASC";
    //     $query = $this->db->query($sql);
    //     return $query->num_rows();
    // }



    function ceklist_ptsp()
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
        -- d.jml_lembar,
        d.prioritas,
        d.tgl_reg,
        d.id_status,
        e.status
        FROM tbl_permohonan d
        JOIN tbl_user a ON a.id_user = d.id_user
        JOIN mtr_klasifikasi b ON b.id_klas = d.id_klas
        JOIN mtr_satker c ON c.id_satker = d.id_satker
        JOIN mtr_status e ON e.id_status = d.id_status
        WHERE d.id_status = 4");
        return $hasil;
    }

    function ceklist_wkpn()
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
        e.status
        FROM tbl_permohonan d
        JOIN tbl_user a ON a.id_user = d.id_user
        JOIN mtr_klasifikasi b ON b.id_klas = d.id_klas
        JOIN mtr_satker c ON c.id_satker = d.id_satker
        JOIN mtr_status e ON e.id_status = d.id_status
        WHERE d.id_status = 5");
        return $hasil;
    }

    function ceklist_panitera()
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
        -- d.jml_lembar,
        d.prioritas,
        d.tgl_reg,
        d.id_status,
        e.status
        FROM tbl_permohonan d
        JOIN tbl_user a ON a.id_user = d.id_user
        JOIN mtr_klasifikasi b ON b.id_klas = d.id_klas
        JOIN mtr_satker c ON c.id_satker = d.id_satker
        JOIN mtr_status e ON e.id_status = d.id_status
        WHERE d.id_status = 6");
        return $hasil;
    }

    function ceklist_panmud()
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
        -- d.jml_lembar,
        d.prioritas,
        d.tgl_reg,
        d.id_status,
        e.status
        FROM tbl_permohonan d
        JOIN tbl_user a ON a.id_user = d.id_user
        JOIN mtr_klasifikasi b ON b.id_klas = d.id_klas
        JOIN mtr_satker c ON c.id_satker = d.id_satker
        JOIN mtr_status e ON e.id_status = d.id_status
        WHERE d.id_status = 7");
        return $hasil;
    } 

}