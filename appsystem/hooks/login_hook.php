<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_hook{

	private $ci;
	public function __construct(){
		// parent::__construct();
		$this->ci =& get_instance();
	}

	public function check_login(){
		$sess = $this->ci->session->userdata();
		$arrClass = array('home', 'create', 'configsystem', 'deltetegen', 'getdatabase',
					'logingen', 'read', 'structure', 'update', 'upload', 'welcome');
		if(empty($sess['is_login']) || $sess['is_login'] == null){

			if(in_array($this->ci->router->class, $arrClass)){
				redirect('login', 'refresh');
				exit();
			}

		}else{
			if($this->ci->router->method == 'login_view'){
				redirect('home', 'refresh');
				exit();
			}
		}


	}//End function

}
?>
