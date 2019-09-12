<?php
$controller_code =htmlspecialchars('<?php
//------------[Controller File name : Web_link.php ]----------------------//
if (!defined(\'BASEPATH\'))  exit(\'No direct script access allowed\');

class Create extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model(\'database_table_model\', \'db_table\');
    }
}
?>');


?>
<pre class="line-numbers language-php"><code><?php echo $controller_code; ?></code></pre>
