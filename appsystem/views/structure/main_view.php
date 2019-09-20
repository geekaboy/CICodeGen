<style media="screen">
    td{
        padding: 5px !important;
        vertical-align:middle !important;
    }
    ol{
        columns: 2;
        -webkit-columns: 2;
        -moz-columns: 2;
    }
</style>
<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">CI:CODE</li>
        <li class="breadcrumb-item active">Structure</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h3>
                            <i class="fa fa-code" aria-hidden="true"></i>
                            Structure
                            <i class="fa fa-code" aria-hidden="true"></i>

                        </h3>
                    </div>
                    <div class="row mt-5" id="div_code_view">
                        <div class="col-md-12">
                            <small>CI:CODE => Copy & Past. Have a good day. :) </small>
                            <!-- tab -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" data-toggle="tab" href="#config">
                                        <i class="fa fa-wrench" aria-hidden="true"></i> Config
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#view" role="tab" aria-controls="view">
                                        <i class="fa fa-file-text-o" aria-hidden="true"></i> Theme
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#javascript" role="tab" aria-controls="javascript">
                                        <i class="fa fa-code" aria-hidden="true"></i> Javascript
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#helper" role="tab" aria-controls="home">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Helper
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#controler" role="tab" aria-controls="controler">
                                        <i class="fa fa-cog" aria-hidden="true"></i> Controller
                                    </a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active show" id="config" role="tabpanel">
                                    <div id="div_intro_codeview">
                                        <?php $this->load->view('structure/intro_codeview'); ?>
                                    </div>
                                </div>
                                <div class="tab-pane" id="view" role="tabpanel">
                                    <div id="div_view_codeview"><?php $this->load->view('structure/view_codeview'); ?></div>
                                </div>
                                <div class="tab-pane" id="javascript" role="tabpanel">
                                    <div id="div_javascript_codeview"><?php $this->load->view('structure/javascript_codeview'); ?></div>
                                </div>
                                <div class="tab-pane" id="helper" role="tabpanel">
                                    <div id="div_helper_codeview">
                                        <?php $this->load->view('helper/plugin_codeview'); ?>
                                    </div>
                                </div>
                                <div class="tab-pane" id="controler" role="tabpanel">
                                    <div id="div_controller_codeview"><?php $this->load->view('structure/controller_codeview'); ?></div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div><!--card-body-->

            </div>
        </div>
    </div>
</main>

<?php $this->load->view('create/option_modal_view'); ?>
