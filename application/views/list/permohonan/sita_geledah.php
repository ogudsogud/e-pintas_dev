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
    <h1>Status Permohonan</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">

          <div class="widget-content padding" style="overflow-x:auto;">
          <form action="<?php echo base_url('data/permohonan/sita_geledah/find_status');?>" method="get">
                <div class="control-group padding" >
                  <div class="main_input_box " >
                    <input type="text" name="keyword" placeholder="Pencarian Data" style="width:300px;height:30px;">
                    <button type="submit" class="buttonload" style="width:100px;height:30px;"><i class="icon-search"></i>&nbsp;&nbsp; Cari&nbsp;&nbsp; </button><br>
                    <a type="button" href="<?php echo site_url('data/permohonan/sita_geledah/status') ?>" class="btn btn-success" name="btn"><i class="icon-refresh"></i>&nbsp;Refresh<i class="fa fa-fw fa-lg fa-refresh"></i></a>
                    <a type="button" href="<?php echo site_url('data/permohonan/sita_geledah') ?>" class="btn btn-info" name="btn"><i class="icon-plus"></i>&nbsp;Permohonan Baru<i class="fa fa-fw fa-lg fa-refresh"></i></a>
                  </div>
                </div>
            </form>
            <table class="table table-bordered data-table">
            <?php $cek=$this->db->query("SELECT * from tbl_permohonan")->num_rows();?>
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
                  <th>Kelengkapan Berkas</th>
                  <th>Jumlah Berkas Upload</th>
                  <th>Ceklis PTSP</th>
                  <th>Ceklis WKPN</th>
                  <th>Ceklis Panitera</th>
                  <th>Ceklis Panmud</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php 
                      $no=1;
                      foreach ($status->result() as $row):
                        
                            // $id_permohonan=$row['id_permohonan'];
                            // $id_user=$row['id_user'];
                            // $no_surat =$row['no_surat'];
                            // $nama_klas=$row['nama_klas'];
                            // $nama =$row['nama'];
                            // $nama_satker =$row['nama_satker'];
                            // $tgl_surat =$row['tgl_surat'];
                            // $perihal =$row['perihal'];
                            // $prioritas=$row['prioritas'];
                            // $tgl_reg=$row['tgl_reg'];
                            // $berkas_done_ptsp=$row['berkas_done_ptsp'];
                            // $berkas_done_wkpn=$row['berkas_done_wkpn'];
                            // $berkas_done_panitera=$row['berkas_done_panitera'];
                            // $berkas_done_panmud=$row['berkas_done_panmud'];
                            // $jml_berkas=$row['jml_berkas'];
                            // $id_status =$row['id_status'];
                            // $status =$row['status'];


                        ?>

                    <tr>

                        <td>
                        <?php echo $no++; ?>
                        </td>
                          <td>                         
                            <?php echo $row->no_surat; ?>
                        </td>
                        <td>
                            <?php echo $row->nama_klas ?>
                        </td>
                        <td>
                            <?php echo $row->nama_satker ?>
                        </td>
                        <td>
                            <?php echo $row->nama ?>
                        </td>
                        <td>
                            <?php echo $row->tgl_surat ?>
                        </td>
                        <td>
                            <?php echo $row->perihal ?>
                        </td>
                        <td>
                            <?php echo $row->prioritas ?>
                        </td>
 
                        <td>
                            <?php echo date('d-m-Y',strtotime($row->tgl_reg))
                            ?>
                        </td>
                        <td>
                            <?php if ($row->id_status == 3 && $row->jml_berkas == 0) { ?>
                              <span class="label label-warning"><?php echo $row->status ?></span>
                              <?php } elseif ($row->id_status == 3 && $row->jml_berkas == 7) {?>
                              <span class="label label-label"><?php echo "Berkas Salah" ?></span>
                            <?php } elseif ($row->jml_berkas <= 7) {?>
                              <span class="label label-info"><?php echo "Lengkap" ?></span>
                              <?php } ?>

                        </td>
                        <td>
                            <?php echo $row->jml_berkas?>
                        </td>

                        <td>
                            <?php if ($row->id_status == 4) { ?>
                              <span class="label label-warning"><?php echo $row->status ?></span>
                            <?php } elseif ($row->berkas_done_ptsp >= 7 || $row->id_status >= 4) { ?>
                                <span class="label label-success"><?php echo "Selesai" ?></span>
                                <?php } elseif ($row->id_status == 3 && $row->jml_berkas == 7) {?>
                              <span class="label label-label"><?php echo "Berkas Salah" ?></span>
                                <?php } ?>
                        </td>
                        <td>
                            <?php if ($row->id_status == 5) { ?>
                              <span class="label label-warning"><?php echo $row->status ?></span>
                            <?php } elseif ($row->berkas_done_wkpn >= 7 || $row->id_status >= 5) { ?>
                              <span class="label label-success"><?php echo "Selesai" ?></span>
                                <?php } ?>
                        </td>
                        <td>
                            <?php if ($row->id_status == 6) { ?>
                              <span class="label label-warning"><?php echo $row->status ?></span>
                            <?php } elseif ($row->berkas_done_panitera >= 7 || $row->id_status >= 6) { ?>
                              <span class="label label-success"><?php echo "Selesai" ?></span>
                                <?php } ?>
                        </td>
                        <td>
                            <?php if ($row->id_status == 7) { ?>
                              <span class="label label-warning"><?php echo $row->status ?></span>
                            <?php } elseif ($row->berkas_done_panmud >= 7|| $row->id_status >= 7) { ?>
                              <span class="label label-success"><?php echo "Selesai" ?></span>
                                <?php } ?>
                        </td>
                        <td>
                        <?php if ($row->jml_berkas < 7) { ?>
                          <a class="btn btn-info" href="<?php echo base_url('data/permohonan/upload_berkas/form_upload/'.$row->id_permohonan);?>" type="button" class="btn btn-xs btn-info" >Upload</a></button>
                          <?php } elseif ($row->id_status >= 4 || $row->id_status == 3 && $row->jml_berkas == 7) { ?>
                            <a class="btn btn-disabled" type="button" disabled >Upload</a>
                          <?php } ?>
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



                  <?php 
                      if(isset($_POST['submit'])) {
                        $cari = $_POST['keyword'];
                        if(!empty($cari)) 
                          {
                        $no=1;
                        foreach ($status->result() as $row):
                        
                            // $id_permohonan=$row['id_permohonan'];
                            // $id_user=$row['id_user'];
                            // $no_surat =$row['no_surat'];
                            // $nama_klas=$row['nama_klas'];
                            // $nama =$row['nama'];
                            // $nama_satker =$row['nama_satker'];
                            // $tgl_surat =$row['tgl_surat'];
                            // $perihal =$row['perihal'];
                            // $prioritas=$row['prioritas'];
                            // $tgl_reg=$row['tgl_reg'];
                            // $berkas_done_ptsp=$row['berkas_done_ptsp'];
                            // $berkas_done_wkpn=$row['berkas_done_wkpn'];
                            // $berkas_done_panitera=$row['berkas_done_panitera'];
                            // $berkas_done_panmud=$row['berkas_done_panmud'];
                            // $jml_berkas=$row['jml_berkas'];
                            // $id_status =$row['id_status'];
                            // $status =$row['status'];


                        ?>

                    <tr>

                        <td>
                        <?php echo $no++; ?>
                        </td>
                        <td>                         
                            <?php echo $row->no_surat; ?>
                        </td>
                        <td>
                            <?php echo $row->nama_klas ?>
                        </td>
                        <td>
                            <?php echo $row->nama_satker ?>
                        </td>
                        <td>
                            <?php echo $row->nama ?>
                        </td>
                        <td>
                            <?php echo $row->tgl_surat ?>
                        </td>
                        <td>
                            <?php echo $row->perihal ?>
                        </td>
                        <td>
                            <?php echo $row->prioritas ?>
                        </td>
 
                        <td>
                            <?php echo date('d-m-Y',strtotime($tgl_reg))
                            ?>
                        </td>
                        <td>
                            <?php if ($id_status == 3 ) { ?>
                                <span><font color="black"><?php echo $status ?></span>
                            <?php } elseif ($jml_berkas <= 7) {?>
                              <span><font color="blue"><?php echo "Lengkap" ?></span>
                              <?php } ?>
                        </td>
                        <td>
                            <?php echo $jml_berkas?>
                        </td>

                        <td>
                            <?php if ($id_status == 4) { ?>
                                <span><font color="orange"><?php echo $status ?></span>
                            <?php } elseif ($berkas_done_ptsp >= 7 || $id_status >= 4) { ?>
                                <font color="green"><?php echo "Ceklis PTSP Selesai" ?></span>
                                <?php } ?>
                        </td>
                        <td>
                            <?php if ($id_status == 5) { ?>
                                <span><font color="orange"><?php echo $status ?></span>
                            <?php } elseif ($berkas_done_wkpn >= 7 || $id_status >= 5) { ?>
                                <font color="green"><?php echo "Ceklis WKPN Selesai" ?></span>
                                <?php } ?>
                        </td>
                        <td>
                            <?php if ($id_status == 6) { ?>
                                <span><font color="orange"><?php echo $status ?></span>
                            <?php } elseif ($berkas_done_panitera >= 7 || $id_status >= 6) { ?>
                                <font color="green"><?php echo "Ceklis Panitera Selesai" ?></span>
                                <?php } ?>
                        </td>
                        <td>
                            <?php if ($id_status == 7) { ?>
                                <span><font color="orange"><?php echo $status ?></span>
                            <?php } elseif ($berkas_done_panmud >= 7|| $id_status >= 7) { ?>
                                <font color="green"><?php echo "Ceklis Panmud Selesai" ?></span>
                                <?php } ?>
                        </td>
                        <td>
                        <?php if ($jml_berkas < 7) { ?>
                          <a class="btn btn-primary" href="<?php echo base_url('data/permohonan/upload_berkas/form_upload/'.$id_permohonan);?>" type="button" class="btn btn-xs btn-info" >Upload</a></button>
                          <?php } elseif ($id_status >= 4) { ?>
                            <a class="btn btn-disabled" href="" type="button" disabled >Upload</a></button>
                          <?php } ?>
                        </td>
                        
                        
                      </tr>
                          <?php endforeach; ?>
                          
              </tbody>
              <?php }  ?>
            <?php } ?>

            </table>
            <div class="pagination">
                <!-- <div class="col"> -->
                    <!--Tampilkan pagination-->
                    <?php echo $pagination; ?>
                <!-- </div> -->
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
