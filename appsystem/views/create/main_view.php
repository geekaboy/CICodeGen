<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">CI:CODE</li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <h3><i class="fa fa-code" aria-hidden="true"></i> Create function</h3>
                            </div>
                            <div class="row">
                                <fieldset class="form-group col-md-4">
                                    <label for="inputDeveloper">Developer :</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="inputDeveloper" placeholder="Ex. SS2SEK">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button" id="btnSetDeveloper">Save</button>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="col-md-12">

                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" data-toggle="tab" href="#View" role="tab" aria-controls="home" aria-selected="true">
                                                <i class="fa fa-file-text-o" aria-hidden="true"></i> View
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
                                            <a class="nav-link" data-toggle="tab" href="#appjs" role="tab" aria-controls="messages" aria-selected="false">
                                                <i class="fa fa-code" aria-hidden="true"></i> App.js
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="View" role="tabpanel">
                                            <div style="display:none" id="code_view"><?php $this->load->view('create/view_html'); ?></div>
                                            <div id="code"></div>
                                        </div>
                                        <div class="tab-pane" id="controler" role="tabpanel">
                                            2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                        <div class="tab-pane" id="model" role="tabpanel">
                                            3. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                        <div class="tab-pane" id="appjs" role="tabpanel">
                                            4. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!--card-body-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
