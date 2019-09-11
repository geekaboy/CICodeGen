            <!-- Modal -->
            <div class="modal" id="model_preload" tabindex="-1"data-backdrop="static"  role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background-color:#fff0;border:0px;">
                        <div class="modal-body text-center pt-5">
                            <br>
                            <br>
                            <br>
                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw text-light"></i><br>
                            <strong class="text-light">โปรดรอ...</strong>
                        </div>
                    </div>
                </div>
            </div>


        </div><!-- end app body -->
        <footer class="app-footer">
            <div class="ml-auto">
                <span>Modify with ♥️ SS2SEK</span>
            </div>
        </footer>

    <!-- Bootstrap and necessary plugins-->

    <script src="<?php echo base_url(); ?>assets/theme/vendors/popper.js/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/theme/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/theme/vendors/pace-progress/js/pace.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/theme/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/theme/vendors/@coreui/coreui/js/coreui.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert_all.js"></script>

    <script src="<?php echo base_url(); ?>appjs/global_variable.js"></script>

        <!-- Plugins -->
        <?php
        if (isset($plugin)) {
            echo get_plugin($plugin);
        }
        ?>

        <!-- AppJS-->
        <?php
        if (isset($appjs)) {
            echo get_plugin($appjs);
        }
        ?>
    </body>

</html>
