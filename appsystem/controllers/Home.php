<?php
//------------[Controller File name : Web_link.php ]----------------------//
if (!defined('BASEPATH'))  exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();


    }

    private  $limit = 30;

    public function index(){
        $this->main_view();
    }

    public function main_view(){
        //@Plugin & @Appjs
        $data['plugin'] = array();
        $data['appjs'] = array();

        //@VIEW
        $this->load->view('theme/header', $data);
        $this->load->view('home/main_view');
        $this->load->view('theme/footer');
    }

}//end class
