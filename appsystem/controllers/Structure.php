<?php
//------------[Controller File name : Structure.php ]----------------------//
if (!defined('BASEPATH'))  exit('No direct script access allowed');

class Structure extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('database_table_model', 'db_table');
    }

    public function index()
    {
        $this->main_view();

    }

    public function main_view()
    {

        //@Plugin & @Appjs
        $data['plugin'] = array(
            'assets/plugins/prismjs/prism.css',
            'assets/plugins/prismjs/prism.js',
            'assets/plugins/jquery.serializeJSON/jquery.serializejson.min.js',
        );
        $data['appjs'] = array(
            'appjs/structure/app.js'
        );


        //@VIEW
        $this->load->view('theme/header', $data);
        $this->load->view('structure/main_view');
        $this->load->view('theme/footer');
    }


}//END Class
