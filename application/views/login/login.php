<!DOCTYPE html>
<html lang="en">
    
<?php $this->load->view("partials/header.php") ?>
<link href="<?php echo base_url('assets/css/maruti-login.css') ?>" rel="stylesheet">



    <body>
        <div id="loginbox">            
            <form class="form-vertical" action="<?php echo base_url('auth/process');?>" method="post">
                <div class="control-group normal_text"> <h3><img src="<?php echo base_url('assets/img/LOGO_PN_SAMARINDA_4.png') ?>" ><br><font color="black"></script>e-PINTAS </h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-envelope"></i></span><input type="email" placeholder="e-mail" name="email" required/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="pswd" required/>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <!-- <span class="pull-left"><a href="#" class="flip-link btn btn-inverse" id="to-recover">Lost password?</a></span> -->
                    <span class="pull-left">
                        <a href="<?php echo site_url('data/user/registration') ?>" class="flip-link btn btn-inverse" id="to-recover">Registrasi Pemohon</a></span>
                    <span class="pull-right"><input type="submit" name="login" class="btn btn-success" value="Login" /></span>
                </div>
            </form>
        </div>
        
        <?php $this->load->view("partials/js.php") ?>
        <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script> 
        <script src="<?php echo base_url('assets/js/maruti.login.js') ?>"></script>

    </body>

</html>
