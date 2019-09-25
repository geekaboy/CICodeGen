<?php
//------------[Controller File name : Web_link.php ]----------------------//
if (!defined('BASEPATH'))  exit('No direct script access allowed');

class Getdatabase extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('database_table_model','db_table');

    }

    public function get_table_list(){
        $get = $this->input->get(NULL, TRUE);
        $table_list = $this->db_table->get_table($get['table_schema']);

        echo json_encode($table_list);

    }

}//END Class
