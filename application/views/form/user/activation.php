<!DOCTYPE html>
<html lang="en">
<?php foreach ($approving->result_array() as $row):
        $id_user=$row['id_user'];
        $nama=$row['nama'];
        $nama_satker =$row['nama_satker'];
        $email =$row['email'];
        $tgl_input =$row['tgl_input'];
        $status=$row['status'];
?>
    <?php endforeach;?>

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
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Common elements</a> </div>
    <h1>Approved?</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-center"></i> </span>
            <h5>Info Detail</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="<?php echo base_url().'data/user/activation/send'?>" method="post" class="form-horizontal" id="activation">
              <div class="control-group">
                <div class="controls">
                  <input type="hidden" name="id_user" value="<?php echo $id_user;?>" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Unit Kerja</label>
                <div class="controls">
                  <input type="text" name="nama_satker" value="<?php echo $nama_satker;?>" class="span11" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Nama Pemohon</label>
                <div class="controls">
                  <input type="text" name="nama" value="<?php echo $nama;?>" class="span11"/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                  <input type="email" name="email" value="<?php echo $email;?>" class="span11" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Tanggal Input</label>
                <div class="controls">
                  <input type="text" name="tgl_input" value="<?php echo $tgl_input;?>" class="span11"disabled />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Status :</label>
                <div class="controls">
                  <input type="text" name="status" value="<?php echo $status;?>" class="span11" disabled/>
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-success">Send Active</button>
              </div>
            </form>
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
