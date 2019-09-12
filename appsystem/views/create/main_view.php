<style media="screen">
    td{
        padding: 5px !important;
        vertical-align:middle !important;
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
                    <div class="row mt-3">
                        <fieldset class="form-group col-md-4">
                            <h5>
                                <span class="badge badge-pill badge-success">1</span> Database table list :
                            </h5>
                            <select class="form-control" name="db_table" id="db_table">
                                <option value="">Select table</option>
                            <?php foreach ($table_list as $key => $table): ?>
                                <option value="<?php echo $table->table_schema.'.'.$table->table_name; ?>">
                                    <?php echo $table->table_schema.'.'.$table->table_name; ?>
                                </option>
                            <?php endforeach; ?>
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
