<?php
$ex= explode('.', $db_table);
$classname = ucfirst($ex[1]);
$controller_name = mb_strtolower($ex[1]);
$model_code = htmlspecialchars(
'$(document).ready(function() {


});//END Ready

function save(){
    $(\'.btn-save\').attr("disabled", true);
    var url = site_url+"'.$controller_name.'/save";
    var param = $(\'form[name="'.$form_name.'"]\').serializeJSON();
    $.post(url, param, function(resp, textStatus, xhr) {
        if(resp.is_success){
            alert(resp.msg);
            setTimeout(function () {
                window.location.reload();
            }, 2000);
        }else{
            $(\'.btn-save\').attr("disabled", false);
            alert(resp.msg);
        }
    },\'json\').fail(function(){
        $(\'.btn-save\').attr("disabled", false);
        alert(\'Fail\');

    });
}
');
?>
<h5>Add below code to your javascript place.</h5>
<pre class="line-numbers language-javascript"><code><?php echo $model_code; ?></code></pre>
