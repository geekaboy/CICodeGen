<?php
$controller_codeview = '<?php
//------------[Controller File name : ControllerFileName.php ]----------------------//
if (!defined(\'BASEPATH\'))  exit(\'No direct script access allowed\');

class ControllerName extends CI_Controller {

    public function __construct(){
        parent::__construct();

    }

    public function index()
    {
        $this->main_view();

    }
    public function main_view()
    {
        //@Plugin & Appjs
		$data[\'plugin\'] = array(
            \'URL plugin Ex. assets/plugins/plugin-folder/plugin.js\',
            \'URL plugin Ex. assets/plugins/plugin-folder/plugin.css\',
        );
		$data[\'appjs\'] = array();

		//@VIEW
		$this->load->view(\'theme/header\', $data);
		$this->load->view(\'question/add_view.php\');
		$this->load->view(\'theme/footer\');

    }
    
}//END CLASS';

?>
<h5><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Controller Sample</h5>
<pre class="line-numbers language-php" ><code><?php echo htmlspecialchars($controller_codeview); ?></code></pre>
