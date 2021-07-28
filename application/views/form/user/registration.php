<!DOCTYPE html>
<html lang="en">
<script src="<?php echo base_url('assets/js/jquery-3.4.1.min.js') ?>"></script>
<?php $this->load->view("partials/header.php") ?>

<link href="<?php echo base_url('assets/css/maruti-login.css') ?>" rel="stylesheet">


<body>
        <div id="loginbox">            
            <form id="registration" class="form-vertical" action="<?php echo base_url().'data/user/registration/kirim'?>" method="post">
                <div class="control-group normal_text"> <font color="black"> Registrasi User Pemohon </h3></div>
                  <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                        <select name="id_unit" id="unit" class="form-control" style="width:300px;height:30px;" required>
                            <option value="0" disabled selected>-Pilih-</option>
                            <?php
                                foreach ($cmbUnit as $value) {
                                    echo "<option value='$value->id_unit'>$value->nama_unit</option>";
                                }
                            ?>
                        </select>
                        </div>
                        <br>
                        <div class="main_input_box">
                        <select name="id_satker" id="satker" class="form-control input-lg" style="width:295px;height:32px;">
                          <option value="">-Pilih-</option>
                        </select>
                        </div>
                        
                        <br>
                        <div class="main_input_box">
                                <input name="nama" type="text" placeholder="Nama" style="width:287px;height:20px;" required/>
                        </div>
                        <br>
                        <div class="main_input_box">
                                <input name = "nip" type="text" placeholder="NIP/NRP" style="width:287px;height:20px;" required/>
                        </div>
                        <br>
                        <div class="main_input_box">
                                <input name = "jabatan" type="text" placeholder="Jabatan" style="width:287px;height:20px;" required/>
                        </div>
                        <br>
                        <div class="main_input_box">
                                <input name = "email" type="text" placeholder="e-mail Aktif" style="width:287px;height:20px;" required/>
                        </div>
                        <br>
                        <div class="main_input_box">
                                <input name = "pswd" type="password" placeholder="Password" style="width:287px;height:20px;" required/>
                        </div>
                        <br>
                        <div class="main_input_box">
                          <select name="id_user_level" style="width:300px;height:30px;" required>
                            <option value="" disabled selected>Pilih User</option>
                            <option value="6">Pemohon</option>
                            <option value="2">WKPN</option>
                            <option value="3">Panitera</option>
                            <option value="4">Panmud</option>
                            <option value="5">PTSP</option>


                          </select>
                        </div>
                    </div>
                    

                    <div class="form-actions">
                    <button class="btn btn-primary" href="#" type="button" data-toggle="modal" data-target="#regis"><i class="fa fa-fw fa-lg fa-check-circle"></i> Kirim</a></button>
                      &nbsp;<span class=""><a href="<?php echo base_url('auth/login') ?>" class="flip-link btn btn-inverse" id="to-login">&laquo; Cancel</a></span>
                    </div>
              </div>


              <div class="modal fade" id="regis" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel"></h3>
                          </div>
                          <form class="form-horizontal" method="post" action="<?php echo base_url().'data/user/registration/kirim'?>">
                            <div class="modal-body">
                              Data akan Diperiksa <br>
                              Silahkan Menunggu Konfirmasi Email
                            </div>
                              <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Kembali</button>
                                <button class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>OK</button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
            </form>            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>



<script type="text/javascript">
   $("#unit").change(function(){

// variabel dari nilai combo box kendaraan
var id_unit = $("#unit").val();

// Menggunakan ajax untuk mengirim dan dan menerima data dari server
$.ajax({
    url : "<?php echo base_url();?>data/user/registration/satker",
    method : "POST",
    data : {id_unit:id_unit},
    async : false,
    dataType : 'json',
    success: function(data){
        var html = '';
        var i;

        for(i=0; i<data.length; i++){
            html += '<option value='+data[i].id_satker+'>'+data[i].nama_satker+'</option>';
        }
        $('#satker').html(html);

    }
});
});
</script>


<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

</html>
