<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_hook{

	private $ci;
	public function __construct(){
		// parent::__construct();
		$this->ci =& get_instance();
	}

	public function check_login(){
		// echo "<pre>";
		// // print_r($this->ci->router);
		// echo $this->ci->router->module;
		// exit();
		$sess = $this->ci->session->userdata();
		if($this->ci->router->module == 'backend'){
			$arrClass = array('dashboard', 'web_contents');
			$bos_sess = $this->ci->session->userdata('backend');
			if($bos_sess['is_login'] == null){

				if(in_array($this->ci->router->class, $arrClass)){
					redirect('backend/login', 'refresh');
					exit();
				}//end if

			}else{
				if($this->ci->router->method == 'login_view'){
					redirect('backend/dashboard', 'refresh');
					exit();
				}
			}

		}else if($this->ci->router->module == 'website'){
			$arrClass = array('main', 'person_info', 'register', 'account');
			if($this->ci->session->userdata('is_login') == null){

				if(in_array($this->ci->router->class, $arrClass)){
					redirect('website/login', 'refresh');
					exit();
				}//end if

			}else{
				if($this->ci->router->method == 'login_view'){
					redirect('website/main', 'refresh');
					exit();
				}

			}
		}



	}//End function

}
?>
