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
        <li class="breadcrumb-item active">Create</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h3>
                            <i class="fa fa-code" aria-hidden="true"></i>
                            Create
                            <i class="fa fa-code" aria-hidden="true"></i>

                        </h3>
                    </div>
                    <h5>
                        <span class="badge badge-pill badge-success">1</span> Select database
                    </h5>
                    <div class="row mt-3">
                        <fieldset class="form-group col-md-3">

                            <select class="form-control" name="db_schema" id="db_schema">
                                <option value="">Select schema</option>
                            <?php foreach ($schema_list as $key => $schema): ?>
                                <option value="<?php echo $schema->table_schema; ?>">
                                    <?php echo $schema->table_schema; ?>
                                </option>
                            <?php endforeach; ?>
                            </select>

                        </fieldset>
                        <fieldset class="form-group col-md-4">
                            <select class="form-control" name="db_table" id="db_table">

                            </select>

                        </fieldset>
                    </div>

                    <div class="row mt-3" id="div_build_form"></div>
                    <div class="row mt-5" id="div_code_view"></div>

                </div><!--card-body-->

            </div>
        </div>
    </div>
</main>

<?php $this->load->view('create/option_modal_view'); ?>
