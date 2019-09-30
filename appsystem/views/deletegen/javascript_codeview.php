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
$condition_arr_code = '';
$all_row = count($input_list);
foreach ($input_list as $key => $input) {

    $condition_arr_code .= '
        '.$input['column_name'].' : $(el).data(\''.$input['column_name'].'\'),';

}
$javascript_codeview = 'function delete(el) {

    var url = site_url + "'.$controller_name.'/del";
    var param = {'.$condition_arr_code.'
    };
    $.post(url, param, function (resp, textStatus, xhr) {
        if (resp.is_success) {
            alert("Deleted");
        }else{
            alert("Fail");

        }
    }, \'json\');
}
';

?>
<h5>
    <i class="fa fa-dot-circle-o" aria-hidden="true"></i> Add below code to<span class="text-info">appjs/<?php echo $folder_name;?> /app.js</span>
</h5>
<pre class="line-numbers language-javascript" ><code><?php echo htmlspecialchars($javascript_codeview); ?></code></pre>
