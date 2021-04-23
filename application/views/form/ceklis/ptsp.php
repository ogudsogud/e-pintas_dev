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
    <h1>Ceklist Detil PTSP</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-content nopadding">
        <form method="post" action="<?php echo base_url('data/permohonan/upload_berkas/update_all_ptsp') ?>" id="form-update">
            <table class="table table-bordered table-striped">
                <?php $cek=$this->db->query("SELECT * FROM tbl_permohonan WHERE id_status = 4")->num_rows(); ?>
                    <?php if($cek>=1) { ?>
                <thead>
                
                    <tr>
                    <th>No</th>
                    <th>No Surat</th>
                    <th>Nama Berkas</th>
                    <th>Tanggal Upload</th>
                    <th>
                    <!-- Checking All<br>
                    <input type="checkbox" id="check-all"> -->
                    </th>
                    <?php 
                        $no=1;
                        foreach ($view_berkas->result_array() as $row):
                          $id_permohonan =$row['id_permohonan'];
                          $no_surat =$row['no_surat'];
                          $id_file =$row['id_file'];
                          $filename =$row['filename'];
                          $tgl_surat =$row['tgl_upload'];

                            ?>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td width="30">
                            <?php echo $no++; ?>
                            </td>
                            <td>                         
                                <?php echo $no_surat; 
                                ?>
                            </td>
                            <td>
                            <?php echo $filename?><br><br>
                                <embed src="<?php echo base_url('berkas_ceklis/'.$filename);?>" width="550px" height="300px">
                            </td>
                            <td>
                                <?php echo $tgl_surat ?>
                            </td>
    
                            <td>
                              <label>
                                <input type="checkbox" class="check-item" name="id_file[]" value="<?php echo $id_file;?>"> OK<br>
                                <input type="hidden" class="check-item" name="id_permohonan" value="<?php echo $id_permohonan;?>"><br>
                              </label>
                            </td>
                            <?php endforeach; ?>
                          </tr>
                </tbody>

                <?php } else {
                        ?>
                    <thead>
                    <tr bgcolor="#87CEFA">
                    <th>No</th>
                    <th>No Surat</th>
                    <th>Nama Berkas</th>
                    <th>Tanggal Upload</th>
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
            <hr>
            <button type="button" id="btn-update" class="btn btn-primary" style="width:130px;height:30px;" >Kirim</button>
            <button class="btn btn-danger" href="#" type="button" data-toggle="modal" data-target="#delete_berkas_ptsp<?php echo $id_permohonan;?>"> Permohonan Canceled</a></button>
            <!-- <button type="button" id="btn-delete" class="btn btn-danger" style="width:150px;height:30px;" >Permohonan Ulang</button> -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php foreach ($view_berkas->result_array() as $pkrrow): 
        $id_permohonan =$row['id_permohonan'];
        $no_surat =$row['no_surat'];
      ?>
  <div class="modal fade" id="delete_berkas_ptsp<?php echo $id_permohonan;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="myModalLabel">Berkas Ceklist Canceled</h3>
        </div>
        <form class="form-horizontal" method="post" action="<?php echo base_url('data/permohonan/upload_berkas/canceled') ?>">
          <div class="modal-body">
            <p>No. Surat&nbsp;&nbsp;: <b><?php echo $no_surat;?><br></b></p>
          </div>
            <div class="modal-footer">
              <input type="hidden" name="id_permohonan" value="<?php echo $id_permohonan;?>">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
              <button class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>Canceled</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach;?>


<?php $this->load->view("partials/footer.php") ?>
<?php $this->load->view("partials/js.php") ?>

<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    $("#check-all").click(function(){ // Ketika user men-cek checkbox all
      if($(this).is(":checked")) // Jika checkbox all diceklis
        $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
      else // Jika checkbox all tidak diceklis
        $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
    });
    
    $("#btn-update").click(function(){ // Ketika user mengklik tombol delete
      var confirm = window.confirm("Apakah Sudah Lengkap?"); // Buat sebuah alert konfirmasi

      if(confirm) // Jika user mengklik tombol "Ok"
        $("#form-update").submit(); // Submit form
    });


     $("#btn-delete").click(function(){ // Ketika user mengklik tombol delete
      var confirm = window.confirm("Karena Berkas Tidak Lengkap ?"); // Buat sebuah alert konfirmasi
      
      if(confirm) // Jika user mengklik tombol "Ok"
        $("#form-delete").submit(); // Submit form
    });


  });

  </script>
</body>
</html>
