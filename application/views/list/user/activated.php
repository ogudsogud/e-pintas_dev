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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Daftar User Aktif</a> </div>
    <h1>User Aktif</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-content padding">
            <table class="table table-bordered table-striped">
            <?php $cek=$this->db->query("SELECT * from tbl_user WHERE id_status = 2")->num_rows(); ?>
                <?php if($cek>=1) { ?>
              <thead>
                <tr>
                  <th>No</th>
                  <th>Unit Wilayah Hukum</th>
                  <th>Nama Pemohon</th>
                  <th>Jabatan</th>
                  <th>Email</th>
                  <th>Tanggal Aktivasi</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                      $no=1;
                      foreach ($activated->result_array() as $row):
                            $id_user=$row['id_user'];
                            $nama_satker=$row['nama_satker'];
                            $nama =$row['nama'];
                            $jabatan =$row['jabatan'];
                            $email =$row['email'];
                            $tgl_aktivasi =$row['tgl_aktivasi'];
                            $status=$row['status'];

                        ?>

                    <tr>

                        <td width="30">
                        <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $nama_satker ?>
                        </td>
                        <td>
                            <?php echo $nama ?>
                        </td>
                        <td>
                            <?php echo $jabatan ?>
                        </td>
                        <td>
                            <?php echo $email ?>
                        </td>
                        <td>
                            <?php echo $tgl_aktivasi ?>
                        </td>
                        <td>
                          <span class="label label-success"><font color="black"><?php echo $status ?></font></span>
                        </td>
                      </tr>
                          <?php endforeach; ?>
              </tbody>
              <?php } else {
                        ?>
                    <thead>
                    <tr bgcolor="#87CEFA">
                    <th>No</th>
                    <th>Unit</th>
                    <th>Nama Pemohon</th>
                    <th>Jabatan</th>
                    <th>Email</th>
                    <th>Tanggal Aktivasi</th>
                    <th>Status</th>
                    </tr>
                </thead>
                    <tbody id="myTable">
                      <tr>
                            <td width="120" colspan="11" style="text-align:center;">
                              <?php echo "<h3>Tidak Ada User Aktif</h3>"; ?>
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
