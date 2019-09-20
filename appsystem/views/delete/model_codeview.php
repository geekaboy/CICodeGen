<?php
$ex= explode('.', $db_table);
$classname = ucfirst($ex[1]);
$model_code = htmlspecialchars('<?php
//------------[ Model File name : '.$classname.'_model.php ]--------------------//
//----------------[ Create by: @'.$developer_name.' At '.date('Y-m-d').' ]----------------------//
if (!defined(\'BASEPATH\'))  exit(\'No direct script access allowed\');

class '.$classname.'_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

}//END CLASS
');
?>
<h5>
    Step 1 Create file <span class="text-info"><?php echo $classname; ?>_model.php</span>
    in application/models folder and copy below code to <span class="text-info"><?php echo $classname; ?>_model.php</span>
</h5>
<pre class="line-numbers language-php"><code><?php echo $model_code; ?></code></pre>
