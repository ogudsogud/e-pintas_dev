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
    <div id="breadcrumb"> 
      <!-- <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> -->
    </div>
  </div>
  <div class="container-fluid">
  <!-- <br>
  <br> -->
   	<!-- <div class="quick-actions_homepage">
      <ul class="quick-actions">
            <li> <a href="<?php echo site_url('dashboard') ?>"> <i class="icon-dashboard"></i> Dashboard </a> </li>
            <li> <a href="#"> <i class="icon-web"></i> Modul 1</a> </li>
            <li> <a href="#"> <i class="icon-people"></i>Modul 2</a> </li>
            <li> <a href="#"> <i class="icon-calendar"></i>Modul 4</a> </li>
          </ul>
   </div> -->
   
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> 
            <!-- <h5>Line chart</h5> -->
          </div>
          <div class="widget-content">
            <div class="pie"> <h3>VISI :</h3>

<h5>TERWUJUDNYA PENGADILAN NEGERI/HI/TIPIKOR SAMARINDA KELAS IA YANG AGUNG<h5>

<h3>MISI :</h3>

<h5><p>Menjaga kemandirian Pengadilan Negeri/HI/Tipikor Samarinda Kelas IA<br>
Memberikan pelayanan hukum yang berkeadilan kepada pencari keadilan<br>
Meningkatkan kualitas kepemimpinan Pengadilan Negeri/HI/Tipikor Samarinda Kelas IA<br>
Meningkatkan kredibilitas dan transparansi Pengadilan Negeri/HI/Tipikor Samarinda Kelas IA</p></h5></div>
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
