<?php
$ex= explode('.', $db_table);
$classname = ucfirst($ex[1]);
$table_name= $ex[1];
$controller_name= $ex[1];
$folder_name  = $ex[1];

$table_th_code = '';
$table_td_code='';
$i_col =0;
foreach ($input_list as $key => $input) {
    $i_col++;
    $table_th_code.='<th>'.$input['label'].'</th>
            ';
    $table_td_code.='<td><?php echo $'.$table_name.'->'.$input['column_name'].'; ?></td>
                ';
}

$search_var = '';
$search_clear = '';
if (!empty($search_list)) {
    foreach ($search_list as $key => $sinput) {
        $search_var.='
            '.$sinput.':'.'$(\'#'.$sinput.'\').val(),';

        $search_clear .='
    $(\'#'.$sinput.'\').val(\'\');';
    }
}

$javascript_codeview = '$(document).ready(function () {

    get_list();

});//End ready

function get_list(){
    show_preload();
    $(\'#dev_table\').html(\'\');
    var param = {'.$search_var.'
        };
    var url = site_url+"'.$table_name.'/get_list?"+$.param(param);
    $(\'#div_table\').load(url, function (response, status, request) {
        console.log(\'status=>\', status);
        hide_preload();
    });

}

function clear_search(){'.$search_clear.'
    get_list();
}

function del(el) {
    Swal.fire({
        title: \'Confirmation\',
        text: \'Are you sure you want to delete?\',
        type: \'warning\',
        showCancelButton: true,
        confirmButtonColor: \'#3085d6\',
        cancelButtonColor: \'#d33\',
        confirmButtonText: \'Yes\',
        cancelButtonText: \'No\'
    }).then(function(result){
        if (result.value) {
            var url = site_url + "'.$controller_name.'/del";
            var param = {
                id: $(el).data(\'id\')
            };
            show_preload();
            $.post(url, param, function (resp, textStatus, xhr) {
                if (resp.is_success) {
                    window.location.reload();
                }else{
                    hide_preload();
                    Swal.fire({
                        title: \'Warning\',
                        html: resp.msg,
                        type: \'warning\',
                    });
                }
            }, \'json\').fail(function(){
                hide_preload();
                Swal.fire({
                    title: \'Error\',
                    html: \'Something want wrong, Please try again leter.\',
                    type: \'warning\',
                });
            });
        }
    });//END Swal

}
';

?>
<h5>
    Create file <span class="text-info">app.js</span>
    in folder appjs/<?php echo $folder_name;?> and copy below code to <span class="text-info">app.js</span>
</h5>
<pre class="line-numbers language-javascript" ><code><?php echo htmlspecialchars($javascript_codeview); ?></code></pre>
