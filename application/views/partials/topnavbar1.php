<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li class=" dropdown" ><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-user"></i>
      <span class="text"><?php echo $this->session->userdata('nama');?> <b class="caret"></b></span><br>

          <ul class="dropdown-menu">
            <li class=""><a title="" href="#"> <span class="text">Profile</span></a></li>
            <li class=""><a href="" data-toggle="modal" data-target="#logoutModal">Keluar</a></li>
          </ul>
    </li>
    </li>
  </ul>
</div>


<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Yakin Keluar?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?php echo base_url('auth/logout');?>">Keluar</a>
      </div>
    </div>
  </div>
</div>

<!-- <script>
$(document).ready(function() {
  $(".notifications-menu .item").on('click',function() {
    $(this).find('li').toggle();
  });
}); -->
  </script>