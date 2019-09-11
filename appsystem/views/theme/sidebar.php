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
                        <i class="fa fa-database"></i> ข้อมูลในระบบ (Data)
                    </a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link sub-menu" href="<?php echo site_url('student_data/list_view'); ?>">
                                <i class="fa fa-dot-circle-o nav-icon"></i> รายชื่อบัณฑิต
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link sub-menu" href="<?php echo site_url('student_data/workplace_view'); ?>">
                                <i class="fa fa-dot-circle-o nav-icon"></i> สถานที่ทำงานบัณฑิต
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa fa-question-circle"></i> คำถาม (Question)
                    </a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link sub-menu" href="<?php echo site_url('question/add_group_view'); ?>">
                                <i class="fa fa-dot-circle-o nav-icon"></i> คุณลักษณะของบัณฑิต
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link sub-menu" href="<?php echo site_url('question/add_view'); ?>">
                                <i class="fa fa-dot-circle-o nav-icon"></i> คำถามแบบสำรวจ
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa fa-envelope"></i> ส่งสำรวจ (Survey)
                    </a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link sub-menu" href="<?php echo site_url('send_survey/student_survey_view'); ?>">
                                <i class="fa fa-dot-circle-o nav-icon"></i> สำรวจบัณฑิต
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link sub-menu" href="<?php echo site_url('send_survey/employer_survey_view'); ?>">
                                <i class="fa fa-dot-circle-o nav-icon"></i> สำรวจผู้ใช้บัณฑิต
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa fa-file-text"></i> รายงาน (Reports)
                    </a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link sub-menu" href="<?php echo site_url('reports/summary'); ?>">
                                <i class="fa fa-dot-circle-o nav-icon"></i> รายงานการสำรวจ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link sub-menu" href="<?php echo site_url('reports/overview'); ?>">
                                <i class="fa fa-dot-circle-o nav-icon"></i> ความพึงพอใจผู้ใช้บัณฑิต
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa fa-user" aria-hidden="true"></i> ผู้ใช้งาน (User)
                    </a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link sub-menu" href="<?php echo site_url('user/add_view'); ?>">
                                <i class="fa fa-dot-circle-o nav-icon"></i> เพิ่มผู้ใช้งาน
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link sub-menu" href="<?php echo site_url('user/list_view'); ?>">
                                <i class="fa fa-dot-circle-o nav-icon"></i> แสดงข้อมูลทั้งหมด
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
