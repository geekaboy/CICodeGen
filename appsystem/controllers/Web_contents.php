<?php
//------------[Controller File name : Web_contents.php ]----------------------//
//----------------[ Create by: @SS2SEK At 2019-09-25 ]----------------------//
if (!defined('BASEPATH'))  exit('No direct script access allowed');

class Web_contents extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index()
    {

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
        $frm->set_rules('is_gallery', 'is_gallery' , 'trim|required');
        $frm->set_rules('is_publish[]', 'is_publish' , 'trim|required');
        $frm->set_message('required', 'Please input %s');

        if (!$frm->run()) {
            $message  = "";
            $message .= form_error('content_title');
            $message .= form_error('content_note');
            $message .= form_error('content_type_id');
            $message .= form_error('is_gallery');
            $message .= form_error('is_publish[]');
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
                'is_gallery'=>$post['is_gallery'],
                'is_publish'=>$post['is_publish'],
            );
            $is_sucess = $this->db->insert('crru.web_contents', $data);
            $msg = ($is_success)?'Saved':'Error';
            echo json_encode(
                array(
                    'is_success'=>$is_sucess,
                    'msg'=>$msg
                )
            );
        }//End if else

    }//end function

}
?>
