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
$javascript_codeview = '$(document).ready(function () {

    get_list();

    $(\'#btn_search\').click(get_list);
    $(\'#btn_clear\').click(clear_search);
    $(\'#search_text\').change(function (e) {
        e.preventDefault();
        if($(this).val() == \'\'){
            get_list();
        }

    });

});//End ready

function get_list(){
    $(\'#dev_table\').html(\'\');
    var url = site_url+"'.$table_name.'/get_list?"+
                \'search_text=\'+$(\'#search_text\').val()
    $(\'#div_table\').load(url, function (response, status, request) {
        console.log(\'status=>\', status);
    });

}

function clear_search(){
    $(\'#search_text\').val(\'\');
    get_list();
}

function delete(el) {

    var url = site_url + "'.$controller_name.'/del";
    var param = {
        id: $(\'el\').val()
    };

    $.post(url, param, function (resp, textStatus, xhr) {
        if (resp.is_success) {
            alert(resp.msg)
        }else{
            alert(resp.msg)
        }
    }, \'json\').fail(function(){
        alert("Fail");
    });
}
';

?>
<h5>
    Create file <span class="text-info">app.js</span>
    in folder appjs/<?php echo $folder_name;?> and copy below code to <span class="text-info">app.js</span>
</h5>
<pre class="line-numbers language-javascript" ><code><?php echo htmlspecialchars($javascript_codeview); ?></code></pre>
