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

$controller_code = 'public function list_view()
{
    $this->load->view(\''.$controller_name.'/list_view\');
}

public function table_list()
{
    $get = $this->input->get(NULL, TRUE);

    $where = "";
    if ($get[\'search_text\'] != "") {
        $where .= "";
    }
    $sql = "SELECT COUNT(std.std_id) AS total_row
        FROM cse_v2.student_data std
        WHERE std.year_graduated = \'{$get[\'year_graduated\']}\' $where";

    $q = $this->db->query($sql)->row();
    $total_row = $q->total_row;
    $page = (isset($get[\'page\'])) ? $get[\'page\'] : 1;

    $this->load->helper(\'pagination\');
    $config[\'base_url\'] = site_url(\''.$controller_name.'/table_list\');
    $config[\'total_row\'] = $total_row;
    $config[\'per_page\'] = 100;
    gen_pagination($config);

    $limit = $config[\'per_page\'];
    $start = ($page - 1) * $limit;
    $data[\'start\'] = $start;

    $sql = "SELECT std.*
        FROM cse_v2.student_data std
        WHERE std.year_graduated = \'{$get[\'year_graduated\']}\' $where
        ORDER BY std.maj_name, std.fac_name, std.std_id, std.citizen_id
        LIMIT $limit OFFSET $start";

    $data[\'student_list\'] = $this->db->query($sql)->result();

    $this->load->view(\''.$classname.'/list_view\', $data);
}

';
?>
<h5>
    Step 2 Copy code below to <span class="text-info"><?php echo $classname; ?> Class</span>
</h5>
<pre class="line-numbers language-php"><code><?php echo $controller_code; ?></code></pre>
