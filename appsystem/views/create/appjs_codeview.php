<?php
$ex= explode('.', $db_table);
$classname = ucfirst($ex[1]);
$model_code = htmlspecialchars(
'$(document).ready(function() {

    $(\'form[name="'.$form_name.'"]\').on(\'submit\', save);
});//END Ready

function save(event){
    event.preventDefault();
    $(\'#btn_sendForm\').attr("disabled", true);
    var url = $(this).attr(\'action\');
    var param = $(this).serializeJSON();
    $.post(url, param, function(resp, textStatus, xhr) {

        if(resp.is_success){
            new PNotify({
                title: \'สำเร็จ\',
                text: resp.msg,
                type: \'success\'
            });

            setTimeout(function () {
                window.location.reload();
            }, 2000);


        }else{
            $(\'.btn-save\').attr("disabled", false);

            new PNotify({
                title: \'แจ้งเตือน\',
                text: resp.msg,
                type: \'warning\'
            });
        }


    },\'json\').fail(function(){
        $(\'.btn-save\').attr("disabled", false);
    });
}
');
?>
<h5>Add below code to your javascript place.</h5>
<pre class="line-numbers language-javascript"><code><?php echo $model_code; ?></code></pre>
