<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="GOVERNMENT CMS.">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <meta name="site_url" content="<?php echo site_url(); ?>">
    <title>CSE Customer Satisfaction Evaluation : Login</title>
    <!-- Icons-->
    <link href="<?php echo base_url(); ?>assets/theme/vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/theme/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/theme/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/theme/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="<?php echo base_url(); ?>assets/theme/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/theme/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
  </head>
  <body class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <div class="text-center">
                  <img src="<?php echo base_url('assets/images/sys_logo.png') ?>"
                    class="img mb-3" width="250">
                  <p class="text-muted">Sign In to your account</p>
                </div>

                <div class="row justify-content-center">
                  <div class="col-md-9 text-center">
                    <form action="<?php echo site_url('login/check_login'); ?>" method="post">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="icon-user"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" name="username">
                      </div>
                      <div class="input-group mb-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="icon-lock"></i>
                          </span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                      </div>
                      <button type="submit" class="btn btn-primary px-4">Login</button>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap and necessary plugins-->
    <script src="<?php echo base_url(); ?>assets/theme/vendors/jquery/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/theme/vendors/popper.js/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/theme/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/theme/vendors/pace-progress/js/pace.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/theme/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/theme/vendors/@coreui/coreui/js/coreui.min.js"></script>
  </body>
</html>
