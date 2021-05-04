<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("partials/header.php") ?>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">e-PINTAS</a>
<br>
<a href="dashboard.html"><font size="4" face="Tahoma">Elektronik Permohonan Ijin Sita-Geledah-Penahanan dan Upload Berkas </font></a>
</h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<?php $this->load->view("partials/topnavbar1.php") ?>

<?php $this->load->view("partials/topnavbar2.php") ?>
<!--close-top-Header-menu-->

<div id="content">
  <div id="content-header">
  <div id="notifications"><?php echo $this->session->flashdata('msg_apr_activated'); ?></div>
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Permohonan</a> </div>
    <h1>Ceklist Panitera</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-content padding">
            <table class="table table-bordered table-striped">
            <?php $cek=$this->db->query("SELECT * from tbl_permohonan WHERE id_status = 6")->num_rows(); ?>
                <?php if($cek>=1) { ?>
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Surat</th>
                  <th>Jenis Permohonan</th>
                  <th>Unit</th>
                  <th>Nama Pemohon</th>
                  <th>Tanggal Surat</th>
                  <th>Perihal</th>
                  <th>Prioritas</th>
                  <th>Tanggal Input Permohonan</th>
                  <th>Status</th>
                  <th>Cek</th>

                </tr>
              </thead>
              <tbody>
              <?php 
                      $no=1;
                      foreach ($panitera->result_array() as $row):
                        
                            $id_permohonan=$row['id_permohonan'];
                            $id_user=$row['id_user'];
                            $no_surat =$row['no_surat'];
                            $nama_klas=$row['nama_klas'];
                            $nama_satker =$row['nama_satker'];
                            $nama =$row['nama'];
                            $tgl_surat =$row['tgl_surat'];
                            $perihal =$row['perihal'];
                            $prioritas=$row['prioritas'];
                            $tgl_reg=$row['tgl_reg'];
                            $id_status =$row['id_status'];
                            $status =$row['status'];


                        ?>

                    <tr>

                        <td width="30">
                        <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $no_surat ?>
                        </td>
                        <td>
                            <?php echo $nama_klas ?>
                        </td>
                        <td>
                            <?php echo $nama_satker ?>
                        </td>
                        <td>
                            <?php echo $nama ?>
                        </td>
                        <td>
                            <?php echo $tgl_surat ?>
                        </td>
                        <td>
                            <?php echo $perihal ?>
                        </td>
                        <td>
                            <?php echo $prioritas ?>
                        </td>
                        <td>
                            <?php echo date('d-m-Y',strtotime($tgl_reg))
                            ?>
                        </td>
                        <td>
                            <?php if ($id_status == 6) { ?>
                              <span class="label label-warning"><?php echo $status ?></span>
                                <?php } ?>
                        </td>

                        <td>
                        <a class="btn btn-primary" href="<?php echo base_url('data/permohonan/upload_berkas/view_berkas_panitera/'.$id_permohonan);?>" type="button" class="btn btn-xs btn-info" id="id_permohonan">Detail</a></button>
                        </td>
                      </tr>
                          <?php endforeach; ?>
              </tbody>
              <?php } else {
                        ?>
                    <thead>
                    <tr bgcolor="#87CEFA">
                    <th>No</th>
                    <th>No Surat</th>
                    <th>Jenis Permohonan</th>
                    <th>Unit</th>
                    <th>Nama Pemohon</th>
                    <th>Tanggal Surat</th>
                    <th>Perihal</th>
                    <th>Jumlah Lembar</th>
                    <th>Prioritas</th>
                    <th>Tanggal Input Permohonan</th>
                    <th>Status</th>
                    <th>Cek</th>
                    </tr>
                </thead>
                    <tbody id="myTable">
                      <tr>
                            <td width="120" colspan="11" style="text-align:center;">
                              <?php echo "<h3>Tidak Ada Ceklist Permohonan</h3>"; ?>
                            </td>
                      </tr>
                  </tbody>
                  <?php } ?>  
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view("partials/footer.php") ?>
<?php $this->load->view("partials/js.php") ?>
</body>
</html>
