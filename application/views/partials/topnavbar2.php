<div id="sidebar">
  <!-- <a href="#" class="visible-phone">Dashboard</a> -->
  <ul>
    <li class="active">
      <a href="<?php echo site_url('home/dashboard') ?>">
      <i class="icon icon-home" ></i> <span >Home</span></a> 
    </li>
    <?php if ($this->session->userdata('id_user_level') >= 1 ) {?>
    <li class="submenu <?=$this->uri->segment(3)=='sita_geledah' || $this->uri->segment(4)=='status' ? 'active':''?>"> <a href="#"><span>Permohonan</span></a>
      <ul>
        <li><a href="<?php echo site_url('data/permohonan/sita_geledah') ?>">Penyitaan dan Penggeledahan</a></li>
        <li><a href="<?php echo site_url('data/permohonan/sita_geledah/status') ?>">Status Permohonan</a></li>
      </ul>
    </li>
    <?php } ?>
    
    <?php if ($this->session->userdata('id_user_level') == 1 ) {?>
    <li class="submenu"> <a href="#"><span>Cek-List</span></a>
      <ul>
        <li><a href="<?php echo site_url('data/permohonan/sita_geledah/ceklist_wkpn') ?>">WKPN</a></li>
        <li><a href="<?php echo site_url('data/permohonan/sita_geledah/ceklist_panitera') ?>">Panitera</a></li>
        <li><a href="<?php echo site_url('data/permohonan/sita_geledah/ceklist_panmud') ?>">Panmud</a></li>
        <li><a href="<?php echo site_url('data/permohonan/sita_geledah/ceklist_ptsp') ?>">PTSP</a></li>
      </ul>
    </li>
    <?php } ?>

    <?php if ($this->session->userdata('id_user_level') == 2 ) {?>
    <li class="submenu "> <a href="#"><span>Cek-List</span></a>

      <ul>
        <li><a href="<?php echo site_url('data/permohonan/sita_geledah/ceklist_wkpn') ?>">WKPN</a></li>
        <!-- <li><a href="<?php echo site_url('data/permohonan/sita_geledah/ceklist_panitera') ?>">Panitera</a></li>
        <li><a href="<?php echo site_url('data/permohonan/sita_geledah/ceklist_panmud') ?>">Panmud</a></li>
        <li><a href="<?php echo site_url('data/permohonan/sita_geledah/ceklist_ptsp') ?>">PTSP</a></li> -->
      </ul>
    </li>
    <?php } ?>

    <?php if ( $this->session->userdata('id_user_level') == 3 ) {?>
    <li class="submenu"> <a href="#"><span>Cek-List</span></a>

      <ul>
        <!-- <li><a href="<?php echo site_url('data/permohonan/sita_geledah/ceklist_wkpn') ?>">WKPN</a></li> -->
        <li><a href="<?php echo site_url('data/permohonan/sita_geledah/ceklist_panitera') ?>">Panitera</a></li>
        <!-- <li><a href="<?php echo site_url('data/permohonan/sita_geledah/ceklist_panmud') ?>">Panmud</a></li>
        <li><a href="<?php echo site_url('data/permohonan/sita_geledah/ceklist_ptsp') ?>">PTSP</a></li> -->
      </ul>
    </li>
    <?php } ?>

    <?php if ($this->session->userdata('id_user_level') == 4 ) {?>
    <li class="submenu"> <a href="#"><span>Cek-List</span></a>
    
      <ul>
        <!-- <li><a href="<?php echo site_url('data/permohonan/sita_geledah/ceklist_wkpn') ?>">WKPN</a></li>
        <li><a href="<?php echo site_url('data/permohonan/sita_geledah/ceklist_panitera') ?>">Panitera</a></li> -->
        <li><a href="<?php echo site_url('data/permohonan/sita_geledah/ceklist_panmud') ?>">Panmud</a></li>
        <!-- <li><a href="<?php echo site_url('data/permohonan/sita_geledah/ceklist_ptsp') ?>">PTSP</a></li> -->
      </ul>
    </li>
    <?php } ?>

    <?php if ($this->session->userdata('id_user_level') == 5 ) {?>
    <li class="submenu"> <a href="#"><span>Cek-List</span></a>
    
      <ul>
        <!-- <li><a href="<?php echo site_url('data/permohonan/sita_geledah/ceklist_wkpn') ?>">WKPN</a></li>
        <li><a href="<?php echo site_url('data/permohonan/sita_geledah/ceklist_panitera') ?>">Panitera</a></li>
        <li><a href="<?php echo site_url('data/permohonan/sita_geledah/ceklist_panmud') ?>">Panmud</a></li> -->
        <li><a href="<?php echo site_url('data/permohonan/sita_geledah/ceklist_ptsp') ?>">PTSP</a></li>
      </ul>
    </li>
    <?php } ?>

    <?php if ($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 5 ){?>
    <li class="submenu"> <a href="#"><span>User</span></a>
      <ul>
      <li><a href="<?php echo site_url('data/user/activation') ?>">Aktivasi User</a></li>
      <li><a href="<?php echo site_url('data/user/activation/true') ?>">Daftar User Aktif</a></li>
      </ul>
    </li>
  </ul>
  <?php } ?>
</div>