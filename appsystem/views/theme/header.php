<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <meta name="site_url" content="<?php echo site_url(); ?>">
    <meta name="base_url" content="<?php echo base_url(); ?>">

    <title>CI:Code Generator</title>
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <!-- Icons-->
    <link href="<?php echo base_url('assets/theme/vendors/@coreui/icons/css/coreui-icons.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/theme/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/theme/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/theme/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="<?php echo base_url(); ?>assets/theme/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/theme/vendors/pace-progress/css/pace.min.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/theme/vendors/jquery/js/jquery.min.js"></script>

    <!--JQueryUI -->
    <script src="<?php echo base_url(); ?>assets/plugins/JQuery/jquery-ui/jquery-ui.min.js"></script>
    <link href="<?php echo base_url(); ?>assets/plugins/JQuery/jquery-ui/jquery-ui.min.css" rel="stylesheet">



    <style>
     body{
        font-family: 'Sarabun', serif;
     }
     .sub-menu{
         font-size: 14px;
     }
     @font-face {
       font-family: 'Fira Code';
       src: url('<?php echo base_url('assets/fonts/FiraCode-Regular.woff'); ?>') format('woff2'),
         url("woff/FiraCode-Light.woff") format("woff");
       font-weight: 300;
       font-style: normal;
     }
     code{
         font-family: 'Fira Code', 'Sarabun', serif !important;
     }
    </style>
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <?php $this->load->view('theme/navbar.php'); ?>
