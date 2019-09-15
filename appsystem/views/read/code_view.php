<!--prismjs-->
<link href="<?php echo base_url(); ?>assets/plugins/prismjs/prism.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/plugins/prismjs/prism.js"></script>

<div class="col-md-12">
    <h5><span class="badge badge-pill badge-success">3</span> Copy&Past 🍺</h5>
    <small>CI:CODE => Copy & Past. Have a good day. :) </small>
    <!-- tab -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active show" data-toggle="tab" href="#View" role="tab" aria-controls="home" aria-selected="true">
                <i class="fa fa-file-text-o" aria-hidden="true"></i> View
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#helper" role="tab" aria-controls="profile" aria-selected="false">
                <i class="fa fa-question-circle" aria-hidden="true"></i> Helper
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#controler" role="tab" aria-controls="profile" aria-selected="false">
                <i class="fa fa-cog" aria-hidden="true"></i> Controller
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#model" role="tab" aria-controls="messages" aria-selected="false">
                <i class="fa fa-database" aria-hidden="true"></i> Model
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#javascript" role="tab" aria-controls="messages" aria-selected="false">
                <i class="fa fa-code" aria-hidden="true"></i> Javascipt
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active show" id="View" role="tabpanel">
            <div id="div_view_codeview"><?php $this->load->view('read/view_codeview'); ?></div>
        </div>
        <div class="tab-pane" id="helper" role="tabpanel">
            <div id="div_helper_codeview"><?php $this->load->view('helper/pagination_codeview'); ?></div>

        </div>
        <div class="tab-pane" id="controler" role="tabpanel">
            <div id="div_controller_codeview"><?php $this->load->view('read/controller_codeview'); ?></div>

        </div>
        <div class="tab-pane" id="model" role="tabpanel">
            <div id="div_model_codeview"><?php $this->load->view('read/model_codeview'); ?></div>
        </div>
        <div class="tab-pane" id="javascript" role="tabpanel">
            <div id="div_javascript_codeview"><?php $this->load->view('read/javascript_codeview'); ?></div>
        </div>
    </div>

</div>
