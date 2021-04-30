<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("partials/header.php") ?>
<style>
.pagination a.active {
  background-color: #4CAF50;
  color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
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
    <h1>Status Permohonan</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">

          <div class="widget-content padding" style="overflow-x:auto;">
          <div class="gp_btn">
                      <ul>
                           <li>
                                <?php echo form_open('data/permohonan/sita_geledah/cari');?>
                                     <input type="text" name="key" placeholder="Search..." size="50" required>
                                     <input type="submit" name="search" value="Search">
                                <?php echo form_close();?>
                           </li>
                           <li><a class="btn2" href="<?php echo base_url(); ?>data/permohonan/sita_geledah/status">Reload</a></li>
                      </ul>
                 </div>
          <br/>

            <table class="table table-bordered data-table">
            <?php $cek=$this->db->query("SELECT * from tbl_permohonan")->num_rows();?>
                <?php if($cek>=1) { ?>
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Surat</th>
                  <th>Tanggal Surat</th>
                  <th>Perihal</th>
                  <th>Prioritas</th>
                  <th>Tanggal Input Permohonan</th>
                  <th>Kelengkapan Berkas</th>
                  <!-- <th>Jumlah Berkas Upload</th> -->
                  <th>Ceklis PTSP</th>
                  <th>Ceklis WKPN</th>
                  <th>Ceklis Panitera</th>
                  <th>Ceklis Panmud</th> 
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php 
                    if($this->uri->segment(5)){
                          $no=$this->uri->segment(5);
                    } else{
                      $no=0;
                }
                foreach ($status as $row) {
                  $no++;
                      ?>
                     

                    <tr>

                        <td>
                        <?php echo $no; ?>
                        </td>
                          <td>                         
                            <?php echo $row['no_surat']; ?>
                        </td>


                        <td>
                            <?php echo $row['tgl_surat']; ?>
                        </td>
                        <td>
                            <?php echo $row['perihal']; ?>
                        </td>
                        <td>
                            <?php echo $row['prioritas']; ?>
                        </td>
 
                        <td>
                            <?php echo date('d-m-Y',strtotime($row['tgl_reg'] ))
                            ?>
                        </td>
                        <td>
                            <?php if ($row['id_status'] == 3) { ?>
                              <span class="label label-warning"><?php echo "Belum Lengkap" ?></span>
                              <?php } elseif ($row['id_status'] == 3 && $row['id_status'] == 9) {?>
                              <span class="label label-label"><?php echo "Berkas Salah" ?></span>
                            <?php } elseif ($row['id_status'] <= 8) {?>
                              <span class="label label-info"><?php echo "Lengkap" ?></span>
                              <?php } ?>

                        </td>
                        <td>
                            <?php 
                            // echo $row->jml_berkas
                            ?>
                        </td>

                        <td>
                            <?php if ($row['id_status'] == 4) { ?>
                              <span class="label label-warning"><?php echo "Proses" ?></span>
                            <?php } elseif 
                            (
                              // $row->berkas_done_ptsp >= 7 || 
                              $row['id_status'] >= 4) { ?>
                                <span class="label label-success"><?php echo "Selesai" ?></span>
                                <?php } elseif ($row['id_status'] == 9 
                                // && $row->jml_berkas == 7
                                ) {?>
                              <span class="label label-label"><?php echo "Berkas Salah" ?></span>
                                <?php } ?>
                        </td>
                        <td>
                            <?php if ($row['id_status'] == 5) { ?>
                              <span class="label label-warning"><?php echo "Proses" ?></span>
                            <?php } elseif (
                              // $row->berkas_done_wkpn >= 7 || 
                              $row['id_status'] >= 5
                            ) { ?>
                              <span class="label label-success"><?php echo "Selesai" ?></span>
                                <?php } ?>
                        </td>
                        <td>
                            <?php if ($row['id_status'] == 6) { ?>
                              <span class="label label-warning"><?php echo "Proses" ?></span>
                            <?php } elseif (
                              // $row->berkas_done_panitera >= 7 || 
                              $row['id_status'] >= 6) { ?>
                              <span class="label label-success"><?php echo "Selesai" ?></span>
                                <?php } ?>
                        </td>
                        <td>
                            <?php if ($row['id_status'] == 7) { ?>
                              <span class="label label-warning"><?php echo "Proses" ?></span>
                            <?php } elseif (
                              // $row->berkas_done_panmud >= 7|| 
                              $row['id_status'] >= 7) { ?>
                              <span class="label label-success"><?php echo "Selesai" ?></span>
                                <?php } ?>
                        </td>
                        <td>
                        <?php if ($row['id_status'] == 8) { ?>
                          <a class="btn btn-info" href="<?php echo base_url('data/permohonan/upload_berkas/form_upload/'.$row['id_permohonan']);?>" type="button" class="btn btn-xs btn-info" >Upload</a></button>
                          <?php } elseif ($row['id_status'] == 3 
                          // || $row->id_status >= 4 && $row->jml_berkas == 7
                          ) { ?>
                            <a class="btn btn-disabled" type="button" disabled >Upload</a>
                          <?php } ?>
                        </td>
                        
                        
                      </tr>
                      <?php } ?>
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
                  <th>Prioritas</th>
                  <th>Tanggal Input Permohonan</th>
                  <th>Kelengkapan Berkas</th>
                  <th>PTSP</th>
                  <th>WKPN</th>
                  <th>Panitera</th>
                  <th>Panmud</th>
                  <th></th>
                </tr>
                </thead>
                    <tbody id="myTable">
                      <tr>
                            <td width="110" colspan="11" style="text-align:center;">
                              <?php echo "<h3>Tidak Ada Permohonan</h3>"; ?>
                            </td>
                      </tr>
                  </tbody>
                  <?php } ?>



                  
            </table>
            <div id="pagination">
                 <ul class="gp_pagination">
                      <?php foreach ($links as $link) {
                           echo "<li>". $link."</li>";
                      } ?>
                 </ul>
            </div>
            </div>
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
