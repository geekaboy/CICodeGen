<?php
$header_html = '<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <meta name="site_url" content="<?php echo site_url(); ?>">
    <meta name="base_url" content="<?php echo base_url(); ?>">

    <title>Project starter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <!--Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- serializejson -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.serializeJSON/2.9.0/jquery.serializejson.min.js"></script>
    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.17.6/dist/sweetalert2.all.min.js"></script>
    <!-- global fn and variable -->
    <script src="<?php echo base_url(\'appjs/global.js\'); ?>"></script>
</head>
<body>
    <?php $this->load->view(\'theme/navbar\'); ?>';
?>

<div class="row">
    <div class="col-md-4">
        <strong><i class="fa fa-cubes" aria-hidden="true"></i> Plugins list</strong>
        <ol>
            <li>
                <a href="https://www.jsdelivr.com/package/npm/bootstrap?version=4.3.0" target="_blank">
                Bootstrap v.4.3.1
                </a>
            </li>
            <li>
                <a href="https://fontawesome.com/v4.7.0/" target="_blank">
                FontAwesome 4.7
                </a>
            </li>
            <li>
                <a href="https://www.jsdelivr.com/package/npm/jquery?version=3.3.1" target="_blank">
                JQuery 3.3.1
                </a>
            </li>
            <li>
                <a href="https://www.jsdelivr.com/package/npm/jquery-serializejson?version=2.9.0" target="_blank">
                SerializeJSON 2.9.0
                </a>
            </li>
            <li>
                <a href="https://www.jsdelivr.com/package/npm/sweetalert2?version=8.17.6" target="_blank">
                SweetAlert2 8.17.6
                </a>
            </li>
        </ol>
    </div>
</div>
<hr>
<h5><i class="fa fa-dot-circle-o" aria-hidden="true"></i> views/theme/header.php</h5>
<pre class="line-numbers language-html" ><code><?php echo htmlspecialchars($header_html); ?></code></pre>


<?php
$navbar_html = '<nav class="navbar navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>';
?>
<hr>
<h5><i class="fa fa-dot-circle-o" aria-hidden="true"></i> views/theme/navbar.php</h5>
<pre class="line-numbers language-html" ><code><?php echo htmlspecialchars($navbar_html); ?></code></pre>

<?php
$main_view_html = '<main role="main" class="container">
    <div class="row mt-3">
      <div class="col-md-12">
          <!-- Put generate code here -->
      </div>
    </div>
</main>';
?>
<hr>
<h5><i class="fa fa-dot-circle-o" aria-hidden="true"></i> views/your_view/main_view.php</h5>
<pre class="line-numbers language-html" ><code><?php echo htmlspecialchars($main_view_html); ?></code></pre>

<?php
$footer_html = '
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
';
?>
<hr>
<h5><i class="fa fa-dot-circle-o" aria-hidden="true"></i> views/theme/footer.php</h5>
<pre class="line-numbers language-html" ><code><?php echo htmlspecialchars($footer_html); ?></code></pre>
