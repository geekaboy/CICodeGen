<?php
$ex= explode('.', $db_table);
$classname = ucfirst($ex[1]);
$folder_name = $ex[1];
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

$dataUpdateCode = '';
foreach ($input_list as $key => $input) {
    $dataUpdateCode .= '\''.$input['column_name'].'\''.'=>'.'$post[\''.$input['column_name'].'\'],
        ';
}


$function_code =htmlspecialchars(
'//Create by: @'.$developer_name.' At '.date('Y-m-d').'
public function edit_view()
{
	$get = $this->input->get(NULL, TRUE);
	$sql = "SELECT * FROM '.$db_table.'
	         WHERE  id = {$get[\'id\']}";
	$q = $this->db->query($sql);
	$data[\'rdata\'] = $q->row();

    //@Plugin & Appjs
	$data[\'plugin\'] = array();
	$data[\'appjs\'] = array(
		\'appjs/'.$ex[1].'/app.js\'
	);

	//@VIEW
	$this->load->view(\'theme/header\', $data);
	$this->load->view(\''.$ex[1].'/edit_view.php\');
	$this->load->view(\'theme/footer\');
}

//Create by: @'.$developer_name.' At '.date('Y-m-d').'
public function update(){
	$post = $this->input->post(NULL, TRUE);

	$data = array(
        '.$dataUpdateCode.'
	);

	$condition = array(
		\'id\'=>$post[\'id\']
	);

	$is_success = $this->db->update(\''.$db_table.'\', $data, $condition);

    $msg = ($is_success)?\'Successfuly\':\'Somthing wrong, Please try again leter.\';
    echo json_encode(
        array(
            \'is_success\'=>$is_success,
            \'msg\'=>$msg
        )
    );

}//end function
');


?>
<h5>
    Step 2 Copy below code to <span class="text-info"><?php echo $classname; ?> Class</span>
</h5>
<pre class="line-numbers language-php"><code><?php echo $function_code; ?></code></pre>
