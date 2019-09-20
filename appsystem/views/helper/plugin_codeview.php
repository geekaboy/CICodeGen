<?php
$helper_codeview = htmlspecialchars('<?php
function generate_plugin($file_path){
  $import_script = \'\';
  foreach ($file_path as $key => $file) {
    if(substr($file, -3, 3) == \'.js\'){
      $import_script .= \'<script src="\'.base_url().$file.\'"></script>
    \';
    }else{
      $import_script .= \'<link rel="stylesheet" href="\'.base_url().$file.\'">
    \';
    }

  }
  return $import_script;

}//end function
?>');
?>
<h5>
    Create file plugin_helper.php in application/helpers and copy below code to plugin_helper.php<br>
    <small class="text-warning">&nbsp;&nbsp;&nbsp;&nbsp;Note: If you have pagination_helper.php skip this step.</small>
</h5>
<pre class="line-numbers language-php"><code><?php echo $helper_codeview; ?></code></pre>
