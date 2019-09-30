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

    public function index()
    {

    }

}//END CLASS
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
$i_row = 0;
foreach ($input_list as $key => $input) {
    $i_row++;
    if($num_column != $i_row){
        $select_column .= $input['column_name'].', ';
    }else {
        $select_column .= $input['column_name'];
    }

}

$search_code = '';
if (!empty($search_list)) {
    foreach ($search_list as $key => $sinput) {
        $search_code.= '
    $where .= ($get[\''.$sinput.'\'] != \'\')?" AND '.$sinput.' = {$this->db->escape($get[\''.$sinput.'\'])}":"";';
    }
}


$controller_code = 'public function list_view()
{
    //@Plugin & @Appjs
    $data[\'plugin\'] = array();
    $data[\'appjs\'] = array(\'appjs/'.$folder_name.'/app.js\');

	//@VIEW
	$this->load->view(\'theme/header\', $data);
	$this->load->view(\''.$controller_name.'/list_view\');
	$this->load->view(\'theme/footer\');

}

public function get_list()
{
    $get = $this->input->get(NULL, TRUE);

    $where = "WHERE 1=1 ";
    '.$search_code.'
    $sql = "SELECT COUNT(*) AS total_row
        FROM '.$db_table.'
        {$where}";

    $q = $this->db->query($sql)->row();
    $total_row = $q->total_row;
    $page = (isset($get[\'page\'])) ? $get[\'page\'] : 1;

    $this->load->helper(\'pagination\');
    $config[\'base_url\'] = site_url(\''.$controller_name.'/get_list\');
    $config[\'total_row\'] = $total_row;
    $config[\'per_page\'] = '.$limit.';
    gen_pagination($config);

    $limit = $config[\'per_page\'];
    $start = ($page - 1) * $limit;
    $data[\'start\'] = $start;

    $sql = "SELECT '.$select_column.'
        FROM '.$db_table.'
        {$where}
        LIMIT $limit OFFSET $start";

    $data[\''.$ex[1].'_list\'] = $this->db->query($sql)->result();

    $this->load->view(\''.$folder_name.'/table_view\', $data);
}
';
?>
<h5>
    Step 2 Copy code below to <span class="text-info"><?php echo $classname; ?> Class</span>
</h5>
<pre class="line-numbers language-php"><code><?php echo $controller_code; ?></code></pre>
