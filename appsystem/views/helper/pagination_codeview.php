<?php
$ex= explode('.', $db_table);
$classname = ucfirst($ex[1]);
$folder_name = $ex[1];
$controller_name = $ex[1];
$helper_codeview = htmlspecialchars('function gen_pagination($config = array())
{
    $CI =& get_instance();
    $CI->load->library(\'pagination\');
    $config[\'base_url\'] = $config[\'base_url\'];
    $config[\'total_rows\'] = $config[\'total_row\'];
    $config[\'enable_query_strings\'] = TRUE;
    $config[\'page_query_string\'] = TRUE;
    $config[\'use_page_numbers\'] = TRUE;
    $config[\'first_link\'] =  \'<<\';
    $config[\'last_link\']  =  \'>>\';
    $config[\'query_string_segment\'] = \'page\';
    $config[\'per_page\'] = $config[\'per_page\'];
    $config[\'num_links\'] = 6;
    $config[\'full_tag_open\'] = \'<div class="text-center"><ul class="pagination">\';
    $result = $CI->pagination->initialize($config);
    return $result;
}');
?>
<h5>
    Create file pagination_helper.php in application/helpers and copy below code to pagination_helper.php<br>
    <small class="text-warning">&nbsp;&nbsp;&nbsp;&nbsp;Note: If you have pagination_helper.php skip this step.</small>
</h5>
<pre class="line-numbers language-php"><code><?php echo $helper_codeview; ?></code></pre>
