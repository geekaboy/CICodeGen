<?php
$sess = $this->session->userdata();
?>
<style>
.sidebar .nav-link .badge {
    float: left;;
    margin-top: 2px;
    margin-right: 5px;
}
</style>
<div class="app-body">
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">

                <li class="nav-title">MENU</li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('home'); ?>">
                        <i class="fa fa-home"></i> หน้าหลัก (Home)
                    </a>
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa fa-database"></i> Menu list
                    </a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link sub-menu" href="<?php echo site_url(); ?>">
                                <i class="fa fa-dot-circle-o nav-icon"></i> list
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link sub-menu" href="<?php echo site_url(); ?>">
                                <i class="fa fa-dot-circle-o nav-icon"></i> list
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>