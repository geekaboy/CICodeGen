<?php
$ex= explode('.', $db_table);
$classname = ucfirst($ex[1]);
$folder_name = $ex[1];
$controller_name = $ex[1];
$controller_code =htmlspecialchars('<?php
//------------[Controller File name : '.$classname.'.php ]----------------------//
//----------------[ Create by: @'.$developer_name.' At '.date('Y-m-d').' ]----------------------//
if (!defined(\'BASEPATH\'))  exit(\'No direct script access allowed\');

class '.$classname.' extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }
}
?>');
?>
<h5>
    Step 1 Create file <span class="text-info"><?php echo $classname; ?>.php</span>
    in folder application/controllers and copy below code to <span class="text-info"><?php echo $classname; ?>.php</span><br>
    <small class="text-warning">&nbsp;&nbsp;&nbsp;&nbsp;Note: If you have <?php echo $classname; ?>.php skip this step.</small>
</h5>
<pre class="line-numbers language-php"><code><?php echo $controller_code; ?></code></pre>

<?php
$select_column = '';
$num_column = count($input_list);
$condition_code = '';
$condition_arr_code = '';
$all_row = count($input_list);
foreach ($input_list as $key => $input) {
    $operator_code = '';
    switch ($input['operator']) {
        case '=':
            $operator_code = '=\'{$post[\''.$input['column_name'].'\']}\'';
            break;
        case '>':
            $operator_code = '>\'{$post[\''.$input['column_name'].'\']}\'';
            break;
        case '<':
            $operator_code = '<\'{$post[\''.$input['column_name'].'\']}\'';
            break;
        case '>=':
            $operator_code = '>=\'{$post[\''.$input['column_name'].'\']}\'';
            break;
        case '<=':
            $operator_code = '<=\'{$post[\''.$input['column_name'].'\']}\'';
            break;
        case '!=':
            $operator_code = '<>\'{$post[\''.$input['column_name'].'\']}\'';
            break;
    }
    if($key == 0){
        $condition_code .= $input['column_name'].$operator_code;
    }else {
        $condition_code .= '
                    AND '.$input['column_name'].$operator_code;
    }

    $condition_arr_code .= '\''.$input['column_name'].'\' => $post[\''.$input['column_name'].'\'],
            ';

}
$controller_code = 'public function del()
{
    $post = $this->input->post(NULL, TRUE);
    $sql = "SELECT * FROM '.$db_table.'
            WHERE '.$condition_code.'";
    $rdata= $this->db->query($sql);
    if ($rdata->num_rows() > 0) {
        $cond = array(
            '.$condition_arr_code.'
        );

        if ($this->db->delete(\''.$db_table.'\', $cond)) {
            echo json_encode(array(
                \'is_success\' => TRUE,
                \'msg\' => \'Successfuly\'
            ));
        }
    } else {
        echo json_encode(array(
            \'is_success\' => FALSE,
            \'msg\' => \'Data not found.\'
        ));
        exit();
    }
}
';
?>
<h5>
    Step 2 Copy below code to <span class="text-info"><?php echo $classname; ?> Class</span>
</h5>
<pre class="line-numbers language-php"><code><?php echo $controller_code; ?></code></pre>
