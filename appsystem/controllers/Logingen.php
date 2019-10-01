<?php
//------------[Controller File name : Logingen.php ]----------------------//
if (!defined('BASEPATH'))  exit('No direct script access allowed');

class Logingen extends CI_Controller {

    public function __construct(){
        parent::__construct();


    }

    public function index(){
        $this->main_view();
    }

    public function main_view(){
        //@Plugin & @Appjs
        $data['plugin'] = array();
        $data['appjs'] = array();

        //@VIEW
        $this->load->view('theme/header', $data);
        $this->load->view('upload/main_view');
        $this->load->view('theme/footer');
    }

}//END CLASS
