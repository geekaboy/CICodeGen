<?php
$ex= explode('.', $db_table);
$classname = ucfirst($ex[1]);
$table_name= $ex[1];
$folder_name  = $ex[1];
$html = '<div class="row">
    <div class="col-md-12">
        <div class="card card-body">
            <h4 class="card-title text-center">
                <i class="fa fa-database"></i> xxxxx
            </h4>
            <div class="row justify-content-center mt-5">
                <div class="col-md-3">
                    <div class="form-group">
                        <input class="form-control" name="" id=""  placeholder="Keyword"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <button class="btn btn-primary" type="button" id="btn_search">
                            Search
                        </button>
                        <button class="btn btn-warning" type="button" id="btn_clear">
                            Clear
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12" id="div_table">

                </div>
            </div>

        </div>
    </div>
</div>';
?>

<h5>
    Step 1 Create file <span class="text-info">list_view.php</span>
    in folder views/<?php echo $folder_name;?> and copy below code to <span class="text-info">list_view.php</span>
</h5>

<pre class="line-numbers language-html" ><code><?php echo htmlspecialchars($html); ?></code></pre>



<?php
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
$table_view_code = '<div class="row justify-content-center mt-5">
    <?php echo $this->pagination->create_links(); ?>
</div>

<table class="table table-hover table-bordered table-condensed">
    <thead>
        <tr class="bg-info">
            <th width="20">#</th>
            '.$table_th_code.'
        </tr>
    </thead>
    <tbody>
        <?php
        $i_row = $start;
        if (count($'.$table_name.'_list) == 0) {
            echo \'<tr><td colspan="'.$i_col.'" class="text-center"><h4 class="text-info">*** Data not found ***</h4></td></tr>\';
        }
        foreach ($'.$table_name.'_list as $key => $'.$table_name.') {
            $i_row++;
            ?>
            <tr>
                <td><?php echo $i_row; ?>. </td>
                '.$table_td_code.'
            </tr>
        <?php
        }
        ?>

    </tbody>
</table>
<div class="row justify-content-center mt-5">
    <?php echo $this->pagination->create_links(); ?>
</div>

<script>
    $(document).ready(function() {
        $(\'.page-link > a\').click(function(e) {
            e.preventDefault();
            var url = site_url + "'.$table_name.'/get_list?" +
                \'page=\' + $(this).data(\'ci-pagination-page\') +
                \'&search_text=\' + $(\'#search_text\').val() +
            $(\'#div_table\').load(url, function(response, status, request) {
                $(\'body\').scrollTop(0);
            });

        });
    }); //end ready
</script>
';

?>
<h5>
    Step 2 Create file <span class="text-info">table_view.php</span>
    in folder views/<?php echo $folder_name;?> and copy below code to <span class="text-info">table_view.php</span>
</h5>
<pre class="line-numbers language-html" ><code><?php echo htmlspecialchars($table_view_code); ?></code></pre>
