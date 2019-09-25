<?php
//------------[Controller File name : Create.php ]----------------------//
if (!defined('BASEPATH'))  exit('No direct script access allowed');

class Deletegen extends CI_Controller {

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
            'appjs/deletegen/app.js'
        );

        $data['schema_list'] = $this->db_table->get_table_schema();


        //@VIEW
        $this->load->view('theme/header', $data);
        $this->load->view('deletegen/main_view');
        $this->load->view('theme/footer');
    }

    public function build_code_view()
    {
        $get = $this->input->get(NULL, TRUE);
        $data['table_name'] = $get['table_name'];
        $data['column_list'] = $this->db_table->get_column($get['table_name']);
        $this->load->view('deletegen/build_code_view', $data);
    }

    public function generate()
    {
        $post = $this->input->post(NULL, TRUE);
        $data['developer_name'] = $post['developer_name'];
        $data['input_list'] = $post['input_list'];
        $data['db_table'] = $post['db_table'];
        $this->load->view('deletegen/code_view', $data);
    }

}//END CLASS
