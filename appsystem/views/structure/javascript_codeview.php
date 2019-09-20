<?php
$javascript_codeview = 'var site_url = $(\'meta[name="site_url"]\').attr(\'content\');
var base_url = $(\'meta[name="base_url"]\').attr(\'content\');

function show_preload(){
    $(\'#model_preload\').modal(\'show\');
}
function hide_preload(){
    $(\'#model_preload\').modal(\'hide\');
}';

?>
<h5>
    <i class="fa fa-dot-circle-o" aria-hidden="true"></i> appjs/global.js
</h5>
<pre class="line-numbers language-javascript" ><code><?php echo htmlspecialchars($javascript_codeview); ?></code></pre>
