<?php
//------------[Controller File name : Demo.php ]----------------------//
if (!defined('BASEPATH'))  exit('No direct script access allowed');

class Demo extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('database_table_model','db_table');

    }

    private  $limit = 30;

    public function index(){
        // $table = $this->db_table->get_table();

        $this->main_view();
    }

    public function main_view(){
        //@Plugin & @Appjs
        $data['plugin'] = array();
        $data['appjs'] = array();

        //@VIEW
        $this->load->view('demo/theme/header', $data);
        $this->load->view('demo/main_view');
        $this->load->view('demo/theme/footer');
    }

    //Create by: @SS2SEK At 2019-09-25
    public function add_view()
    {
        //@Plugin & @Appjs
        $data['plugin'] = array();
        $data['appjs'] = array('appjs/demo/web_contents/app.js');

        //@VIEW
        $this->load->view('demo/theme/header', $data);
        $this->load->view('demo/web_contents/add_view.php');
        $this->load->view('demo/theme/footer');
    }

    //Create by: @SS2SEK At 2019-09-25
    public function save()
    {
        $post = $this->input->post(NULL, true);
        $this->load->library('form_validation');

        //Validation form
        $frm = $this->form_validation;

        $frm->set_rules('content_title', 'content_title' , 'trim|required');
        $frm->set_rules('content_note', 'content_note' , 'trim|required');
        $frm->set_rules('content_type_id', 'content_type_id' , 'trim|required');
        $frm->set_rules('is_publish', 'is_publish' , 'trim|required');

        $frm->set_message('required', 'Please input %s');

        if (!$frm->run()) {
            $message  = "";
            $message .= form_error('content_title');
            $message .= form_error('content_note');
            $message .= form_error('content_type_id');
            $message .= form_error('is_publish');

            echo json_encode( array(
                'is_success' => FALSE,
                'msg' => $message
            ));
            exit();
        }else{
            //INSERT crru.web_contents table
            $data = array(
                'content_title'=>$post['content_title'],
                'content_note'=>$post['content_note'],
                'content_type_id'=>$post['content_type_id'],
                'is_publish'=>$post['is_publish'],

            );
            $is_sucess = $this->db->insert('crru.web_contents', $data);
            if($is_sucess){
                echo json_encode(
                    array(
                        'is_success'=>TRUE,
                        'msg'=>'Saved'
                    )
                );
            }else{
                echo json_encode(
                    array(
                        'is_success'=>FALSE,
                        'msg'=>'Error'
                    )
                );
            }
        }//End if else

    }//end function

}//end class
