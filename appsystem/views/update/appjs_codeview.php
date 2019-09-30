<?php
$ex= explode('.', $db_table);
$classname = ucfirst($ex[1]);
$controller_name = mb_strtolower($ex[1]);
$folder_name = mb_strtolower($ex[1]);
$param_code = '';
foreach ($input_list as $key => $input) {
    $param_code.= $input['column_name'].':$(\'#'.$input['column_name'].'\').va(),
                ';
}
$model_code = htmlspecialchars(
'//Create by: @'.$developer_name.' At '.date('Y-m-d').'
$(document).ready(function() {


});//END Ready

function update(){
    Swal.fire({
        title: \'Confirmation\',
        text: \'Are you sure you want to change?\',
        type: \'warning\',
        showCancelButton: true,
        confirmButtonColor: \'#3085d6\',
        cancelButtonColor: \'#d33\',
        confirmButtonText: \'Yes่\',
        cancelButtonText: \'No\'
    }).then(function(result){
        if (result.value) {
            show_preload();
            var url = site_url+"'.$controller_name.'/update";
            var param =  $(\'form[name="'.$form_name.'"]\').serializeJSON();
            $.post(url, param, function(resp, textStatus, xhr) {
                if(resp.is_success){
                    window.location.reload();
                }else{
                    hide_preload();
                    Swal.fire({
                        title: \'Warning\',
                        text: resp.msg,
                        type: \'warning\',
                    });
                }
            },\'json\').fail(function(){
                hide_preload();
                Swal.fire({
                    title: \'Warning\',
                    text: \'Somthing wrong, Please try again leter.\',
                    type: \'warning\',
                });
            });
        }
    });
}
');
?>
<h5>
    <i class="fa fa-dot-circle-o" aria-hidden="true"></i> Add below code to to appjs/<?php echo $folder_name; ?>/app.js
</h5>
<pre class="line-numbers language-javascript"><code><?php echo $model_code; ?></code></pre>
