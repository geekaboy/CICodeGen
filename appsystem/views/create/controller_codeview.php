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

    public function index()
    {

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
$insertListCode = '';
$validListCode = '';
$validmessageCode ='    ';
foreach ($input_list as $key => $input) {
        switch ($input['input_type']) {
            case 'checkbox':
        $insertListCode .= '
            \''.$input['column_name'].'\''.'=>'.'$post[\''.$input['column_name'].'[]\'],';
        $validListCode .= '
    $frm->set_rules('.'\''.$input['column_name'].'[]\', \''.$input['label'].'\' '.', \'trim|required\');';
        $validmessageCode .='
        $message .= form_error(\''.$input['column_name'].'[]\');';
            break;

            default:
        $insertListCode .= '
            \''.$input['column_name'].'\''.'=>'.'$post[\''.$input['column_name'].'\'],';
        $validListCode .= '
    $frm->set_rules('.'\''.$input['column_name'].'\', \''.$input['label'].'\' '.', \'trim|required\');';
        $validmessageCode .='
        $message .= form_error(\''.$input['column_name'].'\');';
            break;
        }

}
$function_code =htmlspecialchars(
'//Create by: @'.$developer_name.' At '.date('Y-m-d').'
public function add_view()
{
    //@Plugin & @Appjs
    $data[\'plugin\'] = array();
    $data[\'appjs\'] = array(\'assets/'.$folder_name.'/app.js\');

	//@VIEW
	$this->load->view(\'theme/header\', $data);
	$this->load->view(\''.$folder_name.'/add_view.php\');
	$this->load->view(\'theme/footer\');
}

//Create by: @'.$developer_name.' At '.date('Y-m-d').'
public function save()
{
	$post = $this->input->post(NULL, true);
    $this->load->library(\'form_validation\');

    //Validation form
    $frm = $this->form_validation;'.$validListCode.'
    $frm->set_message(\'required\', \'Please input %s\');

    if (!$frm->run()) {
        $message  = "";'.$validmessageCode.'
        echo json_encode( array(
                \'is_success\' => FALSE,
                \'msg\' => $message
        ));
        exit();
    }else{
        //INSERT '.$db_table.' table
        $data = array('.$insertListCode.'
    	);
    	$is_sucess = $this->db->insert(\''.$db_table.'\', $data);
        $msg = ($is_success)?\'Saved\':\'Error\';
        echo json_encode(
            array(
                \'is_success\'=>$is_sucess,
                \'msg\'=>$msg
            )
        );
    }//End if else

}//end function
');


?>
<h5>
    Step 2 Copy code below to <span class="text-info"><?php echo $classname; ?> Class</span>
</h5>
<pre class="line-numbers language-php"><code><?php echo $function_code; ?></code></pre>
