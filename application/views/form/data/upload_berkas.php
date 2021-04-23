<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("partials/header.php") ?>

<body>
<?php foreach($data->result_array() as $row) : 
    $no_surat=$row['no_surat'];
    $tgl_surat=$row['tgl_surat'];
    $id_permohonan=$row['id_permohonan'];
    $nama_klas=$row['nama_klas'];
    $id_status=4;

  ?>
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
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Permohonan</a> <a href="#" class="current">Penyitaan dan Penggeledahan</a> </div>
    <h1>Form Permohonan</h1>
  </div>
  
  <div class="container-fluid" >
    <div class="row-fluid" style="text-align:center">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <!-- <h5>Personal-info</h5> -->
          </div>
          
          <div class="widget-content nopadding">
         
            <form enctype="multipart/form-data" action="<?php echo base_url().'data/permohonan/upload_berkas/proses'?>" method="post" class="form-horizontal">

            <div class="form-group">
                        <input name="id_permohonan" value="<?php echo $id_permohonan;?>" class="form-control" type="hidden" >
                      </div>
            
              <div class="control-group">
                <label class="control-label" style="width:500px;height:10px;">Nomor Surat</label>
                <div class="controls">
                  <input type="text" name="no_surat" value="<?php echo $no_surat; ?>" style="width:550px;height:30px;" placeholder="Tanggal Surat" class="datepicker span11" style="width:450px;height:30px;">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" style="width:500px;height:10px;">Permohonan</label>
                <div class="controls">
                  <input type="text" id="nama_klas" value="<?php echo $nama_klas; ?>" style="width:550px;height:30px;"placeholder="Tanggal Surat" class="datepicker span11" style="width:450px;height:30px;">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" style="width:500px;height:30px;">Permohonan Penyitaan/Penggeledahan</label>
                <div class="controls">
                <input type="file" name="berkas[]" style="width:550px;height:30px;" required>
                <input type="hidden" name="id_permohonan[]" value="<?php echo $id_permohonan; ?>">
                <input type="hidden" name="id_status[]" value="<?php echo 4; ?>">
                <input type="hidden" name="tgl_upload[]" value="<?php echo date("Y-m-d"); ?>">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" style="width:500px;height:30px;">Laporan Polisi (LP)</label>
                <div class="controls">
                <input type="file" name="berkas[]" style="width:550px;height:30px;" required>
                <input type="hidden" name="id_permohonan[]" value="<?php echo $id_permohonan; ?>">
                <input type="hidden" name="id_status[]" value="<?php echo 4; ?>">
                <input type="hidden" name="tgl_upload[]" value="<?php echo date("Y-m-d"); ?>">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" style="width:500px;height:30px;">Surat Perintah Penyidikan</label>
                <div class="controls">
                <input type="file" name="berkas[]" style="width:550px;height:30px;" required>
                <input type="hidden" name="id_permohonan[]" value="<?php echo $id_permohonan; ?>">
                <input type="hidden" name="id_status[]" value="<?php echo 4; ?>">
                <input type="hidden" name="tgl_upload[]" value="<?php echo date("Y-m-d"); ?>">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" style="width:500px;height:30px;">Surat Dimulai Penyidikan</label>
                <div class="controls">
                <input type="file" name="berkas[]" style="width:550px;height:30px;" required>
                <input type="hidden" name="id_permohonan[]" value="<?php echo $id_permohonan; ?>">
                <input type="hidden" name="id_status[]" value="<?php echo 4; ?>">
                <input type="hidden" name="tgl_upload[]" value="<?php echo date("Y-m-d"); ?>">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" style="width:500px;height:30px;">Surat Perintah Penyitaan/Penggeledahan</label>
                <div class="controls">
                <input type="file" name="berkas[]" style="width:550px;height:30px;" required>
                <input type="hidden" name="id_permohonan[]" value="<?php echo $id_permohonan; ?>">
                <input type="hidden" name="id_status[]" value="<?php echo 4; ?>">
                <input type="hidden" name="tgl_upload[]" value="<?php echo date("Y-m-d"); ?>">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" style="width:500px;height:30px;">BA Penyitaan/Penggeledahan</label>
                <div class="controls">
                <input type="file" name="berkas[]" style="width:550px;height:30px;" required>
                <input type="hidden" name="id_permohonan[]" value="<?php echo $id_permohonan; ?>">
                <input type="hidden" name="id_status[]" value="<?php echo 4; ?>">
                <input type="hidden" name="tgl_upload[]" value="<?php echo date("Y-m-d"); ?>">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" style="width:500px;height:30px;">Resume</label>
                <div class="controls">
                <input type="file" name="berkas[]" style="width:550px;height:30px;" required>
                <input type="hidden" name="id_permohonan[]" value="<?php echo $id_permohonan; ?>">
                <input type="hidden" name="id_status[]" value="<?php echo 4; ?>">
                <input type="hidden" name="tgl_upload[]" value="<?php echo date("Y-m-d"); ?>">
                </div>
              </div>

              <div class="form-actions">
              &nbsp;<span class=""><a href="<?php echo base_url('data/permohonan/sita_geledah/status') ?>" class="flip-link btn btn-inverse" id="to-login">&laquo; Cancel</a></span>
                <button type="submit" class="btn btn-primary" style="width:130px;height:30px;" >Upload</button>
              </div>
            </form>
            <?php endforeach;?>
          </div>
        </div>
      </div>
    </div><hr>
    
  </div>
</div>
</div>
<?php $this->load->view("partials/footer.php") ?>
<?php $this->load->view("partials/js.php") ?>
</body>
</html>
