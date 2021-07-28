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
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Permohonan</a> <a href="#" class="current">Penyitaan dan Penggeledahan</a> </div>
    <h1>Form Permohonan</h1>
  </div>
  
  <div class="container-fluid" >
  <div id="notifications"><?php echo $this->session->flashdata('msg_cek_surat'); ?></div>
    <div class="row-fluid" style="text-align:center">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          
            <!-- <h5>Personal-info</h5> -->
          </div>
          <div class="widget-content nopadding">
            <form action="<?php echo base_url().'data/permohonan/sita_geledah/kirim'?>" method="post" class="form-horizontal">
              <div class="control-group">
                <label class="control-label" style="width:350px;height:10px;">Jenis Permohonan </label>
                  <div class="controls">
                      <select name="id_klas" id="id_klas" class="form-control" style="width:450px;height:30px;">
                        <option value="0" disabled selected>-</option>
                        <?php foreach($cmb_klas->result() as $row):?>
                            <option value="<?php echo $row->id_klas;?>"><?php echo $row->nama_klas;?></option>
                        <?php endforeach;?>
                      </select>
                  </div>
               </div>
               <div class="control-group">
                <label class="control-label" style="width:350px;height:10px;">Wilayah Satuan Kerja</label>
                  <div class="controls">
                  <select class="form-control" name="id_satker" id="satker" style="width:450px;height:30px;">
                    <option value="0" disabled selected>-</option>
                      <?php
                      foreach ($cmbSatker as $value) {
                          echo "<option value='$value->id_satker'>$value->nama_satker</option>";
                      }
                      ?>
                  </select>
                  </div>
               </div>
               <div class="control-group">
                <label class="control-label" style="width:350px;height:10px;">Nama Pengirim</label>
                  <div class="controls">
                  <select name="id_user" id="user" class="user form-control" style="width:450px;height:30px;">
                            <option value="0">-Pilih-</option>
                        </select>
                  </div>
               </div>
              <div class="control-group">
                <label class="control-label" style="width:350px;height:10px;">Nomor Surat </label>
                <div class="controls">
                  <input type="text" name="no_surat" class="span11" placeholder="Nomor Surat" style="width:450px;height:30px;"/>
                </div>
              </div>

                 <input type="hidden" name="id_user_level" value="<?php echo $this->session->userdata('id_user_level');?>" />

              <div class="control-group">
                <label class="control-label" style="width:350px;height:10px;">Tanggal Surat</label>
                <div class="controls">
                  <input type="text" id="tgl_surat" name="tgl_surat" placeholder="Tanggal Surat" class="datepicker span11" style="width:450px;height:30px;">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" style="width:350px;height:10px;">Perihal Permohonan</label>
                <div class="controls">
                  <textarea class="span11" name="perihal" placeholder="Perihal Permohonan" style="width:450px;height:60px;"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" style="width:350px;height:10px;">Proritas</label>
                <div class="controls">
                  <input type="text" name="prioritas" class="span11" placeholder="Proritas" style="width:450px;height:30px;"/>
                </div>
              </div>

              <div class="form-actions">
                <button type="submit" class="btn btn-success" style="width:250px;height:40px;" >SIMPAN</button>
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
<script type="text/javascript">
    $("#satker").change(function(){

      // variabel dari nilai combo box kendaraan
      var id_satker = $("#satker").val();

      // Menggunakan ajax untuk mengirim dan dan menerima data dari server
      $.ajax({
          url : "<?php echo base_url();?>data/permohonan/sita_geledah/user",
          method : "POST",
          data : {id_satker:id_satker},
          async : false,
          dataType : 'json',
          success: function(data){
              var html = '';
              var i;

              for(i=0; i<data.length; i++){
                  html += '<option value='+data[i].id_user+'>'+data[i].nama+'</option>';
              }
              $('#user').html(html);

          }
      });
    });
</script>

<script type="text/javascript">
    $('.datepicker').datepicker({
    format: 'dd-mm-yyyy',
    // startDate: '-3d'
});
</script>


<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</html>
