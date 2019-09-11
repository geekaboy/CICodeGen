  <?php
    $sess = $this->session->userdata();

    ?>
  <header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
          <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
          <!-- <img class="navbar-brand-full" src="<?php echo base_url(); ?>assets/images/lotto.png" width="85"> -->
          <h3 style="color:#FE6B32;font-weight:bold;">CRRU CSE</h3>
      </a>
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
          <span class="navbar-toggler-icon"></span>
      </button>

      <ul class="nav navbar-nav ml-auto">

          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  <img class="img-avatar" src="<?php echo base_url(); ?>assets/images/user.svg" alt="admin@bootstrapmaster.com">
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                  <div class="dropdown-header text-center">
                      <strong>Account</strong>
                  </div>
                  <a class="dropdown-item" href="<?php echo site_url('login/logout'); ?>">
                      <i class="fa fa-lock"></i> Logout</a>
              </div>

          </li>
          <li class="nav-item d-none d-sm-block">
              <a class="nav-link" href="#"><?php echo $sess['fullname']; ?></a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('login/logout'); ?>" data-toggle="tooltip" data-placement="left" title="ออกจากระบบ">
                  <i class="fa fa-sign-out" style="font-size:25px;"></i>
              </a>

          </li>
      </ul>
  </header>
  <?php $this->load->view('theme/sidebar.php'); ?>
