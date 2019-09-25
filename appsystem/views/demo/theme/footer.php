<!-- Modal preload -->
    <div class="modal" id="model_preload" tabindex="-1"data-backdrop="static"  role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color:#fff0;border:0px;">
                <div class="modal-body text-center pt-5">
                    <br>
                    <br>
                    <br>
                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw text-light"></i><br>
                    <strong class="text-light">In process...</strong>
                </div>
            </div>
        </div>
    </div>
    <!-- Plugins -->
    <?php
    if (isset($plugin)) {
        echo generate_plugin($plugin);
    }
    ?>

    <!-- AppJS-->
    <?php
    if (isset($appjs)) {
        echo generate_plugin($appjs);
    }
    ?>
</body>
</html>
