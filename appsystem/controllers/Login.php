<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    //========================= PUBLIC=========================================//
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->login_view();
    }

    public function login_view()
    {

        //@Plugin & Appjs
        $data['plugin'] = array();
        $data['appjs'] = array();

        //@VIEW
        $this->load->view('login/login_view');
    }

    public function login_fail_view()
    {
        //@Plugin & Appjs
        $data['plugin'] = array();
        $data['appjs'] = array();

        //@VIEW
        $this->load->view('login/login_fail_view');
    }

    public function check_login()
    {
        $data_post = $this->input->post(NULL, TRUE);

        if (isset($data_post['username']) && isset($data_post['password'])) {

            if ($data_post['username'] == 'admin' && $data_post['password']=='1234') {
                $sdata = array(
                    'is_login' => TRUE,
                    'id' => 'admin',
                    'username' => 'admin',
                    'fullname' => 'Admin',
                    'user_type' => '1',
                    'login_time' => date('Y-m-d H:i:s'),
                );
                $this->session->set_userdata($sdata);
                redirect('home');
            } else {
                redirect('login/login_fail_view');
            }
        } else {
            // echo "asdasd";
            // exit();
            redirect('login/login_fail_view');
        }
    }

    public function logout()
    {

        $this->session->sess_destroy();
        redirect('login');
    }


    //========================= PRIVATE=======================================//



}//End class
